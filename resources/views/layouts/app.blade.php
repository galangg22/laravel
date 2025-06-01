<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Platform Video') }}</title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Tambahan untuk animasi sidebar */
        #sidebar-overlay {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        
        #sidebar-overlay.opacity-100 {
            opacity: 1;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>