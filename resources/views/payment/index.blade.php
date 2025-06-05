<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Midtrans Payment - Heart Horizon Class</title>
    <!-- Load Midtrans Snap JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <style>
        /* Reset & base */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #333;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: #fff;
            border-radius: 15px;
            padding: 30px 40px;
            max-width: 650px;
            width: 100%;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
            text-align: center;
        }
        h1 {
            margin-bottom: 15px;
            font-weight: 700;
            color: #4a148c;
        }
        .user-info {
            margin-bottom: 25px;
            font-size: 16px;
            color: #555;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }
        .user-info strong {
            color: #4a148c;
        }
        .features-section {
            text-align: left;
            margin-bottom: 25px;
            background: #f0f8ff;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #4a148c;
        }
        .features-section h3 {
            color: #4a148c;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .features-list {
            list-style: none;
            padding: 0;
        }
        .features-list li {
            padding: 8px 0;
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .features-list li::before {
            content: "✅";
            margin-right: 10px;
            font-size: 16px;
        }
        .facilities-section {
            text-align: left;
            margin-bottom: 25px;
            background: #fff8dc;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #ffa500;
        }
        .facilities-section h3 {
            color: #ff8c00;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }
        .facility-item {
            display: flex;
            align-items: center;
            font-size: 14px;
            padding: 5px 0;
        }
        .facility-item::before {
            content: "🎯";
            margin-right: 8px;
        }
        .payment-details {
            text-align: left;
            margin-bottom: 25px;
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
        }
        .payment-details h2 {
            font-size: 20px;
            border-bottom: 2px solid #764ba2;
            padding-bottom: 8px;
            margin-bottom: 15px;
            color: #4a148c;
        }
        .item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }
        .item:last-child {
            border-bottom: none;
        }
        .item-name {
            font-weight: 600;
            color: #333;
        }
        .item-price {
            color: #4a148c;
            font-weight: 700;
        }
        .total {
            margin-top: 20px;
            font-size: 22px;
            font-weight: 800;
            color: #1b5e20;
            text-align: right;
            background: #e8f5e8;
            padding: 10px;
            border-radius: 8px;
        }
        .terms-section {
            text-align: left;
            margin-bottom: 25px;
            background: #fff5f5;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ffcccb;
        }
        .checkbox-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .checkbox-container input[type="checkbox"] {
            margin-right: 10px;
            margin-top: 3px;
            transform: scale(1.2);
        }
        .checkbox-container label {
            font-size: 14px;
            line-height: 1.4;
            cursor: pointer;
        }
        .terms-link {
            color: #4a148c;
            text-decoration: underline;
            cursor: pointer;
        }
        button#pay-button {
            background: #4a148c;
            color: white;
            border: none;
            padding: 14px 0;
            width: 100%;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 6px 12px rgba(74, 20, 140, 0.5);
            transition: all 0.3s ease;
        }
        button#pay-button:hover:not(:disabled) {
            background: #6a1b9a;
            box-shadow: 0 8px 20px rgba(106, 27, 154, 0.7);
        }
        button#pay-button:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }
        .warning-text {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 25px 20px;
            }
            .facilities-grid {
                grid-template-columns: 1fr;
            }
            .payment-details h2 {
                font-size: 18px;
            }
            .item {
                font-size: 14px;
            }
            .total {
                font-size: 20px;
            }
            button#pay-button {
                font-size: 16px;
                padding: 12px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎓 Heart Horizon Class - Checkout</h1>

        <div class="user-info">
            <p>👤 Halo, <strong>{{ auth()->user()->name }}</strong></p>
            <p>📧 Email: <strong>{{ auth()->user()->email }}</strong></p>
            <p>📱 Nomor Telepon: <strong>{{ auth()->user()->phone_number }}</strong></p>
        </div>

        <!-- Fitur yang akan didapatkan -->
        <div class="features-section">
            <h3>🌟 Fitur yang Akan Anda Dapatkan:</h3>
            <ul class="features-list">
                <li>Akses seumur hidup ke semua materi kursus</li>
                <li>Video pembelajaran berkualitas HD dengan subtitle</li>
                <li>E-book dan materi downloadable</li>
                <li>Quiz interaktif dan latihan praktis</li>
                <li>Sertifikat resmi setelah menyelesaikan kursus</li>
                <li>Akses ke komunitas eksklusif Heart Horizon</li>
                <li>Update materi terbaru secara gratis</li>
                <li>Mobile app untuk belajar di mana saja</li>
            </ul>
        </div>

        <!-- Fasilitas -->
        <div class="facilities-section">
            <h3>🏆 Fasilitas Premium:</h3>
            <div class="facilities-grid">
                <div class="facility-item">Live Session dengan Mentor</div>
                <div class="facility-item">1-on-1 Mentoring Session</div>
                <div class="facility-item">24/7 Support via Chat</div>
                <div class="facility-item">Job Placement Assistance</div>
                <div class="facility-item">Portfolio Review</div>
                <div class="facility-item">Networking Events</div>
                <div class="facility-item">Career Guidance</div>
                <div class="facility-item">Industry Projects</div>
            </div>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="payment-details">
            <h2>💳 Rincian Pembayaran</h2>
            @foreach ($params['item_details'] as $item)
                <div class="item">
                    <div class="item-name">{{ $item['name'] }} (x{{ $item['quantity'] }})</div>
                    <div class="item-price">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                </div>
            @endforeach
            <div class="total">
                💰 Total Pembayaran: Rp {{ number_format($grossAmount, 0, ',', '.') }}
            </div>
        </div>
     <!-- Cek Status Pembayaran -->

        <button id="check-status-button" onclick="checkPaymentStatus()">Cek Status Pembayaran</button>

        <div id="status-message" style="margin-top: 20px; font-size: 16px;"></div>
        <!-- Persetujuan Syarat dan Ketentuan -->
        <div class="terms-section">
            <div class="checkbox-container">
                <input type="checkbox" id="terms-checkbox" required>
                <label for="terms-checkbox">
                    Saya telah membaca dan menyetujui <span class="terms-link" onclick="openTermsModal()">Syarat dan Ketentuan</span>, serta
                    <span class="terms-link" onclick="openPrivacyModal()">Kebijakan Privasi</span>, 
                  Heart Horizon.
                </label>
            </div>
            
            <div class="checkbox-container">
                <input type="checkbox" id="newsletter-checkbox">
                <label for="newsletter-checkbox">
                    Saya ingin menerima newsletter dan update terbaru dari Heart Horizon (opsional)
                </label>
            </div>
            
            <div class="warning-text" id="warning-text">
                ⚠️ Anda harus menyetujui syarat dan ketentuan untuk melanjutkan pembayaran
            </div>
        </div>

        <button id="pay-button" disabled>🔒 Bayar Sekarang</button>
        
