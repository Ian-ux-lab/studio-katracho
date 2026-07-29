@extends('layouts.app')

@section('title', 'Studio Katracho - Contacto')

@section('content')
    <section class="pt-32 lg:pt-40 pb-16">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="max-w-2xl">
                <div class="section-label">Contacto</div>
                <h1 class="heading-xl mb-4">Hablemos</h1>
                <p class="text-body-lg">¿Tienes un proyecto en mente? Cuéntanos y te contactamos.</p>
            </div>
        </div>
    </section>

    <section class="pb-32 lg:pb-40">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-20">
                <div class="lg:col-span-4">
                    <div class="space-y-8">
                        <div>
                            <p class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-2">Email</p>
                            <p class="text-sm text-white">fa2288050@gmail.com</p>
                        </div>
                        <div>
                            <p class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-2">Ubicación</p>
                            <p class="text-sm text-white">Juticalpa y Catacamas, Olancho</p>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-[#1A1A1A]">
                        <p class="text-[0.65rem] font-medium tracking-[0.15em] uppercase text-[#666666] mb-4">Redes</p>
                        <div class="flex gap-4">
                            <a href="https://www.instagram.com/studio_katracho/" target="_blank" class="text-xs text-[#444444] hover:text-white transition-colors">Instagram</a>
                            <a href="https://www.facebook.com/share/1LHM88HzEH/" target="_blank" class="text-xs text-[#444444] hover:text-white transition-colors">Facebook</a>
                            <a href="https://www.youtube.com/@Francoa-le5br" target="_blank" class="text-xs text-[#444444] hover:text-white transition-colors">YouTube</a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="p-8 lg:p-10 bg-[#111111] border border-[#1A1A1A]">
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-[#666666] mb-2">Nombre</label>
                                    <input type="text" class="input-field" placeholder="Tu nombre">
                                </div>
                                <div>
                                    <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-[#666666] mb-2">Email</label>
                                    <input type="email" class="input-field" placeholder="tu@email.com">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-[#666666] mb-2">¿Qué necesitas?</label>
                                <select class="input-field appearance-none cursor-pointer">
                                    <option value="">Selecciona un servicio</option>
                                    <option value="redes">Contenido para redes sociales</option>
                                    <option value="foto">Fotografía</option>
                                    <option value="video">Producción de video</option>
                                    <option value="estrategia">Estrategia de contenido</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-[0.65rem] font-medium tracking-[0.1em] uppercase text-[#666666] mb-2">Mensaje</label>
                                <textarea rows="5" class="input-field resize-none" placeholder="Cuéntanos sobre tu marca y lo que necesitas..."></textarea>
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <p class="text-xs text-[#333333]">Respondemos en menos de 24h</p>
                                <button type="submit" class="btn-primary">
                                    Enviar
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
