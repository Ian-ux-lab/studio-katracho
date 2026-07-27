@extends('layouts.app')

@section('title', 'Studio Katracho - Portafolio')

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

    <section class="pb-12">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="flex flex-wrap gap-2" id="filters">
                <button data-filter="Eventos" class="filter-btn active px-4 py-2 bg-white text-[#0A0A0A] text-[0.65rem] font-medium tracking-wider uppercase hover:border-white hover:text-white transition-all duration-300">Eventos</button>
                <button data-filter="Videos" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase hover:border-white hover:text-white transition-all duration-300">Videos</button>
                <button data-filter="Artes y Diseño" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase hover:border-white hover:text-white transition-all duration-300">Artes y Diseño</button>
                <button data-filter="Comida" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase hover:border-white hover:text-white transition-all duration-300">Comida</button>
                <button data-filter="Estudio" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase hover:border-white hover:text-white transition-all duration-300">Estudio</button>
                <button data-filter="Aire Libre" class="filter-btn px-4 py-2 border border-[#333333] text-[#666666] text-[0.65rem] font-medium tracking-wider uppercase hover:border-white hover:text-white transition-all duration-300">Aire Libre</button>
            </div>
        </div>
    </section>

    <section class="pb-32 lg:pb-40">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-[#1A1A1A]" id="portfolio-grid">

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Eventos" data-title="Quinceañera Sofía" data-desc="Fotos y video de fiesta de 15 años">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Eventos</span>
                        <h3 class="text-sm font-semibold">Quinceañera Sofía</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Eventos" data-title="Boda Ana y Carlos" data-desc="Cobertura completa de boda">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Eventos</span>
                        <h3 class="text-sm font-semibold">Boda Ana y Carlos</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Eventos" data-title="Bautizo Mateo" data-desc="Cobertura de bautizo en familia">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Eventos</span>
                            <h3 class="text-sm font-semibold text-white">Bautizo Mateo</h3>
                            <p class="text-xs text-white/60">Cobertura de bautizo en familia</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Eventos</span>
                        <h3 class="text-sm font-semibold">Bautizo Mateo</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Videos" data-title="Comercial Café Fresco" data-desc="Video promocional para redes" data-youtube="dQw4w9WgXcQ">
                    <div class="project-card aspect-[4/3] bg-[#111111] relative cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center mb-3">
                                <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <h3 class="text-sm font-semibold text-white">Comercial Café Fresco</h3>
                            <p class="text-xs text-white/60">Video promocional para redes</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Videos</span>
                        <h3 class="text-sm font-semibold">Comercial Café Fresco</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Videos" data-title="Reel Deportivo" data-desc="Contenido dinámico para Instagram" data-youtube="dQw4w9WgXcQ">
                    <div class="project-card aspect-[4/3] bg-[#111111] relative cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center mb-3">
                                <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <h3 class="text-sm font-semibold text-white">Reel Deportivo</h3>
                            <p class="text-xs text-white/60">Contenido dinámico para Instagram</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Videos</span>
                        <h3 class="text-sm font-semibold">Reel Deportivo</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Videos" data-title="After Wedding" data-desc="Video cinematográfico de boda" data-youtube="dQw4w9WgXcQ">
                    <div class="project-card aspect-[4/3] bg-[#111111] relative cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center mb-3">
                                <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <h3 class="text-sm font-semibold text-white">After Wedding</h3>
                            <p class="text-xs text-white/60">Video cinematográfico de boda</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Videos</span>
                        <h3 class="text-sm font-semibold">After Wedding</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Artes y Diseño" data-title="Flyer Festival de Música" data-desc="Diseño gráfico para evento">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Artes y Diseño</span>
                            <h3 class="text-sm font-semibold text-white">Flyer Festival de Música</h3>
                            <p class="text-xs text-white/60">Diseño gráfico para evento</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Artes y Diseño</span>
                        <h3 class="text-sm font-semibold">Flyer Festival de Música</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Artes y Diseño" data-title="Menú Restaurante La Mesa" data-desc="Diseño de menú e identidad visual">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Artes y Diseño</span>
                            <h3 class="text-sm font-semibold text-white">Menú Restaurante La Mesa</h3>
                            <p class="text-xs text-white/60">Diseño de menú e identidad visual</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Artes y Diseño</span>
                        <h3 class="text-sm font-semibold">Menú Restaurante La Mesa</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Artes y Diseño" data-title="Logo Boutique Katracho" data-desc="Diseño de logotipo e identidad">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Artes y Diseño</span>
                            <h3 class="text-sm font-semibold text-white">Logo Boutique Katracho</h3>
                            <p class="text-xs text-white/60">Diseño de logotipo e identidad</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Artes y Diseño</span>
                        <h3 class="text-sm font-semibold">Logo Boutique Katracho</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Comida" data-title="Plato del Día" data-desc="Fotografía gastronómica para redes">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Comida</span>
                        <h3 class="text-sm font-semibold">Plato del Día</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Comida" data-title="Café de Especialidad" data-desc="Sesión de producto para marca de café">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Comida</span>
                        <h3 class="text-sm font-semibold">Café de Especialidad</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Comida" data-title="Postres Artesanales" data-desc="Fotografía de postres para redes">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Comida</span>
                        <h3 class="text-sm font-semibold">Postres Artesanales</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Estudio" data-title="Retrato Creativo" data-desc="Sesión de retrato con iluminación profesional">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Estudio</span>
                        <h3 class="text-sm font-semibold">Retrato Creativo</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Estudio" data-title="Book Profesional" data-desc="Sesión de estudio para emprendedores">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Estudio</span>
                            <h3 class="text-sm font-semibold text-white">Book Profesional</h3>
                            <p class="text-xs text-white/60">Sesión de estudio para emprendedores</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Estudio</span>
                        <h3 class="text-sm font-semibold">Book Profesional</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Estudio" data-title="Sesión Corporativa" data-desc="Fotos para equipo de trabajo">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Estudio</span>
                            <h3 class="text-sm font-semibold text-white">Sesión Corporativa</h3>
                            <p class="text-xs text-white/60">Fotos para equipo de trabajo</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Estudio</span>
                        <h3 class="text-sm font-semibold">Sesión Corporativa</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Aire Libre" data-title="Paisaje Urbano" data-desc="Fotografía de entorno natural y urbano">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit"></span>
                            <h3 class="text-sm font-semibold text-white"></h3>
                            <p class="text-xs text-white/60"></p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Aire Libre</span>
                        <h3 class="text-sm font-semibold">Paisaje Urbano</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Aire Libre" data-title="Sesión al Atardecer" data-desc="Sesión de fotos exterior con luz natural">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Aire Libre</span>
                            <h3 class="text-sm font-semibold text-white">Sesión al Atardecer</h3>
                            <p class="text-xs text-white/60">Sesión de fotos exterior con luz natural</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Aire Libre</span>
                        <h3 class="text-sm font-semibold">Sesión al Atardecer</h3>
                    </div>
                </div>

                <div class="portfolio-item bg-[#0A0A0A] group" data-cat="Aire Libre" data-title="Sesión en Playa" data-desc="Fotografía de playa al atardecer">
                    <div class="project-card aspect-[4/3] bg-[#111111] cursor-pointer" onclick="openAlbum(this.parentElement)">
                        <div class="placeholder-img w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-[#222222] group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                        <div class="overlay">
                            <span class="tag mb-2 w-fit">Aire Libre</span>
                            <h3 class="text-sm font-semibold text-white">Sesión en Playa</h3>
                            <p class="text-xs text-white/60">Fotografía de playa al atardecer</p>
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#333333] mb-2 block">Aire Libre</span>
                        <h3 class="text-sm font-semibold">Sesión en Playa</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 lg:py-32 bg-white">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl md:text-4xl font-semibold text-[#0A0A0A] mb-6">¿Tienes un proyecto <span class="font-light">en mente</span>?</h2>
            <p class="text-sm text-[#666666] max-w-md mx-auto mb-10">Cuéntanos tu idea y te ayudamos a crear contenido que conecte.</p>
            <a href="/contact" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#0A0A0A] text-white text-xs font-medium tracking-wider uppercase hover:bg-[#222222] transition-colors duration-300">
                Empezar
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>

    <div id="album-modal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-[#0A0A0A]/95 backdrop-blur-sm" onclick="closeAlbum()"></div>
        <div class="relative z-10 w-full h-full flex flex-col">
            <div class="flex items-center justify-between px-6 py-4 border-b border-[#1A1A1A]">
                <div>
                    <h3 id="modal-title" class="text-base font-semibold text-white"></h3>
                    <p id="modal-desc" class="text-xs text-[#666666]"></p>
                </div>
                <button onclick="closeAlbum()" class="w-10 h-10 flex items-center justify-center text-[#666666] hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div id="modal-body" class="flex-1 overflow-y-auto p-6">
                <div id="modal-youtube" class="hidden max-w-3xl mx-auto mb-8">
                    <div class="aspect-video w-full bg-[#111111] rounded overflow-hidden">
                        <iframe id="modal-youtube-frame" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div id="modal-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-px bg-[#1A1A1A]"></div>
            </div>
        </div>
    </div>

    <script>
        function openAlbum(item) {
            var cat = item.getAttribute('data-cat');
            var title = item.getAttribute('data-title');
            var desc = item.getAttribute('data-desc');
            var youtube = item.getAttribute('data-youtube');

            document.getElementById('modal-title').textContent = title;
            document.getElementById('modal-desc').textContent = desc;

            var ytContainer = document.getElementById('modal-youtube');
            var ytFrame = document.getElementById('modal-youtube-frame');
            var grid = document.getElementById('modal-grid');

            grid.innerHTML = '';

            if (cat === 'Videos' && youtube) {
                ytContainer.classList.remove('hidden');
                ytFrame.src = 'https://www.youtube.com/embed/' + youtube + '?autoplay=1';
                for (var i = 0; i < 10; i++) {
                    var cell = document.createElement('div');
                    cell.className = 'bg-[#111111] aspect-video flex items-center justify-center';
                    cell.innerHTML = '<svg class="w-8 h-8 text-[#222]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>';
                    grid.appendChild(cell);
                }
            } else {
                ytContainer.classList.add('hidden');
                ytFrame.src = '';
                for (var i = 0; i < 10; i++) {
                    var cell = document.createElement('div');
                    cell.className = 'bg-[#111111] aspect-square flex items-center justify-center';
                    cell.innerHTML = '<svg class="w-8 h-8 text-[#222]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>';
                    grid.appendChild(cell);
                }
            }

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
        document.addEventListener('DOMContentLoaded', function () {
            var buttons = document.querySelectorAll('.filter-btn');
            var items = document.querySelectorAll('.portfolio-item');

            items.forEach(function (item) {
                if (item.getAttribute('data-cat') !== 'Eventos') {
                    item.style.display = 'none';
                }
            });

            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var filter = this.getAttribute('data-filter');

                    buttons.forEach(function (b) {
                        b.classList.remove('active', 'bg-white', 'text-[#0A0A0A]');
                        b.classList.add('border', 'border-[#333333]', 'text-[#666666]');
                    });
                    this.classList.add('active', 'bg-white', 'text-[#0A0A0A]');
                    this.classList.remove('border', 'border-[#333333]', 'text-[#666666]');

                    items.forEach(function (item) {
                        if (filter === 'all' || item.getAttribute('data-cat') === filter) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
