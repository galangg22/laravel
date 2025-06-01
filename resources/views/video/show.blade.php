<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <title>Part</title>
</head>
<body class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen text-white relative flex flex-col">

    <header class="flex items-center justify-between px-4 py-3 shadow-md sticky top-0 z-50">
        <a href="{{ url()->previous() }}" class="btn btn-ghost btn-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>

        <div class="text-right">
            <h2 class="text-lg font-semibold">{{ Auth::user()->name }} </h2>
            <p class="text-sm text-green-400">{{ now()->format('l, d F Y') }}</p>
        </div>
    </header>

    <main class="px-2 py-6">
        <h1 class="text-3xl font-bold mb-8 text-center">Kategori</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            @foreach ($parts as $part)
                <div class="border border-green-500 rounded-lg shadow-sm overflow-hidden flex flex-col w-full max-w-sm mx-auto">
                    @if(Str::endsWith($part->thumbnail_path, ['.jpg', '.jpeg', '.png']))
                        <div class="w-full aspect-[16/9] overflow-hidden bg-gray-700">
                            <img src="{{ asset('storage/' . $part->thumbnail_path) }}" alt="Thumbnail {{ $part->part_number }}" class="w-full h-full object-cover" />
                        </div>
                    @elseif(Str::endsWith($part->thumbnail_path, ['.mp4', '.avi', '.mkv']))
                        <div class="w-full aspect-[16/9] overflow-hidden bg-gray-700">
                            <video controls class="w-full h-full object-cover">
                                <source src="{{ asset('storage/' . $part->thumbnail_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung video tag.
                            </video>
                        </div>
                    @else
                        <div class="w-full aspect-[16/9] flex items-center justify-center bg-gray-100 text-gray-400 text-sm">
                            Media tidak didukung
                        </div>
                    @endif

                    <div class="p-3 flex flex-col">
                        <h2 class="text-lg font-semibold mb-1">Part {{ $part->part_number }}: {{ $part->title }}</h2>
                        @if($part->description)
                            <div class="description-container text-gray-300 text-sm relative" data-id="{{ $part->id }}">
                                <p class="description-text line-clamp-3">
                                    {{ $part->description }}
                                </p>
                                <button class="read-more-btn text-green-400 text-sm mt-2 hidden" onclick="toggleReadMore({{ $part->id }})">
                                    Read More
                                </button>
                            </div>
                        @endif
                        <a href="{{ $part->reference_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary self-start btn-sm mt-3">Tonton</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <footer class="mt-auto py-4 flex justify-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="Logo" class="h-10 w-auto" />
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cari semua deskripsi dan periksa apakah teksnya terpotong
            document.querySelectorAll('.description-container').forEach(container => {
                const text = container.querySelector('.description-text');
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
</body>
</html>
