@extends('layouts.app')

@section('title', 'Login - Heart Horizon Class')

@section('content')
<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

body {
    font-family: 'Poppins', sans-serif;
    background: #000;
}

@keyframes blob {
    0%, 100% { transform: translate(0px, 0px) scale(1);}
    33% { transform: translate(30px, -50px) scale(1.1);}
    66% { transform: translate(-20px, 20px) scale(0.9);}
}
@keyframes float {
    0%, 100% { transform: translateY(0px);}
    50% { transform: translateY(-15px);}
}
@keyframes heartbeat {
    0%, 100% { transform: scale(1);}
    50% { transform: scale(1.1);}
}
@keyframes sparkle {
    0%, 100% { opacity: 0.3; transform: scale(0.8) rotate(0deg);}
    50% { opacity: 1; transform: scale(1.2) rotate(180deg);}
}
@keyframes slideInUp {
    0% { opacity: 0; transform: translateY(50px);}
    100% { opacity: 1; transform: translateY(0);}
}
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px);}
    100% { opacity: 1; transform: translateY(0);}
}
@keyframes gradientShift {
    0% { background-position: 0% 50%;}
    50% { background-position: 100% 50%;}
    100% { background-position: 0% 50%;}
}
@keyframes shimmer {
    0% { transform: translateX(-100%);}
    100% { transform: translateX(100%);}
}
@keyframes pulse-ring {
    0% { transform: scale(0.8); opacity: 1;}
    100% { transform: scale(1.5); opacity: 0;}
}

.animate-blob { animation: blob 7s infinite;}
.animation-delay-2000 { animation-delay: 2s;}
.animation-delay-4000 { animation-delay: 4s;}
.animate-float { animation: float 6s ease-in-out infinite;}
.animate-heartbeat { animation: heartbeat 2s ease-in-out infinite;}
.animate-sparkle { animation: sparkle 4s ease-in-out infinite;}
.animate-slideInUp { animation: slideInUp 0.8s ease-out forwards;}
.animate-fadeIn { animation: fadeIn 0.6s ease-out forwards;}

.love-gradient {
    background: linear-gradient(135deg, #002c14 0%, #00ff88 60%, #ffffff 100%);
    background-size: 200% 200%;
    animation: gradientShift 4s ease infinite;
}
.teen-gradient {
    background: linear-gradient(135deg, #002c14 0%, #000 100%);
}
.glass-effect {
    backdrop-filter: blur(20px);
    background: rgba(0,44,20,0.85);
    border: 1px solid rgba(0,255,136,0.2);
    box-shadow: 0 25px 50px rgba(0,44,20,0.25);
}
.background-enhanced {
    background: linear-gradient(135deg, #002c14 0%, #000 50%, #002c14 100%);
    background-size: 400% 400%;
    animation: gradientShift 8s ease infinite;
    position: relative;
    overflow: hidden;
}
.background-enhanced::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hearts" x="0" y="0" width="25" height="25" patternUnits="userSpaceOnUse"><text x="12.5" y="18" text-anchor="middle" fill="rgba(0,255,136,0.04)" font-size="14">💚</text></pattern></defs><rect width="100" height="100" fill="url(%23hearts)"/></svg>');
    opacity: 0.15;
    z-index: 0;
}

.floating-hearts {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: 1;
}
.floating-heart {
    position: absolute;
    color: rgba(0,255,136,0.18);
    font-size: 1.5rem;
    animation: float 12s ease-in-out infinite;
    filter: drop-shadow(0 2px 8px #002c14);
}
.floating-heart:nth-child(1) { left: 5%; top: 20%; animation-delay: 0s;}
.floating-heart:nth-child(2) { left: 15%; top: 60%; animation-delay: 2s;}
.floating-heart:nth-child(3) { left: 25%; top: 10%; animation-delay: 4s;}
.floating-heart:nth-child(4) { left: 35%; top: 80%; animation-delay: 6s;}
.floating-heart:nth-child(5) { left: 45%; top: 30%; animation-delay: 8s;}
.floating-heart:nth-child(6) { left: 55%; top: 70%; animation-delay: 10s;}
.floating-heart:nth-child(7) { left: 65%; top: 15%; animation-delay: 1s;}
.floating-heart:nth-child(8) { left: 75%; top: 50%; animation-delay: 3s;}
.floating-heart:nth-child(9) { left: 85%; top: 25%; animation-delay: 5s;}
.floating-heart:nth-child(10) { left: 95%; top: 75%; animation-delay: 7s;}

.input-enhanced {
    transition: all 0.3s ease;
    position: relative;
    background: rgba(0,0,0,0.7);
    color: #fff;
    border-color: #002c14;
}
.input-enhanced:focus {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,255,136,0.25) !important;
    border-color: #00ff88 !important;
    background: rgba(0,44,20,0.8);
    color: #fff;
}
.input-enhanced::placeholder {
    color: #00ff88;
    opacity: 0.7;
}

.btn-enhanced {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    background: linear-gradient(90deg, #002c14 0%, #000 100%);
    color: #fff;
    border: none;
}
.btn-enhanced:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0,255,136,0.4);
    background: linear-gradient(90deg, #000 0%, #002c14 100%);
}
.btn-enhanced::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.08), transparent);
    transition: left 0.5s;
}
.btn-enhanced:hover::before {
    left: 100%;
}

