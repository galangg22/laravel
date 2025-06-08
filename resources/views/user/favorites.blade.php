@extends('layouts.dashboard')

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
                        
                        <!-- Play Button Overlay -->
                        <div class="play-button-overlay">
                            <div class="play-button">
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

<!-- Enhanced Responsive Video Player Modal -->
<div id="videoModal" class="fixed inset-0 bg-black/95 flex items-center justify-center z-50 p-2 sm:p-4 hidden backdrop-blur-sm">
    <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl w-full max-w-7xl max-h-[95vh] overflow-hidden border-2 border-purple-600 shadow-2xl shadow-purple-500/20">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-3 sm:p-4 flex items-center justify-between">
            <h3 id="modalVideoTitle" class="text-sm sm:text-lg lg:text-xl font-bold text-white truncate pr-4" style="font-family: 'Orbitron', sans-serif;">
                Video Player
            </h3>
            <button onclick="closeVideoModal()" class="text-white hover:text-gray-300 transition-colors duration-300 p-1 hover:bg-white/10 rounded-lg">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Responsive Video Container -->
        <div class="video-container">
            <iframe id="modalYoutubePlayer"
                    class="responsive-video"
                    src=""
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>
        
        <!-- Video Info -->
        <div class="p-3 sm:p-4 lg:p-6 max-h-32 overflow-y-auto">
            <p id="modalVideoDescription" class="text-gray-300 leading-relaxed text-xs sm:text-sm lg:text-base">
                Video description will appear here.
            </p>
        </div>
    </div>
</div>

<script>
// Wait for dashboard to be loaded
window.addEventListener('dashboardLoaded', function() {
    initializeFavorites();
});

// Fallback initialization
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        initializeFavorites();
    }, 2000);
});

function initializeFavorites() {
    console.log('Initializing favorites page...');
    
    // Initialize modal styles
    const modal = document.getElementById('videoModal');
    if (modal) {
        modal.style.opacity = '0';
        modal.style.transform = 'scale(0.95)';
        modal.style.transition = 'all 0.3s ease-out';
    }
}

// Video data from blade
const favoriteVideos = [
    @foreach($favoriteVideos as $video)
    {
        id: {{ $video->id }},
        title: {!! json_encode($video->title) !!},
        description: {!! json_encode($video->description) !!},
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

// Enhanced remove favorite dengan Sweet Alert
function removeFavorite(videoId) {
    const btn = document.querySelector(`[data-video-id="${videoId}"]`);
    
    if (!btn) {
        console.error('Button not found for video ID:', videoId);
        return;
    }
    
    // Sweet Alert confirmation
    Swal.fire({
        title: 'Remove from Favorites?',
        text: 'Are you sure you want to remove this video from your favorites?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, remove it',
        cancelButtonText: 'Keep it',
        background: 'linear-gradient(135deg, #002c14 0%, #000000 50%, #002c14 100%)',
        color: '#fff',
        customClass: {
            popup: 'heart-horizon-popup',
            title: 'heart-horizon-title',
            content: 'heart-horizon-content'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            btn.disabled = true;
            btn.innerHTML = '<div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>';
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showToast('Please refresh the page and try again.', 'error');
                btn.disabled = false;
                btn.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                return;
            }
            
            fetch(`/favorite/${videoId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Enhanced removal animation
                    const videoCard = btn.closest('.video-card');
                    if (videoCard) {
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
                    }
                    
                    showToast(data.message || 'Video removed from favorites!', 'success');
                } else {
                    showToast(data.message || 'Failed to remove video', 'error');
                    btn.disabled = false;
                    btn.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Something went wrong! Please try again.', 'error');
                btn.disabled = false;
                btn.innerHTML = '<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            });
        }
    });
}

// Play video in modal
function playVideo(videoId) {
    const video = favoriteVideos.find(v => v.id === videoId);
    if (!video) {
        showToast('Video not found!', 'error');
        return;
    }
    
    const videoIdYoutube = extractYouTubeId(video.video_url);
    
    // Update modal content
    document.getElementById('modalVideoTitle').textContent = video.title;
    document.getElementById('modalVideoDescription').textContent = video.description;
    
    // Load video
    const iframe = document.getElementById('modalYoutubePlayer');
    if (videoIdYoutube) {
        iframe.src = `https://www.youtube.com/embed/${videoIdYoutube}?enablejsapi=1&rel=0&modestbranding=1&controls=1&autoplay=1`;
    } else {
        showToast('Invalid video URL!', 'error');
        return;
    }
    
    // Show modal with animation
    const modal = document.getElementById('videoModal');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.style.opacity = '1';
        modal.style.transform = 'scale(1)';
    }, 50);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

// Close video modal
function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    modal.style.opacity = '0';
    modal.style.transform = 'scale(0.95)';
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.getElementById('modalYoutubePlayer').src = '';
        document.body.style.overflow = 'auto';
    }, 300);
}

// Enhanced Sweet Alert toast function
function showToast(message, type = 'info') {
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

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVideoModal();
    }
});

// Close modal on click outside
document.getElementById('videoModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeVideoModal();
    }
});
</script>

<style>
/* Line clamp utilities */
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

/* RESPONSIVE PLAY BUTTON */
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

.video-card:hover .play-button-overlay {
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
    margin-left: 2px;
    color: white;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

/* RESPONSIVE VIDEO MODAL */
.video-container {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    overflow: hidden;
    background: #000;
}

.responsive-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

/* Responsive modal adjustments */
@media (max-width: 640px) {
    #videoModal .bg-gradient-to-br {
        margin: 0.5rem;
        max-height: calc(100vh - 1rem);
    }
    
    .video-container {
        padding-bottom: 56.25%; /* Maintain 16:9 on mobile */
    }
}

@media (min-width: 641px) and (max-width: 1024px) {
    .video-container {
        padding-bottom: 56.25%; /* Standard 16:9 for tablets */
    }
}

@media (min-width: 1025px) {
    .video-container {
        padding-bottom: 56.25%; /* Standard 16:9 for desktop */
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

/* Enhanced aspect ratio for different screen sizes */
@media (orientation: portrait) and (max-width: 768px) {
    .video-container {
        padding-bottom: 75%; /* Adjust for portrait mobile */
    }
}

@media (orientation: landscape) and (max-height: 500px) {
    #videoModal .bg-gradient-to-br {
        max-height: 95vh;
    }
    
    .video-container {
        padding-bottom: 50%; /* Adjust for landscape mobile */
    }
}
</style>

@endsection
