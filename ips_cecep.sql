-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2020 a las 17:17:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ips_cecep`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(4) NOT NULL,
  `nom_cargo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nom_cargo`) VALUES
(1, 'Director de Sede');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `nro_cita` int(10) NOT NULL,
  `id_cargo` int(4) NOT NULL,
  `id_rol` int(4) NOT NULL,
  `valor_cita` bigint(6) NOT NULL,
  `id_pac` bigint(10) NOT NULL,
  `id_sede` int(4) NOT NULL,
  `id_serv` int(4) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciu` int(4) NOT NULL COMMENT 'Codigoo de la ciudad',
  `nom_ciu` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la ciudad',
  `id_pais` int(4) NOT NULL COMMENT 'Codigo del pais al que pertenece la ciudad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciu`, `nom_ciu`, `id_pais`) VALUES
(1001, 'Cali', 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_med` int(11) NOT NULL,
  `cc_med` int(15) NOT NULL,
  `nom_med` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_med` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tel_med` bigint(20) NOT NULL,
  `sede` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `espec` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `img_med` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_med`, `cc_med`, `nom_med`, `ape_med`, `tel_med`, `sede`, `espec`, `img_med`) VALUES
(1, 1112486446, 'Rafael Andres', 'Londono Loaiza', 3182665156, 'Cali', 'Medico General', 'andres.jpg'),
(2, 1005828611, 'Cristian David', 'Loaiza Estrada', 3017505543, 'Palmira', 'Odontologo', 'cristian.jpg'),
(3, 1007352231, 'Esteban', 'Penaranda Campo', 3128705098, 'Candelaria', 'Ginecologo', 'esteban.jpg'),
(4, 1005872140, 'Julian', 'Ipia Capote', 3116547336, 'Pance', 'Oftalmologo', 'unknown.jpg'),
(5, 1006048640, 'Sebastian', 'Idrobo Castaneda', 3003983213, 'Guacarí', 'Traumatologo', 'sebastian.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_pac` int(4) NOT NULL,
  `nom_pac` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ape_pac` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cc_pac` bigint(10) NOT NULL,
  `email_pac` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tel_pac` int(10) NOT NULL,
  `dir_pac` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_ciu` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_pac`, `nom_pac`, `ape_pac`, `cc_pac`, `email_pac`, `tel_pac`, `dir_pac`, `id_ciu`) VALUES
(1, 'rafael', 'loaiza', 123456789, 'jfytf@hjhb.com', 3215465, 'cra34#54-98', 1001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(4) NOT NULL COMMENT 'Codigo del pais',
  `nom_pais` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del pais',
  `cap_pais` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Capital del pais'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nom_pais`, `cap_pais`) VALUES
(101, 'Colombia', 'Bogota D.C.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(4) NOT NULL,
  `tipo_rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nom_user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ape_user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tel_user` int(10) NOT NULL,
  `cc_user` bigint(10) NOT NULL,
  `email_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_cargo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `tipo_rol`, `username`, `password`, `nom_user`, `ape_user`, `tel_user`, `cc_user`, `email_user`, `id_cargo`) VALUES
(10001, 'Usuario Intermedio', 's6an', '12345', 'cristian', 'londoño', 1234567, 111248654, 'yoquese@menos.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(4) NOT NULL COMMENT 'Codigo de la sede',
  `nom_sede` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la sede',
  `dir_sede` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Direccion de la sede',
  `tel_sede` int(10) NOT NULL COMMENT 'Telefono de la sede',
  `id_ciu` int(4) NOT NULL COMMENT 'Codigo de la ciudad a la que pertenece la sede',
  `id_rol` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nom_sede`, `dir_sede`, `tel_sede`, `id_ciu`, `id_rol`) VALUES
(1011, 'Champagnat', 'Cl. 9b #29a67', 3828282, 1001, 10001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_serv` int(4) NOT NULL,
  `nom_serv` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`nro_cita`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_serv` (`id_serv`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciu`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_med`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_pac`),
  ADD UNIQUE KEY `cc_pac` (`cc_pac`),
  ADD KEY `id_ciu` (`id_ciu`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `cc_user` (`cc_user`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `id_ciu` (`id_ciu`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_serv`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `nro_cita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_pac` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`id_serv`) REFERENCES `servicios` (`id_serv`),
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`id_pac`) REFERENCES `pacientes` (`cc_pac`),
  ADD CONSTRAINT `cita_ibfk_5` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_ciu`) REFERENCES `ciudad` (`id_ciu`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`id_ciu`) REFERENCES `ciudad` (`id_ciu`),
  ADD CONSTRAINT `sede_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
