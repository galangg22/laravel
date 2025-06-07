<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player - Heart Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen">

<div class="min-h-screen text-white p-4">
    <div class="max-w-7xl mx-auto">
        
        <!-- Back Button & Category Title -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ url()->previous($category->id) }}" 
               class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
            
            <!-- Category Title -->
            <h1 class="text-3xl md:text-2xl sm:text-xl font-bold text-green-400 text-center flex-1" 
                style="font-family: 'Orbitron', sans-serif; text-shadow: 0 0 10px #00ff00;">
                Kategori: {{ $category->name }}
            </h1>
            
            <div class="w-20"></div> 
        </div>

        <!-- Mobile Drawer Toggle -->
        <div class="lg:hidden mb-4">
            <label for="playlist-drawer" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white drawer-button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                Playlist
            </label>
        </div>

        <!-- Main Layout -->
        <div class="drawer lg:drawer-open">
            <input id="playlist-drawer" type="checkbox" class="drawer-toggle" />
            
            <!-- Main Content -->
            <div class="drawer-content">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    
                    <!-- Spacer for desktop sidebar -->
                    <div class="hidden lg:block lg:col-span-1"></div>
                    
                    <!-- Main Video Area -->
                    <div class="lg:col-span-3">
                        <!-- Video Player Container -->
                        <div class="relative bg-black rounded-xl overflow-hidden shadow-2xl border-2 border-green-600 mb-6">
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
                        <div class="bg-gray-800/50 rounded-xl p-6 border border-green-600/30">
                            <div class="flex items-start gap-4">
                                <!-- Favorite Button -->
                                <button id="favorite-btn" 
                                        class="btn btn-circle btn-outline border-green-500 hover:bg-green-500 hover:border-green-500 transition-all duration-300"
                                        onclick="toggleFavorite()">
                                    <svg id="heart-icon" class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.682l-1.318-1.364a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                
                                <!-- Video Details -->
                                <div class="flex-1">
                                    <h1 id="video-title" class="text-2xl font-bold text-green-400 mb-3" 
                                        style="font-family: 'Orbitron', sans-serif;">
                                        @if($videos->count() > 0)
                                            {{ $videos->first()->title }}
                                        @else
                                            No Video Available
                                        @endif
                                    </h1>
                                    <p id="video-description" class="text-gray-300 leading-relaxed">
                                        @if($videos->count() > 0)
                                            {{ $videos->first()->description }}
                                        @else
                                            No description available.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Playlist Sidebar -->
            <div class="drawer-side lg:drawer-open">
                <label for="playlist-drawer" class="drawer-overlay lg:hidden"></label>
                <div class="w-80 min-h-full bg-gray-900/95 lg:bg-transparent">
                    
                    <!-- Playlist Header -->
                    <div class="bg-green-600 rounded-t-xl lg:rounded-xl p-4 m-4 lg:m-0">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2" 
                            style="font-family: 'Orbitron', sans-serif;">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Playlist
                        </h3>
                        <p class="text-green-100 text-sm mt-1">{{ $videos->count() }} videos</p>
                    </div>
                    
                    <!-- Playlist Items -->
                    <div class="bg-gray-800/80 lg:bg-gray-800/50 rounded-b-xl lg:rounded-xl mx-4 lg:mx-0 lg:mt-2 border border-green-600/30">
                        <div id="playlist-container" class="space-y-1 p-2">
                            <!-- Playlist items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Data playlist dinamis dari Blade
const playlist = [
    @foreach($videos as $index => $video)
    {
        id: '{{ $video->video_url }}',
        title: '{{ addslashes($video->title) }}',
        description: '{{ addslashes($video->description) }}',
        thumbnail: '{{ $video->thumbnail_path ? asset("storage/" . $video->thumbnail_path) : "https://via.placeholder.com/320x180?text=No+Thumbnail" }}',
        database_id: {{ $video->id }}
    }@if(!$loop->last),@endif
    @endforeach
];

