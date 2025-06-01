@extends('layouts.app')

@include('layouts.sidebar')

@section('content')
<div class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen text-white relative flex flex-col">

    <main class="px-8 py-10 flex-grow">

        <h1 class="text-3xl font-bold mb-8 text-center" style="text-shadow: 0 0 1px #00FF00, 0 0 15px #00FF00, 0 0 20px #00FF00;">
            Kategori: {{ $category->name }}
        </h1>

        <hr class="my-4 border-gray-300" />

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            
            @forelse ($videos as $video)
                <a href="{{ route('video.show', $video->id) }}" 
                   class="block border border-green-500 rounded-lg shadow-sm overflow-hidden w-full flex flex-col transform transition duration-300 hover:shadow-lg hover:scale-105"
                   aria-label="{{ $video->title }}">
                    
                    @php
                        $thumbnail = $video->thumbnail_path ?? '';
                        $isImage = $thumbnail && Str::endsWith(strtolower($thumbnail), ['.jpg', '.jpeg', '.png']);
                    @endphp

                    @if($isImage)
                        <div class="w-full aspect-video overflow-hidden bg-gray-700">
                            <img 
                                src="{{ asset('storage/' . $thumbnail) }}" 
                                alt="Thumbnail {{ $video->title }}" 
                                class="w-full h-full object-cover"
                            />
                        </div>
                    @else
                        <div class="w-full aspect-video bg-gray-700 flex items-center justify-center text-gray-400 text-sm italic">
                            Thumbnail tidak tersedia
                        </div>
                    @endif

                    <div class="p-4 flex flex-col">
                        <h2 class="text-lg font-semibold mb-2 truncate flex justify-center" title="{{ $video->title }}">{{ $video->title }}</h2>
                        <div class="description-container text-gray-300 text-sm relative" data-id="{{ $video->id }}">
                            <p class="description-text line-clamp-3">
                                {{ $video->description ?? 'Deskripsi singkat tidak tersedia.' }}
                            </p>
                            <button class="read-more-btn text-green-400 text-sm mt-2 hidden" onclick="toggleReadMore({{ $video->id }})">
                                Read More
                            </button>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center text-gray-400 col-span-full">Belum ada video untuk kategori ini.</p>
            @endforelse
        </div>
    </main>

    <footer class="mt-auto py-4 flex justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="Logo" class="h-10 w-auto" />
    </footer>
</div>

<!-- Tambahkan JavaScript untuk fungsi Read More -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Cari semua deskripsi dan periksa apakah teksnya terpotong
        document.querySelectorAll('.description-container').forEach(container => {
            const text = container.querySelector('.description-text');
            // Periksa apakah teks terpotong (dengan membandingkan scrollHeight dan clientHeight)
            if (text.scrollHeight > text.clientHeight) {
                container.querySelector('.read-more-btn').classList.remove('hidden');
            }
        });
    });

    function toggleReadMore(id) {
        const container = document.querySelector(`.description-container[data-id="${id}"]`);
        const text = container.querySelector('.description-text');
        const button = container.querySelector('.read-more-btn');

        if (text.classList.contains('line-clamp-3')) {
            text.classList.remove('line-clamp-3');
            button.textContent = 'Read Less';
        } else {
            text.classList.add('line-clamp-3');
            button.textContent = 'Read More';
        }
    }
</script>

<!-- Resource CSS/JS frontend -->
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

<style>
    .description-text:not(.line-clamp-3) {
        overflow: visible;
        height: auto;
    }
    .description-container {
        display: flex;
        flex-direction: column;
    }
</style>

@endsection