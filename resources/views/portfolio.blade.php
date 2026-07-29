@extends('layouts.app')

@section('title', 'Studio Katracho - Portafolio')

@php
    function getImageFiles($dir) {
        $path = public_path($dir);
        if (!is_dir($path)) return [];
        $files = array_values(array_filter(scandir($path), fn($f) => preg_match('/\.(webp)$/i', $f)));
        sort($files);
        return $files;
    }

    $categories = [
        'Bodas' => [
            'dirs' => [['path' => 'img/boda', 'cat' => 'Boda']],
        ],
        '15 Años' => [
            'dirs' => [['path' => 'img/15 años', 'cat' => '15 Años']],
        ],
        'Bautizos' => [
            'dirs' => [['path' => 'img/bautizmos', 'cat' => 'Bautizo']],
        ],
        'Artes y Diseño' => [
            'dirs' => [['path' => 'img/artes', 'cat' => 'Artes']],
        ],
        'Comida' => [
            'dirs' => [['path' => 'img/comida', 'cat' => 'Comida']],
        ],
        'Estudio' => [
            'dirs' => [['path' => 'img/sesiones studio', 'cat' => 'Estudio']],
        ],
    ];

    $videos = [
        ['id' => '4eoyz0nR3xw', 'title' => '15 de Lesly', 'desc' => 'Celebración de 15 años'],
        ['id' => '40kAp8q7qqA', 'title' => 'Graduaciones Castle School', 'desc' => 'Ceremonia de graduación'],
        ['id' => 'aC8w4IEGk8s', 'title' => 'Graduaciones de la Región', 'desc' => 'Ceremonia de graduación regional'],
    ];

    $albumImages = [];
    foreach ($categories as $catName => $catData) {
        foreach ($catData['dirs'] as $dirInfo) {
            $files = getImageFiles($dirInfo['path']);
            $albumImages[$dirInfo['path']] = $files;
        }
    }
@endphp

