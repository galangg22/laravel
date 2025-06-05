<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsPaid
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        $user = Auth::user();

        // Cek jika user belum bayar
        if ($user && !$user->is_paid) {
            // Redirect ke halaman pembayaran jika belum bayar
            return redirect()->route('payment.index')->with('error', 'Silakan selesaikan pembayaran terlebih dahulu.');
        }

        // Jika sudah bayar, lanjutkan ke request berikutnya
        return $next($request);
    }
}
