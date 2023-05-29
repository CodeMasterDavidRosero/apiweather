-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2023 a las 04:53:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apiweather`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ciudad` varchar(60) COLLATE utf32_spanish2_ci NOT NULL,
  `estado` varchar(60) COLLATE utf32_spanish2_ci NOT NULL,
  `temperatura` varchar(60) COLLATE utf32_spanish2_ci NOT NULL,
  `humedad` varchar(60) COLLATE utf32_spanish2_ci NOT NULL,
  `clima` varchar(60) COLLATE utf32_spanish2_ci NOT NULL,
  `latitud` double(10,6) NOT NULL,
  `longitud` double(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id`, `fecha`, `ciudad`, `estado`, `temperatura`, `humedad`, `clima`, `latitud`, `longitud`) VALUES
(1, '2023-05-29', 'Orlando', 'FL', '24.89', '69', 'algo de nubes', 28.542100, -81.379000),
(2, '2023-05-29', 'Orlando', 'FL', '24.89', '69', 'algo de nubes', 28.542100, -81.379000),
(3, '2023-05-29', 'Orlando', 'FL', '24.89', '69', 'algo de nubes', 28.542100, -81.379000),
(4, '2023-05-29', 'Orlando', 'FL', '24.47', '73', 'algo de nubes', 28.542100, -81.379000),
(5, '2023-05-29', 'Orlando', 'FL', '24.32', '74', 'algo de nubes', 28.542100, -81.379000),
(6, '2023-05-29', 'Miami', 'FL', '27.78', '63', 'algo de nubes', 25.774300, -80.193700),
(7, '2023-05-29', 'Orlando', 'FL', '24.32', '74', 'algo de nubes', 28.542100, -81.379000),
(8, '2023-05-29', 'Orlando', 'FL', '23.95', '77', 'algo de nubes', 28.542100, -81.379000),
(9, '2023-05-29', 'Orlando', 'FL', '23.95', '77', 'algo de nubes', 28.542100, -81.379000),
(10, '2023-05-29', 'Orlando', 'FL', '23.95', '77', 'algo de nubes', 28.542100, -81.379000),
(11, '2023-05-29', 'Orlando', 'FL', '23.95', '77', 'algo de nubes', 28.542100, -81.379000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
