-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2021 a las 20:02:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ambienteestudio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnocurso`
--

CREATE TABLE `alumnocurso` (
  `id_ac` int(11) NOT NULL,
  `id_alum` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `Año` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnocurso`
--

INSERT INTO `alumnocurso` (`id_ac`, `id_alum`, `id_curso`, `Año`) VALUES
(5, 8, 115, '2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asig` int(11) NOT NULL,
  `desc_asig` varchar(128) DEFAULT NULL,
  `Est_asig` varchar(11) DEFAULT NULL,
  `usu_cre` int(11) DEFAULT NULL,
  `fec_cre` varchar(30) DEFAULT NULL,
  `Id_esta` int(11) NOT NULL,
  `id_dcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asig`, `desc_asig`, `Est_asig`, `usu_cre`, `fec_cre`, `Id_esta`, `id_dcurso`) VALUES
(18, 'Dibujo', 'A', 2, '23-12-2021', 1, 1),
(19, 'Manualidades', 'A', 2, '23-12-2021', 1, 1),
(20, 'Dibujo', 'A', 2, '23-12-2021', 1, 2),
(24, 'Lenguaje', 'A', 2, '23-12-2021', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturascursos`
--

CREATE TABLE `asignaturascursos` (
  `id_ac` int(11) NOT NULL,
  `id_asignatura` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_esta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `desc_curso` varchar(75) DEFAULT NULL,
  `usu_cre` int(11) DEFAULT NULL,
  `fec_cre` varchar(50) DEFAULT NULL,
  `Est_curso` varchar(11) DEFAULT NULL,
  `Id_esta` int(11) NOT NULL,
  `let_curso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `desc_curso`, `usu_cre`, `fec_cre`, `Est_curso`, `Id_esta`, `let_curso`) VALUES
