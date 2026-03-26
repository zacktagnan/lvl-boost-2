
# Setup Inicial de Proyecto Laravel con Herramientas de Calidad y Laravel Boost

> Configuración completa de Laravel para desarrollo con calidad y contexto para IA

## Descripción

Crear un proyecto de Laravel no es solo ejecutar un comando para tener todas las carpetas disponibles. Es recomendable establecer un **STACK inicial** que, a lo largo del desarrollo del proyecto, facilite toda su implementación y la seguridad del mismo.

## Por qué un SETUP previo

| Sin SETUP | Con SETUP |
|-----------|-----------|
| N+1 queries en producción | Eloquent con "strict mode" captura errores |
| dd() olvidados en el código | Rector moderniza el código automáticamente |
| Atributos mal escritos sin error | PHPStan nivel 7 valida tipos |
| env() dispersos por toda la APP | Los Arch tests protegen la arquitectura |
| Sin tests, sin arquitectura | Pint formatea el código sin pensar |
| La IA genera código sin contexto | Laravel Boost da contexto real a la IA |

## Stack Tecnológico

| Tecnología | Versión | Propósito |
|------------|---------|-----------|
| PHP | 8.5.3 | Lenguaje base |
| Laravel | 13 (compatible con 12) | Framework |
| Laravel Boost | 2.3 | Servidor MCP para IA |
| Pest | 4.4 | Testing framework |
| Laravel Sail | 1.54 | Contenedores Docker |
| Laravel Pint | 1.27 | Formateador de código |
| Rector | 2.3 | Refactorización automática |
| PHPStan | 3.9 | Análisis estático (nivel 7) |

## Flujo de Configuración

El proyecto se configura en este orden:

1. Crear proyecto con Laravel Sail
2. Archivo .env con contenido mínimo + Eloquent strict
3. Herramientas de calidad (Rector + Pint + PHPStan nivel 7)
4. Pest, con tests de arquitectura (Arch tests)
5. Laravel Boost + Guidelines + Skills

## Arquitectura

El proyecto sigue el patrón Action:

- **Actions** (`app/Actions/`): Lógica de negocio en clases con método `execute()`
- **DTOs** (`app/DataTransferObjects/`): Objetos tipados para transferencia de datos
- **Form Requests**: Solo validan los datos
- **Controladores**: Son finales y nunca contienen lógica de negocio

El flujo siempre será: Request → FormRequest valida → toDto() → Controller pasa DTO a Action → Action ejecuta.

## Guidelines Configuradas

El proyecto tiene configuradas las siguientes guidelines:

- `.ai/architecture` - Patrón Action y estructura de código
- `.ai/forbidden` - Restricciones de seguridad (prohibido leer .env, etc.)
- `.ai/testing` - Testing con Pest
- `php` - Convenciones PHP (tipos, constructores, PHPDoc)
- `laravel/core` - Convenciones Laravel (Eloquent, colas)
- `laravel/v13` - Especificaciones Laravel 13
- `pint/core` - Formato de código
- `pest/core` - Testing

## Skills Disponibles

Las siguientes skills se activan automáticamente según el contexto:

- `pest-testing` - Testing con Pest 4
- `notification-service` - Sistema de notificaciones
- `web-design-guidelines` - Guidelines de UI
- `conventional-commits` - Conventional Commits para commits

## Configuración del Entorno de Testing

El proyecto utiliza Pest en lugar de PHPUnit:

- Tests en `tests/Feature/` y `tests/Unit/`
- Tests de Arquitectura en `tests/Architecture/ArchTest.php`
- Presets de Laravel para protección de arquitectura

## Comandos Esenciales

```bash
# Regenerar guidelines después de cambios
vendor/bin/sail artisan boost:install

# Ejecutar tests
vendor/bin/sail artisan test
# o
vendor/bin/sail test

# Ejecutar cada herramienta individualmente
vendor/bin/sail composer pint
vendor/bin/sail composer rector
vendor/bin/sail composer phpstan

# Ejecutar todas las herramientas de calidad
vendor/bin/sail composer quality

# Ejecutar todas las herramientas de calidad y los tests
vendor/bin/sail composer test
```

## Recursos

- [Laravel Boost Documentation](https://laravel.com/docs/boost)
- [Laravel Pint Documentation](https://laravel.com/docs/pint)
- [Rector PHP](https://getrector.com/)
- [PHPStan](https://phpstan.org/)
- [Pest Framework](https://pestphp.com/)

## Flujo de Trabajo

1. Desarrollar una tarea
2. Ejecutar herramientas de calidad
3. Ejecutar tests
4. Si todo es correcto, hacer commit y subir al repositorio (respetando la especificación de las [Conventional Commits](https://www.conventionalcommits.org))
5. Repetir el ciclo hasta terminar con todas las posibles tareas

---

## Licencia

MIT
