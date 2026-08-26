@extends('layouts.app')

@section('title', 'Studio Katracho - Contacto')

@section('content')
    <section class="pt-32 lg:pt-40 pb-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="max-w-2xl">
                <div class="section-label">Contacto</div>
                <h1 class="heading-xl mb-4">Hablemos</h1>
                <p class="text-body-lg">¿Tienes un proyecto o evento en mente? Cuéntanos y te contactamos.</p>
            </div>
        </div>
    </section>

    <section class="pb-32 lg:pb-40">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-20">
                <div class="lg:col-span-4">
                    <div class="space-y-8">
                        <div>
                            <p class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-white/60 mb-2">Email</p>
                            <p class="text-sm text-white">fa2288050@gmail.com</p>
                        </div>
                        <div>
                            <p class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-white/60 mb-2">Ubicación</p>
                            <p class="text-sm text-white">Juticalpa y Catacamas, Olancho</p>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-[#1A1A1A]">
                        <p class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-white/60 mb-4">Redes</p>
                        <div class="flex gap-4">
                            <a href="https://www.instagram.com/studio_katracho/" target="_blank" class="text-xs text-white/70 hover:text-white transition-colors">Instagram</a>
                            <a href="https://www.facebook.com/share/1LHM88HzEH/" target="_blank" class="text-xs text-white/70 hover:text-white transition-colors">Facebook</a>
                            <a href="https://www.youtube.com/@Francoa-le5br" target="_blank" class="text-xs text-white/70 hover:text-white transition-colors">YouTube</a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="p-8 lg:p-10 bg-[#111111] border border-[#1A1A1A] rounded-xl shadow-2xl relative">
                        <form id="contact-form" method="POST" action="/contact" class="space-y-6" onsubmit="handleContactSubmit(event)">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-white/70 mb-2">Nombre</label>
                                    <input type="text" id="form-name" name="name" value="{{ old('name') }}" class="input-field" placeholder="Tu nombre" required>
                                </div>
                                <div>
                                    <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-white/70 mb-2">Email</label>
                                    <input type="email" id="form-email" name="email" value="{{ old('email') }}" class="input-field" placeholder="tu@email.com" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-white/70 mb-2">¿Qué necesitas?</label>
                                <select id="form-service" name="service" class="input-field appearance-none cursor-pointer" required>
                                    <option value="">Selecciona un servicio</option>
                                    <option value="sesion-fotografica" {{ old('service') == 'sesion-fotografica' ? 'selected' : '' }}>Sesión fotográfica</option>
                                    <option value="cobertura-evento" {{ old('service') == 'cobertura-evento' ? 'selected' : '' }}>Cobertura de evento</option>
                                    <option value="produccion-video" {{ old('service') == 'produccion-video' ? 'selected' : '' }}>Producción de video</option>
                                    <option value="contenido-redes" {{ old('service') == 'contenido-redes' ? 'selected' : '' }}>Contenido para redes</option>
                                    <option value="otro" {{ old('service') == 'otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-white/70 mb-2">Mensaje</label>
                                <textarea id="form-message" name="message" rows="5" class="input-field resize-none" placeholder="Cuéntanos sobre tu proyecto o evento y lo que necesitas..." required>{{ old('message') }}</textarea>
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <p class="text-xs text-white/50">Respondemos en menos de 24h</p>
                                <button type="submit" id="submit-btn" class="btn-primary flex items-center gap-2">
                                    <span id="btn-text">Enviar</span>
                                    <svg id="btn-icon" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                    <div id="btn-spinner" class="hidden w-4 h-4 border-2 border-black border-t-transparent rounded-full animate-spin"></div>
                                </button>
                            </div>
                        </form>

                        <!-- Mensajes de estado dinámicos -->
                        <div id="status-message" class="hidden mt-6 p-4 rounded text-sm transition-all duration-300"></div>

                        @if(session('success'))
                            <div class="mt-6 p-4 bg-green-900/30 border border-green-700 text-green-300 text-sm rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mt-6 p-4 bg-red-900/30 border border-red-700 text-red-300 text-sm rounded">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        async function handleContactSubmit(e) {
            e.preventDefault();

            var form = document.getElementById('contact-form');
            var btn = document.getElementById('submit-btn');
            var btnText = document.getElementById('btn-text');
            var btnIcon = document.getElementById('btn-icon');
            var btnSpinner = document.getElementById('btn-spinner');
            var statusMsg = document.getElementById('status-message');

            // Deshabilitar botón y mostrar spinner
            btn.disabled = true;
            btn.classList.add('opacity-80', 'cursor-not-allowed');
            btnText.textContent = 'Enviando...';
            btnIcon.classList.add('hidden');
            btnSpinner.classList.remove('hidden');
            statusMsg.classList.add('hidden');

            var formData = new FormData(form);

            try {
                var response = await fetch('/contact', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                var data = await response.json();

                if (response.ok && data.success) {
                    statusMsg.className = 'mt-6 p-4 bg-green-900/30 border border-green-600/60 text-green-300 text-sm rounded-lg flex items-center gap-3';
                    statusMsg.innerHTML = '<svg class="w-5 h-5 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>' + data.message + '</span>';
                    statusMsg.classList.remove('hidden');
                    form.reset();
                } else {
                    throw new Error(data.message || 'Error al procesar la solicitud.');
                }
            } catch (err) {
                statusMsg.className = 'mt-6 p-4 bg-red-900/30 border border-red-600/60 text-red-300 text-sm rounded-lg flex items-center gap-3';
                statusMsg.innerHTML = '<svg class="w-5 h-5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg><span>' + (err.message || 'No se pudo enviar el correo en este momento. Por favor contáctanos directamente a fa2288050@gmail.com') + '</span>';
                statusMsg.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.classList.remove('opacity-80', 'cursor-not-allowed');
                btnText.textContent = 'Enviar';
                btnIcon.classList.remove('hidden');
                btnSpinner.classList.add('hidden');
            }
        }
    </script>
@endsection
