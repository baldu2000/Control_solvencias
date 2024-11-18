-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generaciÃ³n: 18-11-2024 a las 22:21:49
-- VersiÃ³n del servidor: 8.0.30
-- VersiÃ³n de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solvencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `grado` varchar(50) NOT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  `enero` varchar(10) DEFAULT NULL,
  `febrero` varchar(10) DEFAULT NULL,
  `marzo` varchar(10) DEFAULT NULL,
  `abril` varchar(10) DEFAULT NULL,
  `mayo` varchar(10) DEFAULT NULL,
  `junio` varchar(10) DEFAULT NULL,
  `julio` varchar(10) DEFAULT NULL,
  `agosto` varchar(10) DEFAULT NULL,
  `septiembre` varchar(10) DEFAULT NULL,
  `octubre` varchar(10) DEFAULT NULL,
  `noviembre` varchar(10) DEFAULT NULL,
  `diciembre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int NOT NULL,
  `grado` varchar(100) NOT NULL,
  `direccion_residencia` varchar(255) DEFAULT NULL,
  `nombre_padre` varchar(255) DEFAULT NULL,
  `nombre_madre` varchar(255) DEFAULT NULL,
  `telefono_emergencia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `nombre_completo`, `fecha_nacimiento`, `edad`, `grado`, `direccion_residencia`, `nombre_padre`, `nombre_madre`, `telefono_emergencia`) VALUES
(1, 'Balduino', '2000-06-12', 23, 'Primer Grado', 'San Salvador', 'Raul', 'Maura', 'Juan 7571-2189');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int NOT NULL,
  `nombre_estudiante` varchar(100) NOT NULL,
  `grado` varchar(50) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `nota_febrero` decimal(5,2) DEFAULT NULL,
  `nota_marzo` decimal(5,2) DEFAULT NULL,
  `nota_abril` decimal(5,2) DEFAULT NULL,
  `nota_mayo` decimal(5,2) DEFAULT NULL,
  `nota_junio` decimal(5,2) DEFAULT NULL,
  `nota_julio` decimal(5,2) DEFAULT NULL,
  `nota_agosto` decimal(5,2) DEFAULT NULL,
  `nota_septiembre` decimal(5,2) DEFAULT NULL,
  `nota_octubre` decimal(5,2) DEFAULT NULL,
  `nota_noviembre` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contraseÃ±a` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` enum('docente','administrador','director') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'docente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `contraseÃ±a`, `nombre`, `token`, `fecha`, `rol`) VALUES
(1, 'baldu', 'GO01137220@uls.edu.sv', '12345', 'Balduino GÃ³mez', NULL, '2024-10-10 23:15:07', 'administrador'),
(2, 'admin', 'balduino856@gmail.com', '12345', 'Administrador AnÃ³nimo', 'ccd4cfc537b0ff45cc7278ebd7a3788a', '2024-10-22 21:36:20', 'docente');

--
-- Ãndices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
