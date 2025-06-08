{{-- resources/views/layouts/sidebar.blade.php --}}
<header class="text-white px-6 py-4 flex justify-between items-center shadow-md bg-gradient-to-r from-black via-gray-900 to-black border-b border-green-500/30">
    <button 
      id="sidebarToggle"
      class="bg-gradient-to-r from-green-800 to-green-600 hover:from-green-300 hover:to-green-400 text-gray-900 font-semibold px-4 py-2 rounded-full transition-all duration-300 transform hover:scale-110 hover:shadow-lg hover:shadow-green-500/50"
      type="button"
      aria-label="Toggle sidebar"
    >
      <span class="text-lg">☰</span>
    </button>

    <div class="text-right">
        <h2 class="text-sm font-semibold bg-gradient-to-r from-white to-green-300 bg-clip-text text-transparent">
            {{ Auth::user()->name }}
        </h2>
        <p class="text-sm text-green-400 animate-pulse">
            @if(Auth::user()->profile)
                @switch(Auth::user()->profile->status)
                    @case('jomblo') 🙋‍♂️ Jomblo @break
                    @case('hts') 💕 HTS @break
                    @case('backburner') 🔥 Backburner @break
                    @case('gak laku') 😅 Gak Laku @break
                    @case('toxic relationship') ☠️ Toxic Relationship @break
                    @case('healthy relationship') 💚 Healthy Relationship @break
                    @case('tidak direstui') 😢 Tidak Direstui @break
                    @case('diselingkuhin') 💔 Diselingkuhin @break
                    @case('gamon') 🎭 Gamon @break
                    @default {{ Auth::user()->profile->status }}
                @endswitch
            @else
                <span class="text-red-400">No Status Set</span>
            @endif
        </p>
    </div>
</header>

<div 
    id="sidebarOverlay" 
    class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm hidden z-40 transition-all duration-300"
></div>

<aside 
    id="sidebar" 
    class="fixed top-0 left-0 h-full w-72 bg-gradient-to-b from-black via-gray-900 to-black border-r-4 border-green-500 rounded-r-2xl shadow-2xl shadow-green-500/20 transform -translate-x-full transition-all duration-500 ease-in-out z-50 flex flex-col backdrop-blur-lg"
    aria-label="Sidebar Navigation"
