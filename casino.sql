-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2026 a las 17:26:48
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
-- Base de datos: `casino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caballos`
--

CREATE TABLE `caballos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `victorias` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de caballos por los que puedes apostar en el casino';

--
-- Volcado de datos para la tabla `caballos`
--

INSERT INTO `caballos` (`id`, `nombre`, `ruta_imagen`, `color`, `victorias`) VALUES
(1, 'Zeus', './img/zeus.webp', 'red', 4),
(2, 'Centella', './img/centella.webp', 'blue', 2),
(3, 'Rapidash', './img/rapidash.webp', 'yellow', 1),
(4, 'Pegasus', './img/pegasus.webp', 'green', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de los mensajes de los usuarios que nos han contactado';

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `email`, `telefono`, `mensaje`) VALUES
(1, 'Aarón', 'aaronrandorueda@gmail.com', '987654321', 'riedurhtetfhpjthcfrewtmyrewutvurthrtghruhgrghrogjrpjrpgjrpoepireuvtpore');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frases`
--

CREATE TABLE `frases` (
  `id` int(11) NOT NULL,
  `frase` varchar(255) NOT NULL,
  `autor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `frases`
--

INSERT INTO `frases` (`id`, `frase`, `autor`) VALUES
(1, 'Todo parece imposible, hasta que se hace', 'Nelson Mandela'),
(2, 'El que tiene un buen porqué, puede con cualquier cómo.', 'Friedrich Nietzsche'),
(6, 'La gente vive la vida de la mejor forma que sabe', 'Mario Pacheco'),
(7, 'No puedes odiar y entender a una persona al mismo tiempo', 'Miguel Ortiz'),
(8, 'Nadie nunca jamás se arrepiente de ser valiente', 'DollarDorado'),
(9, 'Dime con quién andas y te diré quién eres', 'Miguel De Cervantes'),
(10, 'Dime de lo que presumes y te diré de lo que careces.', 'elXocas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frases_usuario`
--

CREATE TABLE `frases_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_frase` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `frases_usuario`
--

INSERT INTO `frases_usuario` (`id`, `id_usuario`, `id_frase`, `fecha`) VALUES
(1, 1, 1, '2026-01-30'),
(2, 4, 6, '2026-02-18'),
(5, 4, 1, '2026-02-26'),
(7, 4, 2, '2026-02-26'),
(10, 4, 9, '2026-02-27'),
(11, 4, 7, '2026-02-27'),
(12, 4, 10, '2026-02-27'),
(13, 4, 8, '2026-02-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadas`
--

CREATE TABLE `jugadas` (
  `id_jugada` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `dinero_apostado` int(11) DEFAULT NULL,
  `victoria` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_caballo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadas`
--

INSERT INTO `jugadas` (`id_jugada`, `fecha`, `dinero_apostado`, `victoria`, `id_usuario`, `id_caballo`) VALUES
(1, '2026-01-27 14:45:54', 30, 0, 1, 1),
(6, '2026-03-01 17:15:39', 10, 0, 4, 1),
(7, '2026-03-01 17:16:56', 20, 0, 4, 1),
(8, '2026-03-01 17:18:11', 20, 1, 4, 1),
(9, '2026-03-01 17:19:34', 15, 0, 4, 1),
(10, '2026-03-01 17:20:22', 80, 0, 4, 1),
(11, '2026-03-01 17:22:48', 30, 0, 4, 1),
(12, '2026-03-01 17:23:54', 40, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `dinero` int(10) NOT NULL DEFAULT 0,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `contrasenia`, `dinero`, `ruta_imagen`, `isAdmin`) VALUES
(1, 'chillguy', 'chillguy@yahoo.es', 'ufdjghfdoifdfdtykufdthykufdhofdi', 0, './img/494a924c1468d6b8e11c9c801dfdd20b.jpg', 0),
(3, 'AdminPrincipal', 'adminprincipal@gmail.com', '$2y$10$W0laNBaiT7olLVJhWEkdE.ojPmo.sUKIRqzQVOApjT/YIZFNeyNPK', 0, './img/', 1),
(4, 'pacofiestas', 'pacofiestas@gmail.com', '$2y$10$TAX7AQI3Njv58AAt.sRA..kocZpLMRQqHZN8uB0mPXVMWuxHqfk5K', 355, './img/Absolute-Cinema-meme-8d317n.jpg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caballos`
--
ALTER TABLE `caballos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `ruta_imagen` (`ruta_imagen`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `frases`
--
ALTER TABLE `frases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `frase` (`frase`);

--
-- Indices de la tabla `frases_usuario`
--
ALTER TABLE `frases_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_frase` (`id_frase`);

--
-- Indices de la tabla `jugadas`
--
ALTER TABLE `jugadas`
  ADD PRIMARY KEY (`id_jugada`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_caballo` (`id_caballo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caballos`
--
ALTER TABLE `caballos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `frases`
--
ALTER TABLE `frases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `frases_usuario`
--
ALTER TABLE `frases_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `jugadas`
--
ALTER TABLE `jugadas`
  MODIFY `id_jugada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `frases_usuario`
--
ALTER TABLE `frases_usuario`
  ADD CONSTRAINT `frases_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `frases_usuario_ibfk_2` FOREIGN KEY (`id_frase`) REFERENCES `frases` (`id`);

--
-- Filtros para la tabla `jugadas`
--
ALTER TABLE `jugadas`
  ADD CONSTRAINT `jugadas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `jugadas_ibfk_2` FOREIGN KEY (`id_caballo`) REFERENCES `caballos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
