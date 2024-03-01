-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-03-2024 a las 17:27:00
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
-- Base de datos: `petsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `photo` varchar(64) NOT NULL DEFAULT 'images/photo-pet.png',
  `kind` varchar(32) NOT NULL,
  `weight` int(3) NOT NULL,
  `age` int(3) NOT NULL,
  `breed` varchar(32) NOT NULL,
  `location` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `name`, `photo`, `kind`, `weight`, `age`, `breed`, `location`) VALUES
(1, 'Firulais', '1708984846.png', 'Dog', 25, 3, 'Galgo', 'Manizales'),
(2, 'Michi', 'ico-pet.svg', 'Cat', 8, 2, 'Persa', 'Pereira'),
(3, 'Toby', 'ico-pet.svg', 'Dog', 18, 5, 'Puddle', 'Armenia'),
(4, 'Pocholo', '1708697222.png', 'Dog', 10, 2, 'Pug', 'Manizales'),
(5, 'Mireya', '1708697962.png', 'Cat', 6, 3, 'Munchkin', 'Pereira'),
(6, 'Loki', '1708702925.png', 'Dog', 12, 4, 'Pitbull', 'Cali'),
(7, 'Sadman', '1708703205.png', 'Cat', 3, 3, 'Persa', 'Cali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `document` bigint(12) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `photo` varchar(64) DEFAULT 'ico-user.svg',
  `phone` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `document`, `fullname`, `photo`, `phone`, `email`, `password`, `role`) VALUES
(1, 75000001, 'Jeremias Springfield', 'jeremias.png', '312000001', 'jeremias@gmail.com', '$2y$10$e9643Jde.Ky1m7D1kArpl.P75Fq24tG3cOrd.aQPP4un7TZlkWjJa', 'Admin'),
(5, 75000002, 'John Wick', '1709301260.png', '320000002', 'johnw@gmail.com', '$2y$10$gEBmgefNEy/eNeLpXRYcSeZoyjTxJyUdXhq/D4L/kiFhBJVLD/ady', 'Customer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `document` (`document`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
