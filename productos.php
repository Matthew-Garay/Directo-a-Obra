<?php
require 'configuracion/database.php';
require 'configuracion/configproducts.php';

$db = new Database();
$con = $db->conectar();

// Inicializar variables de filtro
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$min_precio = isset($_GET['min_precio']) ? floatval($_GET['min_precio']) : 0;
$max_precio = isset($_GET['max_precio']) ? floatval($_GET['max_precio']) : 100000;
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'desc';

// Consulta base
$sql_base = "SELECT id, nombre, precio FROM productos WHERE activo = 1";
$params = [];

// Agregar filtro de categoría si está seleccionada
if (!empty($categoria)) {
    $sql_base .= " AND id_categoria = ?";
    $params[] = $categoria;
}

// Agregar filtro de precio
$sql_base .= " AND precio BETWEEN ? AND ?";
$params[] = $min_precio;
$params[] = $max_precio;

// Agregar ordenamiento por precio según la selección del usuario
$sql_base .= " ORDER BY precio " . ($orden === 'asc' ? 'ASC' : 'DESC');

// Preparar y ejecutar la consulta
$sql = $con->prepare($sql_base);
$sql->execute($params);
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

// Obtener categorías para el filtro
$sql_categorias = $con->prepare("SELECT DISTINCT id_categoria, COUNT(*) as cantidad FROM productos WHERE activo = 1 GROUP BY id_categoria");
$sql_categorias->execute();
$categorias = $sql_categorias->fetchAll(PDO::FETCH_ASSOC);

// Obtener rango de precios para el filtro
$sql_precios = $con->prepare("SELECT MIN(precio) as min_precio, MAX(precio) as max_precio FROM productos WHERE activo = 1");
$sql_precios->execute();
$rango_precios = $sql_precios->fetch(PDO::FETCH_ASSOC);

// Nombres de categorías
$nombres_categorias = [
    1 => 'Cemento',
    2 => 'Tabiques',
    3 => 'Varillas',
    4 => 'Mallas',
    5 => 'Impermeabilizantes',
    6 => 'Yesos',
    7 => 'Alambrado'
];

