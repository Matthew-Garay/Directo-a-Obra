-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2025 a las 16:44:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `directoaobra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE database Directoaobra; 

use Ditectoaobra;


CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES
(1, '6V007986M3869981X', '2025-05-25 06:48:22', 'COMPLETED', 'sb-n4tbe41282345@personal.example.com', 'Z7ZUYWMA7L2TN', 13119.00),
(2, '9S0271996A185834Y', '2025-06-08 04:03:35', 'COMPLETED', '202210036@tesco.edu.mx', 'JXKZYQ6RFQGXS', 26139.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalles` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalles`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 5, 'Bloque Hueco Semipesado (15 x 20 x 40 cm) 1000 piezas\r\n\r\n', 13020.00, 1),
(2, 2, 5, 'Bloque Hueco Semipesado (15 x 20 x 40 cm) 1000 piezas\r\n\r\n', 13020.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(2) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `activo`) VALUES
(1, 'Cemento Portland Compuesto CPC 30 R (50kg) Marca Moctezuma', '<p>El Cemento Portland Compuesto CPC 30 R de la marca Moctezuma es un cemento hidráulico de resistencia normal y fraguado rápido. Cumple con la norma mexicana NMX-C-414-ONNCCE vigente. Es un material fundamental en la construcción, utilizado para la elaboración de concretos y morteros en una amplia variedad de aplicaciones.</p>\r\n\r\n<br>\r\n<p><b>Características</b></p>\r\n<ul>\r\n  <li>Tipo: Cemento Portland Compuesto (CPC).</li>\r\n  <li>Clase de Resistencia: 30 (resistencia normal).</li>\r\n  <li>Fraguado: Rápido (R).</li>\r\n  <li>Presentación: Saco de 50 kg.</li>\r\n  <li>Color: Gris.</li>\r\n  <li>Resistencia mínima a 3 días: 20 N/mm² (204 kg/cm²).</li>\r\n  <li>Resistencia mínima a 28 días: 30 N/mm² (306 kg/cm²).</li>\r\n  <li>Tiempo de fraguado inicial: 45 minutos (mínimo).</li>\r\n  <li>Tiempo de fraguado final: 600 minutos (máximo).</li>\r\n</ul>\r\n', 160.00, 10, 1, 1),
(2, 'Cemento Holcim Apasco Ecoplanet (50kg)', '<p>\r\nEl Cemento Holcim Apasco Ecoplanet es un cemento Portland compuesto diseñado con un enfoque en la sostenibilidad. Incorpora materiales cementantes suplementarios que reducen su huella de carbono, manteniendo un buen desempeño en diversas aplicaciones de construcción. Cumple con las normas mexicanas aplicables.\r\n</p>\r\n<br>\r\n<p><b>Características</b></p>\r\n\r\n<ul>\r\n  <li>Tipo: Cemento Portland Compuesto con materiales cementantes suplementarios.</li>\r\n  <li>Presentación: Saco de 50 kg.</li>\r\n  <li>Color: Gris.</li>\r\n  <li>Resistencia: Varía según la clasificación específica del producto Ecoplanet (puede ser similar a un CPC 30). Es importante revisar la ficha técnica específica.</li>\r\n  <li>Fraguado: Generalmente normal.</li>\r\n  <li>Diseñado para: Concretos, morteros, pegazulejos, aplanados y otros usos generales donde se requiera un cemento con menor impacto ambiental.</li>\r\n</ul>', 170.00, 0, 1, 1),
(3, 'Cemento Mortero Óptimo (50 kg) Marca Cemex', '<p>\r\nEl Cemento Mortero Óptimo de Cemex es un producto diseñado específicamente para la elaboración de morteros utilizados en pegado de block, ladrillo, aplanados y otros trabajos de albañilería. Su formulación busca optimizar la trabajabilidad, adherencia y rendimiento del mortero.\r\n</p>\r\n<br>\r\n<p><b>Características</b></p>\r\n\r\n<ul>\r\n  <li>Tipo: Cemento específico para morteros.</li>\r\n  <li>Presentación: Saco de 50 kg.</li>\r\n  <li>Color: Gris.</li>\r\n  <li>Resistencia: Diseñado para las resistencias típicas requeridas en morteros para albañilería. No está enfocado en alcanzar altas resistencias como los cementos para concreto estructural.</li>\r\n  <li>Fraguado: Adecuado para las labores de albañilería, permitiendo un tiempo de trabajo óptimo.</li>\r\n  <li>Diseñado para: Pegado de block, ladrillo, tabique, aplanados, resanes y otros trabajos de albañilería donde se requiere un mortero de buena calidad y rendimiento.</li>\r\n</ul>', 165.00, 0, 1, 1),
(4, 'Bloque Hueco Ligero (15 x 20 x 40 cm) 1000 piezas', '<p>\r\nBloque de concreto con dos o tres cavidades, fabricado con agregados ligeros, lo que reduce su peso y facilita su manejo. Es común para muros divisorios y bardas donde no se requiere una carga estructural elevada.\r\n</p>\r\n<br>\r\n<p><b>Características</b></p>\r\n\r\n<ul>\r\n  <li>Dimensiones aproximadas: 15 cm de ancho x 20 cm de alto x 40 cm de largo.</li>\r\n  <li>Número de cavidades: 2 o 3.</li>\r\n  <li>Peso aproximado por pieza: 8 - 12 kg (variable según el fabricante y los agregados).</li>\r\n  <li>Resistencia a la compresión: Varía según la especificación del fabricante, generalmente para cargas no estructurales o ligeras.</li>\r\n</ul>', 7170.00, 0, 2, 1),
(5, 'Bloque Hueco Semipesado (15 x 20 x 40 cm) 1000 piezas\r\n\r\n', '<p>\r\nBloque de concreto con dos o tres cavidades, fabricado con una mezcla de agregados ligeros y densos, ofreciendo un equilibrio entre peso y resistencia. Es versátil para muros divisorios y algunos muros de carga de baja altura.\r\n</p>\r\n<br>\r\n<p><b>Características</b></p>\r\n\r\n<ul>\r\n  <li>Dimensiones aproximadas: 15 cm de ancho x 20 cm de alto x 40 cm de largo.</li>\r\n  <li>Número de cavidades: 2 o 3.</li>\r\n  <li>Peso aproximado por pieza: 12 - 16 kg (variable según el fabricante y los agregados).</li>\r\n  <li>Resistencia a la compresión: Varía según la especificación del fabricante, adecuado para cargas ligeras y medias.</li>\r\n</ul>', 14000.00, 7, 2, 1),
(6, ' Bloque Hueco Pesado (15 x 20 x 40 cm) 1000 Piezas', '<p>\r\nBloque de concreto con dos o tres cavidades, fabricado principalmente con agregados densos, lo que le confiere una alta resistencia estructural. Se utiliza en muros de carga, cimentaciones y construcciones que requieren mayor solidez.\r\n</p>\r\n<br>\r\n<p><b>Características</b></p>\r\n\r\n<ul>\r\n  <li>Dimensiones aproximadas: 15 cm de ancho x 20 cm de alto x 40 cm de largo.</li>\r\n  <li>Número de cavidades: 2 o 3.</li>\r\n  <li>Peso aproximado por pieza: 16 - 20 kg o más (variable según el fabricante y los agregados).</li>\r\n  <li>Resistencia a la compresión: Alta, según las especificaciones de diseño estructural.</li>\r\n</ul>', 17000.00, 0, 2, 1),
(7, 'Varilla Corrugada de 3/8\" (9.5 mm) Grado 42 6 metros ', '<p>\r\nVarilla de acero con corrugas para mejorar la adherencia al concreto, con un diámetro nominal de 3/8 de pulgada. Es una de las medidas más utilizadas en la construcción para refuerzos ligeros en losas, castillos, dalas y otros elementos.\r\n</p>\r\n<br>\r\n<p><b>Características</b></p>\r\n\r\n<ul>\r\n  <li>Diámetro nominal: 3/8\" (9.5 mm).</li>\r\n  <li>Grado: 42 (resistencia a la fluencia mínima de 4200 kg/cm²).</li>\r\n  <li>Presentación: Generalmente en rollos o varillas de 6 o 12 metros de longitud.</li>\r\n  <li>Peso aproximado por metro: 0.56 kg/m.</li>\r\n</ul>', 60.00, 0, 3, 1),
(8, 'Malla Ciclónica Galvanizada Cal 12.5 2 x 20 metros', '<p>\r\n        Malla metálica resistente diseñada para brindar seguridad y delimitación en hogares, negocios o terrenos. Su acabado galvanizado proporciona durabilidad y resistencia a la intemperie.\r\n    </p>\r\n<br>\r\n    <p><b>Características</b></p>\r\n    <ul>\r\n        <li>Peso producto empacado: 50 kg</li>\r\n        <li>Marca: Mallalux</li>\r\n        <li>Ancho: 15 cm</li>\r\n        <li>Espesor: 3 mm</li>\r\n        <li>Material: Acero galvanizado</li>\r\n        <li>Color: Gris</li>\r\n        <li>Garantía: 1 Mes</li>\r\n        <li>Características: Metálico</li>\r\n    </ul>', 4020.00, 0, 4, 1),
(9, 'Impermeabilizante Fibratado Topex - 7 Años de 19 litros - Blanco', ' <p>\r\n        Dale a tu hogar la protección que necesita con el Impermeabilizante Fibratado Topex. Este producto te ofrece 7 años de garantía y es ideal para proteger tus muros y cubiertas de la lluvia y la humedad. Su fórmula fibratada no requiere malla y es compatible con concreto, fibrocemento y mortero. ¡Con Topex, tu hogar estará seguro y protegido por mucho tiempo!\r\n    </p>\r\n    <br>\r\n    <p><b>Características</b></p>\r\n    <ul>\r\n        <li>Marca: Topex</li>\r\n        <li>Ancho: 30 cm</li>\r\n        <li>Alto: 36 cm</li>\r\n        <li>Material: Resinas acrílicas</li>\r\n        <li>Color: Blanco</li>\r\n        <li>Cuenta con resistencia al agua: Sí</li>\r\n        <li>Cuenta con protección UV: Sí</li>\r\n        <li>Contenido: 19 l</li>\r\n        <li>Rendimiento por capa: 38 m²</li>\r\n        <li>Presentación: Balde</li>\r\n        <li>Secado final: 24 h</li>\r\n        <li>Alto producto empacado: 1 cm</li>\r\n        <li>Garantía: 7 Años</li>\r\n<br>\r\n        <li>Aislante térmico, fibratado, no requiere malla y soporta el concreto, fibrocemento y mortero</li>\r\n<br>\r\n        <li>Recomendaciones: Limpiar la superficie de polvo, grasas y partículas</li>\r\n        <li>Rendimiento: 1 m² por litro</li>\r\n    </ul>', 1499.00, 0, 5, 1),
(10, 'Impermeabilizante Acrílico Fester - 3 Años de 19 litros - Rojo', '   <p>\r\n        Dale a tu hogar la protección que necesita con el Impermeabilizante Acrílico Fester - 3 Años de 19 litros - Rojo. Este producto te ofrece una solución duradera y de fácil aplicación para proteger tus muros y cubiertas de la lluvia y el sol. Con su fórmula a base de resinas acrílicas, este impermeabilizante te brinda una protección de hasta 3 años, además de ser resistente al agua y contar con protección UV. ¡No te preocupes por las filtraciones y dale a tu hogar la seguridad que se merece!\r\n    </p>\r\n    <br>\r\n    <p><b>Características</b></p>\r\n    <ul>\r\n        <li>Marca Web: Fester</li>\r\n        <li>Ancho: 21 cm</li>\r\n        <li>Alto: 20 cm</li>\r\n        <li>Largo: 21 cm</li>\r\n        <li>Material: Resinas Acrílicas y Fibras</li>\r\n        <li>Color: Blanco</li>\r\n        <li>Cuenta con resistencia al agua: Si</li>\r\n        <li>Cuenta con protección UV: Si</li>\r\n        <li>Contenido: 19 l</li>\r\n        <li>Rendimiento por capa: 38 m²</li>\r\n        <li>Presentación: Balde</li>\r\n        <li>Secado final: 4 h</li>\r\n        <li>Alto producto empacado: 37 cm</li>\r\n        <li>Garantía: 3 Años</li>\r\n<br>        \r\n<li>Durabilidad De 3 Años, Para Techos Sin Impermeabilizar, Considere uso de Malla para Evitar Fisuras</li>\r\n<br>\r\n        <li>Recomendaciones: Superficie, Sana, Limpia y Libre de Polvo, Sellar la Superficie, Aplicación Primaria Secado 8 h, Primera Capa, Secado 12 Horas, Segunda Capa, Secado 24 h</li>\r\n        <li>Rendimiento: 1 litro por m²</li>\r\n    </ul>', 1444.15, 0, 5, 1),
(11, 'Impermeabilizante Acrílico Fotosensible Topex - 7 Años de 22.8 litros - Blanco', ' <p>\r\n        Impermeabilizante Acrílico fotosensible y fibratado es un aislante-reductor del calor, formulado con la tecnología fotosensible que evita errores de aplicación, debido a que cambia de color de rosa a blanco al exponerse a la intemperie, con una durabilidad de hasta por 7 años. Presentación: cubeta con 22.8 litros.\r\n    </p>\r\n    <br>\r\n    <p><b>Características</b></p>\r\n    <ul>\r\n        <li>Marca: Mp Topex</li>\r\n        <li>Ancho: 30 cm</li>\r\n        <li>Alto: 46 cm</li>\r\n        <li>Material: RESINAS</li>\r\n        <li>Color: BLANCO</li>\r\n        <li>Cuenta con resistencia al agua: Si</li>\r\n        <li>Cuenta con protección UV: Si</li>\r\n        <li>Contenido: 22.8 l</li>\r\n        <li>Rendimiento por capa: 45 m²</li>\r\n        <li>Presentación: Balde</li>\r\n        <li>Secado final: 24 h</li>\r\n        <li>Alto producto empacado: 45 cm</li>\r\n        <li>Garantía: 7 años</li>\r\n<br>\r\n        <li>Imper fotosensible fibratado, cambia de color de rosa a blanco</li>\r\n    </ul>', 1519.00, 0, 5, 1),
(12, 'Yeso Construcción Las Peñitas 40 kg', ' <p>\r\n        Yeso blanco de alta pureza, ideal para acabados profesionales en muros interiores, con excelente rendimiento y fácil manejo.\r\n    </p>\r\n    <br>\r\n    <p><b>Características</b></p>\r\n    <ul>\r\n        <li>Marca Web: Las Penitas</li>\r\n        <li>Ancho: 44 cm</li>\r\n        <li>Alto: 13 cm</li>\r\n        <li>Largo: 60 cm</li>\r\n        <li>Material: Yeso</li>\r\n        <li>Color: Blanco</li>\r\n        <li>Alto producto empacado: 13 cm</li>\r\n        <li>Garantía: 1 Mes</li>\r\n        <li>Características: Blanco, pureza al 100%</li>\r\n        <li>Presentación: Saco</li>\r\n        <li>Contenido: 40 kg</li>\r\n        <li>Rendimiento: 5 a 7 m² (3mm)</li>\r\n        <li>Secado final: 24 h</li>\r\n    </ul>', 92.00, 0, 6, 1),
(13, 'Block Macizo (12 x 18 x 38 cm) 1000 piezas', '<p>\r\n        Block de concreto gris resistente, ideal para muros, fachadas o construcciones generales, con diseño ligero para fácil colocación.\r\n    </p>\r\n    <br>\r\n    <p><b>Características</b></p>\r\n    <ul>\r\n        <li>Marca: Tricoblocks</li>\r\n        <li>Ancho: 12 cm</li>\r\n        <li>Alto: 18 cm</li>\r\n        <li>Largo: 38 cm</li>\r\n        <li>Material: Concreto</li>\r\n        <li>Color: Gris</li>\r\n        <li>Alto producto empacado: 18 cm</li>\r\n        <li>Garantía: 1 Mes</li>\r\n        <li>Forma: Rectangular</li>\r\n        <li>Rendimiento: .0684 m²</li>\r\n        <li>Resistencia a la compresión</li>\r\n    </ul>\r\n', 1600.00, 0, 2, 1),
(14, 'Alambre Liso con Recubrimiento de PVC 20 metros', '    <p>\r\n        Alambre galvanizado con recubrimiento de PVC verde. Es flexible, resistente a la intemperie y ideal para múltiples aplicaciones.\r\n    </p>\r\n    <br>\r\n    <p><b>Características:</b></p>\r\n    <ul>\r\n        <li>Alta resistencia a humedad, golpes y corrosión.</li>\r\n        <li>Suave al tacto y fácil de manipular.</li>\r\n        <li>Uso agrícola, ferretero, industrial y doméstico.</li>\r\n        <li>No requiere mantenimiento.</li>\r\n        <li>Doble protección (galvanizado y PVC) para mayor durabilidad.</li>\r\n        <li>Mayor vida útil y resistencia UV.</li>\r\n        <li>Estética mejorada por el color del PVC.</li>\r\n        <li>Aislante eléctrico y seguro.</li>\r\n        <li>Fácil de manipular e instalar.</li>\r\n        <li>Higiénico y fácil de limpiar.</li>\r\n    </ul>', 98.00, 0, 7, 1),
(15, 'Alambrón de Acero 1/4” (6.35 mm) 20 kilos', '   <p>\r\n        Elemento de refuerzo para la construcción. Es fácil de manejar, de alta resistencia a la tensión, y ideal para amarres, trefilado y maquinaria.\r\n    </p>\r\n    <br>\r\n    <p><b>Especificaciones</b></p>\r\n    <ul>\r\n        <li>Marca: Multimarca</li>\r\n        <li>Largo: 1 m</li>\r\n        <li>Diámetro: 1 mm</li>\r\n        <li>Espesor: 1 mm</li>\r\n        <li>Material: Acero</li>\r\n        <li>Color: Gris</li>\r\n        <li>Alto producto empacado: 1 cm</li>\r\n        <li>Garantía: 1 Mes</li>\r\n        <li>Alambre recocido útil para el armado de castillo e insumos de procesos industriales. </li>\r\n    </ul>', 400.00, 0, 7, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalles`),
  ADD KEY `fk_detalle_compra_compras` (`id_compra`),
  ADD KEY `fk_detalle_compra_productos` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_compra_compras` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`),
  ADD CONSTRAINT `fk_detalle_compra_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
