<x-mail::message>
# 📬 Nuevo mensaje de contacto desde el sitio web

Has recibido una nueva solicitud de información a través del formulario de **Studio Katracho**.

---

### 👤 Datos del Cliente:
- **Nombre:** {{ $data['name'] }}
- **Correo electrónico:** [{{ $data['email'] }}](mailto:{{ $data['email'] }})
- **Servicio de interés:** {{ $data['service'] }}

---

### 📝 Mensaje:
> {{ $data['message'] }}

---

<x-mail::button :url="'mailto:' . $data['email']">
Responder al Cliente
</x-mail::button>

Gracias,<br>
**{{ config('app.name', 'Studio Katracho') }}**
</x-mail::message>
