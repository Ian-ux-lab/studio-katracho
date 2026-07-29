@extends('layouts.app')

@section('title', 'Studio Katracho - Nosotros')

@section('content')
    <section class="pt-32 lg:pt-40 pb-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="max-w-2xl">
                <div class="section-label">Nosotros</div>
                <h1 class="heading-xl mb-4">Quiénes somos</h1>
                <p class="text-body-lg">Cubrimos eventos, sesiones fotográficas, producción de video y creación de contenido para marcas.</p>
            </div>
        </div>
    </section>

    <section class="pb-24 lg:pb-32">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="hero-img-wrap aspect-[4/3] bg-[#111111]">
                    <img src="{{ asset('img/equipo studio/sony.webp') }}" alt="Studio Katracho">
                </div>
                <div>
                    <div class="section-label">Nuestra historia</div>
                    <h2 class="heading-lg mb-6">Creamos contenido que conecta</h2>
                    <p class="text-body mb-5">Studio Katracho nació con la misión de capturar momentos y contar historias a través de contenido visual impactante. Cubrimos eventos con fotografía y video, realizamos sesiones de todo tipo y creamos contenido para marcas.</p>
                    <p class="text-body mb-8">Creemos que cada proyecto tiene una historia única, y nuestro trabajo es darle forma visual para que conecte de manera auténtica con su audiencia.</p>
                    <div class="flex gap-10">
                        <div>
                            <div class="stat-number text-3xl mb-1">6+</div>
                            <p class="text-xs text-[#666666]">Proyectos</p>
                        </div>
                        <div>
                            <div class="stat-number text-3xl mb-1">3+</div>
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-px bg-transparent md:bg-[#1A1A1A]">
                <div class="bg-[#111111] group">
                    <div class="aspect-[3/4] bg-[#0A0A0A] overflow-hidden">
                        <img src="{{ asset('img/equipo studio/ian.webp') }}" alt="Ian Saenz" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 team-img">
                    </div>
                    <div class="p-6">
                        <h3 class="text-base font-semibold mb-1">Ian Saenz</h3>
                    </div>
                </div>

                <div class="bg-[#111111] group">
                    <div class="aspect-[3/4] bg-[#0A0A0A] overflow-hidden">
                        <img src="{{ asset('img/equipo studio/alexis.webp') }}" alt="Alexis Salinas" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 team-img">
                    </div>
                    <div class="p-6">
                        <h3 class="text-base font-semibold mb-1">Alexis Salinas</h3>
                    </div>
                </div>

                <div class="bg-[#111111] group">
                    <div class="aspect-[3/4] bg-[#0A0A0A] overflow-hidden">
                        <img src="{{ asset('img/equipo studio/tito.webp') }}" alt="Rodil Ramirez" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 team-img">
                    </div>
                    <div class="p-6">
                        <h3 class="text-base font-semibold mb-1">Rodil Ramirez</h3>
                    </div>
                </div>
            </div>

            <script>
                if ('ontouchstart' in window) {
                    document.querySelectorAll('.team-img').forEach(function(img) {
                        img.addEventListener('click', function() {
                            this.classList.toggle('grayscale-0');
                        });
                    });
                }
            </script>
        </div>
    </section>


@endsection
