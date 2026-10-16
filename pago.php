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
} else {
    header("Location: Index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#1D4ED8" />

    <title>Finalizar Pago - Directo a Obra</title>
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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
                    screens: {
                        'xs': '480px',
                    }
                }
            }
        }
    </script>
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
        <div style="height: 15px;"></div>
        <!-- Breadcrumb (migas de pan) -->
        <nav class="flex mb-6 text-sm container mx-auto max-w-6xl" aria-label="Breadcrumb">
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
                        <a href="checkout.php" class="text-gray-600 hover:text-blue-600 ml-1 md:ml-2">Carrito de Compras</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-500 ml-1 md:ml-2 font-medium">Pago</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Barra de progreso del Pago -->
        <div class="container mx-auto max-w-6xl mb-8">
            <div class="flex justify-between mb-2">
                <div class="text-center flex-1">
                    <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="text-sm font-medium text-green-600 mt-1 block">Carrito</span>
                </div>
                <div class="text-center flex-1">
                    <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="text-sm font-medium text-blue-800 mt-1 block">Pago</span>
                </div>
            </div>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                    <div class="bg-gradient-to-r from-green-500 via-blue-500 to-blue-500 w-2/3 h-full"></div>
                </div>
            </div>
        </div>


        <div style="height: 30px;"></div>
        <!-- Contenedor principal con sombra y bordes redondeados -->
        <div class="container mx-auto max-w-6xl bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Encabezado de la página -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-6 px-8">
                <h2 class="text-3xl font-bold text-center">Finalizar Compra</h2>
                <p class="text-center text-blue-100 mt-2">Estás a un paso de recibir tus materiales de construcción</p>
            </div>

            <!-- Contenido principal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8">
                <!-- Columna de pago -->
                <div class="bg-gray-50 p-6 rounded-xl shadow-inner">
                    <div class="flex items-center justify-center mb-6">
                        <div class="bg-blue-600 text-white rounded-full p-3 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Detalles del Pago</h3>
                    </div>

                    <!-- Información de seguridad -->
                    <div class="bg-blue-50 border-l-4 border-blue-600 p-4 mb-6 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-800">
                                    Pago seguro con PayPal. Tus datos están protegidos.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de PayPal con contenedor mejorado -->
                    <div id="paypal-button-container" class="mt-6 bg-white p-5 rounded-lg shadow-sm border border-gray-200"></div>
                </div>

                <!-- Columna de resumen de compra -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-xl font-bold text-gray-800">Resumen de tu Compra</h3>
                    </div>

                    <div class="divide-y divide-gray-200">
                        <?php if ($lista_carrito == null) { ?>
                            <div class="p-6 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <p class="mt-4 text-lg font-medium text-gray-900">Tu carrito está vacío</p>
                                <p class="mt-2 text-sm text-gray-500">Parece que no has agregado ningún producto a tu carrito.</p>
                            </div>
                            <?php } else {
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
                                <!-- Producto individual -->
                                <div class="flex items-center p-4 hover:bg-gray-50">
                                    <div class="flex-shrink-0 w-20 h-20 bg-gray-100 rounded-md overflow-hidden">
                                        <img src="<?php echo 'Recursos/productos/' . $_id . '/producto.png'; ?>"
                                            alt="<?php echo $nombre; ?>"
                                            class="w-full h-full object-contain p-1">
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="font-medium text-gray-900"><?php echo $nombre; ?></div>
                                        <div class="text-sm text-gray-500">Cantidad: <?php echo $cantidad; ?></div>
                                        <?php if ($descuento > 0) { ?>
                                            <div class="text-xs text-green-600 font-medium">
                                                <?php echo $descuento; ?>% de descuento aplicado
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="text-right">
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]" class="font-medium text-[#1D4ED8]">
                                            <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Totales -->
                            <div class="p-6 bg-gray-50">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Envío</span>
                                    <span class="font-medium"><?php echo MONEDA; ?>99.00</span>
                                </div>
                                <div class="border-t border-gray-200 mt-4 pt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total a pagar</span>
                                    <span id="total" class="text-2xl font-bold text-[#1D4ED8]">
                                        <?php echo MONEDA . number_format($total + 99, 2, '.', ','); ?>
                                    </span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Información adicional -->
            <div class="bg-gray-50 p-6 border-t border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 p-3 rounded-full mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">Pago Seguro</h4>
                        <p class="text-sm text-gray-500 mt-1">Tus datos están protegidos</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 p-3 rounded-full mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">Soporte 24/7</h4>
                        <p class="text-sm text-gray-500 mt-1">Estamos para ayudarte</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 p-3 rounded-full mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h4 class="font-medium text-gray-900">Entrega Rápida</h4>
                        <p class="text-sm text-gray-500 mt-1">Recibe tus productos pronto</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px;"></div>
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
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENTE_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total + 99;  ?>
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                let URL = 'clases/captura.php'
                actions.order.capture().then(function(detalles) {
                    console.log(detalles)

                    let url = 'clases/captura.php'

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    }).then(function(responsive) {
                        window.location.href = "completado.html"
                    })
                });
            },
            onCancel: function(data) {
                alert('Pago Cancelado')
                console.log(data)
            }
        }).render('#paypal-button-container');
    </script>
    </div>
</body>

</html>