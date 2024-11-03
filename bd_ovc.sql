-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2024 a las 06:27:40
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
-- Base de datos: `bd_ovc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(5) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  `libre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `libre`) VALUES
(1, 'Lentes', NULL),
(3, 'Lentes de contacto', NULL),
(7, 'carcasa', NULL),
(9, 'Pa\' Lap ', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(100) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `motivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha`, `hora`, `nombre_cliente`, `motivo`) VALUES
(3, '2024-11-14', '05:00', 'Alfi Avila', 'Me estoy quedando calvo'),
(6, '2024-11-12', '12:00', 'Gaspar Emiliano Euan Puc', 'MOTIVO XD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(5) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `preescripcion` text DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `verificado` varchar(10) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `libre` int(11) DEFAULT NULL,
  `libre2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `preescripcion`, `contrasena`, `verificado`, `rol`, `libre`, `libre2`) VALUES
(1, 'Emiliano', 'Euan', 'emii@sd.com', '9999999999', '5000 Harbour Lake Drive', 'receta', NULL, 'False', 'Cliente', NULL, NULL),
(2, 'cliente ', 'prueba', 'cuenta@gmail.com', '9997379384', 'av calle ', 'earexchvj', NULL, 'False', 'Cliente', NULL, NULL),
(3, 'Emiliano', 'Euan', 'emii@euan1.com', '1234567890', '5000 Harbour Lake Drive', 'grande', NULL, 'False', 'Cliente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `libre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `rol`, `fecha_contratacion`, `usuario`, `contrasena`, `libre`) VALUES
(1, NULL, NULL, 'emilianoeuan155@gmail.com', NULL, NULL, 'Administrador', NULL, 'DevSociety', '$2y$10$SCaDE9Wcaj3nsGFle7kq1e9UCgJIwfoYeyPfaED4kZ74K.50c/prW', NULL),
(22, 'Maria Jose', 'Euan', 'mari@gmail.com', '1234567890', '5000 Harbour Lake Drive', 'Empleado', '2024-10-22', 'majo', '$2y$10$EbWZtGYToHBRagV41.KxleUl8udEWsrmDRpubZSfPmjyoEpHUuCsm', NULL),
(25, 'Joel ', 'trazo ', 'joel@gmail.com', '9991823723', 'tec', 'Administrador', '2024-10-24', 'Joel', '$2y$10$d3j4TwtSdohWV/KgXv8Yauk45fPILVlmziq3zljdbxObIFUQCy6bu', NULL),
(26, 'Alfonso ', 'avila', 'alfonsoavilag30@gmail.com', '9991787092', 'tec', 'Administrador', '2024-10-24', 'Alfonso', '$2y$10$KHtrIwnk0QFKKEsaHlIaneq46iGxcu6DFMPTgwfXnNu2DZO2jA6em', NULL),
(27, '', '', '', '', '', '', '0000-00-00', '', '$2y$10$uNReklho2p0CwMNkZ1VTDuZDVjKVXcXVuUIjuE975pN58s/wrOs8a', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_citas`
--

CREATE TABLE `historial_citas` (
  `id_historial` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_cita` date DEFAULT NULL,
  `resultado` text DEFAULT NULL,
  `recomendacion` text DEFAULT NULL,
  `libre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `id_categoria` int(5) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `id_categoria`, `precio`, `descripcion`, `stock`, `id_proveedor`, `img`) VALUES
(10, 'lentes juel ', 1, 1, 'de tu color ideal ', 1, 4, '../productos/2024-10-24-06-51-52-4161HYLkB3L._AC_SY580_.jpg'),
(12, 'lente1', 3, 20, 'Contacto ', 4, 4, '../productos/2024-10-24-06-54-49-4161HYLkB3L._AC_SY580_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `suministro` varchar(50) DEFAULT NULL,
  `libre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `contacto`, `correo`, `telefono`, `direccion`, `suministro`, `libre`) VALUES
(4, 'Proveedor A', 'Luis Manuel', 'luis@proveedorz.com', '1234567890', 'Calle 789, Ciudad C', NULL, NULL),
(14, 'Cinepolis', 'Alfonso', 'alfonsoavilag30@gmail.com', '9991787092', 'direccion', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `historial-cita` (`id_cita`),
  ADD KEY `historial-cliente` (`id_cliente`),
  ADD KEY `historial-empleado` (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto-categoria` (`id_categoria`),
  ADD KEY `producto-proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  ADD CONSTRAINT `historial-cita` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial-cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial-empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `producto-categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto-proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
