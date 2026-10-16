# Directo a Obra

Plataforma de comercio electrónico para compra y venta de materiales de construccion, desarrollada con PHP y MySQL. Permite navegar por un catalogo de productos, gestionar un carrito de compras, realizar pagos y contactar con proveedores.

## Descripcion

Directo a Obra es un sistema web orientado al sector de la construccion que facilita la adquisición de materiales y herramientas. Incluye funcionalidades de catalogo de productos, detalle de articulo, carrito de compras, proceso de pago, registro de contacto y seccion informativa sobre la empresa.

## Stack tecnologico

- **Backend:** PHP 8.2
- **Base de datos:** MySQL / MariaDB
- **Frontend:** HTML, CSS, JavaScript
- **Email:** PHPMailer (envío de correos)
- **Servidor local:** Apache (XAMPP)

## Estructura del proyecto

```
Directo a Obra/
├── Index.php              # Página principal
├── productos.php          # Catalogo de productos
├── detalles.php           # Detalle de producto
├── carrito / checkout     # Carrito y proceso de pago
├── pago.php               # Pasarela de pago
├── completado.php         # Confirmación de compra
├── contacto.php           # Formulario de contacto
├── somos.php              # Informacion de la empresa
├── proveedores.php        # Gestion de proveedores
├── clases/                # Logica de negocio y modelos
├── configuracion/         # Conexion a base de datos
├── css/                   # Hojas de estilo
├── js/                    # Scripts de frontend
├── phpmailer/             # Libreria para envío de correo
├── Recursos/              # Imagenes y recursos estaticos
└── database/
    └── directoaobra.sql   # Volcado de la base de datos
```

## Requisitos previos

- XAMPP (Apache + MySQL + PHP)
- Navegador web

## Instalacion

1. Clona o descarga este repositorio dentro de `htdocs` de XAMPP:
   ```
   C:\xampp\htdocs\Directo a Obra\
   ```
2. Importa la base de datos:
   - Abre phpMyAdmin (`http://localhost/phpmyadmin`)
   - Crea una base de datos llamada `directoaobra`
   - Importa el archivo `database/directoaobra.sql`
3. Configura el acceso a la base de datos en `configuracion/database.php` si es necesario.
4. Configura las claves de pago en `configuracion/configproducts.php` (archivo excluido del repositorio por seguridad).
5. Inicia Apache y MySQL desde el panel de control de XAMPP.
6. Accede al proyecto: `http://localhost/Directo a Obra/`

## Caracteristicas principales

- Navegación por catalogo de productos de construccion
- Detalle individual de cada producto
- Carrito de compras con conteo de articulos
- Proceso de pago y checkout
- Confirmación de compra completada
- Formulario de contacto
- Seccion informativa (Quienes somos)
- Gestion de proveedores
- Diseño adaptable con CSS propio

## Licencia

Este proyecto fue desarrollado con fines academicos y de portafolio.
