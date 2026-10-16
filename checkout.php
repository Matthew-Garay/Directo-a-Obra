<?php
require 'configuracion/configproducts.php';
require 'configuracion/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Directo a Obra - Carrito de Compras</title>
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blue: {
                            50: '#f0f7ff',
                            100: '#e0f0fe',
                            200: '#bae0fd',
                            300: '#7cc5fb',
                            400: '#3aa3f7',
                            500: '#1a85f8',
                            600: '#0967d3',
                            700: '#0552ab',
                            800: '#064789',
                            900: '#0a3c72',
                        },
                        indigo: {
                            50: '#f0f5ff',
                            100: '#e5edff',
                            200: '#cddbfe',
                            300: '#b4c6fc',
                            400: '#8da2fb',
                            500: '#6875f5',
                            600: '#5850ec',
                            700: '#5145cd',
                            800: '#42389d',
                            900: '#362f78',
                        },
                        red: {
                            500: '#ef4444',
                            600: '#dc2626',
                        },
                        green: {
                            500: '#10b981',
                            600: '#059669',
                        }
                    },
                    boxShadow: {
                        'card': '0 4px 15px rgba(0, 0, 0, 0.08)',
                    }
                }
            }
        }
    </script>
    <style>
        .btn-blue {
            @apply bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-md hover:shadow-lg transition-all duration-300 flex items-center justify-center;
        }

        .btn-green {
            @apply bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out flex items-center justify-center;
        }

        .btn-outline {
            @apply border border-blue-300 text-blue-700 px-6 py-2 rounded-md hover:bg-blue-50 transition-colors flex items-center justify-center;
        }

        .card {
            @apply bg-white rounded-xl shadow-md overflow-hidden border border-blue-100;
        }

        .gradient-bg {
            @apply bg-gradient-to-r from-blue-500 to-indigo-600;
        }

        .gradient-bg-light {
            @apply bg-gradient-to-r from-blue-50 to-indigo-50;
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
        <div style="height: 25px;"></div>
        <div class="container mx-auto max-w-6xl">
            <!-- Breadcrumb (migas de pan) -->
            <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
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
                            <span class="text-gray-500 ml-1 md:ml-2 font-medium">Carrito de Compras</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Título del carrito con estilo mejorado -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-800 mb-2">Tu Carrito de Compras</h1>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto"></div>
            </div>

            <!-- Barra de progreso del checkout -->
            <div class="mb-8">
                <div class="flex justify-between mb-2">
                    <div class="text-center flex-1">
                        <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <span class="text-sm font-medium text-blue-800 mt-1 block">Carrito</span>
                    </div>
                    <div class="text-center flex-1">
                        <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-500 mt-1 block">Pago</span>
                    </div>
                </div>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 w-1/3 h-full"></div>
                    </div>
                </div>
            </div>

            <!-- Contenedor principal -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-blue-100 p-6">
                <?php if ($lista_carrito == null) { ?>
                    <!-- Carrito vacío con diseño mejorado -->
                    <div class="py-20 flex flex-col items-center">
                        <div class="text-7xl text-blue-300 mb-8">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-800 mb-4">Tu carrito está vacío</h3>
                        <p class="text-gray-600 mb-10 text-center max-w-md">Explora nuestra tienda y encuentra los productos que necesitas para tu proyecto.</p>
                        <a href="productos.php" class="btn-blue text-lg">
                            <i class="fas fa-store mr-2"></i> Explorar productos
                        </a>
                    </div>
                <?php } else { ?>
                    <!-- Carrito con productos -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-blue-200 gradient-bg-light">
                                    <th class="py-6 px-6 text-left text-blue-800 font-semibold">Producto</th>
                                    <th class="py-6 px-6 text-center text-blue-800 font-semibold">Precio</th>
                                    <th class="py-6 px-6 text-center text-blue-800 font-semibold">Cantidad</th>
                                    <th class="py-6 px-6 text-center text-blue-800 font-semibold">Subtotal</th>
                                    <th class="py-6 px-6 text-center text-blue-800 font-semibold"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($lista_carrito as $producto) {
                                    $_id = $producto['id'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio'];
                                    $descuento = $producto['descuento'];
                                    $cantidad = $producto['cantidad'];
                                    $precio_desc = $precio - (($precio * $descuento) / 100);
                                    $subtotal = $cantidad * $precio_desc;
                                    $total += $subtotal;
                                ?>
                                    <tr class="border-b border-gray-100 hover:bg-blue-50 transition-colors">
                                        <td class="py-8 px-6">
                                            <div class="flex items-center">
                                                <div class="w-16 h-16 bg-white rounded-lg overflow-hidden mr-4 shadow-sm border border-blue-100">
                                                    <img src="<?php echo 'Recursos/productos/' . $_id . '/producto.png'; ?>" alt="<?php echo $nombre; ?>" class="w-full h-full object-contain">
                                                </div>
                                                <div>
                                                    <span class="font-semibold text-blue-800"><?php echo $nombre; ?></span>
                                                    <?php if ($descuento > 0) { ?>
                                                        <div class="mt-1">
                                                            <span class="inline-block bg-red-600 text-white text-xs px-2 py-0.5 rounded-md">
                                                                <?php echo $descuento; ?>% DESCUENTO
                                                            </span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-8 px-6 text-center">
                                            <?php if ($descuento > 0) { ?>
                                                <div>
                                                    <span class="text-gray-400 line-through text-sm">
                                                        <?php echo MONEDA . number_format($precio, 2, '.', ','); ?>
                                                    </span>
                                                    <div class="text-gray-800 font-medium text-lg mt-1">
                                                        <?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <span class="text-gray-800 font-medium text-lg"><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="py-8 px-6 text-center">
                                            <div class="flex justify-center">
                                                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value,<?php echo $_id; ?>)" class="w-16 text-center border border-blue-300 rounded-md py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                        </td>
                                        <td class="py-8 px-6 text-center">
                                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]" class="text-blue-700 font-bold text-lg">
                                                <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                            </div>
                                        </td>
                                        <td class="py-8 px-6 text-center">
                                            <button id="eliminar" class="bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-500 transition-colors p-2 rounded-full shadow-sm hover:shadow-md" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Sección de total y botones con diseño mejorado -->
                    <div class="mt-12 pt-8 border-t border-blue-100">
                        <!-- Opciones de envío -->
                        <div class="mb-8 p-4 gradient-bg-light rounded-lg border border-blue-200">
                            <h3 class="text-blue-800 font-semibold mb-3">Opciones de envío</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input type="radio" id="envio-estandar" name="tipo-envio" value="estandar" checked class="text-blue-600 focus:ring-blue-500">
                                    <label for="envio-estandar" class="ml-2 flex flex-col">
                                        <span class="font-medium">Envío estándar (5-15 días hábiles)</span>
                                        <span class="text-sm text-gray-500">$99.00</span>
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="envio-express" name="tipo-envio" value="express" class="text-blue-600 focus:ring-blue-500">
                                    <label for="envio-express" class="ml-2 flex flex-col">
                                        <span class="font-medium">Envío express (1-4 días hábiles)</span>
                                        <span class="text-sm text-gray-500">$199.00</span>
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="envio-recoger" name="tipo-envio" value="recoger" class="text-blue-600 focus:ring-blue-500">
                                    <label for="envio-recoger" class="ml-2 flex flex-col">
                                        <span class="font-medium">Recoger en tienda</span>
                                        <span class="text-sm text-gray-500">Gratis</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Total a pagar -->
                        <div class="flex justify-between items-center mb-8">
                            <span class="text-xl text-blue-700 font-medium">Resumen:</span>
                            <div class="space-y-2 text-right">
                                <div class="flex justify-between gap-8">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-medium"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></span>
                                </div>
                                <div class="flex justify-between gap-8">
                                    <span class="text-gray-600">Envío:</span>
                                    <span class="font-medium" id="envio"><?php echo MONEDA; ?>99.00</span>
                                </div>
                                <div class="pt-2 mt-2 border-t border-blue-100">
                                    <div id="total" class="text-2xl font-bold text-blue-800">
                                        <?php echo MONEDA . number_format($total + 99, 2, '.', ','); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-between gap-6">
                            <a href="productos.php" class="btn-outline">
                                <i class="fas fa-arrow-left mr-2"></i> Seguir comprando
                            </a>
                            <a href="pago.php" class="btn-green text-lg">
                                <i class="fas fa-credit-card mr-2"></i> Proceder al pago
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div style="height: 100px;"></div>
    </main>

    <!-- Modal de confirmación para eliminar con diseño mejorado -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content border-0 rounded-xl shadow-lg">
                <div class="modal-header border-0 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <h5 class="modal-title font-semibold" id="eliminaModalLabel">Eliminar producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-6">
                    <div class="text-center text-4xl text-red-500 mb-4">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <p class="text-gray-700 text-center">¿Estás seguro de que deseas eliminar este producto del carrito?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btn-elimina" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors shadow-sm hover:shadow-md" onclick="eliminar()">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>

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
        // Manejar opciones de envío
        const opcionesEnvio = document.querySelectorAll('input[name="tipo-envio"]');
        let costoEnvio = 99.00;
        let subtotal = <?php echo $total; ?>;

        opcionesEnvio.forEach(opcion => {
            opcion.addEventListener('change', function() {
                switch (this.value) {
                    case 'estandar':
                        costoEnvio = 99.00;
                        break;
                    case 'express':
                        costoEnvio = 199.00;
                        break;
                    case 'recoger':
                        costoEnvio = 0.00;
                        break;
                }
                actualizarTotales();
                mostrarMensaje(`Opción de envío actualizada`, 'success');
            });
        });

        function actualizarTotales() {
            const envioElement = document.getElementById('envio');
            const totalElement = document.getElementById('total');

            if (envioElement && totalElement) {
                // Formatear el costo de envío con el formato correcto
                envioElement.textContent = '<?php echo MONEDA; ?>' + costoEnvio.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                // Calcular y formatear el total
                const total = subtotal + costoEnvio;
                totalElement.textContent = '<?php echo MONEDA; ?>' + total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        }

        // Mostrar mensaje toast
        function mostrarMensaje(mensaje, tipo = 'success') {
            const toast = document.createElement('div');
            let bgColor = tipo === 'success' ? 'bg-green-600' : 'bg-red-600';
            toast.className = `fixed bottom-4 left-1/2 transform -translate-x-1/2 ${bgColor} text-white px-4 py-2 rounded-lg shadow-lg z-50 text-sm sm:text-base`;
            toast.textContent = mensaje;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value = id
        })

        function actualizaCantidad(cantidad, id) {
            let url = 'clases/actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors',
            }).then(response => response.json())
            location.reload()
                .then(data => {
                    if (data.ok) {
                        let subtotalElement = document.getElementById('subtotal_' + id);
                        subtotalElement.innerHTML = data.sub;

                        let total = 0.00;
                        let list = document.getElementsByName('subtotal[]');
                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));
                        }
                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total);

                        document.getElementById('total').innerHTML = '<?php echo MONEDA ?>' + total;
                    }
                })
        }

        function eliminar() {
            let botonElimina = document.getElementById('btn-elimina')
            let id = botonElimina.value
            let url = 'clases/actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('id', id)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        location.reload()
                    }
                })
        }
    </script>
</body>

</html>