-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2021 a las 07:18:01
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compra_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth`
--

CREATE TABLE `auth` (
  `codigo_usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `fecha_r` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_e` datetime NOT NULL,
  `fecha_a` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auth`
--

INSERT INTO `auth` (`codigo_usuario`, `nombre`, `apellido`, `usuario`, `password`, `rol`, `fecha_r`, `fecha_e`, `fecha_a`, `estado`) VALUES
('66aad71c2d1726c600e80a34c58b6258', 'Roberto', 'Yoc', 'RobertoPG', '202cb962ac59075b964b07152d234b70', 'c81e728d9d4c2f636f067f89cc14862c', '2021-05-14 22:27:08', '2021-05-14 16:27:08', '0000-00-00 00:00:00', b'0'),
('6db9e08e4295925697af15059da4e995', 'Santiago', 'Chitic', 'santiago', 'e10adc3949ba59abbe56e057f20f883e', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-13 15:34:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1'),
('7155fa4c77aafe3aef8f18a161ccfbc9', 'EDER', 'MARROQUIN', 'DEOMA', '827ccb0eea8a706c4c34a16891f84e7b', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-13 15:32:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1'),
('c4ca4238a0b923820dcc509a6f75849b', 'Isaac', 'Martinez', 'IEMO', '4a6b94bfef1dae584d9d36d56a34200c', '0b28a5799a32c687dad2c5183718ceac', '2021-05-14 22:27:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo_categoria` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actializacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo_categoria`, `codigo`, `categoria`, `descripcion`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actializacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('1be3842ece0b6fbab575bc32ea7737f5', 'CA-BTHU', 'FERTILIZANTES', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('baa661154ee9582abf982570b201298e', 'CA-VUKO', 'CONCENTRADOS', '\r\n', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:37:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d583ed2bf0381b082922ec1b7f6abf70', 'CA-HJRO', 'AGROQUIMICOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:17:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fb85aee11e7190e586d2422f24a604e6', 'CA-TJFC', 'GASEOSAS PEPSI COLA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:53:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo_cliente` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `codigo_compra` varchar(50) NOT NULL,
  `codigo_proveedor` varchar(50) DEFAULT NULL,
  `codigo_categoria` varchar(50) NOT NULL,
  `codigo_subcategoria` varchar(50) DEFAULT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `codigo_presentacion` varchar(50) NOT NULL,
  `stock` int(3) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `utilidad` int(11) NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `codigo_inventario` varchar(50) NOT NULL,
  `codigo_categoria` varchar(50) NOT NULL,
  `codigo_subcategoria` varchar(50) DEFAULT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `codigo_presentacion` varchar(50) NOT NULL,
  `stock` int(3) NOT NULL,
  `precio_compra` double NOT NULL DEFAULT 0,
  `precio_venta` double NOT NULL DEFAULT 0,
  `utilidad` double NOT NULL DEFAULT 0,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`codigo_inventario`, `codigo_categoria`, `codigo_subcategoria`, `codigo_producto`, `codigo_presentacion`, `stock`, `precio_compra`, `precio_venta`, `utilidad`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('01f287e5a0907d9d20dfb074a3778d10', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '24c6d0e9cfd1ae282db6b16461fdc8e8', '30c865844259683b92811bcfc143b9fb', 1, 195, 200, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:29:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('0d3698355b50c58023950fbb3328a7a2', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'e09bdd2d816850a5b676eeeab402ec51', '9daf33f726a1a305ad86d9dc467d3e33', 1, 85, 90, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:26:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('103c6e1e40c36ddd5a031046956952ef', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '60519158503c2540c9b2f8800d7fb0dc', '961d26ccde1ec19757a2869481fa9c7d', 1, 30, 35, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:25:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('13695efc5ae910e0fda733425f4d23b7', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '586bf50773ddb0e8027684037f747821', '434bc1ec37deb904edae7942b10cc350', 1, 20, 22, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:21', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('155acf75276314a765509d8278a7944b', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '18ea44856685650a6ab1bcd137345b37', '961d26ccde1ec19757a2869481fa9c7d', 1, 100, 105, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:22:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('1f1cffafd28dcaa5dd1877cc61e128d4', 'baa661154ee9582abf982570b201298e', NULL, '4f00419eb1e2b886a733526c76e33e47', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 150, 160, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:50:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('21ac5f5793dcd5f3f8e898352faffb5c', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '4b470473bfbf923934ad9e430545b7c2', '51f6fa532022193ae53f4ab49e994f76', 1, 85, 90, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:21:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('262a984717aab66b1e3cf06060a1ac13', '1be3842ece0b6fbab575bc32ea7737f5', NULL, '847489c618fa6195792631e575f003a0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 100, 107, 7, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:34:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('28316391129145667eef8741a20baa99', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '42b1c20160989a4dbedc1d827f80b774', '2d5a06d564dc87d865db2a502c7fe43b', 1, 3, 8, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:27:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('284d0c88b08836b9315c7f32d60dc491', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '8be20f4f18f92c2dda918ef4daa95ea8', '961d26ccde1ec19757a2869481fa9c7d', 1, 45, 50, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:28:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('2bb49ffb2e1c7917832d3656bfff7323', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '259d2cfbd5bebf466863ff03c801e676', '8bcc3be85c541bddc24d0ceffa1e7a46', 1, 55, 60, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:21:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('32e027907c907e76c20322febd40f041', '1be3842ece0b6fbab575bc32ea7737f5', NULL, 'd0737b572e4c38aaaa4893a5b3c382dd', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 200, 206, 6, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:34:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('33dab1f8f6b721b2e7261b899565da6d', 'baa661154ee9582abf982570b201298e', NULL, '6fe4b69479dfa8c6c3b56da53059d8bb', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 215, 220, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('34af8dadcb15342fdc070cb765b7ac28', 'fb85aee11e7190e586d2422f24a604e6', NULL, '63471534d1cf922d62716dccc76ea1cb', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 23, 25, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:04:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('366187e11869d799e260368d8c46050e', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '480659e80ee97adaac165fb65a432d7d', '961d26ccde1ec19757a2869481fa9c7d', 1, 45, 50, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:31:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('3b338f8163ca28e836eb83384e428f9e', 'baa661154ee9582abf982570b201298e', NULL, '5e36c5dac6a16841ce52ffc66ba989cc', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 173, 175, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:47:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('438ae199f9d56c651fe4ac4f7de3063c', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '290cb70a001962b41ff9454b95fd7da4', '9daf33f726a1a305ad86d9dc467d3e33', 1, 80, 85, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:26:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('43b9016ca99dbceaecfe94a68e89eafd', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '746b462c6dfcc3ac54177e879c14d779', '434bc1ec37deb904edae7942b10cc350', 1, 55, 60, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:27:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('44ad263948a0e4e6c109a00e8ffc67e1', 'baa661154ee9582abf982570b201298e', NULL, '178cbb88fb31e407326b2706231e1040', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 213, 218, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:44:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('45821b0a5e960cfeed855a5dda0687f4', 'fb85aee11e7190e586d2422f24a604e6', NULL, 'bf7c4675664fb4ee730b91aaabbceda4', '208e489af92d56a877e47e5db1760a97', 1, 52, 60, 8, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:06:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('48373981246d89564eec49255c64701a', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '89b24d6796aa0be4a10858d5ec32e9c6', '30c865844259683b92811bcfc143b9fb', 1, 171, 176, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:30:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5a85df474abb68c7914a3bb0af599d6b', '1be3842ece0b6fbab575bc32ea7737f5', NULL, '2b22d6f43e0249ff61c65b6ed6239df0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 200, 207, 7, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:34:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5afbb3b4eabf87342ca75b21451638dc', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'c8f0350bed2deca10801716973e4e028', '961d26ccde1ec19757a2869481fa9c7d', 1, 35, 40, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:24:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5d73bf41c01003b0513b24181a0789f6', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '88e004d005e0d3abc77fefe03422bc3c', '9daf33f726a1a305ad86d9dc467d3e33', 1, 20, 25, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:27:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5e26f82062361a11af36b25dd3362e96', 'baa661154ee9582abf982570b201298e', NULL, 'b2c1e320c81b54537a6270488e335e1c', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 83, 86, 3, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5f118b2f1c374ed6fdaaba6ca0e0e884', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'd39f6f732213aba7d154ac474825117c', 'd940b157a75b8172b4ec6f6445975973', 1, 28, 32, 4, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:22:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('64218ef65c2c29f0cc924e64fa37bdf2', 'baa661154ee9582abf982570b201298e', NULL, 'ec6d2557a790bf623c2b9c32e0291a62', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 171, 175, 4, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('660b78d661e60047e747beb409979a00', 'baa661154ee9582abf982570b201298e', NULL, '2bee32cce13f96c15e7fb4da1dad90c0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 130, 140, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:56', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('686d519f15840616c083df93935dcca4', 'baa661154ee9582abf982570b201298e', NULL, 'd790c752a86e78d4bcb44715eb91ffa2', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 235, 243, 8, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:43:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6ae83c824d9733b51b9f43acbcaa6a8f', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'dacdfd4ba951a1da7686a617cc707de5', '30c865844259683b92811bcfc143b9fb', 1, 150, 155, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:31:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6b01999c3777a637155a908518c31f6f', 'baa661154ee9582abf982570b201298e', NULL, '10be43288f53e7fdaeee916a8c4e1979', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 390, 400, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:52:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('71dd69b8434715bca868705faf6dcf08', '1be3842ece0b6fbab575bc32ea7737f5', NULL, 'b7e67b42b99762b090e84396e6145925', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 180, 190, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:36:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('75486958e0e7826d37756910f7a5ed04', 'baa661154ee9582abf982570b201298e', NULL, '57027c3685ed14d169d91cd18bf69111', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 150, 160, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:49:49', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('76de2a8076ab58c4335262845273ba07', 'baa661154ee9582abf982570b201298e', NULL, '8928bf5b39041d058b33a732c4deb350', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 240, 245, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:42:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('7af8fe65b6922ea03368c7403b8c69e7', 'fb85aee11e7190e586d2422f24a604e6', NULL, '83d548b152a44995e5a4d878d73428a0', '208e489af92d56a877e47e5db1760a97', 1, 63, 68, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:00:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('7b6fca793e5f82d27440da063d054e6d', 'baa661154ee9582abf982570b201298e', NULL, '1e9094269a9a451422cb769c6d80b91b', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 150, 153, 3, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:46:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('7ce274b679ca6953e8dbb570994630fe', 'baa661154ee9582abf982570b201298e', NULL, 'd3244a3c483d5da20e6e66e0b1cbef7f', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 240, 245, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:41:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('805fb35d86a02ef839203906695ccd52', 'baa661154ee9582abf982570b201298e', NULL, '5643da897b1e06c7b2ddff5a322dc876', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 125, 130, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8091caf0a2ba993777ac14970ff40b76', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '26ea82cba4e0cfa6892a0e3c7fe35b15', '961d26ccde1ec19757a2869481fa9c7d', 1, 135, 140, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:24:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('80ddc1de5d0922e99558284569c9d8ef', 'baa661154ee9582abf982570b201298e', NULL, '9567ed170208b7d3cbefa1fc53b7363f', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 160, 165, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:50:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8346fdaef2731922696da0a64af01c90', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '1cf900409b444cb2463df367bb3fd99c', '961d26ccde1ec19757a2869481fa9c7d', 1, 120, 125, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:25:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('85b21609b9676ccdb631d5740802d094', 'fb85aee11e7190e586d2422f24a604e6', NULL, '1b452a24794ecabd0b0298df04ac6b7e', '208e489af92d56a877e47e5db1760a97', 1, 62, 73, 11, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:00:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('888001054e3cffbc7413fe9c5e58dca2', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '42cc855e60df2aaa57837a36f2c2e876', '961d26ccde1ec19757a2869481fa9c7d', 1, 50, 55, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:31:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('89947abfb006f51afcbc1a13fac121d4', 'baa661154ee9582abf982570b201298e', NULL, '3aabab50c5d9f46bd32db95d7fe4bbba', '2d5a06d564dc87d865db2a502c7fe43b', 1, 25, 30, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:52:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('91d52959fdfc94de471de7fe628b5ff9', '1be3842ece0b6fbab575bc32ea7737f5', NULL, '714ad6bfe88321790732292aae8dcf80', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 110, 117, 7, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:35:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('94fe8098a08b9e2aff6f56d6b470529e', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '947ec16945a586c4d318ce817985ed52', '961d26ccde1ec19757a2869481fa9c7d', 1, 60, 65, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:25:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9537776e9cf854a28873029fb17d7f38', 'fb85aee11e7190e586d2422f24a604e6', NULL, '6bdb33b0ea397a2fd64f9e380526366c', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 48, 50, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:06:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9884d18f2e6c4893ae2458ad4d2d2d2e', 'fb85aee11e7190e586d2422f24a604e6', NULL, 'c2ca56faa87067619d5417f56c6e1d4d', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 18.5, 20, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:02:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('993fa95dd92b72e96a8487662ebb0dec', '1be3842ece0b6fbab575bc32ea7737f5', NULL, '33b678e54aa9d52369452ee5719e4142', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 145, 150, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:35:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9bf249c03a5419b329403fd1d6e953b0', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'fbc7021c7734194ad2e10a4a9cd32314', '37f1413b88d8f7adb0790c326b6f84b3', 1, 795, 800, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:30:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a64fcb70ad86527400b411c53bebdf36', 'baa661154ee9582abf982570b201298e', NULL, '5f8df025fe3c156d9ba20ec3d87ddb6d', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 136, 140, 4, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:47:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a7b001b6a52cf70ae3173db9c16d9ea6', 'baa661154ee9582abf982570b201298e', NULL, 'aadaf2a8d94910303379f27062699c87', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 140, 145, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:50:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a7e87a89acd5cda116bd1074c464f023', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '22687cc4300d5ed56df6453ab930d44c', '9daf33f726a1a305ad86d9dc467d3e33', 1, 20, 25, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:28:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a9699285fb77dc60588e29e9cb842e5b', 'baa661154ee9582abf982570b201298e', NULL, 'd30da45f5933bf9e7082c58964ef8d48', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 138, 140, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('aeb81824e1fd00f4c7d5a73ec7d9b73b', '1be3842ece0b6fbab575bc32ea7737f5', NULL, '8fd0c3ba6c8b0e7280855a9bc4289f43', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 180, 190, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:36:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b0b8495df420874d99d23e187171b759', 'baa661154ee9582abf982570b201298e', NULL, '9fc21aa42ea2042018f2f6bcdf4b95e3', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 137, 140, 3, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:46:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b20eace895d79d4ca2da5c0c8ea907b6', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '49315777eca0ab4fb7d6a46951e40d62', '434bc1ec37deb904edae7942b10cc350', 1, 10, 12, 2, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c0408bcadaf025d7a52a41e9cfe3cfcd', 'fb85aee11e7190e586d2422f24a604e6', NULL, 'd7578c13b1ac91dc2d1379821f9e4fb1', '208e489af92d56a877e47e5db1760a97', 1, 69, 74, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:59:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c0cf452851fb758d3554be4524fda6fb', 'baa661154ee9582abf982570b201298e', NULL, 'a256a3033fef93cacec736a30c40eda1', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 240, 245, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:38:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c50979c6e7833605e4fc75af28bfe188', 'fb85aee11e7190e586d2422f24a604e6', NULL, 'f39504e1768f6205c43f135a0e9e8b55', '208e489af92d56a877e47e5db1760a97', 1, 57, 60, 3, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:59:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c9cf7d2f39121486237f3f25e90a2ef6', 'fb85aee11e7190e586d2422f24a604e6', NULL, 'e42b5938a9f505fc3733d5d1f4d86b75', '208e489af92d56a877e47e5db1760a97', 1, 69, 74, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:59:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('cd374850256ff25dc8320f898d43570c', 'baa661154ee9582abf982570b201298e', NULL, '865b72ef81b656273c686d1443ffd707', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 390, 400, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:51:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d2453d08dae088069275472a6557997a', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '5014cb4d03f2e3e1fb1cc726f9116f3e', '961d26ccde1ec19757a2869481fa9c7d', 1, 40, 45, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:29:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d7629a2ee1844a500391f7f42b3a88fc', 'baa661154ee9582abf982570b201298e', NULL, '4be27f694c872972dce6813f3d30498a', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 130, 135, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:46:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('db4c0ec949b26817a13794b02d68a1c0', 'fb85aee11e7190e586d2422f24a604e6', NULL, '532cc0b3709ba52694d3694272370552', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 28.5, 30, 1.5, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:05:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e1ad1cc705002a643e51e8c2dcafe35f', 'baa661154ee9582abf982570b201298e', NULL, 'df9466b5ce80645800085a22eabe89c3', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 210, 215, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e46f48b360d88231427869ec1334c600', 'fb85aee11e7190e586d2422f24a604e6', NULL, '9969f7a5c6032acbfc8d6631b04b4941', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 18.5, 20, 1.5, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:05:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e79de15ca5975c44761f68bac68e8326', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'c41d60c37e10f3e5bcf64e0852d23dc9', 'd940b157a75b8172b4ec6f6445975973', 1, 45, 50, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:23:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('ef4e6ea6d67463fc8a197e704740a8e4', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '13ac0d0c18fc0f835738709fee97782e', '961d26ccde1ec19757a2869481fa9c7d', 1, 115, 120, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:26:13', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f03b8d567a727a8df0348f659f45d836', 'fb85aee11e7190e586d2422f24a604e6', NULL, '9ba592041ff36687d2317fba8d844cb6', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 28.5, 30, 1.5, '6db9e08e4295925697af15059da4e995', '2021-06-13 18:03:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f2cc7d818d594e7a9b46617ea6f34a23', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '9e4c3763be487aebfcfdd2a06e49d0d4', '961d26ccde1ec19757a2869481fa9c7d', 1, 135, 140, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:24:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f80c46543d38d9b3613e0b9aedff98a5', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '45bcfe730c60521abe678863d3733a9b', '961d26ccde1ec19757a2869481fa9c7d', 1, 130, 135, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:20:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f96b593a455a4c4a60ba9dee64091f35', 'baa661154ee9582abf982570b201298e', NULL, '43eff83b2a44ee4789447fda61dc419e', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 390, 400, 10, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:51:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fab79733c62878acdd2e07958ffa1092', 'baa661154ee9582abf982570b201298e', NULL, '64e042fd8ce9bda19a79877f1498b0f0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 218, 223, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:44:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fc5e9e862886a0cee5ce026f35304770', 'baa661154ee9582abf982570b201298e', NULL, '18c7e2e186a7691e15771292ed31f873', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 160, 165, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fef25c07910b45b44c0617e05c2fd480', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, '6486d0d7302a353d25feb2a1d569c55f', '961d26ccde1ec19757a2869481fa9c7d', 1, 60, 65, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:23:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('ffc526fedc8bb5e123f147c4f9315ecb', 'd583ed2bf0381b082922ec1b7f6abf70', NULL, 'df3cbf191e1763939617de8d0ecce8cf', '961d26ccde1ec19757a2869481fa9c7d', 1, 45, 50, 5, '6db9e08e4295925697af15059da4e995', '2021-06-13 17:30:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `codigo_presentacion` varchar(50) NOT NULL,
  `presentacion` varchar(50) NOT NULL,
  `libras` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`codigo_presentacion`, `presentacion`, `libras`, `descripcion`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('208e489af92d56a877e47e5db1760a97', 'CAJA', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:58:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('2d5a06d564dc87d865db2a502c7fe43b', 'LIBRA', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:19:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('30c865844259683b92811bcfc143b9fb', 'GALON', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:19:06', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('37f1413b88d8f7adb0790c326b6f84b3', 'CANEKA', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:19:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('434bc1ec37deb904edae7942b10cc350', 'SOBRES', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:19:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('51f6fa532022193ae53f4ab49e994f76', '1/2 LITRO', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:18:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('634a58b9ad629c0b07c2aa78104c713d', '1/2 QUINTAL', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:33:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8bcc3be85c541bddc24d0ceffa1e7a46', '1/4 LITRO', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:18:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('961d26ccde1ec19757a2869481fa9c7d', 'LITRO', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:18:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9daf33f726a1a305ad86d9dc467d3e33', 'KILO', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:18:55', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('ae7623aaf5149513ab5bb76254a46ee5', 'PAQUETE', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:58:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b14d265b293dd0e7e24df1c4513f7e11', 'QUINTAL', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d940b157a75b8172b4ec6f6445975973', '1/8 LITRO', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:18:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('dda842ec1e22fe61c39daba8e23cda3d', 'ARROBA', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:37:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('dea5efc021825601d87c0371e72abf57', 'ARROBAS', '1', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:33:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo_producto` varchar(50) NOT NULL,
  `codigo_categoria` varchar(50) NOT NULL,
  `codigo_presentacion` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `detalles` text DEFAULT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `codigo_categoria`, `codigo_presentacion`, `codigo`, `producto`, `detalles`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('10be43288f53e7fdaeee916a8c4e1979', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-PKEN', 'FONTANA PECES', 'POR LIBRA', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:52:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('13ac0d0c18fc0f835738709fee97782e', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VRGW', 'INDICADOR PLUS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:26:13', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('178cbb88fb31e407326b2706231e1040', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-BEIN', 'FINALIZADOR COMAYMA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:44:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('18c7e2e186a7691e15771292ed31f873', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-CPDZ', 'GRANILLO MOLSA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:32', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('18ea44856685650a6ab1bcd137345b37', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-DVRI', 'FORAFOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:22:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('1b452a24794ecabd0b0298df04ac6b7e', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-BXDT', '2 LITROS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:00:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('1cf900409b444cb2463df367bb3fd99c', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VTWF', 'ALBURET PH', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:25:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('1e9094269a9a451422cb769c6d80b91b', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-TLEA', 'TOROCAMPEON', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:46:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('22687cc4300d5ed56df6453ab930d44c', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-FVHS', 'TERBUFOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:28:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('24c6d0e9cfd1ae282db6b16461fdc8e8', 'd583ed2bf0381b082922ec1b7f6abf70', '30c865844259683b92811bcfc143b9fb', 'PRS-OTUH', 'SUPERBAXONE', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:29:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('259d2cfbd5bebf466863ff03c801e676', 'd583ed2bf0381b082922ec1b7f6abf70', '8bcc3be85c541bddc24d0ceffa1e7a46', 'PRS-BYSV', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:21:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('26ea82cba4e0cfa6892a0e3c7fe35b15', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-YYHO', 'MAXIBOTS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:24:09', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('290cb70a001962b41ff9454b95fd7da4', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-ZATF', 'ZINC BORO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:26:51', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('2b22d6f43e0249ff61c65b6ed6239df0', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LZOI', '20-20-0 MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:34:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('2bee32cce13f96c15e7fb4da1dad90c0', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-ZNXW', 'GALLETA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:56', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('33b678e54aa9d52369452ee5719e4142', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-UISH', 'NUTRICAFE I MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:35:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('3aabab50c5d9f46bd32db95d7fe4bbba', 'baa661154ee9582abf982570b201298e', '2d5a06d564dc87d865db2a502c7fe43b', 'PRS-HDQY', 'CAFE MOLIDO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:52:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('42b1c20160989a4dbedc1d827f80b774', 'd583ed2bf0381b082922ec1b7f6abf70', '2d5a06d564dc87d865db2a502c7fe43b', 'PRS-EIPX', 'FOLIDOL', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:27:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('42cc855e60df2aaa57837a36f2c2e876', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-XMOP', 'ROOT OUT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:31:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('43eff83b2a44ee4789447fda61dc419e', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-CVPT', 'RUFO CACHORO', 'SE VENDE POR LIBRA ANOTACION', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:51:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('45bcfe730c60521abe678863d3733a9b', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-DPZV', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:20:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('480659e80ee97adaac165fb65a432d7d', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-LKUG', 'PANTEX', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:31:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('49315777eca0ab4fb7d6a46951e40d62', 'd583ed2bf0381b082922ec1b7f6abf70', '434bc1ec37deb904edae7942b10cc350', 'PRS-RCOP', 'RATICIDA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:08', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('4b470473bfbf923934ad9e430545b7c2', 'd583ed2bf0381b082922ec1b7f6abf70', '51f6fa532022193ae53f4ab49e994f76', 'PRS-AFEX', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:20:55', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('4be27f694c872972dce6813f3d30498a', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-MPND', 'ECONOGANADO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:46:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('4f00419eb1e2b886a733526c76e33e47', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-MZSC', 'MAIZ AMARILLO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:50:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5014cb4d03f2e3e1fb1cc726f9116f3e', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-YUOZ', 'QUEMAXONE', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:29:30', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('532cc0b3709ba52694d3694272370552', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-AMXS', 'FRUTA FRESCA 20z', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:05:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5643da897b1e06c7b2ddff5a322dc876', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-CTYX', 'MASECA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('57027c3685ed14d169d91cd18bf69111', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-BIBW', 'MAIZ BLANCO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:49:49', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('586bf50773ddb0e8027684037f747821', 'd583ed2bf0381b082922ec1b7f6abf70', '434bc1ec37deb904edae7942b10cc350', 'PRS-UCQS', 'MAGNUM', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:20', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5e36c5dac6a16841ce52ffc66ba989cc', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-QILX', 'CINTA AZUL LECHERA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:47:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5f8df025fe3c156d9ba20ec3d87ddb6d', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-TTXC', 'AFRECO MOLSA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:47:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('60519158503c2540c9b2f8800d7fb0dc', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-PHID', 'ALBULET ADERENTE', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:25:38', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('63471534d1cf922d62716dccc76ea1cb', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-ATSI', 'AQUA 20z', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:04:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6486d0d7302a353d25feb2a1d569c55f', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-KBTD', 'YARAVITA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:23:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('64e042fd8ce9bda19a79877f1498b0f0', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-OMOJ', 'DESARROLLO COMAYMA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:44:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6bdb33b0ea397a2fd64f9e380526366c', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-JJUM', 'AMP LATA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:06:54', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6fe4b69479dfa8c6c3b56da53059d8bb', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-ZQNM', 'VITACERDO 2 ALIANZA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('714ad6bfe88321790732292aae8dcf80', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-XKGF', '12-05 FISICO MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:35:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('746b462c6dfcc3ac54177e879c14d779', 'd583ed2bf0381b082922ec1b7f6abf70', '434bc1ec37deb904edae7942b10cc350', 'PRS-EQTG', 'SEVIN', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:27:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('83d548b152a44995e5a4d878d73428a0', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-HTGR', '2.5 LITROS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:00:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('847489c618fa6195792631e575f003a0', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VULJ', 'SULFATO MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:34:52', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('865b72ef81b656273c686d1443ffd707', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LMDC', 'RUFO ADULTO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:51:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('88e004d005e0d3abc77fefe03422bc3c', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-PWZN', 'TAREA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:27:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8928bf5b39041d058b33a732c4deb350', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-XKVD', 'VITAENGORDE FINALIZADOR', 'ESTE PRODUCTO SE VENDE POR DIFERENTES PRESENTACIONES', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:42:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('89b24d6796aa0be4a10858d5ec32e9c6', 'd583ed2bf0381b082922ec1b7f6abf70', '30c865844259683b92811bcfc143b9fb', 'PRS-GHPA', 'RANNDUP', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:30:03', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8be20f4f18f92c2dda918ef4daa95ea8', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VBWF', 'GRAMOXONE', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:28:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8fd0c3ba6c8b0e7280855a9bc4289f43', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VQLL', 'NITROEXTEND DISAGRO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:36:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('947ec16945a586c4d318ce817985ed52', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-ZVOE', 'BAYFOLAN', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:25:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9567ed170208b7d3cbefa1fc53b7363f', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LEEQ', 'MAIZ MOLIDO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:50:33', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9969f7a5c6032acbfc8d6631b04b4941', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-ESBU', 'SQUIZ 20z', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:05:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9ba592041ff36687d2317fba8d844cb6', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-SODN', 'PEPSITA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:03:43', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9e4c3763be487aebfcfdd2a06e49d0d4', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VTQK', 'ATADURA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:24:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9fc21aa42ea2042018f2f6bcdf4b95e3', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RPUR', 'AFRECHO SALVAVIDA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:46:58', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a256a3033fef93cacec736a30c40eda1', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LXGH', 'VITAENGORDE INICIO', 'POLLO\r\n', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:38:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('aadaf2a8d94910303379f27062699c87', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RGCT', 'MAIZ ARINA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:50:17', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b2c1e320c81b54537a6270488e335e1c', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LPVP', 'PALMISTE', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:46', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b7e67b42b99762b090e84396e6145925', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-MZPQ', 'MAS CAFE NORDIC', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:36:40', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('bf7c4675664fb4ee730b91aaabbceda4', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-RLFJ', '1 1/4 LITRO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:06:11', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c2ca56faa87067619d5417f56c6e1d4d', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-TGTM', 'RIQUITA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 18:01:27', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c41d60c37e10f3e5bcf64e0852d23dc9', 'd583ed2bf0381b082922ec1b7f6abf70', 'd940b157a75b8172b4ec6f6445975973', 'PRS-QSMD', 'TRATAMAX', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:23:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c8f0350bed2deca10801716973e4e028', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VHIV', 'FOLIRAX', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:24:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d0737b572e4c38aaaa4893a5b3c382dd', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-IXAM', 'UREA MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:34:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d30da45f5933bf9e7082c58964ef8d48', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VPGW', 'ECONOLACTANO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d3244a3c483d5da20e6e66e0b1cbef7f', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-QQYQ', 'VITAENGORDE INICIO', 'ESTE CONCENTRADO SE VENDE POR LIBRA, EL PRECIO DE VENTA VA A SER DIFERENTE EN LAS VENTAS\r\n', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:41:44', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d39f6f732213aba7d154ac474825117c', 'd583ed2bf0381b082922ec1b7f6abf70', 'd940b157a75b8172b4ec6f6445975973', 'PRS-QOAP', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:22:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d7578c13b1ac91dc2d1379821f9e4fb1', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-QEKI', 'JUMBOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:59:26', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d790c752a86e78d4bcb44715eb91ffa2', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-IFIF', 'ALIENGORDE I', 'TODOS LOS PRODUCTOS DE CONCENTRADOS SE VENDER POR DIFERENTES PRESENTACIONES', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:43:31', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('dacdfd4ba951a1da7686a617cc707de5', 'd583ed2bf0381b082922ec1b7f6abf70', '30c865844259683b92811bcfc143b9fb', 'PRS-WYSW', 'ROOT OUT', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:31:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('df3cbf191e1763939617de8d0ecce8cf', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-XOMO', 'RANNDUP', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:30:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('df9466b5ce80645800085a22eabe89c3', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-YCPN', 'VITACERDO 3 ALIANZA', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:45:19', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e09bdd2d816850a5b676eeeab402ec51', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-XVRZ', 'BORDOCOP', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:26:34', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e42b5938a9f505fc3733d5d1f4d86b75', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-KNUK', 'PRB', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:59:48', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('ec6d2557a790bf623c2b9c32e0291a62', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RPFK', 'VITALECHERO #18', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:48:02', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f39504e1768f6205c43f135a0e9e8b55', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-OULS', 'PEQUEÑAS VIDRIO', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:59:05', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fbc7021c7734194ad2e10a4a9cd32314', 'd583ed2bf0381b082922ec1b7f6abf70', '37f1413b88d8f7adb0790c326b6f84b3', 'PRS-ZONE', 'RANNDUP', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:30:39', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codigo_proveedor` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `codigo_rol` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`codigo_rol`, `rol`, `descripcion`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'Admin', '', 'IEMO', '2020-05-14 18:38:53', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c81e728d9d4c2f636f067f89cc14862c', 'Ventas', '', 'IEMO', '2020-05-14 18:39:10', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `codigo_subcategoria` varchar(50) NOT NULL,
  `codigo_categoria` varchar(50) NOT NULL,
  `subcategoria` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`codigo_compra`),
  ADD KEY `codigo_proveedor` (`codigo_proveedor`),
  ADD KEY `codigo_categoria` (`codigo_categoria`),
  ADD KEY `codigo_subcategoria` (`codigo_subcategoria`),
  ADD KEY `codigo_producto` (`codigo_producto`),
  ADD KEY `codigo_presentacion` (`codigo_presentacion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codigo_inventario`),
  ADD KEY `codigo_categoria` (`codigo_categoria`),
  ADD KEY `codigo_subcategoria` (`codigo_subcategoria`),
  ADD KEY `codigo_producto` (`codigo_producto`),
  ADD KEY `codigo_presentacion` (`codigo_presentacion`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`codigo_presentacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY `codigo_categoria` (`codigo_categoria`),
  ADD KEY `codigo_presentacion` (`codigo_presentacion`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codigo_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`codigo_rol`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`codigo_subcategoria`),
  ADD KEY `codigo_categoria` (`codigo_categoria`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`codigo_categoria`) REFERENCES `categoria` (`codigo_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`codigo_presentacion`) REFERENCES `presentacion` (`codigo_presentacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
