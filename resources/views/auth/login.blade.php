@extends('layouts.app')

@section('title', 'Login - Heart Horizon')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #002c14 0%, #000 50%, #002c14 100%);
        min-height: 100vh;
    }

    /* Modern Minimal Animations - HANYA YANG PERLU */
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes subtleGlow {
        0%, 100% { box-shadow: 0 0 20px rgba(0, 255, 136, 0.1); }
        50% { box-shadow: 0 0 30px rgba(0, 255, 136, 0.2); }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    /* Modern Card Design */
    .modern-card {
        background: rgba(0, 44, 20, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 255, 136, 0.2);
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        border-color: rgba(0, 255, 136, 0.3);
        animation: subtleGlow 2s ease-in-out infinite;
    }

    /* Clean Input Design */
    .modern-input {
        background: rgba(0, 0, 0, 0.4);
        border: 2px solid rgba(0, 255, 136, 0.3);
        border-radius: 16px;
        color: #ffffff;
        padding: 16px 20px;
        font-size: 15px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .modern-input:focus {
        outline: none;
        border-color: #00ff88;
        background: rgba(0, 44, 20, 0.3);
        box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
        transform: translateY(-2px);
    }

    .modern-input::placeholder {
        color: rgba(0, 255, 136, 0.6);
    }

    /* Modern Button */
    .modern-btn {
        background: linear-gradient(135deg, #00ff88 0%, #00d96e 100%);
        border: none;
        border-radius: 16px;
        color: #000;
        font-weight: 600;
        padding: 16px 24px;
        transition: all 0.3s ease;
        width: 100%;
        font-size: 16px;
        position: relative;
        overflow: hidden;
    }

    .modern-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0, 255, 136, 0.3);
        background: linear-gradient(135deg, #00d96e 0%, #00ff88 100%);
    }

    /* Clean Typography */
    .modern-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.5rem;
        text-align: center;
        letter-spacing: -0.025em;
    }

    .modern-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 2rem;
        font-weight: 400;
    }

    .modern-label {
        color: #00ff88;
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
    }

    /* Subtle Background Effect - MINIMAL */
    .subtle-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 80%, rgba(0, 255, 136, 0.03) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(0, 255, 136, 0.03) 0%, transparent 50%);
        z-index: 0;
    }

    /* Back Button */
    .back-btn {
        background: rgba(0, 44, 20, 0.6);
        border: 1px solid #00ff88;
        color: #00ff88;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .back-btn:hover {
        background: rgba(0, 255, 136, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 255, 136, 0.2);
    }

    /* Logo Container */
    .logo-container {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #00ff88 0%, #00d96e 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        position: relative;
    }

    .logo-container::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg, #00ff88, transparent, #00ff88);
        border-radius: 22px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .logo-container:hover::before {
        opacity: 0.3;
    }

    /* Error States */
    .error-input {
        border-color: #ff6b6b !important;
        background: rgba(255, 107, 107, 0.1) !important;
    }

    .error-text {
        color: #ff6b6b;
        font-size: 13px;
        margin-top: 6px;
    }

    /* Success/Error Messages */
    .alert-modern {
        border-radius: 16px;
        padding: 16px 20px;
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
    }

    .alert-success {
        background: rgba(0, 255, 136, 0.1);
        border: 1px solid rgba(0, 255, 136, 0.3);
        color: #00ff88;
    }

    .alert-error {
        background: rgba(255, 107, 107, 0.1);
        border: 1px solid rgba(255, 107, 107, 0.3);
        color: #ff6b6b;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-title {
            font-size: 2rem;
        }
        
        .modern-card {
            margin: 16px;
            border-radius: 20px;
            padding: 32px 24px;
        }
    }

    @media (max-width: 640px) {
        .modern-title {
            font-size: 1.75rem;
        }
    }
</style>

<div class="min-h-screen flex items-center justify-center px-4 py-8 relative">
    
    <!-- Subtle Background Effect -->
    <div class="subtle-bg"></div>
    
    <div class="modern-card max-w-md w-full p-10 relative z-10 animate-fadeInUp">
        
        <!-- Back Button -->
        <div class="flex justify-start mb-8">
            <a href="{{ route('welcome') }}" class="back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
            </a>
        </div>
        
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="logo-container">
                <span class="text-3xl">💚</span>
            </div>
            
            <h1 class="modern-title">Welcome Back</h1>
            <p class="modern-subtitle">Lanjutkan journey cinta sehat kamu di Heart Horizon</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
            @csrf
            
            <div>
                <label for="email" class="modern-label">Email</label>
                <input id="email" name="email" type="email" required autofocus
                    class="modern-input @error('email') error-input @enderror"
                    value="{{ old('email') }}" placeholder="Masukkan email kamu" />
                @error('email')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="modern-label">Password</label>
                <input id="password" name="password" type="password" required
                    class="modern-input @error('password') error-input @enderror"
                    placeholder="Masukkan password kamu" />
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="modern-btn">
                Masuk ke Heart Horizon
            </button>

            <!-- Forgot Password Link -->
            <div class="text-center">
                <a href="{{ route('password.request') }}" class="text-green-400 hover:text-green-300 font-medium transition-colors">
                    Lupa password?
                </a>
            </div>
        </form>

        <!-- Status Messages -->
        @if(session('status'))
            <div class="alert-modern alert-success">
                <span>✅</span>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-modern alert-error">
                <span>❌</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Register Link -->
        <div class="mt-8 text-center">
            <p class="text-gray-300">
                Belum join Heart Horizon? 
                <a href="{{ route('register.form') }}" class="text-green-400 hover:text-green-300 transition-colors font-medium ml-1">
                    Daftar di sini
                </a>
            </p>
            <p class="text-sm text-gray-400 mt-2">
                Join 5,000+ remaja yang udah belajar cinta sehat!
            </p>
        </div>
    </div>
</div>

@endsection
