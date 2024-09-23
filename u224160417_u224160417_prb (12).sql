-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2024 a las 21:06:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u224160417_u224160417_prb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipoAccesorio` enum('Decorativo','Cojin','Alfombra','Lampara') NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id`, `nombre`, `tipoAccesorio`, `cantidad`) VALUES
(1, 'Almoafa padrismima', 'Cojin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Ventas'),
(3, 'Soporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `n_modulos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `n_modulos`) VALUES
(1, 'general', 5),
(2, 'Camas', 5),
(3, 'Sillas', 1),
(4, 'Sillones', 1),
(5, '3-2-1', 3),
(6, '3-2', 2),
(7, 'Esquineras', 8),
(8, 'Modular', 10),
(9, 'Comedores', 8),
(10, 'Puff', 1),
(11, 'Mesas', 1),
(12, 'finisima', 2),
(13, 'finisima', 2),
(14, 'Categoria Grande', 8),
(15, 'Test de 0 y 1', 8),
(16, 'Test de 0 y 1', 8),
(17, 'dani sin errores', 2),
(18, 'Categoria bonita', 2),
(19, 'Categoria bonita', 2),
(20, 'Nuevesita bb', 1),
(21, 'Categoria2', 2),
(22, 'Esta chidillo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `segundo_nombre` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `profileImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `hex_color` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `nombre`, `hex_color`) VALUES
(1, 'Verde', '#E3BA3A'),
(2, 'Azul', '#E3BA3A'),
(3, 'Amarillo', '#E3BA3A'),
(4, 'Naranja pasion', '#E3BA3A'),
(5, 'rojo pasion', '#D51B1B'),
(6, 'Cafe', '#A47E1E'),
(7, 'Rosita fresita', '#CA7A7A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_productos`
--

CREATE TABLE `imagenes_productos` (
  `id` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `frontend_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_productos`
--

INSERT INTO `imagenes_productos` (`id`, `ruta`, `producto_id`, `frontend_id`) VALUES
(147, 'backend/media/admin/product/linea/Producto que tiene accesorio/front_66edcde9ef7d7.png', 93, 'front_66edcde9ef7d7.png'),
(148, 'backend/media/admin/product/linea/Producto que tiene accesorio/left_66edcde9f0b26.png', 93, 'left_66edcde9f0b26.png'),
(149, 'backend/media/admin/product/linea/Producto que tiene accesorio/straight_66edcde9f17a6.png', 93, 'straight_66edcde9f17a6.png'),
(150, 'backend/media/admin/product/linea/Producto que tiene accesorio/right_66edcde9f21b0.png', 93, 'right_66edcde9f21b0.png'),
(151, 'backend/media/admin/product/linea/Producto que tiene accesorio/back_66edcde9f2a19.png', 93, 'back_66edcde9f2a19.png'),
(152, 'backend/media/admin/product/linea/Vamoo/front_66edd2a86592d.png', 94, 'front_66edd2a86592d.png'),
(153, 'backend/media/admin/product/linea/Vamoo/left_66edd2a866e85.png', 94, 'left_66edd2a866e85.png'),
(154, 'backend/media/admin/product/linea/Vamoo/straight_66edd2a8679c5.png', 94, 'straight_66edd2a8679c5.png'),
(155, 'backend/media/admin/product/linea/Vamoo/right_66edd2a868712.png', 94, 'right_66edd2a868712.png'),
(156, 'backend/media/admin/product/linea/Vamoo/back_66edd2a868cf4.png', 94, 'back_66edd2a868cf4.png'),
(157, 'backend/media/admin/product/linea/Daniel/front_66f1784b4cd43.png', 95, 'front_66f1784b4cd43.png'),
(158, 'backend/media/admin/product/linea/Daniel/left_66f1784b4f70f.png', 95, 'left_66f1784b4f70f.png'),
(159, 'backend/media/admin/product/linea/Daniel/straight_66f1784b50172.png', 95, 'straight_66f1784b50172.png'),
(160, 'backend/media/admin/product/linea/Daniel/right_66f1784b50b91.png', 95, 'right_66f1784b50b91.png'),
(161, 'backend/media/admin/product/linea/Daniel/back_66f1784b51899.png', 95, 'back_66f1784b51899.png'),
(162, 'backend/media/admin/product/linea/2r3fwef/front_66f17c0fc56f0.png', 96, 'front_66f17c0fc56f0.png'),
(163, 'backend/media/admin/product/linea/2r3fwef/left_66f17c0fc7bb5.png', 96, 'left_66f17c0fc7bb5.png'),
(164, 'backend/media/admin/product/linea/2r3fwef/straight_66f17c0fc86ff.png', 96, 'straight_66f17c0fc86ff.png'),
(165, 'backend/media/admin/product/linea/2r3fwef/right_66f17c0fc923c.png', 96, 'right_66f17c0fc923c.png'),
(166, 'backend/media/admin/product/linea/2r3fwef/back_66f17c0fc9b60.png', 96, 'back_66f17c0fc9b60.png'),
(167, 'backend/media/admin/product/linea/Ultima prueba antes de la validacion del boton/front_66f1b045a2554.png', 97, 'front_66f1b045a2554.png'),
(168, 'backend/media/admin/product/linea/Ultima prueba antes de la validacion del boton/left_66f1b045a4740.png', 97, 'left_66f1b045a4740.png'),
(169, 'backend/media/admin/product/linea/Ultima prueba antes de la validacion del boton/right_66f1b045a588a.png', 97, 'right_66f1b045a588a.png'),
(170, 'backend/media/admin/product/linea/Daniel prueba antes de corregir los inputs/front_66f1b2adc02f5.png', 98, 'front_66f1b2adc02f5.png'),
(171, 'backend/media/admin/product/linea/Daniel prueba antes de corregir los inputs/left_66f1b2adc1dc6.png', 98, 'left_66f1b2adc1dc6.png'),
(172, 'backend/media/admin/product/linea/Daniel prueba antes de corregir los inputs/right_66f1b2adc2c44.png', 98, 'right_66f1b2adc2c44.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` enum('madera','patas','telas','relleno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `nombre`, `tipo`) VALUES
(1, 'Pino', 'madera'),
(2, 'Arce', 'madera'),
(3, 'Metalicas', 'patas'),
(4, 'Plasticas', 'patas'),
(5, 'Tela finisima', 'telas'),
(6, 'Tela todavia mas fina', 'telas'),
(7, 'Esponja', 'relleno'),
(8, 'Soñare xd', 'relleno'),
(14, 'nuevorelleno', 'relleno'),
(15, 'rellenogenial', 'relleno'),
(16, 'Relleno nuevismo', 'relleno'),
(17, 'nuevoRelleno', 'relleno'),
(18, 'nuevoMadera', 'madera'),
(19, 'NuevoPata', 'patas'),
(20, 'NuevaTela', 'telas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `unidad` varchar(50) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `nombre`, `unidad`, `categoria_id`, `valor`) VALUES
(1, 'Largo', 'cm', 1, 0),
(2, 'Largo asiento', 'cm', 1, 0),
(3, 'Fondo', 'cm', 1, 0),
(4, 'Fondo del asiento', 'cm', 1, 0),
(5, 'Ancho del Brazo', 'cm', 1, 0),
(6, 'Ancho del respaldo', 'cm', 1, 0),
(7, 'Altura', 'cm', 1, 0),
(8, 'Altura al casco', 'cm', 1, 0),
(9, 'Altura al brazo', 'cm', 1, 0),
(10, 'Altura al asiento', 'cm', 1, 0),
(11, 'Altura a la pata', 'cm', 1, 0),
(12, 'Altura al respaldo', 'cm', 1, 0),
(13, 'Peso', 'Kg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` double NOT NULL,
  `existencia` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `precioVenta` double NOT NULL,
  `garantia` varchar(50) NOT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaVenta` timestamp NULL DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `tipoProducto_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `madera_id` int(11) DEFAULT NULL,
  `patas_id` int(11) DEFAULT NULL,
  `patas_medida` decimal(10,2) DEFAULT NULL,
  `telas_id` int(11) DEFAULT NULL,
  `relleno_id` int(11) DEFAULT NULL,
  `accesorio_alfombra_id` int(11) DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL,
  `status` varchar(3) DEFAULT 'INA',
  `promocionar` varchar(3) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio`, `existencia`, `categoria_id`, `precioVenta`, `garantia`, `FechaRegistro`, `FechaVenta`, `proveedor_id`, `tipoProducto_id`, `color_id`, `madera_id`, `patas_id`, `patas_medida`, `telas_id`, `relleno_id`, `accesorio_alfombra_id`, `fechaCompra`, `status`, `promocionar`) VALUES
(93, 'Producto que tiene accesorio', '8mki6nujt', 100, 2, 1, 4000, '4', '2024-09-20 19:32:57', NULL, 1, 3, 3, 2, 4, NULL, 6, 8, NULL, '2024-09-13', 'INA', 'NO'),
(94, 'Vamoo', 'Si', 100, 1, 3, 4000, '2', '2024-09-20 19:53:12', NULL, 1, 2, 1, 1, 4, NULL, 6, 8, NULL, '2024-09-20', 'PRO', 'NO'),
(95, 'Daniel', '13331231', 100, 2, 1, 4000, '2', '2024-09-23 14:16:43', NULL, 1, 3, 1, 2, 4, NULL, 20, 8, NULL, '2024-09-26', 'PRO', 'NO'),
(96, '2r3fwef', '123', 100, 2, 3, 4000, '3', '2024-09-23 14:32:47', NULL, 2, 3, 2, 18, 19, NULL, 20, 8, NULL, '2024-09-13', 'ENV', 'PRO'),
(97, 'Ultima prueba antes de la validacion del boton', 'Si esta padre', 2222222222, 2, 4, 2222222222, '1 año', '2024-09-23 18:15:33', NULL, 2, 3, 4, 2, 3, NULL, 6, 8, NULL, '2024-09-11', 'ENV', 'PRO'),
(98, 'Daniel prueba antes de corregir los inputs', '131231', 3333333333, 2, 3, 3333333333, '1 años mas', '2024-09-23 18:25:49', NULL, 1, 3, 7, 18, 3, NULL, 6, 7, NULL, '2024-09-18', 'INA', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_accesorios`
--

CREATE TABLE `productos_accesorios` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `accesorio_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_accesorios`
--

INSERT INTO `productos_accesorios` (`id`, `producto_id`, `accesorio_id`, `cantidad`) VALUES
(2, 93, 1, 9),
(3, 94, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `descripcion`, `contacto`, `telefono`, `email`) VALUES
(1, 'New Concept', 'Fabrica de muebles tapizados', 'Nombre Generico', '454356456543567', 'ventas@newconcept.com.mx'),
(2, 'Marca X', 'Provedor de insumos', 'Pancho Barrera', '3542345345', 'barrera@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`id`, `nombre`) VALUES
(1, 'Conjunto'),
(2, 'Pieza'),
(3, 'jeje'),
(4, 'gfdgd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `segundo_nombre` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `es_admin` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `profileImage` varchar(255) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `es_admin`, `fecha_registro`, `profileImage`, `cargo_id`) VALUES
(1, 'dev@sensihome.com.mx', '25d55ad283aa400af464c76d713c07ad', 'Andres', '', 'Galcia', 'Santos', '334345355', 1, '2024-09-04 10:40:39', NULL, 1),
(2, 'mydevgalicia@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Daniel', 'Panchito', 'Alvarez', 'Felix', '543235522', 1, '2024-09-04 12:50:31', NULL, 1),
(17, 'test@test.com.mx', '10201c6d37f6d3dea376e22e88181de5', 'test1', '', 'test', 'test', '(35) 65-46-76-54', 0, '2024-09-17 11:40:23', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `fk_proveedor` (`proveedor_id`),
  ADD KEY `fk_tipoProducto` (`tipoProducto_id`),
  ADD KEY `fk_color` (`color_id`),
  ADD KEY `fk_madera` (`madera_id`),
  ADD KEY `fk_patas` (`patas_id`),
  ADD KEY `fk_telas` (`telas_id`),
  ADD KEY `fk_relleno` (`relleno_id`);

--
-- Indices de la tabla `productos_accesorios`
--
ALTER TABLE `productos_accesorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `accesorio_id` (`accesorio_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_cargo` (`cargo_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `productos_accesorios`
--
ALTER TABLE `productos_accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `detalleventas_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalleventas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD CONSTRAINT `imagenes_productos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `medidas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_madera` FOREIGN KEY (`madera_id`) REFERENCES `materiales` (`id`),
  ADD CONSTRAINT `fk_patas` FOREIGN KEY (`patas_id`) REFERENCES `materiales` (`id`),
  ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `fk_relleno` FOREIGN KEY (`relleno_id`) REFERENCES `materiales` (`id`),
  ADD CONSTRAINT `fk_telas` FOREIGN KEY (`telas_id`) REFERENCES `materiales` (`id`),
  ADD CONSTRAINT `fk_tipoProducto` FOREIGN KEY (`tipoProducto_id`) REFERENCES `tipoproducto` (`id`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `productos_accesorios`
--
ALTER TABLE `productos_accesorios`
  ADD CONSTRAINT `productos_accesorios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_accesorios_ibfk_2` FOREIGN KEY (`accesorio_id`) REFERENCES `accesorios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
