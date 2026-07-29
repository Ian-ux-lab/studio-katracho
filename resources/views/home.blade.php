@extends('layouts.app')

@section('title', 'Studio Katracho - Inicio')

@section('content')
    <section class="min-h-screen flex items-center">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12 w-full py-32">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.3fr] gap-16 items-center">
                <div>
                    <div class="section-label fade-in">Creación de contenido</div>

                    <h1 class="heading-xl mb-6 fade-in fade-in-delay-1">
                        Contenido que <br>
                        <span class="font-light">conecta</span>
                    </h1>

                    <p class="text-body-lg max-w-md mb-10 fade-in fade-in-delay-2">
                        Creamos fotos, videos y estrategia de contenido para marcas que quieren destacar en redes sociales.
                    </p>

                    <div class="flex flex-wrap gap-4 fade-in fade-in-delay-3">
                        <a href="/portfolio" class="btn-primary">
                            Ver trabajo
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="/contact" class="btn-outline">
                            Hablemos
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="grid grid-cols-2 gap-8">
                        <div class="aspect-[3/4] overflow-hidden border border-[#1A1A1A]">
                            <img src="{{ asset('img/sesiones studio/1.webp') }}" alt="Sesión de estudio" class="w-full h-full object-cover scale-110">
                        </div>
                        <div class="aspect-[3/4] overflow-hidden border border-[#1A1A1A] mt-16">
                            <img src="{{ asset('img/boda/IAN00385-Mejorado-NR.webp') }}" alt="Boda" class="w-full h-full object-cover scale-110">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 lg:py-32 bg-white">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-semibold text-[#0A0A0A] mb-6">
                ¿Listo para crear <br>contenido que <span class="font-light">destaque</span>?
            </h2>
            <p class="text-sm text-[#666666] max-w-md mx-auto mb-10">
                Cuéntanos tu marca y te ayudamos a crear contenido que conecte con tu audiencia.
            </p>
            <a href="/contact" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#0A0A0A] text-white text-xs font-medium tracking-wider uppercase hover:bg-[#222222] transition-colors duration-300">
                Empezar
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>
@endsection
