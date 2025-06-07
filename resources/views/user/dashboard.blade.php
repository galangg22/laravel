@extends('layouts.app')

@include('layouts.sidebar')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">

<div class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen text-white flex flex-col items-center justify-start py-10 px-4">
  
  <!-- Header Title -->
  <h2 class="text-4xl lg:text-4xl md:text-3xl sm:text-lg text-base font-bold text-center text-green-400 mb-8 md:mb-6 sm:mb-4 px-4 leading-tight"
    style="text-shadow: 0 0 5px #006636, 0 0 10px #006636, 0 0 10px #006636; font-family: 'Orbitron', sans-serif;">
    Welcome to Heart Horizon
  </h2>

  <!-- Carousel Container -->
  <div class="carousel rounded-xl overflow-hidden shadow-lg w-full max-w-[1000px] lg:max-w-[1000px] md:max-w-[800px] aspect-video md:aspect-[16/10] sm:aspect-video border-4 md:border-3 sm:border-2 border-green-600 relative">
    
    <!-- Carousel Items -->
    <div class="carousel-item w-full h-full">
      <img src="{{ asset('img/Screenshot 2025-01-12 132513.png') }}" 
           class="w-full h-full object-cover" 
           alt="Heart Horizon Screenshot 1" />
    </div>
    <div class="carousel-item w-full h-full hidden">
      <img src="{{ asset('img/Screenshot 2025-01-12 142031.png') }}" 
           class="w-full h-full object-cover" 
           alt="Heart Horizon Screenshot 2" />
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
            <img src="{{ asset('img/thumb3.jpg') }}" 
                 alt="{{ $category->name }}" 
                 class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110" />
            
            <!-- Gradient Overlay on Hover -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
            
            <!-- Shine Effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
          </div>
          
          <!-- Content -->
          <div class="relative p-6 lg:p-4 md:p-4 sm:p-6">
            <h3 class="text-xl lg:text-lg md:text-base sm:text-lg font-bold text-center text-green-400 group-hover:text-green-300 transition-all duration-300 leading-tight"
                style="font-family: 'Orbitron', sans-serif; text-shadow: 0 0 10px rgba(34, 197, 94, 0.3);">
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
  <footer class="bg-black/50 backdrop-blur-sm py-6 flex justify-center items-center gap-6 mb-10 md:mb-8 sm:mb-6 mt-12 md:mt-8 sm:mt-6 rounded-xl border border-green-600/20">
    <img src="{{ asset('img/logo.png') }}" 
         alt="Logo" 
         class="h-12 md:h-10 sm:h-8 w-auto filter drop-shadow-lg" />
  </footer>
</div>

<!-- Simple Profile Setup Pop-up -->
@if(isset($showProfilePopup) && $showProfilePopup)
<div id="profileModal" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4">
    <div class="bg-gray-900 rounded-2xl max-w-sm w-full border-2 border-green-600 shadow-2xl">
        <!-- Modal Header -->
        <div class="bg-green-600 p-6 rounded-t-2xl text-center">
            <div class="text-4xl mb-3">🎭</div>
            <h2 class="text-xl font-bold text-white" style="font-family: 'Orbitron', sans-serif;">
                Setup Your Profile
            </h2>
            <p class="text-green-100 text-sm mt-2">Would you like to setup your Heart Horizon profile now?</p>
        </div>

        <!-- Modal Body -->
        <div class="p-6 text-center">
            <p class="text-gray-300 mb-6">
                Create your profile to get personalized experience and connect with others!
            </p>
            
            <!-- Buttons -->
            <div class="flex gap-3">
                <button id="setupProfileBtn" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-colors">
                    Yes, Setup Profile
                </button>
                <button id="skipBtn" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition-colors">
                    Skip for Now
                </button>
            </div>
        </div>
    </div>
</div>
@endif

<script>
  let index = 0;
  const items = document.querySelectorAll('.carousel-item');
  const total = items.length;

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

  // Initialize carousel
  showSlide(index);
  setInterval(nextSlide, 3000);

  // Add touch/swipe support for mobile
  let startX = 0;
  let endX = 0;
  const carousel = document.querySelector('.carousel');

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
        nextSlide(); // Swipe left - next slide
      } else {
        // Previous slide
        index = (index - 1 + total) % total;
        showSlide(index);
      }
    }
  }

  // Enhanced card entrance animation with stagger
  document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.grid a');
    
    // Intersection Observer for better performance
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, idx) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0) scale(1)';
          }, idx * 150);
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '50px'
    });

    cards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(30px) scale(0.95)';
      card.style.transition = 'opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), transform 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
      observer.observe(card);
    });

    // Profile Modal JavaScript
    const modal = document.getElementById('profileModal');
    const setupProfileBtn = document.getElementById('setupProfileBtn');
    const skipBtn = document.getElementById('skipBtn');

    // Handle setup profile button - redirect to profile page
    if (setupProfileBtn) {
        setupProfileBtn.addEventListener('click', function() {
            // Redirect to profile page
            window.location.href = '{{ route("user.profile") }}';
        });
    }

    // Handle skip button - create default profile
    if (skipBtn) {
        skipBtn.addEventListener('click', function() {
            this.disabled = true;
            this.textContent = 'Skipping...';
            
            fetch('{{ route("profile.skip") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Profile skipped! Default profile created.', 'success');
                    modal.style.display = 'none';
                } else {
                    showToast(data.message || 'Error creating default profile', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Something went wrong!', 'error');
            })
            .finally(() => {
                this.disabled = false;
                this.textContent = 'Skip for Now';
            });
        });
    }

    // Toast notification function
    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg text-white font-semibold shadow-lg ${
            type === 'success' ? 'bg-green-600' : 
            type === 'error' ? 'bg-red-600' : 'bg-blue-600'
        }`;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }
  });
</script>

<style>
  /* Enhanced smooth transitions */
  .carousel-item {
    transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Prevent text selection on carousel */
  .carousel {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Modern card hover effects */
  .group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
  }

  .group:hover .group-hover\:brightness-110 {
    filter: brightness(1.1);
  }

  /* Smooth card animations with GPU acceleration */
  .grid a {
    will-change: transform, opacity, box-shadow;
    backface-visibility: hidden;
    transform-style: preserve-3d;
  }

  /* Custom scrollbar for better aesthetics */
  ::-webkit-scrollbar {
    width: 8px;
  }

  ::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
  }

  ::-webkit-scrollbar-thumb {
    background: rgba(34, 197, 94, 0.3);
    border-radius: 4px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: rgba(34, 197, 94, 0.5);
  }

  /* Responsive text shadow adjustments */
  @media (max-width: 640px) {
    h3[style*="text-shadow"] {
      text-shadow: 0 0 5px rgba(34, 197, 94, 0.3) !important;
    }
  }

  /* Modal styling improvements */
  #profileModal {
    backdrop-filter: blur(10px);
  }
</style>

@endsection
