# Guía de Instalación Local - Directo a Obra

Esta guía te ayuda a configurar el proyecto en tu entorno local.

## Requisitos previos

- XAMPP (Apache + MySQL + PHP 8.2+)
- Navegador web moderno
- Git

## Instalación

1. Clona el repositorio dentro de `htdocs` de XAMPP:
   ```bash
   git clone https://github.com/Matthew-Garay/Directo-a-Obra.git
   cd "Directo a Obra"
   ```
2. Configura las variables de entorno:
   ```bash
   cp .env.example .env
   # Edita .env con tus valores reales (especialmente credenciales de pago)
   ```
3. Configura la base de datos:
   - Abre phpMyAdmin (`http://localhost/phpmyadmin`)
   - Crea una base de datos llamada `directoaobra`
   - Importa el archivo `database/directoaobra.sql`
4. Configura el acceso a la base de datos en `configuracion/database.php` si es necesario.
5. Configura las claves de pago en `configuracion/configproducts.php` (archivo excluido del repositorio por seguridad).
6. Inicia Apache y MySQL desde el panel de control de XAMPP.
7. Accede al proyecto: `http://localhost/Directo%20a%20Obra/`

## Verificación

Después de completar la instalación, deberías poder ver el catálogo de productos en `http://localhost/Directo%20a%20Obra/Index.php`.

## Solución de problemas

Si encuentras problemas, abre un issue con la etiqueta `bug` y describe los pasos seguidos y el mensaje de error.
