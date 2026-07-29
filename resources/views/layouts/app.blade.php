<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Studio Katracho')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="fixed top-0 left-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="flex items-center justify-between h-20">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('img/logo studio.webp') }}" alt="Studio Katracho" class="h-12 w-auto">
                </a>

                <nav class="hidden md:flex items-center gap-10">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Inicio</a>
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">Nosotros</a>
                    <a href="/portfolio" class="nav-link {{ request()->is('portfolio') ? 'active' : '' }}">Portafolio</a>
                    <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contacto</a>
                </nav>

                <button id="menu-toggle" class="md:hidden flex flex-col gap-1.5 p-2" aria-label="Menu">
                    <span class="block w-6 h-[2px] bg-white transition-all duration-300" id="bar1"></span>
                    <span class="block w-4 h-[2px] bg-white transition-all duration-300" id="bar2"></span>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-[#0A0A0A] border-t border-[#1A1A1A]">
            <div class="px-6 py-6 flex flex-col gap-5">
                <a href="/" class="flex items-center gap-2 mb-2">
                    <img src="{{ asset('img/logo studio.webp') }}" alt="Studio Katracho" class="h-10 w-auto">
                </a>
                <a href="/" class="text-sm font-medium text-white">Inicio</a>
                <a href="/about" class="text-sm text-[#666666] hover:text-white transition-colors">Nosotros</a>
                <a href="/portfolio" class="text-sm text-[#666666] hover:text-white transition-colors">Portafolio</a>
                <a href="/contact" class="text-sm text-[#666666] hover:text-white transition-colors">Contacto</a>
                <div class="pt-4 border-t border-[#1A1A1A]">
                    <a href="/contact" class="btn-primary text-xs">Contacto</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#0A0A0A] border-t border-[#1A1A1A]">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="py-16 grid grid-cols-1 md:grid-cols-12 gap-12">
                <div class="md:col-span-5">
                    <a href="/" class="flex items-center gap-2 mb-4 inline-block">
                    <img src="{{ asset('img/logo studio.webp') }}" alt="Studio Katracho" class="h-10 w-auto">
                    </a>
                    <p class="text-sm text-[#666666] leading-relaxed max-w-sm mt-4">
                        Creación de contenido para redes sociales. Fotos, videos y estrategia digital para marcas que quieren destacar.
                    </p>
                </div>

                <div class="md:col-span-2 md:col-start-7">
                    <h4 class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-5">Navegación</h4>
                    <div class="flex flex-col gap-3">
                        <a href="/" class="text-sm text-[#666666] hover:text-white transition-colors">Inicio</a>
                        <a href="/about" class="text-sm text-[#666666] hover:text-white transition-colors">Nosotros</a>
                        <a href="/portfolio" class="text-sm text-[#666666] hover:text-white transition-colors">Portafolio</a>
                        <a href="/contact" class="text-sm text-[#666666] hover:text-white transition-colors">Contacto</a>
                    </div>
                </div>

                <div class="md:col-span-5">
                    <h4 class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-5">Contacto</h4>
                    <div class="flex flex-col gap-3">
                        <span class="text-sm text-[#666666]">fa2288050@gmail.com</span>
                        <span class="text-sm text-[#666666]">Juticalpa y Catacamas, Olancho</span>
                    </div>
                    <div class="flex gap-3 mt-6">
                        <a href="https://www.instagram.com/studio_katracho/" target="_blank" class="text-xs text-[#444444] hover:text-white transition-colors">Instagram</a>
                        <span class="text-[#333333]">/</span>
                        <a href="https://www.facebook.com/share/1LHM88HzEH/" target="_blank" class="text-xs text-[#444444] hover:text-white transition-colors">Facebook</a>
                        <span class="text-[#333333]">/</span>
                        <a href="https://www.youtube.com/@Francoa-le5br" target="_blank" class="text-xs text-[#444444] hover:text-white transition-colors">YouTube</a>
                    </div>
                </div>
            </div>

            <div class="py-6 border-t border-[#1A1A1A] flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-xs text-[#333333]">
                    &copy; {{ date('Y') }} Studio Katracho. Todos los derechos reservados.
                </p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-xs text-[#333333] hover:text-white transition-colors">Privacidad</a>
                    <a href="#" class="text-xs text-[#333333] hover:text-white transition-colors">Términos</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const navbar = document.getElementById('navbar');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            bar1.classList.toggle('rotate-45');
            bar1.classList.toggle('translate-y-[5px]');
            bar2.classList.toggle('-rotate-45');
            bar2.classList.toggle('-translate-y-[5px]');
            bar2.classList.toggle('w-6');
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                navbar.classList.add('bg-[#0A0A0A]/95', 'backdrop-blur-md', 'border-b', 'border-[#1A1A1A]');
            } else {
                navbar.classList.remove('bg-[#0A0A0A]/95', 'backdrop-blur-md', 'border-b', 'border-[#1A1A1A]');
            }
        });
    </script>
</body>
</html>
