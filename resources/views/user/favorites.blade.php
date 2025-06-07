@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">

<div class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-8 gap-4">
            <a href="{{ route('dashboard.index') }}" 
               class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-green-500/30">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
            
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center bg-gradient-to-r from-purple-400 via-purple-300 to-purple-500 bg-clip-text text-transparent animate-pulse" 
                style="font-family: 'Orbitron', sans-serif; text-shadow: 0 0 20px #a855f7;">
                My Favorite Videos
            </h1>
            
            <div class="w-32 hidden sm:block"></div>
        </div>

        <!-- Favorites Grid -->
        @if($favoriteVideos->count() > 0)
            <!-- Stats Card -->
            <div class="bg-gradient-to-r from-purple-900/30 to-purple-800/30 border border-purple-500/30 rounded-xl p-4 mb-8 backdrop-blur-sm">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.682l-1.318-1.364a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-purple-300">Total Favorites</h3>
                            <p class="text-2xl font-bold text-white">{{ $favoriteVideos->count() }}</p>
                        </div>
                    </div>
                    <div class="text-center sm:text-right">
                        <p class="text-sm text-purple-300">Keep exploring and add more videos!</p>
                        <p class="text-xs text-gray-400">Last updated: {{ now()->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Responsive Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 sm:gap-6">
                @foreach($favoriteVideos as $video)
                <div class="video-card group bg-gradient-to-br from-gray-800/50 to-gray-900/50 rounded-xl overflow-hidden border border-purple-600/30 hover:border-purple-400/60 transition-all duration-500 transform hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/20 relative backdrop-blur-sm">
                    
                    <!-- Remove Favorite Button -->
                    <div class="absolute top-3 right-3 z-20">
                        <button onclick="removeFavorite({{ $video->id }})" 
                                class="remove-favorite-btn bg-red-600/80 hover:bg-red-700 rounded-full p-2 transition-all duration-300 transform hover:scale-110 shadow-lg opacity-0 group-hover:opacity-100"
                                data-video-id="{{ $video->id }}"
                                title="Remove from favorites">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-gradient-to-r from-purple-600 to-purple-700 text-white text-xs px-3 py-1 rounded-full shadow-lg backdrop-blur-sm border border-purple-400/30">
                            {{ $video->category->name }}
                        </span>
                    </div>
                    
                    <!-- Thumbnail -->
                    <div class="relative aspect-video bg-black cursor-pointer overflow-hidden" onclick="playVideo({{ $video->id }})">
                        @if($video->thumbnail_path)
                            <img src="{{ asset('storage/' . $video->thumbnail_path) }}" 
                                 alt="{{ $video->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                 onerror="this.src='https://via.placeholder.com/320x180/6b7280/ffffff?text=No+Thumbnail'">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-800">
                                <svg class="w-12 sm:w-16 h-12 sm:h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- RESPONSIVE PLAY BUTTON OVERLAY - DIPERBAIKI -->
                        <div class="play-button-overlay group-hover:opacity-100">
                            <div class="play-button group-hover:scale-100">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <!-- Video Info -->
                    <div class="p-3 sm:p-4">
                        <h3 class="font-bold text-sm sm:text-base lg:text-lg text-purple-400 mb-2 line-clamp-2 group-hover:text-purple-300 transition-colors duration-300" 
                            style="font-family: 'Orbitron', sans-serif;">
                            {{ $video->title }}
                        </h3>
                        <p class="text-gray-300 text-xs sm:text-sm line-clamp-2 sm:line-clamp-3 mb-3 leading-relaxed">
                            {{ $video->description }}
                        </p>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-2">
                            <a href="{{ route('category.show', $video->category) }}" 
                               class="flex-1 inline-flex items-center justify-center px-3 py-1.5 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-500 hover:to-purple-600 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg text-xs sm:text-sm">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <span class="hidden sm:inline">View Category</span>
                                <span class="sm:hidden">Category</span>
                            </a>
                            <button onclick="playVideo({{ $video->id }})" 
                                    class="inline-flex items-center justify-center px-3 py-1.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg text-xs sm:text-sm"
                                    title="Play video">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Animated Border -->
                    <div class="absolute inset-0 rounded-xl border-2 border-purple-500/0 group-hover:border-purple-400/50 transition-all duration-500 pointer-events-none"></div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Enhanced Empty State -->
            <div class="text-center py-16 sm:py-24">
                <div class="relative mb-8">
                    <div class="text-purple-400 mb-6 relative">
                        <svg class="w-24 h-24 sm:w-32 sm:h-32 mx-auto mb-4 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.682l-1.318-1.364a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <!-- Floating Hearts Animation -->
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2">
                            <div class="animate-bounce delay-100">💜</div>
                        </div>
                        <div class="absolute top-4 left-1/3 transform -translate-x-1/2">
                            <div class="animate-bounce delay-300">💙</div>
                        </div>
                        <div class="absolute top-4 right-1/3 transform translate-x-1/2">
                            <div class="animate-bounce delay-500">💚</div>
                        </div>
                    </div>
                </div>
                
                <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-purple-400 mb-4 bg-gradient-to-r from-purple-400 to-purple-300 bg-clip-text text-transparent" 
                    style="font-family: 'Orbitron', sans-serif;">
                    No Favorite Videos Yet
                </h3>
                <p class="text-gray-400 mb-8 max-w-md mx-auto text-sm sm:text-base leading-relaxed px-4">
                    Start exploring videos and click the heart icon to add them to your favorites! Build your personal collection of amazing content.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('dashboard.index') }}" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-500 hover:to-purple-600 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-purple-500/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Explore Videos
                    </a>
                    
                    <div class="text-center">
                        <p class="text-xs text-gray-500">or</p>
                        <p class="text-sm text-purple-300 mt-1">Browse by categories above</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Enhanced Video Player Modal -->