<script>
        const termsCheckbox = document.getElementById('terms-checkbox');
        const payButton = document.getElementById('pay-button');
        const warningText = document.getElementById('warning-text');
        const statusMessage = document.getElementById('status-message');

        // Enable/disable pay button based on checkbox
        termsCheckbox.addEventListener('change', function() {
            if (this.checked) {
                payButton.disabled = false;
                payButton.innerHTML = '💳 Bayar Sekarang';
                warningText.style.display = 'none';
            } else {
                payButton.disabled = true;
                payButton.innerHTML = '🔒 Bayar Sekarang';
                warningText.style.display = 'block';
            }
        });

        // Payment button click handler
        document.getElementById('pay-button').addEventListener('click', function () {
            if (!termsCheckbox.checked) {
                alert('Silakan setujui syarat dan ketentuan terlebih dahulu!');
                return;
            }

            // Kirim request untuk membuat transaksi dan dapatkan snap token
            fetch('/create-transaction', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(@json($params))
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            alert('🎉 Pembayaran berhasil! Selamat datang di Heart Horizon Class!');
                            window.location.href = '/payment/invoice?order_id={{ $orderId }}';
                        },
                        onPending: function(result) {
                            alert('⏳ Pembayaran pending. Silakan selesaikan pembayaran Anda.');
                        },
                        onError: function(result) {
                            alert('❌ Pembayaran gagal. Silakan coba lagi atau hubungi customer service.');
                        },
                        onClose: function() {
                            alert('❗ Anda menutup popup pembayaran. Transaksi dibatalkan.');
                        }
                    });
                } else {
                    alert('❌ Gagal mendapatkan token pembayaran. Silakan refresh halaman dan coba lagi.');
                }
            })
            .catch(error => {
                alert('🚫 Terjadi kesalahan sistem: ' + error.message);
            });
        });

        // Cek status pembayaran
       // Cek status pembayaran
