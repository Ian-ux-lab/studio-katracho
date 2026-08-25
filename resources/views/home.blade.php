@extends('layouts.app')

@section('title', 'Studio Katracho - Inicio')

@section('content')
    <!-- Sección Hero Principal -->
    <section class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-16 lg:py-8">
        <div class="max-w-[1360px] mx-auto px-6 lg:px-12 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- Columna de Texto e Información -->
                <div class="lg:col-span-5 flex flex-col justify-center text-left">
                    <div class="section-label fade-in">Creación de contenido</div>

                    <h1 class="heading-xl mb-4 sm:mb-6 fade-in fade-in-delay-1">
                        Contenido que <br class="hidden sm:inline">
                        <span class="font-light">conecta</span>
                    </h1>

                    <p class="text-body-lg max-w-lg mb-8 sm:mb-10 fade-in fade-in-delay-2">
                        Cubrimos eventos con fotografía y video, creamos sesiones personalizadas y contenido audiovisual para marcas y personas.
                    </p>

                    <div class="flex flex-wrap gap-4 items-center fade-in fade-in-delay-3">
                        <a href="/portfolio" class="btn-primary">
                            Ver portafolio
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="/contact" class="btn-outline">
                            Hablemos
                        </a>
                    </div>
                </div>

                <!-- Columna de Imágenes Hero Grandes (Ocultas en móviles, visibles en pantallas grandes lg+) -->
                <div class="hidden lg:grid lg:col-span-7 grid-cols-2 gap-6 lg:gap-8 items-center fade-in fade-in-delay-2">
                    <div class="hero-img-wrap aspect-[3/4] min-h-[440px] lg:min-h-[560px] rounded-sm overflow-hidden bg-[#111111] border border-[#1E1E1E] shadow-2xl">
                        <img src="{{ asset('img/sesiones studio/isabel/1.webp') }}" alt="Sesión de estudio" class="w-full h-full object-cover" loading="eager">
                    </div>
                    <div class="hero-img-wrap aspect-[3/4] min-h-[440px] lg:min-h-[560px] rounded-sm overflow-hidden bg-[#111111] border border-[#1E1E1E] shadow-2xl lg:translate-y-8 transition-transform">
                        <img src="{{ asset('img/boda/tavo/IAN00385-Mejorado-NR.webp') }}" alt="Fotografía de boda" class="w-full h-full object-cover" loading="eager">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Sección CTA Centrada -->
    <section class="py-20 lg:py-28 bg-[#0E0E0E] border-t border-[#1A1A1A]">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center flex flex-col items-center justify-center">
            <div class="max-w-2xl mx-auto flex flex-col items-center">
                <span class="text-[0.6875rem] font-medium tracking-[0.2em] uppercase text-white/50 mb-3">Trabajemos juntos</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-white mb-4 sm:mb-6 leading-tight">
                    ¿Listo para crear <br class="hidden sm:inline">contenido visual <span class="font-light">impactante</span>?
                </h2>
                <p class="text-sm sm:text-base text-white/70 max-w-lg mx-auto mb-8 sm:mb-10 leading-relaxed">
                    Cuéntanos sobre tu proyecto, sesión o evento y te ayudamos a crear el contenido visual perfecto para ti o tu marca.
                </p>
                <a href="/contact" class="btn-primary">
                    Empezar proyecto
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
