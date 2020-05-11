-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2020 a las 00:26:50
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elgranpe_sys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_empresa` varchar(150) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigo_postal` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `telefono2` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_empresa`, `direccion`, `ciudad`, `codigo_postal`, `estado`, `telefono`, `telefono2`, `email`, `logo_url`, `whatsapp`, `facebook`, `twitter`, `instagram`) VALUES
(1, 'INVERSIONES  EL GRAN PEGASO', 'AVENIDA FERNANDEZ PADILLA GALPON PEGASO. SECTOR CRUZ BELEN CLARINES EDO. ANZOATEGUI - VENEZUELA ZIP: 6008.', 'Barcelona', '6008', 'AnzoÃƒÆ’Ã‚Â¡tegui', '+(58) 414 388 8060', '+(58) 0281 424 97', 'inversioneselgranpegaso@gmail.com', 'img/1529623689_Logo.png', '', '/', 'PegoPegaso', 'ppegaso1523');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` char(25) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `pesokg` varchar(7) NOT NULL,
  `pesolbs` varchar(8) NOT NULL,
  `clasificacion` varchar(255) NOT NULL,
  `tag` varchar(9) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `nombre_producto`, `tipo`, `pesokg`, `pesolbs`, `clasificacion`, `tag`, `imagen`, `pdf`, `date_added`) VALUES
(1, 'Ultra Flex Blanco', 'Mortero Premium', '22.7KG', '50LBS', 'Internacional', 'Premium', 'img/UltraFlexBlanco.png', 'img/Ficha_UltraFlexBlanco.pdf', '2018-06-18 07:10:52'),
(2, 'Ultra Flex Gris', 'Mortero Premium', '22.7KG', '50LBS', 'Internacional', 'Premium', 'img/PegoUltraFlexGris.png', 'img/Ficha_PegoUltraFlexGris.pdf', '2018-06-18 07:11:44'),
(3, 'Ultra Pego Blanco', 'Mortero Premium', '22.7KG', '50LBS', 'Internacional', 'Premium', 'img/PegoUltraBlanco.png', 'img/Ficha_PegoUltraBlanco.pdf', '2018-06-18 07:12:09'),
(4, 'Ultra Pego Gris', 'Mortero Premium', '22.7KG', '50LBS', 'Internacional', 'Premium', 'img/PegoUltraGris.png', 'img/Ficha_PegoUltraGris.pdf', '2018-06-18 07:12:30'),
(5, 'PegaBloque', 'Mortero', '42KG', '93.70LBS', 'Internacional', 'Mortero', 'img/PegaBloque.png', 'img/Ficha_PegaBloque.pdf', '2018-06-18 07:13:13'),
(6, 'Pegafris PaÃ±ete', 'Mortero', '42KG', '93.70LBS', 'Internacional', 'Mortero', 'img/PegaFris.png', 'img/Ficha_PegaFris.pdf', '2018-06-18 07:13:49'),
(7, 'Estuco Plus Gris y Blanco', 'Pasta', '14KG', '30.86LBS', 'Internacional', 'Mortero', 'img/EstucoPlusGris.png', 'img/Ficha_EstucoPlusGris.pdf', '2018-06-18 07:14:37'),
(26, 'PegaFris', 'Mortero', '21KG', '46.29LBS', 'Nacional', 'Mortero', 'img/u7085-r.png', 'img/FICHA TECNICA PAGAFRIS friso.pdf', '2018-06-25 19:48:27'),
(27, 'Pegamento Especial', 'Mortero', '13KG', '28.66LBS', 'Nacional', 'Premium', 'img/u7099-r.png', 'img/FICHA TECNICA PEGASO FLEX.pdf', '2018-06-25 19:52:21'),
(28, 'Pego Blanco', 'Mortero', '13KG', '28.66LBS', 'Nacional', 'Mortero', 'img/u7078-r.png', '', '2018-06-25 19:54:00'),
(29, 'Pego Gris', 'Mortero', '13KG', '28.66LBS', 'Nacional', 'Mortero', 'img/u7070-r.png', '', '2018-06-25 19:54:45'),
(30, 'Plus Caico-Terracota', 'Mortero', '13KG', '28.66LBS', 'Nacional', 'Mortero', 'img/u7092-r.png', 'img/FICHA TECNICA DE ESTUCO CLASICO.pdf', '2018-06-25 19:55:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(12) NOT NULL,
  `clasificacion` varchar(50) NOT NULL,
  `texto` varchar(120) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `tipo`, `clasificacion`, `texto`, `pdf`) VALUES
(3, 'Prueba de', 'Cernido/Calentamientos', 'Pruebas realizadas para determinar la granutometria y la humedad del producto. Las cuales concluyeron con que cumple', 'img/Prueba de Cernido.pdf'),
(6, 'AnÃ¡lisis', 'Fisico/Quimicos', 'Realiza para determinar la composicion fisica y quimica del producto para asi maximizar la calidad del producto desde su', 'img/Analisis Fisico Quimico.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
