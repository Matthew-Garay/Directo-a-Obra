<?php
require 'configuracion/configproducts.php';
require 'configuracion/database.php';

//session_destroy();
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>¿Quiénes Somos? - Directo a Obra</title>
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/script.js"></script>
    <style>
        .highlight-text {
            position: relative;
            display: inline-block;
        }

        .highlight-text::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: rgba(249, 215, 28, 0.7);
            z-index: -1;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-white sticky top-0 z-50 border-b shadow-sm">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">

            <!-- Logo -->
            <a href="Index.php" class="flex items-center flex-shrink-0">
                <img src="Recursos/logo1.png" alt="Logo" class="h-10" />
            </a>

            <!-- Navegación (pantallas grandes) -->
            <nav class="hidden md:flex justify-center flex-1">
                <ul class="flex space-x-6 text-center">
                    <li><a href="Index.php" class="text-gray-500 hover:text-blue-600 transition-colors">Inicio</a></li>
                    <li><a href="somos.php" class="text-gray-500 hover:text-blue-600 transition-colors">Quienes Somos</a></li>
                    <li><a href="productos.php" class="text-gray-500 hover:text-blue-600 transition-colors">Productos</a></li>
                    <li><a href="proveedores.php" class="text-gray-500 hover:text-blue-600 transition-colors">Proveedores</a></li>
                    <li><a href="contacto.php" class="text-gray-500 hover:text-blue-600 transition-colors">Contacto</a></li>
                </ul>
            </nav>

            <!-- Carrito -->
            <div class="relative flex items-center space-x-4 md:ml-4">
                <!-- Botón Hamburguesa (solo en móviles) -->
                <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Ícono del carrito -->
                <a href="checkout.php"
                    class="bg-white-600 text-white px-2 py-2 rounded-lg hover:bg-blue-700 flex items-center transition-colors relative">
                    <img src="Recursos/carrito.png" alt="Carrito"
                        class="w-7 h-7 md:w-8 md:h-8 object-contain" />
                    <span id="num_cart"
                        class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full shadow-lg">
                        <?php echo $num_cart ?>
                    </span>
                </a>
            </div>
        </div>

        <!-- Menú Móvil -->
        <nav id="menu" class="hidden md:hidden bg-white w-full px-4 pb-4">
            <ul class="flex flex-col space-y-2 items-center text-center mt-2">
                <li><a href="Index.php" class="text-gray-500 hover:text-blue-600 transition-colors">Inicio</a></li>
                <li><a href="somos.php" class="text-gray-500 hover:text-blue-600 transition-colors">Quienes Somos</a></li>
                <li><a href="productos.php" class="text-gray-500 hover:text-blue-600 transition-colors">Productos</a></li>
                <li><a href="proveedores.php" class="text-gray-500 hover:text-blue-600 transition-colors">Proveedores</a></li>
                <li><a href="contacto.php" class="text-gray-500 hover:text-blue-600 transition-colors">Contacto</a></li>
            </ul>
        </nav>
    </header>


    <main class="flex-grow py-12 px-4">
        <!-- Hero Section -->
        <div class="px-8 md:px-20 lg:px-40 py-12 text-center bg-gray-100 rounded-xl shadow-lg mb-10">
            <div class="relative z-10">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Conoce más sobre <br>
                    <span class="highlight-text text-gray-900">Directo a Obra</span>
                </h1>
                <p class="mt-6 text-gray-700 text-base md:text-lg leading-relaxed">
                    Más de 30 años de experiencia en el sector de materiales para construcción<br class="hidden md:block">
                    con un compromiso constante por la calidad y el servicio al cliente.
                </p>
            </div>
        </div>

        <!-- Sección Quiénes Somos -->
        <section class="bg-white py-10 px-4 rounded-xl shadow-lg mb-10">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-start gap-12">

                <!-- Texto a la izquierda -->
                <div class="w-full lg:w-1/2 text-sm leading-relaxed text-gray-700">
                    <h2 class="text-2xl font-bold text-center mb-6 relative">
                        <span class="relative z-10">¿Quiénes Somos?</span>
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-blue-600"></span>
                    </h2>

                    <p class="mb-3"><strong>Directo a Obra</strong> es una casa de materiales con más de 30 años de experiencia, fundada en 1987 en Azcapotzalco. Nos especializamos en ofrecer una amplia gama de productos y servicios para proyectos de construcción y remodelación en la Ciudad de México y Área Metropolitana.</p>
                    <p class="mb-3">Desde nuestros inicios, hemos trabajado para ser un aliado confiable para familias, constructores y profesionales del sector, brindando materiales de alta calidad, precios competitivos y un servicio de entrega eficiente.</p>

                    <h3 class="text-xl font-semibold mt-5 mb-1">🎯 Misión</h3>
                    <p class="mb-3">Facilitar el acceso a materiales de construcción de calidad, ofreciendo soluciones integrales que acompañen a nuestros clientes en cada etapa de su proyecto, desde la planificación hasta la ejecución.</p>

                    <h3 class="text-xl font-semibold mt-5 mb-1">🌟 Visión</h3>
                    <p class="mb-3">Convertirnos en la casa de materiales preferida por nuestros clientes, reconocida por nuestra confiabilidad, variedad de productos y compromiso con la satisfacción del cliente.</p>

                    <h3 class="text-xl font-semibold mt-5 mb-1">🤝 Valores</h3>
                    <ul class="list-disc list-inside mb-3 space-y-1">
                        <li><strong>Compromiso:</strong> Cumplimos con nuestros acuerdos y plazos, garantizando la entrega oportuna de los materiales.</li>
                        <li><strong>Eficiencia:</strong> Optimizamos nuestros procesos para ofrecer un servicio ágil y de calidad.</li>
                        <li><strong>Excelencia:</strong> Buscamos la mejora continua en todos nuestros aspectos operativos.</li>
                        <li><strong>Respeto:</strong> Tratamos a nuestros clientes y colaboradores con cortesía y consideración.</li>
                        <li><strong>Reconocimiento:</strong> Valoramos y agradecemos la confianza de nuestros clientes y socios.</li>
                        <li><strong>Empatía:</strong> Nos ponemos en el lugar de nuestros clientes para entender y satisfacer sus necesidades.</li>
                    </ul>

                    <h3 class="text-xl font-semibold mt-5 mb-1">🏢 Infraestructura</h3>
                    <p class="mb-3">Contamos con almacenes estratégicamente ubicados que nos permiten mantener un inventario amplio y variado de materiales, garantizando disponibilidad y entregas rápidas. Nuestra infraestructura está equipada para manejar grandes volúmenes, asegurando que tu pedido esté listo y llegue en tiempo y forma.</p>
                    <p class="mb-3">Además, revisamos continuamente nuestros procesos logísticos para optimizar entregas y brindar un servicio eficiente y confiable.</p>

                    <h3 class="text-xl font-semibold mt-5 mb-1">🛡️ Certificaciones y Garantías</h3>
                    <p>En Directo a Obra, trabajamos con proveedores certificados y garantizamos la calidad de cada producto que vendemos. Contamos con políticas estrictas de control y seguimiento para asegurar que cada pedido llegue en las condiciones acordadas.</p>
                    <p class="mt-2">Nuestra experiencia y trayectoria respaldan el cumplimiento de estos estándares, generando confianza y tranquilidad para ti.</p>
                </div>



                <!-- Imágenes a la derecha -->
                <div class="w-full lg:w-1/2 flex flex-col items-center gap-6">
                    <div style="height: 30px;"></div>
                    <img src="Recursos/directo.png" alt="Imagen institucional" class="rounded shadow-md w-1/2 h-auto card-hover">
                    <img src="Recursos/construccion.jpg" alt="Construcción" class="rounded shadow-md w-1/2 h-auto card-hover">
                    <img src="Recursos/transporte.jpg" alt="Transporte" class="rounded shadow-md w-1/2 h-auto card-hover">
                    <img src="Recursos/banner-construccion.webp" alt="Transporte" class="rounded shadow-md w-1/2 h-auto card-hover">
                    <img src="Recursos/1765.jpg" alt="Transporte" class="rounded shadow-md w-1/2 h-auto card-hover">

                </div>
            </div>
            <div style="height: 50px;"></div>
        </section>

        <!-- Sección de Logros -->
        <section class="bg-white py-10 px-4 border-t border-gray-200">
            <h2 class="text-3xl font-bold text-center mb-12 relative">
                <span class="relative z-10">Nuestros Logros</span>
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
            </h2>

            <div class="max-w-7xl mx-auto grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8 text-center text-sm">
                <!-- Logro 1 -->
                <div class="flex flex-col items-center card-hover bg-gray-50 p-4 rounded-lg">
                    <img src="Recursos/Creacion.png" alt="Creada en 2001" class="mb-2 w-10 h-10">
                    <p class="font-medium text-gray-800">Creada en 1987</p>
                </div>

                <!-- Logro 2 -->
                <div class="flex flex-col items-center card-hover bg-gray-50 p-4 rounded-lg">
                    <img src="Recursos/experiencia.png" alt="Más de 20 años" class="mb-2 w-10 h-10">
                    <p class="font-medium text-gray-800">Más de 30 años de experiencia</p>
                </div>

                <!-- Logro 3 -->
                <div class="flex flex-col items-center card-hover bg-gray-50 p-4 rounded-lg">
                    <img src="Recursos/linea.png" alt="Tiendas en línea" class="mb-2 w-10 h-10">
                    <p class="font-medium text-gray-800 text-sm leading-snug">+1,300 tiendas con venta en línea</p>
                </div>

                <!-- Logro 4 -->
                <div class="flex flex-col items-center card-hover bg-gray-50 p-4 rounded-lg">
                    <img src="Recursos/Internacional.png" alt="Internacional" class="mb-2 w-10 h-10">
                    <p class="font-medium text-gray-800 text-sm leading-snug">
                        Próximamente<br>
                        <span class="font-bold">Presencia en 2 países</span>
                    </p>
                </div>

                <!-- Logro 5 -->
                <div class="flex flex-col items-center card-hover bg-gray-50 p-4 rounded-lg">
                    <img src="Recursos/cemento.png" alt="Cemento" class="mb-2 w-10 h-10">
                    <p class="font-medium text-gray-800 text-sm leading-snug">
                        1 de cada 7 sacos de cemento<br>
                        en México se vende gracias a<br>
                        <strong>Directo a Obra</strong>
                    </p>
                </div>
            </div>
        </section>

        <!-- Llamado a la acción -->
        <div class="px-8 md:px-20 lg:px-40 py-16 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                ¿Necesitas materiales para tu proyecto?
            </h2>
            <p class="mt-6 text-gray-600 text-base md:text-lg leading-relaxed">
                Explora nuestro catálogo completo de productos o contáctanos<br class="hidden md:block">
                para recibir asesoría personalizada para tu proyecto.
            </p>
            <div class="mt-10 flex flex-wrap gap-4 justify-center">
                <a href="productos.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                    🛒 Ver catálogo completo
                </a>
                <a href="contacto.php" class="bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                    📞 Contactar ahora
                </a>
            </div>
        </div>
        <div style="height: 70px;"></div>
    </main>

    <footer class="bg-gray-900 text-white text-sm">
        <div class="p-8 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-5">

            <!-- Enlaces rápidos -->
            <div>
                <h2 class="text-lg font-semibold uppercase">Enlaces Rápidos</h2>
                <ul class="text-gray-400 mt-2 space-y-2">
                    <li><a href="somos.php" class="hover:text-white"> 🏢 Quienes Somos</a></li>
                    <li><a href="productos.php" class="hover:text-white"> 🧱 Productos</a></li>
                    <li><a href="proveedores.php" class="hover:text-white"> 🤝 Proveedores</a></li>
                    <li><a href="contacto.php" class="hover:text-white"> 📞 Contacto</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div>
                <h2 class="text-lg font-semibold uppercase">Contacto</h2>
                <ul class="text-gray-400 mt-2 space-y-1">
                    <li>📧 202210036@tesco.edu.mx</li>
                    <li>📧 202210037@tesco.edu.mx</li>
                    <li>📧 202210080@tesco.edu.mx</li>
                    <li>📲 55-6880-0778</li>
                </ul>
            </div>

            <!-- Redes Sociales -->
            <div class="md:pl-4">
                <h2 class="text-lg font-semibold uppercase">Redes Sociales</h2>
                <ul class="text-gray-400 mt-2 space-y-2">
                    <li class="flex items-center space-x-2">
                        <img src="Recursos/redes sociales/face.png" class="w-5 h-5 object-contain filter invert" alt="Facebook">
                        <a href="https://www.facebook.com/DirectoaObraS.A" target="_blank" class="hover:text-white">Facebook</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="Recursos/redes sociales/insta.png" class="w-5 h-5 object-contain filter invert" alt="Instagram">
                        <a href="https://instagram.com/directoaobra" target="_blank" class="hover:text-white">Instagram</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="Recursos/redes sociales/tk.png" class="w-5 h-5 object-contain filter invert" alt="TikTok">
                        <a href="https://tiktok.com/@directoaobra" target="_blank" class="hover:text-white">TikTok</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="Recursos/redes sociales/x.png" class="w-5 h-5 object-contain filter invert" alt="X">
                        <a href="https://x.com/@directoaobra" target="_blank" class="hover:text-white">X</a>
                    </li>
                </ul>
            </div>

            <!-- Ubicación -->
            <div>
                <h2 class="text-lg font-semibold uppercase mb-2">Ubicación</h2>
                <div class="flex flex-col gap-1 text-neutral-400">
                    <h3 class="text-white font-semibold text-xs">📍 Central Tecamac</h3>
                    <p>Los Heroes Tecamac, Estado de México</p>
                    <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                    <p>Sábados: 9:00 AM - 2:00 PM</p>
                    <div style="height: 8px;"></div>
                    <iframe class="w-full h-24 rounded mt-1" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4950.815973800464!2d-99.03550258664596!3d19.63019227865338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1743840557887!5m2!1ses-419!2smx"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Footer base reducido y centrado -->
        <div class="bg-gray-800 flex flex-col items-center justify-center px-5 py-2 text-xs text-gray-400 space-y-2">
            <p class="text-center w-full">© 2025 Directo a Obra, S.A.B. DE C.V. Todos los derechos reservados.</p>
            <img src="Recursos/logo3.png" alt="Directo a Obra" class="h-8">
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script>
        //Menu Hamburguesa
        const toggleBtn = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>