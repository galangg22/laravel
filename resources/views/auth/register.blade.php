@extends('layouts.app')

@section('title', 'Register - Heart Horizon Class')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

body {
    font-family: 'Poppins', sans-serif;
    background: #000;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes sparkle {
    0%, 100% { opacity: 0.3; transform: scale(0.8) rotate(0deg); }
    50% { opacity: 1; transform: scale(1.2) rotate(180deg); }
}

@keyframes slideInLeft {
    0% { opacity: 0; transform: translateX(-50px); }
    100% { opacity: 1; transform: translateX(0); }
}

@keyframes slideInRight {
    0% { opacity: 0; transform: translateX(50px); }
    100% { opacity: 1; transform: translateX(0); }
}

@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-heartbeat {
    animation: heartbeat 2s ease-in-out infinite;
}

.animate-sparkle {
    animation: sparkle 4s ease-in-out infinite;
}

.animate-slideInLeft {
    animation: slideInLeft 0.8s ease-out forwards;
}

.animate-slideInRight {
    animation: slideInRight 0.8s ease-out forwards;
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out forwards;
}

.love-gradient {
    background: linear-gradient(135deg, #002c14 0%, #00ff88 50%, #ffffff 100%);
    background-size: 200% 200%;
    animation: gradientShift 4s ease infinite;
}

.teen-gradient {
    background: linear-gradient(135deg, #002c14 0%, #000 100%);
}

.glass-effect {
    backdrop-filter: blur(15px);
    background: rgba(0, 44, 20, 0.85);
    border: 1px solid rgba(0, 255, 136, 0.2);
    box-shadow: 0 8px 32px 0 rgba(0, 44, 20, 0.25);
}

.input-enhanced {
    transition: all 0.3s ease;
    position: relative;
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
    border-color: #002c14;
}

.input-enhanced:focus {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 255, 136, 0.25) !important;
    border-color: #00ff88 !important;
    background: rgba(0, 44, 20, 0.8);
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

.btn-enhanced:hover:not(:disabled) {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0, 255, 136, 0.4);
    background: linear-gradient(90deg, #000 0%, #002c14 100%);
}

.btn-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.08), transparent);
    transition: left 0.5s;
}

.btn-enhanced:hover::before {
    left: 100%;
}

.back-btn {
    background: rgba(0, 44, 20, 0.8);
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
    background: rgba(0, 255, 136, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 255, 136, 0.3);
    color: #fff;
    border-color: #fff;
}

