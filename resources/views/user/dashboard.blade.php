@extends('layouts.dashboard')

@section('content')
<!-- Add Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

<!-- Main Content tanpa preloader duplikat -->
<div class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen text-white flex flex-col items-center justify-start py-10 px-4">
  
  <!-- Header Title - MENGGUNAKAN LEXEND DECA -->
  <h2 class="text-4xl lg:text-4xl md:text-3xl sm:text-lg text-base font-bold text-center text-green-400 mb-8 md:mb-6 sm:mb-4 px-4 leading-tight"
    style="text-shadow: 0 0 5px #006636, 0 0 10px #006636, 0 0 10px #006636; font-family: 'Lexend Deca', sans-serif;">
    Welcome to Heart Horizon
  </h2>

  <!-- Carousel Container -->
  <div class="carousel rounded-xl overflow-hidden shadow-lg w-full max-w-[1000px] lg:max-w-[1000px] md:max-w-[800px] aspect-video md:aspect-[16/10] sm:aspect-video border-4 md:border-3 sm:border-2 border-green-600 relative">
    
    <!-- Carousel Items -->
    <div class="carousel-item w-full h-full">
      <img src="{{ asset('image/dashboard1.png') }}" 
           class="w-full h-full object-cover" 
           alt="Heart Horizon Screenshot 1"
           onerror="this.src='data:image/svg+xml;base64,{{ base64_encode('<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'1000\' height=\'600\' viewBox=\'0 0 1000 600\'><rect width=\'100%\' height=\'100%\' fill=\'#374151\'/><text x=\'50%\' y=\'50%\' text-anchor=\'middle\' dy=\'.3em\' fill=\'#9ca3af\' font-family=\'Arial, sans-serif\' font-size=\'24\' font-weight=\'bold\'>Dashboard Preview</text></svg>') }}'" />
    </div>
    <div class="carousel-item w-full h-full hidden">
      <img src="{{ asset('image/dashboard2.jpg') }}" 
           class="w-full h-full object-cover" 
           alt="Heart Horizon Screenshot 2"
           onerror="this.src='data:image/svg+xml;base64,{{ base64_encode('<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'1000\' height=\'600\' viewBox=\'0 0 1000 600\'><rect width=\'100%\' height=\'100%\' fill=\'#374151\'/><text x=\'50%\' y=\'50%\' text-anchor=\'middle\' dy=\'.3em\' fill=\'#9ca3af\' font-family=\'Arial, sans-serif\' font-size=\'24\' font-weight=\'bold\'>Screenshot Preview</text></svg>') }}'" />
    </div>
  </div>

  <!-- Divider -->
  <hr class="border-2 border-green-600 my-8 md:my-6 sm:my-4 w-full max-w-[1000px] lg:max-w-[1000px] md:max-w-[800px]" />

  <!-- Cards Grid - MODERN DESIGN -->
  <div class="mt-10 w-full max-w-[1000px] mx-auto px-4">
    <div class="grid gap-8 lg:gap-6 md:gap-6 sm:gap-6
                grid-cols-1 
                sm:grid-cols-1 
                md:grid-cols-2 
                lg:grid-cols-4 
                xl:grid-cols-4">
      @foreach($categories as $category)
        <a href="{{ route('category.show', $category) }}"
           class="group relative block rounded-xl overflow-hidden shadow-lg border border-green-600/30 bg-gradient-to-br from-gray-900/80 to-gray-800/60 backdrop-blur-sm transition-all duration-500 hover:shadow-2xl hover:shadow-green-500/20 hover:scale-[1.03] hover:border-green-400/60">
          
          <!-- Image Container -->
          <div class="relative aspect-[16/9] overflow-hidden">
            @if($category->image)
              <img src="{{ asset('storage/' . $category->image) }}" 
                   alt="{{ $category->name }}" 
                   class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110"
                   onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
            @endif
            
            <!-- SVG Placeholder Fallback -->
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-800 {{ $category->image ? 'hidden' : 'flex' }}" 
                 style="display: {{ $category->image ? 'none' : 'flex' }};">
              <svg xmlns="http://www.w3.org/2000/svg" width="400" height="225" viewBox="0 0 400 225" class="w-full h-full">
                <rect width="100%" height="100%" fill="url(#categoryGradient)"/>
                <defs>
                  <linearGradient id="categoryGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#374151;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#4b5563;stop-opacity:1" />
                  </linearGradient>
                </defs>
                <!-- Category Icon -->
                <g transform="translate(200, 112.5)">
                  <circle cx="0" cy="-20" r="25" fill="#22c55e" opacity="0.3"/>
                  <path d="M-15,-25 L15,-25 L15,-15 L-15,-15 Z M-10,-10 L10,-10 L10,0 L-10,0 Z M-5,5 L5,5 L5,15 L-5,15 Z" 
                        fill="#22c55e" opacity="0.7"/>
                </g>
                <text x="50%" y="75%" text-anchor="middle" dy=".3em" fill="#9ca3af" 
                      font-family="Lexend Deca, Arial, sans-serif" font-size="16" font-weight="600">
                  {{ $category->name }}
                </text>
              </svg>
            </div>
            
            <!-- Gradient Overlay on Hover -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
            
            <!-- Shine Effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
          </div>
          
          <!-- Content -->
          <div class="relative p-6 lg:p-4 md:p-4 sm:p-6">
            <h3 class="text-xl lg:text-lg md:text-base sm:text-lg font-bold text-center text-green-400 group-hover:text-green-300 transition-all duration-300 leading-tight"
                style="font-family: 'Lexend Deca', sans-serif; text-shadow: 0 0 10px rgba(34, 197, 94, 0.3);">
              {{ $category->name }}
            </h3>
            
            <!-- Animated Underline -->
            <div class="mt-3 h-0.5 bg-gradient-to-r from-green-500 to-green-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-center"></div>
          </div>
          
          <!-- Corner Accent -->
          <div class="absolute top-0 right-0 w-0 h-0 border-l-[20px] border-l-transparent border-t-[20px] border-t-green-500/20 group-hover:border-t-green-400/40 transition-colors duration-300"></div>
        </a>
      @endforeach
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-black/50 backdrop-blur-sm py-6 flex justify-center items-center gap-6 mb-10 md:mb-8 sm:mb-6 mt-12 md:mt-8 sm:mt-6 rounded-xl">
    <img src="{{ asset('image/newlogo.png') }}" 
         alt="Logo" 
         class="h-12 md:h-10 sm:h-8 w-auto filter drop-shadow-lg"
         onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';" />
    
    <!-- SVG Logo Fallback -->
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" 
         class="h-12 md:h-10 sm:h-8 w-auto filter drop-shadow-lg hidden">
      <rect width="48" height="48" rx="8" fill="url(#logoGradient)"/>
      <defs>
        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" style="stop-color:#22c55e;stop-opacity:1" />
          <stop offset="100%" style="stop-color:#16a34a;stop-opacity:1" />
        </linearGradient>
      </defs>
      <!-- Heart Shape -->
      <path d="M24,36 C24,36 12,28 12,20 C12,16 15,13 19,13 C21,13 23,14 24,16 C25,14 27,13 29,13 C33,13 36,16 36,20 C36,28 24,36 24,36 Z" 
            fill="white" opacity="0.9"/>
      <!-- Horizon Line -->
      <line x1="8" y1="24" x2="40" y2="24" stroke="white" stroke-width="2" opacity="0.7"/>
    </svg>
  </footer>
