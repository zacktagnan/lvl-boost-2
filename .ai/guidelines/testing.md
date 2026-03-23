# Testing

## Framework

Siempre Pest, nunca PHPUnit.

## Naming

Usa `it()` con descripción clara en inglés:

✅ Correcto:

```php
<?php

it('creates an order for a user', function () {
    // ...
});
```

❌ Incorrecto:

```php
<?php

test('test order creation', function () {
    // ...
});
```

## Estructura del test

Siempre Arrange-Act-Assert:

```php
<?php

// Arrange
$user = User::factory()->create();

// Act
$response = postJson('/api/orders', $data);

// Assert
$response->assertCreated();
```

## Factories

Usa factories para crear datos de prueba. Nunca datos hardcodeados en el test.
