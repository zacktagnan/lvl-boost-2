<x-mail::message>
# ¡Bienvenido a {{ config('app.name') }}!

¡Hola, **{{ $user->name }}**!

Gracias por registrarte en {{ config('app.name') }}. Tu cuenta ha sido creada exitosamente.

Puedes comenzar a explorar nuestra plataforma desde tu dashboard.

<x-mail::button :url="url('/dashboard')">
Ir al Dashboard
</x-mail::button>

Si tienes alguna pregunta, no dudes en contactarnos.

Saludos,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
