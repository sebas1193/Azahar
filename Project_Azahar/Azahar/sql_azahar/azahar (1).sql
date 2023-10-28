-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2023 a las 16:42:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `azahar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminis`
--

CREATE TABLE `adminis` (
  `id` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `adminis`
--

INSERT INTO `adminis` (`id`, `nombre`, `apellido`, `correo`, `telefono`) VALUES
(1, 'sebastian', 'ortiz2', 'juanortiz@gmail.com', '3127447589');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `membresia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `apellido`, `direccion`, `telefono`, `email`, `membresia`) VALUES
('nombre yo', 'ortiz', 'donde el diablo pego el grito', '2147483647', 'ejemplo@efe.com', 1),
('nombre yo', 'ortiz', 'donde el diablo pego el grito', '3127447589', 'juanortiz@gmail.com', 0),
('nombre yo', 'hola', 'siu', '3117447589', 'juansebasitan05@gmail.com', 1),
('nombre yo', 'muñoz calarcá', 'donde el diablo pego el grito', '2147483647', 'juseoguerrero@hotmail.com', 1),
('nombre yo', 'ortiz', 'donde el diablo pego el grito', '2147483647', 'otrocorreo@gmail.com', 1),
('juan pepito', 'perez', 'corea 45#239', '3117447589', 'pepitoperez@gmail.com', 0),
('sebasprirpra', 'lucumi', 'ehhejjo234#dddo', '3164991432', 'pripra@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(8) NOT NULL,
  `cant_prodct` int(20) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  `cod_p` int(8) DEFAULT NULL,
  `n_venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `cant_prodct`, `descripcion`, `cod_p`, `n_venta`) VALUES