</div>

<!-- Profile Setup Pop-up -->
@if(isset($showProfilePopup) && $showProfilePopup)
<div id="profileModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-900 rounded-lg max-w-md w-full shadow-2xl border border-gray-200 dark:border-gray-700">
        <!-- Modal Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                    <!-- SVG User Icon -->
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white" style="font-family: 'Lexend Deca', sans-serif;">
                        Complete Your Profile
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Personalize your Heart Horizon experience
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6">
            <div class="space-y-4">
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Setting up your profile helps us provide personalized recommendations and connect you with relevant content.
                </p>
                
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2" style="font-family: 'Lexend Deca', sans-serif;">What you'll get:</h4>
                    <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                        <li class="flex items-center space-x-2">
                            <!-- SVG Check Icon -->
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Personalized content recommendations</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Connect with community members</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Enhanced security features</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800 rounded-b-lg flex flex-col sm:flex-row gap-3">
            <button id="setupProfileBtn" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Set Up Profile
            </button>
            <button id="skipBtn" class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium py-2.5 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                Maybe Later
            </button>
        </div>
    </div>
</div>
@endif

<script>
// SVG Placeholder Generator Functions dengan Lexend Deca
function createSVGPlaceholder(width, height, text, bgColor = '#374151', textColor = '#9ca3af') {
    const svg = `
        <svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">
            <rect width="100%" height="100%" fill="${bgColor}"/>
            <text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="${textColor}" 
                  font-family="Lexend Deca, Arial, sans-serif" font-size="${Math.max(14, width/20)}" font-weight="600">
                ${text}
            </text>
        </svg>
    `;
    return `data:image/svg+xml;base64,${btoa(svg)}`;
}

