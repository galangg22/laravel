@extends('layouts.app')

@section('title', 'Email Verification Pending')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
        font-family: 'Poppins', sans-serif;
    }
    
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 8px 0 rgba(34,197,94, 0.7); }
        50% { box-shadow: 0 0 20px 8px rgba(34,197,94, 1); }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.7s ease forwards;
    }
    
    .glow-pulse {
        animation: pulseGlow 2.5s ease-in-out infinite;
    }
    
    .background-enhanced {
        background: linear-gradient(135deg, #000000 0%, #002c14 60%, #000000 100%);
        background-size: 400% 400%;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3rem 1rem;
    }
    
    .glass-effect {
        backdrop-filter: blur(15px);
        background: rgba(0, 44, 20, 0.75);
        border-radius: 1.5rem;
        border: 1px solid rgba(34, 197, 94, 0.3);
        box-shadow: 0 12px 40px rgba(34, 197, 94, 0.4);
        max-width: 420px;
        width: 100%;
        padding: 3rem 2rem;
        text-align: center;
        color: #d1d5db; /* Tailwind gray-300 */
    }
    
    .btn-enhanced {
        background: linear-gradient(90deg, #16a34a 0%, #065f46 100%);
        color: #ecfccb; /* Tailwind green-100 */
        font-weight: 600;
        border-radius: 0.75rem;
        padding: 0.75rem 1.75rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(22, 163, 74, 0.6);
        transition: all 0.3s ease;
        text-decoration: none;
        user-select: none;
    }
    
    .btn-enhanced:hover, .btn-enhanced:focus {
        background: linear-gradient(90deg, #065f46 0%, #16a34a 100%);
        box-shadow: 0 6px 25px rgba(22, 163, 74, 0.9);
        transform: translateY(-3px);
        outline: none;
    }
    
    .icon-circle {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        border-radius: 50%;
        width: 72px;
        height: 72px;
        margin: 0 auto 1.5rem auto;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 0 15px rgba(22, 163, 74, 0.7);
    }
    
    .alert-box {
        display: flex;
        align-items: center;
        border-radius: 0.75rem;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
        gap: 0.75rem;
        box-shadow: inset 0 0 8px rgba(0,0,0,0.3);
    }
    
    .alert-success {
        background-color: rgba(22, 163, 74, 0.15);
        color: #bbf7d0; /* Tailwind green-200 */
        border: 1px solid #22c55e;
    }
    
    .alert-error {
        background-color: rgba(220, 38, 38, 0.15);
        color: #fecaca; /* Tailwind red-300 */
        border: 1px solid #ef4444;
    }
    
    .alert-info {
        background-color: rgba(59, 130, 246, 0.15);
        color: #bfdbfe; /* Tailwind blue-300 */
        border: 1px solid #3b82f6;
    }
    
    .alert-icon {
        width: 1.5rem;
        height: 1.5rem;
        flex-shrink: 0;
    }
    
    a.text-link {
        color: #bbf7d0;
        font-weight: 600;
        text-decoration: underline;
        transition: color 0.3s ease;
    }
    
    a.text-link:hover {
        color: #d9f99d;
    }
</style>

<div class="background-enhanced">
    <div class="glass-effect animate-fadeInUp">
        <div class="icon-circle glow-pulse" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
            </svg>
        </div>

        <h1 class="text-3xl font-extrabold text-white mb-5">Email Verification Pending</h1>
        <p class="mb-7 text-gray-300 leading-relaxed">
            Thank you for registering! We've sent a verification link to your email address.
        </p>

        @if(session('status'))
            <div class="alert-box alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.07 0l3.992-3.992a.75.75 0 1 0-1.06-1.06L7.5 9.439 5.53 7.47a.75.75 0 0 0-1.06 1.06l2.5 2.5z"/>
                </svg>
                <p>{{ session('status') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-box alert-error" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="alert-box alert-info" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
            <p>Please check your inbox (and spam folder) to verify your email address.</p>
        </div>

        <div class="mt-8">
            <a href="https://mail.google.com" target="_blank" rel="noopener noreferrer" 
               class="btn-enhanced" aria-label="Buka Gmail">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                </svg>
                Buka Gmail
            </a>
        </div>

        <p class="mt-6 text-sm text-gray-400">
            Meanwhile, you can go to 
            <a href="https://mail.google.com" target="_blank" rel="noopener noreferrer" class="text-link">
                Gmail
            </a> 
            to check for the verification email.
        </p>
    </div>
</div>
@endsection
