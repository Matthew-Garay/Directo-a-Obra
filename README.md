# Directo a Obra

## A. Titulo del Proyecto y Resumen Ejecutivo

Directo a Obra es una plataforma de comercio electronico para venta de materiales de construcción, desarrollada en PHP con base de datos MySQL. El sistema permite a los clientes navegar por un catalogo de productos, filtrar por categoria y rango de precio, agregar articulos a un carrito de compras y realizar pedidos con generacion automatica de facturas enviadas por correo electronico. Su alcance tecnologico se limita a una aplicacion web monolítica ejecutada en un servidor local con Apache y PHP, sin componentes de procesamiento en tiempo real ni arquitectura distribuida.

## B. Arquitectura del Sistema

El programa sigue una arquitectura Cliente-Servidor monolítica con PHP en el backend y MySQL como base de datos relacional. El flujo de datos comienza con la solicitud del cliente a traves del navegador, que llega al servidor web donde PHP procesa la logica de negocio, consulta la base de datos MySQL y devuelve HTML renderizado al cliente. El carrito de compras se gestiona mediante sesiones de PHP almacenadas en el servidor. El modulo de envio de correos utiliza PHPMailer con SMTP de Gmail para enviar facturas automaticamente tras cada compra. No existe separacion estricta de capas logicas ni patrones de diseno arquitectonico avanzado; la logica de presentacion y de negocio esta mezclada en los archivos PHP.

## C. Caracteristicas Tecnicas Clave

- Catalogo de productos de construccion con filtrado por categoria y rango de precio.
- Carrito de compras gestionado mediante sesiones de PHP.
- Generacion y envio de facturas en formato HTML por correo electronico mediante PHPMailer y SMTP de Gmail.
- Base de datos MySQL para almacenamiento de productos, categorias y transacciones.
- Frontend construido con HTML5, CSS3, JavaScript, Bootstrap 5 y Tailwind CSS mediante CDN.
- No emplea mecanismos de concurrencia, procesamiento en tiempo real o WebSockets.
- Seguridad basada en autenticacion de sesion de PHP y validacion de tokens HMAC para operaciones del carrito.
- No utiliza cifrado de datos en reposo ni proteccion CSRF en formularios.

## D. Especificacion del Stack Tecnologico

| Categoria | Tecnologia / Libreria |
|-----------|----------------------|
| Backend | PHP 8.x |
| Base de datos | MySQL |
| Frontend | HTML5, CSS3, JavaScript, Bootstrap 5 (CDN), Tailwind CSS (CDN) |
| Correo electronico | PHPMailer con SMTP de Gmail |
| Servidor web | Apache (XAMPP) |
| Protocolo | HTTP |

## E. Guia de Instalacion, Configuracion y Despliegue

### Requisitos previos del sistema

- Servidor web Apache con PHP 8.x (recomendado XAMPP).
- MySQL 5.7 o superior.
- Navegador web moderno.
- Conexión a Internet para cargar Bootstrap y Tailwind desde CDN.

### Secuencia de comandos para clonacion e instalacion

`ash
git clone https://github.com/Matthew-Garay/Directo-a-Obra.git
cd Directo-a-Obra
`

Copiar el contenido del repositorio al directorio raiz del servidor web (por ejemplo, htdocs de XAMPP).

Crear la base de datos ditectoaobra en MySQL y ejecutar los scripts SQL de esquema disponibles en el repositorio.

### Configuracion de variables de entorno

Este proyecto no utiliza archivo .env. Las credenciales de la base de datos estan definidas en configuracion/database.php. Las credenciales de correo electronico estan definidas en clases/enviar_email.php.

### Comandos para ejecucion en entorno de Desarrollo

Iniciar Apache y MySQL mediante el panel de control de XAMPP y acceder a http://localhost/Directo-a-Obra desde el navegador.

### Comandos para ejecucion en entorno de Produccion

No aplica entorno de produccion separado; el sitio se despliega en un servidor web local con Apache, PHP y MySQL.

## F. Creditos de Autoría

Desarrollado por: Matthew Ilveneff Garay Perez
Correo Electronico: 1911.garay.perez@gmail.com
