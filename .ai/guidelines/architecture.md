# Arquitectura

## Actions

Toda la lógica de negocio en Actions invocables, nunca en controladores.

Ubicación: `app/Actions/`

Reglas:
- Clase final con método público '__invoke()'
- Recibe DTO tipado como argumento
- Retorna resultado de la operación

✅ Correcto:

```php
<?php

final class CreateOrderAction
{
    public function __invoke(CreateOrderActionData $data): Order
    {
        // Lógica aquí
    }
}
```

❌ Incorrecto:


```php
<?php

// Lógica de negocio en el controlador
public function store(Request $request)
{
    $order = Order::create($request->all());
    Mail::send(...);
    // ...
}
```

## DTOs

Ubicación: `app/DataTransferObjects/`

Reglas:
- Clases readonly
- Solo propiedades tipadas

## Form Requests

Reglas:
- Cada FormRequest incluye un método `toDto()` que construye y devuelve el DTO correspondiente desde la request

## Controladores

Los controladores son finales y nunca contienen lógica de negocio.
- Invocables (`__invoke()`) para acciones específicas que no son CRUD
- Resource (index, store, show, update, destroy) para CRUD

El flujo siempre es: Request → FormRequest valida → toDto() → Controller pasa DTO a Action → Action ejecuta.