function createCategoryPlaceholder(width, height, categoryName) {
    const svg = `
        <svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">
            <defs>
                <linearGradient id="categoryGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#374151;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#4b5563;stop-opacity:1" />
                </linearGradient>
            </defs>
            <rect width="100%" height="100%" fill="url(#categoryGrad)"/>
            <g transform="translate(${width/2}, ${height/2})">
                <circle cx="0" cy="-20" r="25" fill="#22c55e" opacity="0.3"/>
                <rect x="-15" y="-25" width="30" height="10" fill="#22c55e" opacity="0.7" rx="2"/>
                <rect x="-10" y="-10" width="20" height="10" fill="#22c55e" opacity="0.7" rx="2"/>
                <rect x="-5" y="5" width="10" height="10" fill="#22c55e" opacity="0.7" rx="2"/>
            </g>
            <text x="50%" y="75%" text-anchor="middle" dy=".3em" fill="#9ca3af" 
                  font-family="Lexend Deca, Arial, sans-serif" font-size="16" font-weight="600">
                ${categoryName}
            </text>
        </svg>
    `;
    return `data:image/svg+xml;base64,${btoa(svg)}`;
}

// Enhanced image error handling with SVG fallbacks
function handleImageError(img, width, height, text, type = 'default') {
    if (type === 'category') {
        img.src = createCategoryPlaceholder(width, height, text);
    } else {
        img.src = createSVGPlaceholder(width, height, text);
    }
    img.onerror = null; // Prevent infinite loop
}

// Wait for dashboard to be loaded from layouts.dashboard
window.addEventListener('dashboardLoaded', function() {
    console.log('Dashboard content loaded, initializing features...');
    
    // Tambahkan micro-loading untuk smooth transition
    showMicroLoader();
    
    setTimeout(() => {
        initializeCarousel();
        initializeCardAnimations();
        initializeProfileModal();
        initializePlaceholderFallbacks();
        hideMicroLoader();
    }, 800);
});

// Fallback initialization
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        if (!window.dashboardContentInitialized) {
            console.log('Fallback: Initializing dashboard content...');
            showMicroLoader();
            
            setTimeout(() => {
                initializeCarousel();
                initializeCardAnimations();
                initializeProfileModal();
                initializePlaceholderFallbacks();
                hideMicroLoader();
            }, 600);
        }
    }, 2000);
});

// Initialize placeholder fallbacks
function initializePlaceholderFallbacks() {
    // Apply fallbacks to all images that might fail
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        if (!img.dataset.fallbackApplied) {
            const originalOnError = img.onerror;
            img.onerror = function() {
                // Try to determine image type and size
                const rect = this.getBoundingClientRect();
                const width = rect.width || 400;
                const height = rect.height || 225;
                const alt = this.alt || 'No Image';
                
                // Apply SVG fallback
                this.src = createSVGPlaceholder(width, height, alt);
                this.onerror = null; // Prevent infinite loop
            };
            img.dataset.fallbackApplied = 'true';
        }
    });
    
    console.log('Placeholder fallbacks initialized for', images.length, 'images');
}

// Micro loader functions
function showMicroLoader() {
    const microLoader = document.createElement('div');
    microLoader.id = 'microLoader';
    microLoader.innerHTML = `
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm z-40 flex items-center justify-center">
            <div class="bg-gray-900/90 rounded-2xl p-8 border border-green-500/30 shadow-2xl">
                <div class="flex flex-col items-center space-y-4">
                    <!-- Animated dots -->
                    <div class="flex space-x-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                    </div>
                    
                    <!-- Loading text -->
                    <p class="text-green-400 text-sm font-medium animate-pulse" style="font-family: 'Lexend Deca', sans-serif;">
                        Preparing content...
                    </p>
                    
                    <!-- Progress line -->
                    <div class="w-32 h-1 bg-gray-700 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-green-500 to-green-400 rounded-full animate-pulse" 
                             style="animation: progressSlide 0.8s ease-out forwards;"></div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(microLoader);
    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes progressSlide {
            0% { width: 0%; }
            100% { width: 100%; }
        }
        
        #microLoader {
            animation: fadeIn 0.3s ease-out;
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        .fadeOut {
            animation: fadeOut 0.4s ease-out forwards;
        }
        
        @keyframes fadeOut {
            0% { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(0.95); }
        }
    `;
    document.head.appendChild(style);
}

function hideMicroLoader() {
    const microLoader = document.getElementById('microLoader');
    if (microLoader) {
        microLoader.classList.add('fadeOut');
        setTimeout(() => {
            microLoader.remove();
        }, 400);
    }
}

