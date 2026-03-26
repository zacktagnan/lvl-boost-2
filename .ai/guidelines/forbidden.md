# Prohibiciones y Restricciones de Seguridad

## Seguridad crítica
- NUNCA leer, mostrar ni acceder al archivo `.env` (usar `.env.example` o `.env.testing` como referencia para variables de entorno).
- NUNCA ejecutar comandos git de escritura (commit, push, merge, rebase, reset)
- NUNCA ejecutar migraciones destructivas sin aprobación explícita (drop table, drop column)
- NUNCA exponer credenciales, tokens ni secrets en código o logs

## Operaciones prohibidas sobre el Código

- No instalar paquetes sin mi aprobación explícita
- No usar dd(), dump(), var_dump() ni ray()
- No usar env() fuera de archivos de config
- No modificar archivos de configuración del framework directamente sin justificación, proponer cambios en `.env.example`
- No usar query raw SQL sin justificación
- No usar Facades cuando se puede inyectar
- Nunca eliminar tests existentes
