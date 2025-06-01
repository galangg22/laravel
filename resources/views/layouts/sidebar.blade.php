{{-- resources/views/layouts/sidebar.blade.php --}}
<header class="text-white px-6 py-4 flex justify-between items-center shadow-md bg-black">
    <button 
      id="sidebarToggle"
      class="bg-green-800 hover:bg-green-300 text-gray-900 font-semibold px-3 py-2 rounded-full transition"
      type="button"
      aria-label="Toggle sidebar"
    >
      ☰
    </button>

    <div class="text-right">
        <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
        <p class="text-sm text-green-400">{{ now()->format('l, d F Y') }}</p>
    </div>
</header>

<div 
    id="sidebarOverlay" 
    class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"
></div>

<aside 
    id="sidebar" 
    class="fixed top-0 left-0 h-full w-64 bg-black border-r-4 border-green-500 rounded-r-lg shadow-lg transform -translate-x-full transition-transform duration-300 z-50 flex flex-col"
    aria-label="Sidebar Navigation"
>

    <div class="sticky top-0 bg-black border-b border-green-800 p-6 z-10 flex justify-center items-center">
        <img src="/path/to/your-logo.png" alt="Logo" class="h-12 w-auto select-none" />
    </div>

    <nav class="flex-grow flex flex-col p-6 space-y-4 text-white overflow-y-auto">
        <a href="{{ route('dashboard.index') }}" class="text-sm font-semibold hover:text-red-500 transition rounded-md px-2 py-1 flex justify-center">HOME</a>
        <hr class="border-t-2 border-green-400 shadow-[0_0_10px_#00FF00]" />


        {{-- Loop kategori dinamis --}}
        @if(isset($categories) && $categories->count() > 0)
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category->id) }}" 
                   class="text-lg font-semibold hover:text-green-100 transition rounded-md px-2 py-1">
                    {{ $category->name }}
                </a>
            @endforeach
        @else
            <p class="text-gray-500 px-2 py-1">Belum ada kategori</p>
        @endif
    </nav>

    <div class="sticky bottom-0 bg-black border-t border-green-800 p-6 text-green-100 select-none">
        <hr class="border-green-800 mb-4" />
        <p class="text-sm mb-2">Email: help@hearthorizon.com</p>
        <p class="text-sm mb-2">Contact: ‪+62 812 3456 7890‬</p>
        <p class="text-sm">YouTube: Heart Horizon</p>
        <hr class="border-green-800 mt-4" />
    </div>
</aside>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
      sidebar.classList.remove('-translate-x-full');
      sidebarOverlay.classList.remove('hidden');
    }

    function closeSidebar() {
      sidebar.classList.add('-translate-x-full');
      sidebarOverlay.classList.add('hidden');
    }

    sidebarToggle.addEventListener('click', () => {
      if (sidebar.classList.contains('-translate-x-full')) {
        openSidebar();
      } else {
        closeSidebar();
      }
    });

    sidebarOverlay.addEventListener('click', () => {
      closeSidebar();
    });
</script>
