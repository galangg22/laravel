@extends('layouts.app')

@section('title', 'Register - Heart Horizon')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #002c14 0%, #000 50%, #002c14 100%);
        min-height: 100vh;
    }

    /* Minimal Animations */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .animate-slideUp {
        animation: slideUp 0.8s ease-out forwards;
    }

    /* Simple Card */
    .simple-card {
        background: rgba(0, 44, 20, 0.15);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 255, 136, 0.2);
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    /* Clean Input */
    .clean-input {
        background: rgba(0, 0, 0, 0.4);
        border: 2px solid rgba(0, 255, 136, 0.3);
        border-radius: 12px;
        color: #ffffff;
        padding: 14px 18px;
        font-size: 15px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .clean-input:focus {
        outline: none;
        border-color: #00ff88;
        background: rgba(0, 44, 20, 0.3);
        box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
    }

    .clean-input::placeholder {
        color: rgba(0, 255, 136, 0.6);
    }

    /* Simple Button */
    .simple-btn {
        background: linear-gradient(135deg, #00ff88 0%, #00d96e 100%);
        border: none;
        border-radius: 12px;
        color: #000;
        font-weight: 600;
        padding: 16px 24px;
        transition: all 0.3s ease;
        width: 100%;
        font-size: 16px;
    }

    .simple-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
        background: linear-gradient(135deg, #00d96e 0%, #00ff88 100%);
    }

    .simple-btn:disabled {
        background: rgba(0, 255, 136, 0.2);
        color: rgba(0, 255, 136, 0.5);
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    /* Clean Checkbox */
    .clean-checkbox {
        appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid #00ff88;
        border-radius: 4px;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        flex-shrink: 0;
    }

    .clean-checkbox:checked {
        background: #00ff88;
        border-color: #00ff88;
    }

    .clean-checkbox:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #000;
        font-size: 12px;
        font-weight: bold;
    }

    /* Simple Typography */
    .simple-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.5rem;
        text-align: center;
    }

    .simple-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 2rem;
    }

    .simple-label {
        color: #00ff88;
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 6px;
        display: block;
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

    /* Feature List */
    .feature-list {
        background: rgba(0, 44, 20, 0.2);
        border-radius: 16px;
        padding: 24px;
        border: 1px solid rgba(0, 255, 136, 0.1);
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        margin-bottom: 12px;
    }

    .feature-item:last-child {
        margin-bottom: 0;
    }

    .feature-icon {
        color: #00ff88;
        font-size: 16px;
        width: 20px;
        text-align: center;
    }

    /* Error States */
    .error-input {
        border-color: #ff6b6b !important;
        background: rgba(255, 107, 107, 0.1) !important;
    }

    .error-text {
        color: #ff6b6b;
        font-size: 13px;
        margin-top: 4px;
    }

    /* Success Message */
    .success-message {
        background: rgba(0, 255, 136, 0.1);
        border: 1px solid rgba(0, 255, 136, 0.3);
        border-radius: 12px;
        padding: 16px;
        color: #00ff88;
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .simple-title {
            font-size: 2rem;
        }
        
        .simple-card {
            margin: 16px;
            border-radius: 16px;
        }
        
        .feature-list {
            padding: 20px;
        }
    }

    @media (max-width: 640px) {
        .simple-card {
            padding: 24px !important;
        }
        
        .simple-title {
            font-size: 1.75rem;
        }
    }
</style>

<div class="min-h-screen flex items-center justify-center px-4 py-8">
    <div class="simple-card max-w-5xl w-full flex flex-col lg:flex-row overflow-hidden animate-fadeIn">
        
        <!-- Back Button -->
        <div class="absolute top-6 left-6 z-20">
            <a href="{{ route('welcome') }}" class="back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
            </a>
        </div>
        
        <!-- Left Side - Info -->
        <div class="lg:w-2/5 p-8 lg:p-12 flex flex-col justify-center animate-slideUp">
            <div class="text-center lg:text-left mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500/20 to-green-600/20 border-2 border-green-500/30 rounded-2xl flex items-center justify-center mx-auto lg:mx-0 mb-6">
                    <span class="text-3xl">💚</span>
                </div>
                
                <h2 class="text-3xl font-bold text-white mb-4">Heart Horizon</h2>
                <p class="text-gray-300 text-lg leading-relaxed">
                    Platform pembelajaran percintaan sehat untuk remaja Indonesia
                </p>
            </div>
            
            <div class="feature-list">
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>100% Gratis & Aman</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Materi dari Psikolog Expert</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Komunitas Supportif</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>5,000+ Remaja Bergabung</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="lg:w-3/5 p-8 lg:p-12">
            <div class="max-w-md mx-auto">
                <h3 class="simple-title">Daftar Sekarang</h3>
                <p class="simple-subtitle">Mulai journey cinta sehat kamu hari ini</p>
                
                <form method="POST" action="{{ route('register.submit') }}" id="registerForm" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="name" class="simple-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="clean-input @error('name') error-input @enderror"
                            placeholder="Masukkan nama lengkap" />
                        @error('name')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="simple-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="clean-input @error('email') error-input @enderror"
                            placeholder="nama@email.com" />
                        @error('email')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number" class="simple-label">Nomor Telepon</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required
                            class="clean-input @error('phone_number') error-input @enderror"
                            placeholder="08xxxxxxxxxx" />
                        @error('phone_number')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="simple-label">Password</label>
                        <input type="password" id="password" name="password" required
                            class="clean-input @error('password') error-input @enderror"
                            placeholder="Minimal 8 karakter" />
                        @error('password')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="simple-label">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="clean-input"
                            placeholder="Ulangi password" />
                    </div>

                    <div class="flex items-start space-x-3 pt-2">
                        <input id="terms" type="checkbox" class="clean-checkbox mt-1" />
                        <label for="terms" class="text-sm text-white leading-relaxed">
                            Saya setuju dengan 
                            <a href="#" class="text-green-400 hover:text-green-300 transition-colors underline">
                                Syarat dan Ketentuan
                            </a> 
                            Heart Horizon
                        </label>
                    </div>

                    <button type="submit" disabled id="submitBtn" class="simple-btn mt-6">
                        Daftar Sekarang
                    </button>
                </form>

                @if(session('status'))
                    <div class="success-message">
                        <span>✅</span>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <div class="mt-8 text-center">
                    <p class="text-gray-300">
                        Sudah punya akun?
                        <a href="{{ route('login.form') }}" class="text-green-400 hover:text-green-300 transition-colors font-medium ml-1 underline">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const termsCheck = document.getElementById('terms');
    const submitBtn = document.getElementById('submitBtn');

    // Enable submit button only if terms checkbox is checked
    termsCheck.addEventListener('change', () => {
        submitBtn.disabled = !termsCheck.checked;
    });

    // Form validation enhancement
    const inputs = document.querySelectorAll('.clean-input');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '' && this.hasAttribute('required')) {
                this.classList.add('error-input');
            } else {
                this.classList.remove('error-input');
            }
        });

        input.addEventListener('input', function() {
            this.classList.remove('error-input');
        });
    });

    // Password confirmation validation
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');

    confirmPassword.addEventListener('blur', function() {
        if (this.value !== password.value && this.value !== '') {
            this.classList.add('error-input');
        } else {
            this.classList.remove('error-input');
        }
    });
});
</script>
@endsection
