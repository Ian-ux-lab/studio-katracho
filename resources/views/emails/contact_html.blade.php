<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto - Studio Katracho</title>
</head>
<body style="margin: 0; padding: 0; background-color: #0A0A0A; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #FFFFFF; -webkit-font-smoothing: antialiased;">
    
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #0A0A0A; padding: 40px 15px;">
        <tr>
            <td align="center">
                
                <!-- Contenedor Principal del Correo -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; background-color: #141414; border: 1px solid #262626; border-radius: 12px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.6);">
                    
                    <!-- Encabezado con Logo / Marca -->
                    <tr>
                        <td align="center" style="background-color: #0E0E0E; padding: 32px 24px; border-bottom: 1px solid #222222;">
                            <h1 style="margin: 0; font-size: 20px; font-weight: 700; letter-spacing: 0.25em; text-transform: uppercase; color: #FFFFFF;">
                                STUDIO KATRACHO
                            </h1>
                            <p style="margin: 6px 0 0 0; font-size: 11px; font-weight: 400; letter-spacing: 0.15em; text-transform: uppercase; color: #888888;">
                                Fotografía & Producción Audiovisual
                            </p>
                        </td>
                    </tr>

                    <!-- Cuerpo del Correo -->
                    <tr>
                        <td style="padding: 36px 32px;">
                            
                            <!-- Badge de Notificación -->
                            <div style="margin-bottom: 24px;">
                                <span style="display: inline-block; background-color: #222222; border: 1px solid #333333; color: #E5E5E5; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.12em; padding: 6px 12px; border-radius: 20px;">
                                    📬 Nueva solicitud de contacto web
                                </span>
                            </div>

                            <p style="margin: 0 0 24px 0; font-size: 15px; line-height: 1.6; color: #D4D4D8;">
                                Has recibido un nuevo mensaje enviado desde el formulario de contacto de tu sitio web:
                            </p>

                            <!-- Tarjeta de Detalles del Cliente -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #1A1A1A; border: 1px solid #2B2B2B; border-radius: 8px; margin-bottom: 24px;">
                                <tr>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #262626; width: 35%; color: #888888; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                        👤 Cliente
                                    </td>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #262626; color: #FFFFFF; font-size: 15px; font-weight: 600;">
                                        {{ $data['name'] ?? 'No especificado' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #262626; color: #888888; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                        ✉️ Correo
                                    </td>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #262626; color: #FFFFFF; font-size: 14px;">
                                        <a href="mailto:{{ $data['email'] }}" style="color: #FFFFFF; text-decoration: underline; font-weight: 500;">
                                            {{ $data['email'] ?? 'No especificado' }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #262626; color: #888888; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                        🎯 Servicio
                                    </td>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #262626; color: #FFFFFF; font-size: 14px; font-weight: 600;">
                                        <span style="display: inline-block; background-color: #2A2A2A; border: 1px solid #3E3E3E; padding: 4px 10px; border-radius: 4px; color: #FFFFFF; font-size: 13px;">
                                            {{ $data['service_label'] ?? $data['service'] ?? 'General' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 20px; color: #888888; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                        📅 Fecha
                                    </td>
                                    <td style="padding: 16px 20px; color: #A1A1AA; font-size: 13px;">
                                        {{ $data['date'] ?? now()->format('d/m/Y h:i A') }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Mensaje del Cliente -->
                            <div style="margin-bottom: 32px;">
                                <p style="margin: 0 0 10px 0; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: #888888;">
                                    📝 Mensaje recibido:
                                </p>
                                <div style="background-color: #1A1A1A; border-left: 3px solid #FFFFFF; border-radius: 0 8px 8px 0; padding: 18px 20px;">
                                    <p style="margin: 0; font-size: 14px; line-height: 1.7; color: #E4E4E7; white-space: pre-line;">
                                        {{ $data['message'] }}
                                    </p>
                                </div>
                            </div>

                            <!-- Botón de Acción Principal -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center">
                                        <a href="mailto:{{ $data['email'] }}?subject=Respuesta%20a%20tu%20consulta%20-%20Studio%20Katracho" style="display: inline-block; background-color: #FFFFFF; color: #0A0A0A; text-decoration: none; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; padding: 16px 36px; border-radius: 6px; box-shadow: 0 8px 20px rgba(255,255,255,0.15);">
                                            ✉️ Responder a {{ $data['name'] }}
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Pie de Página del Correo -->
                    <tr>
                        <td align="center" style="background-color: #0E0E0E; padding: 24px; border-top: 1px solid #222222;">
                            <p style="margin: 0; font-size: 12px; color: #666666;">
                                © 2026 <strong>Studio Katracho</strong>. Todos los derechos reservados.
                            </p>
                            <p style="margin: 6px 0 0 0; font-size: 11px; color: #555555;">
                                Este es un correo automático generado desde el formulario de contacto web.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
