<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaction;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Tampilkan halaman payment dengan data params untuk frontend
   public function showPaymentPage()
{
    // Cek apakah user sudah login
    $user = auth()->user();
    if (!$user) {
        return redirect()->route('login.form')->with('error', 'Silakan login dulu');
    }

    // Contoh orderId dan detail produk
    $orderId = 'Horizons-' . time();
    $productPrice = 95000;
    $adminFee = 2500;
    $grossAmount = $productPrice + $adminFee; // Total: 97.500

    // Data params yang dikirim ke view untuk frontend
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
        ],
        'item_details' => [
            [
                'id' => 'heart-horizon-class',
                'price' => $productPrice,
                'quantity' => 1,
                'name' => 'Heart Horizon Class'
            ],
            [
                'id' => 'admin-fee',
                'price' => $adminFee,
                'quantity' => 1,
                'name' => 'Biaya Admin'
            ]
        ],
        'customer_details' => [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone_number,
        ],
    ];

    // Mengirim data ke view
    return view('payment.index', [
        'params' => $params,
        'orderId' => $orderId,
        'grossAmount' => $grossAmount,
        'productPrice' => $productPrice,
        'adminFee' => $adminFee,
    ]);
}


    // Endpoint untuk generate Snap token dan simpan transaksi awal
    public function createTransaction(Request $request)
    {
        try {
            $user = auth()->user();
            if (!$user) {
                return response()->json(['error' => 'User belum login'], 401);
            }

            $params = $request->all();

            // Validasi param yang dibutuhkan
            if (!isset($params['transaction_details']['order_id']) || !isset($params['transaction_details']['gross_amount'])) {
                return response()->json(['error' => 'Missing required parameters'], 400);
            }

            $orderId = $params['transaction_details']['order_id'];
            $grossAmount = $params['transaction_details']['gross_amount'];

            // Cek apakah transaksi dengan order_id sudah ada (hindari duplikasi)
            $existingTransaction = Transaction::where('order_id', $orderId)->first();
            if ($existingTransaction) {
                return response()->json(['error' => 'Order ID sudah digunakan'], 409);
            }

            // Simpan transaksi awal dengan status pending
            Transaction::create([
                'user_id' => $user->id,
                'order_id' => $orderId,
                'transaction_id' => null, // nullable
                'gross_amount' => $grossAmount,
                'transaction_status' => '',
                'payment_type' => '',
                'fraud_status' => '',
            ]);

            // Generate Snap Token
            $snapToken = Snap::getSnapToken($params);

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Handle callback dari Midtrans
 // Handle callback dari Midtrans
public function handleCallback(Request $request)
{
    $notification = $request->all();

    // Mengakses va_number dan bank dari va_numbers (untuk bank transfer biasa)
    $vaNumber = $notification['va_numbers'][0]['va_number'] ?? null;
    $bank = $notification['va_numbers'][0]['bank'] ?? null;

    // Mengakses permata_va_number untuk Permata Bank
    $permataVaNumber = $notification['permata_va_number'] ?? null;

    // Mengakses biller_code dan bill_key (untuk echannel seperti Mandiri, Permata, dll)
    $billerCode = $notification['biller_code'] ?? null;  // Untuk Mandiri echannel atau bank lainnya
    $billKey = $notification['bill_key'] ?? null;        // Untuk Mandiri echannel atau bank lainnya

    // Data lainnya dari callback
    $transactionStatus = $notification['transaction_status'] ?? null;
    $orderId = $notification['order_id'] ?? null;
    $transactionId = $notification['transaction_id'] ?? null;
    $grossAmount = $notification['gross_amount'] ?? null;
    $paymentType = $notification['payment_type'] ?? null;
    $fraudStatus = $notification['fraud_status'] ?? null;
    $paymentCode = $notification['payment_code'] ?? null;  // Digunakan untuk cstore dan echannel
    $signatureKey = $notification['signature_key'] ?? null;
    $statusCode = $notification['status_code'] ?? null;

    // Validasi signature untuk keamanan
    $serverKey = config('midtrans.server_key');
    $rawSignatureString = $orderId . $statusCode . $grossAmount . $serverKey;
    $computedSignature = hash('sha512', $rawSignatureString);

    if ($computedSignature !== $signatureKey) {
        return response()->json(['error' => 'Invalid signature'], 403);
    }

    // Cari transaksi berdasarkan order_id
    $transaction = Transaction::where('order_id', $orderId)->first();

    if (!$transaction) {
        return response()->json(['error' => 'Transaction not found'], 404);
    }

    // Menyimpan data untuk berbagai jenis payment_type
    if ($paymentType === 'echannel') {
        // Jika payment_type adalah echannel (Mandiri, Permata, dll), kita simpan biller_code di payment_code dan bill_key di va_number
        $paymentCode = $billerCode;  // Menyimpan biller_code di payment_code
        $vaNumber = $billKey;        // Menyimpan bill_key di va_number
    } elseif ($paymentType === 'bank_transfer') {
        // Jika payment_type adalah bank_transfer, dan ada permata_va_number, simpan itu ke va_number
        if ($permataVaNumber) {
            $vaNumber = $permataVaNumber;  // Menyimpan permata_va_number di va_number
        }
    }

    // Update data transaksi sesuai callback
    $transaction->update([
        'transaction_id' => $transactionId,
        'transaction_status' => $transactionStatus,
        'payment_type' => $paymentType,
        'fraud_status' => $fraudStatus,
        'payment_code' => $paymentCode,
        'va_number' => $vaNumber,  // Menyimpan VA number atau permata_va_number
        'bank' => $bank,           // Menyimpan bank tujuan untuk VA
        'signature_key' => $signatureKey,
    ]);
    
    // Jika statusnya `settlement` atau `capture`, tandakan is_paid menjadi true
    if (($transactionStatus === 'settlement' || $transactionStatus === 'capture') && $fraudStatus === 'accept') {
        $user = $transaction->user;

        // Pastikan user ditemukan dan update is_paid
        if ($user && !$user->is_paid) {
            $user->is_paid = true;
            $user->save();
        }
    }

    return response()->json(['message' => 'Transaction processed successfully']);
}

    // Tampilkan halaman invoice berdasar order_id
    public function showInvoice(Request $request)
{
    // Ambil order_id dari query string
    $order_id = $request->query('order_id', '');

    // Validasi format order_id, jika tidak valid langsung batal
    if (empty($order_id) || !is_string($order_id)) {
        return redirect()->route('home')->with('error', 'Order ID tidak valid');
    }

    // Cari transaksi berdasarkan order_id
    $transaction = Transaction::where('order_id', $order_id)->first();

    // Jika transaksi tidak ditemukan, tampilkan halaman 404
    if (!$transaction) {
        return abort(404);
    }

    // Cek apakah user yang login adalah pemilik transaksi
    $user = auth()->user();
    if ($user && $transaction->user_id !== $user->id) {
        // Jika transaksi bukan milik user yang login, tampilkan error
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke transaksi ini.');
    }

    // Menambahkan format tanggal untuk transaksi
    $transactionDate = $transaction->created_at->format('d-m-Y H:i:s');

    // Menambahkan informasi status transaksi
    $statusMessage = $this->getStatusMessage($transaction->transaction_status);

    // Mengirim data transaksi ke view invoice
    return view('payment.invoice', [
        'order_id' => $transaction->order_id,
        'amount' => $transaction->gross_amount,
        'status' => $statusMessage,
        'transaction_date' => $transactionDate,
        'payment_type' => $transaction->payment_type,  // Tampilkan jenis pembayaran (QRIS, Credit Card, dll)
    ]);
}

// Fungsi untuk memformat status transaksi
private function getStatusMessage($status)
{
    switch ($status) {
        case 'settlement':
            return 'Pembayaran Berhasil';
        case 'capture':
            return 'Pembayaran Berhasil';
        case 'pending':
            return 'Pembayaran Pending';
        case 'cancel':
            return 'Pembayaran Dibatalkan';
        case 'deny':
            return 'Pembayaran Ditolak';
        default:
            return 'Status Tidak Diketahui';
    }
}
// Cek Status Pembayaran
// Menangani pengecekan status pembayaran
public function checkPaymentStatus($orderId)
{
    // Cari transaksi berdasarkan order_id
    $transaction = Transaction::where('order_id', $orderId)->first();

    if (!$transaction) {
        return response()->json(['error' => 'Transaction not found'], 404);  // Pastikan ada error jika transaksi tidak ditemukan
    }

    // Menyusun response untuk status pembayaran
    $response = [
        'status' => $transaction->transaction_status,
        'payment_type' => $transaction->payment_type, // Bank transfer or CStore
        'order_id' => $transaction->order_id,
        'gross_amount' => $transaction->gross_amount,
    ];

    // Menambahkan va_number atau payment_code tergantung jenis pembayaran
    if ($transaction->payment_type === 'bank_transfer') {
        // Untuk bank transfer biasa
        $response['va_number'] = $transaction->va_number;
    } elseif ($transaction->payment_type === 'cstore') {
        // Untuk CStore, menampilkan payment_code
        $response['payment_code'] = $transaction->payment_code;
    }

    // Menangani permata_va_number untuk Permata Bank
    if ($transaction->payment_type === 'bank_transfer' && $transaction->va_number && !empty($transaction->va_number)) {
        // Menyimpan permata_va_number ke va_number jika ada
        $response['permata_va_number'] = $transaction->va_number;  // Va number ini adalah untuk Permata
    }

    // Menangani Mandiri E-Channel dengan biller_code dan bill_key
    if ($transaction->payment_type === 'echannel') {
        if ($transaction->payment_code && $transaction->va_number) {
            $response['biller_code'] = $transaction->payment_code; // Menyimpan biller_code di payment_code
            $response['bill_key'] = $transaction->va_number;       // Menyimpan bill_key di va_number
        } else {
            $response['biller_code'] = null;
            $response['bill_key'] = null;
        }
    }

    return response()->json($response);
}


}
