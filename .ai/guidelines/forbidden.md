# Restricciones de Seguridad

## Archivos prohibidos

Nunca leer, modificar ni referenciar el archivo `.env`.

Usa `.env.example` o `.env.testing` como referencia para variables de entorno.

## Operaciones prohibidas

- Nunca ejecutar migraciones destructivas sin confirmación (drop table, drop column)
- Nunca modificar archivos de configuración del framework directamente, proponer cambios en `.env.example`
- Nunca eliminar tests existentes
