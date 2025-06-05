<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MidtransController;


Route::get("/", function () {
    return view("welcome");
})->name("welcome");
// Routes untuk registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Routes untuk verifikasi email
Route::get('/verify-email/{token}', [AuthController::class, 'verify'])->name('verify.email');
Route::get('/verify-pending', function () {
    return view('auth.verify-pending');
})->name('verify.pending');
Route::post('/resend-verification', [AuthController::class, 'resendVerification'])->name('resend.verification');

// Routes untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/blocked', function () {
    return view('auth.blocked');
})->name('blocked.notice');

Route::get('/redirect', function () {
    return view('admin.redirect');  // Arahkan ke view redirect admin
})->middleware('auth', 'admin');  // Pastikan hanya admin yang bisa mengakses

// Cek status pembayaran berdasarkan order_id
Route::get('/check-payment-status/{orderId}', [MidtransController::class, 'checkPaymentStatus']);



Route::get('/payment', [MidtransController::class, 'showPaymentPage'])->name('payment.index')->middleware('auth');

Route::post('/create-transaction', [MidtransController::class, 'createTransaction']);
Route::get('/payment/invoice', [MidtransController::class, 'showInvoice'])->name('invoice.show');
// routes/web.php
Route::get('/payment/process', [MidtransController::class, 'processPayment'])->name('payment.process');



Route::middleware(['auth', 'check.blocked', 'check.ispaid'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Kategori dan video
    Route::get('/category/{category}', [DashboardController::class, 'showCategory'])->name('category.show');
    Route::get('/video/{video}', [DashboardController::class, 'showVideo'])->name('video.show');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
