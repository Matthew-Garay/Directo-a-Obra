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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="Recursos/logo.ico" type="image/x-icon">
    <title>Proveedores - Directo a Obra</title>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-white sticky top-0 z-50 border-b shadow-sm">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="Index.php" class="flex items-center flex-shrink-0">
                <img src="Recursos/logo1.png" alt="Logo" class="h-10" />
            </a>
            <nav class="hidden md:flex justify-center flex-1">
                <ul class="flex space-x-6 text-center">
                    <li><a href="Index.php" class="text-gray-500 hover:text-blue-600 transition-colors">Inicio</a></li>
                    <li><a href="somos.php" class="text-gray-500 hover:text-blue-600 transition-colors">Quienes Somos</a></li>
                    <li><a href="productos.php" class="text-gray-500 hover:text-blue-600 transition-colors">Productos</a></li>
                    <li><a href="proveedores.php" class="text-gray-500 hover:text-blue-600 transition-colors">Proveedores</a></li>
                    <li><a href="contacto.php" class="text-gray-500 hover:text-blue-600 transition-colors">Contacto</a></li>
                </ul>
            </nav>
            <div class="relative flex items-center space-x-4 md:ml-4">
                <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <a href="checkout.php" class="bg-white-600 text-white px-2 py-2 rounded-lg hover:bg-blue-700 flex items-center transition-colors relative">
                    <img src="Recursos/carrito.png" alt="Carrito" class="w-7 h-7 md:w-8 md:h-8 object-contain" />
                    <span id="num_cart" class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full shadow-lg">
                        <?php echo $num_cart ?>
                    </span>
                </a>
            </div>
        </div>
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
        <!-- Hero Section -->
        <div class="bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">Nuestros Proveedores</h1>
                    <p class="text-xl md:text-2xl text-blue-200 mb-8">Colaboramos con los mejores de la industria</p>
                    <div class="flex justify-center items-center space-x-8 text-blue-200">
                        <div class="text-center">
                            <div class="text-3xl font-bold">28+</div>
                            <div class="text-sm">Proveedores</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">7</div>
                            <div class="text-sm">Categorías</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">1850+</div>
                            <div class="text-sm">Proyectos</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
            <div class="bg-white rounded-2xl shadow-xl p-6 border">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Categoría</label>
                        <select id="categoria" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="todos">Todas las categorías</option>
                            <option value="cemento">Cemento y Concreto</option>
                            <option value="acero">Acero y Estructuras</option>
                            <option value="madera">Madera</option>
                            <option value="electricidad">Material Eléctrico</option>
                            <option value="plomeria">Plomería</option>
                            <option value="herramientas">Herramientas</option>
                            <option value="acabados">Acabados</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ciudad</label>
                        <select id="ciudad" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="todos">Todas las ciudades</option>
                            <option value="cdmx">Ciudad de México</option>
                            <option value="guadalajara">Guadalajara</option>
                            <option value="monterrey">Monterrey</option>
                            <option value="puebla">Puebla</option>
                            <option value="queretaro">Querétaro</option>
                            <option value="toluca">Toluca</option>
                            <option value="tecamac">Tecámac</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button id="filtrar" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300">
                            Filtrar
                        </button>
                    </div>
                </div>
                <div id="resultados-info" class="hidden bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <span class="text-blue-800 font-medium">Mostrando <span id="num-resultados" class="font-bold">0</span> proveedores</span>
                </div>
            </div>
        </div>

        <!-- Grid de Proveedores -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="proveedores-container">
                <?php
                $proveedores = [
                    ['nombre' => 'Cementos Mexicanos', 'categoria' => 'cemento', 'ciudad' => 'monterrey', 'proyectos' => 156, 'rating' => 4.8],
                    ['nombre' => 'Aceros del Norte', 'categoria' => 'acero', 'ciudad' => 'monterrey', 'proyectos' => 89, 'rating' => 4.6],
                    ['nombre' => 'Maderas Premium', 'categoria' => 'madera', 'ciudad' => 'cdmx', 'proyectos' => 67, 'rating' => 4.3],
                    ['nombre' => 'ElectroMax', 'categoria' => 'electricidad', 'ciudad' => 'guadalajara', 'proyectos' => 112, 'rating' => 4.7],
                    ['nombre' => 'Plomería Total', 'categoria' => 'plomeria', 'ciudad' => 'puebla', 'proyectos' => 78, 'rating' => 4.4],
                    ['nombre' => 'Herramientas Pro', 'categoria' => 'herramientas', 'ciudad' => 'cdmx', 'proyectos' => 94, 'rating' => 4.9],
                    ['nombre' => 'Acabados Elegantes', 'categoria' => 'acabados', 'ciudad' => 'queretaro', 'proyectos' => 45, 'rating' => 4.2],
                    ['nombre' => 'Concretos Rápidos', 'categoria' => 'cemento', 'ciudad' => 'toluca', 'proyectos' => 63, 'rating' => 4.1],
                    ['nombre' => 'Estructuras Metálicas', 'categoria' => 'acero', 'ciudad' => 'cdmx', 'proyectos' => 71, 'rating' => 4.5],
                    ['nombre' => 'Maderas del Bosque', 'categoria' => 'madera', 'ciudad' => 'guadalajara', 'proyectos' => 52, 'rating' => 4.0],
                    ['nombre' => 'Iluminación Total', 'categoria' => 'electricidad', 'ciudad' => 'monterrey', 'proyectos' => 83, 'rating' => 4.6],
                    ['nombre' => 'Tuberías Express', 'categoria' => 'plomeria', 'ciudad' => 'queretaro', 'proyectos' => 59, 'rating' => 4.3],
                    ['nombre' => 'Herramientas Industriales', 'categoria' => 'herramientas', 'ciudad' => 'puebla', 'proyectos' => 68, 'rating' => 4.4],
                    ['nombre' => 'Pisos y Azulejos', 'categoria' => 'acabados', 'ciudad' => 'toluca', 'proyectos' => 41, 'rating' => 4.2],
                    ['nombre' => 'Cementos del Centro', 'categoria' => 'cemento', 'ciudad' => 'cdmx', 'proyectos' => 92, 'rating' => 4.7],
                    ['nombre' => 'Aceros Forjados', 'categoria' => 'acero', 'ciudad' => 'guadalajara', 'proyectos' => 76, 'rating' => 4.5],
                    ['nombre' => 'Maderas Finas', 'categoria' => 'madera', 'ciudad' => 'monterrey', 'proyectos' => 48, 'rating' => 4.1],
                    ['nombre' => 'Eléctrica Industrial', 'categoria' => 'electricidad', 'ciudad' => 'puebla', 'proyectos' => 87, 'rating' => 4.8],
                    ['nombre' => 'Plomería Moderna', 'categoria' => 'plomeria', 'ciudad' => 'cdmx', 'proyectos' => 64, 'rating' => 4.3],
                    ['nombre' => 'Herramientas Manuales', 'categoria' => 'herramientas', 'ciudad' => 'toluca', 'proyectos' => 53, 'rating' => 4.2],
                    ['nombre' => 'Acabados de Lujo', 'categoria' => 'acabados', 'ciudad' => 'monterrey', 'proyectos' => 39, 'rating' => 4.6],
                    ['nombre' => 'Concretos Especiales', 'categoria' => 'cemento', 'ciudad' => 'queretaro', 'proyectos' => 58, 'rating' => 4.0],
                    ['nombre' => 'Aceros Inoxidables', 'categoria' => 'acero', 'ciudad' => 'puebla', 'proyectos' => 72, 'rating' => 4.7],
                    ['nombre' => 'Maderas Tratadas', 'categoria' => 'madera', 'ciudad' => 'toluca', 'proyectos' => 44, 'rating' => 4.1],
                    ['nombre' => 'Iluminación LED', 'categoria' => 'electricidad', 'ciudad' => 'cdmx', 'proyectos' => 81, 'rating' => 4.8],
                    ['nombre' => 'Sistemas Hidráulicos', 'categoria' => 'plomeria', 'ciudad' => 'guadalajara', 'proyectos' => 62, 'rating' => 4.4],
                    ['nombre' => 'Herramientas Eléctricas', 'categoria' => 'herramientas', 'ciudad' => 'monterrey', 'proyectos' => 75, 'rating' => 4.9],
                    ['nombre' => 'Mármoles y Granitos', 'categoria' => 'acabados', 'ciudad' => 'tecamac', 'proyectos' => 37, 'rating' => 4.5],
                    ['nombre' => 'Materiales Tecámac', 'categoria' => 'cemento', 'ciudad' => 'tecamac', 'proyectos' => 42, 'rating' => 4.2]
                ];

                $iconos = [
                    'cemento' => 'fa-cubes',
                    'acero' => 'fa-industry',
                    'madera' => 'fa-tree',
                    'electricidad' => 'fa-bolt',
                    'plomeria' => 'fa-faucet',
                    'herramientas' => 'fa-tools',
                    'acabados' => 'fa-paint-roller'
                ];

                $colores = [
                    'cemento' => 'blue',
                    'acero' => 'gray',
                    'madera' => 'green',
                    'electricidad' => 'yellow',
                    'plomeria' => 'cyan',
                    'herramientas' => 'red',
                    'acabados' => 'purple'
                ];

                foreach ($proveedores as $p) {
                    $icono = $iconos[$p['categoria']] ?? 'fa-building';
                    $color = $colores[$p['categoria']] ?? 'blue';
                    echo "<div class='proveedor-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100' data-categoria='{$p['categoria']}' data-ciudad='{$p['ciudad']}'>
                        <div class='relative overflow-hidden rounded-t-2xl'>
                            <div class='h-48 bg-gradient-to-br from-{$color}-500 to-{$color}-700 flex items-center justify-center'>
                                <div class='bg-white/20 backdrop-blur-sm p-6 rounded-full'>
                                    <i class='fas {$icono} text-white text-4xl'></i>
                                </div>
                            </div>
                            <div class='absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-{$color}-700'>
                                " . ucfirst($p['categoria']) . "
                            </div>
                        </div>
                        <div class='p-6'>
                            <h3 class='text-xl font-bold text-gray-900 mb-2'>{$p['nombre']}</h3>
                            <div class='flex items-center text-gray-600 mb-4'>
                                <i class='fas fa-map-marker-alt text-{$color}-500 mr-2'></i>
                                <span class='capitalize'>" . str_replace('_', ' ', $p['ciudad']) . "</span>
                            </div>
                            <div class='flex justify-between items-center mb-4'>
                                <div class='flex items-center'>
                                    <i class='fas fa-project-diagram text-green-500 mr-2'></i>
                                    <span class='text-sm text-gray-600'>{$p['proyectos']} proyectos</span>
                                </div>
                                <div class='flex items-center'>
                                    <i class='fas fa-star text-yellow-400 mr-1'></i>
                                    <span class='text-sm font-semibold text-gray-700'>{$p['rating']}</span>
                                </div>
                            </div>
                            <div class='flex space-x-2'>
                                <button class='flex-1 bg-{$color}-600 hover:bg-{$color}-700 text-white py-2 px-4 rounded-xl font-semibold transition duration-300'>
                                    Contactar
                                </button>
                                <button class='bg-gray-100 hover:bg-gray-200 text-gray-600 p-2 rounded-xl transition duration-300'>
                                    <i class='fas fa-info-circle'></i>
                                </button>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
        <div style="height: 50px;"></div>
    </main>

    <footer class="bg-gray-900 text-white text-sm">
        <div class="p-8 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-5">
            <div>
                <h2 class="text-lg font-semibold uppercase">Enlaces Rápidos</h2>
                <ul class="text-gray-400 mt-2 space-y-2">
                    <li><a href="somos.php" class="hover:text-white"> 🏢 Quienes Somos</a></li>
                    <li><a href="productos.php" class="hover:text-white"> 🧱 Productos</a></li>
                    <li><a href="proveedores.php" class="hover:text-white"> 🤝 Proveedores</a></li>
                    <li><a href="contacto.php" class="hover:text-white"> 📞 Contacto</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-semibold uppercase">Contacto</h2>
                <ul class="text-gray-400 mt-2 space-y-1">
                    <li>📧 202210036@tesco.edu.mx</li>
                    <li>📧 202210037@tesco.edu.mx</li>
                    <li>📧 202210080@tesco.edu.mx</li>
                    <li>📲 55-6880-0778</li>
                </ul>
            </div>
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
        <div class="bg-gray-800 flex flex-col items-center justify-center px-5 py-2 text-xs text-gray-400 space-y-2">
            <p class="text-center w-full">© 2025 Directo a Obra, S.A.B. DE C.V. Todos los derechos reservados.</p>
            <img src="Recursos/logo3.png" alt="Directo a Obra" class="h-8">
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const btnFiltrar = document.getElementById('filtrar');
            const selectCategoria = document.getElementById('categoria');
            const selectCiudad = document.getElementById('ciudad');
            const proveedores = document.querySelectorAll('.proveedor-card');
            const resultadosInfo = document.getElementById('resultados-info');
            const numResultados = document.getElementById('num-resultados');

            function aplicarFiltros() {
                const categoria = selectCategoria.value;
                const ciudad = selectCiudad.value;
                let visibles = 0;

                proveedores.forEach(card => {
                    const categoriaCard = card.dataset.categoria;
                    const ciudadCard = card.dataset.ciudad;

                    const mostrar = (categoria === 'todos' || categoriaCard === categoria) &&
                        (ciudad === 'todos' || ciudadCard === ciudad);

                    card.style.display = mostrar ? 'block' : 'none';
                    if (mostrar) visibles++;
                });

                numResultados.textContent = visibles;
                resultadosInfo.classList.remove('hidden');
            }

            btnFiltrar.addEventListener('click', aplicarFiltros);
            numResultados.textContent = proveedores.length;
        });
    </script>
</body>

</html>