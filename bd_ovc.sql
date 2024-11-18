-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 00:18:17
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
(2, 'Carcasa', NULL),
(3, 'Lentes de contacto', NULL),
(8, 'Lentes de sol', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_cliente`, `id_empleado`, `fecha_cita`, `hora`, `motivo`, `estado`) VALUES
(28, 9, NULL, '2024-11-05', '15:30:00', 'bjbklñ,.{', 'Pendiente'),
(30, 3, NULL, '2024-11-05', '16:30:00', 'dffwfwefwfwqwqecxavdvsvs', 'Pendiente'),
(52, 89, NULL, '2024-11-14', '16:00:00', 'prueba', 'Pendiente'),
(53, 89, NULL, '2024-11-14', '16:30:00', 'prueba2', 'Pendiente');

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
  `codigo_cliente` int(11) DEFAULT NULL,
  `libre2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `preescripcion`, `contrasena`, `verificado`, `rol`, `codigo_cliente`, `libre2`) VALUES
(3, 'Maria', 'Euan', 'emii@euan1.com', '1234567890', '5000 Harbour Lake Drive', 'grande', NULL, 'False', 'Cliente', NULL, NULL),
(8, 'Jose', 'Pedro', 'asdas@gmai.com', '1234599999', '5000 Harbour Lake Drive', 'mmmmmmmm', NULL, 'False', 'Cliente', NULL, NULL),
(9, 'Jose Miguel', 'Euan Puc', '\'OR\'1\'=\'1--@bdkabsd.com', '9991280818', '5000 Harbour Lake Drive', 'No hay ', NULL, 'False', 'Cliente', NULL, NULL),
(78, 'Jonathan Yair', 'Heredia Cardenas', 'jonathanheredia9922@gmail.com', '5648445649', 'njbubjkn', '', '$2y$10$99K3yfwbiG27k2wHWYBD..0wqqlXXjax5WWTYMylao2eZTFFCa9Cm', 'False', 'Cliente', NULL, NULL),
(89, 'Angel Alfonso', 'Avila Garcia', 'alfonsoavilag30@gmail.com', '9991787092', 'calle 8 #100i entre 19 y 19A fracc.los arcos cp.97370', 'chequeo', '$2y$10$azskaqXxcxVE1c0M/XsFKu8GR.H63PO/EV6IvzNl/U.oWvYs/4heK', 'False', 'Cliente', NULL, NULL),
(90, 'Maria Jose', 'Euan Puc', 'euangaspar155@gmail.com', '9991280818', '5000 Harbour Lake Drive', 'Prueba de editado desde empleados ', '$2y$10$NVR5yr3Px8cFND7LiyxqaudAt9O1V5xe23DVeb08sdySUBG7TTUJG', 'False', 'Cliente', 3228, NULL);

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
  `codigo_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `rol`, `fecha_contratacion`, `usuario`, `contrasena`, `codigo_empleado`) VALUES
(1, NULL, NULL, 'emilianoeuan155@gmail.com', NULL, NULL, 'Administrador', NULL, 'DevSociety', '$2y$10$Kim9rYDF.bx4CauRGaPkz.RLbcdmexe1JoeZQN4.Vbhhyz1L9ZN0u', NULL),
(36, 'Gaspar Emiliano', 'Euan Puc', 'asiesnos@gmail.com', '9991280818', '5000 Harbour Lake Drive', 'Administrador', '2024-11-17', 'administrador', '$2y$10$YTOQkVUr6qd4XGAxY0cxfO3rmrv7I6gxtOFeOlYFDfCn83TvfYXrm', 4239);

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
  `recomendacion` text DEFAULT NULL,
  `libre` text DEFAULT NULL,
  `libre2` int(11) DEFAULT NULL
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
(10, 'Lentes de dona', 1, 17, 'Prueba donas\r\n', 0, 4, '../productos/2024-11-10-08-27-19-practica.png'),
(11, 'fsdfsdf', 1, 5, 'sdfsadfs sd sdf sds df sdf sd ', 0, 9, '../productos/2024-11-05-01-19-01-grape_donut.png'),
(12, 'sdfasdfsdf', 2, 10, 'fssadf', 0, 4, '../productos/2024-11-10-08-05-03-userstory-scaled-1.jpg');

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
(9, 'Proveedor B', 'nombre', 'sdfsdfasdf@gmail', '9999999999', 'direccion', NULL, NULL);

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
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `citas-cliente` (`id_cliente`),
  ADD KEY `citas-empleado` (`id_empleado`);

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
  MODIFY `id_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `historial_citas`
--
ALTER TABLE `historial_citas`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas-cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas-empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

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
