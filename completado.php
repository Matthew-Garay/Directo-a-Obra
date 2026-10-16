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
  <title>Compra Completada - Directo a Obra</title>
  <link rel="icon" href="Recursos/logo.ico" type="image/x-icon" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <script src="https://cdn.tailwindcss.com"></script>
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
    <div
      class="container mx-auto max-w-3xl bg-white rounded-xl shadow-lg overflow-hidden p-8 text-center">
      <div
        class="bg-green-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
        <svg
          class="w-12 h-12 text-green-600"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 13l4 4L19 7"></path>
        </svg>
      </div>

      <h1 class="text-3xl font-bold text-gray-800 mb-4">
        ¡Compra Completada!
      </h1>
      <p class="text-lg text-gray-600 mb-6">
        Tu pago ha sido procesado correctamente. Hemos enviado un correo
        electrónico con los detalles de tu compra y la factura.
      </p>

      <div class="bg-blue-50 p-4 rounded-lg mb-6 text-left">
        <p class="text-blue-800">
          <strong>Nota:</strong> Si no encuentras el correo en tu bandeja de
          entrada, revisa la carpeta de spam o correo no deseado.
        </p>
      </div>

      <div class="mt-8">
        <a
          href="productos.php"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md shadow-md transition duration-300">
          Seguir Comprando
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
  </script>
</body>

</html>