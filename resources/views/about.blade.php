@extends('layouts.app')

@section('title', 'Studio Katracho - Nosotros')

@section('content')
    <section class="pt-32 lg:pt-40 pb-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="max-w-2xl">
                <div class="section-label">Nosotros</div>
                <h1 class="heading-xl mb-4">Quiénes somos</h1>
                <p class="text-body-lg">Estudio de creación de contenido para redes sociales, fotografía y video.</p>
            </div>
        </div>
    </section>

    <section class="pb-24 lg:pb-32">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="aspect-[4/3] bg-[#111111] border border-[#1A1A1A] flex items-center justify-center">
                    <svg class="w-16 h-16 text-[#222222]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                </div>
                <div>
                    <div class="section-label">Nuestra historia</div>
                    <h2 class="heading-lg mb-6">Creamos contenido que conecta</h2>
                    <p class="text-body mb-5">Studio Katracho nació con la misión de ayudar a las marcas a contar sus historias a través de contenido visual impactante. Somos un equipo apasionado por la fotografía, el video y las redes sociales.</p>
                    <p class="text-body mb-8">Creemos que cada marca tiene una voz única, y nuestro trabajo es darle forma visual para que conecte con su audiencia de manera auténtica.</p>
                    <div class="flex gap-10">
                        <div>
                            <div class="stat-number text-3xl mb-1">200+</div>
                            <p class="text-xs text-[#666666]">Proyectos</p>
                        </div>
                        <div>
                            <div class="stat-number text-3xl mb-1">6+</div>
                            <p class="text-xs text-[#666666]">Años</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 lg:py-32 bg-[#111111]">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="text-center mb-16">
                <div class="section-label justify-center">Equipo</div>
                <h2 class="heading-lg">Las personas detrás</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-[#1A1A1A]">
                <div class="bg-[#111111] group">
                    <div class="aspect-[3/4] bg-[#0A0A0A] overflow-hidden">
                        <img src="{{ asset('img/isa.webp') }}" alt="Isa Katracho" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-base font-semibold mb-1">Isa Katracho</h3>
                        <p class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-3">Directora General</p>
                        <p class="text-sm text-[#666666] leading-relaxed">Lidera la visión estratégica del estudio y la relación con los clientes.</p>
                    </div>
                </div>

                <div class="bg-[#111111] group">
                    <div class="aspect-[3/4] bg-[#0A0A0A] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#222222]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-base font-semibold mb-1">María Rodríguez</h3>
                        <p class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-3">Fotógrafa</p>
                        <p class="text-sm text-[#666666] leading-relaxed">Captura momentos que cuentan historias a través de la imagen.</p>
                    </div>
                </div>

                <div class="bg-[#111111] group">
                    <div class="aspect-[3/4] bg-[#0A0A0A] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#222222]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="0.5"><path d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-base font-semibold mb-1">Carlos López</h3>
                        <p class="text-[0.6rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-3">Productor de Video</p>
                        <p class="text-sm text-[#666666] leading-relaxed">Crea videos que conectan emocionalmente con las audiencias.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 lg:py-32 bg-white">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl md:text-4xl font-semibold text-[#0A0A0A] mb-6">¿Quieres ser parte de <span class="font-light">nuestro equipo</span>?</h2>
            <p class="text-sm text-[#666666] max-w-md mx-auto mb-10">Siempre buscamos personas creativas apasionadas por el contenido.</p>
            <a href="/contact" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#0A0A0A] text-white text-xs font-medium tracking-wider uppercase hover:bg-[#222222] transition-colors duration-300">
                Contáctanos
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>
@endsection
