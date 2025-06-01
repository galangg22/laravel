@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
        font-family: 'Poppins', sans-serif;
    }
    
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out forwards;
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
    
    .input-enhanced {
        transition: all 0.3s ease;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        border-color: #b6e2c6;
        border-radius: 0.5rem;
    }
    
    .input-enhanced:focus {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 44, 20, 0.25);
        border-color: #fff;
        background: rgba(0, 44, 20, 0.8);
        outline: none;
    }
    
    .input-enhanced::placeholder {
        color: #b6e2c6;
        opacity: 0.7;
    }
    
    .btn-enhanced {
        transition: all 0.3s ease;
        background: linear-gradient(90deg, #002c14 0%, #000 100%);
        color: #fff;
        border: none;
        border-radius: 0.5rem;
    }
    
    .btn-enhanced:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 44, 20, 0.4);
        background: linear-gradient(90deg, #000 0%, #002c14 100%);
    }
</style>

<div class="min-h-screen flex items-center justify-center background-enhanced px-4 py-12">
    <div class="glass-effect rounded-2xl p-10 w-96 animate-fadeIn">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Enter New Password</h2>
        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="password" class="block text-sm font-semibold text-green-300 mb-1">New Password</label>
                <input type="password" id="password" name="password" required 
                    class="input-enhanced w-full px-4 py-2 border-2 @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-green-300 mb-1">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                    class="input-enhanced w-full px-4 py-2 border-2 @error('password_confirmation') border-red-400 @enderror">
                @error('password_confirmation')
                    <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-enhanced w-full py-3 text-white font-semibold">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