(36, '2', 6, '2021-03-02 22:43:29', 'A', 3, 'A'),
(37, '2', 6, '2021-03-02 22:43:29', 'A', 3, 'B'),
(38, '2', 6, '2021-03-02 22:43:29', 'A', 3, 'C'),
(43, '3', 6, '2021-03-02 22:52:44', 'A', 3, 'A'),
(44, '3', 6, '2021-03-02 22:52:44', 'A', 3, 'B'),
(45, '3', 6, '2021-03-02 22:52:44', 'A', 3, 'C'),
(121, '1', 2, '2021-12-23 12:24:43', 'A', 1, 'Unico'),
(122, '2', 2, '2021-12-23 12:24:47', 'A', 1, 'Unico'),
(123, '3', 2, '2021-12-23 12:24:58', 'A', 1, 'A'),
(124, '3', 2, '2021-12-23 12:24:58', 'A', 1, 'B'),
(125, '3', 2, '2021-12-23 12:24:58', 'A', 1, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursosdescripcion`
--

CREATE TABLE `cursosdescripcion` (
  `id_cd` int(11) NOT NULL,
  `des_cd` varchar(50) DEFAULT NULL,
  `val_cd` int(11) DEFAULT NULL,
  `tip_cd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursosdescripcion`
--

INSERT INTO `cursosdescripcion` (`id_cd`, `des_cd`, `val_cd`, `tip_cd`) VALUES
(1, 'Pre-Kinder', 1, 3),
(2, 'Kinder', 1, 3),
(3, '1° Basico', 2, 0),
(4, '2° Basico', 2, 0),
(5, '3° Basico', 2, 0),
(6, '4° Basico', 2, 0),
(7, '5° Basico', 2, 0),
(8, '6° Basico', 2, 0),
(9, '7° Basico', 2, 0),
(10, '8° Basico', 2, 0),
(11, '1° Medio', 3, 1),
(12, '2° Medio', 3, 1),
(13, '3° Medio', 3, 1),
(14, '4° Medio', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentea`
--

CREATE TABLE `docentea` (
  `id_docA` int(11) NOT NULL,
  `id_doce` int(11) DEFAULT NULL,
  `id_asig` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentea`
--

INSERT INTO `docentea` (`id_docA`, `id_doce`, `id_asig`) VALUES
(2, 13, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentecurso`
--

CREATE TABLE `docentecurso` (
  `id_docc` int(11) NOT NULL,
  `id_doc` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentecurso`
--

INSERT INTO `docentecurso` (`id_docc`, `id_doc`, `id_curso`) VALUES
(28, 24, 121);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_doce` int(11) NOT NULL,
  `rut_doce` varchar(12) DEFAULT NULL,
  `nom_doce` varchar(25) DEFAULT NULL,
  `ape_doce` varchar(25) DEFAULT NULL,
  `ape2_doce` varchar(25) DEFAULT NULL,
  `fon_doce` int(11) DEFAULT NULL,
  `email_doce` varchar(128) DEFAULT NULL,
  `est_doce` varchar(1) DEFAULT NULL,
  `Id_esta` int(11) DEFAULT NULL,
  `feccre_doce` varchar(35) DEFAULT NULL,
  `usucre_doce` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_doce`, `rut_doce`, `nom_doce`, `ape_doce`, `ape2_doce`, `fon_doce`, `email_doce`, `est_doce`, `Id_esta`, `feccre_doce`, `usucre_doce`) VALUES
(24, '19.850.956-6', 'FELIPE', 'Perez', 'Alvares', 99854566, 'jose.vergara@gmail.com', 'A', 1, '23-12-2021', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `id_esta` int(11) NOT NULL,
  `rut_esta` varchar(12) DEFAULT NULL,
  `descr_esta` varchar(50) DEFAULT NULL,
  `fon_esta` int(15) DEFAULT NULL,
  `email_esta` varchar(128) DEFAULT NULL,
  `Est_esta` varchar(1) DEFAULT NULL,
  `Bas_esta` int(11) DEFAULT NULL,
  `Med_esta` int(11) DEFAULT NULL,
  `feccre_esta` varchar(20) DEFAULT NULL,
  `usucrec_esta` int(11) DEFAULT NULL,
  `Kin_esta` int(11) DEFAULT NULL,
  `dire_esta` varchar(125) DEFAULT NULL,
  `usu_esta` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id_esta`, `rut_esta`, `descr_esta`, `fon_esta`, `email_esta`, `Est_esta`, `Bas_esta`, `Med_esta`, `feccre_esta`, `usucrec_esta`, `Kin_esta`, `dire_esta`, `usu_esta`) VALUES
(1, '45-esmc', 'ESCUELA DAVID DEL CURTO', 932507495, 'jose.vergara@gmail.com', 'A', 1, 0, '30-09-2020', 1, 1, 'Long sur Km 75', '192653649'),
(3, '48-cccm', 'ESCUELA REQUINOA', 978569522, 'jose.vergara@gmail.com', 'A', 1, 1, '20-02-2021', 1, 1, 'Long sur Km 75', '111111111'),
(4, '22wew', 'ESCUELA EL ABRA', 985455622, 'jose.vergara@gmail.com', 'A', 1, 0, '28-02-2021', 1, 1, 'Long sur Km 75', '222222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_est` int(11) NOT NULL,
  `rut_est` varchar(12) DEFAULT NULL,
  `nom_est` varchar(25) DEFAULT NULL,
  `ape_est` varchar(25) DEFAULT NULL,
  `ape2_est` varchar(25) DEFAULT NULL,
  `fon_est` int(11) DEFAULT NULL,
  `email_est` varchar(128) DEFAULT NULL,
  `est_est` varchar(1) DEFAULT NULL,
  `Id_esta` int(11) DEFAULT NULL,
  `feccre_est` varchar(35) DEFAULT NULL,
  `usucre_est` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_est`, `rut_est`, `nom_est`, `ape_est`, `ape2_est`, `fon_est`, `email_est`, `est_est`, `Id_esta`, `feccre_est`, `usucre_est`) VALUES
(8, '11.111.11', 'Felipe', 'Perez', 'Alvarez', 99854566, 'jose.vergara@gmail.com', 'A', 1, '23-12-2021', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_sistema`
--

CREATE TABLE `log_sistema` (
  `IdLogSistema` int(11) NOT NULL,
  `IdAfectado` varchar(20) DEFAULT NULL,
  `IdUsuario` varchar(20) DEFAULT NULL,
  `FechaMovimiento` datetime DEFAULT NULL,
  `NombreEquipo` varchar(100) DEFAULT NULL,
  `IpEquipo` varchar(100) DEFAULT NULL,
  `NombreTabla` varchar(100) DEFAULT NULL,
  `TipoMovimiento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log_sistema`
--

INSERT INTO `log_sistema` (`IdLogSistema`, `IdAfectado`, `IdUsuario`, `FechaMovimiento`, `NombreEquipo`, `IpEquipo`, `NombreTabla`, `TipoMovimiento`) VALUES
(1, '', '1', '2020-09-30 23:10:44', '::1', '::1', 'establecimiento', 'INSERT'),
(2, '1', '1', '2021-02-13 22:34:02', '::1', '::1', 'establecimiento', 'UPDATE'),
(3, '1', '1', '2021-02-13 22:34:25', '::1', '::1', 'establecimiento', 'UPDATE'),
(4, '1', '1', '2021-02-13 22:34:44', '::1', '::1', 'establecimiento', 'UPDATE'),
(5, '2', '1', '2021-02-20 13:04:45', '::1', '::1', 'establecimiento', 'INSERT'),
(6, '3', '1', '2021-02-20 13:06:59', '::1', '::1', 'establecimiento', 'INSERT'),
(7, '3', '1', '2021-02-20 13:17:29', '::1', '::1', 'establecimiento', 'UPDATE'),
(8, '3', '1', '2021-02-20 13:19:36', '::1', '::1', 'establecimiento', 'UPDATE'),
(9, '3', '1', '2021-02-20 13:20:08', '::1', '::1', 'establecimiento', 'UPDATE'),
(10, '3', '1', '2021-02-20 13:20:53', '::1', '::1', 'establecimiento', 'UPDATE'),
(11, '3', '1', '2021-02-20 13:22:16', '::1', '::1', 'establecimiento', 'UPDATE'),
(12, '3', '1', '2021-02-20 13:23:26', '::1', '::1', 'establecimiento', 'UPDATE'),
(13, '3', '1', '2021-02-20 13:24:01', '::1', '::1', 'establecimiento', 'UPDATE'),
(14, '3', '1', '2021-02-20 13:25:21', '::1', '::1', 'establecimiento', 'UPDATE'),
(15, '3', '2', '2021-02-21 19:57:18', '::1', '::1', 'cursos', 'INSERT'),
(16, '6', '2', '2021-02-21 20:03:04', '::1', '::1', 'cursos', 'INSERT'),
(17, '9', '2', '2021-02-21 20:03:51', '::1', '::1', 'cursos', 'INSERT'),
(18, '12', '2', '2021-02-21 20:07:01', '::1', '::1', 'cursos', 'INSERT'),
(19, '15', '2', '2021-02-21 20:07:15', '::1', '::1', 'cursos', 'INSERT'),
(20, '14', '2', '2021-02-21 23:10:56', '::1', '::1', 'cursos', 'DELETE Todos'),
(21, '14', '2', '2021-02-21 23:12:17', '::1', '::1', 'cursos', 'DELETE Todos'),
(22, '14', '2', '2021-02-21 23:13:43', '::1', '::1', 'cursos', 'DELETE Todos'),
(23, '5', '2', '2021-02-24 12:25:12', '::1', '::1', 'cursos', 'UPDATE'),
(24, '5', '2', '2021-02-24 12:25:48', '::1', '::1', 'cursos', 'UPDATE'),
(25, '5', '2', '2021-02-24 12:26:35', '::1', '::1', 'cursos', 'UPDATE'),
(26, '5', '2', '2021-02-24 12:27:27', '::1', '::1', 'cursos', 'UPDATE'),
(27, '5', '2', '2021-02-24 12:28:48', '::1', '::1', 'cursos', 'UPDATE'),
(28, '5', '2', '2021-02-24 12:31:05', '::1', '::1', 'cursos', 'UPDATE'),
(29, '5', '2', '2021-02-24 12:32:06', '::1', '::1', 'cursos', 'UPDATE'),
(30, '5', '2', '2021-02-24 12:35:04', '::1', '::1', 'cursos', 'UPDATE'),
(31, '4', '2', '2021-02-24 12:52:15', '::1', '::1', 'cursos', 'UPDATE'),
(32, '11', '2', '2021-02-24 12:53:27', '::1', '::1', 'cursos', 'DELETE'),
(33, '4', '2', '2021-02-24 12:53:43', '::1', '::1', 'cursos', 'UPDATE'),
(34, '4', '2', '2021-02-24 12:55:15', '::1', '::1', 'cursos', 'UPDATE'),
(35, '4', '2', '2021-02-24 12:55:30', '::1', '::1', 'cursos', 'UPDATE'),
(36, '4', '2', '2021-02-24 12:56:22', '::1', '::1', 'cursos', 'UPDATE'),
(37, '4', '2', '2021-02-24 12:58:03', '::1', '::1', 'cursos', 'UPDATE'),
(38, '4', '2', '2021-02-24 13:02:37', '::1', '::1', 'cursos', 'UPDATE'),
(39, '4', '2', '2021-02-24 13:02:52', '::1', '::1', 'cursos', 'UPDATE'),
(40, '4', '2', '2021-02-24 13:03:03', '::1', '::1', 'cursos', 'UPDATE'),
(41, '30', '2', '2021-02-24 13:03:53', '::1', '::1', 'cursos', 'INSERT'),
(42, '5', '2', '2021-02-24 13:06:12', '::1', '::1', 'cursos', 'UPDATE'),
(43, '5', '2', '2021-02-24 13:06:27', '::1', '::1', 'cursos', 'UPDATE'),
(44, '5', '2', '2021-02-24 13:06:52', '::1', '::1', 'cursos', 'UPDATE'),
(45, '5', '2', '2021-02-24 13:07:01', '::1', '::1', 'cursos', 'UPDATE'),
(46, '5', '2', '2021-02-24 13:07:12', '::1', '::1', 'cursos', 'UPDATE'),
(47, '4', '1', '2021-02-28 21:47:21', '::1', '::1', 'establecimiento', 'INSERT'),
(48, '3', '1', '2021-03-02 22:38:54', '::1', '::1', 'establecimiento', 'UPDATE'),
(49, '35', '6', '2021-03-02 22:40:21', '::1', '::1', 'cursos', 'INSERT'),
(50, '38', '6', '2021-03-02 22:43:29', '::1', '::1', 'cursos', 'INSERT'),
(51, '39', '6', '2021-03-02 22:43:40', '::1', '::1', 'cursos', 'INSERT'),
(52, '3', '6', '2021-03-02 22:46:59', '::1', '::1', 'cursos', 'UPDATE'),
(53, '3', '6', '2021-03-02 22:47:26', '::1', '::1', 'cursos', 'UPDATE'),
(54, '41', '6', '2021-03-02 22:52:04', '::1', '::1', 'cursos', 'DELETE'),
(55, '3', '6', '2021-03-02 22:52:44', '::1', '::1', 'cursos', 'UPDATE'),
(56, '48', '6', '2021-03-02 22:53:09', '::1', '::1', 'cursos', 'INSERT'),
(57, '45', '6', '2021-03-02 22:53:50', '::1', '::1', 'cursos', 'DELETE Todos'),
(58, '51', '6', '2021-03-02 22:54:20', '::1', '::1', 'cursos', 'INSERT'),
(59, '45', '6', '2021-03-02 22:54:35', '::1', '::1', 'cursos', 'DELETE Todos'),
(60, '54', '2', '2021-03-02 22:57:20', '::1', '::1', 'cursos', 'INSERT'),
(61, '1', '2', '2021-03-02 22:59:25', '::1', '::1', 'cursos', 'UPDATE'),
(62, '1', '2', '2021-03-02 22:59:50', '::1', '::1', 'cursos', 'UPDATE'),
(63, '57', '2', '2021-03-02 22:59:56', '::1', '::1', 'cursos', 'DELETE'),
(64, '61', '2', '2021-03-03 22:30:15', '::1', '::1', 'cursos', 'INSERT'),
(65, '7', '2', '2021-03-03 22:59:19', '::1', '::1', 'docentes', 'INSERT'),
(66, '7', '2', '2021-03-03 23:21:34', '::1', '::1', 'docentes', 'UPDATE'),
(67, '7', '2', '2021-03-03 23:21:55', '::1', '::1', 'docentes', 'UPDATE'),
(68, '7', '2', '2021-03-03 23:22:16', '::1', '::1', 'docentes', 'UPDATE'),
(69, '7', '2', '2021-03-03 23:23:09', '::1', '::1', 'docentes', 'UPDATE'),
(70, '7', '2', '2021-03-03 23:30:17', '::1', '::1', 'docentes', 'DELETE'),
(71, '8', '2', '2021-03-06 12:49:31', '::1', '::1', 'docentes', 'INSERT'),
(72, '9', '2', '2021-03-06 12:52:09', '::1', '::1', 'docentes', 'INSERT'),
(73, '9', '2', '2021-03-06 12:55:36', '::1', '::1', 'docentes', 'DELETE'),
(74, '8', '2', '2021-03-06 12:56:21', '::1', '::1', 'docentes', 'DELETE'),
(75, '10', '2', '2021-03-06 12:56:44', '::1', '::1', 'docentes', 'INSERT'),
(76, '10', '2', '2021-03-06 12:56:48', '::1', '::1', 'docentes', 'DELETE'),
(77, '11', '2', '2021-03-06 12:56:56', '::1', '::1', 'docentes', 'INSERT'),
(78, '11', '2', '2021-03-06 12:57:02', '::1', '::1', 'docentes', 'DELETE'),
(79, '1', '2', '2021-03-06 13:41:18', '::1', '::1', 'cursos', 'UPDATE'),
(80, '1', '2', '2021-03-06 14:16:23', '::1', '::1', 'asignaturas', 'INSERT'),
(81, '2', '2', '2021-03-06 14:18:42', '::1', '::1', 'asignaturas', 'INSERT'),
(82, '3', '2', '2021-03-06 14:22:50', '::1', '::1', 'asignaturas', 'INSERT'),
(83, '4', '2', '2021-03-06 14:25:37', '::1', '::1', 'asignaturas', 'INSERT'),
(84, '5', '2', '2021-03-06 14:33:01', '::1', '::1', 'asignaturas', 'INSERT'),
(85, '6', '2', '2021-03-06 14:41:56', '::1', '::1', 'asignaturas', 'INSERT'),
(86, '7', '2', '2021-03-06 14:48:11', '::1', '::1', 'asignaturas', 'INSERT'),
(87, '8', '2', '2021-03-06 14:48:14', '::1', '::1', 'asignaturas', 'INSERT'),
(88, '9', '2', '2021-03-06 15:01:15', '::1', '::1', 'asignaturas', 'INSERT'),
(89, '10', '2', '2021-03-06 15:02:12', '::1', '::1', 'asignaturas', 'INSERT'),
(90, '10', '2', '2021-03-06 15:04:03', '::1', '::1', 'asignaturas', 'INSERT'),
(91, '11', '2', '2021-03-07 22:25:42', '::1', '::1', 'asignaturas', 'INSERT'),
(92, '12', '2', '2021-03-07 22:25:51', '::1', '::1', 'asignaturas', 'INSERT'),
(93, '11', '2', '2021-03-07 22:45:01', '::1', '::1', 'asignaturas', 'UPDATE'),
(94, '11', '2', '2021-03-07 22:51:11', '::1', '::1', 'asignaturas', 'UPDATE'),
(95, '11', '2', '2021-03-07 22:51:14', '::1', '::1', 'asignaturas', 'DELETE'),
(96, '13', '2', '2021-03-07 22:52:13', '::1', '::1', 'asignaturas', 'INSERT'),
(97, '14', '2', '2021-03-07 22:52:32', '::1', '::1', 'asignaturas', 'INSERT'),
(98, '15', '2', '2021-03-07 22:52:46', '::1', '::1', 'asignaturas', 'INSERT'),
(99, '16', '2', '2021-03-09 21:45:28', '::1', '::1', 'asignaturas', 'INSERT'),
(100, '1', '2', '2021-03-09 22:13:11', '::1', '::1', 'unidades', 'INSERT'),
(101, '2', '2', '2021-03-09 22:14:43', '::1', '::1', 'unidades', 'INSERT'),
(102, '3', '2', '2021-03-09 22:47:48', '::1', '::1', 'unidades', 'INSERT'),
(103, '1', '2', '2021-03-10 22:43:03', '::1', '::1', 'unidades', 'UPDATE'),
(104, '1', '2', '2021-03-10 22:46:10', '::1', '::1', 'unidades', 'DELETE'),
(105, '3', '2', '2021-03-10 22:46:36', '::1', '::1', 'unidades', 'UPDATE'),
(106, '3', '2', '2021-03-10 22:46:38', '::1', '::1', 'unidades', 'DELETE'),
(107, '12', '2', '2021-03-10 22:53:40', '::1', '::1', 'asignaturas', 'UPDATE'),
(108, '14', '2', '2021-03-10 22:53:49', '::1', '::1', 'asignaturas', 'UPDATE'),
(109, '12', '2', '2021-03-10 22:58:38', '::1', '::1', 'docentes', 'INSERT'),
(110, '13', '2', '2021-03-10 22:59:03', '::1', '::1', 'docentes', 'INSERT'),
(111, '17', '2', '2021-03-13 14:06:14', '::1', '::1', 'asignaturas', 'INSERT'),
(112, '1', '2', '2021-03-13 14:19:56', '::1', '::1', 'docentea', 'INSERT'),
(113, '2', '2', '2021-03-13 14:37:02', '::1', '::1', 'docentea', 'INSERT'),
(114, '1', '2', '2021-03-13 14:52:02', '::1', '::1', 'docentea', 'DELETE'),
(115, '1', '2', '2021-03-17 22:36:42', '::1', '::1', 'docentecurso', 'INSERT'),
(116, '2', '2', '2021-03-17 22:37:10', '::1', '::1', 'docentecurso', 'INSERT'),
(117, '3', '2', '2021-03-17 22:39:03', '::1', '::1', 'docentecurso', 'INSERT'),
(118, '4', '2', '2021-03-22 21:30:27', '::1', '::1', 'docentecurso', 'INSERT'),
(119, '', '2', '2021-03-22 21:47:43', '::1', '::1', 'docentecurso', 'DELETE'),
(120, '1', '2', '2021-03-23 22:23:51', '::1', '::1', 'estudiantes', 'INSERT'),
(121, '2', '2', '2021-03-23 22:25:04', '::1', '::1', 'estudiantes', 'INSERT'),
(122, '3', '2', '2021-03-23 22:28:50', '::1', '::1', 'estudiantes', 'INSERT'),
(123, '4', '2', '2021-03-23 22:31:56', '::1', '::1', 'estudiantes', 'INSERT'),
(124, '5', '2', '2021-03-27 12:41:46', '::1', '::1', 'estudiantes', 'INSERT'),
(125, '6', '2', '2021-03-27 13:05:56', '::1', '::1', 'estudiantes', 'INSERT'),
(126, '4', '2', '2021-03-27 13:08:43', '::1', '::1', 'unidades', 'INSERT'),
(127, '5', '2', '2021-03-27 13:08:51', '::1', '::1', 'unidades', 'INSERT'),
(128, '6', '2', '2021-03-27 13:09:02', '::1', '::1', 'unidades', 'INSERT'),
(129, '7', '2', '2021-03-27 13:09:16', '::1', '::1', 'unidades', 'INSERT'),
(130, '13', '2', '2021-03-27 13:11:28', '::1', '::1', 'docentes', 'DELETE'),
(131, '3', '2', '2021-03-27 13:12:08', '::1', '::1', 'docentea', 'INSERT'),
(132, '5', '2', '2021-03-27 13:27:25', '::1', '::1', 'estudiantes', 'UPDATE'),
(133, '5', '2', '2021-03-27 13:38:10', '::1', '::1', 'estudiantes', 'DELETE'),
(134, '1', '2', '2021-03-28 17:56:28', '::1', '::1', 'noticiasestablecimiento', 'INSERT'),
(135, '2', '2', '2021-03-28 18:11:23', '::1', '::1', 'noticiasestablecimiento', 'INSERT'),
(136, '3', '2', '2021-03-28 18:14:30', '::1', '::1', 'noticiasestablecimiento', 'INSERT'),
(137, '4', '2', '2021-03-28 18:17:25', '::1', '::1', 'noticiasestablecimiento', 'INSERT'),
(138, '4', '2', '2021-03-28 18:41:28', '::1', '::1', 'noticiasestablecimiento', 'DELETE'),
(139, '5', '2', '2021-03-28 22:15:53', '::1', '::1', 'noticiasestablecimiento', 'INSERT'),
(140, '6', '2', '2021-03-28 22:16:59', '::1', '::1', 'noticiasestablecimiento', 'INSERT'),
(141, '6', '2', '2021-03-29 23:09:21', '::1', '::1', 'estudiantes', 'DELETE'),
(142, '5', '2', '2021-03-30 16:55:03', '::1', '::1', 'docentecurso', 'INSERT'),
(143, '', '2', '2021-03-30 16:55:11', '::1', '::1', 'docentecurso', 'DELETE'),
(144, '6', '2', '2021-03-30 16:55:16', '::1', '::1', 'docentecurso', 'INSERT'),
(145, '7', '2', '2021-03-30 17:42:27', '::1', '::1', 'estudiantes', 'INSERT'),
(146, '14', '2', '2021-05-25 12:15:28', '::1', '::1', 'docentes', 'INSERT'),
(147, '14', '2', '2021-05-25 12:15:56', '::1', '::1', 'docentes', 'UPDATE'),
(148, '1', '1', '2021-12-16 12:25:16', '::1', '::1', 'establecimiento', 'UPDATE'),
(149, '3', '2', '2021-12-16 12:36:17', '::1', '::1', 'docentea', 'DELETE'),
(150, '', '2', '2021-12-16 12:36:38', '::1', '::1', 'docentecurso', 'DELETE'),
(151, '12', '2', '2021-12-16 12:37:09', '::1', '::1', 'docentes', 'DELETE'),
(152, '14', '2', '2021-12-16 12:37:12', '::1', '::1', 'docentes', 'DELETE'),
(153, '7', '2', '2021-12-16 12:37:26', '::1', '::1', 'estudiantes', 'DELETE'),
(154, '2', '2', '2021-12-16 12:38:10', '::1', '::1', 'unidades', 'UPDATE'),
(155, '4', '2', '2021-12-16 12:38:27', '::1', '::1', 'unidades', 'UPDATE'),
(156, '5', '2', '2021-12-16 12:38:36', '::1', '::1', 'unidades', 'UPDATE'),
(157, '6', '2', '2021-12-16 12:38:45', '::1', '::1', 'unidades', 'UPDATE'),
(158, '7', '2', '2021-12-16 12:38:54', '::1', '::1', 'unidades', 'UPDATE'),
(159, '2', '2', '2021-12-16 12:38:59', '::1', '::1', 'unidades', 'DELETE'),
(160, '5', '2', '2021-12-16 12:39:02', '::1', '::1', 'unidades', 'DELETE'),
(161, '4', '2', '2021-12-16 12:39:06', '::1', '::1', 'unidades', 'DELETE'),
(162, '6', '2', '2021-12-16 12:39:08', '::1', '::1', 'unidades', 'DELETE'),
(163, '7', '2', '2021-12-16 12:39:11', '::1', '::1', 'unidades', 'DELETE'),
(164, '12', '2', '2021-12-16 12:39:37', '::1', '::1', 'asignaturas', 'UPDATE'),
(165, '13', '2', '2021-12-16 12:39:47', '::1', '::1', 'asignaturas', 'UPDATE'),
(166, '14', '2', '2021-12-16 12:39:54', '::1', '::1', 'asignaturas', 'UPDATE'),
(167, '15', '2', '2021-12-16 12:40:02', '::1', '::1', 'asignaturas', 'UPDATE'),
(168, '16', '2', '2021-12-16 12:40:08', '::1', '::1', 'asignaturas', 'UPDATE'),
(169, '17', '2', '2021-12-16 12:40:14', '::1', '::1', 'asignaturas', 'UPDATE'),
(170, '12', '2', '2021-12-16 12:40:16', '::1', '::1', 'asignaturas', 'DELETE'),
(171, '13', '2', '2021-12-16 12:40:23', '::1', '::1', 'asignaturas', 'DELETE'),
(172, '14', '2', '2021-12-16 12:40:26', '::1', '::1', 'asignaturas', 'DELETE'),
(173, '15', '2', '2021-12-16 12:40:29', '::1', '::1', 'asignaturas', 'DELETE'),
(174, '17', '2', '2021-12-16 12:40:31', '::1', '::1', 'asignaturas', 'DELETE'),
(175, '16', '2', '2021-12-16 12:40:35', '::1', '::1', 'asignaturas', 'DELETE'),
(176, '61', '2', '2021-12-16 12:41:49', '::1', '::1', 'cursos', 'DELETE Todos'),
(177, '61', '2', '2021-12-16 12:42:03', '::1', '::1', 'cursos', 'DELETE Todos'),
(178, '61', '2', '2021-12-16 12:42:08', '::1', '::1', 'cursos', 'DELETE'),
(179, '61', '2', '2021-12-16 12:42:16', '::1', '::1', 'cursos', 'DELETE Todos'),
(180, '57', '2', '2021-12-16 12:42:23', '::1', '::1', 'cursos', 'DELETE Todos'),
(181, '57', '2', '2021-12-16 12:42:28', '::1', '::1', 'cursos', 'DELETE Todos'),
(182, '45', '2', '2021-12-16 12:42:33', '::1', '::1', 'cursos', 'DELETE Todos'),
(183, '62', '2', '2021-12-16 13:08:34', '::1', '::1', 'cursos', 'INSERT'),
(184, '63', '2', '2021-12-16 13:12:58', '::1', '::1', 'cursos', 'INSERT'),
(185, '64', '2', '2021-12-18 11:49:17', '::1', '::1', 'cursos', 'INSERT'),
(186, '64', '2', '2021-12-18 11:50:42', '::1', '::1', 'cursos', 'DELETE'),
(187, '2', '2', '2021-12-23 11:49:43', '::1', '::1', 'cursos', 'UPDATE'),
(188, '1', '2', '2021-12-23 11:49:52', '::1', '::1', 'cursos', 'UPDATE'),
(189, '62', '2', '2021-12-23 11:49:57', '::1', '::1', 'cursos', 'DELETE'),
(190, '45', '2', '2021-12-23 11:50:04', '::1', '::1', 'cursos', 'DELETE'),
(191, '74', '2', '2021-12-23 11:50:39', '::1', '::1', 'cursos', 'INSERT'),
(192, '45', '2', '2021-12-23 11:52:14', '::1', '::1', 'cursos', 'DELETE Todos'),
(193, '84', '2', '2021-12-23 11:52:26', '::1', '::1', 'cursos', 'INSERT'),
(194, '45', '2', '2021-12-23 11:53:32', '::1', '::1', 'cursos', 'DELETE Todos'),
(195, '87', '2', '2021-12-23 11:55:16', '::1', '::1', 'cursos', 'INSERT'),
(196, '45', '2', '2021-12-23 12:02:38', '::1', '::1', 'cursos', 'DELETE Todos'),
(197, '90', '2', '2021-12-23 12:03:53', '::1', '::1', 'cursos', 'INSERT'),
(198, '45', '2', '2021-12-23 12:04:12', '::1', '::1', 'cursos', 'DELETE Todos'),
(199, '93', '2', '2021-12-23 12:04:49', '::1', '::1', 'cursos', 'INSERT'),
(200, '96', '2', '2021-12-23 12:05:00', '::1', '::1', 'cursos', 'INSERT'),
(201, '96', '2', '2021-12-23 12:05:51', '::1', '::1', 'cursos', 'DELETE Todos'),
(202, '99', '2', '2021-12-23 12:06:41', '::1', '::1', 'cursos', 'INSERT'),
(203, '99', '2', '2021-12-23 12:07:12', '::1', '::1', 'cursos', 'DELETE Todos'),
(204, '45', '2', '2021-12-23 12:07:46', '::1', '::1', 'cursos', 'DELETE Todos'),
(205, '102', '2', '2021-12-23 12:08:15', '::1', '::1', 'cursos', 'INSERT'),
(206, '45', '2', '2021-12-23 12:09:44', '::1', '::1', 'cursos', 'DELETE Todos'),
(207, '105', '2', '2021-12-23 12:09:50', '::1', '::1', 'cursos', 'INSERT'),
(208, '1', '2', '2021-12-23 12:12:01', '::1', '::1', 'cursos', 'UPDATE'),
(209, '1', '2', '2021-12-23 12:12:12', '::1', '::1', 'cursos', 'UPDATE'),
(210, '1', '2', '2021-12-23 12:12:18', '::1', '::1', 'cursos', 'UPDATE'),
(211, '1', '2', '2021-12-23 12:12:30', '::1', '::1', 'cursos', 'UPDATE'),
(212, '45', '2', '2021-12-23 12:12:44', '::1', '::1', 'cursos', 'DELETE'),
(213, '1', '2', '2021-12-23 12:12:52', '::1', '::1', 'cursos', 'UPDATE'),
(214, '45', '2', '2021-12-23 12:13:06', '::1', '::1', 'cursos', 'DELETE'),
(215, '114', '2', '2021-12-23 12:14:47', '::1', '::1', 'cursos', 'INSERT'),
(216, '1', '2', '2021-12-23 12:14:53', '::1', '::1', 'cursos', 'UPDATE'),
(217, '114', '2', '2021-12-23 12:15:00', '::1', '::1', 'cursos', 'DELETE'),
(218, '1', '2', '2021-12-23 12:15:14', '::1', '::1', 'cursos', 'UPDATE'),
(219, '112', '2', '2021-12-23 12:15:22', '::1', '::1', 'cursos', 'DELETE'),
(220, '1', '2', '2021-12-23 12:16:16', '::1', '::1', 'cursos', 'UPDATE'),
(221, '45', '2', '2021-12-23 12:16:22', '::1', '::1', 'cursos', 'DELETE'),
(222, '117', '2', '2021-12-23 12:16:33', '::1', '::1', 'cursos', 'INSERT'),
(223, '1', '2', '2021-12-23 12:16:48', '::1', '::1', 'cursos', 'UPDATE'),
(224, '116', '2', '2021-12-23 12:16:55', '::1', '::1', 'cursos', 'DELETE'),
(225, '115', '2', '2021-12-23 12:17:00', '::1', '::1', 'cursos', 'DELETE'),
(226, '8', '2', '2021-12-23 12:18:11', '::1', '::1', 'estudiantes', 'INSERT'),
(227, '1', '2', '2021-12-23 12:24:00', '::1', '::1', 'cursos', 'UPDATE'),
(228, '45', '2', '2021-12-23 12:24:05', '::1', '::1', 'cursos', 'DELETE'),
(229, '120', '2', '2021-12-23 12:24:14', '::1', '::1', 'cursos', 'INSERT'),
(230, '45', '2', '2021-12-23 12:24:39', '::1', '::1', 'cursos', 'DELETE Todos'),
(231, '121', '2', '2021-12-23 12:24:43', '::1', '::1', 'cursos', 'INSERT'),
(232, '122', '2', '2021-12-23 12:24:47', '::1', '::1', 'cursos', 'INSERT'),
(233, '125', '2', '2021-12-23 12:24:58', '::1', '::1', 'cursos', 'INSERT'),
(234, '15', '2', '2021-12-23 12:28:04', '::1', '::1', 'docentes', 'INSERT'),
(235, '7', '2', '2021-12-23 12:28:30', '::1', '::1', 'docentecurso', 'INSERT'),
(236, '', '2', '2021-12-23 12:28:47', '::1', '::1', 'docentecurso', 'DELETE'),
(237, '8', '2', '2021-12-23 12:30:12', '::1', '::1', 'docentecurso', 'INSERT'),
(238, '', '2', '2021-12-23 12:30:27', '::1', '::1', 'docentecurso', 'DELETE'),
(239, '9', '2', '2021-12-23 12:30:52', '::1', '::1', 'docentecurso', 'INSERT'),
(240, '', '2', '2021-12-23 12:31:00', '::1', '::1', 'docentecurso', 'DELETE'),
(241, '10', '2', '2021-12-23 12:31:20', '::1', '::1', 'docentecurso', 'INSERT'),
(242, '', '2', '2021-12-23 12:33:56', '::1', '::1', 'docentecurso', 'DELETE'),
(243, '11', '2', '2021-12-23 12:35:12', '::1', '::1', 'docentecurso', 'INSERT'),
(244, '', '2', '2021-12-23 12:36:26', '::1', '::1', 'docentecurso', 'DELETE'),
(245, '12', '2', '2021-12-23 12:38:19', '::1', '::1', 'docentecurso', 'INSERT'),
(246, '', '2', '2021-12-23 12:38:31', '::1', '::1', 'docentecurso', 'DELETE'),
(247, '13', '2', '2021-12-23 12:41:20', '::1', '::1', 'docentecurso', 'INSERT'),
(248, '', '2', '2021-12-23 12:50:43', '::1', '::1', 'docentecurso', 'DELETE'),
(249, '14', '2', '2021-12-23 12:51:17', '::1', '::1', 'docentecurso', 'INSERT'),
(250, '', '2', '2021-12-23 12:51:25', '::1', '::1', 'docentecurso', 'DELETE'),
(251, '15', '2', '2021-12-23 12:53:50', '::1', '::1', 'docentecurso', 'INSERT'),
(252, '', '2', '2021-12-23 12:54:16', '::1', '::1', 'docentecurso', 'DELETE'),
(253, '16', '2', '2021-12-23 12:56:25', '::1', '::1', 'docentecurso', 'INSERT'),
(254, '', '2', '2021-12-23 12:56:53', '::1', '::1', 'docentecurso', 'DELETE'),
(255, '17', '2', '2021-12-23 12:57:35', '::1', '::1', 'docentecurso', 'INSERT'),
(256, '', '2', '2021-12-23 13:00:23', '::1', '::1', 'docentecurso', 'DELETE'),
(257, '18', '2', '2021-12-23 13:00:36', '::1', '::1', 'docentecurso', 'INSERT'),
(258, '', '2', '2021-12-23 13:02:08', '::1', '::1', 'docentecurso', 'DELETE'),
(259, '19', '2', '2021-12-23 13:02:54', '::1', '::1', 'docentecurso', 'INSERT'),
(260, '', '2', '2021-12-23 13:03:17', '::1', '::1', 'docentecurso', 'DELETE'),
(261, '20', '2', '2021-12-23 13:03:27', '::1', '::1', 'docentecurso', 'INSERT'),
(262, '', '2', '2021-12-23 13:04:30', '::1', '::1', 'docentecurso', 'DELETE'),
(263, '21', '2', '2021-12-23 13:04:54', '::1', '::1', 'docentecurso', 'INSERT'),
(264, '', '2', '2021-12-23 13:05:18', '::1', '::1', 'docentecurso', 'DELETE'),
(265, '22', '2', '2021-12-23 13:05:26', '::1', '::1', 'docentecurso', 'INSERT'),
(266, '', '2', '2021-12-23 13:06:51', '::1', '::1', 'docentecurso', 'DELETE'),
(267, '23', '2', '2021-12-23 13:07:09', '::1', '::1', 'docentecurso', 'INSERT'),
(268, '15', '2', '2021-12-23 13:07:36', '::1', '::1', 'docentes', 'DELETE'),
(269, '16', '2', '2021-12-23 13:07:55', '::1', '::1', 'docentes', 'INSERT'),
(270, '24', '2', '2021-12-23 14:46:59', '::1', '::1', 'docentecurso', 'INSERT'),
(271, '', '2', '2021-12-23 14:47:04', '::1', '::1', 'docentecurso', 'DELETE'),
(272, '25', '2', '2021-12-23 14:47:34', '::1', '::1', 'docentecurso', 'INSERT'),
(273, '16', '2', '2021-12-23 14:47:49', '::1', '::1', 'docentes', 'DELETE'),
(274, '17', '2', '2021-12-23 14:49:17', '::1', '::1', 'docentes', 'INSERT'),
(275, '17', '2', '2021-12-23 14:52:14', '::1', '::1', 'docentes', 'DELETE'),
(276, '18', '2', '2021-12-23 14:53:06', '::1', '::1', 'docentes', 'INSERT'),
(277, '26', '2', '2021-12-23 14:53:38', '::1', '::1', 'docentecurso', 'INSERT'),
(278, '18', '2', '2021-12-23 14:53:45', '::1', '::1', 'docentes', 'DELETE'),
(279, '19', '2', '2021-12-23 14:54:11', '::1', '::1', 'docentes', 'INSERT'),
(280, '27', '2', '2021-12-23 14:54:16', '::1', '::1', 'docentecurso', 'INSERT'),
(281, '19', '2', '2021-12-23 14:54:24', '::1', '::1', 'docentes', 'DELETE'),
(282, '20', '2', '2021-12-23 14:57:50', '::1', '::1', 'docentes', 'INSERT'),
(283, '20', '2', '2021-12-23 14:58:34', '::1', '::1', 'docentes', 'DELETE'),
(284, '21', '2', '2021-12-23 14:58:51', '::1', '::1', 'docentes', 'INSERT'),
(285, '21', '2', '2021-12-23 14:59:34', '::1', '::1', 'docentes', 'DELETE'),
(286, '22', '2', '2021-12-23 14:59:52', '::1', '::1', 'docentes', 'INSERT'),
(287, '22', '2', '2021-12-23 15:01:08', '::1', '::1', 'docentes', 'DELETE'),
(288, '23', '2', '2021-12-23 15:01:24', '::1', '::1', 'docentes', 'INSERT'),
(289, '23', '2', '2021-12-23 15:01:40', '::1', '::1', 'docentes', 'DELETE'),
(290, '24', '2', '2021-12-23 15:01:56', '::1', '::1', 'docentes', 'INSERT'),
(291, '28', '2', '2021-12-23 15:02:38', '::1', '::1', 'docentecurso', 'INSERT'),
(292, '24', '2', '2021-12-23 15:04:04', '::1', '::1', 'docentes', 'UPDATE'),
(293, '18', '2', '2021-12-23 15:04:56', '::1', '::1', 'asignaturas', 'INSERT'),
(294, '19', '2', '2021-12-23 15:05:20', '::1', '::1', 'asignaturas', 'INSERT'),
(295, '20', '2', '2021-12-23 15:08:39', '::1', '::1', 'asignaturas', 'INSERT'),
(296, '21', '2', '2021-12-23 15:09:03', '::1', '::1', 'asignaturas', 'INSERT'),
(297, '21', '2', '2021-12-23 15:09:53', '::1', '::1', 'asignaturas', 'UPDATE'),
(298, '21', '2', '2021-12-23 15:09:56', '::1', '::1', 'asignaturas', 'DELETE'),
(299, '22', '2', '2021-12-23 15:10:13', '::1', '::1', 'asignaturas', 'INSERT'),
(300, '23', '2', '2021-12-23 15:10:33', '::1', '::1', 'asignaturas', 'INSERT'),
(301, '23', '2', '2021-12-23 15:11:07', '::1', '::1', 'asignaturas', 'UPDATE'),
(302, '23', '2', '2021-12-23 15:11:09', '::1', '::1', 'asignaturas', 'DELETE'),
(303, '24', '2', '2021-12-23 15:11:25', '::1', '::1', 'asignaturas', 'INSERT'),
(304, '22', '2', '2021-12-23 15:13:10', '::1', '::1', 'asignaturas', 'UPDATE'),
(305, '22', '2', '2021-12-23 15:13:15', '::1', '::1', 'asignaturas', 'DELETE'),
(306, '8', '2', '2021-12-23 15:15:17', '::1', '::1', 'unidades', 'INSERT'),
(307, '9', '2', '2021-12-23 15:24:56', '::1', '::1', 'unidades', 'INSERT'),
(308, '10', '2', '2021-12-23 15:27:07', '::1', '::1', 'unidades', 'INSERT'),
(309, '10', '2', '2021-12-23 15:28:17', '::1', '::1', 'unidades', 'UPDATE'),
(310, '10', '2', '2021-12-23 15:28:20', '::1', '::1', 'unidades', 'DELETE'),
(311, '11', '2', '2021-12-23 15:28:34', '::1', '::1', 'unidades', 'INSERT'),
(312, '11', '2', '2021-12-23 15:29:33', '::1', '::1', 'unidades', 'UPDATE'),
(313, '11', '2', '2021-12-23 15:29:36', '::1', '::1', 'unidades', 'DELETE'),
(314, '9', '2', '2021-12-23 15:31:00', '::1', '::1', 'unidades', 'UPDATE'),
(315, '9', '2', '2021-12-23 15:31:03', '::1', '::1', 'unidades', 'DELETE'),
(316, '4', '2', '2021-12-23 16:01:16', '::1', '::1', 'docentea', 'INSERT'),
(317, '5', '2', '2021-12-23 16:01:22', '::1', '::1', 'docentea', 'INSERT'),
(318, '4', '2', '2021-12-23 16:01:36', '::1', '::1', 'docentea', 'DELETE'),
(319, '5', '2', '2021-12-23 16:01:42', '::1', '::1', 'docentea', 'DELETE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticiasestablecimiento`
--

CREATE TABLE `noticiasestablecimiento` (
  `id_ne` int(11) NOT NULL,
  `tit_ne` varchar(50) DEFAULT NULL,
  `desc_ne` varchar(512) DEFAULT NULL,
  `img_not` varchar(128) DEFAULT NULL,
  `usu_cre` int(11) DEFAULT NULL,
  `fec_cre` varchar(30) DEFAULT NULL,
  `Id_esta` int(11) NOT NULL,
  `arch_not` varchar(176) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticiasestablecimiento`
--

INSERT INTO `noticiasestablecimiento` (`id_ne`, `tit_ne`, `desc_ne`, `img_not`, `usu_cre`, `fec_cre`, `Id_esta`, `arch_not`) VALUES
(0, 'Nueva Aplicacion Ambiente Estudio', 'Este nuevo sistema es un sistema dedicado a un ambiente de aprendizaje para los alumnos, debido a nuestra pandemia tenemos muchos problemas con interactuar con nuestros alumnos.', '415519.jpg', 2, '28-03-2021', 1, 'eb699230-4ab5-4267-a18d-63914e9c3a40.pdf'),
(1, 'Comienzo de año', 'Este año seguiremos con la misma dinamica de aprendizaje y con nuestros alumnos de sus casas.', 'correcto.png', 2, '28-03-2021', 1, 'E096874030T039F0138524309 (1).pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallas`
--

CREATE TABLE `pantallas` (
  `id_pant` int(11) NOT NULL,
  `desc_pant` varchar(50) DEFAULT NULL,
  `est_pant` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantallas`
--

INSERT INTO `pantallas` (`id_pant`, `desc_pant`, `est_pant`) VALUES
(1, 'Registros', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallasdetalle`
--

CREATE TABLE `pantallasdetalle` (
  `id_pd` int(11) NOT NULL,
  `id_pant` int(11) DEFAULT NULL,
  `desc_pd` varchar(25) DEFAULT NULL,
  `ruta_pd` varchar(25) DEFAULT NULL,
  `est_pd` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantallasdetalle`
--

INSERT INTO `pantallasdetalle` (`id_pd`, `id_pant`, `desc_pd`, `ruta_pd`, `est_pd`) VALUES
(1, 1, 'Establecimientos', 'MantenedorEstablecimiento', 'A'),
(2, 1, 'Cursos', 'MantenedorCursos', 'A'),
(3, 1, 'Docentes', 'MantenedorProfesor', 'A'),
(4, 1, 'Asignaturas', 'MantenedorAsignaturas', 'A'),
(5, 1, 'Unidades', 'MantenedorUnidades', 'A'),
(6, 1, 'Profesor y Asignaturas', 'MantenedorProfesorA', 'A'),
(7, 1, 'Alumnos', 'MantenedorAlumno', 'A'),
(8, 1, 'Subir Noticias', 'SubirNoticia', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallasdetalleusuarios`
--

CREATE TABLE `pantallasdetalleusuarios` (
  `id_pdu` int(11) NOT NULL,
  `id_pdet` int(11) DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantallasdetalleusuarios`
--

INSERT INTO `pantallasdetalleusuarios` (`id_pdu`, `id_pdet`, `id_usu`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 1),
(5, 3, 2),
(6, 4, 1),
(7, 4, 2),
(8, 5, 1),
(9, 5, 2),
(10, 6, 1),
(11, 6, 2),
(12, 7, 1),
(16, 7, 2),
(18, 7, 3),
(19, 8, 1),
(20, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallasusuarios`
--

CREATE TABLE `pantallasusuarios` (
  `id_pu` int(11) NOT NULL,
  `id_pant` int(11) DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantallasusuarios`
--

INSERT INTO `pantallasusuarios` (`id_pu`, `id_pant`, `id_usu`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subiralumno`
--

CREATE TABLE `subiralumno` (
  `id_sa` int(11) NOT NULL,
  `desc_sa` varchar(128) DEFAULT NULL,
  `file_sa` varchar(128) DEFAULT NULL,
  `id_uni` int(11) DEFAULT NULL,
  `usu_cre` int(11) DEFAULT NULL,
  `fec_cre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subirdocente`
--

CREATE TABLE `subirdocente` (
  `id_sd` int(11) NOT NULL,
  `desc_sd` varchar(128) DEFAULT NULL,
  `file_sd` varchar(128) DEFAULT NULL,
  `id_uni` int(11) DEFAULT NULL,
  `tar_sd` varchar(2) DEFAULT NULL,
  `usu_cre` int(11) DEFAULT NULL,
  `fec_cre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipu` int(11) NOT NULL,
  `desc_tipu` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipu`, `desc_tipu`) VALUES
(1, 'Admin'),
(2, 'Establecimientos'),
(3, 'Docentes'),
(4, 'Alumnos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id_uni` int(11) NOT NULL,
  `desc_uni` varchar(128) DEFAULT NULL,
  `id_asig` int(11) DEFAULT NULL,
  `usu_cre` int(11) DEFAULT NULL,
  `fec_cre` varchar(30) DEFAULT NULL,
  `Id_esta` int(11) NOT NULL,
  `num_uni` int(11) NOT NULL,
  `Est_uni` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id_uni`, `desc_uni`, `id_asig`, `usu_cre`, `fec_cre`, `Id_esta`, `num_uni`, `Est_uni`) VALUES
(8, 'Figuras', 18, 2, '23-12-2021', 1, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `log_usu` varchar(12) DEFAULT NULL,
  `pass_usu` varchar(128) DEFAULT NULL,
  `id_tip` int(11) DEFAULT NULL,
  `est_usu` varchar(1) DEFAULT NULL,
  `feccre_usu` varchar(30) DEFAULT NULL,
  `usucre_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `log_usu`, `pass_usu`, `id_tip`, `est_usu`, `feccre_usu`, `usucre_usu`) VALUES
(1, '198509566', '123456', 1, 'A', '26/08/2020 22:16', 0),
(2, '192653649', '123456', 2, 'A', '2021-02-20 12:50:41', 1),
(6, '111111111', '123456', 2, 'A', '2021-02-20 13:24:01', 1),
(7, '222222222', '123456', 2, 'A', '2021-02-28 21:47:21', 1),
(23, '11.111.11', '123456', 4, 'A', '2021-12-23 12:18:11', 2),
(33, '19.850.956-6', '123456', 3, 'A', '2021-12-23 15:01:56', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnocurso`
--
ALTER TABLE `alumnocurso`
  ADD PRIMARY KEY (`id_ac`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asig`),
  ADD KEY `usu_cre` (`usu_cre`);

--
-- Indices de la tabla `asignaturascursos`
--
ALTER TABLE `asignaturascursos`
  ADD PRIMARY KEY (`id_ac`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `usu_cre` (`usu_cre`);

--
-- Indices de la tabla `cursosdescripcion`
--
ALTER TABLE `cursosdescripcion`
  ADD PRIMARY KEY (`id_cd`);

--
-- Indices de la tabla `docentea`
--
ALTER TABLE `docentea`
  ADD PRIMARY KEY (`id_docA`);

--
-- Indices de la tabla `docentecurso`
--
ALTER TABLE `docentecurso`
  ADD PRIMARY KEY (`id_docc`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_doce`),
  ADD KEY `Id_esta` (`Id_esta`),
  ADD KEY `usucre_doce` (`usucre_doce`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`id_esta`),
  ADD KEY `usucrec_esta` (`usucrec_esta`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_est`),
  ADD KEY `Id_esta` (`Id_esta`),
  ADD KEY `usucre_est` (`usucre_est`);

--
-- Indices de la tabla `log_sistema`
--
ALTER TABLE `log_sistema`
  ADD PRIMARY KEY (`IdLogSistema`);

--
-- Indices de la tabla `noticiasestablecimiento`
--
ALTER TABLE `noticiasestablecimiento`
  ADD PRIMARY KEY (`id_ne`),
  ADD KEY `usu_cre` (`usu_cre`);

--
-- Indices de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  ADD PRIMARY KEY (`id_pant`);

--
-- Indices de la tabla `pantallasdetalle`
--
ALTER TABLE `pantallasdetalle`
  ADD PRIMARY KEY (`id_pd`),
  ADD KEY `id_pant` (`id_pant`);

--
-- Indices de la tabla `pantallasdetalleusuarios`
--
ALTER TABLE `pantallasdetalleusuarios`
  ADD PRIMARY KEY (`id_pdu`),
  ADD KEY `id_pdet` (`id_pdet`),
  ADD KEY `id_usu` (`id_usu`) USING BTREE;

--
-- Indices de la tabla `pantallasusuarios`
--
ALTER TABLE `pantallasusuarios`
  ADD PRIMARY KEY (`id_pu`),
  ADD KEY `id_pant` (`id_pant`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `subiralumno`
--
ALTER TABLE `subiralumno`
  ADD PRIMARY KEY (`id_sa`),
  ADD KEY `id_uni` (`id_uni`),
  ADD KEY `usu_cre` (`usu_cre`);

--
-- Indices de la tabla `subirdocente`
--
ALTER TABLE `subirdocente`
  ADD PRIMARY KEY (`id_sd`),
  ADD KEY `id_uni` (`id_uni`),
  ADD KEY `usu_cre` (`usu_cre`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipu`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id_uni`),
  ADD KEY `id_asig` (`id_asig`),
  ADD KEY `usu_cre` (`usu_cre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_tip` (`id_tip`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnocurso`
--
ALTER TABLE `alumnocurso`
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `asignaturascursos`
--
ALTER TABLE `asignaturascursos`
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `cursosdescripcion`
--
ALTER TABLE `cursosdescripcion`
  MODIFY `id_cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `docentea`
--
ALTER TABLE `docentea`
  MODIFY `id_docA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `docentecurso`
--
ALTER TABLE `docentecurso`
  MODIFY `id_docc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_doce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `id_esta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `log_sistema`
--
ALTER TABLE `log_sistema`
  MODIFY `IdLogSistema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT de la tabla `noticiasestablecimiento`
--
ALTER TABLE `noticiasestablecimiento`
  MODIFY `id_ne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  MODIFY `id_pant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pantallasdetalle`
--
ALTER TABLE `pantallasdetalle`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pantallasdetalleusuarios`
--
ALTER TABLE `pantallasdetalleusuarios`
  MODIFY `id_pdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pantallasusuarios`
--
ALTER TABLE `pantallasusuarios`
  MODIFY `id_pu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subiralumno`
--
ALTER TABLE `subiralumno`
  MODIFY `id_sa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subirdocente`
--
ALTER TABLE `subirdocente`
  MODIFY `id_sd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id_uni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`usu_cre`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`usu_cre`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`Id_esta`) REFERENCES `establecimiento` (`id_esta`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`usucre_doce`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `establecimiento_ibfk_1` FOREIGN KEY (`usucrec_esta`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`Id_esta`) REFERENCES `establecimiento` (`id_esta`),
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`usucre_est`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `noticiasestablecimiento`
--
ALTER TABLE `noticiasestablecimiento`
  ADD CONSTRAINT `noticiasestablecimiento_ibfk_1` FOREIGN KEY (`usu_cre`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `pantallasdetalle`
--
ALTER TABLE `pantallasdetalle`
  ADD CONSTRAINT `pantallasdetalle_ibfk_1` FOREIGN KEY (`id_pant`) REFERENCES `pantallas` (`id_pant`);

--
-- Filtros para la tabla `pantallasdetalleusuarios`
--
ALTER TABLE `pantallasdetalleusuarios`
  ADD CONSTRAINT `pantallasdetalleusuarios_ibfk_1` FOREIGN KEY (`id_pdet`) REFERENCES `pantallasdetalle` (`id_pd`);

--
-- Filtros para la tabla `pantallasusuarios`
--
ALTER TABLE `pantallasusuarios`
  ADD CONSTRAINT `pantallasusuarios_ibfk_1` FOREIGN KEY (`id_pant`) REFERENCES `pantallas` (`id_pant`),
  ADD CONSTRAINT `pantallasusuarios_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `subiralumno`
--
ALTER TABLE `subiralumno`
  ADD CONSTRAINT `subiralumno_ibfk_1` FOREIGN KEY (`id_uni`) REFERENCES `unidades` (`id_uni`),
  ADD CONSTRAINT `subiralumno_ibfk_2` FOREIGN KEY (`usu_cre`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `subirdocente`
--
ALTER TABLE `subirdocente`
  ADD CONSTRAINT `subirdocente_ibfk_1` FOREIGN KEY (`id_uni`) REFERENCES `unidades` (`id_uni`),
  ADD CONSTRAINT `subirdocente_ibfk_2` FOREIGN KEY (`usu_cre`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `unidades_ibfk_1` FOREIGN KEY (`id_asig`) REFERENCES `asignaturas` (`id_asig`),
  ADD CONSTRAINT `unidades_ibfk_2` FOREIGN KEY (`usu_cre`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tip`) REFERENCES `tipousuario` (`id_tipu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
