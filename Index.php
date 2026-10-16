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

  <title>Directo a Obra</title>
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
    details[open] summary~* {
      animation: fadeIn 0.2s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-5px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .slider-track {
      display: flex;
      gap: 1.5rem;
      transition: transform 0.5s ease-in-out;
      padding: 0 1rem;
    }

    .testimonial-card {
      flex: 0 0 calc(100% - 2rem);
      transition: all 0.3s ease;
      min-height: 220px;
      max-width: 350px;
      margin: 0 auto;
    }

    .testimonial-card>div {
      height: 100%;
      min-height: 200px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    @media (min-width: 768px) {
      .testimonial-card {
        flex: 0 0 calc((100% - 3rem) / 2);
        min-height: 240px;
        max-width: 400px;
      }

      .testimonial-card>div {
        min-height: 220px;
      }
    }

    @media (min-width: 1024px) {
      .testimonial-card {
        flex: 0 0 calc((100% - 4.5rem) / 3);
        min-height: 280px;
        max-width: 450px;
      }

      .testimonial-card>div {
        min-height: 260px;
      }

      .slider-track {
        gap: 2rem;
      }
    }

    details[open] {
      background-color: rgb(242, 242, 246);
      /* Azul claro */
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .animate-scroll {
      animation: scroll 12s linear infinite;
    }

    #imgs {
      width: 100%;
      max-width: 237px;
      /* El tamaño máximo que pueden ocupar */
      height: auto;
      /* Mantener la proporción */
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin-right: 15px;
      /* Espaciado entre imágenes */
    }

    .hero-bg {
      background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fe 100%);
    }

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
      background-color: rgba(249, 215, 28, 0.5);
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

  <main class="flex-grow p-6 bg-white">
    <!-- Hero Section -->
    <div class="px-8 md:px-20 lg:px-40 py-4 text-center">
      <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
        Encuentra todo para tu obra <br>
        <span class="highlight-text text-gray-900">en un solo lugar.</span>
      </h1>
      <p class="mt-6 text-gray-600 text-base md:text-lg leading-relaxed">
        Trabajamos constantemente para brindar una experiencia de compra rápida,<br class="hidden md:block">
        transparente y con el respaldo de un equipo comprometido con el servicio al cliente<br class="hidden md:block">
        y la mejora continua.
      </p>

      <!-- Botón centrado -->
      <div class="mt-10 flex justify-center">
        <a href="productos.php"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md shadow-md transition duration-300 flex items-center space-x-2">
          <span>🛒</span>
          <span>Ver Productos</span>
        </a>
      </div>

      <div style="height: 80px;"></div>
      <!-- Imagen en pantalla completa horizontalmente -->
      <img src="Recursos/Presentacion.png" alt="Imagen de portada" class="w-full h-auto max-h-[720px] object-contain" />
    </div>

    <!-- Empresas Aliadas -->
    <div class="py-12 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 relative">
          <span class="relative z-10">Marcas de confianza</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
        </h2>

        <div class="overflow-hidden w-full py-8 bg-white rounded-xl shadow-md">
          <div class="flex animate-scroll whitespace-nowrap">
            <!-- Logos con efecto hover mejorado -->
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo1.png" alt="Logo 1">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo2.png" alt="Logo 2">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo3.png" alt="Logo 3">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo4.png" alt="Logo 4">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo5.png" alt="Logo 5">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo6.png" alt="Logo 6">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo7.png" alt="Logo 7">

            <!-- Repetidos para el scroll infinito -->
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo1.png" alt="Logo 1">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo2.png" alt="Logo 2">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo3.png" alt="Logo 3">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo4.png" alt="Logo 4">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo5.png" alt="Logo 5">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo6.png" alt="Logo 6">
            <img class="mx-4 h-auto w-[260px] filter grayscale hover:grayscale-0 transition-all duration-500 hover:scale-105 hover:shadow-xl rounded-lg" src="Recursos/empresas/Logo7.png" alt="Logo 7">
          </div>
        </div>
      </div>
      <div style="height: 50px;"></div>
    </div>

    <!-- Categorías Destacadas -->
    <div class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative">
          <span class="relative z-10">Categorías Populares</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
          <!-- Categoría 1 -->
          <div class="bg-white rounded-xl p-4 shadow-md card-hover">
            <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-full w-16 h-16 flex items-center justify-center mb-4 mx-auto shadow-lg">
              <span class="text-3xl">🏗️</span>
            </div>
            <h3 class="text-lg font-semibold text-center mb-2">Cemento</h3>
            <div class="text-center mt-2">
              <a href="productos.php?categoria=1" class="text-blue-600 hover:text-blue-800 font-medium">Ver productos →</a>
            </div>
          </div>

          <!-- Categoría 2 -->
          <div class="bg-white rounded-xl p-4 shadow-md card-hover">
            <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-full w-16 h-16 flex items-center justify-center mb-4 mx-auto shadow-lg">
              <span class="text-3xl">🧱</span>
            </div>
            <h3 class="text-lg font-semibold text-center mb-2">Tabiques</h3>
            <div class="text-center mt-2">
              <a href="productos.php?categoria=2" class="text-blue-600 hover:text-blue-800 font-medium">Ver productos →</a>
            </div>
          </div>

          <!-- Categoría 3 -->
          <div class="bg-white rounded-xl p-4 shadow-md card-hover">
            <div class="bg-gradient-to-br from-gray-600 to-gray-800 rounded-full w-16 h-16 flex items-center justify-center mb-4 mx-auto shadow-lg">
              <span class="text-3xl">⚙️</span>
            </div>
            <h3 class="text-lg font-semibold text-center mb-2">Varillas</h3>
            <div class="text-center mt-2">
              <a href="productos.php?categoria=3" class="text-blue-600 hover:text-blue-800 font-medium">Ver productos →</a>
            </div>
          </div>

          <!-- Categoría 4 -->
          <div class="bg-white rounded-xl p-4 shadow-md card-hover">
            <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full w-16 h-16 flex items-center justify-center mb-4 mx-auto shadow-lg">
              <span class="text-3xl">⚡</span>
            </div>
            <h3 class="text-lg font-semibold text-center mb-2">Alambrado</h3>
            <div class="text-center mt-2">
              <a href="productos.php?categoria=7" class="text-blue-600 hover:text-blue-800 font-medium">Ver productos →</a>
            </div>
          </div>
        </div>
      </div>
      <div style="height: 30px;"></div>
    </div>

    <!-- Productos Destacados -->
    <div class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative">
          <span class="relative z-10">Productos Populares</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Producto 1 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
            <div class="h-48 overflow-hidden">
              <img src="Recursos/productos/1/producto.png" alt="Cemento" class="w-full h-full object-contain">
            </div>
            <div class="p-4">
              <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Más vendido</span>
              <h3 class="font-bold text-lg mt-2">Cemento Portland</h3>
              <p class="text-gray-600 text-sm">Resistente a la humedad y de secado rápido</p>
              <div class="mt-4 flex justify-between items-center">
                <span class="font-bold text-xl">$160.00</span>
                <a href="productos.php" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">Ver más</a>
              </div>
            </div>
          </div>

          <!-- Producto 2 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
            <div class="h-48 overflow-hidden">
              <img src="Recursos/productos/7/producto.png" alt="Varilla" class="w-full h-full object-contain">
            </div>
            <div class="p-4">
              <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">Oferta</span>
              <h3 class="font-bold text-lg mt-2">Varilla corrugada 3/8"</h3>
              <p class="text-gray-600 text-sm">Alta resistencia para estructuras</p>
              <div class="mt-4 flex justify-between items-center">
                <span class="font-bold text-xl">$60.00</span>
                <a href="productos.php" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">Ver más</a>
              </div>
            </div>
          </div>

          <!-- Producto 3 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
            <div class="h-48 overflow-hidden">
              <img src="Recursos/productos/6/Producto.png" alt="Bloque" class="w-full h-full object-contain">
            </div>
            <div class="p-4">
              <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Nuevo</span>
              <h3 class="font-bold text-lg mt-2">Bloque Hueco Ligero</h3>
              <p class="text-gray-600 text-sm">Ligero pero resistente a la vez</p>
              <div class="mt-4 flex justify-between items-center">
                <span class="font-bold text-xl">$7,170.00</span>
                <a href="productos.php" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">Ver más</a>
              </div>
            </div>
          </div>

          <!-- Producto 4 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
            <div class="h-48 overflow-hidden">
              <img src="Recursos/productos/10/producto.png" alt="Pintura" class="w-full h-full object-contain">
            </div>
            <div class="p-4">
              <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">Último stock</span>
              <h3 class="font-bold text-lg mt-2">Impermeabilizante Acrílico Fester</h3>
              <p class="text-gray-600 text-sm">Solución duradera y de fácil aplicación</p>
              <div class="mt-4 flex justify-between items-center">
                <span class="font-bold text-xl">$1,444.15</span>
                <a href="productos.php" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">Ver más</a>
              </div>
            </div>
          </div>
        </div>
        <div style="height: 20px;"></div>
        <div class="text-center mt-10">
          <a href="productos.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
            🛒 Ver todos los productos
          </a>
        </div>
      </div>
    </div>

    <!-- Beneficios -->
    <div class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative">
          <span class="relative z-10">¿Por qué elegirnos?</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Beneficio 1 -->
          <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg card-hover">
            <div class="bg-blue-50 rounded-full w-20 h-20 flex items-center justify-center mb-6 mx-auto">
              <img src="Recursos/variedad.png" alt="Todo en un mismo lugar" class="w-12 h-12">
            </div>
            <h3 class="text-xl font-bold text-center mb-4 text-gray-800">Todo en un lugar</h3>
            <p class="text-gray-600 text-center">Encuentra en un solo sitio todos los materiales que necesitas para tu proyecto. Ofrecemos variedad, calidad y precios accesibles. 🧰</p>
          </div>

          <!-- Beneficio 2 -->
          <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg card-hover">
            <div class="bg-blue-50 rounded-full w-20 h-20 flex items-center justify-center mb-6 mx-auto">
              <img src="Recursos/envios.png" alt="Envío a domicilio" class="w-12 h-12">
            </div>
            <h3 class="text-xl font-bold text-center mb-4 text-gray-800">Envíos a domicilio</h3>
            <p class="text-gray-600 text-center">Recibe tus materiales directamente en tu obra. Ahorra tiempo y dinero con nuestro servicio de entrega confiable y puntual. 🚚</p>
          </div>

          <!-- Beneficio 3 -->
          <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-lg card-hover">
            <div class="bg-blue-50 rounded-full w-20 h-20 flex items-center justify-center mb-6 mx-auto">
              <img src="Recursos/pagos.png" alt="Formas de pago" class="w-12 h-12">
            </div>
            <h3 class="text-xl font-bold text-center mb-4 text-gray-800">Formas de pago</h3>
            <p class="text-gray-600 text-center">Compra con seguridad usando tarjeta de débito, crédito, PayPal o pago en efectivo al recoger. 💳</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonios -->
    <div class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative">
          <span class="relative z-10">Testimonios que nos avalan</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
        </h2>

        <section class="w-full relative overflow-hidden">
          <div class="max-w-screen-2xl mx-auto">
            <!-- Slider track -->
            <div id="slider" class="slider-track">

              <!-- Testimonio 1 -->
              <div class="testimonial-card">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-8 md:p-10 h-full flex flex-col justify-between border-8 border-gray-500 transition-all duration-300 hover:-translate-y-1">
                  <p class="mb-6 text-gray-700 text-sm md:text-base leading-relaxed">"Directo a Obra ha revolucionado la forma en que gestiono mis proyectos de construcción. La calidad y puntualidad son excepcionales."</p>
                  <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Juan Pérez" class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-blue-200" />
                    <div>
                      <p class="font-semibold text-gray-800 text-sm md:text-base">Juan Pérez</p>
                      <p class="text-xs md:text-sm text-orange-600 font-medium">Ingeniero Civil</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Testimonio 2 -->
              <div class="testimonial-card">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-8 md:p-10 h-full flex flex-col justify-between border-8 border-gray-500 transition-all duration-300 hover:-translate-y-1">
                  <p class="mb-6 text-gray-700 text-sm md:text-base leading-relaxed">"La variedad de productos y la facilidad para encontrar todo en un solo lugar hace que sea mi primera opción."</p>
                  <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="María López" class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-pink-200" />
                    <div>
                      <p class="font-semibold text-gray-800 text-sm md:text-base">María López</p>
                      <p class="text-xs md:text-sm text-orange-600 font-medium">Arquitecta</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Testimonio 3 -->
              <div class="testimonial-card">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-8 md:p-10 h-full flex flex-col justify-between border-8 border-gray-500 transition-all duration-300 hover:-translate-y-1">
                  <p class="mb-6 text-gray-700 text-sm md:text-base leading-relaxed">"Excelente servicio al cliente y precios competitivos. He ahorrado tiempo y dinero trabajando con ellos."</p>
                  <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/men/85.jpg" alt="Carlos Méndez" class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-green-200" />
                    <div>
                      <p class="font-semibold text-gray-800 text-sm md:text-base">Carlos Méndez</p>
                      <p class="text-xs md:text-sm text-orange-600 font-medium">Contratista</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Testimonio 4 -->
              <div class="testimonial-card">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-8 md:p-10 h-full flex flex-col justify-between border-8 border-gray-500 transition-all duration-300 hover:-translate-y-1">
                  <p class="mb-6 text-gray-700 text-sm md:text-base leading-relaxed">"La rapidez en la entrega y calidad de materiales superaron mis expectativas. Los recomiendo totalmente."</p>
                  <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Lucía Ramírez" class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-orange-200" />
                    <div>
                      <p class="font-semibold text-gray-800 text-sm md:text-base">Lucía Ramírez</p>
                      <p class="text-xs md:text-sm text-orange-600 font-medium">Gerente de Obra</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Testimonio 5 -->
              <div class="testimonial-card">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-8 md:p-10 h-full flex flex-col justify-between border-8 border-gray-500 transition-all duration-300 hover:-translate-y-1">
                  <p class="mb-6 text-gray-700 text-sm md:text-base leading-relaxed">"Poder comparar precios fácilmente y tomar decisiones informadas ha hecho mi empresa más rentable."</p>
                  <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/men/21.jpg" alt="Alberto Torres" class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-indigo-200" />
                    <div>
                      <p class="font-semibold text-gray-800 text-sm md:text-base">Alberto Torres</p>
                      <p class="text-xs md:text-sm text-orange-600 font-medium">Comprador Industrial</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Testimonio 6 -->
              <div class="testimonial-card">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-8 md:p-10 h-full flex flex-col justify-between border-8 border-gray-500 transition-all duration-300 hover:-translate-y-1">
                  <p class="mb-6 text-gray-700 text-sm md:text-base leading-relaxed">"La plataforma es muy intuitiva y el servicio al cliente excepcional. Una experiencia de compra satisfactoria."</p>
                  <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/women/52.jpg" alt="Sandra Gómez" class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-purple-200" />
                    <div>
                      <p class="font-semibold text-gray-800 text-sm md:text-base">Sandra Gómez</p>
                      <p class="text-xs md:text-sm text-orange-600 font-medium">Diseñadora de Interiores</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Botones -->
          <button id="prevBtn" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white w-10 h-10 md:w-12 md:h-12 rounded-full shadow-lg transition-all duration-300 z-10 flex items-center justify-center">
            &#x276E;
          </button>
          <button id="nextBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white w-10 h-10 md:w-12 md:h-12 rounded-full shadow-lg transition-all duration-300 z-10 flex items-center justify-center">
            &#x276F;
          </button>
        </section>
      </div>
    </div>

    <!-- Preguntas Frecuentes -->
    <div class="py-16 bg-gray-50">
      <div class="container mx-auto px-4 max-w-4xl">
        <h2 class="text-3xl font-bold text-center mb-12 relative">
          <span class="relative z-10">Preguntas Frecuentes</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-600"></span>
        </h2>

        <div class="space-y-5">
          <!-- Pregunta 1 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <details class="group">
              <summary class="flex justify-between items-center p-6 cursor-pointer bg-white hover:bg-blue-50 transition-all">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                  <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                  ¿Quiénes pueden comprar en Directo a Obra?
                </h3>
                <span class="text-blue-600 bg-blue-50 p-1 rounded-full transform transition-transform group-open:rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </summary>
              <div class="p-6 bg-blue-50 border-t border-blue-100">
                <p class="text-gray-700">Cualquier persona interesada en materiales de construcción puede comprar, desde particulares que necesitan productos para remodelar su hogar, hasta constructoras o empresas.</p>
              </div>
            </details>
          </div>

          <!-- Pregunta 2 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <details class="group">
              <summary class="flex justify-between items-center p-6 cursor-pointer bg-white hover:bg-blue-50 transition-all">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                  <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </span>
                  ¿Cuál es el horario de atención?
                </h3>
                <span class="text-blue-600 bg-blue-50 p-1 rounded-full transform transition-transform group-open:rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </summary>
              <div class="p-6 bg-blue-50 border-t border-blue-100">
                <p class="text-gray-700">Nuestro horario de atención es de lunes a viernes de 9:00 a.m. a 6:00 p.m. y sábados de 9:00 a.m. a 2:00 p.m. Puedes hacer pedidos en línea las 24 horas.</p>
              </div>
            </details>
          </div>

          <!-- Pregunta 3 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <details class="group">
              <summary class="flex justify-between items-center p-6 cursor-pointer bg-white hover:bg-blue-50 transition-all">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                  <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                  </span>
                  ¿Hacen envíos a todo el país?
                </h3>
                <span class="text-blue-600 bg-blue-50 p-1 rounded-full transform transition-transform group-open:rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </summary>
              <div class="p-6 bg-blue-50 border-t border-blue-100">
                <p class="text-gray-700">Sí, realizamos envíos a todo México. En zonas metropolitanas tenemos entrega exprés y en otras regiones coordinamos el envío con paqueterías o transportistas locales. El costo y tiempo de entrega se calculan al ingresar tu dirección, con un maximo de 15 días.</p>
              </div>
            </details>
          </div>

          <!-- Pregunta 4 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <details class="group">
              <summary class="flex justify-between items-center p-6 cursor-pointer bg-white hover:bg-blue-50 transition-all">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                  <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                  </span>
                  ¿Puedo pagar con tarjeta de crédito?
                </h3>
                <span class="text-blue-600 bg-blue-50 p-1 rounded-full transform transition-transform group-open:rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </summary>
              <div class="p-6 bg-blue-50 border-t border-blue-100">
                <p class="text-gray-700">Sí, aceptamos pagos con tarjetas de crédito y débito Visa, Mastercard y American Express. También puedes pagar por PayPal.</p>
              </div>
            </details>
          </div>

          <!-- Pregunta 5 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <details class="group">
              <summary class="flex justify-between items-center p-6 cursor-pointer bg-white hover:bg-blue-50 transition-all">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                  <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                  </span>
                  ¿Tienen garantía los productos?
                </h3>
                <span class="text-blue-600 bg-blue-50 p-1 rounded-full transform transition-transform group-open:rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </summary>
              <div class="p-6 bg-blue-50 border-t border-blue-100">
                <p class="text-gray-700">Todos nuestros productos cuentan con garantía de fábrica, siempre y cuando se utilicen bajo condiciones adecuadas y conforme a las especificaciones técnicas. En caso de algún defecto, gestionamos el reemplazo o reembolso.</p>
              </div>
            </details>
          </div>

          <!-- Pregunta 6 -->
          <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <details class="group">
              <summary class="flex justify-between items-center p-6 cursor-pointer bg-white hover:bg-blue-50 transition-all">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                  <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </span>
                  ¿Cómo puedo rastrear mi pedido?
                </h3>
                <span class="text-blue-600 bg-blue-50 p-1 rounded-full transform transition-transform group-open:rotate-180">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </summary>
              <div class="p-6 bg-blue-50 border-t border-blue-100">
                <p class="text-gray-700">Una vez que tu pedido sea enviado, recibirás un correo electrónico con el número de guía para rastrear tu envío. También puedes consultar el estado de tu pedido en tu cuenta de usuario o contactando directamente a nuestro servicio de atención al cliente.</p>
              </div>
            </details>
          </div>
        </div>
      </div>
    </div>

    <!-- Nuestra Ubicación -->
    <div class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
      <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 relative">
          <span class="relative z-10 text-gray-800">📍 Nuestra Ubicación</span>
          <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-gradient-to-r from-blue-500 to-orange-500 rounded-full"></span>
        </h2>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Visítanos en nuestra sucursal principal en Tecámac, Estado de México</p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          <!-- Información de Contacto -->
          <div class="bg-white rounded-2xl shadow-xl p-8 border-4 border-gray-300">
            <div class="text-center mb-8">
              <div class="bg-gradient-to-br from-blue-500 to-blue-700 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="text-3xl text-white">🏢</span>
              </div>
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Directo a Obra</h3>
              <p class="text-orange-600 font-semibold">Materiales para Construcción</p>
            </div>

            <!-- Dirección -->
            <div class="mb-6 p-4 bg-blue-50 rounded-xl border-l-4 border-blue-500">
              <div class="flex items-start">
                <div class="bg-blue-100 p-2 rounded-full mr-4 mt-1">
                  <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-1">Dirección</h4>
                  <p class="text-gray-700">Los Héroes Tecámac</p>
                  <p class="text-gray-700">Estado de México, México</p>
                  <p class="text-sm text-gray-500 mt-1">C.P. 55764</p>
                </div>
              </div>
            </div>

            <!-- Teléfono -->
            <div class="mb-6 p-4 bg-green-50 rounded-xl border-l-4 border-green-500">
              <div class="flex items-center">
                <div class="bg-green-100 p-2 rounded-full mr-4">
                  <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-1">Teléfono</h4>
                  <a href="tel:5568800778" class="text-green-600 font-semibold hover:text-green-700 transition-colors">
                    📞 55-6880-0778
                  </a>
                </div>
              </div>
            </div>

            <!-- Horarios -->
            <div class="mb-6 p-4 bg-orange-50 rounded-xl border-l-4 border-orange-500">
              <div class="flex items-start">
                <div class="bg-orange-100 p-2 rounded-full mr-4 mt-1">
                  <svg class="w-5 h-5 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-bold text-gray-800 mb-2">Horarios de Atención</h4>
                  <div class="space-y-1">
                    <p class="text-gray-700 flex justify-between">
                      <span>🗓️ Lunes a Viernes:</span>
                      <span class="font-semibold text-orange-600">9:00 AM - 6:00 PM</span>
                    </p>
                    <p class="text-gray-700 flex justify-between">
                      <span>🗓️ Sábados:</span>
                      <span class="font-semibold text-orange-600">9:00 AM - 2:00 PM</span>
                    </p>
                    <p class="text-gray-700 flex justify-between">
                      <span>🗓️ Domingos:</span>
                      <span class="font-semibold text-red-500">Cerrado</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Botones de Acción -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <a href="https://www.google.com/maps?q=19.63019227865338,-99.03550258664596"
                target="_blank"
                class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
                Cómo Llegar
              </a>
              <a href="tel:5568800778"
                class="flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                Llamar Ahora
              </a>
            </div>
          </div>

          <!-- Mapa -->
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-4 border-gray-300">
            <div class="relative h-full min-h-[500px]">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4950.815973800464!2d-99.03550258664596!3d19.63019227865338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1743840557887!5m2!1ses-419!2smx"
                width="100%" height="100%" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-full"
                style="border:0;">
              </iframe>
              <div class="absolute top-4 left-4 bg-white px-4 py-3 rounded-xl shadow-lg border-2 border-blue-200">
                <h3 class="font-bold text-blue-600 flex items-center">
                  <span class="mr-2">🏢</span>
                  Directo a Obra
                </h3>
                <p class="text-gray-600 text-sm">📍 Los Héroes Tecámac</p>
              </div>
            </div>
          </div>
        </div>


      </div>
      <div style="height: 20px;"></div>
    </div>

    <div class="px-8 md:px-20 lg:px-40 py-20 text-center bg-gray-50">
      <div style="height: 30px;"></div>
      <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
        ¿Todavía tienes preguntas<br>
        <span class="text-gray-900"> acerca de nosotros?.</span>
      </h1>
      <p class="mt-6 text-gray-600 text-base md:text-lg leading-relaxed">
        Si no encontraste la respuesta que buscabas en nuestras<br class="hidden md:block">
        preguntas frecuentes, no dudes en ponerte en contacto con<br class="hidden md:block">
        nuestro equipo de soporte.
      </p>
      <div style="height: 30px;"></div>
      <div class="flex flex-wrap gap-4 justify-center">
        <a href="productos.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 border border-blue-500">
          🛒 Ver catálogo completo
        </a>
        <a href="contacto.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300 border border-blue-500">
          📧 Solicitar información
        </a>
      </div>
    </div>
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
    //
    const items = document.querySelectorAll('.accordion-item');

    items.forEach(item => {
      const title = item.querySelector('.accordion-title');
      const content = item.querySelector('.accordion-content');
      const icon = item.querySelector('.accordion-icon');

      title.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        items.forEach(i => {
          i.classList.remove('active');
          i.querySelector('.accordion-content').style.maxHeight = '0';
          i.querySelector('.accordion-icon').classList.remove('rotate-45');
        });

        if (!isActive) {
          item.classList.add('active');
          content.style.maxHeight = content.scrollHeight + 'px';
          icon.classList.add('rotate-45');
        }
      });
    });

    //Testimonios
    const slider = document.getElementById("slider");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    let index = 0;

    const updateSlider = () => {
      const screenWidth = window.innerWidth;
      const totalCards = slider.children.length;
      const visibleCards = screenWidth >= 1024 ? 3 : screenWidth >= 768 ? 2 : 1;
      const maxIndex = totalCards - visibleCards;

      // Clamp index
      if (index < 0) index = 0;
      if (index > maxIndex) index = maxIndex;

      const cardWidth = 100 / visibleCards;
      const translateX = -(index * cardWidth);
      slider.style.transform = `translateX(${translateX}%)`;

      // Disable buttons at ends
      prevBtn.disabled = index === 0;
      nextBtn.disabled = index >= maxIndex;

      // Update button opacity
      prevBtn.style.opacity = index === 0 ? "0.5" : "1";
      nextBtn.style.opacity = index >= maxIndex ? "0.5" : "1";
    };

    prevBtn.addEventListener("click", () => {
      index--;
      updateSlider();
    });

    nextBtn.addEventListener("click", () => {
      index++;
      updateSlider();
    });

    window.addEventListener("resize", updateSlider);
    updateSlider();
  </script>

</body>

</html>