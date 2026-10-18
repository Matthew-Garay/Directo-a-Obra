# Directo a Obra

<p align="center">
  <a href="https://github.com/Matthew-Garay/Directo-a-Obra/actions/workflows/ci.yml"><img src="https://github.com/Matthew-Garay/Directo-a-Obra/actions/workflows/ci.yml/badge.svg" alt="CI Status"/></a>
  <a href="https://github.com/Matthew-Garay/Directo-a-Obra/security/dependabot"><img src="https://img.shields.io/badge/Dependabot-enabled-blue?style=flat-square&logo=github&labelColor=555555" alt="Dependabot"/></a>
  <a href="https://github.com/Matthew-Garay/Directo-a-Obra/releases"><img src="https://img.shields.io/github/v/release/Matthew-Garay/Directo-a-Obra?style=flat-square&label=Release&labelColor=555555" alt="Release"/></a>
</p>

Plataforma de comercio electrónico para compra y venta de materiales de construcción, desarrollada con PHP y MySQL. Permite navegar por un catálogo de productos, gestionar un carrito de compras, realizar pagos y contactar con proveedores.

---

## Descripción

Directo a Obra es un sistema web orientado al sector de la construcción que facilita la adquisición de materiales y herramientas. Incluye funcionalidades de catálogo de productos, detalle de artículo, carrito de compras, proceso de pago, registro de contacto y sección informativa sobre la empresa.

## Stack tecnológico

- **Backend:** PHP 8.2
- **Base de datos:** MySQL / MariaDB
- **Frontend:** HTML, CSS, JavaScript
- **Email:** PHPMailer (envío de correos)
- **Servidor local:** Apache (XAMPP)

## Arquitectura del sistema

```mermaid
graph TD
    A[Cliente / Usuario] --> B[Frontend: HTML / CSS / JS]
    B --> C[Backend: PHP 8.2]
    C --> D[Base de datos: MySQL / MariaDB]
    C --> E[Email: PHPMailer]
    F[GitHub Actions CI/CD] --> C
    G[Dependabot Security] --> C
    
    style A fill:#e1f5fe,stroke:#01579b
    style B fill:#fff3e0,stroke:#e65100
    style C fill:#e8f5e9,stroke:#1b5e20
    style D fill:#f3e5f5,stroke:#4a148c
    style F fill:#ffe0b2,stroke:#ef6c00
    style G fill:#ffebee,stroke:#b71c1c
```

---

## Estructura del proyecto

```
Directo a Obra/
├── .github/                # Configuración de GitHub (CI/CD, plantillas)
│   ├── workflows/
│   └── ISSUE_TEMPLATE/
├── clases/                 # Lógica de negocio y modelos
├── configuracion/          # Archivos de configuración (configproducts.php excluido por .gitignore)
├── css/                    # Hojas de estilo
├── database/               # Scripts SQL de base de datos
├── js/                     # JavaScript del frontend
├── phpmailer/              # Librería para envío de correos
├── Recursos/               # Imágenes y assets estáticos
├── .gitignore              # Archivos excluidos del control de versiones
├── .env.example            # Plantilla de variables de entorno
├── Index.php               # Página principal
├── productos.php           # Catálogo de productos
├── detalles.php            # Detalle de producto
├── carrito / checkout      # Carrito y proceso de pago
├── pago.php                # Pasarela de pago
├── completado.php          # Confirmación de compra
├── contacto.php            # Formulario de contacto
├── somos.php               # Información de la empresa
├── proveedores.php         # Gestión de proveedores
└── README.md               # Este archivo
```

## Instalación rápida

1. Clona el repositorio dentro de `htdocs` de XAMPP:
   ```bash
   git clone https://github.com/Matthew-Garay/Directo-a-Obra.git
   ```
2. Copia `.env.example` a `.env` y configura tus credenciales:
   ```bash
   cp .env.example .env
   ```
3. Importa `database/directoaobra.sql` en phpMyAdmin.
4. Configura `configuracion/configproducts.php` con tus claves de pago (archivo excluido del repositorio por seguridad).
5. Inicia Apache y MySQL desde XAMPP.
6. Accede a `http://localhost/Directo%20a%20Obra/Index.php`.

---

## Contacto

<p align="center">
  <a href="mailto:1911.garay.perez@gmail.com"><img src="https://img.shields.io/badge/Email-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Email"/></a>
  <a href="https://www.linkedin.com/in/matthewgarayperez/"><img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white" alt="LinkedIn"/></a>
</p>

<p align="center">Desarrollado por Matthew Ilveneff Garay Pérez</p>