// Fungsi untuk memeriksa status pembayaran
function checkPaymentStatus() {
    const orderId = '{{ $orderId }}';  // Gantilah dengan order_id yang sesuai
    console.log('Checking status for order_id:', orderId);

    fetch(`/check-payment-status/${orderId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);  // Debugging untuk melihat status dan payment_type

            // Tambahkan pengecekan jika ada error di response
            if (data.error) {
                statusMessage.innerText = '❌ Transaksi tidak ditemukan.';
                statusMessage.style.color = 'red';  // Warna merah untuk error
                return;  // Stop eksekusi lebih lanjut
            }

            // Jika status adalah 'settlement' atau 'capture', tampilkan sukses
            if (data.status === 'settlement' || data.status === 'capture') {
                statusMessage.innerText = '🎉 Pembayaran berhasil! Transaksi selesai.';
                statusMessage.style.color = 'green'; // Beri warna hijau untuk sukses

                // Menambahkan pop-up untuk redirect ke invoice
                if (window.confirm('Pembayaran berhasil! Klik OK untuk melihat invoice Anda.')) {
                    // Redirect ke halaman invoice
                    window.location.href = `/payment/invoice?order_id=${orderId}`;
                }

            } else if (data.status === 'pending') {
                statusMessage.innerText = `Pembayaran Anda masih pending.`;

                // Tambahkan logika untuk memeriksa jenis pembayaran
                if (data.payment_type === 'bank_transfer') {
                    if (data.va_number) {
                        statusMessage.innerHTML += `<br> Gunakan nomor VA berikut: <strong>${data.va_number}</strong>`;
                    } else {
                        statusMessage.innerHTML += `<br> VA number tidak tersedia.`;
                    }

                } else if (data.payment_type === 'cstore') {
                    if (data.payment_code) {
                        statusMessage.innerHTML += `<br> Gunakan kode pembayaran berikut: <strong>${data.payment_code}</strong>`;
                    } else {
                        statusMessage.innerHTML += `<br> Payment code tidak tersedia.`;
                    }
                }

                // Menangani Mandiri E-Channel dengan biller_code dan bill_key
                if (data.payment_type === 'echannel') {
                    if (data.biller_code && data.bill_key) {
                        statusMessage.innerHTML += `<br> Gunakan biller code berikut: <strong>${data.biller_code}</strong>`;
                        statusMessage.innerHTML += `<br> Gunakan bill key berikut: <strong>${data.bill_key}</strong>`;
                    } else {
                        statusMessage.innerHTML += `<br> Biller code atau bill key tidak tersedia.`;
                    }
                }

                statusMessage.style.color = 'orange'; // Warna untuk pending
            } else if (data.status === 'failed') {
                statusMessage.innerText = '❌ Pembayaran gagal, silakan coba lagi.';
                statusMessage.style.color = 'red'; // Warna merah untuk gagal
            } else {
                statusMessage.innerText = 'Status pembayaran tidak diketahui.';
            }
        })
        .catch(error => {
            console.error(error);
            statusMessage.innerText = 'Terjadi kesalahan saat memeriksa status pembayaran.';
            statusMessage.style.color = 'red';
        });
}



        // Modal functions (you can implement these)
        function openTermsModal() {
            alert('Modal Syarat dan Ketentuan akan dibuka di sini');
            // Implement modal or redirect to terms page
        }

        function openPrivacyModal() {
            alert('Modal Kebijakan Privasi akan dibuka di sini');
            // Implement modal or redirect to privacy page
        }
        // Fungsi untuk memulai pembayaran
function initiatePayment() {
    fetch('/create-transaction', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(@json($params))
    })
    .then(response => response.json())
    .then(data => {
        if (data.snap_token) {
            // Menjalankan Snap dengan token yang sudah dibuat
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    // Handle when payment is successful
                    console.log('Pembayaran Berhasil!', result);
                    // Arahkan ke halaman invoice atau lainnya
                    window.location.href = '/payment/invoice?order_id=' + result.order_id;
                },
                onPending: function(result) {
                    // Handle ketika pembayaran pending
                    console.log('Pembayaran Pending, gunakan kode berikut: ' + result.payment_code);
                    alert('Pembayaran Anda sedang pending. Gunakan kode berikut: ' + result.payment_code);
                },
                onError: function(result) {
                    // Handle ketika terjadi error
                    console.log('Pembayaran Gagal', result);
                    alert('Pembayaran gagal, silakan coba lagi.');
                },
                onClose: function() {
                    // Handle ketika pengguna menutup Snap pop-up
                    console.log('Pop-up Snap ditutup.');
                    alert('Anda menutup pop-up Snap. Transaksi dibatalkan.');
                }
            });
        } else {
            alert('❌ Gagal mendapatkan token pembayaran. Silakan refresh halaman dan coba lagi.');
        }
    })
    .catch(error => {
        console.log('Terjadi kesalahan saat membuat transaksi: ', error);
        alert('Terjadi kesalahan sistem. Coba lagi nanti.');
    });
}

    </script>
</body>
</html>
