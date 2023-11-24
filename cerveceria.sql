-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 18:02:22
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
-- Base de datos: `cerveceria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `identificador` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `graduacionAlcoholica` int(10) UNSIGNED DEFAULT NULL,
  `pais` varchar(60) DEFAULT NULL,
  `precio` int(10) UNSIGNED DEFAULT NULL,
  `ruta` varchar(100) NOT NULL
) ;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`identificador`, `nombre`, `tipo`, `graduacionAlcoholica`, `pais`, `precio`, `ruta`) VALUES
(1, 'La virgen', 'Rubia', 20, 'España', 4, 'public/pictures/05.360_imagen_ficha-1.png'),
(2, 'San Miguel', 'Tostada', 26, 'España', 3, 'public/pictures/176187.png'),
(3, 'Messina', 'Negra', 30, 'Italia', 5, '/public/pictures/2752027_CBG_FRONTAL_8fc7f2094f.png'),
(4, 'Adlerbrau Pilsen', 'Rubia', 19, 'España', 3, '/public/pictures/7083608_001.jpg'),
(5, 'Madri', 'De Trigo', 24, 'España', 4, '/public/pictures/00118603002728____7__600x600.jpg'),
(6, 'Tropical', 'Rubia', 20, 'España', 3, '/public/pictures/cerveza-canaria-tropical-limon.jpg'),
(7, 'Cruz Campo', 'Negra', 37, 'España', 4, '/public/pictures/CERVEZA-CRUZCAMPO-NRETBOT1-LT--------------------F46.jpg'),
(8, 'Corona Extra', 'De Trigo', 17, 'México', 3, '/public/pictures/Corona_Extra_Anheuser-Busch_InBev.jpg'),
(9, 'Dougalls', 'Negra', 30, 'España', 4, '/public/pictures/dougalls.webp'),
(10, 'Turia', 'Rubia', 24, 'España', 2, '/public/pictures/cerveza-turia-marzen-250ml-cerveza-turia-236189.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
