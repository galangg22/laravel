@extends('layouts.app')

@section('title', 'Akun Terblokir')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    body {
        font-family: 'Poppins', sans-serif;
    }
    
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    .animate-pulse {
        animation: pulse 2s ease-in-out infinite;
    }
    
    .background-enhanced {
        background: linear-gradient(135deg, #000 0%, #002c14 50%, #000 100%);
        background-size: 400% 400%;
        position: relative;
        overflow: hidden;
    }
    
    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(0, 44, 20, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 8px 32px 0 rgba(0, 44, 20, 0.3);
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
        box-shadow: 0 10px 25px rgba(0, 44, 20, 0.4);
        background: linear-gradient(90deg, #000 0%, #002c14 100%);
    }
</style>

<div class="min-h-screen flex items-center justify-center background-enhanced px-4">
    <div class="max-w-md w-full glass-effect rounded-lg p-8 text-center animate-fadeIn">
        <h1 class="text-2xl font-bold mb-4 text-red-400 animate-pulse">Akun Anda Telah Diblokir</h1>
        <p class="mb-6 text-gray-300">
            Mohon maaf, akun Anda telah diblokir. Untuk informasi lebih lanjut, silakan hubungi admin melalui email di 
           <a href="https://mail.google.com/mail/?view=cm&fs=1&to=hearthorizoncourse@gmail.com&su=Permintaan%20Informasi%20Tentang%20Akun%20yang%20Diblokir&body=Halo,%20saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20tentang%20akun%20saya%20yang%20diblokir." 
               class="text-green-300 hover:text-green-200 transition-colors duration-200 font-semibold">
               sini
            </a>
        </p>
        <a href="{{ route('login.form') }}" 
           class="btn-enhanced inline-block px-6 py-3 text-white font-semibold rounded-lg">
            OK, Kembali ke Login
        </a>
    </div>
</div>

@endsection