@section('content')
    <section class="pt-32 lg:pt-40 pb-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="max-w-2xl">
                <div class="section-label">Portafolio</div>
                <h1 class="heading-xl mb-4">Nuestros trabajos</h1>
                <p class="text-body-lg">Contenido que hemos creado para marcas y personas que quieren destacar.</p>
            </div>
        </div>
    </section>

    <section class="pb-8 lg:pb-12">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="overflow-x-auto pb-2 -mx-6 px-6 lg:mx-0 lg:px-0" style="-ms-overflow-style:none;scrollbar-width:none">
                <div class="flex gap-2 w-max" id="filters">
                    <button data-filter="Bodas" class="filter-btn active px-4 py-2 bg-white text-[#0A0A0A] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">Bodas</button>
                    <button data-filter="15 Años" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">15 Años</button>
                    <button data-filter="Bautizos" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">Bautizos</button>
                    <button data-filter="Videos" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">Videos</button>
                    <button data-filter="Artes y Diseño" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">Artes y Diseño</button>
                    <button data-filter="Comida" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">Comida</button>
                    <button data-filter="Estudio" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase whitespace-nowrap transition-all duration-300">Estudio</button>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-24 lg:pb-40">
        <div class="max-w-[1200px] mx-auto px-4 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-px bg-transparent lg:bg-[#1A1A1A]" id="portfolio-grid">

                @php
                    $allItems = [];
                    foreach ($categories as $catName => $catData) {
                        foreach ($catData['dirs'] as $dirInfo) {
                            $files = $albumImages[$dirInfo['path']];
                            foreach ($files as $img) {
                                $allItems[] = ['type' => 'image', 'cat' => $catName, 'path' => $dirInfo['path'], 'img' => $img];
                            }
                        }
                    }
                    foreach ($videos as $v) {
                        $allItems[] = ['type' => 'video', 'cat' => 'Videos', 'id' => $v['id'], 'title' => $v['title'], 'desc' => $v['desc']];
                    }
                @endphp

                @foreach ($allItems as $item)
                    @if ($item['type'] === 'image')
                        <div class="portfolio-item bg-[#0A0A0A] group hidden" data-cat="{{ $item['cat'] }}" data-image-path="{{ $item['path'] }}" data-img="{{ $item['img'] }}">
                            <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer overflow-hidden" onclick="openImage(this.parentElement)">
                                <img src="{{ asset($item['path'] . '/' . $item['img']) }}" alt="{{ $item['cat'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            </div>
                        </div>
                    @else
                        <div class="portfolio-item bg-[#0A0A0A] group hidden" data-cat="Videos" data-youtube="{{ $item['id'] }}">
                            <div class="project-card aspect-[4/3] bg-[#111111] relative cursor-pointer overflow-hidden" onclick="openVideo(this.parentElement)">
                                <img src="https://img.youtube.com/vi/{{ $item['id'] }}/hqdefault.jpg" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black/30 flex items-center justify-center group-hover:bg-black/20 transition-all duration-300">
                                    <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center group-hover:bg-white/20 transition-all duration-300">
                                        <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-5 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                                    <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#999] mb-2 block">Videos</span>
                                    <h3 class="text-sm font-semibold text-white">{{ $item['title'] }}</h3>
                                    <p class="text-xs text-white/60">{{ $item['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="flex justify-center mt-12">
                <button id="load-more" class="btn-outline text-xs" onclick="loadMore()">
                    Cargar más
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
            </div>
        </div>
    </section>



    <div id="album-modal" class="fixed inset-0 z-[100] hidden" onclick="closeAlbum()">
        <div class="absolute inset-0 bg-[#0A0A0A]/95 backdrop-blur-sm"></div>
        <div class="relative z-10 w-full h-full flex items-center justify-center p-2 sm:p-8" onclick="closeAlbum()">
            <div onclick="event.stopPropagation()" class="w-full max-w-5xl flex flex-col max-h-full">
                <div class="flex items-center justify-end px-1 py-1 sm:px-2 sm:py-2">
                    <button onclick="closeAlbum()" class="px-3 sm:px-4 py-2 text-xs font-medium tracking-wider uppercase text-[#666666] hover:text-white transition-colors">
                        Cerrar
                    </button>
                </div>
                <div id="modal-body" class="overflow-y-auto p-1 sm:p-2 flex items-start justify-center">
                <div id="modal-youtube" class="hidden w-full max-w-5xl">
                    <div class="aspect-video w-full bg-[#111111] rounded overflow-hidden">
                        <iframe id="modal-youtube-frame" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div id="modal-image" class="hidden w-full max-w-5xl">
                    <div id="modal-spinner" class="flex items-center justify-center py-32">
                        <div class="w-8 h-8 border-2 border-[#333333] border-t-white rounded-full animate-spin"></div>
                    </div>
                    <img id="modal-image-img" src="" alt="" class="w-full h-auto rounded hidden">
                </div>
                <div id="modal-grid" class="hidden w-full max-w-6xl grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-px bg-[#1A1A1A]"></div>
            </div>
        </div>
    </div>

    <script>
        var albumImages = @json($albumImages);

        function openImage(item) {
            var imgPath = item.getAttribute('data-image-path');
            var img = item.getAttribute('data-img');

            document.getElementById('modal-youtube').classList.add('hidden');
            document.getElementById('modal-youtube-frame').src = '';
            document.getElementById('modal-grid').classList.add('hidden');
            document.getElementById('modal-grid').innerHTML = '';

            var imgEl = document.getElementById('modal-image-img');
            var spinner = document.getElementById('modal-spinner');

            imgEl.classList.add('hidden');
            spinner.classList.remove('hidden');

            imgEl.onload = function() {
                spinner.classList.add('hidden');
                imgEl.classList.remove('hidden');
            };

            imgEl.src = '/' + imgPath + '/' + img;
            document.getElementById('modal-image').classList.remove('hidden');

            document.getElementById('album-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openVideo(item) {
            var youtube = item.getAttribute('data-youtube');

            document.getElementById('modal-image').classList.add('hidden');
            document.getElementById('modal-grid').classList.add('hidden');

            var ytFrame = document.getElementById('modal-youtube-frame');
            ytFrame.src = 'https://www.youtube.com/embed/' + youtube + '?autoplay=1';
            document.getElementById('modal-youtube').classList.remove('hidden');

            document.getElementById('album-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeAlbum() {
            document.getElementById('album-modal').classList.add('hidden');
            document.getElementById('modal-youtube-frame').src = '';
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeAlbum();
        });
    </script>

    <script>
        var items = document.querySelectorAll('.portfolio-item');
        var perPage = 6;

        function showPage() {
            var filter = document.querySelector('.filter-btn.active').getAttribute('data-filter');

            var filtered = [];
            items.forEach(function (item) {
                item.classList.add('hidden');
                if (item.getAttribute('data-cat') === filter) {
                    filtered.push(item);
                }
            });

            for (var i = 0; i < filtered.length; i++) {
                if (i < perPage) filtered[i].classList.remove('hidden');
            }

            var loadMoreBtn = document.getElementById('load-more');
            if (filtered.length <= perPage || filter === 'Videos') {
                loadMoreBtn.classList.add('hidden');
            } else {
                loadMoreBtn.classList.remove('hidden');
                loadMoreBtn._filtered = filtered;
                loadMoreBtn._shown = perPage;
            }
        }

        function loadMore() {
            var btn = document.getElementById('load-more');
            var filtered = btn._filtered;
            var shown = btn._shown;
            var next = Math.min(shown + perPage, filtered.length);
            for (var i = shown; i < next; i++) {
                filtered[i].classList.remove('hidden');
            }
            btn._shown = next;
            if (next >= filtered.length) {
                btn.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var buttons = document.querySelectorAll('.filter-btn');

            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    buttons.forEach(function (b) {
                        b.classList.remove('active', 'bg-white', 'text-[#0A0A0A]');
                        b.classList.add('border', 'border-[#333333]', 'text-[#666666]');
                    });
                    this.classList.add('active', 'bg-white', 'text-[#0A0A0A]');
                    this.classList.remove('border', 'border-[#333333]', 'text-[#666666]');

                    showPage();
                });
            });

            showPage();
        });
    </script>
@endsection