(1, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 1),
(2, 1, 'Café espresso con una pequeña cantidad de leche vaporizada o espumada', 3, 1),
(3, 1, 'Café molido de molienda gruesa con agua fría o a temperatura ambiente,', 5, 1),
(4, 2, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 2),
(5, 1, 'Delicioso croissant recién horneado', 15, 2),
(6, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 3),
(7, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 4),
(8, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 5),
(9, 1, 'Café espresso puro', 2, 6),
(10, 1, 'Café espresso con una pequeña cantidad de leche vaporizada o espumada', 3, 7),
(11, 1, 'Café latte con sabor a caramelo', 7, 8),
(12, 1, 'Café molido de la marca (250g)', 23, 14),
(13, 1, 'Café molido de la marca (250g)', 23, 15),
(14, 1, 'Espresso puro', 9, 16),
(15, 1, 'Café en grano de la marca (500g)', 26, 17),
(16, 1, 'Té de manzanilla', 13, 18),
(17, 1, 'Café espresso puro', 2, 18),
(18, 1, 'Macchiato con leche vaporizada', 10, 19),
(19, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 19),
(20, 1, 'Sándwich de jamón y queso', 20, 20),
(21, 1, 'Café latte con sabor a vainilla', 6, 21),
(22, 1, 'Té de manzanilla', 13, 21),
(23, 1, 'Pastel de chocolate con ganache', 19, 21),
(24, 1, 'Americano doble', 11, 22),
(25, 1, 'Espresso puro', 9, 22),
(26, 1, 'Té de manzanilla', 13, 23),
(27, 1, 'Pastel de chocolate con ganache', 19, 23),
(28, 1, 'Café latte con sabor a caramelo', 7, 23),
(29, 1, 'Té de jengibre endulzado', 14, 24),
(30, 1, 'Americano doble', 11, 24),
(31, 1, 'Café espresso con una pequeña cantidad de leche vaporizada o espumada', 3, 24),
(32, 2, 'Café espresso puro', 2, 25),
(33, 3, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 26),
(34, 1, 'Café espresso puro', 2, 26),
(35, 1, 'Café espresso, chocolate caliente o jarabe de chocolate, leche vaporiz', 4, 27),
(36, 1, 'Café espresso puro', 2, 27),
(37, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 28),
(38, 1, 'Café espresso puro', 2, 28),
(39, 1, 'Café molido de molienda gruesa con agua fría o a temperatura ambiente,', 5, 29),
(40, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 29),
(41, 1, 'Café tradicional con azúcar', 8, 30),
(42, 1, 'Café latte con sabor a vainilla', 6, 30),
(43, 2, 'Café molido de la marca (500g)', 24, 31),
(44, 2, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 32),
(45, 2, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 33),
(46, 1, 'Macchiato con leche vaporizada', 10, 33),
(47, 1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 34),
(48, 1, '3 cafés Mocha', 29, 35),
(49, 2, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 1, 36),
(50, 1, 'Café espresso con una pequeña cantidad de leche vaporizada o espumada', 3, 36),
(51, 1, 'Café latte con sabor a caramelo', 7, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id_ingre` int(7) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descrip` text NOT NULL,
  `cod_prod` int(8) NOT NULL,
  `cod_mp` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_p`
--

CREATE TABLE `materia_p` (
  `codigo` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `p_reorden` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia_p`
--

INSERT INTO `materia_p` (`codigo`, `nombre`, `cantidad`, `p_reorden`) VALUES
(1, 'vasos', '193', 100),
(2, 'cafe molido', '93', 20),
(3, 'té', '98', 100),
(4, 'Stevia', '200', 50),
(5, 'Aromaticas', '300', 100),
(6, 'Mezclador Biodegradable', '1000', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `n_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `email_c` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`n_venta`, `fecha`, `email_c`) VALUES
(1, '2023-08-30', 'juansebasitan05@gmail.com'),
(2, '2023-08-30', 'juansebasitan05@gmail.com'),
(3, '2023-08-30', 'juansebasitan05@gmail.com'),
(4, '2023-08-30', 'juansebasitan05@gmail.com'),
(5, '2023-08-30', 'juansebasitan05@gmail.com'),
(6, '2023-08-30', 'juansebasitan05@gmail.com'),
(7, '2023-08-30', 'juansebasitan05@gmail.com'),
(8, '2023-08-30', 'juansebasitan05@gmail.com'),
(9, '2023-08-30', 'juansebasitan05@gmail.com'),
(10, '2023-08-30', 'juansebasitan05@gmail.com'),
(11, '2023-08-30', 'juansebasitan05@gmail.com'),
(12, '2023-08-30', 'juansebasitan05@gmail.com'),
(13, '2023-08-30', 'juansebasitan05@gmail.com'),
(14, '2023-08-30', 'juansebasitan05@gmail.com'),
(15, '2023-08-30', 'juansebasitan05@gmail.com'),
(16, '2023-08-30', 'juansebasitan05@gmail.com'),
(17, '2023-08-30', 'juansebasitan05@gmail.com'),
(18, '2023-08-30', 'juansebasitan05@gmail.com'),
(19, '2023-08-30', 'juansebasitan05@gmail.com'),
(20, '2023-08-30', 'juansebasitan05@gmail.com'),
(21, '2023-08-30', 'juansebasitan05@gmail.com'),
(22, '2023-08-30', 'juansebasitan05@gmail.com'),
(23, '2023-08-30', 'juansebasitan05@gmail.com'),
(24, '2023-08-30', 'juansebasitan05@gmail.com'),
(25, '2023-08-30', 'juansebasitan05@gmail.com'),
(26, '2023-08-30', 'ejemplo@efe.com'),
(27, '2023-08-30', 'juanortiz@gmail.com'),
(28, '2023-08-30', 'juanortiz@gmail.com'),
(29, '2023-08-30', 'juanortiz@gmail.com'),
(30, '2023-08-30', 'juanortiz@gmail.com'),
(31, '2023-09-04', 'pripra@gmail.com'),
(32, '2023-09-06', 'juanortiz@gmail.com'),
(33, '2023-09-06', 'juanortiz@gmail.com'),
(34, '2023-09-06', 'juanortiz@gmail.com'),
(35, '2023-09-06', 'juansebasitan05@gmail.com'),
(36, '2023-09-06', 'juansebasitan05@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(8) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio` int(6) NOT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `temperatura` varchar(15) DEFAULT NULL,
  `menu_esp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `descripcion`, `nombre`, `precio`, `tipo`, `temperatura`, `menu_esp`) VALUES
(1, 'Café espresso, leche vaporizada y jarabe de sabor opcional', 'Latte', 5000, 'bebida', 'frio', 0),
(2, 'Café espresso puro', 'Espresso', 3000, 'bebida', 'frio', 0),
(3, 'Café espresso con una pequeña cantidad de leche vaporizada o espumada', 'Macchiato', 4500, 'bebida', 'frio', 0),
(4, 'Café espresso, chocolate caliente o jarabe de chocolate, leche vaporizada y crema batida opcional', 'Mocha', 6000, 'bebida', 'frio', 0),
(5, 'Café molido de molienda gruesa con agua fría o a temperatura ambiente, servido con hielo', 'Cold Brew', 4500, 'bebida', 'frio', 0),
(6, 'Café latte con sabor a vainilla', 'Latte Vainilla', 5000, 'bebida', 'caliente', 0),
(7, 'Café latte con sabor a caramelo', 'Latte Caramelo', 5500, 'bebida', 'caliente', 0),
(8, 'Café tradicional con azúcar', 'Café Tradicional Azú', 3000, 'bebida', 'caliente', 0),
(9, 'Espresso puro', 'Espresso', 3500, 'bebida', 'caliente', 0),
(10, 'Macchiato con leche vaporizada', 'Macchiato', 4000, 'bebida', 'caliente', 0),
(11, 'Americano doble', 'Americano', 4500, 'bebida', 'caliente', 0),
(12, 'Infusión de menta con miel', 'Infusión Menta Miel', 2500, 'bebida', 'caliente', 0),
(13, 'Té de manzanilla', 'Té Manzanilla', 2000, 'bebida', 'caliente', 0),
(14, 'Té de jengibre endulzado', 'Té Jengibre', 2200, 'bebida', 'caliente', 0),
(15, 'Delicioso croissant recién horneado', 'Croissant', 2500, 'snack', NULL, 0),
(16, 'Muffin de arándanos', 'Muffin Arándanos', 2000, 'snack', NULL, 0),
(17, 'Muffin de chocolate', 'Muffin Chocolate', 2200, 'snack', NULL, 0),
(18, 'Pastel de zanahoria con crema de queso', 'Pastel Zanahoria', 3000, 'snack', NULL, 0),
(19, 'Pastel de chocolate con ganache', 'Pastel Chocolate', 2800, 'snack', NULL, 0),
(20, 'Sándwich de jamón y queso', 'Sándwich Jamón Queso', 3500, 'snack', NULL, 0),
(21, 'Sándwich de pollo a la parrilla', 'Sándwich Pollo', 3800, 'snack', NULL, 0),
(22, 'Sándwich de aguacate y tomate', 'Sándwich Aguacate To', 3200, 'snack', NULL, 0),
(23, 'Café molido de la marca (250g)', 'Café Molido 250g', 12000, 'cafe fresco', NULL, 1),
(24, 'Café molido de la marca (500g)', 'Café Molido 500g', 20000, 'cafe fresco', NULL, 1),
(25, 'Café en grano de la marca (250g)', 'Café en Grano 250g', 20000, 'cafe fresco', NULL, 1),
(26, 'Café en grano de la marca (500g)', 'Café en Grano 500g', 24000, 'cafe fresco', NULL, 1),
(28, 'atun fresco, lechiga, tomate, pan integral, cuscús', '3 sandwiches de atún', 25000, 'combo', '', 1),
(29, '3 cafés Mocha', 'Combo Mocha', 15000, 'combo', 'frio', 1),
(30, 'dulce de leche con sabor a café, con granos totados de café', 'Dulce de leche ', 10000, 'especial', NULL, 1),
(31, 'fghuijsd', 'nombre yo', 14000, 'combo', 'no', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminis`
--
ALTER TABLE `adminis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_p` (`cod_p`),
  ADD KEY `n_venta` (`n_venta`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id_ingre`),
  ADD KEY `cod_prd` (`cod_prod`),
  ADD KEY `cod_mp` (`cod_mp`);

--
-- Indices de la tabla `materia_p`
--
ALTER TABLE `materia_p`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`n_venta`),
  ADD KEY `email_c` (`email_c`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adminis`
--
ALTER TABLE `adminis`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id_ingre` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `n_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `cod_p` FOREIGN KEY (`cod_p`) REFERENCES `producto` (`codigo`),
  ADD CONSTRAINT `n_venta` FOREIGN KEY (`n_venta`) REFERENCES `pedidos` (`n_venta`);

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `cod_mp` FOREIGN KEY (`cod_mp`) REFERENCES `materia_p` (`codigo`),
  ADD CONSTRAINT `cod_prd` FOREIGN KEY (`cod_prod`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `email_c` FOREIGN KEY (`email_c`) REFERENCES `cliente` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
