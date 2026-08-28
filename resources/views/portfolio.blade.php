@extends('layouts.app')

@section('title', 'Studio Katracho - Portafolio')

@php
    $categories = [
        'Bodas' => 'Bodas',
        '15 Años' => '15 Años',
        'Graduaciones' => 'Graduaciones',
        'Bautizos' => 'Bautizos',
        'Estudio' => 'Estudio',
        'Videos' => 'Videos',
        'Artes y Diseño' => 'Artes y Diseño',
        'Comida' => 'Comida',
    ];

    $categoryConfig = [
        'Bodas' => ['dir' => 'img/boda', 'label' => 'Bodas', 'badge' => 'Boda'],
        '15 Años' => ['dir' => 'img/15 años', 'label' => '15 Años', 'badge' => '15 Años'],
        'Graduaciones' => ['dir' => 'img/Graduaciones', 'label' => 'Graduaciones', 'badge' => 'Graduación'],
        'Bautizos' => ['dir' => 'img/bautizmos', 'label' => 'Bautizos', 'badge' => 'Bautizo'],
        'Estudio' => ['dir' => 'img/sesiones studio', 'label' => 'Estudio', 'badge' => 'Estudio'],
        'Artes y Diseño' => ['dir' => 'img/artes', 'label' => 'Artes y Diseño', 'badge' => 'Artes'],
        'Comida' => ['dir' => 'img/comida', 'label' => 'Comida', 'badge' => 'Gastronomía'],
    ];

    $videos = [
        ['id' => '4eoyz0nR3xw', 'title' => '15 de Lesly', 'desc' => 'Celebración de 15 años', 'cat' => 'Videos', 'badge' => 'Video'],
        ['id' => 'aC8w4IEGk8s', 'title' => 'Graduaciones Castle School', 'desc' => 'Ceremonia de graduación', 'cat' => 'Videos', 'badge' => 'Video'],
        ['id' => 'c6kNDEp8GII', 'title' => 'Seniors Santa Clara Prom 2027', 'desc' => 'Entrada y celebración Seniors 2027', 'cat' => 'Videos', 'badge' => 'Video'],
    ];

    $albums = [];

    foreach ($categoryConfig as $catKey => $config) {
        $basePath = public_path($config['dir']);
        if (!is_dir($basePath)) continue;

        // Subdirectorios (cada subcarpeta es un Álbum)
        $items = scandir($basePath);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;
            $fullSubPath = $basePath . '/' . $item;
            if (is_dir($fullSubPath)) {
                $folderName = $item;
                $relPath = $config['dir'] . '/' . $folderName;
                
                $files = array_values(array_filter(scandir($fullSubPath), function($f) {
                    return preg_match('/\.(webp|jpg|jpeg|png)$/i', $f);
                }));
                sort($files);

                if (count($files) > 0) {
                    $files = array_slice($files, 0, 5); // Limitar exactamente a 5 fotos por álbum
                    $rawTitle = ucwords(str_replace(['_', '-'], ' ', $folderName));
                    $albumId = 'album_' . substr(md5($relPath), 0, 8);
                    
                    $albums[] = [
                        'id' => $albumId,
                        'type' => 'album',
                        'category' => $catKey,
                        'badge' => $config['badge'],
                        'title' => $rawTitle,
                        'subtitle' => $config['label'],
                        'folder' => $relPath,
                        'cover' => asset($relPath . '/' . $files[0]),
                        'images' => array_map(fn($img) => asset($relPath . '/' . $img), $files),
                        'count' => count($files)
                    ];
                }
            }
        }

        // Archivos directos en la carpeta (Limitado a 5 fotos)
        $directFiles = array_values(array_filter(scandir($basePath), function($f) use ($basePath) {
            return is_file($basePath . '/' . $f) && preg_match('/\.(webp|jpg|jpeg|png)$/i', $f);
        }));
        
        if (count($directFiles) > 0) {
            sort($directFiles);
            $directFiles = array_slice($directFiles, 0, 5); // Limitar a 5 fotos
            $relPath = $config['dir'];
            $albumId = 'album_' . substr(md5($relPath), 0, 8);
            $albums[] = [
                'id' => $albumId,
                'type' => 'album',
                'category' => $catKey,
                'badge' => $config['badge'],
                'title' => $config['label'],
                'subtitle' => 'Galería General',
                'folder' => $relPath,
                'cover' => asset($relPath . '/' . $directFiles[0]),
                'images' => array_map(fn($img) => asset($relPath . '/' . $img), $directFiles),
                'count' => count($directFiles)
            ];
        }
    }
