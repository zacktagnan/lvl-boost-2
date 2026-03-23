# Arquitectura

## Patrón Action

Toda la lógica de negocio en Actions, nunca en controladores.

Ubicación: `app/Actions/`

Reglas:
- Método público 'execute()'
- Recibe DTO tipado
- Retorna resultado de la operación

✅ Correcto:

```php
<?php

class CreateOrderAction
{
    public function execute(CreateOrderActionData $data): Order
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
- Propiedades tipadas
- Método `toDto()` en FormRequest para crear el DTO desde la request

## Controladores

Solo:
1. Validar con FormRequest
2. Llamar Action con `$request->toDto()`
3. Retornar response