>
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-green-500/20 via-transparent to-purple-500/20"></div>
        <div class="absolute top-10 left-10 w-20 h-20 bg-green-500/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-purple-500/10 rounded-full blur-xl animate-pulse delay-1000"></div>
    </div>

    <!-- Profile Section -->
    <div class="relative sticky top-0 bg-gradient-to-r from-gray-900/90 to-black/90 border-b border-green-800/50 p-6 z-10 flex flex-col justify-center items-center backdrop-blur-sm">
        <a href="{{ route('user.profile') }}" class="flex flex-col items-center group transition-all duration-500 hover:scale-110">
            <div class="relative">
                @if(Auth::user()->profile && Auth::user()->profile->profile_picture)
                    <img src="{{ asset('storage/profiles/' . Auth::user()->profile->profile_picture) }}" 
                        alt="Profile {{ Auth::user()->name }}" 
                        class="h-16 w-16 rounded-full object-cover mb-3 border-3 border-green-600 group-hover:border-green-400 transition-all duration-500 select-none shadow-lg shadow-green-500/30 group-hover:shadow-green-400/50" />
                @else
                    <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-3 border-3 border-green-600 group-hover:from-green-500 group-hover:to-green-700 group-hover:border-green-400 transition-all duration-500 select-none shadow-lg shadow-green-500/30 group-hover:shadow-green-400/50">
                        <span class="text-white font-bold text-xl" style="font-family: 'Orbitron', sans-serif;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                @endif
                <!-- Glowing Ring Effect -->
                <div class="absolute inset-0 rounded-full border-2 border-green-400/0 group-hover:border-green-400/50 transition-all duration-500 animate-pulse"></div>
            </div>
          
            <span class="text-green-400 text-sm font-medium group-hover:text-green-300 transition-all duration-500 select-none bg-gradient-to-r from-green-400 to-green-300 bg-clip-text group-hover:text-transparent" 
                  style="font-family: 'Orbitron', sans-serif;">
                {{ Auth::user()->name }}
            </span>
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="relative flex-grow flex flex-col p-6 space-y-4 text-white overflow-y-auto">
        <!-- Home Link -->
        <a href="{{ route('dashboard.index') }}" 
           class="group relative text-sm font-semibold transition-all duration-300 rounded-xl px-4 py-3 flex justify-center items-center bg-gradient-to-r from-gray-800/50 to-gray-700/50 hover:from-red-600/20 hover:to-red-500/20 border border-gray-700 hover:border-red-500/50 transform hover:scale-105">
            <span class="relative z-10 group-hover:text-red-400 transition-colors duration-300">HOME</span>
            <div class="absolute inset-0 bg-gradient-to-r from-red-500/0 to-red-600/0 group-hover:from-red-500/10 group-hover:to-red-600/10 rounded-xl transition-all duration-300"></div>
        </a>
        
        <div class="relative">
            <hr class="border-t-2 border-green-400 shadow-[0_0_10px_#00FF00]" />
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-green-400/20 to-transparent h-px animate-pulse"></div>
        </div>

        <!-- Categories Section -->
        @php
            if (!isset($categories)) {
                $categories = \App\Models\Category::all();
            }
        @endphp

        @if($categories && $categories->count() > 0)
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category->id) }}" 
                   class="group relative text-lg font-semibold transition-all duration-300 rounded-xl px-4 py-3 bg-gradient-to-r from-gray-800/30 to-gray-700/30 hover:from-green-600/20 hover:to-green-500/20 border border-gray-700/50 hover:border-green-500/50 transform hover:scale-105 hover:shadow-lg hover:shadow-green-500/20">
                    <span class="relative z-10 group-hover:text-green-300 transition-colors duration-300">{{ $category->name }}</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500/0 to-green-600/0 group-hover:from-green-500/10 group-hover:to-green-600/10 rounded-xl transition-all duration-300"></div>
                    <!-- Hover Glow Effect -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-green-500/0 via-green-400/0 to-green-500/0 group-hover:from-green-500/20 group-hover:via-green-400/20 group-hover:to-green-500/20 rounded-xl blur transition-all duration-300"></div>
                </a>
            @endforeach
        @else
            <p class="text-gray-500 px-4 py-3 text-center italic">Belum ada kategori</p>
        @endif

        <!-- Spacer dengan Animated Dots -->
        <div class="flex-grow flex items-end justify-center pb-4">
            <div class="flex space-x-1">
                <div class="w-2 h-2 bg-green-500/50 rounded-full animate-bounce"></div>
                <div class="w-2 h-2 bg-green-500/50 rounded-full animate-bounce delay-100"></div>
                <div class="w-2 h-2 bg-green-500/50 rounded-full animate-bounce delay-200"></div>
            </div>
        </div>

        <div class="relative">
            <hr class="border-t border-green-800/50" />
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-green-800/30 to-transparent h-px"></div>
        </div>

        <!-- Favorites Button -->
        <a href="{{ route('favorites.index') }}" 
           class="group relative flex items-center gap-4 bg-gradient-to-r from-purple-900/30 to-purple-800/30 hover:from-purple-600/40 hover:to-purple-500/40 border border-purple-500/30 hover:border-purple-400/60 rounded-xl p-4 text-purple-300 hover:text-purple-200 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/30">
            <div class="relative">
                <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300 drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.682l-1.318-1.364a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <!-- Animated Heart Beat -->
                <div class="absolute inset-0 rounded-full bg-purple-500/20 group-hover:animate-ping"></div>
            </div>
            <span class="font-semibold bg-gradient-to-r from-purple-300 to-purple-200 bg-clip-text group-hover:text-transparent transition-all duration-300">My Favorites</span>
            <!-- Glow Effect -->
            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500/0 via-purple-400/0 to-purple-500/0 group-hover:from-purple-500/20 group-hover:via-purple-400/20 group-hover:to-purple-500/20 rounded-xl blur transition-all duration-500"></div>
        </a>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" 
                    class="group relative w-full flex items-center gap-4 bg-gradient-to-r from-red-900/30 to-red-800/30 hover:from-red-600/40 hover:to-red-500/40 border border-red-500/30 hover:border-red-400/60 rounded-xl p-4 text-red-300 hover:text-red-200 transition-all duration-500 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/30"
                    onclick="return confirm('Are you sure you want to logout?')">
                <div class="relative">
                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <!-- Animated Logout Effect -->
                    <div class="absolute inset-0 rounded-full bg-red-500/20 group-hover:animate-pulse"></div>
                </div>
                <span class="font-semibold bg-gradient-to-r from-red-300 to-red-200 bg-clip-text group-hover:text-transparent transition-all duration-300">Logout</span>
                <!-- Glow Effect -->
                <div class="absolute -inset-1 bg-gradient-to-r from-red-500/0 via-red-400/0 to-red-500/0 group-hover:from-red-500/20 group-hover:via-red-400/20 group-hover:to-red-500/20 rounded-xl blur transition-all duration-500"></div>
            </button>
        </form>
    </nav>

    <!-- Footer Contact Info -->
    <div class="relative sticky bottom-0 bg-gradient-to-r from-gray-900/90 to-black/90 border-t border-green-800/50 p-6 text-green-100 select-none backdrop-blur-sm">
        <div class="relative">
            <hr class="border-green-800/50 mb-4" />
            <div class="space-y-2">
                <p class="text-sm flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    Email: <span class="text-green-300">help@hearthorizon.com</span>
                </p>
                <p class="text-sm flex items-center gap-2">
                    <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse delay-300"></span>
                    Contact: <span class="text-blue-300">‪+62 812 3456 7890‬</span>
                </p>
                <p class="text-sm flex items-center gap-2">
                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse delay-700"></span>
                    YouTube: <span class="text-red-300">Heart Horizon</span>
                </p>
            </div>
            <hr class="border-green-800/50 mt-4" />
        </div>
    </div>
</aside>

<!-- CSS Animations - HANYA CSS -->
<style>
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes glow {
        0%, 100% { box-shadow: 0 0 5px rgba(34, 197, 94, 0.5); }
        50% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.8); }
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .animate-glow {
        animation: glow 2s ease-in-out infinite;
    }
    
    /* Smooth transitions for all elements */
    * {
        transition-property: transform, opacity, box-shadow, background-color, border-color;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Enhanced gradient text */
    .gradient-text {
        background: linear-gradient(45deg, #10b981, #34d399, #6ee7b7);
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>