<div id="videoModal" class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-4 hidden backdrop-blur-sm">
    <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl max-w-6xl w-full max-h-[95vh] overflow-hidden border-2 border-purple-600 shadow-2xl shadow-purple-500/20">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-4 flex items-center justify-between">
            <h3 id="modalVideoTitle" class="text-lg sm:text-xl font-bold text-white truncate pr-4" style="font-family: 'Orbitron', sans-serif;">
                Video Player
            </h3>
            <button onclick="closeVideoModal()" class="text-white hover:text-gray-300 transition-colors duration-300 p-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Video Player -->
        <div class="aspect-video bg-black">
            <iframe id="modalYoutubePlayer"
                    class="w-full h-full"
                    src=""
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>
        
        <!-- Video Info -->
        <div class="p-4 sm:p-6 max-h-32 overflow-y-auto">
            <p id="modalVideoDescription" class="text-gray-300 leading-relaxed text-sm sm:text-base">
                Video description will appear here.
            </p>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 space-y-2"></div>

<script>
// Video data from blade
const favoriteVideos = [
    @foreach($favoriteVideos as $video)
    {
        id: {{ $video->id }},
        title: '{{ str_replace(["'", '"'], ["\\'", '\\"'], $video->title) }}',
        description: '{{ str_replace(["'", '"'], ["\\'", '\\"'], $video->description) }}',
        video_url: '{{ $video->video_url }}',
        category: '{{ $video->category->name }}'
    }@if(!$loop->last),@endif
    @endforeach
];

// Extract YouTube video ID from URL
function extractYouTubeId(url) {
    if (!url) return '';
    const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
    const match = url.match(regex);
    return match ? match[1] : url;
}

// Enhanced remove favorite with animation
function removeFavorite(videoId) {
    const btn = document.querySelector(`[data-video-id="${videoId}"]`);
    
    if (confirm('Are you sure you want to remove this video from favorites?')) {
        btn.disabled = true;
        btn.innerHTML = '<div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>';
        
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            showToast('Please refresh the page and try again.', 'error');
            btn.disabled = false;
            return;
        }
        
        fetch(`/favorite/${videoId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken.getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Enhanced removal animation
                const videoCard = btn.closest('.video-card');
                videoCard.style.transform = 'scale(0.8) rotateY(90deg)';
                videoCard.style.opacity = '0';
                videoCard.style.filter = 'blur(5px)';
                
                setTimeout(() => {
                    videoCard.remove();
                    
                    // Check if no more favorites
                    const remainingCards = document.querySelectorAll('.video-card');
                    if (remainingCards.length === 0) {
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                }, 400);
                
                showToast(data.message, 'success');
            } else {
                showToast(data.message, 'error');
                btn.disabled = false;
                btn.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Something went wrong!', 'error');
            btn.disabled = false;
            btn.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
        });
    }
}

// Play video in modal
function playVideo(videoId) {
    const video = favoriteVideos.find(v => v.id === videoId);
    if (!video) return;
    
    const videoIdYoutube = extractYouTubeId(video.video_url);
    
    // Update modal content
    document.getElementById('modalVideoTitle').textContent = video.title;
    document.getElementById('modalVideoDescription').textContent = video.description;
    
    // Load video
    const iframe = document.getElementById('modalYoutubePlayer');
    if (videoIdYoutube) {
        iframe.src = `https://www.youtube.com/embed/${videoIdYoutube}?enablejsapi=1&rel=0&modestbranding=1&controls=1&autoplay=1`;
    }
    
    // Show modal with animation
    const modal = document.getElementById('videoModal');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
    }, 50);
}

// Close video modal
function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    modal.style.opacity = '0';
    modal.style.transform = 'scale(0.95)';
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.getElementById('modalYoutubePlayer').src = '';
    }, 300);
}

