<?php
require 'configuracion/configproducts.php';
require 'configuracion/database.php';

$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    if ($token == $token_tmp) {
        $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'] ?? 0; // Si no hay descuento, será 0

            // Calcular precio con descuento solo si hay descuento
            if ($descuento > 0) {
                $precio_desc = $precio - (($precio * $descuento) / 100);
            } else {
                $precio_desc = $precio;
            }

            $dir_images = 'Recursos/productos/' . $id . '/';
            $rutaImg = $dir_images . 'producto.png';

            // Verificar si existe la imagen principal
            if (!file_exists($rutaImg)) {
                $rutaImg = "Recursos/sinfoto.png";
            }

            // Obtener imágenes adicionales
            $imagenes = array();
            if (is_dir($dir_images)) {
                $dir = dir($dir_images);
                while (($archivo = $dir->read()) !== false) {
                    if ($archivo != '.' && $archivo != '..' && $archivo != 'producto.png') {
                        if (
                            strpos($archivo, '.png') !== false ||
                            strpos($archivo, '.jpg') !== false ||
                            strpos($archivo, '.jpeg') !== false
                        ) {
                            $imagenes[] = $dir_images . $archivo;
                        }
                    }
                }
                $dir->close();
            }
        } else {
            echo "Producto no encontrado o inactivo.";
            exit;
        }
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Detalles del Producto - Directo a Obra <?php echo htmlspecialchars($nombre); ?></title>
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/script.js"></script>
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

    <main class="flex-grow p-4 sm:p-6">
        <div style="height: 25px;"></div>
        <!-- Breadcrumb (migas de pan) -->
        <nav class="flex mb-4 text-sm container mx-auto px-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="Index.php" class="text-gray-600 hover:text-blue-600 inline-flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="productos.php" class="text-gray-600 hover:text-blue-600 ml-1 md:ml-2">Productos</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-500 ml-1 md:ml-2 font-medium"><?php echo htmlspecialchars($nombre); ?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Columna izquierda (imágenes) -->
                <div class="w-full md:w-1/2">
                    <!-- Imagen principal -->
                    <div class="flex items-center justify-center h-64 sm:h-80 md:h-96 mb-4">
                        <img src="<?php echo $rutaImg; ?>"
                            alt="<?php echo htmlspecialchars($nombre); ?>"
                            class="max-h-full max-w-full object-contain"
                            id="mainImage">
                    </div>

                    <!-- Imágenes adicionales -->
                    <?php if (!empty($imagenes)): ?>
                        <div class="flex flex-wrap justify-center gap-3">
                            <?php foreach ($imagenes as $img): ?>
                                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-lg shadow-md p-1">
                                    <img src="<?php echo $img; ?>"
                                        class="w-full h-full object-contain rounded cursor-pointer"
                                        alt="Imagen adicional"
                                        onclick="cambiarImagenPrincipal(this.src)">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Columna derecha (información) -->
                <div class="w-full md:w-1/2">
                    <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6">
                        <!-- Título del producto -->
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-3 sm:mb-4"><?php echo htmlspecialchars($nombre); ?></h1>
                        <div class="h-0.5 bg-gray-200 mb-4 sm:mb-6"></div>

                        <!-- Precio y descuento -->
                        <div class="mb-4 sm:mb-6">
                            <?php if ($descuento > 0): ?>
                                <div class="flex flex-wrap items-center mb-2">
                                    <span class="text-base sm:text-lg text-gray-500 line-through">
                                        $<?php echo number_format($precio, 2, '.', ','); ?>
                                    </span>
                                    <span class="ml-2 px-2 sm:px-3 py-0.5 sm:py-1 bg-green-100 text-green-800 text-xs sm:text-sm font-semibold rounded-full">
                                        <?php echo $descuento; ?>% DESCUENTO
                                    </span>
                                </div>
                                <div class="bg-red-50 px-3 sm:px-4 py-1 sm:py-2 rounded-lg inline-block">
                                    <span class="text-xl sm:text-2xl md:text-3xl font-bold text-red-600">
                                        $<?php echo number_format($precio_desc, 2, '.', ','); ?>
                                    </span>
                                </div>
                            <?php else: ?>
                                <div class="bg-blue-50 px-3 sm:px-4 py-1 sm:py-2 rounded-lg inline-block">
                                    <span class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-600">
                                        $<?php echo number_format($precio, 2, '.', ','); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Descripción (colapsable en móvil) -->
                        <div class="mb-6">
                            <button class="flex justify-between items-center w-full text-left md:hidden" onclick="toggleDescription()">
                                <h2 class="text-base sm:text-lg font-semibold text-gray-700">Descripción del producto</h2>
                                <svg id="arrow-icon" class="w-5 h-5 transform transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <h2 class="hidden md:block text-lg font-semibold text-gray-700 mb-2">Descripción del producto</h2>
                            <div id="description-content" class="hidden md:block bg-gray-50 p-3 sm:p-4 rounded-lg border border-gray-200 mt-2">
                                <p class="text-sm sm:text-base text-gray-600">
                                    <?php echo $descripcion; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="space-y-2 sm:space-y-3">
                            <a href="#"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg shadow-md hover:shadow-lg transform transition-all duration-300 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 flex items-center justify-center text-sm sm:text-base"
                                onclick="comprarAhora(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">
                                <span class="mr-2">🛒</span> Comprar ahora
                            </a>

                            <button
                                class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg shadow-md hover:shadow-lg transform transition-all duration-300 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center justify-center text-sm sm:text-base"
                                onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">
                                <span class="mr-2">✅</span> Agregar al carrito
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 120px;"></div>
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

    <script>
        function cambiarImagenPrincipal(src) {
            document.getElementById('mainImage').src = src;
        }

        function addProducto(id, token) {
            let url = 'clases/carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        // Actualizar el número en el header
                        let elemento = document.getElementById("num_cart");
                        if (elemento) {
                            elemento.innerHTML = data.numero;
                        }
                        // Mostrar mensaje de éxito
                        mostrarMensaje("Producto agregado al carrito");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function comprarAhora(id, token) {
            // Primero agregamos el producto al carrito
            let url = 'clases/carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        // Actualizar el número en el header
                        let elemento = document.getElementById("num_cart");
                        if (elemento) {
                            elemento.innerHTML = data.numero;
                        }
                        // Redirigir a checkout.php
                        window.location.href = 'checkout.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function toggleDescription() {
            const content = document.getElementById('description-content');
            const arrow = document.getElementById('arrow-icon');

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                arrow.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                arrow.classList.remove('rotate-180');
            }
        }

        function mostrarMensaje(mensaje) {
            // Toast responsivo
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 text-sm sm:text-base';
            toast.textContent = mensaje;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    </script>
</body>

</html>