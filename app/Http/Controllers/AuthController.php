<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\VerifyEmail;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Buat user baru dengan token verifikasi
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'verification_token' => Str::random(32),  // Generate token verifikasi
        ]);

        // Kirim email verifikasi
        Mail::to($user->email)->send(new VerifyEmail($user));

        // Redirect ke halaman verifikasi setelah registrasi
        return redirect()->route('verify.pending')->with('status', 'Registrasi berhasil, segera cek email anda!');
    }

    // Proses verifikasi email
    public function verify($token)
    {
        // Cari user berdasarkan token verifikasi
        $user = User::where('verification_token', $token)->first();

        if ($user) {
            // Set email_verified_at dan hapus token
            $user->email_verified_at = now();
            $user->verification_token = null;
            $user->save();

            // Redirect ke halaman login dengan status verifikasi sukses
            return redirect()->route('login.form')->with('status', 'Email terVerifikasi!');
        } else {
            // Jika token tidak valid
            return redirect()->route('login.form')->with('error', 'Verifikasi tidak valid.');
        }
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek apakah kredensial valid
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Cek apakah admin, jika ya, langsung arahkan ke panel admin Filament
            if ($user->role === 'admin') {
                return redirect('redirect'); // Filament default route untuk admin
            }

            // Pastikan email sudah diverifikasi
            if (!$user->email_verified_at) {
                return redirect()->route('verify.pending'); // Jika email belum diverifikasi
            }

            // Cek apakah akun diblokir
            if ($user->is_blocked) {
                Auth::logout(); // Logout user yang diblokir
                return redirect()->route('login.form')->withErrors(['email' => 'Akun Anda telah diblokir. Hubungi email admin: hearthorizoncourse@gmail.com']);
            }

            // Cek apakah user sudah membayar (is_paid)
            if (!$user->is_paid) {
                return redirect()->route('payment.index')->with('error', 'Silakan selesaikan pembayaran terlebih dahulu.');
            }

            // Jika sudah terverifikasi, tidak diblokir, dan sudah bayar, arahkan ke dashboard user biasa
            return redirect()->route('dashboard.index');
        }

        // Jika login gagal, kembali ke login page dengan error
        return back()->withErrors(['email' => 'Kredensial tidak sesuai']);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    // Tampilkan form lupa password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Halaman form lupa password
    }

    // Kirimkan link reset password
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']); // Validasi email

        $user = User::where('email', $request->email)->first();
        $token = Str::random(32);

        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Kirimkan email reset password
        try {
            Mail::to($request->email)->send(new ResetPassword($user, $token));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal mengirim email reset password.']);
        }

        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    }

    // Tampilkan form reset password
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $reset = PasswordReset::where('token', $request->token)->first();

        if (!$reset) {
            return redirect()->route('login.form')->with('error', 'Token reset tidak valid.');
        }

        $user = User::where('email', $reset->email)->first();

        if (!$user) {
            return redirect()->route('login.form')->with('error', 'Pengguna tidak ditemukan.');
        }

        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password baru tidak boleh sama dengan password lama.']);
        }

        // Update password pengguna di tabel users
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token reset setelah digunakan
        $reset->delete();

        return redirect()->route('login.form')->with('status', 'Password berhasil direset.');
    }
}
