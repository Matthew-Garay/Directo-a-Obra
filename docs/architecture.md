# Arquitectura y Decisiones de Diseño - Directo a Obra

## Visión general

Directo a Obra es una plataforma de comercio electrónico para compra y venta de materiales de construcción, desarrollada con PHP 8.2 y MySQL/MariaDB.

## Decisiones de arquitectura (ADR)

### ADR-001: Stack tecnológico PHP + MySQL

**Estado:** Aceptado  
**Contexto:** Proyecto académico que requiere un sitio funcional con carrito de compras y procesamiento de pagos.  
**Decisión:** Usar PHP 8.2 con PDO para acceso a base de datos MySQL/MariaDB, y PHPMailer para envío de correos.  
**Consecuencias:** Compatible con cualquier servidor LAMP/XAMPP estándar.

### ADR-002: Exclusión de credenciales del repositorio

**Estado:** Aceptado  
**Contexto:** `configproducts.php` contiene claves de API sensibles (CLIENTE_ID, KEY_TOKEN).  
**Decisión:** Excluir `configuracion/configproducts.php` del control de versiones mediante `.gitignore` y proporcionar `.env.example` como plantilla.  
**Consecuencias:** Los desarrolladores deben crear su propio archivo de configuración local con credenciales válidas.

### ADR-003: Estilos inline y CDN

**Estado:** Aceptado  
**Contexto:** Los archivos `css/styles.css` y `js/script.js` están vacíos o faltan en el repositorio original.  
**Decisión:** Mantener estilos en línea y cargar Bootstrap 5 y Tailwind CSS vía CDN.  
**Consecuencias:** El sitio funciona sin necesidad de compilar assets, pero el mantenimiento de estilos está disperso en los archivos PHP.

## Tecnologías utilizadas

- PHP 8.2 (backend)
- MySQL / MariaDB (base de datos)
- HTML5, CSS3, JavaScript (frontend)
- Bootstrap 5.1.3 (CDN)
- Tailwind CSS (CDN)
- PHPMailer (envío de correo electrónico)
- XAMPP (entorno de desarrollo local)
