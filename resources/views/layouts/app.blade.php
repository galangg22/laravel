<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Heart Horizon') }}</title>
    
    <!-- DaisyUI + Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- TAMBAHKAN SWEET ALERT 2 DI SINI -->
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
    
    <!-- TAMBAHKAN GLOBAL SWEET ALERT FUNCTIONS -->
    <script>
        // Wait for Sweet Alert to load
        document.addEventListener('DOMContentLoaded', function() {
            // Check if Sweet Alert is loaded
            if (typeof Swal !== 'undefined') {
                console.log('Sweet Alert loaded successfully');
                
                // Global Sweet Alert Toast function
                window.showToast = function(message, type = 'info') {
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

                // Global Sweet Alert function
                window.showAlert = function(message, type = 'info', title = '') {
                    const config = {
                        title: title || (type === 'success' ? 'Success!' : type === 'error' ? 'Error!' : 'Info'),
                        text: message,
                        icon: type,
                        confirmButtonText: 'OK',
                        background: 'linear-gradient(135deg, #002c14 0%, #000000 50%, #002c14 100%)',
                        color: '#fff',
                        customClass: {
                            popup: 'heart-horizon-popup',
                            title: 'heart-horizon-title',
                            content: 'heart-horizon-content',
                            confirmButton: 'heart-horizon-button'
                        }
                    };

                    if (type === 'success') {
                        config.confirmButtonColor = '#22c55e';
                        config.timer = 2000;
                        config.timerProgressBar = true;
                    } else if (type === 'error') {
                        config.confirmButtonColor = '#ef4444';
                    } else {
                        config.confirmButtonColor = '#3b82f6';
                    }

                    return Swal.fire(config);
                }
                
            } else {
                console.error('Sweet Alert failed to load');
                
                // Fallback functions
                window.showToast = function(message, type = 'info') {
                    alert(message);
                }
                
                window.confirmAction = function(title, text, confirmText = 'Yes', cancelText = 'Cancel') {
                    return Promise.resolve(confirm(title + '\n' + text));
                }
                
                window.showAlert = function(message, type = 'info', title = '') {
                    alert(message);
                    return Promise.resolve();
                }
            }
        });
    </script>
    
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen">
    @yield('content')
    
    <!-- TAMBAHKAN SWEET ALERT STYLES -->
    <style>
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

        .heart-horizon-button {
            font-family: 'Orbitron', sans-serif !important;
            font-weight: 600 !important;
            border-radius: 0.5rem !important;
            padding: 0.75rem 1.5rem !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
        }

        .heart-horizon-toast {
            border: 1px solid rgba(34, 197, 94, 0.3) !important;
            border-radius: 0.75rem !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3) !important;
            backdrop-filter: blur(10px) !important;
        }

        /* Fix Sweet Alert z-index issues */
        .swal2-container {
            z-index: 999999 !important;
        }

        /* Sweet Alert loading animation */
        .swal2-loading {
            border-color: #22c55e transparent #22c55e transparent !important;
        }
    </style>
    
    @stack('scripts')
</body>
</html>
