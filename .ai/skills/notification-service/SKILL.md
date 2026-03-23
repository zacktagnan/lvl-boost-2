---
name: notification-service
description: Trabajar con el sistema de notificaciones de la aplicación. Usar cuando se trabaje con emails, notificaciones push, o comunicaciones al usuario.
---

# Notification Service

## Cuándo activar

Cuando se trabaje con notificaciones, emails, o comunicaciones al usuario.

## Estructura

Las notificaciones siguen este patrón:

- Ubicación: `app/Notifications/`
- Siempre usar colas: `implements ShouldQueue`
- Canal por defecto: `mail`
- Plantillas en `resources/views/emails/`

## Convenciones

- Sufijo `Notification` en el nombre de clase
- Método `via()` siempre explícito
- Usar `toMail()` con componentes de Markdown
- Nunca enviar notificaciones directamente desde el controlador, siempre desde una Action

## Ejemplo

    <?php

    class OrderConfirmedNotification extends Notification implements ShouldQueue
    {
        use Queueable;

        public function __construct(
            private readonly Order $order,
        ) {}

        public function via(object $notifiable): array
        {
            return ['mail'];
        }

        public function toMail(object $notifiable): MailMessage
        {
            return (new MailMessage)
                ->subject('Order Confirmed')
                ->markdown('emails.order-confirmed', [
                    'order' => $this->order,
                ]);
        }
    }