// Contar productos filtrados
$total_productos = count($resultado);
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Productos - Directo a Obra</title>
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/script.js"></script>

    <style>
        /* Estilos para el panel de filtros en móvil */
        @media (max-width: 768px) {
            #panel-filtros.active {
                display: block;
                animation: fadeIn 0.3s ease-in-out;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
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

    <main class="flex-grow p-4 sm:p-6">
        <div style="height: 25px;"></div>
        <div class="container mx-auto px-2 sm:px-4 py-2 sm:py-3">
            <!-- Breadcrumb (migas de pan) -->
            <nav class="flex mb-3 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="Index.php" class="text-gray-600 hover:text-blue-600 inline-flex items-center transition-colors duration-200">
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
                            <span class="text-gray-500 ml-1 md:ml-2 font-medium">Productos</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-800 mb-2">Materiales de Construcción</h1>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 mx-auto rounded-full"></div>
            </div>


            <div class="container mx-auto px-2 sm:px-4 py-4 sm:py-6">
                <!-- Botón para mostrar/ocultar filtros en móvil -->
                <div class="md:hidden mb-4">
                    <button id="toggle-filtros" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 px-4 rounded-lg flex items-center justify-between shadow-md hover:shadow-lg transition-all duration-300">
                        <span>Mostrar filtros</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Filtros y resultados -->
                <div class="flex flex-col md:flex-row gap-4 sm:gap-6">
                    <!-- Panel de filtros (izquierda) -->
                    <div id="panel-filtros" class="w-full md:w-1/4 bg-gradient-to-b from-blue-50 to-indigo-50 p-3 sm:p-4 rounded-lg shadow-lg hidden md:block border-l-4 border-blue-500">
                        <h3 class="text-lg font-semibold mb-3 sm:mb-4 text-blue-800 border-b-2 border-blue-200 pb-2">Filtros</h3>

                        <!-- Filtro por categorías -->
                        <div class="mb-6">
                            <h4 class="font-medium mb-3 text-blue-600">Categorías</h4>
                            <form action="" method="GET" id="filtro-categorias">
                                <?php if (isset($_GET['min_precio'])): ?>
                                    <input type="hidden" name="min_precio" value="<?php echo $_GET['min_precio']; ?>">
                                <?php endif; ?>
                                <?php if (isset($_GET['max_precio'])): ?>
                                    <input type="hidden" name="max_precio" value="<?php echo $_GET['max_precio']; ?>">
                                <?php endif; ?>
                                <?php if (isset($_GET['orden'])): ?>
                                    <input type="hidden" name="orden" value="<?php echo $_GET['orden']; ?>">
                                <?php endif; ?>

                                <div class="space-y-2">
                                    <div class="flex items-center p-2 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                        <input type="radio" id="todas" name="categoria" value=""
                                            <?php echo empty($categoria) ? 'checked' : ''; ?>
                                            class="text-blue-600 focus:ring-blue-500"
                                            onchange="document.getElementById('filtro-categorias').submit()">
                                        <label for="todas" class="ml-2 cursor-pointer transition-colors duration-200 <?php echo empty($categoria) ? 'text-blue-800 font-semibold' : 'text-gray-600'; ?>">
                                            Todas (<?php echo $total_productos; ?>)
                                        </label>
                                    </div>

                                    <?php foreach ($categorias as $cat): ?>
                                        <div class="flex items-center p-2 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                            <input type="radio" id="cat-<?php echo $cat['id_categoria']; ?>"
                                                name="categoria" value="<?php echo $cat['id_categoria']; ?>"
                                                <?php echo $categoria == $cat['id_categoria'] ? 'checked' : ''; ?>
                                                class="text-blue-600 focus:ring-blue-500"
                                                onchange="document.getElementById('filtro-categorias').submit()">
                                            <label for="cat-<?php echo $cat['id_categoria']; ?>"
                                                class="ml-2 cursor-pointer transition-colors duration-200 <?php echo $categoria == $cat['id_categoria'] ? 'text-blue-800 font-semibold' : 'text-gray-600'; ?>">
                                                <?php echo $nombres_categorias[$cat['id_categoria']] ?? 'Categoría ' . $cat['id_categoria']; ?>
                                                (<?php echo $cat['cantidad']; ?>)
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contenido principal (derecha) -->
                    <div class="w-full md:w-3/4">
                        <!-- Filtro de precio y contador de resultados -->
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-4 bg-gradient-to-r from-blue-50 to-indigo-50 p-3 sm:p-4 rounded-lg shadow-md gap-3 sm:gap-0 border border-blue-200">
                            <div class="w-full sm:w-auto text-center sm:text-left">
                                <p class="font-medium text-blue-800 mb-3">Productos encontrados: <span class="font-bold text-blue-900"><?php echo $total_productos; ?></span></p>
                                <div class="flex flex-col sm:flex-row items-center gap-2">
                                    <span class="text-sm font-medium text-gray-700">Ordenar por precio:</span>
                                    <div class="flex gap-2">
                                        <a href="?<?php echo http_build_query(array_merge($_GET, ['orden' => 'desc'])); ?>"
                                            class="inline-flex items-center px-3 py-2 rounded-lg text-xs font-semibold transition-all duration-300 <?php echo $orden === 'desc' ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-blue-100 hover:text-blue-700'; ?>">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            Mayor a menor
                                        </a>
                                        <a href="?<?php echo http_build_query(array_merge($_GET, ['orden' => 'asc'])); ?>"
                                            class="inline-flex items-center px-3 py-2 rounded-lg text-xs font-semibold transition-all duration-300 <?php echo $orden === 'asc' ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-blue-100 hover:text-blue-700'; ?>">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            Menor a mayor
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Filtro de precio -->
                            <div class="w-full sm:w-auto">
                                <form action="" method="GET" class="flex flex-wrap sm:flex-nowrap items-center justify-center sm:justify-end gap-2 sm:space-x-2" id="filtro-precio">
                                    <?php if (isset($_GET['categoria'])): ?>
                                        <input type="hidden" name="categoria" value="<?php echo $_GET['categoria']; ?>">
                                    <?php endif; ?>
                                    <?php if (isset($_GET['orden'])): ?>
                                        <input type="hidden" name="orden" value="<?php echo $_GET['orden']; ?>">
                                    <?php endif; ?>

                                    <label for="min_precio" class="text-sm font-medium text-blue-800">Precio:</label>
                                    <div class="flex items-center gap-1">
                                        <input type="number" id="min_precio" name="min_precio"
                                            value="<?php echo $min_precio; ?>"
                                            min="<?php echo floor($rango_precios['min_precio']); ?>"
                                            max="<?php echo ceil($rango_precios['max_precio']); ?>"
                                            class="border border-blue-300 rounded-lg px-2 py-1 w-20 sm:w-24 text-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">

                                        <span class="text-blue-800">-</span>

                                        <input type="number" id="max_precio" name="max_precio"
                                            value="<?php echo $max_precio; ?>"
                                            min="<?php echo floor($rango_precios['min_precio']); ?>"
                                            max="<?php echo ceil($rango_precios['max_precio']); ?>"
                                            class="border border-blue-300 rounded-lg px-2 py-1 w-20 sm:w-24 text-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    </div>

                                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-1 rounded-lg text-sm w-full sm:w-auto hover:shadow-lg transition-all duration-300">
                                        Aplicar
                                    </button>
                                </form>
                            </div>
                        </div>


                        <!-- Productos -->
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            <?php foreach ($resultado as $row): ?>
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden flex flex-col justify-between transition-all duration-300 border border-gray-100 hover:border-blue-300">
                                    <?php
                                    $id = $row['id'];
                                    $imagen = "Recursos/productos/" . $id . "/producto.png";
                                    if (!file_exists($imagen)) {
                                        $imagen = "Recursos/sinfoto.png";
                                    }
                                    ?>
                                    <div class="w-full h-36 sm:h-48 flex items-center justify-center overflow-hidden bg-gray-50"> <!-- Altura responsiva -->
                                        <img src="<?php echo $imagen; ?>"
                                            alt="<?php echo $row['nombre']; ?>"
                                            class="w-4/5 h-4/5 object-contain transition-transform duration-300 hover:scale-105">
                                    </div>
                                    <div class="p-2 sm:p-3 flex flex-col justify-between flex-grow"> <!-- Padding responsivo -->
                                        <div class="min-h-[50px] sm:min-h-[60px] flex flex-col justify-between"> <!-- Altura mínima responsiva -->
                                            <h5 class="text-xs sm:text-sm font-semibold mb-1 line-clamp-2 hover:text-blue-600 transition-colors duration-200"><?php echo $row['nombre']; ?></h5>
                                            <p class="text-blue-700 font-bold text-sm sm:text-base">$<?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                                        </div>
                                        <div class="mt-2 flex flex-col sm:flex-row justify-between items-center gap-2 sm:gap-0 pt-2"> <!-- Botones responsivos -->
                                            <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>"
                                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 sm:px-6 py-2 rounded-lg text-sm sm:text-base font-medium transition duration-300 ease-in-out w-full sm:w-auto text-center shadow-sm hover:shadow-md">
                                                Detalles
                                            </a>

                                            <button
                                                class="bg-green-600 hover:bg-green-700 text-white px-4 sm:px-6 py-2 rounded-lg text-sm sm:text-base font-medium transition duration-300 ease-in-out w-full sm:w-auto shadow-sm hover:shadow-md"
                                                type="button" onclick="addProducto(<?php echo  $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">
                                                Agregar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
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
        // Función para aplicar filtros de precio automáticamente cuando cambian los valores
        document.addEventListener('DOMContentLoaded', function() {
            const minPrecio = document.getElementById('min_precio');
            const maxPrecio = document.getElementById('max_precio');
            const toggleFiltros = document.getElementById('toggle-filtros');
            const panelFiltros = document.getElementById('panel-filtros');

            // Manejo del botón para mostrar/ocultar filtros en móvil
            if (toggleFiltros && panelFiltros) {
                toggleFiltros.addEventListener('click', function() {
                    panelFiltros.classList.toggle('hidden');

                    // Cambiar el texto del botón
                    const span = toggleFiltros.querySelector('span');
                    const svg = toggleFiltros.querySelector('svg');

                    if (panelFiltros.classList.contains('hidden')) {
                        span.textContent = 'Mostrar filtros';
                        svg.innerHTML = '<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />';
                        toggleFiltros.classList.remove('bg-gradient-to-r', 'from-green-500', 'to-emerald-500');
                        toggleFiltros.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-indigo-600');
                    } else {
                        span.textContent = 'Ocultar filtros';
                        svg.innerHTML = '<path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />';
                        toggleFiltros.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-indigo-600');
                        toggleFiltros.classList.add('bg-gradient-to-r', 'from-green-500', 'to-emerald-500');
                    }
                });
            }

            // Validación de precios
            if (minPrecio && maxPrecio) {
                minPrecio.addEventListener('change', function() {
                    if (parseFloat(minPrecio.value) > parseFloat(maxPrecio.value)) {
                        minPrecio.value = maxPrecio.value;
                    }
                });

                maxPrecio.addEventListener('change', function() {
                    if (parseFloat(maxPrecio.value) < parseFloat(minPrecio.value)) {
                        maxPrecio.value = minPrecio.value;
                    }
                });
            }
        });

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
                        // Actualizar el número en el header con animación
                        let elemento = document.getElementById("num_cart");
                        if (elemento) {
                            elemento.classList.add('animate-pulse');
                            elemento.innerHTML = data.numero;
                            setTimeout(() => {
                                elemento.classList.remove('animate-pulse');
                            }, 1000);
                        }
                        // Mostrar mensaje de éxito mejorado
                        mostrarMensaje("¡Producto agregado al carrito!");
                    } else {
                        mostrarMensaje("Error al agregar el producto");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    mostrarMensaje("Error de conexión. Inténtalo de nuevo.");
                });
        }
        // Función mejorada para mostrar mensaje
        function mostrarMensaje(mensaje) {
            // Toast moderno y atractivo
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-6 right-6 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 text-sm font-semibold flex items-center space-x-3 transform translate-x-full transition-transform duration-300 ease-out';

            toast.innerHTML = `
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span>${mensaje}</span>
                <button onclick="this.parentElement.remove()" class="ml-2 text-white hover:text-gray-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            `;

            document.body.appendChild(toast);

            // Animación de entrada
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);

            // Auto-remove después de 4 segundos
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    if (toast.parentElement) {
                        toast.remove();
                    }
                }, 300);
            }, 4000);
        }
    </script>

</body>

</html>