let currentVideoIndex = 0;
let isFavorited = false;

// Extract YouTube video ID from URL
function extractYouTubeId(url) {
    const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
    const match = url.match(regex);
    return match ? match[1] : url;
}

// Initialize playlist
function initializePlaylist() {
    const container = document.getElementById('playlist-container');
    container.innerHTML = '';
    
    if (playlist.length === 0) {
        container.innerHTML = `
            <div class="text-center py-8 text-gray-400">
                <p>No videos available in this category</p>
            </div>
        `;
        return;
    }
    
    playlist.forEach((video, index) => {
        const isActive = index === currentVideoIndex;
        const playlistItem = document.createElement('div');
        playlistItem.className = `playlist-item p-3 rounded-lg cursor-pointer transition-all duration-300 hover:bg-green-600/20 ${isActive ? 'bg-green-600/30 border border-green-500' : 'hover:bg-gray-700/50'}`;
        playlistItem.onclick = () => playVideo(index);
        
        playlistItem.innerHTML = `
            <div class="flex gap-3">
                <div class="relative flex-shrink-0">
                    <img src="${video.thumbnail}" 
                         alt="${video.title}" 
                         class="w-20 h-14 object-cover rounded-md"
                         onerror="this.src='https://via.placeholder.com/80x56?text=No+Image'">
                    ${isActive ? '<div class="absolute inset-0 bg-green-500/20 rounded-md flex items-center justify-center"><svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg></div>' : ''}
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-sm ${isActive ? 'text-green-400' : 'text-white'} truncate">${video.title}</h4>
                    <p class="text-xs text-gray-400 mt-1 truncate">${video.description}</p>
                </div>
            </div>
        `;
        
        container.appendChild(playlistItem);
    });
}

// Play video function
function playVideo(index) {
    if (playlist.length === 0) return;
    
    currentVideoIndex = index;
    const video = playlist[index];
    const videoId = extractYouTubeId(video.id);
    
    // Update YouTube iframe
    const iframe = document.getElementById('youtube-player');
    iframe.src = `https://www.youtube.com/embed/${videoId}?enablejsapi=1&rel=0&modestbranding=1&controls=1&autoplay=1`;
    
    // Update video info
    document.getElementById('video-title').textContent = video.title;
    document.getElementById('video-description').textContent = video.description;
    
    // Update playlist
    initializePlaylist();
    
    // Close drawer on mobile after selection
    if (window.innerWidth < 1024) {
        document.getElementById('playlist-drawer').checked = false;
    }
    
    // Reset favorite state
    isFavorited = false;
    updateFavoriteButton();
}

// Toggle favorite function
function toggleFavorite() {
    isFavorited = !isFavorited;
    updateFavoriteButton();
    
    // Show toast notification
    const toast = document.createElement('div');
    toast.className = 'toast toast-top toast-end z-50';
    toast.innerHTML = `
        <div class="alert ${isFavorited ? 'alert-success' : 'alert-info'}">
            <span>${isFavorited ? 'Added to favorites!' : 'Removed from favorites!'}</span>
        </div>
    `;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Update favorite button appearance
function updateFavoriteButton() {
    const heartIcon = document.getElementById('heart-icon');
    const favoriteBtn = document.getElementById('favorite-btn');
    
    if (isFavorited) {
        heartIcon.setAttribute('fill', 'currentColor');
        favoriteBtn.classList.add('bg-green-500', 'border-green-500', 'text-white');
        favoriteBtn.classList.remove('btn-outline');
    } else {
        heartIcon.setAttribute('fill', 'none');
        favoriteBtn.classList.remove('bg-green-500', 'border-green-500', 'text-white');
        favoriteBtn.classList.add('btn-outline');
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initializePlaylist();
    updateFavoriteButton();
    
    // Auto-play first video if available
    if (playlist.length > 0) {
        playVideo(0);
    }
});
</script>

</body>
</html>
