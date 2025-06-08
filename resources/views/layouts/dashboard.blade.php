<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Heart Horizon') }}</title>
    
    <!-- Critical CSS untuk mencegah FOUC -->
    <style>
        body {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        
        #preloader {
            visibility: visible !important;
            opacity: 1 !important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #002c14 0%, #000000 50%, #002c14 100%);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        body.loaded {
            visibility: visible;
            opacity: 1;
        }
        
        .sidebar-container {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        
        .sidebar-container.loaded {
            opacity: 1;
            visibility: visible;
        }
        
        .main-content {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
        }
        
        .main-content.loaded {
            opacity: 1;
            visibility: visible;
        }
    </style>
    
    <!-- DaisyUI + Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Sweet Alert 2 - TAMBAHKAN DI SINI -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'orbitron': ['Orbitron', 'monospace'],
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px rgba(34, 197, 94, 0.5)' },
                            '100%': { boxShadow: '0 0 20px rgba(34, 197, 94, 0.8)' },
                        }
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                }
            }
        }
    </script>
    
    @stack('styles')
</head>

<body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen">
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="text-center">
            <div class="mb-6">
                <img src="{{ asset('image/newlogo.png') }}" alt="Heart Horizon Logo" 
                     class="h-20 w-auto mx-auto animate-pulse filter drop-shadow-lg" />
            </div>
            
            <h2 id="loading-text" class="text-green-400 text-2xl font-bold mb-6 font-orbitron" 
                style="text-shadow: 0 0 10px rgba(34, 197, 94, 0.5);">
                Loading Heart Horizon...
            </h2>
            
            <div class="spinner mb-6 mx-auto"></div>
            
            <div class="w-80 bg-gray-700/50 rounded-full h-3 mx-auto backdrop-blur-sm border border-green-600/30">
                <div id="progress-bar" 
                     class="bg-gradient-to-r from-green-500 to-green-400 h-3 rounded-full transition-all duration-300 shadow-lg" 
                     style="width: 0%"></div>
            </div>
            
            <div id="progress-text" class="text-green-300 mt-4 text-lg font-semibold font-orbitron">0%</div>
        </div>
    </div>

    <!-- Sidebar Container -->
    <div id="sidebar-container" class="sidebar-container"></div>
    
    <!-- Main Content Container -->
    <div id="main-app" class="main-content">
        @yield('content')
    </div>

    <!-- Hidden sidebar template -->
    <template id="sidebar-template">
        @include('layouts.sidebar')
    </template>

    <!-- Loading Script yang Diperbaiki dengan Sweet Alert -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Starting simple loading...');
        
        const preloader = document.getElementById('preloader');
        const mainApp = document.getElementById('main-app');
        const sidebarContainer = document.getElementById('sidebar-container');
        const sidebarTemplate = document.getElementById('sidebar-template');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const loadingText = document.getElementById('loading-text');
        
        let progress = 0;
        let isFinished = false;
        
        // Progress yang lebih cepat dan pasti selesai
        const loadingInterval = setInterval(() => {
            if (isFinished) return;
            
            progress += 20; // Increment besar untuk cepat selesai
            
            if (progress >= 100) {
                progress = 100;
                isFinished = true;
            }
            
            progressBar.style.width = progress + '%';
            progressText.textContent = progress + '%';
            
            if (progress >= 100) {
                clearInterval(loadingInterval);
                loadingText.textContent = 'Complete!';
                
                // Langsung finish tanpa delay
                setTimeout(finishLoading, 300);
            }
        }, 200); // Interval 200ms
        
        function finishLoading() {
            console.log('Finishing loading NOW...');
            
            try {
                // Load sidebar
                if (sidebarTemplate && sidebarContainer) {
                    const sidebarContent = sidebarTemplate.content.cloneNode(true);
                    sidebarContainer.appendChild(sidebarContent);
                    sidebarContainer.classList.add('loaded');
                }
                
                // Show content immediately
                mainApp.classList.add('loaded');
                
                // Hide preloader immediately
                preloader.style.display = 'none';
                document.body.classList.add('loaded');
                
                // Initialize sidebar
                setTimeout(initializeSidebar, 100);
                
                // Trigger event
                window.dispatchEvent(new CustomEvent('dashboardLoaded'));
                
                console.log('Loading finished successfully!');
                
            } catch (error) {
                console.error('Error in finishLoading:', error);
                // Force finish even if error
                preloader.style.display = 'none';
                mainApp.style.opacity = '1';
                mainApp.style.visibility = 'visible';
                document.body.classList.add('loaded');
            }
        }
        
        // Fallback yang sangat agresif - 2 detik maksimal
        setTimeout(() => {
            if (!isFinished) {
                console.log('FORCE FINISH - Fallback triggered');
                isFinished = true;
                clearInterval(loadingInterval);
                finishLoading();
            }
        }, 2000);
        
        // Fallback kedua - 3 detik
        setTimeout(() => {
            console.log('EMERGENCY FINISH - Removing preloader');
            preloader.style.display = 'none';
            mainApp.style.opacity = '1';
            mainApp.style.visibility = 'visible';
            document.body.style.visibility = 'visible';
            document.body.style.opacity = '1';
            document.body.classList.add('loaded');
        }, 3000);
    });

    function initializeSidebar() {
        const sidebarToggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (!sidebarToggleBtn || !sidebar || !sidebarOverlay) {
            console.log('Sidebar elements not found');
            return;
        }

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            sidebarOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            sidebarOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        sidebarToggleBtn.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });

        sidebarOverlay.addEventListener('click', closeSidebar);
        
        console.log('Sidebar initialized');
    }

    // TAMBAHKAN GLOBAL SWEET ALERT FUNCTIONS
    
    // Global Sweet Alert Toast function
    window.showToast = function(message, type = 'info') {
        // Check if Sweet Alert is loaded
        if (typeof Swal === 'undefined') {
            console.warn('Sweet Alert not loaded, using fallback alert');
            alert(message);
            return;
        }

        const config = {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            title: message,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            customClass: {
                popup: 'heart-horizon-toast'
            }
        };

        if (type === 'success') {
            config.icon = 'success';
            config.background = 'linear-gradient(135deg, #065f46, #047857)';
            config.color = '#fff';
            config.iconColor = '#10b981';
        } else if (type === 'error') {
            config.icon = 'error';
            config.background = 'linear-gradient(135deg, #7f1d1d, #991b1b)';
            config.color = '#fff';
            config.iconColor = '#ef4444';
        } else {
            config.icon = 'info';
            config.background = 'linear-gradient(135deg, #1e3a8a, #1d4ed8)';
            config.color = '#fff';
            config.iconColor = '#3b82f6';
        }

        Swal.fire(config);
    }

    // Global Sweet Alert Confirm function
    window.confirmAction = function(title, text, confirmText = 'Yes', cancelText = 'Cancel') {
        // Check if Sweet Alert is loaded
        if (typeof Swal === 'undefined') {
            console.warn('Sweet Alert not loaded, using fallback confirm');
            return Promise.resolve(confirm(title + '\n' + text));
        }

        return Swal.fire({
            title: title,
            text: text,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            background: 'linear-gradient(135deg, #002c14 0%, #000000 50%, #002c14 100%)',
            color: '#fff',
            customClass: {
                popup: 'heart-horizon-popup',
                title: 'heart-horizon-title',
                content: 'heart-horizon-content'
            }
        }).then((result) => {
            return result.isConfirmed;
        });
    }

    // Global Logout Confirmation function
    window.confirmLogout = function() {
        if (typeof Swal === 'undefined') {
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logout-form').submit();
            }
            return;
        }

        Swal.fire({
            title: 'Logout Confirmation',
            text: 'Are you sure you want to logout from Heart Horizon?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, Logout',
            cancelButtonText: 'Stay Logged In',
            background: 'linear-gradient(135deg, #002c14 0%, #000000 50%, #002c14 100%)',
            color: '#fff',
            customClass: {
                popup: 'heart-horizon-popup',
                title: 'heart-horizon-title',
                content: 'heart-horizon-content'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Logging out...',
                    text: 'Please wait',
                    icon: 'info',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    background: 'linear-gradient(135deg, #002c14 0%, #000000 50%, #002c14 100%)',
                    color: '#fff',
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                setTimeout(() => {
                    document.getElementById('logout-form').submit();
                }, 1000);
            }
        });
    }
    </script>

    <!-- Spinner Styles + Sweet Alert Styles -->
    <style>
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(34, 197, 94, 0.2);
            border-top: 4px solid #22c55e;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { 
                opacity: 1; 
                transform: scale(1);
            }
            50% { 
                opacity: 0.7; 
                transform: scale(1.05);
            }
        }

        /* Sweet Alert Heart Horizon Theme */
        .heart-horizon-popup {
            border: 2px solid #22c55e !important;
            border-radius: 1rem !important;
            box-shadow: 0 0 30px rgba(34, 197, 94, 0.3) !important;
            backdrop-filter: blur(10px) !important;
        }

        .heart-horizon-title {
            font-family: 'Orbitron', sans-serif !important;
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.5) !important;
        }

        .heart-horizon-content {
            font-family: 'Orbitron', sans-serif !important;
        }

        .heart-horizon-toast {
            border: 1px solid rgba(34, 197, 94, 0.3) !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3) !important;
            backdrop-filter: blur(10px) !important;
        }

        .swal2-confirm {
            font-family: 'Orbitron', sans-serif !important;
            font-weight: 600 !important;
            border-radius: 0.5rem !important;
            padding: 0.75rem 1.5rem !important;
        }

        .swal2-cancel {
            font-family: 'Orbitron', sans-serif !important;
            font-weight: 600 !important;
            border-radius: 0.5rem !important;
            padding: 0.75rem 1.5rem !important;
        }

        /* Fix Sweet Alert z-index issues */
        .swal2-container {
            z-index: 999999 !important;
        }
    </style>

    @stack('scripts')
</body>
</html>