.back-btn {
    background: rgba(0,44,20,0.8);
    border: 1px solid #00ff88;
    color: #00ff88;
    padding: 8px 12px;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    font-size: 18px;
    font-weight: bold;
}
.back-btn:hover {
    background: rgba(0,255,136,0.2);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,255,136,0.3);
    color: #fff;
    border-color: #fff;
}

.label-enhanced {
    position: relative;
    font-weight: 600;
    color: #00ff88;
    transition: all 0.3s ease;
}
.label-enhanced::before {
    content: '💚';
    margin-right: 0.5rem;
    font-size: 0.875rem;
    opacity: 0.7;
}

.icon-enhanced {
    position: relative;
}
.icon-enhanced::before {
    content: '';
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 80px; height: 80px;
    border: 2px solid rgba(0,255,136,0.25);
    border-radius: 50%;
    animation: pulse-ring 2s infinite;
}

.link-enhanced {
    position: relative;
    transition: all 0.3s ease;
    color: #00ff88;
}
.link-enhanced::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0;
    width: 0; height: 2px;
    background: linear-gradient(90deg, #002c14, #00ff88);
    transition: width 0.3s ease;
}
.link-enhanced:hover::after {
    width: 100%;
}

.card-enhanced {
    position: relative;
    z-index: 10;
}
.card-enhanced::before {
    content: '';
    position: absolute;
    top: -2px; left: -2px; right: -2px; bottom: -2px;
    background: linear-gradient(45deg, #002c14, #000, #00ff88, #002c14);
    border-radius: 1.75rem;
    z-index: -1;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.card-enhanced:hover::before {
    opacity: 0.18;
}

.sparkle-bg {
    position: absolute;
    top: 10%; left: 10%;
    width: 6px; height: 6px;
    color: #00ff88;
    animation: sparkle 3s ease-in-out infinite;
    filter: drop-shadow(0 0 8px #002c14);
}
.sparkle-bg:nth-child(2) {
    top: 20%; right: 15%; left: auto;
    animation-delay: 1s;
    color: #fff;
}
.sparkle-bg:nth-child(3) {
    bottom: 25%; left: 20%; top: auto;
    animation-delay: 2s;
    color: #002c14;
}
.sparkle-bg:nth-child(4) {
    bottom: 15%; right: 25%; top: auto; left: auto;
    animation-delay: 3s;
    color: #00ff88;
}

.alert-enhanced {
    position: relative;
    overflow: hidden;
    background: rgba(0,44,20,0.1);
    color: #fff;
    border: 1px solid #00ff88;
}
.alert-enhanced::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.08), transparent);
    animation: shimmer 2s infinite;
}

