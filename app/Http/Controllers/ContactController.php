<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $serviceMap = [
            'sesion-fotografica' => 'Sesión Fotográfica',
            'cobertura-evento' => 'Cobertura de Evento',
            'produccion-video' => 'Producción de Video',
            'contenido-redes' => 'Contenido para Redes Sociales',
            'otro' => 'Otro Servicio / Consulta General',
        ];

        $validated['service_label'] = $serviceMap[$validated['service']] ?? ucfirst($validated['service']);
        $validated['date'] = now()->setTimezone('America/Tegucigalpa')->format('d/m/Y h:i A');

        try {
            Mail::to('fa2288050@gmail.com')->send(new ContactMail($validated));

            $msg = '¡Mensaje enviado con éxito! Te responderemos muy pronto a tu correo.';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => true, 'message' => $msg]);
            }

            return back()->with('success', $msg);
        } catch (\Throwable $e) {
            Log::error('Error al enviar correo de contacto: ' . $e->getMessage());

            $errMsg = 'No se pudo enviar el correo en este momento. Por favor contáctanos directamente a fa2288050@gmail.com';

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => $errMsg . ' (' . $e->getMessage() . ')'], 500);
            }

            return back()
                ->with('error', $errMsg)
                ->withInput();
        }
    }
}