.floating-hearts {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.floating-heart {
    position: absolute;
    color: rgba(0, 255, 136, 0.18);
    font-size: 1rem;
    animation: float 8s ease-in-out infinite;
    filter: drop-shadow(0 2px 8px #002c14);
}

.floating-heart:nth-child(1) { left: 10%; animation-delay: 0s; }
.floating-heart:nth-child(2) { left: 20%; animation-delay: 1s; }
.floating-heart:nth-child(3) { left: 30%; animation-delay: 2s; }
.floating-heart:nth-child(4) { left: 40%; animation-delay: 3s; }
.floating-heart:nth-child(5) { left: 50%; animation-delay: 4s; }
.floating-heart:nth-child(6) { left: 60%; animation-delay: 5s; }
.floating-heart:nth-child(7) { left: 70%; animation-delay: 6s; }
.floating-heart:nth-child(8) { left: 80%; animation-delay: 7s; }
.floating-heart:nth-child(9) { left: 90%; animation-delay: 8s; }

.label-enhanced {
    position: relative;
    display: inline-flex;
    align-items: center;
    font-weight: 600;
    color: #00ff88;
    margin-bottom: 0.5rem;
}

.label-enhanced::before {
    content: '💚';
    margin-right: 0.5rem;
    font-size: 0.875rem;
}

.checkbox-enhanced {
    position: relative;
    appearance: none;
    width: 1.25rem;
    height: 1.25rem;
    border: 2px solid #00ff88;
    border-radius: 0.375rem;
    background: #000;
    cursor: pointer;
    transition: all 0.3s ease;
}

.checkbox-enhanced:checked {
    background: linear-gradient(135deg, #002c14, #00ff88);
    border-color: #00ff88;
}

.checkbox-enhanced:checked::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 0.875rem;
    font-weight: bold;
}

.form-container {
    position: relative;
    z-index: 10;
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
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hearts" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><text x="10" y="15" text-anchor="middle" fill="rgba(0,255,136,0.04)" font-size="12">💚</text></pattern></defs><rect width="100" height="100" fill="url(%23hearts)"/></svg>');
    opacity: 0.1;
}

/* Color overrides for the new theme */
.text-gray-800, .text-gray-700, .text-gray-600, .text-gray-500 {
    color: #00ff88 !important;
}

.text-pink-600, .text-pink-800, .text-pink-900 {
    color: #00ff88 !important;
}

.text-red-500 {
    color: #ff6b6b !important;
}

.text-green-700 {
    color: #00ff88 !important;
}

.text-yellow-300 {
    color: #ffffff !important;
}

.bg-green-100, .bg-green-700 {
    background: rgba(0, 44, 20, 0.2) !important;
}

.border-green-300 {
    border-color: #00ff88 !important;
}

.border-pink-200, .border-purple-200, .border-indigo-200 {
    border-color: #00ff88 !important;
}

.rounded-2xl, .rounded-3xl {
    border-radius: 1.5rem !important;
}

.shadow-2xl {
    box-shadow: 0 8px 32px 0 rgba(0, 44, 20, 0.25) !important;
}

a.relative.group {
    color: #00ff88 !important;
}

a.relative.group span {
    background: #00ff88 !important;
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

<div class="min-h-screen flex items-center justify-center background-enhanced px-4 py-12">
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
    </div>

    <div class="glass-effect rounded-3xl shadow-2xl max-w-4xl w-full flex flex-col md:flex-row overflow-hidden form-container animate-fadeIn">
        
        <!-- Back Button Inside Content -->
        <div class="absolute top-4 left-4 z-20">
            <a href="{{ route('welcome') }}" class="back-btn animate-fadeIn">
                <
            </a>
        </div>
        
        <!-- Animasi Sisi Kiri -->
        <div class="md:w-1/2 relative love-gradient flex items-center justify-center p-8 animate-slideInLeft">
            <div class="absolute rounded-full bg-green-700 opacity-20 w-40 h-40 top-10 left-10 animate-float"></div>
            <div class="absolute rounded-full bg-green-700 opacity-20 w-24 h-24 bottom-10 right-10 animate-heartbeat"></div>
            <div class="absolute rounded-full bg-green-700 opacity-15 w-32 h-32 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-float" style="animation-delay: 2s;"></div>
            
            <div class="relative z-10 text-white text-center mt-12 md:mt-0">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6 animate-heartbeat">
                    <span class="text-3xl">💕</span>
                </div>
                <h2 class="text-3xl font-bold mb-4">Bergabunglah dengan Heart Horizon Class</h2>
                <p class="text-white leading-relaxed">Platform pembelajaran percintaan sehat terbaik untuk remaja Indonesia. Join 5,000+ teens yang udah belajar cinta sehat! ✨</p>
                
                <div class="mt-8 space-y-3">
                    <div class="flex items-center justify-center space-x-3 text-sm">
                        <span class="text-yellow-300">✓</span>
                        <span>100% Gratis & Aman</span>
                    </div>
                    <div class="flex items-center justify-center space-x-3 text-sm">
                        <span class="text-yellow-300">✓</span>
                        <span>Materi dari Psikolog Expert</span>
                    </div>
                    <div class="flex items-center justify-center space-x-3 text-sm">
                        <span class="text-yellow-300">✓</span>
                        <span>Komunitas Supportif</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Registrasi -->
        <div class="md:w-1/2 p-10 animate-slideInRight">
            <div class="text-center mb-8 mt-8 md:mt-0">
                <h3 class="text-2xl font-semibold text-white mb-2">Buat Akun Baru</h3>
                <p class="text-gray-300">Mulai journey cinta sehat kamu hari ini! 🌟</p>
            </div>
            
            <form method="POST" action="{{ route('register.submit') }}" id="registerForm" class="space-y-6">
                @csrf
                <div class="animate-fadeIn" style="animation-delay: 0.1s;">
                    <label for="name" class="label-enhanced">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="input-enhanced w-full px-4 py-3 border-2 rounded-2xl focus:outline-none focus:ring-0 @error('name') border-red-500 @enderror"
                        placeholder="Siapa nama kamu?" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="animate-fadeIn" style="animation-delay: 0.2s;">
                    <label for="email" class="label-enhanced">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="input-enhanced w-full px-4 py-3 border-2 rounded-2xl focus:outline-none focus:ring-0 @error('email') border-red-500 @enderror"
                        placeholder="Email kamu" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="animate-fadeIn" style="animation-delay: 0.3s;">
                    <label for="phone_number" class="label-enhanced">Nomor Telepon</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required
                        class="input-enhanced w-full px-4 py-3 border-2 rounded-2xl focus:outline-none focus:ring-0 @error('phone_number') border-red-500 @enderror"
                        placeholder="Nomor WA kamu" />
                    @error('phone_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="animate-fadeIn" style="animation-delay: 0.4s;">
                    <label for="password" class="label-enhanced">Password</label>
                    <input type="password" id="password" name="password" required
                        class="input-enhanced w-full px-4 py-3 border-2 rounded-2xl focus:outline-none focus:ring-0 @error('password') border-red-500 @enderror"
                        placeholder="Buat password yang kuat" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="animate-fadeIn" style="animation-delay: 0.5s;">
                    <label for="password_confirmation" class="label-enhanced">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="input-enhanced w-full px-4 py-3 border-2 rounded-2xl focus:outline-none focus:ring-0"
                        placeholder="Ulangi password kamu" />
                </div>

                <div class="flex items-start space-x-3 animate-fadeIn" style="animation-delay: 0.6s;">
                    <input id="terms" type="checkbox" class="checkbox-enhanced mt-1" />
                    <label for="terms" class="text-sm text-white leading-relaxed">
                        Saya setuju dengan <a href="#" class="text-green-400 hover:text-green-300 font-semibold transition-colors">Syarat dan Ketentuan</a> Heart Horizon Class dan siap untuk belajar cinta sehat! 💕
                    </label>
                </div>

                <button type="submit" disabled id="submitBtn"
                    class="btn-enhanced w-full py-4 love-gradient text-white rounded-2xl font-bold shadow-lg disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-300 animate-fadeIn"
                    style="animation-delay: 0.7s;">
                    <span class="relative z-10">💕 Daftar & Mulai Journey Cinta Sehat!</span>
                </button>
            </form>

            @if(session('status'))
                <div class="mt-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-2xl animate-fadeIn">
                    <div class="flex items-center">
                        <span class="mr-2">✅</span>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="mt-6 text-center animate-fadeIn" style="animation-delay: 0.8s;">
                <p class="text-gray-300">
                    Sudah punya akun?
                    <a href="{{ route('login.form') }}" class="text-green-400 hover:text-green-300 font-semibold transition-colors relative group">
                        Masuk di sini
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </p>
                <p class="text-sm text-gray-400 mt-2">
                    <span class="mr-1">🌟</span>
                    Join 5,000+ remaja yang udah belajar cinta sehat!
                </p>
            </div>
        </div>
    </div>

    <script>
        // Enable submit button only if terms checkbox is checked
        const termsCheck = document.getElementById('terms');
        const submitBtn = document.getElementById('submitBtn');

        termsCheck.addEventListener('change', () => {
            submitBtn.disabled = !termsCheck.checked;
        });

        // Add floating animation to form elements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.input-enhanced');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.1}s`;
                input.classList.add('animate-fadeIn');
            });
        });
    </script>
</div>
@endsection
