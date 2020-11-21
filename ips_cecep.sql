-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 23:28:26
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
  `nom_cargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nom_cargo`) VALUES
(1, 'Director de Sede'),
(2, 'Medico'),
(3, 'Asesor de clientes'),
(4, 'Ingeniero de Sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `nro_cita` int(10) NOT NULL,
  `id_func` bigint(10) NOT NULL,
  `id_pac` bigint(10) NOT NULL,
  `id_sede` int(4) NOT NULL,
  `id_espec` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `Detalle` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`nro_cita`, `id_func`, `id_pac`, `id_sede`, `id_espec`, `fecha`, `hora`, `Detalle`) VALUES
(1, 102, 225563622, 1015, 1, '2020-11-13', '15:53:27', 'Me duele el estomago y tengo nauseas creo que Ipia me embarazó'),
(6, 101, 1112486444, 1011, 1, '2020-11-09', '16:40:00', NULL);

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
(1001, 'Cali', 101),
(1002, 'Bogota', 101),
(1003, 'Barranquilla', 101),
(1004, 'Medellin', 101),
(1005, 'Pereira', 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_espec` int(4) NOT NULL,
  `nom_espec` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `derivacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_espec`, `nom_espec`, `derivacion`) VALUES
(1, 'Medicina General', 'Medico General'),
(2, 'Odontologia', 'Odontologo(a)'),
(3, 'Ginecologia', 'Ginecologo(a)'),
(4, 'Oftalmologia', 'Oftalmologo(a)'),
(5, 'Traumatologia', 'Traumatologo(a)'),
(6, 'Pediatria', 'Pediatra'),
(7, 'Dermatologia', 'Dermatologo(a)'),
(8, 'Cardiologia', 'Cardiologo(a)'),
(9, 'Coordinador', 'Coordinador'),
(10, 'Manager', 'Manager'),
(11, 'SAC', 'Asesor de clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_func` bigint(10) NOT NULL,
  `id_priv` int(4) NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nom_user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nom2_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ape2_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_user` bigint(10) NOT NULL,
  `cc_user` bigint(10) NOT NULL,
  `email_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_cargo` int(4) DEFAULT NULL,
  `id_espec` int(4) DEFAULT NULL,
  `id_sede` int(4) NOT NULL,
  `img_user` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`id_func`, `id_priv`, `username`, `password`, `nom_user`, `nom2_user`, `ape_user`, `ape2_user`, `tel_user`, `cc_user`, `email_user`, `id_cargo`, `id_espec`, `id_sede`, `img_user`) VALUES
(101, 2, 'medico1', 'ytfrcyjvguyr', 'Cristian', 'David', 'Loaiza', 'Estrada', 3017505543, 1234894, 'yoquese@menos.com', 2, 3, 1021, 'cristian.jpg'),
(102, 2, 'medico2', '8548413165651', 'rafael', '', 'Londono', '', 5154861, 33265154, 'asdsda@gmail.com', 2, 1, 1011, NULL),
(103, 2, 'iwachu', '$2y$12$TlUviODMVkF9AfIhKXVgiu8KB0eN7ZXbBY7Moe6SbxYarehNnz2hu', 'rafael', 'David', 'Londono', 'Estrada', 1234567, 12348945, 'asdvausb@dufhs.com', 1, 9, 1021, NULL),
(104, 2, 'jtiro', '4444', 'Jhin', 'Cuarto', 'Tiro', 'Sublime', 4444444, 4444, 'elvirtuoso@cuatro.com', 2, 1, 1015, ''),
(107, 2, 'mrogada', '100505040', 'Mariana', 'Rogada', 'Rogada', 'Mariana', 301205020, 100505040, 'marianarogada@gmail.com', 1, 9, 1012, NULL),
(108, 2, 'lperez', '98205050', 'luisa', 'andrea', 'perez', 'palacio', 301252020, 98205050, 'luisaperezpalacio@gmail.com', 1, 9, 1013, NULL),
(109, 2, 'jramirez', '89526600', 'juan', 'andres', 'ramirez', 'ramirez', 32002020, 89526600, 'juanramirez@gmail.com', 3, 11, 1014, NULL),
(110, 2, 'mgonzalez', '67520520', 'marily', 'paola', 'gonzalez', 'herrera', 316205055, 67520520, 'marilygonzalez@gmail.com', 1, 9, 1015, NULL),
(1112486446, 1, 'rlondono', '1112486446', 'Rafael', 'Andres', 'Londono', 'Loaiza', 3182665156, 1112486446, 'andreslondonho@gmail.com', 4, 10, 1021, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medcto` int(4) NOT NULL,
  `nom_medcto` varchar(20) NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medcto`, `nom_medcto`, `stock`) VALUES
(2, 'Acetaminofen', 90),
(3, 'Ibuprofeno', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_pac` bigint(10) NOT NULL,
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
(15256250, 'Valeria', 'Rivera', 15256250, 'valeryrivera@gmail.com', 3155500, 'carrera 20 #4-2', 1003),
(65828220, 'Julian', 'Valeria', 65828220, 'julianvaleria@gmail.com', 31202020, 'avenida 3 norte #20-20', 1004),
(98552520, 'Kevin', 'Trujillo', 98552520, 'kevintrujillo@gmail.com', 31505250, 'carrera 35 A', 1003),
(225563622, 'valeria andrea', 'capote sandoval', 225563622, 'valeriacapote@gmail.com', 30250520, 'calle 50 #30-40', 1003),
(1112486444, 'rafael', 'loaiza', 1112486444, 'jfytf@hjhb.com', 3215465, 'cra34#54-98', 1001);

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
(101, 'Colombia', 'Bogota D.C.'),
(102, 'Canada', 'Ottawa'),
(103, 'Estados Unidos', 'Washintong D.C.'),
(104, 'Espana', 'Madrid'),
(107, 'Mexico', 'Ciudad de Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id_priv` int(1) NOT NULL,
  `nom_priv` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id_priv`, `nom_priv`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Asesor'),
(4, 'Director');

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
  `id_rol` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nom_sede`, `dir_sede`, `tel_sede`, `id_ciu`, `id_rol`) VALUES
(1011, 'Champagnat', 'Cl. 9b #29a67', 3828282, 1001, 103),
(1012, 'Bosa', 'Carrera 80 con avenida 3', 4050520, 1002, 107),
(1013, 'Riomar', 'Calle 110 avenida circunvalar', 1002020, 1003, 108),
(1014, 'Belensito', 'Calle 29A #69b-2 a 69b-92', 6505050, 1003, 103),
(1015, 'Consota', 'Kilometro 11 Vía Pereira, Pere', 542020, 1005, 110),
(1021, 'Autonoma', 'Cll 43 # 45-845', 5555555, 1001, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_serv` int(4) NOT NULL,
  `nom_serv` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_serv`, `nom_serv`) VALUES
(1, 'Odontologia'),
(2, 'Medicina general'),
(3, 'Ginecologia'),
(4, 'Oftamologia'),
(5, 'Traumatologia'),
(6, 'Pediatria'),
(7, 'Dermatologia'),
(8, 'Cardiologia');

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
  ADD KEY `id_rol` (`id_func`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_serv` (`id_espec`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciu`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_espec`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_func`),
  ADD UNIQUE KEY `cc_user` (`cc_user`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_priv` (`id_priv`),
  ADD KEY `id_espec` (`id_espec`),
  ADD KEY `id_sede` (`id_sede`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medcto`);

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
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id_priv`);

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
  MODIFY `nro_cita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciu` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Codigoo de la ciudad', AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medcto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del pais', AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la sede', AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_serv` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`id_espec`) REFERENCES `especialidad` (`id_espec`),
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`id_pac`) REFERENCES `pacientes` (`id_pac`),
  ADD CONSTRAINT `cita_ibfk_5` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`id_priv`) REFERENCES `privilegios` (`id_priv`),
  ADD CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`id_espec`) REFERENCES `especialidad` (`id_espec`),
  ADD CONSTRAINT `funcionarios_ibfk_4` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_ciu`) REFERENCES `ciudad` (`id_ciu`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`id_ciu`) REFERENCES `ciudad` (`id_ciu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