// Carousel functionality dengan smooth entrance
function initializeCarousel() {
    let index = 0;
    const items = document.querySelectorAll('.carousel-item');
    const total = items.length;

    if (total === 0) {
        console.log('No carousel items found');
        return;
    }

    const carousel = document.querySelector('.carousel');
    if (carousel) {
        carousel.style.opacity = '0';
        carousel.style.transform = 'translateY(20px)';
        carousel.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        
        setTimeout(() => {
            carousel.style.opacity = '1';
            carousel.style.transform = 'translateY(0)';
        }, 200);
    }

    function showSlide(i) {
        items.forEach((item, idx) => {
            item.classList.add('hidden');
            if (idx === i) {
                item.classList.remove('hidden');
            }
        });
    }

    function nextSlide() {
        index = (index + 1) % total;
        showSlide(index);
    }

    showSlide(index);
    setInterval(nextSlide, 3000);

    let startX = 0;
    let endX = 0;

    if (carousel) {
        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        carousel.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
        });
    }

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide();
            } else {
                index = (index - 1 + total) % total;
                showSlide(index);
            }
        }
    }

    console.log('Carousel initialized with', total, 'items');
}

// Enhanced card entrance animation dengan wave effect
function initializeCardAnimations() {
    const cards = document.querySelectorAll('.grid a');
    
    if (cards.length === 0) {
        console.log('No cards found for animation');
        return;
    }
    
    const gridContainer = document.querySelector('.grid');
    if (gridContainer) {
        gridContainer.style.opacity = '0';
        gridContainer.style.transform = 'translateY(30px)';
        gridContainer.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        
        setTimeout(() => {
            gridContainer.style.opacity = '1';
            gridContainer.style.transform = 'translateY(0)';
        }, 400);
    }
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0) scale(1)';
                    
                    setTimeout(() => {
                        entry.target.style.transform = 'translateY(0) scale(1.02)';
                        setTimeout(() => {
                            entry.target.style.transform = 'translateY(0) scale(1)';
                        }, 150);
                    }, 300);
                    
                }, idx * 120);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(40px) scale(0.9)';
        card.style.transition = 'opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1), transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(card);
    });

    console.log('Card animations initialized for', cards.length, 'cards');
}

// Enhanced Profile Modal functionality
function initializeProfileModal() {
    const modal = document.getElementById('profileModal');
    const setupProfileBtn = document.getElementById('setupProfileBtn');
    const skipBtn = document.getElementById('skipBtn');

    if (!modal) {
        console.log('Profile modal not found');
        return;
    }

    // Add smooth entrance animation
    modal.style.opacity = '0';
    modal.style.transform = 'scale(0.95)';
    modal.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    
    setTimeout(() => {
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
    }, 100);

    // Setup Profile Button
    if (setupProfileBtn) {
        setupProfileBtn.replaceWith(setupProfileBtn.cloneNode(true));
        const newSetupBtn = document.getElementById('setupProfileBtn');
        
        newSetupBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Show loading state with spinner
            const originalText = this.innerHTML;
            this.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Setting up...
            `;
            this.disabled = true;
            
            const profileRoute = '{{ route("user.profile") }}';
            
            setTimeout(() => {
                window.location.href = profileRoute;
            }, 800);
        });
    }

    // Skip Button with improved UX
    if (skipBtn) {
        skipBtn.replaceWith(skipBtn.cloneNode(true));
        const newSkipBtn = document.getElementById('skipBtn');
        
        newSkipBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const originalText = this.innerHTML;
            this.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Processing...
            `;
            this.disabled = true;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showToast('Please refresh the page and try again.', 'error');
                this.disabled = false;
                this.innerHTML = originalText;
                return;
            }
            
            const skipRoute = '{{ route("profile.skip") }}';
            
            fetch(skipRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Smooth exit animation
                    modal.style.opacity = '0';
                    modal.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 300);
                    
                    showToast('Profile setup skipped successfully', 'success');
                } else {
                    showToast(data.message || 'Error processing request', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Something went wrong. Please try again.', 'error');
            })
            .finally(() => {
                this.disabled = false;
                this.innerHTML = originalText;
            });
        });
    }

    // Close modal on backdrop click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.95)';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }
    });

    console.log('Enhanced profile modal initialized');
}

// Enhanced Sweet Alert toast notification function
function showToast(message, type = 'info') {
    // Check if Sweet Alert is available from global scope
    if (typeof window.showToast === 'function') {
        window.showToast(message, type);
        return;
    }
    
    // Check if Swal is available directly
    if (typeof Swal !== 'undefined') {
        const config = {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
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
    } else {
        // Fallback to native alert
        alert(message);
    }
}

// Mark as initialized
window.dashboardContentInitialized = true;
</script>

<style>
/* Import Lexend Deca font for better performance */
@import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');

/* Lexend Deca font optimization */
.lexend-title {
    font-family: 'Lexend Deca', sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}

/* Apply Lexend Deca to all headings and titles */
h1, h2, h3, h4, h5, h6 {
    font-family: 'Lexend Deca', sans-serif !important;
}

/* Specific styling for better readability */
.category-title {
    font-family: 'Lexend Deca', sans-serif;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.welcome-title {
    font-family: 'Lexend Deca', sans-serif;
    font-weight: 700;
    letter-spacing: 0.5px;
}
</style>

@endsection
