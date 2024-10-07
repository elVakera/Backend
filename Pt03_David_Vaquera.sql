-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 22:39:53
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
-- Base de datos: `Pt03_david_vaquera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--
DROP DATABASE IF EXISTS Pt03_david_vaquera;
CREATE DATABASE IF NOT EXISTS `Pt03_david_vaquera`;
USE `Pt03_david_vaquera`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(1) UNSIGNED NOT NULL COMMENT 'Identificador',
  `titol` text DEFAULT NULL COMMENT 'Titulo del articulo',
  `cos` text DEFAULT NULL COMMENT 'Texto del articulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `titol`, `cos`) VALUES
(57, 'hola', 'asfasfas'),
(58, 'hola 1', 'jbfksjf'),
(59, 'adsad hola', 'dadad'),
(60, 'holasa', 'safasf'),
(61, 'pepino', 'asfsaf'),
(62, 'pepino 24', 'bfksabfosubfldjvbñdsjvbdñjbv´dsvb-dsjlvb´dsvnd-lkvdjbv-djlsbv´djbv-lkdbdv´djsbvs-jdbv´kj-lds vdjlbdv-jdv-jd v-kjdv´j-d -vjd vj- d-vj d-dvkj d-slkvb´dkvnDLKsnvbdsKv dslkvndksl vldskjvb-lkjds -vlkdb-vlk d-lkvbd-kv -dlv -dlskbvD_Kls vDLKSvs´nkD svLKDs vlkdsb´vlkj-d s-lvj-d klv d-lkvj ´d-v d-kvj d-');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
