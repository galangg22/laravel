@extends('layouts.dashboard')

@section('content')
<!-- Add Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

<div class="min-h-screen text-white p-2 sm:p-4 lg:p-6">
    <div class="max-w-7xl mx-auto">
        
        <!-- RESPONSIVE HEADER - TANPA TOMBOL BACK TO DASHBOARD -->
        <div id="grid-header" class="flex flex-col sm:flex-row items-center justify-center mb-4 sm:mb-6 gap-3 sm:gap-4">
            <!-- Category Title - CENTER ALIGNED -->
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-400 text-center" 
                style="font-family: 'Lexend Deca', sans-serif; text-shadow: 0 0 10px #ffffff;">
                {{ $category->name }}
            </h1>
        </div>

        <!-- RESPONSIVE GRID VIEW -->
        <div id="grid-view" class="grid-container">
            @if($videos->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-3 sm:gap-4 lg:gap-6">
                    @foreach($videos as $video)
                    <div class="video-card bg-gray-800/50 rounded-xl overflow-hidden border border-green-600/30 hover:border-green-500 transition-all duration-300 cursor-pointer transform hover:scale-105 relative"
                         onclick="openVideoPlayer({{ $video->id }})">
                        
                        <!-- Thumbnail -->
                        <div class="relative aspect-video bg-black">
                            @if($video->thumbnail_path)
                                <img src="{{ asset('storage/' . $video->thumbnail_path) }}" 
                                     alt="{{ $video->title }}" 
                                     class="w-full h-full object-cover"
                                     onerror="this.src='data:image/svg+xml;base64,{{ base64_encode('<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'320\' height=\'180\' viewBox=\'0 0 320 180\'><rect width=\'100%\' height=\'100%\' fill=\'#374151\'/><text x=\'50%\' y=\'50%\' text-anchor=\'middle\' dy=\'.3em\' fill=\'#9ca3af\' font-family=\'Arial, sans-serif\' font-size=\'16\' font-weight=\'600\'>No Thumbnail</text></svg>') }}'">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-800">
                                    <svg class="w-12 sm:w-16 h-12 sm:h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Responsive Play Button Overlay -->
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <div class="bg-green-600 rounded-full p-2 sm:p-3 lg:p-4">
                                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Video Info -->
                        <div class="p-3 sm:p-4">
                            <h3 class="font-bold text-sm sm:text-base lg:text-lg text-green-400 mb-2 line-clamp-2" 
                                style="font-family: 'Lexend Deca', sans-serif;">
                                {{ $video->title }}
                            </h3>
                            <p class="text-gray-300 text-xs sm:text-sm line-clamp-2 sm:line-clamp-3">
                                {{ $video->description }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 sm:py-16">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 sm:w-24 sm:h-24 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-400 mb-2" 
                        style="font-family: 'Lexend Deca', sans-serif;">No Videos Available</h3>
                    <p class="text-gray-500 text-sm sm:text-base">This category doesn't have any videos yet.</p>
                </div>
            @endif
        </div>

        <!-- RESPONSIVE VIDEO PLAYER VIEW -->
        <div id="player-view" class="player-container hidden">
            <!-- PLAYER HEADER - HANYA JUDUL CATEGORY -->
            <div class="mb-4 sm:mb-6">
                <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-400 text-center" 
                    style="font-family: 'Lexend Deca', sans-serif; text-shadow: 0 0 10px #00ff00;">
                    {{ $category->name }}
                </h1>
            </div>

            <!-- Mobile Controls -->
            <div class="lg:hidden mb-3 sm:mb-4 flex flex-col sm:flex-row gap-2 sm:gap-3">
                <button id="playlist-toggle" class="inline-flex items-center justify-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-all duration-300 text-sm flex-1 sm:flex-none">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    Playlist
                </button>
                
                <button id="back-to-grid" class="inline-flex items-center justify-center px-3 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-all duration-300 text-sm flex-1 sm:flex-none">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 14a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 14a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Grid View
                </button>
            </div>

            <!-- Main Layout -->
            <div class="drawer lg:drawer-open">
                <input id="playlist-drawer" type="checkbox" class="drawer-toggle" />
                
                <!-- Main Content -->
                <div class="drawer-content">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                        
                        <!-- Spacer for desktop sidebar -->
                        <div class="hidden lg:block lg:col-span-1"></div>
                        
                        <!-- Main Video Area -->
                        <div class="lg:col-span-3">
                            <!-- Desktop Back to Grid Button -->
                            <div class="hidden lg:block mb-4">
                                <button id="back-to-grid-desktop" class="inline-flex items-center justify-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-all duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 14a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 14a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                    Back to Grid View
                                </button>
                            </div>
                            
                            <!-- Video Player Container -->
                            <div class="relative bg-black rounded-lg sm:rounded-xl overflow-hidden shadow-2xl border-2 border-green-600 mb-4 sm:mb-6">
                                <div class="aspect-video">
                                    <iframe id="youtube-player"
                                            class="w-full h-full"
                                            src=""
                                            title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                            
                            <!-- Video Info Section -->
                            <div class="bg-gray-800/50 rounded-lg sm:rounded-xl p-4 sm:p-6 border border-green-600/30">
                                <div class="flex flex-col sm:flex-row items-start gap-3 sm:gap-4">
                                    <!-- Favorite Button -->
                                    <button id="favorite-btn" 
                                            class="inline-flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-full border-2 border-gray-500 text-gray-400 hover:bg-gray-500 transition-all duration-300 group flex-shrink-0"
                                            onclick="toggleCurrentVideoFavorite()"
                                            title="Add to favorites">
                                        <svg id="heart-icon" class="w-5 h-5 sm:w-6 sm:h-6 transition-all duration-300 group-hover:scale-110" 
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" 
                                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.682l-1.318-1.364a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                    
                                    <!-- Video Details -->
                                    <div class="flex-1 min-w-0">
                                        <h1 id="video-title" class="text-lg sm:text-xl lg:text-2xl font-bold text-green-400 mb-2 sm:mb-3 line-clamp-2" 
                                            style="font-family: 'Lexend Deca', sans-serif;">
                                            Select a video to play
                                        </h1>
                                        <p id="video-description" class="text-gray-300 leading-relaxed text-sm sm:text-base line-clamp-3 sm:line-clamp-none">
                                            Choose a video from the playlist to start watching.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Responsive Playlist Sidebar -->
                <div class="drawer-side lg:drawer-open">
                    <label for="playlist-drawer" class="drawer-overlay lg:hidden"></label>
                    <div id="sidebar-container" class="w-72 sm:w-80 min-h-full bg-gray-900/95 lg:bg-transparent">
                        <div id="sidebar" class="h-full overflow-y-auto">
                            <!-- Playlist Header -->
                            <div class="bg-green-600 rounded-t-xl lg:rounded-xl p-3 sm:p-4 m-3 sm:m-4 lg:m-0">
                                <h3 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2" 
                                    style="font-family: 'Lexend Deca', sans-serif;">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Playlist
                                </h3>
                                <p class="text-green-100 text-xs sm:text-sm mt-1" id="playlist-count">{{ $videos->count() }} videos</p>
                            </div>               
                            
                            <!-- Playlist Items -->
                            <div class="bg-gray-800/80 lg:bg-gray-800/50 rounded-b-xl lg:rounded-xl mx-3 sm:mx-4 lg:mx-0 lg:mt-2 border border-green-600/30">
                                <div id="playlist-container" class="space-y-1 p-2 max-h-[60vh] overflow-y-auto">
                                    <!-- Playlist items will be populated by JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 space-y-2"></div>

<script>
// Data video dari Blade dengan SVG fallback
const videosData = [
    @if($videos->count() > 0)
        @foreach($videos as $video)
        {
            id: {{ $video->id }},
            title: '{{ str_replace(["'", '"'], ["\\'", '\\"'], $video->title ?? "No Title") }}',
            description: '{{ str_replace(["'", '"'], ["\\'", '\\"'], $video->description ?? "No Description") }}',
            video_url: '{{ $video->video_url ?? "" }}',
            thumbnail: '{{ $video->thumbnail_path ? asset("storage/" . $video->thumbnail_path) : "" }}',
            is_favorited: {{ Auth::user()->hasFavorited($video->id) ? 'true' : 'false' }}
        }@if(!$loop->last),@endif
        @endforeach
    @endif
];

let currentVideoIndex = 0;
let currentVideoId = null;

// SVG Placeholder Generator
function createSVGPlaceholder(width, height, text, bgColor = '#374151', textColor = '#9ca3af') {
    const svg = `
        <svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">
            <rect width="100%" height="100%" fill="${bgColor}"/>
            <text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="${textColor}" 
                  font-family="Arial, sans-serif" font-size="${Math.max(14, width/20)}" font-weight="600">
                ${text}
            </text>
        </svg>
    `;
    return `data:image/svg+xml;base64,${btoa(svg)}`;
}

// Extract YouTube video ID from URL
function extractYouTubeId(url) {
    if (!url) return '';
    const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
    const match = url.match(regex);
    return match ? match[1] : url;
}

// Sidebar Control Functions - VERSI DIPERBAIKI
function hideSidebar() {
    const sidebar = document.getElementById('sidebar');
    const sidebarContainer = document.getElementById('sidebar-container');
    
    if (sidebar) {
        sidebar.style.visibility = 'hidden';
        sidebar.style.opacity = '0';
        sidebar.style.pointerEvents = 'none';
        sidebar.style.position = 'absolute';
        sidebar.style.left = '-9999px';
    }
    if (sidebarContainer) {
        sidebarContainer.style.visibility = 'hidden';
        sidebarContainer.style.opacity = '0';
        sidebarContainer.style.pointerEvents = 'none';
        sidebarContainer.style.position = 'absolute';
        sidebarContainer.style.left = '-9999px';
    }
    
    console.log('Sidebar hidden for player view');
}

function showSidebar() {
    const sidebar = document.getElementById('sidebar');
    const sidebarContainer = document.getElementById('sidebar-container');
    
    if (sidebar) {
        // Reset semua style yang diubah
        sidebar.style.visibility = '';
        sidebar.style.opacity = '';
        sidebar.style.pointerEvents = '';
        sidebar.style.position = '';
        sidebar.style.left = '';
        sidebar.style.overflow = '';
        sidebar.style.overflowY = '';
        sidebar.style.height = '';
    }
    if (sidebarContainer) {
        // Reset semua style yang diubah
        sidebarContainer.style.visibility = '';
        sidebarContainer.style.opacity = '';
        sidebarContainer.style.pointerEvents = '';
        sidebarContainer.style.position = '';
        sidebarContainer.style.left = '';
        sidebarContainer.style.overflow = '';
        sidebarContainer.style.overflowY = '';
        sidebarContainer.style.height = '';
    }
    
    console.log('Sidebar shown for grid view');
}

// Toggle favorite for current playing video ONLY
function toggleCurrentVideoFavorite() {
    if (!currentVideoId) {
        if (typeof window.showToast === 'function') {
            window.showToast('Please select a video first', 'info');
        } else {
            showToast('Please select a video first', 'info');
        }
        return;
    }
    
    console.log('toggleCurrentVideoFavorite called with videoId:', currentVideoId);
    
    // Get CSRF token
    let csrfToken = null;
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    if (csrfTokenElement) {
        csrfToken = csrfTokenElement.getAttribute('content');
    }
    
    if (!csrfToken && window.Laravel && window.Laravel.csrfToken) {
        csrfToken = window.Laravel.csrfToken;
    }
    
    if (!csrfToken) {
        console.error('CSRF token not found');
        if (typeof window.showToast === 'function') {
            window.showToast('Security token not found. Please refresh the page.', 'error');
        } else {
            showToast('Security token not found. Please refresh the page.', 'error');
        }
        return;
    }
    
    const favoriteBtn = document.getElementById('favorite-btn');
    favoriteBtn.disabled = true;
    
    fetch(`/video/${currentVideoId}/favorite`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({})
    })
    .then(response => {
        if (!response.ok) {
            if (response.status === 419) {
                throw new Error('CSRF token mismatch. Please refresh the page.');
            } else if (response.status === 401) {
                throw new Error('You need to login first.');
            } else if (response.status === 404) {
                throw new Error('Video not found.');
            } else {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Update videosData
            const videoIndex = videosData.findIndex(v => v.id === currentVideoId);
            if (videoIndex !== -1) {
                videosData[videoIndex].is_favorited = data.is_favorited;
            }
            
            // Update favorite button appearance
            updatePlayerFavoriteButton();
            
            // Show toast
            if (typeof window.showToast === 'function') {
                window.showToast(data.message, data.is_favorited ? 'success' : 'info');
            } else {
                showToast(data.message, data.is_favorited ? 'success' : 'info');
            }
        } else {
            if (typeof window.showToast === 'function') {
                window.showToast(data.message || 'Failed to update favorite', 'error');
            } else {
                showToast(data.message || 'Failed to update favorite', 'error');
            }
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        if (typeof window.showToast === 'function') {
            window.showToast(error.message || 'Something went wrong! Please try again.', 'error');
        } else {
            showToast(error.message || 'Something went wrong! Please try again.', 'error');
        }
    })
    .finally(() => {
        favoriteBtn.disabled = false;
    });
}

// Update player favorite button based on current video
function updatePlayerFavoriteButton() {
    const heartIcon = document.getElementById('heart-icon');
    const favoriteBtn = document.getElementById('favorite-btn');
    
    if (currentVideoId) {
        const video = videosData.find(v => v.id === currentVideoId);
        const isFavorited = video ? video.is_favorited : false;
        
        if (isFavorited) {
            // Favorited state - red heart, filled
            heartIcon.setAttribute('fill', 'currentColor');
            heartIcon.classList.remove('text-gray-400');
            heartIcon.classList.add('text-red-500');
            favoriteBtn.classList.remove('border-gray-500', 'text-gray-400', 'hover:bg-gray-500');
            favoriteBtn.classList.add('bg-red-500/20', 'border-red-500', 'text-red-500', 'hover:bg-red-500/30');
            favoriteBtn.setAttribute('title', 'Remove from favorites');
        } else {
            // Not favorited state - gray heart, outline
            heartIcon.setAttribute('fill', 'none');
            heartIcon.classList.remove('text-red-500');
            heartIcon.classList.add('text-gray-400');
            favoriteBtn.classList.remove('bg-red-500/20', 'border-red-500', 'text-red-500', 'hover:bg-red-500/30');
            favoriteBtn.classList.add('border-gray-500', 'text-gray-400', 'hover:bg-gray-500');
            favoriteBtn.setAttribute('title', 'Add to favorites');
        }
    } else {
        // No video selected state
        heartIcon.setAttribute('fill', 'none');
        heartIcon.classList.remove('text-red-500');
        heartIcon.classList.add('text-gray-400');
        favoriteBtn.classList.remove('bg-red-500/20', 'border-red-500', 'text-red-500', 'hover:bg-red-500/30');
        favoriteBtn.classList.add('border-gray-500', 'text-gray-400', 'hover:bg-gray-500');
        favoriteBtn.setAttribute('title', 'Select a video first');
    }
}

// Open video player
function openVideoPlayer(videoId) {
    // Find video index
    const videoIndex = videosData.findIndex(video => video.id === videoId);
    if (videoIndex === -1) return;
    
    // Hide sidebar when entering player view
    hideSidebar();
    
    // Hide grid view and show player view
    document.getElementById('grid-view').classList.add('hidden');
    document.getElementById('grid-header').classList.add('hidden');
    document.getElementById('player-view').classList.remove('hidden');
    
    // Initialize playlist
    initializePlaylist();
    
    // Play the selected video
    playVideo(videoIndex);
}

// Back to grid view
function backToGrid() {
    // Show sidebar when returning to grid view
    showSidebar();
    
    document.getElementById('player-view').classList.add('hidden');
    document.getElementById('grid-view').classList.remove('hidden');
    document.getElementById('grid-header').classList.remove('hidden');
    
    // Stop current video
    document.getElementById('youtube-player').src = '';
    currentVideoId = null;
    
    // Reset favorite button
    updatePlayerFavoriteButton();
}

// Initialize playlist
function initializePlaylist() {
    const container = document.getElementById('playlist-container');
    container.innerHTML = '';
    
    if (videosData.length === 0) {
        container.innerHTML = `
            <div class="text-center py-8 text-gray-400">
                <p class="text-sm">No videos available</p>
            </div>
        `;
        return;
    }
    
    videosData.forEach((video, index) => {
        const isActive = index === currentVideoIndex;
        const playlistItem = document.createElement('div');
        playlistItem.className = `playlist-item p-2 sm:p-3 rounded-lg cursor-pointer transition-all duration-300 hover:bg-green-600/20 ${isActive ? 'bg-green-600/30 border border-green-500' : 'hover:bg-gray-700/50'}`;
        playlistItem.onclick = () => playVideo(index);
        
        // Create thumbnail with SVG fallback
        const thumbnailSrc = video.thumbnail || createSVGPlaceholder(80, 56, 'No Image');
        
        playlistItem.innerHTML = `
            <div class="flex gap-2 sm:gap-3">
                <div class="relative flex-shrink-0">
                    <img src="${thumbnailSrc}" 
                         alt="${video.title}" 
                         class="w-16 h-12 sm:w-20 sm:h-14 object-cover rounded-md"
                         onerror="this.src='${createSVGPlaceholder(80, 56, 'No Image')}'">
                    ${isActive ? '<div class="absolute inset-0 bg-green-500/20 rounded-md flex items-center justify-center"><svg class="w-4 h-4 sm:w-6 sm:h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg></div>' : ''}
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-xs sm:text-sm ${isActive ? 'text-green-400' : 'text-white'} line-clamp-2" style="font-family: 'Lexend Deca', sans-serif;">${video.title}</h4>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-1 sm:line-clamp-2">${video.description}</p>
                </div>
            </div>
        `;
        
        container.appendChild(playlistItem);
    });
}

// Play video function
function playVideo(index) {
    if (videosData.length === 0) return;
    
    currentVideoIndex = index;
    const video = videosData[index];
    currentVideoId = video.id;
    const videoId = extractYouTubeId(video.video_url);
    
    // Update YouTube iframe
    const iframe = document.getElementById('youtube-player');
    if (videoId) {
        iframe.src = `https://www.youtube.com/embed/${videoId}?enablejsapi=1&rel=0&modestbranding=1&controls=1&autoplay=1`;
    } else {
        iframe.src = '';
        alert('Invalid video URL: ' + video.video_url);
    }
    
    // Update video info
    document.getElementById('video-title').textContent = video.title;
    document.getElementById('video-description').textContent = video.description;
    
    // Update playlist
    initializePlaylist();
    
    // Update favorite button
    updatePlayerFavoriteButton();
    
    // Close drawer on mobile after selection
    if (window.innerWidth < 1024) {
        document.getElementById('playlist-drawer').checked = false;
    }
}

// Enhanced toast notification function
function showToast(message, type = 'info') {
    if (typeof window.showToast === 'function') {
        window.showToast(message, type);
        return;
    }
    
    const toastContainer = document.getElementById('toast-container');
    const toast = document.createElement('div');
    
    const toastId = 'toast-' + Date.now();
    toast.id = toastId;
    
    let bgColor, icon, borderColor;
    switch(type) {
        case 'success':
            bgColor = 'bg-gradient-to-r from-green-500 to-green-600';
            borderColor = 'border-green-400';
            icon = `<svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>`;
            break;
        case 'error':
            bgColor = 'bg-gradient-to-r from-red-500 to-red-600';
            borderColor = 'border-red-400';
            icon = `<svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>`;
            break;
        default:
            bgColor = 'bg-gradient-to-r from-blue-500 to-blue-600';
            borderColor = 'border-blue-400';
            icon = `<svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    
    setTimeout(() => {
        toast.classList.remove('translate-y-[-20px]', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
    }, 100);
    
    setTimeout(() => {
        removeToast(toastId);
    }, 4000);
}

function removeToast(toastId) {
    const toast = document.getElementById(toastId);
    if (toast) {
        toast.classList.add('translate-y-[-20px]', 'opacity-0', 'scale-95');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded');
    
    updatePlayerFavoriteButton();
    
    const backToGridBtn = document.getElementById('back-to-grid');
    const backToGridDesktopBtn = document.getElementById('back-to-grid-desktop');
    
    if (backToGridBtn) {
        backToGridBtn.addEventListener('click', backToGrid);
    }
    if (backToGridDesktopBtn) {
        backToGridDesktopBtn.addEventListener('click', backToGrid);
    }
    
    const playlistToggle = document.getElementById('playlist-toggle');
    if (playlistToggle) {
        playlistToggle.addEventListener('click', function() {
            const drawer = document.getElementById('playlist-drawer');
            if (drawer) {
                drawer.checked = !drawer.checked;
            }
        });
    }
});
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');

.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

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

/* Perbaikan untuk grid layout */
.grid-container {
    position: relative;
    z-index: 1;
}

.player-container {
    position: relative;
    z-index: 2;
}

/* Pastikan tidak ada margin/padding yang aneh */
#grid-view, #player-view {
    margin: 0;
    padding: 0;
}

/* Reset untuk drawer */
.drawer {
    position: relative;
}

.drawer-content {
    position: relative;
}

/* Pastikan sidebar memiliki scroll default */
#sidebar, #sidebar-container {
    overflow-y: auto;
    max-height: 100vh;
}

/* Pastikan sidebar selalu scrollable di grid mode */
.drawer-side {
    overflow-y: auto;
}

/* Enhanced responsive grid */
@media (min-width: 1536px) {
    .grid-cols-1.sm\:grid-cols-2.md\:grid-cols-2.lg\:grid-cols-3.xl\:grid-cols-4.\32xl\:grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr));
    }
}

/* Enhanced toast animations */
#toast-container .transform {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Hover effects for favorite button */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

/* Mobile-first responsive utilities */
@media (max-width: 640px) {
    .video-card {
        margin-bottom: 0.5rem;
    }
    
    .playlist-item {
        border-radius: 0.5rem;
    }
}

/* Smooth transitions for all interactive elements */
button, a {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Better touch targets for mobile */
@media (max-width: 768px) {
    button, a {
        min-height: 44px;
        min-width: 44px;
    }
}

/* Playlist container scroll styling */
#playlist-container {
    scrollbar-width: thin;
    scrollbar-color: #10b981 #374151;
}

#playlist-container::-webkit-scrollbar {
    width: 6px;
}

#playlist-container::-webkit-scrollbar-track {
    background: #374151;
    border-radius: 3px;
}

#playlist-container::-webkit-scrollbar-thumb {
    background: #10b981;
    border-radius: 3px;
}

#playlist-container::-webkit-scrollbar-thumb:hover {
    background: #059669;
}
</style>

@endsection