// Enhanced toast notification function
function showToast(message, type = 'info') {
    const toastContainer = document.getElementById('toast-container');
    const toast = document.createElement('div');
    
    const toastId = 'toast-' + Date.now();
    toast.id = toastId;
    
    let bgColor, icon, borderColor;
    switch(type) {
        case 'success':
            bgColor = 'bg-gradient-to-r from-green-500 to-green-600';
            borderColor = 'border-green-400';
            icon = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>`;
            break;
        case 'error':
            bgColor = 'bg-gradient-to-r from-red-500 to-red-600';
            borderColor = 'border-red-400';
            icon = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>`;
            break;
        default:
            bgColor = 'bg-gradient-to-r from-blue-500 to-blue-600';
            borderColor = 'border-blue-400';
            icon = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>`;
    }
    
    toast.className = `${bgColor} ${borderColor} border-2 text-white px-4 sm:px-6 py-3 sm:py-4 rounded-xl shadow-2xl backdrop-blur-sm transform transition-all duration-500 ease-out translate-y-[-20px] opacity-0 max-w-sm sm:max-w-md`;
    
    toast.innerHTML = `
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0">
                ${icon}
            </div>
            <div class="flex-1">
                <p class="font-semibold text-sm sm:text-base">${message}</p>
            </div>
            <button onclick="removeToast('${toastId}')" class="flex-shrink-0 ml-2 hover:bg-white/20 rounded-full p-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    `;
    
    toastContainer.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-y-[-20px]', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
    }, 100);
    
    // Auto remove after 4 seconds
    setTimeout(() => {
        removeToast(toastId);
    }, 4000);
}

// Remove toast function
function removeToast(toastId) {
    const toast = document.getElementById(toastId);
    if (toast) {
        toast.classList.add('translate-y-[-20px]', 'opacity-0', 'scale-95');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVideoModal();
    }
});

// Initialize modal styles
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('videoModal');
    modal.style.opacity = '0';
    modal.style.transform = 'scale(0.95)';
    modal.style.transition = 'all 0.3s ease-out';
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Enhanced responsive grid */
@media (min-width: 1536px) {
    .grid-cols-1.sm\:grid-cols-2.lg\:grid-cols-3.xl\:grid-cols-4.\32xl\:grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr));
    }
}

/* Smooth transitions for all elements */
* {
    transition-property: transform, opacity, box-shadow, background-color, border-color, color;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Enhanced hover effects */
.video-card {
    will-change: transform;
    backface-visibility: hidden;
}

/* RESPONSIVE PLAY BUTTON - PERBAIKAN UTAMA */
.play-button-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(2px);
    opacity: 0;
    transition: all 0.3s ease;
}

.play-button-overlay:hover {
    opacity: 1;
}

.play-button {
    width: clamp(40px, 8vw, 80px);
    height: clamp(40px, 8vw, 80px);
    background: linear-gradient(135deg, #9333ea, #7c3aed);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: scale(0.8);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 32px rgba(147, 51, 234, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.play-button:hover {
    transform: scale(1);
    box-shadow: 0 12px 40px rgba(147, 51, 234, 0.5);
    background: linear-gradient(135deg, #a855f7, #8b5cf6);
}

.play-button svg {
    width: clamp(16px, 3vw, 32px);
    height: clamp(16px, 3vw, 32px);
    margin-left: 2px; /* Offset untuk visual centering */
    color: white;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

/* Responsive breakpoints untuk play button */
@media (max-width: 640px) {
    .play-button {
        width: 50px;
        height: 50px;
    }
    
    .play-button svg {
        width: 20px;
        height: 20px;
    }
}

@media (min-width: 641px) and (max-width: 1024px) {
    .play-button {
        width: 60px;
        height: 60px;
    }
    
    .play-button svg {
        width: 24px;
        height: 24px;
    }
}

@media (min-width: 1025px) and (max-width: 1440px) {
    .play-button {
        width: 70px;
        height: 70px;
    }
    
    .play-button svg {
        width: 28px;
        height: 28px;
    }
}

@media (min-width: 1441px) {
    .play-button {
        width: 80px;
        height: 80px;
    }
    
    .play-button svg {
        width: 32px;
        height: 32px;
    }
}

/* Loading animation */
@keyframes spin {
    to { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* Custom scrollbar for modal */
.max-h-32::-webkit-scrollbar {
    width: 4px;
}

.max-h-32::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
}

.max-h-32::-webkit-scrollbar-thumb {
    background: rgba(147, 51, 234, 0.5);
    border-radius: 2px;
}

.max-h-32::-webkit-scrollbar-thumb:hover {
    background: rgba(147, 51, 234, 0.7);
}

/* Aspect ratio container untuk konsistensi */
.aspect-video {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    overflow: hidden;
}

.aspect-video > * {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

@endsection
