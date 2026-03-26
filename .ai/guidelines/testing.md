# Testing

## Framework

Siempre Pest PHP, nunca PHPUnit.

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

- tests/Architecture/ → Arch tests
- tests/Feature/{Dominio}/ → Tests de flujo completo
- tests/Unit/Actions/ → Tests de Actions aisladas

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

## Convenciones
- Un test, una aserción (o aserciones relacionadas)
- Usar factories para datos de prueba. Nunca datos hardcodeados en el test.
- Arch tests en tests/Architecture/ArchTest.php
- Si se establece un archivo de test para la clase `app\Notifications\WelcomeNotification.php`, el archivo de test correspondiente, sea de tipo Feature o Unit, deberá respetar la misma estrutura de carpetas, es decir, `tests\Feature\Notifications\WelcomeNotificationTest.php` o  `tests\Unit\Notifications\WelcomeNotificationTest.php`