@endphp

@section('content')
    <section class="pt-32 lg:pt-40 pb-12">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="max-w-2xl">
                <div class="section-label">Portafolio</div>
                <h1 class="heading-xl mb-4">Nuestros trabajos</h1>
                <p class="text-body-lg">Explora nuestros álbumes y producciones organizadas por proyecto, evento y categoría.</p>
            </div>
        </div>
    </section>

    <!-- Filtros de categoría -->
    <section class="pb-8 lg:pb-12">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="overflow-x-auto pb-2 -mx-6 px-6 lg:mx-0 lg:px-0" style="-ms-overflow-style:none;scrollbar-width:none">
                <div class="flex gap-2.5 sm:gap-3 w-max" id="filters">
                    @foreach ($categories as $catKey => $catLabel)
                        <button 
                            data-filter="{{ $catKey }}" 
                            class="filter-btn {{ $loop->first ? 'active' : '' }} px-4 sm:px-5 py-2 sm:py-2.5 text-[0.7rem] sm:text-xs font-medium tracking-wider uppercase whitespace-nowrap rounded-sm">
                            {{ $catLabel }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Cuadrícula de Álbumes y Videos (Formato Grande y Prominente) -->
    <section class="pb-28 lg:pb-44">
        <div class="max-w-[1200px] mx-auto px-4 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12" id="portfolio-grid">

                {{-- Renderizar Álbumes --}}
                @foreach ($albums as $album)
                    <div class="portfolio-item group" data-cat="{{ $album['category'] }}" data-type="album" data-album-id="{{ $album['id'] }}">
                        <div class="project-card aspect-[16/11] bg-[#111111] border border-[#1E1E1E] relative cursor-pointer overflow-hidden rounded-md transition-all duration-500 hover:border-[#444444] hover:shadow-2xl" onclick="openAlbum('{{ $album['id'] }}')">
                            <!-- Portada del Álbum en Alta Calidad -->
                            <img src="{{ $album['cover'] }}" alt="{{ $album['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" decoding="async">
                            
                            <!-- Indicador inferior limpio (Sin cuadro transparente) -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end justify-end p-5 sm:p-7 pointer-events-none">
                                <span class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold tracking-wider uppercase text-white drop-shadow-md group-hover:translate-x-1 transition-transform">
                                    Ver álbum
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Renderizar Videos --}}
                @foreach ($videos as $v)
                    <div class="portfolio-item group" data-cat="Videos" data-type="video" data-youtube="{{ $v['id'] }}" data-title="{{ $v['title'] }}">
                        <div class="project-card aspect-[16/11] bg-[#111111] border border-[#1E1E1E] relative cursor-pointer overflow-hidden rounded-md transition-all duration-500 hover:border-[#444444] hover:shadow-2xl" onclick="openVideo('{{ $v['id'] }}', '{{ addslashes($v['title']) }}')">
                            <img src="https://img.youtube.com/vi/{{ $v['id'] }}/hqdefault.jpg" alt="{{ $v['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" decoding="async">
                            
                            <!-- Botón central de Play Ampliado -->
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center group-hover:bg-black/20 transition-all duration-300">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center group-hover:scale-110 group-hover:bg-white group-hover:text-black transition-all duration-300 shadow-2xl">
                                    <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white group-hover:text-black ml-1 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Overlay inferior con información del video -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/45 to-transparent flex flex-col justify-end p-5 sm:p-7">
                                <span class="text-xs font-medium tracking-[0.2em] uppercase text-white/65 mb-1.5">Producción Audiovisual</span>
                                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">{{ $v['title'] }}</h3>
                                <p class="text-xs sm:text-sm text-white/75 mt-1.5">{{ $v['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Modal Minimalista para Visualización de Álbumes (5 fotos) y Lightbox -->
    <div id="album-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 sm:p-6" onclick="handleBackdropClick(event)">
        <div class="fixed inset-0 bg-black/90 backdrop-blur-md transition-opacity"></div>
        
        <div class="relative z-10 w-full max-w-5xl bg-[#0E0E0E] border border-[#222222] rounded-xl flex flex-col overflow-hidden shadow-2xl my-auto transition-all">
            
            <!-- Barra Superior Minimalista (Sin bordes de caja ni iconos sobrantes) -->
            <div class="flex items-center justify-between px-6 py-3.5 border-b border-[#1A1A1A] bg-[#0E0E0E]">
                <div>
                    <button id="modal-back-btn" onclick="backToAlbumGrid()" class="hidden items-center gap-1.5 text-xs font-medium uppercase tracking-widest text-white/70 hover:text-white transition-colors cursor-pointer py-1" title="Volver a las fotos">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M15 19l-7-7 7-7"/>
                        </svg>
                        <span>Volver</span>
                    </button>
                </div>

                <div class="flex items-center ml-auto">
                    <button onclick="closeModal()" class="text-xs font-medium uppercase tracking-widest text-white/70 hover:text-white transition-colors cursor-pointer py-1" aria-label="Cerrar modal">
                        Cerrar
                    </button>
                </div>
            </div>

            <!-- Vista Cuadrícula Minimalista de 5 Fotos (Ajustada al contenido) -->
            <div id="modal-grid-view" class="p-4 sm:p-6">
                <div id="album-photos-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3 sm:gap-4">
                    <!-- 5 fotos insertadas dinámicamente -->
                </div>
            </div>

            <!-- Vista Lightbox Individual Fullscreen con Zoom en PC -->
            <div id="modal-lightbox-view" class="hidden relative flex items-center justify-center bg-black/95 select-none overflow-hidden min-h-[380px] sm:min-h-[480px] lg:min-h-[540px]">
                <!-- Flecha Anterior -->
                <button onclick="prevLightboxImage()" class="absolute left-3 md:left-5 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-black/60 hover:bg-white text-white hover:text-black border border-white/20 flex items-center justify-center transition-all duration-300 shadow-xl" aria-label="Foto anterior">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Contenedor de la Imagen Principal con Zoom Interactivo para PC y Tablet -->
                <div id="lightbox-img-container" class="w-full h-full flex items-center justify-center p-4 sm:p-6 overflow-hidden relative touch-auto" onmousemove="handleImageMouseMove(event)">
                    <div id="lightbox-spinner" class="absolute flex items-center justify-center pointer-events-none">
                        <div class="w-8 h-8 border-2 border-white/20 border-t-white rounded-full animate-spin"></div>
                    </div>
                    <img id="lightbox-img" src="" alt="Fotografía del álbum" class="max-w-full max-h-[72vh] object-contain rounded transition-transform duration-200 opacity-0 md:cursor-zoom-in select-none" decoding="async" onclick="toggleImageZoom(event)">
                </div>

                <!-- Indicador de Zoom (Visible en Tablet y PC >= 768px) -->
                <div id="lightbox-zoom-hint" class="hidden md:flex items-center gap-1.5 absolute top-4 right-4 px-3 py-1 bg-black/75 backdrop-blur-md border border-white/10 rounded-full text-[0.68rem] font-medium text-white/80 z-30 pointer-events-none transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span>Toca o clic para ampliar</span>
                </div>

                <!-- Flecha Siguiente -->
                <button onclick="nextLightboxImage()" class="absolute right-3 md:right-5 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-black/60 hover:bg-white text-white hover:text-black border border-white/20 flex items-center justify-center transition-all duration-300 shadow-xl" aria-label="Foto siguiente">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Contador inferior minimalista -->
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 px-3 py-1 bg-black/75 backdrop-blur-md border border-white/10 rounded-full text-[0.7rem] font-medium text-white/90 z-30 pointer-events-none">
                    <span id="lightbox-counter">1 / 5</span>
                </div>
            </div>

            <!-- Vista Video YouTube -->
            <div id="modal-video-view" class="hidden p-4 sm:p-6 bg-black">
                <div class="w-full aspect-video bg-[#111111] rounded-lg overflow-hidden shadow-2xl border border-[#222222]">
                    <iframe id="video-frame" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen loading="lazy"></iframe>
                </div>
                <div class="mt-3 flex items-center justify-between text-xs text-white/60">
                    <span id="modal-video-title" class="font-medium text-white/90 truncate"></span>
                    <a id="video-direct-link" href="#" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded bg-white/10 hover:bg-white/20 text-white transition-colors ml-4 shrink-0 text-xs font-medium">
                        <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        <span>Abrir en YouTube</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Datos JSON de Álbumes y Funcionalidad JavaScript Optimizada -->
    <script>
        var albumsData = @json($albums);
        var currentAlbum = null;
        var currentPhotoIndex = 0;
        var modalOpen = false;
        var isZoomed = false;

        // Alternar Zoom de foto ampliada (Exclusivo para PC y Tablet >= 768px, desactivado en móvil)
        function toggleImageZoom(e) {
            if (window.innerWidth < 768) return; // En teléfonos móviles no hace zoom de clic

            var imgEl = document.getElementById('lightbox-img');
            var container = document.getElementById('lightbox-img-container') || (imgEl ? imgEl.parentElement : null);
            var zoomHint = document.getElementById('lightbox-zoom-hint');
            if (!imgEl || !container) return;

            isZoomed = !isZoomed;

            if (isZoomed) {
                var rect = container.getBoundingClientRect();
                var clientX = (e && e.touches && e.touches.length) ? e.touches[0].clientX : (e ? e.clientX : undefined);
                var clientY = (e && e.touches && e.touches.length) ? e.touches[0].clientY : (e ? e.clientY : undefined);

                var x = (clientX !== undefined && rect.width > 0) ? Math.max(0, Math.min(100, ((clientX - rect.left) / rect.width) * 100)) : 50;
                var y = (clientY !== undefined && rect.height > 0) ? Math.max(0, Math.min(100, ((clientY - rect.top) / rect.height) * 100)) : 50;

                imgEl.style.transformOrigin = x + '% ' + y + '%';
                imgEl.style.transform = 'scale(1.9)';
                imgEl.style.cursor = 'zoom-out';
                imgEl.classList.remove('md:cursor-zoom-in');
                imgEl.classList.add('md:cursor-zoom-out');

                if (zoomHint) {
                    zoomHint.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7"/></svg><span>Toca o clic para alejar</span>';
                }
            } else {
                resetZoom();
            }
        }

        // Seguir el cursor mientras está ampliada la foto (en PC)
        function handleImageMouseMove(e) {
            if (!isZoomed || window.innerWidth < 768) return;

            var imgEl = document.getElementById('lightbox-img');
            var container = document.getElementById('lightbox-img-container') || (imgEl ? imgEl.parentElement : null);
            if (!imgEl || !container) return;

            var rect = container.getBoundingClientRect();
            if (rect.width <= 0 || rect.height <= 0) return;

            var x = Math.max(0, Math.min(100, ((e.clientX - rect.left) / rect.width) * 100));
            var y = Math.max(0, Math.min(100, ((e.clientY - rect.top) / rect.height) * 100));
            imgEl.style.transformOrigin = x + '% ' + y + '%';
        }

        // Desplazar la foto ampliada con el dedo (en Tablet >= 768px)
        function handleImageTouchMove(e) {
            if (!isZoomed || window.innerWidth < 768 || !e.touches || e.touches.length !== 1) return;

            if (e.cancelable) e.preventDefault();

            var imgEl = document.getElementById('lightbox-img');
            var container = document.getElementById('lightbox-img-container') || (imgEl ? imgEl.parentElement : null);
            if (!imgEl || !container) return;

            var rect = container.getBoundingClientRect();
            if (rect.width <= 0 || rect.height <= 0) return;

            var touchX = e.touches[0].clientX;
            var touchY = e.touches[0].clientY;

            var x = Math.max(0, Math.min(100, ((touchX - rect.left) / rect.width) * 100));
            var y = Math.max(0, Math.min(100, ((touchY - rect.top) / rect.height) * 100));

            imgEl.style.transformOrigin = x + '% ' + y + '%';
        }

        // Restablecer el zoom a estado normal
        function resetZoom() {
            isZoomed = false;
            var imgEl = document.getElementById('lightbox-img');
            var zoomHint = document.getElementById('lightbox-zoom-hint');

            if (imgEl) {
                imgEl.style.transform = 'scale(1)';
                imgEl.style.transformOrigin = 'center center';
                imgEl.style.cursor = '';
                imgEl.classList.remove('md:cursor-zoom-out');
                imgEl.classList.add('md:cursor-zoom-in');
            }

            if (zoomHint) {
                zoomHint.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg><span>Toca o clic para ampliar</span>';
            }
        }

        // Abrir Álbum en Cuadrícula de 5 fotos
        function openAlbum(albumId) {
            var album = albumsData.find(function(a) { return a.id === albumId; });
            if (!album) return;

            currentAlbum = album;
            currentPhotoIndex = 0;
            resetZoom();

            // Renderizar las miniaturas (máximo 5)
            var grid = document.getElementById('album-photos-grid');
            grid.innerHTML = '';

            var photos = album.images.slice(0, 5);
            photos.forEach(function(imgUrl, index) {
                var itemDiv = document.createElement('div');
                itemDiv.className = 'aspect-[3/4] bg-[#161616] border border-[#222222] rounded-lg overflow-hidden cursor-pointer group relative shadow-md';
                itemDiv.onclick = function() { openLightbox(index); };

                var imgEl = document.createElement('img');
                imgEl.src = imgUrl;
                imgEl.alt = 'Foto ' + (index + 1);
                imgEl.loading = 'lazy';
                imgEl.decoding = 'async';
                imgEl.className = 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500';

                var hoverOverlay = document.createElement('div');
                hoverOverlay.className = 'absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center';
                hoverOverlay.innerHTML = '<span class="px-2.5 py-1 bg-black/75 backdrop-blur-sm text-[0.65rem] text-white font-medium rounded border border-white/15">Ver</span>';

                itemDiv.appendChild(imgEl);
                itemDiv.appendChild(hoverOverlay);
                grid.appendChild(itemDiv);
            });

            // Mostrar vista cuadrícula
            document.getElementById('modal-grid-view').classList.remove('hidden');
            document.getElementById('modal-lightbox-view').classList.add('hidden');
            document.getElementById('modal-video-view').classList.add('hidden');
            document.getElementById('modal-back-btn').classList.add('hidden');
            document.getElementById('modal-back-btn').classList.remove('inline-flex');

            var modal = document.getElementById('album-modal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            modalOpen = true;
        }

        // Abrir Lightbox en una foto específica
        function openLightbox(index) {
            if (!currentAlbum || !currentAlbum.images[index]) return;

            currentPhotoIndex = index;
            resetZoom();
            showLightboxImage();

            document.getElementById('modal-grid-view').classList.add('hidden');
            document.getElementById('modal-lightbox-view').classList.remove('hidden');
            document.getElementById('modal-video-view').classList.add('hidden');
            document.getElementById('modal-back-btn').classList.remove('hidden');
            document.getElementById('modal-back-btn').classList.add('inline-flex');
        }

        // Mostrar imagen actual en Lightbox
        function showLightboxImage() {
            if (!currentAlbum) return;

            resetZoom();

            var imgEl = document.getElementById('lightbox-img');
            var spinner = document.getElementById('lightbox-spinner');
            var counter = document.getElementById('lightbox-counter');

            imgEl.style.opacity = '0';
            spinner.classList.remove('hidden');

            imgEl.onload = function() {
                spinner.classList.add('hidden');
                imgEl.style.opacity = '1';
            };

            imgEl.src = currentAlbum.images[currentPhotoIndex];
            counter.textContent = (currentPhotoIndex + 1) + ' / ' + currentAlbum.images.length;
        }

        // Navegar a la foto anterior
        function prevLightboxImage() {
            if (!currentAlbum) return;
            resetZoom();
            var total = currentAlbum.images.length;
            currentPhotoIndex = (currentPhotoIndex - 1 + total) % total;
            showLightboxImage();
        }

        // Navegar a la foto siguiente
        function nextLightboxImage() {
            if (!currentAlbum) return;
            resetZoom();
            var total = currentAlbum.images.length;
            currentPhotoIndex = (currentPhotoIndex + 1) % total;
            showLightboxImage();
        }

        // Volver de la vista Lightbox a la cuadrícula de 5 fotos
        function backToAlbumGrid() {
            resetZoom();
            document.getElementById('modal-grid-view').classList.remove('hidden');
            document.getElementById('modal-lightbox-view').classList.add('hidden');
            document.getElementById('modal-back-btn').classList.add('hidden');
            document.getElementById('modal-back-btn').classList.remove('inline-flex');
        }

        // Abrir Modal de Video
        function openVideo(youtubeId, title) {
            resetZoom();
            var iframe = document.getElementById('video-frame');
            iframe.src = 'https://www.youtube.com/embed/' + youtubeId + '?autoplay=1';

            var directLink = document.getElementById('video-direct-link');
            if (directLink) {
                directLink.href = 'https://www.youtube.com/watch?v=' + youtubeId;
            }

            var titleEl = document.getElementById('modal-video-title');
            if (titleEl) {
                titleEl.textContent = title || '';
            }

            document.getElementById('modal-grid-view').classList.add('hidden');
            document.getElementById('modal-lightbox-view').classList.add('hidden');
            document.getElementById('modal-video-view').classList.remove('hidden');
            document.getElementById('modal-back-btn').classList.add('hidden');
            document.getElementById('modal-back-btn').classList.remove('inline-flex');

            var modal = document.getElementById('album-modal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            modalOpen = true;
        }

        // Cerrar Modal
        function closeModal() {
            resetZoom();
            var modal = document.getElementById('album-modal');
            modal.classList.add('hidden');
            document.getElementById('video-frame').src = '';
            var directLink = document.getElementById('video-direct-link');
            if (directLink) directLink.href = '#';
            document.body.style.overflow = '';
            modalOpen = false;
            currentAlbum = null;
        }

        function handleBackdropClick(e) {
            if (e.target.id === 'album-modal' || e.target.classList.contains('bg-black/90')) {
                closeModal();
            }
        }

        // Control por Teclado
        document.addEventListener('keydown', function(e) {
            if (!modalOpen) return;

            if (e.key === 'Escape') {
                var lightboxVisible = !document.getElementById('modal-lightbox-view').classList.contains('hidden');
                if (lightboxVisible) {
                    backToAlbumGrid();
                } else {
                    closeModal();
                }
            } else if (e.key === 'ArrowLeft') {
                var lightboxVisible = !document.getElementById('modal-lightbox-view').classList.contains('hidden');
                if (lightboxVisible) prevLightboxImage();
            } else if (e.key === 'ArrowRight') {
                var lightboxVisible = !document.getElementById('modal-lightbox-view').classList.contains('hidden');
                if (lightboxVisible) nextLightboxImage();
            }
        });

        // Filtrado por Categorías en la página de Portafolio
        document.addEventListener('DOMContentLoaded', function() {
            var filterButtons = document.querySelectorAll('.filter-btn');
            var portfolioItems = document.querySelectorAll('.portfolio-item');

            function applyFilter(category) {
                portfolioItems.forEach(function(item) {
                    var itemCat = item.getAttribute('data-cat');
                    if (itemCat === category) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            }

            filterButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var filter = this.getAttribute('data-filter');

                    filterButtons.forEach(function(b) {
                        b.classList.remove('active');
                    });

                    this.classList.add('active');
                    applyFilter(filter);
                });
            });

            // Iniciar mostrando la primera categoría activa
            var initialActiveBtn = document.querySelector('.filter-btn.active') || filterButtons[0];
            if (initialActiveBtn) {
                applyFilter(initialActiveBtn.getAttribute('data-filter'));
            }

            // Soporte para arrastrar fotos ampliadas con el dedo en tablet
            var imgContainer = document.getElementById('lightbox-img-container');
            if (imgContainer) {
                imgContainer.addEventListener('touchmove', handleImageTouchMove, { passive: false });
            }
        });
    </script>
@endsection
