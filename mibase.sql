-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2021 a las 21:06:30
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mibase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `ci` int(11) NOT NULL,
  `color` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`ci`, `color`) VALUES
(1, '#32a852'),
(2, '#0062ff'),
(3, '#32a852'),
(4, '#ff8000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ci` int(11) DEFAULT NULL,
  `sigla` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `nota1` int(11) DEFAULT NULL,
  `nota2` int(11) DEFAULT NULL,
  `nota3` int(11) DEFAULT NULL,
  `notaF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ci`, `sigla`, `nota1`, `nota2`, `nota3`, `notaF`) VALUES
(1, 'INF-111', 30, 30, 25, 85),
(1, 'INF-112', 15, 17, 19, 51),
(1, 'INF-113', 10, 20, 0, 30),
(2, 'INF-121', 15, 20, 30, 65),
(2, 'INF-122', 30, 40, 0, 70),
(2, 'INF-125', 30, 30, 5, 60),
(3, 'INF-111', 25, 10, 15, 50),
(3, 'INF-112', 25, 25, 25, 75),
(3, 'INF-115', 23, 26, 0, 49),
(4, 'INF-121', 13, 15, 7, 35),
(4, 'INF-122', 19, 13, 20, 52),
(4, 'INF-125', 15, 56, 7, 78),
(4, 'INF-123', 0, 25, 25, 50),
(2, 'INF-111', 50, 20, 30, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombrecompleto` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `departamento` varchar(2) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombrecompleto`, `fechanac`, `departamento`) VALUES
(1, 'Guillermo Laura', '1999-01-20', '02'),
(2, 'Alan Brito', '1999-01-20', '02'),
(3, 'Cristian Laura', '1999-01-20', '01'),
(4, 'Esteban Quito', '1999-01-20', '06'),
(5, 'Moi Silva', '1999-01-20', '06'),
(6, 'Moi Perez', '1999-01-20', '07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolsesion`
--

CREATE TABLE `rolsesion` (
  `ci` int(11) NOT NULL,
  `rol` varchar(3) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rolsesion`
--

INSERT INTO `rolsesion` (`ci`, `rol`) VALUES
(1, 'E'),
(2, 'E'),
(3, 'E'),
(4, 'E'),
(5, 'D'),
(6, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` int(11) DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `password` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `usuario`, `password`) VALUES
(1, 'user1', 'contraseña1'),
(2, 'user2', 'contraseña2'),
(3, 'user3', 'contraseña3'),
(4, 'user4', 'contraseña4'),
(5, 'user5', 'contraseña5'),
(6, 'user5', 'contraseña6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `rolsesion`
--
ALTER TABLE `rolsesion`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD KEY `ci` (`ci`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
