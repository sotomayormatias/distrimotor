-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2016 a las 01:49:17
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `distrimotor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(11) NOT NULL,
  `cat_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'motor'),
(2, 'chasis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cte_id` int(11) NOT NULL,
  `cte_nombre` varchar(300) NOT NULL,
  `cte_domicilio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `vta_id` int(11) NOT NULL,
  `prd_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prd_codigo` varchar(20) NOT NULL,
  `prd_nombre` varchar(200) NOT NULL,
  `prd_descripcion` varchar(500) NOT NULL,
  `prd_stock` int(11) NOT NULL,
  `prd_precio_costo` float(8,2) NOT NULL,
  `prd_ganancia` float(5,3) NOT NULL,
  `prd_precio_final` float(8,2) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prd_codigo`, `prd_nombre`, `prd_descripcion`, `prd_stock`, `prd_precio_costo`, `prd_ganancia`, `prd_precio_final`, `cat_id`) VALUES
('10201/4010', 'cb sinter ford taunus 010', 'sin descripcion', 100, 146.02, 10.000, 0.10, 1),
('10201/4020', 'cb sinter ford taunus 020', 'sin descripcion', 100, 146.02, 10.000, 0.10, 2),
('10201/4030', 'cb sinter ford taunus 030', 'sin descripcion', 100, 146.02, 10.000, 0.10, 1),
('10201/4040', 'cb sinter ford taunus 040', 'sin descripcion', 100, 146.02, 10.000, 0.10, 2),
('10237/4000', 'cb sinter renault jr ', 'sin descripcion', 100, 231.58, 10.000, 0.10, 1),
('10237/4010', 'cb sinter renault jr 010', 'sin descripcion', 100, 231.58, 10.000, 0.10, 1),
('10237/4020', 'cb sinter renault  jr 020', 'sin descripcion', 100, 231.58, 10.000, 0.10, 2),
('10237/4030', 'cb sinter renault jr 030', 'sin descripcion', 100, 231.58, 10.000, 0.10, 1),
('10237/4040', 'cb sinter renault jr 040', 'sin descripcion', 100, 231.58, 10.000, 0.10, 2),
('10241/4000', 'cb sinter renault  18 2.0 ', 'sin descripcion', 100, 195.58, 10.000, 0.10, 1),
('10241/4010', 'cb sinter renault 18 2.0 010', 'sin descripcion', 100, 195.58, 10.000, 0.10, 2),
('10241/4020', 'cb sinter renault 18 2.0 020', 'sin descripcion', 100, 195.58, 10.000, 0.10, 1),
('10241/4030', 'cb sinter renault 18 2.0 030', 'sin descripcion', 100, 195.58, 10.000, 0.10, 2),
('10243/4000', 'cb sinter renault f8q ', 'sin descripcion', 100, 244.72, 10.000, 0.10, 1),
('10243/4010', 'cb sinter renault f8q 010', 'sin descripcion', 100, 244.72, 10.000, 0.10, 1),
('10243/4020', 'cb sinter renault f8q 020', 'sin descripcion', 100, 244.72, 10.000, 0.10, 2),
('10243/4030', 'cb sinter renault f8q 030', 'sin descripcion', 100, 244.72, 10.000, 0.10, 1),
('10244/4000', 'cb sinter renault 18 2.2', 'sin descripcion', 100, 223.96, 10.000, 0.10, 1),
('10244/4010', 'cb sinter renault trafic diesel 010', 'sin descripcion', 100, 223.96, 10.000, 0.10, 2),
('10244/4020', 'cb sinter renault trafic diesel 020', 'sin descripcion', 100, 223.96, 10.000, 0.10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nick` varchar(50) NOT NULL,
  `usu_clave` varchar(20) NOT NULL,
  `usu_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nick`, `usu_clave`, `usu_nombre`) VALUES
(1, 'admin', 'admin123', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `vta_id` int(11) NOT NULL,
  `vta_total_costo` float NOT NULL,
  `vta_total_bruto` float NOT NULL,
  `vta_fecha` date NOT NULL,
  `cte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cte_id`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD KEY `vta_id` (`vta_id`),
  ADD KEY `prd_codigo` (`prd_codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prd_codigo`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`vta_id`),
  ADD KEY `usu_id` (`cte_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cte_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `vta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`vta_id`) REFERENCES `ventas` (`vta_id`),
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`cat_id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cte_id`) REFERENCES `clientes` (`cte_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
