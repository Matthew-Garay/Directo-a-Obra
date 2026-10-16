<?php
require 'configuracion/configproducts.php';
require 'configuracion/database.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon">
    <title>Contacto - Directo a Obra</title>
    <style>
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #4B5563;
        }

        .input-with-icon {
            padding-left: 40px !important;
        }

        .form-card {
            transition: all 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-5px);
        }

        .contact-header {
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
            position: relative;
            overflow: hidden;
        }

        .contact-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTAgMCBMNTAgNTAgTDEwMCAwIEwxMDAgMTAwIEwwIDEwMCBaIiBmaWxsPSJyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDUpIi8+Cjwvc3ZnPg==');
            opacity: 0.1;
        }

        .contact-info-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .contact-info-card:hover {
            border-left-color: #2563EB;
            transform: translateX(5px);
        }

        .bg-pattern {
            background-color: #f9fafb;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23e5e7eb' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .btn-submit {
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #1E40AF 0%, #1E3A8A 100%);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        /* Mejoras de interacción para el formulario */
        .form-input:focus {
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.15) !important;
        }

        .form-input:hover {
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
        }

        /* Animación de éxito para el botón */
        @keyframes success {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .success-animation {
            animation: success 0.6s ease-in-out;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%) !important;
        }

        /* Efecto de pulso mejorado */
        @keyframes pulse-blue {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.7);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(37, 99, 235, 0);
            }
        }

        button[type="submit"]:hover {
            animation: pulse-blue 2s infinite;
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


    <main class="flex-grow">
        <div style="height: 30px;"></div>
        <div class="container mx-auto px-2 sm:px-4 py-2 sm:py-3">
            <!-- Breadcrumb (migas de pan) -->
            <nav class="flex mb-3 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="Index.php" class="text-gray-600 hover:text-blue-600 inline-flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500 ml-1 md:ml-2 font-medium">Contacto</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div style="height: 15px;"></div>

        <!-- Información de Contacto Rápida -->
        <div class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12 relative">
                    <span class="relative z-10">Contáctanos Directamente</span>
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Teléfono -->
                    <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg card-hover text-center">
                        <div class="bg-green-50 rounded-full w-20 h-20 flex items-center justify-center mb-6 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Llámanos</h3>
                        <p class="text-gray-600 mb-4">Habla directamente con nuestros asesores</p>
                        <a href="tel:5568800778" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            📞 55-6880-0778
                        </a>
                    </div>

                    <!-- Email -->
                    <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg card-hover text-center">
                        <div class="bg-blue-50 rounded-full w-20 h-20 flex items-center justify-center mb-6 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Escríbenos</h3>
                        <p class="text-gray-600 mb-4">Envíanos un correo con tu consulta</p>
                        <a href="mailto:202210036@tesco.edu.mx" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            📧 Enviar Email
                        </a>
                    </div>

                    <!-- Ubicación -->
                    <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg card-hover text-center">
                        <div class="bg-orange-50 rounded-full w-20 h-20 flex items-center justify-center mb-6 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Visítanos</h3>
                        <p class="text-gray-600 mb-4">Los Héroes Tecámac, Estado de México</p>
                        <a href="https://www.google.com/maps?q=19.63019227865338,-99.03550258664596" target="_blank" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            📍 Ver Mapa
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario de Contacto Mejorado -->
        <div class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 max-w-4xl">
                <h2 class="text-3xl font-bold text-center mb-4 relative">
                    <span class="relative z-10">Formulario de Contacto</span>
                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
                </h2>
                <p class="text-center text-gray-600 mb-12">Completa el formulario y nos pondremos en contacto contigo lo antes posible</p>

                <form action="https://formsubmit.co/202210036@tesco.edu.mx" method="POST" class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <input type="hidden" name="_cc" value="202210037@tesco.edu.mx,202210080@tesco.edu.mx">

                    <!-- Header del formulario -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-8 text-white text-center">
                        <h3 class="text-2xl font-bold mb-2">💬 ¡Hablemos de tu proyecto!</h3>
                        <p class="opacity-90">Estamos aquí para ayudarte con todos tus materiales de construcción</p>
                    </div>

                    <!-- Contenido del formulario -->
                    <div class="p-8 md:p-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div class="relative">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Nombre Completo *
                                </label>
                                <input name="nombre" required type="text"
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 focus:transform focus:scale-105"
                                    placeholder="Escribe tu nombre completo" />
                            </div>

                            <!-- Teléfono -->
                            <div class="relative">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Teléfono *
                                </label>
                                <input name="telefono" required type="tel"
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 focus:transform focus:scale-105"
                                    placeholder="55-1234-5678" />
                            </div>

                            <!-- Email -->
                            <div class="relative md:col-span-2">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Correo Electrónico *
                                </label>
                                <input name="correo" required type="email"
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 focus:transform focus:scale-105"
                                    placeholder="ejemplo@correo.com" />
                            </div>

                            <!-- Estado -->
                            <div class="relative">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Estado *
                                </label>
                                <select id="estado" name="estado" required onchange="cargarCiudades()"
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 focus:transform focus:scale-105">
                                    <option value="">Selecciona tu estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja california">Baja California</option>
                                    <option value="Baja california sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Ciudad de méxico">Ciudad de México</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Estado de méxico">Estado de México</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo león">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana roo">Quintana Roo</option>
                                    <option value="San luis potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>

                            <!-- Ciudad -->
                            <div class="relative">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Ciudad *
                                </label>
                                <select id="ciudad" name="ciudad" required
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 focus:transform focus:scale-105">
                                    <option value="">Selecciona tu ciudad</option>
                                </select>
                            </div>

                            <!-- Asunto -->
                            <div class="relative md:col-span-2">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Asunto *
                                </label>
                                <select name="asunto" required
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 focus:transform focus:scale-105">
                                    <option value="">¿En qué podemos ayudarte?</option>
                                    <option value="Cotización de productos">💰 Cotización de productos</option>
                                    <option value="Información general">ℹ️ Información general</option>
                                    <option value="Asesoría técnica">🔧 Asesoría técnica</option>
                                    <option value="Sugerencias">💡 Sugerencias</option>
                                    <option value="Quejas">⚠️ Quejas</option>
                                    <option value="Otros">📝 Otros</option>
                                </select>
                            </div>

                            <!-- Mensaje -->
                            <div class="relative md:col-span-2">
                                <label class="block mb-2 font-semibold text-gray-700">
                                    Mensaje *
                                </label>
                                <textarea name="mensaje" required rows="5"
                                    class="form-input w-full border-2 border-gray-300 p-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 hover:border-blue-400 resize-none focus:transform focus:scale-105"
                                    placeholder="Cuéntanos más detalles sobre tu proyecto o consulta..."></textarea>
                            </div>
                        </div>

                        <!-- Botón de envío -->
                        <div class="mt-8 text-center">
                            <button type="submit" id="submitBtn"
                                class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-12 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl hover:scale-105 active:scale-95 mx-auto">
                                📧 Enviar Mensaje
                            </button>
                            <p class="text-sm text-gray-500 mt-4">Te responderemos en menos de 24 horas</p>
                        </div>
                    </div>
                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script>
        //Menu Hamburguesa
        const toggleBtn = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
        //

        const ciudadesPorEstado = {
            "Aguascalientes": ["Aguascalientes", "Asientos", "Calvillo", "Cosio", "El Llano", "Jesus Maria", "Pabellon de Arteaga", "Rincon de Romos", "San Francisco de los Romo", "San Jose de Gracia", "Tepezala"],
            "Baja california": ["Ensenada", "Mexicali", "Playas de Rosarito", "Tecate", "Tijuana"],
            "Baja california Sur": ["Comondu", "La Paz", "Loreto", "Los Cabos", "Mulege"],
            "Campeche": ["Calakmul", "Calkini", "Campeche", "Candelaria", "Carmen", "Champoton", "Escarcega", "Hecelchakan", "Hopelchen", "Palizada", "Tenabo"],
            "Coahuila": ["Abasolo", "Acuna", "Allende", "Arteaga", "Candela", "Castanos", "Cuatro Cienegas", "Escobedo", "Francisco I. Madero", "Frontera", "General Cepeda", "Guerrero", "Hidalgo", "Jimenez", "Juarez", "Lamadrid", "Matamoros", "Monclova", "Morelos", "Muzquiz", "Nadadores", "Nava", "Ocampo", "Parras", "Piedras Negras", "Progreso", "Ramos Arizpe", "Sabinas", "Sacramento", "Saltillo", "San Buenaventura", "San Juan de Sabinas", "San Pedro", "Sierra Mojada", "Torreon", "Viesca", "Villa Union", "Zaragoza"],
            "Colima": ["Armeria", "Colima", "Comala", "Coquimatlan", "Cuauhtemoc", "Ixtlahuacan", "Manzanillo", "Minatitlan", "Tecoman", "Villa de Alvarez"],
            "Chiapas": ["Acacoyagua", "Acala", "Acapetahua", "Aldama", "Altamirano", "Amatenango de la Frontera", "Amatenango del Valle", "Amatan", "Angel Albino Corzo", "Arriaga", "Bejucal de Ocampo", "Bella Vista", "Benemerito de las Americas", "Berriozabal", "Bochil", "Cacahoatan", "Capitan Luis Angel Vidal", "Catazaja", "Chalchihuitan", "Chamula", "Chanal", "Chapultenango", "Chenalho", "Chiapa de Corzo", "Chiapilla", "Chicoasen", "Chicomuselo", "Chilon", "Cintalapa", "Coapilla", "Comitan de Dominguez", "Copainala", "El Bosque", "El Parral", "El Porvenir", "Emiliano Zapata", "Escuintla", "Francisco Leon", "Frontera Comalapa", "Frontera Hidalgo", "Huehuetan", "Huitiupan", "Huixtla", "Huixtan", "Ixhuatan", "Ixtacomitan", "Ixtapa", "Ixtapangajoya", "Jiquipilas", "Jitotol", "Juarez", "La Concordia", "La Grandeza", "La Independencia", "La Libertad", "La Trinitaria", "Larrainzar", "Las Margaritas", "Las Rosas", "Mapastepec", "Maravilla Tenejapa", "Marques de Comillas", "Mazapa de Madero", "Mazatan", "Metapa", "Mezcalapa", "Mitontic", "Montecristo de Guerrero", "Motozintla", "Nicolas Ruiz", "Ocosingo", "Ocotepec", "Ocozocoautla de Espinosa", "Ostuacan", "Osumacinta", "Oxchuc", "Palenque", "Pantelho", "Pantepec", "Pichucalco", "Pijijiapan", "Pueblo Nuevo Solistahuacan", "Rayon", "Reforma", "Rincon Chamula San Pedro", "Sabanilla", "Salto de Agua", "San Andres Duraznal", "San Cristobal de las Casas", "San Fernando", "San Juan Cancuc", "San Lucas", "Santiago el Pinar", "Siltepec", "Simojovel", "Sitala", "Socoltenango", "Solosuchiapa", "Soyalo", "Suchiapa", "Suchiate", "Sunuapa", "Tapachula", "Tapalapa", "Tapilula", "Tecpatan", "Tenejapa", "Teopisca", "Tila", "Tonala", "Totolapa", "Tumbala", "Tuxtla Chico", "Tuxtla Gutierrez", "Tuzantan", "Tzimol", "Union Juarez", "Venustiano Carranza", "Villa Comaltitlan", "Villa Corzo", "Villaflores", "Yajalon", "Zinacantan"],
            "Chihuahua": ["Ahumada", "Aldama", "Allende", "Aquiles Serdan", "Ascension", "Bachiniva", "Balleza", "Batopilas de Manuel Gomez Morin", "Bocoyna", "Buenaventura", "Camargo", "Carichi", "Casas Grandes", "Chihuahua", "Chinipas", "Coronado", "Coyame del Sotol", "Cuauhtemoc", "Cusihuiriachi", "Delicias", "Dr. Belisario Dominguez", "El Tule", "Galeana", "Gran Morelos", "Guachochi", "Guadalupe y Calvo", "Guadalupe", "Guazapares", "Guerrero", "Gomez Farias", "Hidalgo del Parral", "Huejotitan", "Ignacio Zaragoza", "Janos", "Jimenez", "Julimes", "Juarez", "La Cruz", "Lopez", "Madera", "Maguarichi", "Manuel Benavides", "Matachi", "Matamoros", "Meoqui", "Morelos", "Moris", "Namiquipa", "Nonoava", "Nuevo Casas Grandes", "Ocampo", "Ojinaga", "Praxedis G. Guerrero", "Riva Palacio", "Rosales", "Rosario", "San Francisco de Borja", "San Francisco de Conchos", "San Francisco del Oro", "Santa Barbara", "Santa Isabel", "Satevo", "Saucillo", "Temosachic", "Urique", "Uruachi", "Valle de Zaragoza"],
            "Ciudad de méxico": ["Alvaro Obregon", "Azcapotzalco", "Benito Juarez", "Coyoacan", "Cuajimalpa de Morelos", "Cuauhtemoc", "Gustavo A. Madero", "Iztacalco", "Iztapalapa", "La Magdalena Contreras", "Miguel Hidalgo", "Milpa Alta", "Tlalpan", "Tlahuac", "Venustiano Carranza", "Xochimilco"],
            "Durango": ["Canatlan", "Canelas", "Coneto de Comonfort", "Cuencame", "Durango", "El Oro", "General Simon Bolivar", "Gomez Palacio", "Guadalupe Victoria", "Guanacevi", "Hidalgo", "Inde", "Lerdo", "Mapimi", "Mezquital", "Nazas", "Nombre de Dios", "Nuevo Ideal", "Ocampo", "Otaez", "Panuco de Coronado", "Penon Blanco", "Poanas", "Pueblo Nuevo", "Rodeo", "San Bernardo", "San Dimas", "San Juan de Guadalupe", "San Juan del Rio", "San Luis del Cordero", "San Pedro del Gallo", "Santa Clara", "Santiago Papasquiaro", "Suchil", "Tamazula", "Tepehuanes", "Tlahualilo", "Topia", "Vicente Guerrero"],
            "Guanajuato": ["Abasolo", "Acambaro", "Apaseo el Alto", "Apaseo el Grande", "Atarjea", "Celaya", "Comonfort", "Coroneo", "Cortazar", "Cueramaro", "Doctor Mora", "Dolores Hidalgo Cuna de la Independencia Nacional", "Guanajuato", "Huanimaro", "Irapuato", "Jaral del Progreso", "Jerecuaro", "Leon", "Manuel Doblado", "Moroleon", "Ocampo", "Penjamo", "Pueblo Nuevo", "Purisima del Rincon", "Romita", "Salamanca", "Salvatierra", "San Diego de la Union", "San Felipe", "San Francisco del Rincon", "San Jose Iturbide", "San Luis de la Paz", "San Miguel de Allende", "Santa Catarina", "Santa Cruz de Juventino Rosas", "Santiago Maravatio", "Silao de la Victoria", "Tarandacuao", "Tarimoro", "Tierra Blanca", "Uriangato", "Valle de Santiago", "Victoria", "Villagran", "Xichu", "Yuriria"],
            "Guerrero": ["Acapulco de Juarez", "Acatepec", "Ahuacuotzingo", "Ajuchitlan del Progreso", "Alcozauca de Guerrero", "Alpoyeca", "Apaxtla", "Arcelia", "Atenango del Rio", "Atlamajalcingo del Monte", "Atlixtac", "Atoyac de Alvarez", "Ayutla de los Libres", "Azoyu", "Benito Juarez", "Buenavista de Cuellar", "Chilapa de Alvarez", "Chilpancingo de los Bravo", "Coahuayutla de Jose Maria Izazaga", "Cochoapa el Grande", "Cocula", "Copala", "Copalillo", "Copanatoyac", "Coyuca de Benitez", "Coyuca de Catalan", "Cuajinicuilapa", "Cualac", "Cuautepec", "Cuetzala del Progreso", "Cutzamala de Pinzon", "Eduardo Neri", "Florencio Villarreal", "General Canuto A. Neri", "General Heliodoro Castillo", "Huamuxtitlan", "Huitzuco de los Figueroa", "Iguala de la Independencia", "Igualapa", "Iliatenco", "Ixcateopan de Cuauhtemoc", "Jose Joaquin de Herrera", "Juan R. Escudero", "Juchitan", "La Union de Isidoro Montes de Oca", "Leonardo Bravo", "Malinaltepec", "Marquelia", "Martir de Cuilapan", "Metlatonoc", "Mochitlan", "Olinala", "Ometepec", "Pedro Ascencio Alquisiras", "Petatlan", "Pilcaya", "Pungarabato", "Quechultenango", "San Luis Acatlan", "San Marcos", "San Miguel Totolapan", "Taxco de Alarcon", "Tecoanapa", "Tecpan de Galeana", "Teloloapan", "Tepecoacuilco de Trujano", "Tetipac", "Tixtla de Guerrero", "Tlacoachistlahuaca", "Tlacoapa", "Tlalchapa", "Tlalixtaquilla de Maldonado", "Tlapa de Comonfort", "Tlapehuala", "Xalpatlahuac", "Xochihuehuetlan", "Xochistlahuaca", "Zapotitlan Tablas", "Zihuatanejo de Azueta", "Zirandaro", "Zitlala"],
            "Hidalgo": ["Acatlan", "Acaxochitlan", "Actopan", "Agua Blanca de Iturbide", "Ajacuba", "Alfajayucan", "Almoloya", "Apan", "Atitalaquia", "Atlapexco", "Atotonilco de Tula", "Atotonilco el Grande", "Calnali", "Cardonal", "Chapantongo", "Chapulhuacan", "Chilcuautla", "Cuautepec de Hinojosa", "El Arenal", "Eloxochitlan", "Emiliano Zapata", "Epazoyucan", "Francisco I. Madero", "Huasca de Ocampo", "Huautla", "Huazalingo", "Huehuetla", "Huejutla de Reyes", "Huichapan", "Ixmiquilpan", "Jacala de Ledezma", "Jaltocan", "Juarez Hidalgo", "La Mision", "Lolotla", "Metepec", "Metztitlan", "Mineral de la Reforma", "Mineral del Chico", "Mineral del Monte", "Mixquiahuala de Juarez", "Molango de Escamilla", "Nicolas Flores", "Nopala de Villagran", "Omitlan de Juarez", "Pachuca de Soto", "Pacula", "Pisaflores", "Progreso de Obregon", "San Agustin Metzquititlan", "San Agustin Tlaxiaca", "San Bartolo Tutotepec", "San Felipe Orizatlan", "San Salvador", "Santiago Tulantepec de Lugo Guerrero", "Santiago de Anaya", "Singuilucan", "Tasquillo", "Tecozautla", "Tenango de Doria", "Tepeapulco", "Tepehuacan de Guerrero", "Tepeji del Rio de Ocampo", "Tepetitlan", "Tetepango", "Tezontepec de Aldama", "Tianguistengo", "Tizayuca", "Tlahuelilpan", "Tlahuiltepa", "Tlanalapa", "Tlanchinol", "Tlaxcoapan", "Tolcayuca", "Tula de Allende", "Tulancingo de Bravo", "Villa de Tezontepec", "Xochiatipan", "Xochicoatlan", "Yahualica", "Zacualtipan de Angeles", "Zapotlan de Juarez", "Zempoala", "Zimapan"],
            "Jalisco": ["Acatic", "Acatlan de Juarez", "Ahualulco de Mercado", "Amacueca", "Amatitan", "Ameca", "Arandas", "Atemajac de Brizuela", "Atengo", "Atenguillo", "Atotonilco el Alto", "Atoyac", "Autlan de Navarro", "Ayotlan", "Ayutla", "Bolanos", "Cabo Corrientes", "Canadas de Obregon", "Casimiro Castillo", "Chapala", "Chimaltitan", "Chiquilistlan", "Cihuatlan", "Cocula", "Colotlan", "Concepcion de Buenos Aires", "Cuautitlan de Garcia Barragan", "Cuautla", "Cuquio", "Degollado", "Ejutla", "El Arenal", "El Grullo", "El Limon", "El Salto", "Encarnacion de Diaz", "Etzatlan", "Gomez Farias", "Guachinango", "Guadalajara", "Hostotipaquillo", "Huejucar", "Huejuquilla el Alto", "Ixtlahuacan de los Membrillos", "Ixtlahuacan del Rio", "Jalostotitlan", "Jamay", "Jesus Maria", "Jilotlan de los Dolores", "Jocotepec", "Juanacatlan", "Juchitlan", "La Barca", "La Huerta", "La Manzanilla de la Paz", "Lagos de Moreno", "Magdalena", "Mascota", "Mazamitla", "Mexticacan", "Mezquitic", "Mixtlan", "Ocotlan", "Ojuelos de Jalisco", "Pihuamo", "Poncitlan", "Puerto Vallarta", "Quitupan", "San Cristobal de la Barranca", "San Diego de Alejandria", "San Gabriel", "San Ignacio Cerro Gordo", "San Juan de los Lagos", "San Juanito de Escobedo", "San Julian", "San Marcos", "San Martin Hidalgo", "San Martin de Bolanos", "San Miguel el Alto", "San Pedro Tlaquepaque", "San Sebastian del Oeste", "Santa Maria de los Angeles", "Santa Maria del Oro", "Sayula", "Tala", "Talpa de Allende", "Tamazula de Gordiano", "Tapalpa", "Tecalitlan", "Techaluta de Montenegro", "Tecolotlan", "Tenamaxtlan", "Teocaltiche", "Teocuitatlan de Corona", "Tepatitlan de Morelos", "Tequila", "Teuchitlan", "Tizapan el Alto", "Tlajomulco de Zuniga", "Toliman", "Tomatlan", "Tonala", "Tonaya", "Tonila", "Totatiche", "Tototlan", "Tuxcacuesco", "Tuxcueca", "Tuxpan", "Union de San Antonio", "Union de Tula", "Valle de Guadalupe", "Valle de Juarez", "Villa Corona", "Villa Guerrero", "Villa Hidalgo", "Villa Purificacion", "Yahualica de Gonzalez Gallo", "Zacoalco de Torres", "Zapopan", "Zapotiltic", "Zapotitlan de Vadillo", "Zapotlan del Rey", "Zapotlan el Grande", "Zapotlanejo"],
            "Estado de méxico": ["Acambay de Ruiz Castaneda", "Acolman", "Aculco", "Almoloya de Alquisiras", "Almoloya de Juarez", "Almoloya del Rio", "Amanalco", "Amatepec", "Amecameca", "Apaxco", "Atenco", "Atizapan de Zaragoza", "Atizapan", "Atlacomulco", "Atlautla", "Axapusco", "Ayapango", "Calimaya", "Capulhuac", "Chalco", "Chapa de Mota", "Chapultepec", "Chiautla", "Chicoloapan", "Chiconcuac", "Chimalhuacan", "Coacalco de Berriozabal", "Coatepec Harinas", "Cocotitlan", "Coyotepec", "Cuautitlan Izcalli", "Cuautitlan", "Donato Guerra", "Ecatepec de Morelos", "Ecatzingo", "El Oro", "Huehuetoca", "Hueypoxtla", "Huixquilucan", "Isidro Fabela", "Ixtapaluca", "Ixtapan de la Sal", "Ixtapan del Oro", "Ixtlahuaca", "Jaltenco", "Jilotepec", "Jilotzingo", "Jiquipilco", "Jocotitlan", "Joquicingo", "Juchitepec", "La Paz", "Lerma", "Luvianos", "Malinalco", "Melchor Ocampo", "Metepec", "Mexicaltzingo", "Morelos", "Naucalpan de Juarez", "Nextlalpan", "Nezahualcoyotl", "Nicolas Romero", "Nopaltepec", "Ocoyoacac", "Ocuilan", "Otumba", "Otzoloapan", "Otzolotepec", "Ozumba", "Papalotla", "Polotitlan", "Rayon", "San Antonio la Isla", "San Felipe del Progreso", "San Jose del Rincon", "San Martin de las Piramides", "San Mateo Atenco", "San Simon de Guerrero", "Santo Tomas", "Soyaniquilpan de Juarez", "Sultepec", "Tecamac", "Tejupilco", "Temamatla", "Temascalapa", "Temascalcingo", "Temascaltepec", "Temoaya", "Tenancingo", "Tenango del Aire", "Tenango del Valle", "Teoloyucan", "Teotihuacan", "Tepetlaoxtoc", "Tepetlixpa", "Tepotzotlan", "Tequixquiac", "Texcaltitlan", "Texcalyacac", "Texcoco", "Tezoyuca", "Tianguistenco", "Timilpan", "Tlalmanalco", "Tlalnepantla de Baz", "Tlatlaya", "Toluca", "Tonanitla", "Tonatico", "Tultepec", "Tultitlan", "Valle de Bravo", "Valle de Chalco Solidaridad", "Villa Guerrero", "Villa Victoria", "Villa de Allende", "Villa del Carbon", "Xalatlaco", "Xonacatlan", "Zacazonapan", "Zacualpan", "Zinacantepec", "Zumpahuacan", "Zumpango"],
            "Michoacan": ["Acuitzio", "Aguililla", "Alvaro Obregon", "Angamacutiro", "Angangueo", "Apatzingan", "Aporo", "Aquila", "Ario", "Arteaga", "Brisenas", "Buenavista", "Caracuaro", "Charapan", "Charo", "Chavinda", "Cheran", "Chilchota", "Chinicuila", "Chucandiro", "Churintzio", "Churumuco", "Coahuayana", "Coalcoman de Vazquez Pallares", "Coeneo", "Cojumatlan de Regules", "Contepec", "Copandaro", "Cotija", "Cuitzeo", "Ecuandureo", "Epitacio Huerta", "Erongaricuaro", "Gabriel Zamora", "Hidalgo", "Huandacareo", "Huaniqueo", "Huetamo", "Huiramba", "Indaparapeo", "Irimbo", "Ixtlan", "Jacona", "Jimenez", "Jiquilpan", "Jose Sixto Verduzco", "Juarez", "Jungapeo", "La Huacana", "La Piedad", "Lagunillas", "Lazaro Cardenas", "Los Reyes", "Madero", "Maravatio", "Marcos Castellanos", "Morelia", "Morelos", "Mugica", "Nahuatzen", "Nocupetaro", "Nuevo Parangaricutiro", "Nuevo Urecho", "Numaran", "Ocampo", "Pajacuaran", "Panindicuaro", "Paracho", "Paracuaro", "Patzcuaro", "Penjamillo", "Periban", "Purepero", "Puruandiro", "Querendaro", "Quiroga", "Sahuayo", "Salvador Escalante", "San Lucas", "Santa Ana Maya", "Senguio", "Susupuato", "Tacambaro", "Tancitaro", "Tangamandapio", "Tangancicuaro", "Tanhuato", "Taretan", "Tarimbaro", "Tepalcatepec", "Tingambato", "Tinguindin", "Tiquicheo de Nicolas Romero", "Tlalpujahua", "Tlazazalca", "Tocumbo", "Tumbiscatio", "Turicato", "Tuxpan", "Tuzantla", "Tzintzuntzan", "Tzitzio", "Uruapan", "Venustiano Carranza", "Villamar", "Vista Hermosa", "Yurecuaro", "Zacapu", "Zamora", "Zinaparo", "Zinapecuaro", "Ziracuaretiro", "Zitacuaro"],
            "Morelos": ["Amacuzac", "Atlatlahucan", "Axochiapan", "Ayala", "Coatlan del Rio", "Cuautla", "Cuernavaca", "Emiliano Zapata", "Huitzilac", "Jantetelco", "Jiutepec", "Jojutla", "Jonacatepec de Leandro Valle", "Mazatepec", "Miacatlan", "Ocuituco", "Puente de Ixtla", "Temixco", "Temoac", "Tepalcingo", "Tepoztlan", "Tetecala", "Tetela del Volcan", "Tlalnepantla", "Tlaltizapan de Zapata", "Tlaquiltenango", "Tlayacapan", "Totolapan", "Xochitepec", "Yautepec", "Yecapixtla", "Zacatepec", "Zacualpan de Amilpas"],
            "Nayarit": ["Acaponeta", "Ahuacatlan", "Amatlan de Canas", "Bahia de Banderas", "Compostela", "Del Nayar", "Huajicori", "Ixtlan del Rio", "Jala", "La Yesca", "Rosamorada", "Ruiz", "San Blas", "San Pedro Lagunillas", "Santa Maria del Oro", "Santiago Ixcuintla", "Tecuala", "Tepic", "Tuxpan", "Xalisco"],
            "Nuevo leon": ["Abasolo", "Agualeguas", "Allende", "Anahuac", "Apodaca", "Aramberri", "Bustamante", "Cadereyta Jimenez", "Cerralvo", "China", "Cienega de Flores", "Doctor Arroyo", "Doctor Coss", "Doctor Gonzalez", "El Carmen", "Galeana", "Garcia", "General Bravo", "General Escobedo", "General Teran", "General Trevino", "General Zaragoza", "General Zuazua", "Guadalupe", "Hidalgo", "Higueras", "Hualahuises", "Iturbide", "Juarez", "Lampazos de Naranjo", "Linares", "Los Aldamas", "Los Herreras", "Los Ramones", "Marin", "Melchor Ocampo", "Mier y Noriega", "Mina", "Montemorelos", "Monterrey", "Paras", "Pesqueria", "Rayones", "Sabinas Hidalgo", "Salinas Victoria", "San Nicolas de los Garza", "San Pedro Garza Garcia", "Santa Catarina", "Santiago", "Vallecillo", "Villaldama"],
            "Oaxaca": ["Abejones", "Acatlan de Perez Figueroa", "Animas Trujano", "Asuncion Cacalotepec", "Asuncion Cuyotepeji", "Asuncion Ixtaltepec", "Asuncion Nochixtlan", "Asuncion Ocotlan", "Asuncion Tlacolulita", "Ayoquezco de Aldama", "Ayotzintepec", "Calihuala", "Candelaria Loxicha", "Capulalpam de Mendez", "Chahuites", "Chalcatongo de Hidalgo", "Chiquihuitlan de Benito Juarez", "Cienega de Zimatlan", "Ciudad Ixtepec", "Coatecas Altas", "Coicoyan de las Flores", "Concepcion Buenavista", "Concepcion Papalo", "Constancia del Rosario", "Cosolapa", "Cosoltepec", "Cuilapam de Guerrero", "Cuna de la Independencia de Oaxaca", "Cuyamecalco Villa de Zaragoza", "El Barrio de la Soledad", "El Espinal", "Eloxochitlan de Flores Magon", "Fresnillo de Trujano", "Guadalupe Etla", "Guadalupe de Ramirez", "Guelatao de Juarez", "Guevea de Humboldt", "Heroica Ciudad de Ejutla de Crespo", "Heroica Ciudad de Huajuapan de Leon", "Heroica Ciudad de Juchitan de Zaragoza", "Heroica Ciudad de Tlaxiaco", "Heroica Villa Tezoatlan de Segura y Luna", "Huautepec", "Huautla de Jimenez", "Ixpantepec Nieves", "Ixtlan de Juarez", "La Compania", "La Pe", "La Reforma", "La Trinidad Vista Hermosa", "Loma Bonita", "Magdalena Apasco", "Magdalena Jaltepec", "Magdalena Mixtepec", "Magdalena Ocotlan", "Magdalena Penasco", "Magdalena Teitipac", "Magdalena Tequisistlan", "Magdalena Tlacotepec", "Magdalena Yodocono de Porfirio Diaz", "Magdalena Zahuatlan", "Mariscala de Juarez", "Martires de Tacubaya", "Matias Romero Avendano", "Mazatlan Villa de Flores", "Mesones Hidalgo", "Miahuatlan de Porfirio Diaz", "Mixistlan de la Reforma", "Monjas", "Natividad", "Nazareno Etla", "Nejapa de Madero", "Nuevo Zoquiapam", "Oaxaca de Juarez", "Ocotlan de Morelos", "Pinotepa de Don Luis", "Pluma Hidalgo", "Putla Villa de Guerrero", "Reforma de Pineda", "Reyes Etla", "Rojas de Cuauhtemoc", "Salina Cruz", "San Agustin Amatengo", "San Agustin Atenango", "San Agustin Chayuco", "San Agustin Etla", "San Agustin Loxicha", "San Agustin Tlacotepec", "San Agustin Yatareni", "San Agustin de las Juntas", "San Andres Cabecera Nueva", "San Andres Dinicuiti", "San Andres Huaxpaltepec", "San Andres Huayapam", "San Andres Ixtlahuaca", "San Andres Lagunas", "San Andres Nuxino", "San Andres Paxtlan", "San Andres Sinaxtla", "San Andres Solaga", "San Andres Teotilalpam", "San Andres Tepetlapa", "San Andres Yaa", "San Andres Zabache", "San Andres Zautla", "San Antonino Castillo Velasco", "San Antonino Monte Verde", "San Antonino el Alto", "San Antonio Acutla", "San Antonio Huitepec", "San Antonio Nanahuatipam", "San Antonio Sinicahua", "San Antonio Tepetlapa", "San Antonio de la Cal", "San Baltazar Chichicapam", "San Baltazar Loxicha", "San Baltazar Yatzachi el Bajo", "San Bartolo Coyotepec", "San Bartolo Soyaltepec", "San Bartolo Yautepec", "San Bartolome Ayautla", "San Bartolome Loxicha", "San Bartolome Quialana", "San Bartolome Yucuane", "San Bartolome Zoogocho", "San Bernardo Mixtepec", "San Blas Atempa", "San Carlos Yautepec", "San Cristobal Amatlan", "San Cristobal Amoltepec", "San Cristobal Lachirioag", "San Cristobal Suchixtlahuaca", "San Dionisio Ocotepec", "San Dionisio Ocotlan", "San Dionisio del Mar", "San Esteban Atatlahuca", "San Felipe Jalapa de Diaz", "San Felipe Tejalapam", "San Felipe Usila", "San Francisco Cahuacua", "San Francisco Cajonos", "San Francisco Chapulapa", "San Francisco Chindua", "San Francisco Huehuetlan", "San Francisco Ixhuatan", "San Francisco Jaltepetongo", "San Francisco Lachigolo", "San Francisco Logueche", "San Francisco Nuxano", "San Francisco Ozolotepec", "San Francisco Sola", "San Francisco Telixtlahuaca", "San Francisco Teopan", "San Francisco Tlapancingo", "San Francisco del Mar", "San Gabriel Mixtepec", "San Ildefonso Amatlan", "San Ildefonso Sola", "San Ildefonso Villa Alta", "San Jacinto Amilpas", "San Jacinto Tlacotepec", "San Jeronimo Coatlan", "San Jeronimo Silacayoapilla", "San Jeronimo Sosola", "San Jeronimo Taviche", "San Jeronimo Tecoatl", "San Jeronimo Tlacochahuaya", "San Jorge Nuchita", "San Jose Ayuquila", "San Jose Chiltepec", "San Jose Estancia Grande", "San Jose Independencia", "San Jose Lachiguiri", "San Jose Tenango", "San Jose del Penasco", "San Jose del Progreso", "San Juan Achiutla", "San Juan Atepec", "San Juan Bautista Atatlahuca", "San Juan Bautista Coixtlahuaca", "San Juan Bautista Cuicatlan", "San Juan Bautista Guelache", "San Juan Bautista Jayacatlan", "San Juan Bautista Lo de Soto", "San Juan Bautista Suchitepec", "San Juan Bautista Tlachichilco", "San Juan Bautista Tlacoatzintepec", "San Juan Bautista Tuxtepec", "San Juan Bautista Valle Nacional", "San Juan Cacahuatepec", "San Juan Chicomezuchil", "San Juan Chilateca", "San Juan Cieneguilla", "San Juan Coatzospam", "San Juan Colorado", "San Juan Comaltepec", "San Juan Cotzocon", "San Juan Diuxi", "San Juan Evangelista Analco", "San Juan Guelavia", "San Juan Guichicovi", "San Juan Ihualtepec", "San Juan Juquila Mixes", "San Juan Juquila Vijanos", "San Juan Lachao", "San Juan Lachigalla", "San Juan Lajarcia", "San Juan Lalana", "San Juan Mazatlan", "San Juan Mixtepec", "San Juan Mixtepec", "San Juan Numi", "San Juan Ozolotepec", "San Juan Petlapa", "San Juan Quiahije", "San Juan Quiotepec", "San Juan Sayultepec", "San Juan Tabaa", "San Juan Tamazola", "San Juan Teita", "San Juan Teitipac", "San Juan Tepeuxila", "San Juan Teposcolula", "San Juan Yaee", "San Juan Yatzona", "San Juan Yucuita", "San Juan de los Cues", "San Juan del Estado", "San Juan del Rio", "San Lorenzo Albarradas", "San Lorenzo Cacaotepec", "San Lorenzo Cuaunecuiltitla", "San Lorenzo Texmelucan", "San Lorenzo Victoria", "San Lorenzo", "San Lucas Camotlan", "San Lucas Ojitlan", "San Lucas Quiavini", "San Lucas Zoquiapam", "San Luis Amatlan", "San Marcial Ozolotepec", "San Marcos Arteaga", "San Martin Huamelulpam", "San Martin Itunyoso", "San Martin Lachila", "San Martin Peras", "San Martin Tilcajete", "San Martin Toxpalan", "San Martin Zacatepec", "San Martin de los Cansecos", "San Mateo Cajonos", "San Mateo Etlatongo", "San Mateo Nejapam", "San Mateo Penasco", "San Mateo Pinas", "San Mateo Rio Hondo", "San Mateo Sindihui", "San Mateo Tlapiltepec", "San Mateo Yoloxochitlan", "San Mateo Yucutindoo", "San Mateo del Mar", "San Melchor Betaza", "San Miguel Achiutla", "San Miguel Ahuehuetitlan", "San Miguel Aloapam", "San Miguel Amatitlan", "San Miguel Amatlan", "San Miguel Chicahua", "San Miguel Chimalapa", "San Miguel Coatlan", "San Miguel Ejutla", "San Miguel Huautla", "San Miguel Mixtepec", "San Miguel Panixtlahuaca", "San Miguel Peras", "San Miguel Piedras", "San Miguel Quetzaltepec", "San Miguel Santa Flor", "San Miguel Soyaltepec", "San Miguel Suchixtepec", "San Miguel Tecomatlan", "San Miguel Tenango", "San Miguel Tequixtepec", "San Miguel Tilquiapam", "San Miguel Tlacamama", "San Miguel Tlacotepec", "San Miguel Tulancingo", "San Miguel Yotao", "San Miguel del Puerto", "San Miguel del Rio", "San Miguel el Grande", "San Nicolas Hidalgo", "San Nicolas", "San Pablo Coatlan", "San Pablo Cuatro Venados", "San Pablo Etla", "San Pablo Huitzo", "San Pablo Huixtepec", "San Pablo Macuiltianguis", "San Pablo Tijaltepec", "San Pablo Villa de Mitla", "San Pablo Yaganiza", "San Pedro Amuzgos", "San Pedro Apostol", "San Pedro Atoyac", "San Pedro Cajonos", "San Pedro Comitancillo", "San Pedro Coxcaltepec Cantaros", "San Pedro Huamelula", "San Pedro Huilotepec", "San Pedro Ixcatlan", "San Pedro Ixtlahuaca", "San Pedro Jaltepetongo", "San Pedro Jicayan", "San Pedro Jocotipac", "San Pedro Juchatengo", "San Pedro Martir Quiechapa", "San Pedro Martir Yucuxaco", "San Pedro Martir", "San Pedro Mixtepec", "San Pedro Mixtepec", "San Pedro Molinos", "San Pedro Nopala", "San Pedro Ocopetatillo", "San Pedro Ocotepec", "San Pedro Pochutla", "San Pedro Quiatoni", "San Pedro Sochiapam", "San Pedro Tapanatepec", "San Pedro Taviche", "San Pedro Teozacoalco", "San Pedro Teutila", "San Pedro Tidaa", "San Pedro Topiltepec", "San Pedro Totolapam", "San Pedro Yaneri", "San Pedro Yolox", "San Pedro Yucunama", "San Pedro el Alto", "San Pedro y San Pablo Ayutla", "San Pedro y San Pablo Teposcolula", "San Pedro y San Pablo Tequixtepec", "San Raymundo Jalpan", "San Sebastian Abasolo", "San Sebastian Coatlan", "San Sebastian Ixcapa", "San Sebastian Nicananduta", "San Sebastian Rio Hondo", "San Sebastian Tecomaxtlahuaca", "San Sebastian Teitipac", "San Sebastian Tutla", "San Simon Almolongas", "San Simon Zahuatlan", "San Vicente Coatlan", "San Vicente Lachixio", "San Vicente Nunu", "Santa Ana Ateixtlahuaca", "Santa Ana Cuauhtemoc", "Santa Ana Tavela", "Santa Ana Tlapacoyan", "Santa Ana Yareni", "Santa Ana Zegache", "Santa Ana del Valle", "Santa Ana", "Santa Catalina Quieri", "Santa Catarina Cuixtla", "Santa Catarina Ixtepeji", "Santa Catarina Juquila", "Santa Catarina Lachatao", "Santa Catarina Loxicha", "Santa Catarina Mechoacan", "Santa Catarina Minas", "Santa Catarina Quiane", "Santa Catarina Quioquitani", "Santa Catarina Tayata", "Santa Catarina Ticua", "Santa Catarina Yosonotu", "Santa Catarina Zapoquila", "Santa Cruz Acatepec", "Santa Cruz Amilpas", "Santa Cruz Itundujia", "Santa Cruz Mixtepec", "Santa Cruz Nundaco", "Santa Cruz Papalutla", "Santa Cruz Tacache de Mina", "Santa Cruz Tacahua", "Santa Cruz Tayata", "Santa Cruz Xitla", "Santa Cruz Xoxocotlan", "Santa Cruz Zenzontepec", "Santa Cruz de Bravo", "Santa Gertrudis", "Santa Ines Yatzeche", "Santa Ines de Zaragoza", "Santa Ines del Monte", "Santa Lucia Miahuatlan", "Santa Lucia Monteverde", "Santa Lucia Ocotlan", "Santa Lucia del Camino", "Santa Magdalena Jicotlan", "Santa Maria Alotepec", "Santa Maria Apazco", "Santa Maria Atzompa", "Santa Maria Camotlan", "Santa Maria Chachoapam", "Santa Maria Chilchotla", "Santa Maria Chimalapa", "Santa Maria Colotepec", "Santa Maria Cortijo", "Santa Maria Coyotepec", "Santa Maria Ecatepec", "Santa Maria Guelace", "Santa Maria Guienagati", "Santa Maria Huatulco", "Santa Maria Huazolotitlan", "Santa Maria Ipalapa", "Santa Maria Ixcatlan", "Santa Maria Jacatepec", "Santa Maria Jalapa del Marques", "Santa Maria Jaltianguis", "Santa Maria Lachixio", "Santa Maria Mixtequilla", "Santa Maria Nativitas", "Santa Maria Nduayaco", "Santa Maria Ozolotepec", "Santa Maria Papalo", "Santa Maria Penoles", "Santa Maria Petapa", "Santa Maria Quiegolani", "Santa Maria Sola", "Santa Maria Tataltepec", "Santa Maria Tecomavaca", "Santa Maria Temaxcalapa", "Santa Maria Temaxcaltepec", "Santa Maria Teopoxco", "Santa Maria Tepantlali", "Santa Maria Texcatitlan", "Santa Maria Tlahuitoltepec", "Santa Maria Tlalixtac", "Santa Maria Tonameca", "Santa Maria Totolapilla", "Santa Maria Xadani", "Santa Maria Yalina", "Santa Maria Yavesia", "Santa Maria Yolotepec", "Santa Maria Yosoyua", "Santa Maria Yucuhiti", "Santa Maria Zacatepec", "Santa Maria Zaniza", "Santa Maria Zoquitlan", "Santa Maria del Rosario", "Santa Maria del Tule", "Santa Maria la Asuncion", "Santiago Amoltepec", "Santiago Apoala", "Santiago Apostol", "Santiago Astata", "Santiago Atitlan", "Santiago Ayuquililla", "Santiago Cacaloxtepec", "Santiago Camotlan", "Santiago Chazumba", "Santiago Choapam", "Santiago Comaltepec", "Santiago Huajolotitlan", "Santiago Huauclilla", "Santiago Ihuitlan Plumas", "Santiago Ixcuintepec", "Santiago Ixtayutla", "Santiago Jamiltepec", "Santiago Jocotepec", "Santiago Juxtlahuaca", "Santiago Lachiguiri", "Santiago Lalopa", "Santiago Laollaga", "Santiago Laxopa", "Santiago Llano Grande", "Santiago Matatlan", "Santiago Miltepec", "Santiago Minas", "Santiago Nacaltepec", "Santiago Nejapilla", "Santiago Niltepec", "Santiago Nundiche", "Santiago Nuyoo", "Santiago Pinotepa Nacional", "Santiago Suchilquitongo", "Santiago Tamazola", "Santiago Tapextla", "Santiago Tenango", "Santiago Tepetlapa", "Santiago Tetepec", "Santiago Texcalcingo", "Santiago Textitlan", "Santiago Tilantongo", "Santiago Tillo", "Santiago Tlazoyaltepec", "Santiago Xanica", "Santiago Xiacui", "Santiago Yaitepec", "Santiago Yaveo", "Santiago Yolomecatl", "Santiago Yosondua", "Santiago Yucuyachi", "Santiago Zacatepec", "Santiago Zoochila", "Santiago del Rio", "Santo Domingo Albarradas", "Santo Domingo Armenta", "Santo Domingo Chihuitan", "Santo Domingo Ingenio", "Santo Domingo Ixcatlan", "Santo Domingo Nuxaa", "Santo Domingo Ozolotepec", "Santo Domingo Petapa", "Santo Domingo Roayaga", "Santo Domingo Tehuantepec", "Santo Domingo Teojomulco", "Santo Domingo Tepuxtepec", "Santo Domingo Tlatayapam", "Santo Domingo Tomaltepec", "Santo Domingo Tonala", "Santo Domingo Tonaltepec", "Santo Domingo Xagacia", "Santo Domingo Yanhuitlan", "Santo Domingo Yodohino", "Santo Domingo Zanatepec", "Santo Domingo de Morelos", "Santo Tomas Jalieza", "Santo Tomas Mazaltepec", "Santo Tomas Ocotepec", "Santo Tomas Tamazulapan", "Santos Reyes Nopala", "Santos Reyes Papalo", "Santos Reyes Tepejillo", "Santos Reyes Yucuna", "Silacayoapam", "Sitio de Xitlapehua", "Soledad Etla", "Tamazulapam del Espiritu Santo", "Tanetze de Zaragoza", "Taniche", "Tataltepec de Valdes", "Teococuilco de Marcos Perez", "Teotitlan de Flores Magon", "Teotitlan del Valle", "Teotongo", "Tepelmeme Villa de Morelos", "Tlacolula de Matamoros", "Tlacotepec Plumas", "Tlalixtac de Cabrera", "Totontepec Villa de Morelos", "Trinidad Zaachila", "Union Hidalgo", "Valerio Trujano", "Villa Diaz Ordaz", "Villa Hidalgo", "Villa Sola de Vega", "Villa Talea de Castro", "Villa Tejupam de la Union", "Villa de Chilapa de Diaz", "Villa de Etla", "Villa de Tamazulapam del Progreso", "Villa de Tututepec", "Villa de Zaachila", "Yaxe", "Yogana", "Yutanduchi de Guerrero", "Zapotitlan Lagunas", "Zapotitlan Palmas", "Zimatlan de Alvarez"],
            "Puebla": ["Acajete", "Acateno", "Acatlan", "Acatzingo", "Acteopan", "Ahuacatlan", "Ahuatlan", "Ahuazotepec", "Ahuehuetitla", "Ajalpan", "Albino Zertuche", "Aljojuca", "Altepexi", "Amixtlan", "Amozoc", "Aquixtla", "Atempan", "Atexcal", "Atlequizayan", "Atlixco", "Atoyatempan", "Atzala", "Atzitzihuacan", "Atzitzintla", "Axutla", "Ayotoxco de Guerrero", "Calpan", "Caltepec", "Camocuautla", "Canada Morelos", "Caxhuacan", "Chalchicomula de Sesma", "Chapulco", "Chiautla", "Chiautzingo", "Chichiquila", "Chiconcuautla", "Chietla", "Chigmecatitlan", "Chignahuapan", "Chignautla", "Chila de la Sal", "Chila", "Chilchotla", "Chinantla", "Coatepec", "Coatzingo", "Cohetzala", "Cohuecan", "Coronango", "Coxcatlan", "Coyomeapan", "Coyotepec", "Cuapiaxtla de Madero", "Cuautempan", "Cuautinchan", "Cuautlancingo", "Cuayuca de Andrade", "Cuetzalan del Progreso", "Cuyoaco", "Domingo Arenas", "Eloxochitlan", "Epatlan", "Esperanza", "Francisco Z. Mena", "General Felipe Angeles", "Guadalupe Victoria", "Guadalupe", "Hermenegildo Galeana", "Honey", "Huaquechula", "Huatlatlauca", "Huauchinango", "Huehuetla", "Huehuetlan el Chico", "Huehuetlan el Grande", "Huejotzingo", "Hueyapan", "Hueytamalco", "Hueytlalpan", "Huitzilan de Serdan", "Huitziltepec", "Ixcamilpa de Guerrero", "Ixcaquixtla", "Ixtacamaxtitlan", "Ixtepec", "Izucar de Matamoros", "Jalpan", "Jolalpan", "Jonotla", "Jopala", "Juan C. Bonilla", "Juan Galindo", "Juan N. Mendez", "La Magdalena Tlatlauquitepec", "Lafragua", "Libres", "Los Reyes de Juarez", "Mazapiltepec de Juarez", "Mixtla", "Molcaxac", "Naupan", "Nauzontla", "Nealtican", "Nicolas Bravo", "Nopalucan", "Ocotepec", "Ocoyucan", "Olintla", "Oriental", "Pahuatlan", "Palmar de Bravo", "Pantepec", "Petlalcingo", "Piaxtla", "Puebla", "Quecholac", "Quimixtlan", "Rafael Lara Grajales", "San Andres Cholula", "San Antonio Canada", "San Diego la Mesa Tochimiltzingo", "San Felipe Teotlalcingo", "San Felipe Tepatlan", "San Gabriel Chilac", "San Gregorio Atzompa", "San Jeronimo Tecuanipan", "San Jeronimo Xayacatlan", "San Jose Chiapa", "San Jose Miahuatlan", "San Juan Atenco", "San Juan Atzompa", "San Martin Texmelucan", "San Martin Totoltepec", "San Matias Tlalancaleca", "San Miguel Ixitlan", "San Miguel Xoxtla", "San Nicolas Buenos Aires", "San Nicolas de los Ranchos", "San Pablo Anicano", "San Pedro Cholula", "San Pedro Yeloixtlahuaca", "San Salvador Huixcolotla", "San Salvador el Seco", "San Salvador el Verde", "San Sebastian Tlacotepec", "Santa Catarina Tlaltempan", "Santa Ines Ahuatempan", "Santa Isabel Cholula", "Santiago Miahuatlan", "Santo Tomas Hueyotlipan", "Soltepec", "Tecali de Herrera", "Tecamachalco", "Tecomatlan", "Tehuacan", "Tehuitzingo", "Tenampulco", "Teopantlan", "Teotlalco", "Tepanco de Lopez", "Tepango de Rodriguez", "Tepatlaxco de Hidalgo", "Tepeaca", "Tepemaxalco", "Tepeojuma", "Tepetzintla", "Tepexco", "Tepexi de Rodriguez", "Tepeyahualco de Cuauhtemoc", "Tepeyahualco", "Tetela de Ocampo", "Teteles de Avila Castillo", "Teziutlan", "Tianguismanalco", "Tilapa", "Tlachichuca", "Tlacotepec de Benito Juarez", "Tlacuilotepec", "Tlahuapan", "Tlaltenango", "Tlanepantla", "Tlaola", "Tlapacoya", "Tlapanala", "Tlatlauquitepec", "Tlaxco", "Tochimilco", "Tochtepec", "Totoltepec de Guerrero", "Tulcingo", "Tuzamapan de Galeana", "Tzicatlacoyan", "Venustiano Carranza", "Vicente Guerrero", "Xayacatlan de Bravo", "Xicotepec", "Xicotlan", "Xiutetelco", "Xochiapulco", "Xochiltepec", "Xochitlan Todos Santos", "Xochitlan de Vicente Suarez", "Yaonahuac", "Yehualtepec", "Zacapala", "Zacapoaxtla", "Zacatlan", "Zapotitlan de Mendez", "Zapotitlan", "Zaragoza", "Zautla", "Zihuateutla", "Zinacatepec", "Zongozotla", "Zoquiapan", "Zoquitlan"],
            "Queretaro": ["Amealco de Bonfil", "Arroyo Seco", "Cadereyta de Montes", "Colon", "Corregidora", "El Marques", "Ezequiel Montes", "Huimilpan", "Jalpan de Serra", "Landa de Matamoros", "Pedro Escobedo", "Penamiller", "Pinal de Amoles", "Queretaro", "San Joaquin", "San Juan del Rio", "Tequisquiapan", "Toliman"],
            "Quintana roo": ["Bacalar", "Benito Juarez", "Cozumel", "Felipe Carrillo Puerto", "Isla Mujeres", "Jose Maria Morelos", "Lazaro Cardenas", "Othon P. Blanco", "Puerto Morelos", "Solidaridad", "Tulum"],
            "San luis potosi": ["Ahualulco", "Alaquines", "Aquismon", "Armadillo de los Infante", "Axtla de Terrazas", "Cardenas", "Catorce", "Cedral", "Cerritos", "Cerro de San Pedro", "Charcas", "Ciudad Fernandez", "Ciudad Valles", "Ciudad del Maiz", "Coxcatlan", "Ebano", "El Naranjo", "Guadalcazar", "Huehuetlan", "Lagunillas", "Matehuala", "Matlapa", "Mexquitic de Carmona", "Moctezuma", "Rayon", "Rioverde", "Salinas", "San Antonio", "San Ciro de Acosta", "San Luis Potosi", "San Martin Chalchicuautla", "San Nicolas Tolentino", "San Vicente Tancuayalab", "Santa Catarina", "Santa Maria del Rio", "Santo Domingo", "Soledad de Graciano Sanchez", "Tamasopo", "Tamazunchale", "Tampacan", "Tampamolon Corona", "Tamuin", "Tancanhuitz", "Tanlajas", "Tanquian de Escobedo", "Tierra Nueva", "Vanegas", "Venado", "Villa Hidalgo", "Villa Juarez", "Villa de Arista", "Villa de Arriaga", "Villa de Guadalupe", "Villa de Ramos", "Villa de Reyes", "Villa de la Paz", "Xilitla", "Zaragoza"],
            "Sinaloa": ["Ahome", "Angostura", "Badiraguato", "Choix", "Concordia", "Cosala", "Culiacan", "El Fuerte", "Elota", "Escuinapa", "Guasave", "Mazatlan", "Mocorito", "Navolato", "Rosario", "Salvador Alvarado", "San Ignacio", "Sinaloa"],
            "Sonora": ["Aconchi", "Agua Prieta", "Alamos", "Altar", "Arivechi", "Arizpe", "Atil", "Bacadehuachi", "Bacanora", "Bacerac", "Bacoachi", "Bacum", "Banamichi", "Baviacora", "Bavispe", "Benito Juarez", "Benjamin Hill", "Caborca", "Cajeme", "Cananea", "Carbo", "Cucurpe", "Cumpas", "Divisaderos", "Empalme", "Etchojoa", "Fronteras", "General Plutarco Elias Calles", "Granados", "Guaymas", "Hermosillo", "Huachinera", "Huasabas", "Huatabampo", "Huepac", "Imuris", "La Colorada", "Magdalena", "Mazatan", "Moctezuma", "Naco", "Nacori Chico", "Nacozari de Garcia", "Navojoa", "Nogales", "Onavas", "Opodepe", "Oquitoa", "Pitiquito", "Puerto Penasco", "Quiriego", "Rayon", "Rosario", "Sahuaripa", "San Felipe de Jesus", "San Ignacio Rio Muerto", "San Javier", "San Luis Rio Colorado", "San Miguel de Horcasitas", "San Pedro de la Cueva", "Santa Ana", "Santa Cruz", "Saric", "Soyopa", "Suaqui Grande", "Tepache", "Trincheras", "Tubutama", "Ures", "Villa Hidalgo", "Villa Pesqueira", "Yecora"],
            "Tabasco": ["Balancan", "Cardenas", "Centla", "Centro", "Comalcalco", "Cunduacan", "Emiliano Zapata", "Huimanguillo", "Jalapa", "Jalpa de Mendez", "Jonuta", "Macuspana", "Nacajuca", "Paraiso", "Tacotalpa", "Teapa", "Tenosique"],
            "Tamaulipas": ["Abasolo", "Aldama", "Altamira", "Antiguo Morelos", "Burgos", "Bustamante", "Camargo", "Casas", "Ciudad Madero", "Cruillas", "El Mante", "Gomez Farias", "Gonzalez", "Guemez", "Guerrero", "Gustavo Diaz Ordaz", "Hidalgo", "Jaumave", "Jimenez", "Llera", "Mainero", "Matamoros", "Mendez", "Mier", "Miguel Aleman", "Miquihuana", "Nuevo Laredo", "Nuevo Morelos", "Ocampo", "Padilla", "Palmillas", "Reynosa", "Rio Bravo", "San Carlos", "San Fernando", "San Nicolas", "Soto la Marina", "Tampico", "Tula", "Valle Hermoso", "Victoria", "Villagran", "Xicotencatl"],
            "Tlaxcala": ["Acuamanala de Miguel Hidalgo", "Amaxac de Guerrero", "Apetatitlan de Antonio Carvajal", "Apizaco", "Atlangatepec", "Atltzayanca", "Benito Juarez", "Calpulalpan", "Chiautempan", "Contla de Juan Cuamatzi", "Cuapiaxtla", "Cuaxomulco", "El Carmen Tequexquitla", "Emiliano Zapata", "Espanita", "Huamantla", "Hueyotlipan", "Ixtacuixtla de Mariano Matamoros", "Ixtenco", "La Magdalena Tlaltelulco", "Lazaro Cardenas", "Mazatecochco de Jose Maria Morelos", "Munoz de Domingo Arenas", "Nanacamilpa de Mariano Arista", "Nativitas", "Panotla", "Papalotla de Xicohtencatl", "San Damian Texoloc", "San Francisco Tetlanohcan", "San Jeronimo Zacualpan", "San Jose Teacalco", "San Juan Huactzinco", "San Lorenzo Axocomanitla", "San Lucas Tecopilco", "San Pablo del Monte", "Sanctorum de Lazaro Cardenas", "Santa Ana Nopalucan", "Santa Apolonia Teacalco", "Santa Catarina Ayometla", "Santa Cruz Quilehtla", "Santa Cruz Tlaxcala", "Santa Isabel Xiloxoxtla", "Tenancingo", "Teolocholco", "Tepetitla de Lardizabal", "Tepeyanco", "Terrenate", "Tetla de la Solidaridad", "Tetlatlahuca", "Tlaxcala", "Tlaxco", "Tocatlan", "Totolac", "Tzompantepec", "Xaloztoc", "Xaltocan", "Xicohtzinco", "Yauhquemehcan", "Zacatelco", "Ziltlaltepec de Trinidad Sanchez Santos"],
            "Veracruz": ["Acajete", "Acatlan", "Acayucan", "Actopan", "Acula", "Acultzingo", "Agua Dulce", "Alamo Temapache", "Alpatlahuac", "Alto Lucero de Gutierrez Barrios", "Altotonga", "Alvarado", "Amatitlan", "Amatlan de los Reyes", "Angel R. Cabada", "Apazapan", "Aquila", "Astacinga", "Atlahuilco", "Atoyac", "Atzacan", "Atzalan", "Ayahualulco", "Banderilla", "Benito Juarez", "Boca del Rio", "Calcahualco", "Camaron de Tejeda", "Camerino Z. Mendoza", "Carlos A. Carrillo", "Carrillo Puerto", "Castillo de Teayo", "Catemaco", "Cazones de Herrera", "Cerro Azul", "Chacaltianguis", "Chalma", "Chiconamel", "Chiconquiaco", "Chicontepec", "Chinameca", "Chinampa de Gorostiza", "Chocaman", "Chontla", "Chumatlan", "Citlaltepetl", "Coacoatzintla", "Coahuitlan", "Coatepec", "Coatzacoalcos", "Coatzintla", "Coetzala", "Colipa", "Comapa", "Cordoba", "Cosamaloapan de Carpio", "Cosautlan de Carvajal", "Coscomatepec", "Cosoleacaque", "Cotaxtla", "Coxquihui", "Coyutla", "Cuichapa", "Cuitlahuac", "El Higo", "Emiliano Zapata", "Espinal", "Filomeno Mata", "Fortin", "Gutierrez Zamora", "Hidalgotitlan", "Huatusco", "Huayacocotla", "Hueyapan de Ocampo", "Huiloapan de Cuauhtemoc", "Ignacio de la Llave", "Ilamatlan", "Isla", "Ixcatepec", "Ixhuacan de los Reyes", "Ixhuatlan de Madero", "Ixhuatlan del Cafe", "Ixhuatlan del Sureste", "Ixhuatlancillo", "Ixmatlahuacan", "Ixtaczoquitlan", "Jalacingo", "Jalcomulco", "Jaltipan", "Jamapa", "Jesus Carranza", "Jilotepec", "Jose Azueta", "Juan Rodriguez Clara", "Juchique de Ferrer", "La Antigua", "La Perla", "Landero y Coss", "Las Choapas", "Las Minas", "Las Vigas de Ramirez", "Lerdo de Tejada", "Los Reyes", "Magdalena", "Maltrata", "Manlio Fabio Altamirano", "Mariano Escobedo", "Martinez de la Torre", "Mecatlan", "Mecayapan", "Medellin de Bravo", "Miahuatlan", "Minatitlan", "Misantla", "Mixtla de Altamirano", "Moloacan", "Nanchital de Lazaro Cardenas del Rio", "Naolinco", "Naranjal", "Naranjos Amatlan", "Nautla", "Nogales", "Oluta", "Omealca", "Orizaba", "Otatitlan", "Oteapan", "Ozuluama de Mascarenas", "Pajapan", "Panuco", "Papantla", "Paso de Ovejas", "Paso del Macho", "Perote", "Platon Sanchez", "Playa Vicente", "Poza Rica de Hidalgo", "Pueblo Viejo", "Puente Nacional", "Rafael Delgado", "Rafael Lucio", "Rio Blanco", "Saltabarranca", "San Andres Tenejapan", "San Andres Tuxtla", "San Juan Evangelista", "San Rafael", "Santiago Sochiapan", "Santiago Tuxtla", "Sayula de Aleman", "Sochiapa", "Soconusco", "Soledad Atzompa", "Soledad de Doblado", "Soteapan", "Tamalin", "Tamiahua", "Tampico Alto", "Tancoco", "Tantima", "Tantoyuca", "Tatahuicapan de Juarez", "Tatatila", "Tecolutla", "Tehuipango", "Tempoal", "Tenampa", "Tenochtitlan", "Teocelo", "Tepatlaxco", "Tepetlan", "Tepetzintla", "Tequila", "Texcatepec", "Texhuacan", "Texistepec", "Tezonapa", "Tierra Blanca", "Tihuatlan", "Tlachichilco", "Tlacojalpan", "Tlacolulan", "Tlacotalpan", "Tlacotepec de Mejia", "Tlalixcoyan", "Tlalnelhuayocan", "Tlaltetela", "Tlapacoyan", "Tlaquilpa", "Tlilapan", "Tomatlan", "Tonayan", "Totutla", "Tres Valles", "Tuxpan", "Tuxtilla", "Ursulo Galvan", "Uxpanapa", "Vega de Alatorre", "Veracruz", "Villa Aldama", "Xalapa", "Xico", "Xoxocotla", "Yanga", "Yecuatla", "Zacualpan", "Zaragoza", "Zentla", "Zongolica", "Zontecomatlan de Lopez y Fuentes", "Zozocolco de Hidalgo"],
            "Yucatan": ["Abala", "Acanceh", "Akil", "Baca", "Bokoba", "Buctzotz", "Cacalchen", "Calotmul", "Cansahcab", "Cantamayec", "Celestun", "Cenotillo", "Chacsinkin", "Chankom", "Chapab", "Chemax", "Chichimila", "Chicxulub Pueblo", "Chikindzonot", "Chochola", "Chumayel", "Conkal", "Cuncunul", "Cuzama", "Dzan", "Dzemul", "Dzidzantun", "Dzilam Gonzalez", "Dzilam de Bravo", "Dzitas", "Dzoncauich", "Espita", "Halacho", "Hocaba", "Hoctun", "Homun", "Huhi", "Hunucma", "Ixil", "Izamal", "Kanasin", "Kantunil", "Kaua", "Kinchil", "Kopoma", "Mama", "Mani", "Maxcanu", "Mayapan", "Merida", "Mococha", "Motul", "Muna", "Muxupip", "Opichen", "Oxkutzcab", "Panaba", "Peto", "Progreso", "Quintana Roo", "Rio Lagartos", "Sacalum", "Samahil", "San Felipe", "Sanahcat", "Santa Elena", "Seye", "Sinanche", "Sotuta", "Sucila", "Sudzal", "Suma", "Tahdziu", "Tahmek", "Teabo", "Tecoh", "Tekal de Venegas", "Tekanto", "Tekax", "Tekit", "Tekom", "Telchac Pueblo", "Telchac Puerto", "Temax", "Temozon", "Tepakan", "Tetiz", "Teya", "Ticul", "Timucuy", "Tinum", "Tixcacalcupul", "Tixkokob", "Tixmehuac", "Tixpehual", "Tizimin", "Tunkas", "Tzucacab", "Uayma", "Ucu", "Uman", "Valladolid", "Xocchel", "Yaxcaba", "Yaxkukul", "Yobain"],
            "Zacatecas": ["Apozol", "Apulco", "Atolinga", "Benito Juarez", "Calera", "Canitas de Felipe Pescador", "Chalchihuites", "Concepcion del Oro", "Cuauhtemoc", "El Plateado de Joaquin Amaro", "El Salvador", "Fresnillo", "Genaro Codina", "General Enrique Estrada", "General Francisco R. Murguia", "General Panfilo Natera", "Guadalupe", "Huanusco", "Jalpa", "Jerez", "Jimenez del Teul", "Juan Aldama", "Juchipila", "Loreto", "Luis Moya", "Mazapil", "Melchor Ocampo", "Mezquital del Oro", "Miguel Auza", "Momax", "Monte Escobedo", "Morelos", "Moyahua de Estrada", "Nochistlan de Mejia", "Noria de Angeles", "Ojocaliente", "Panuco", "Pinos", "Rio Grande", "Sain Alto", "Santa Maria de la Paz", "Sombrerete", "Susticacan", "Tabasco", "Tepechitlan", "Tepetongo", "Teul de Gonzalez Ortega", "Tlaltenango de Sanchez Roman", "Trancoso", "Trinidad Garcia de la Cadena", "Valparaiso", "Vetagrande", "Villa Garcia", "Villa Gonzalez Ortega", "Villa Hidalgo", "Villa de Cos", "Villanueva", "Zacatecas"]
        };

        function cargarCiudades() {
            const estado = document.getElementById("estado").value;
            const ciudadSelect = document.getElementById("ciudad");
            ciudadSelect.innerHTML = '<option value="">Selecciona una ciudad</option>';

            if (estado && ciudadesPorEstado[estado]) {
                ciudadesPorEstado[estado].forEach(ciudad => {
                    const option = document.createElement("option");
                    option.value = ciudad;
                    option.textContent = ciudad;
                    ciudadSelect.appendChild(option);
                });
            }
        }
    </script>
</body>

</html>