/* Color overrides for the new theme */
.text-gray-600, .text-gray-500, .text-gray-700 {
    color: #00ff88 !important;
}
.text-pink-600, .text-pink-800, .text-blue-600, .text-blue-800 {
    color: #00ff88 !important;
}
.text-red-600, .text-red-700 {
    color: #ff6b6b !important;
}
.text-green-700 {
    color: #00ff88 !important;
}
.bg-gradient-to-r {
    background: linear-gradient(90deg, #002c14 0%, #000 100%) !important;
}
.bg-clip-text {
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
}
.shadow-lg, .shadow-2xl {
    box-shadow: 0 8px 32px 0 rgba(0,255,136,0.25) !important;
}
.rounded-2xl, .rounded-3xl {
    border-radius: 1.5rem !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .back-btn {
        width: 36px;
        height: 36px;
        font-size: 16px;
    }
    
    .glass-effect {
        margin: 0 10px;
        padding: 2rem;
    }
    
    .floating-heart {
        font-size: 1.2rem;
    }
}

@media (max-width: 640px) {
    .glass-effect {
        padding: 1.5rem;
    }
}
</style>

<div class="min-h-screen flex items-center justify-center background-enhanced relative overflow-hidden px-4 py-12">
    
    <!-- Floating Hearts Background -->
    <div class="floating-hearts">
        <div class="floating-heart">💕</div>
        <div class="floating-heart">💖</div>
        <div class="floating-heart">💝</div>
        <div class="floating-heart">💗</div>
        <div class="floating-heart">💓</div>
        <div class="floating-heart">💕</div>
        <div class="floating-heart">💖</div>
        <div class="floating-heart">💝</div>
        <div class="floating-heart">💗</div>
        <div class="floating-heart">💓</div>
    </div>

    <!-- Sparkle Elements -->
    <div class="sparkle-bg">✨</div>
    <div class="sparkle-bg">⭐</div>
    <div class="sparkle-bg">💫</div>
    <div class="sparkle-bg">✨</div>

    <!-- Animasi background lingkaran -->
    <div aria-hidden="true" class="absolute -top-32 -left-32 w-96 h-96 bg-gradient-to-r from-green-900 to-green-700 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div aria-hidden="true" class="absolute top-20 right-20 w-72 h-72 bg-gradient-to-r from-green-800 to-black rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-2000"></div>
    <div aria-hidden="true" class="absolute bottom-20 left-20 w-72 h-72 bg-gradient-to-r from-black to-green-900 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-4000"></div>

    <div class="relative glass-effect rounded-3xl shadow-2xl max-w-md w-full p-10 z-10 card-enhanced animate-slideInUp">
        
        <!-- Back Button Inside Content -->
        <div class="flex justify-start mb-6">
            <a href="{{ route('welcome') }}" class="back-btn animate-fadeIn">
                <
            </a>
        </div>
        
        <div class="flex flex-col items-center mb-8">
            <div class="love-gradient rounded-full p-4 mb-4 animate-heartbeat icon-enhanced">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-green-400 via-green-300 to-white bg-clip-text text-transparent animate-fadeIn">Welcome Back! 💕</h1>
            <p class="text-gray-300 mt-2 text-center animate-fadeIn" style="animation-delay: 0.2s;">Lanjutkan journey cinta sehat kamu di Heart Horizon Class</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
            @csrf
            <div class="animate-fadeIn" style="animation-delay: 0.3s;">
                <label for="email" class="label-enhanced block text-sm font-semibold mb-1">Email</label>
                <input id="email" name="email" type="email" required autofocus
                    class="input-enhanced w-full rounded-2xl border-2 px-4 py-3 focus:outline-none focus:ring-0 @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}" placeholder="Masukkan email kamu" />
                @error('email')
                    <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="animate-fadeIn" style="animation-delay: 0.4s;">
                <label for="password" class="label-enhanced block text-sm font-semibold mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="input-enhanced w-full rounded-2xl border-2 px-4 py-3 focus:outline-none focus:ring-0 @error('password') border-red-500 @enderror"
                    placeholder="Masukkan password kamu" />
                @error('password')
                    <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="btn-enhanced w-full py-4 love-gradient text-white font-bold rounded-2xl shadow-lg transition duration-300 animate-fadeIn"
                style="animation-delay: 0.5s;">
                <span class="relative z-10">
                    💕 Masuk ke Heart Horizon Class
                </span>
            </button>

            <!-- Link Lupa Password -->
            <div class="mt-4 text-center">
                <a href="{{ route('password.request') }}" class="text-green-400 hover:text-green-300 font-semibold link-enhanced">
                    Lupa password?
                </a>
            </div>
        </form>

        @if(session('status'))
            <div class="alert-enhanced mt-6 p-4 bg-gradient-to-r from-green-900 to-green-800 border border-green-400 text-green-300 rounded-2xl text-center font-semibold animate-fadeIn" style="animation-delay: 0.6s;">
                <span class="mr-2">✅</span>{{ session('status') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-enhanced mt-6 p-4 bg-gradient-to-r from-red-900 to-red-800 border border-red-400 text-red-300 rounded-2xl text-center font-semibold animate-fadeIn" style="animation-delay: 0.6s;">
                <span class="mr-2">❌</span>{{ session('error') }}
            </div>
        @endif

        <div class="mt-8 text-center animate-fadeIn" style="animation-delay: 0.7s;">
            <p class="text-gray-300">
                Belum join Heart Horizon Class? 
                <a href="{{ route('register.form') }}" class="text-green-400 font-semibold hover:text-green-300 transition-colors link-enhanced">Daftar di sini</a>
            </p>
            <p class="text-sm text-gray-400 mt-2">
                <span class="animate-heartbeat inline-block mr-1">💖</span>
                Join 5,000+ remaja yang udah belajar cinta sehat!
            </p>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection
