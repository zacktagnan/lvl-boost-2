# Laravel Pint Code Formatter

## Reglas de formato

- Usar preset `laravel`
- Siempre trailing commas en arrays multilinea
- Nunca espacios dentro de paréntesis
- Imports ordenados alfabéticamente y agrupados

## Ejecutar Pint

- No ejecutar `pint` directamente. Usar `./vendor/bin/sail composer quality` que ejecuta Rector + Pint + PHPStan en el orden correcto.
