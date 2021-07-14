-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2021 a las 08:43:26
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
('6db9e08e4295925697af15059da4e995', 'Santiago', 'Chitic', 'santiago', 'e10adc3949ba59abbe56e057f20f883e', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-13 15:34:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1'),
('c4ca4238a0b923820dcc509a6f75849b', 'Isaac', 'Martinez', 'IEMO', 'c4ca4238a0b923820dcc509a6f75849b', '0b28a5799a32c687dad2c5183718ceac', '2021-06-15 15:56:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1'),
('e4a64c8eb9fb6c471afd8b96425dda3d', 'Eder', 'Marroquin', 'DEOMA', 'e10adc3949ba59abbe56e057f20f883e', 'c81e728d9d4c2f636f067f89cc14862c', '2021-06-25 06:08:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1');

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
('19bb69682d8926804e2a4606a6c39e9d', 'CA-CQXK', 'ASDASD', 'asd', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 16:56:26', '', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 10:56:26', b'0'),
('1b1cdc60f93ec92ea31edec58db12129', 'CA-ANMS', 'PRUEBA 1', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-15 21:49:54', '', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-15 15:49:54', b'0'),
('1be3842ece0b6fbab575bc32ea7737f5', 'CA-BTHU', 'FERTILIZANTES', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:32:41', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('baa661154ee9582abf982570b201298e', 'CA-VUKO', 'CONCENTRADOS', '\r\n', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:37:18', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d583ed2bf0381b082922ec1b7f6abf70', 'CA-HJRO', 'AGROQUIMICOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-13 17:17:57', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fb85aee11e7190e586d2422f24a604e6', 'CA-TJFC', 'Aguas', '', '6db9e08e4295925697af15059da4e995', '2021-06-27 16:56:52', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 10:56:52', '', '0000-00-00 00:00:00', b'1');

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
  `codigo_proveedor` varchar(50) NOT NULL,
  `codigo_categoria` varchar(50) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `codigo_presentacion` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `utilidad` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `u_registro` varchar(50) NOT NULL,
  `f_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_actualizacion` varchar(50) NOT NULL,
  `f_actualizacion` datetime NOT NULL,
  `u_eliminacion` varchar(50) NOT NULL,
  `f_eliminacion` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`codigo_compra`, `codigo_proveedor`, `codigo_categoria`, `codigo_producto`, `codigo_presentacion`, `stock`, `precio_compra`, `precio_venta`, `utilidad`, `descripcion`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('6969ae10e0318bf9e6ebdfcc63305783', '4ae1e09b7c823c118db14d70f9050a66', 'baa661154ee9582abf982570b201298e', '22687cc4300d5ed56df6453ab930d44c', 'b14d265b293dd0e7e24df1c4513f7e11', 2, 20, 25, 10, '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 07:17:16', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8f2c617d044992e8f0deb88ae6aee372', '4ae1e09b7c823c118db14d70f9050a66', 'baa661154ee9582abf982570b201298e', '178cbb88fb31e407326b2706231e1040', 'b14d265b293dd0e7e24df1c4513f7e11', 15, 213, 218, 75, '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 06:15:35', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9c5072bb13098ad149ba0bcfd04b7836', '4ae1e09b7c823c118db14d70f9050a66', 'baa661154ee9582abf982570b201298e', '22687cc4300d5ed56df6453ab930d44c', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 20, 25, 5, '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 06:10:47', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte`
--

CREATE TABLE `corte` (
  `codigo_corte` varchar(50) NOT NULL,
  `codigo_usuario` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `corte`
--

INSERT INTO `corte` (`codigo_corte`, `codigo_usuario`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-03', '2021-07-03', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `codigo_detalle` varchar(50) NOT NULL,
  `codigo_factura` varchar(50) NOT NULL,
  `codigo_usuario` varchar(50) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `tipo` int(1) DEFAULT NULL,
  `cantidad` double(10,2) NOT NULL DEFAULT 0.00,
  `precio` double(10,2) NOT NULL DEFAULT 0.00,
  `descuento` double(10,2) NOT NULL DEFAULT 0.00,
  `general` double(10,2) NOT NULL DEFAULT 0.00,
  `subtotal` double(10,2) NOT NULL DEFAULT 0.00,
  `estado` int(1) NOT NULL DEFAULT 0,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`codigo_detalle`, `codigo_factura`, `codigo_usuario`, `codigo_producto`, `tipo`, `cantidad`, `precio`, `descuento`, `general`, `subtotal`, `estado`, `hora`, `fecha`) VALUES
('9f0796c8840f23b34e1cb93c5468d792', 'e1ab60c9c7e680f54711755eb651acf5', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 12.00, 2.50, 0.00, 0.00, 30.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('0b4d05920950598ef4ac9c97178ad44e', 'e1ab60c9c7e680f54711755eb651acf5', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 4.00, 25.00, 0.00, 0.00, 100.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('7379686e238d61b51c5609cc433b1cbd', 'c77718a1318965ddd16bd8fdf0afd3ba', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 89.00, 2.50, 0.00, 0.00, 222.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('45b28191e74b5fef4f43b607aa481565', 'c77718a1318965ddd16bd8fdf0afd3ba', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 4.00, 25.00, 0.00, 0.00, 100.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('6d8b0d4b06f545fb55419abfc8945e8a', 'bf4bc6209953a8c9650f85d34cccc038', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 4.00, 25.00, 0.00, 0.00, 100.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('f24af28b0b7d519c72fb0a0b89e40f86', 'bf4bc6209953a8c9650f85d34cccc038', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 15.00, 2.50, 0.00, 0.00, 37.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('5747eba9d2e6935e0ce79229feebffa2', '5fc47710eb10a7bfc639dfd3d6a4d3fd', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 3.00, 25.00, 0.00, 0.00, 75.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('0370c4f1435c4b55418ec292450af525', '5fc47710eb10a7bfc639dfd3d6a4d3fd', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 15.00, 2.50, 0.00, 0.00, 37.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('d601ba516aa8776f681edb158714c095', '6572182137194255ba824d50d51f0cc1', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 1.00, 25.00, 0.00, 0.00, 25.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('7f5eccac090a6f555dddeb0116bba3b0', '6572182137194255ba824d50d51f0cc1', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 3.00, 2.50, 0.00, 0.00, 7.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('98eb6572ebf3f66d7f9a056eb378b793', 'a91b50e04476431cbf9ed4ef7088f5dc', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 1.00, 25.00, 0.00, 0.00, 25.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('c4c754c26236837d9adf3b9f91523766', 'a91b50e04476431cbf9ed4ef7088f5dc', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 99.00, 2.50, 0.00, 0.00, 247.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('fea1d8279e9063401bc91bd0e75e5e57', 'dc4bab7e1e2033b7fe9e049c1d629e1f', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 2.00, 25.00, 0.00, 0.00, 50.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('0ba9a0d3505b00df969d0f20321317df', 'dc4bab7e1e2033b7fe9e049c1d629e1f', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 15.00, 2.50, 0.00, 0.00, 37.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('880a9f2c38d7265d5797ac83c96809c4', 'bcbdae65224e5a636df198a34624ee19', 'c4ca4238a0b923820dcc509a6f75849b', '22687cc4300d5ed56df6453ab930d44c', 0, 3.00, 25.00, 0.00, 0.00, 75.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('eabec88c2b13c6eef08bab52ed332066', 'bcbdae65224e5a636df198a34624ee19', 'c4ca4238a0b923820dcc509a6f75849b', 'fade477ea3625ecfd5ef2e7ba46fed65', 0, 16.00, 2.50, 0.00, 0.00, 40.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('7f6c0bc957612d210dcda808a4e5aa55', 'd768e7c0772c73f051ab025f5282d371', 'c4ca4238a0b923820dcc509a6f75849b', '13ac0d0c18fc0f835738709fee97782e', 0, 1.00, 120.00, 0.00, 0.00, 120.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('da1c5447eff27ad3fa2689e5f7ee2125', 'd768e7c0772c73f051ab025f5282d371', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 12.00, 2.50, 0.00, 0.00, 30.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('5af3a5424decd13d3e9ff1dd86a8d73a', 'd768e7c0772c73f051ab025f5282d371', 'c4ca4238a0b923820dcc509a6f75849b', '8c756ab7b931e89d81375fc56de44e9f', 1, 10.00, 1.00, 0.00, 0.00, 10.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('277d27776727586795404aff5a7fa919', 'd768e7c0772c73f051ab025f5282d371', 'c4ca4238a0b923820dcc509a6f75849b', '13ac0d0c18fc0f835738709fee97782e', 3, 1.00, 120.00, 0.00, 0.00, 120.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('602467841a43f6ee0735379374bc56a0', '49656a300c281ac268d7ae5a835e9470', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 10.00, 2.50, 0.00, 0.00, 25.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('569801552cf64b82d4d47d16203e1d72', '49656a300c281ac268d7ae5a835e9470', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 12.00, 225.00, 0.00, 0.00, 2700.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('2f3de2b1f236e425138e2301834c2cca', '014d199231f9c36837a0ef10170914b8', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 3.00, 2.50, 0.00, 0.00, 7.50, 0, '2021-07-03 05:15:12', '2021-07-03'),
('3809be57f5de8c8c7c921322a89d4954', '014d199231f9c36837a0ef10170914b8', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 12.00, 225.00, 0.00, 0.00, 2700.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('c3030bed41e5522b2fc1299c7f0d01fd', 'f4571d891ab2e9f79bb9211a9526e177', 'c4ca4238a0b923820dcc509a6f75849b', '8c756ab7b931e89d81375fc56de44e9f', 0, 12.00, 225.00, 0.00, 0.00, 2700.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('764dc6f07f441fc819c4f6a17a90ed5c', 'c91fd4dff18383dfbc9e8d55b4056c8f', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 10.00, 225.00, 0.00, 0.00, 2250.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('11c1f452c92a264330b37e825cf54853', '', 'c4ca4238a0b923820dcc509a6f75849b', '8c756ab7b931e89d81375fc56de44e9f', 0, 12.00, 225.00, 0.00, 0.00, 2700.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('dd7ba86605a777080f5c44f902f5d0be', '', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 11.00, 225.00, 0.00, 0.00, 2475.00, 0, '2021-07-03 05:15:12', '2021-07-03'),
('18a1a0865120863ccbd6ff59528a83c8', '30cacd300e2a9ab9cade2fc4d9c86f87', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 25.00, 2.50, 0.00, 0.00, 62.50, 1, '2021-07-03 23:34:08', '2021-07-03'),
('816a490fe04a2e526f8475de29b6da8e', 'b0acd59d11ebb7ea06388aeac78d41ee', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 10.00, 2.50, 0.00, 0.00, 25.00, 1, '2021-07-03 23:36:06', '2021-07-03'),
('73c59e8e560ff4cb9694c889fc3d421b', '038019fa3b91db4427c4aa86571ea10d', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 25.00, 225.00, 0.00, 0.00, 5625.00, 1, '2021-07-03 23:39:59', '2021-07-03'),
('a9277b1dba60318759016f2154f6a206', '13bd9925529ea9e39d70b6e345ec9b4b', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 25.00, 225.00, 10.00, 0.00, 5615.00, 1, '2021-07-03 23:50:58', '2021-07-03'),
('7f691c96402aa1c44d3562c5b6cb39a0', 'd22275d59ae74ec71cd6117ed50b84dd', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 10.00, 225.00, 0.00, 0.00, 2250.00, 1, '2021-07-04 00:05:40', '2021-07-03'),
('79bdd4357f6ea4543f5f497deff0da51', '', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 35.00, 2.50, 0.50, 0.00, 87.00, 0, '2021-07-04 00:03:22', '2021-07-03'),
('19e21a0d43d608dc72c24c482c8686b8', '', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 35.00, 2.50, 0.50, 0.00, 70.00, 0, '2021-07-04 00:04:39', '2021-07-03'),
('9a9c425f23be159760d46310c1c580f3', 'd22275d59ae74ec71cd6117ed50b84dd', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 35.00, 2.50, 0.50, 0.00, 87.50, 1, '2021-07-04 00:05:40', '2021-07-03'),
('c66a8a249742ac3ba28e7f90d4e3c11f', '09ea414afc1489f10fe6a0347d323dcf', 'c4ca4238a0b923820dcc509a6f75849b', '18c7e2e186a7691e15771292ed31f873', 0, 1.00, 165.00, 0.00, 0.00, 165.00, 1, '2021-07-04 01:06:44', '2021-07-03'),
('6232165f3de71f050a9fb04c0c9c674e', '09ea414afc1489f10fe6a0347d323dcf', 'c4ca4238a0b923820dcc509a6f75849b', '42cc855e60df2aaa57837a36f2c2e876', 0, 1.00, 55.00, 0.00, 0.00, 55.00, 1, '2021-07-04 01:06:44', '2021-07-03'),
('945c90a9a45111345f9595285be0f716', '09ea414afc1489f10fe6a0347d323dcf', 'c4ca4238a0b923820dcc509a6f75849b', '697feb8c33e404bbd02a693a44afbc2a', 3, 1.00, 182.00, 0.00, 0.00, 182.00, 1, '2021-07-04 01:06:44', '2021-07-03'),
('abe3dad9c8e131c84ba9e840846e4de3', '09ea414afc1489f10fe6a0347d323dcf', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 35.00, 225.00, 10.00, 0.00, 7875.00, 1, '2021-07-04 01:06:44', '2021-07-03'),
('847456fbfe28e90939258345b3c44f33', '09ea414afc1489f10fe6a0347d323dcf', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 30.00, 2.50, 0.50, 0.00, 75.00, 1, '2021-07-04 01:06:44', '2021-07-03'),
('ff89de75530ce73495767eaf09997990', '8c255259992697ba973fcacc5b40932a', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 70.00, 225.00, 50.00, 0.00, 15750.00, 0, '2021-07-04 04:52:27', '2021-07-03'),
('1b3f46c7456bf8f47b4cf326ff054a63', '8c255259992697ba973fcacc5b40932a', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 30.00, 2.50, 1.00, 0.00, 75.00, 0, '2021-07-04 04:52:27', '2021-07-03'),
('d770ccbd603be9181256d60f7419d76f', '360acddfc9c5b6291c5beb01e775fb0d', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 25.00, 225.00, 10.00, 0.00, 5625.00, 0, '2021-07-04 05:02:41', '2021-07-03'),
('58d2182067573eb9f63b8634d951feea', '360acddfc9c5b6291c5beb01e775fb0d', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 25.00, 2.50, 0.00, 0.00, 62.50, 0, '2021-07-04 05:02:41', '2021-07-03'),
('976a5f4cbd92190f9be99b38b85bc85e', '1c5ba93a6db5fe6b1f7783c7d360b45d', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 0, 15.00, 225.00, 15.00, 225.00, 3375.00, 1, '2021-07-04 05:02:56', '2021-07-03'),
('36f854058897adf3a88d397bcb4c48d8', '1c5ba93a6db5fe6b1f7783c7d360b45d', 'c4ca4238a0b923820dcc509a6f75849b', 'ee8aaf2166747dcf1a3cf93287e94010', 1, 15.00, 2.50, 0.25, 3.75, 37.50, 1, '2021-07-04 05:02:56', '2021-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `codigo_factura` varchar(50) NOT NULL,
  `codigo_usuario` varchar(50) NOT NULL,
  `correlativo` varchar(50) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `descuento` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL DEFAULT 0.00,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fechas` date NOT NULL DEFAULT curdate(),
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`codigo_factura`, `codigo_usuario`, `correlativo`, `cliente`, `direccion`, `telefono`, `descuento`, `total`, `fecha`, `fechas`, `estado`) VALUES
('014d199231f9c36837a0ef10170914b8', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-NLGHH', 'Isaac Martinez', '', 0, 0.00, 2707.50, '2021-07-04 03:15:12', '2021-07-03', b'1'),
('038019fa3b91db4427c4aa86571ea10d', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-KPMVF', 'Isaac Martinez', '', 0, 0.00, 5625.00, '2021-07-04 03:15:13', '2021-07-03', b'1'),
('09ea414afc1489f10fe6a0347d323dcf', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-FNGVR', 'Eder Marroquin', '', 0, 0.00, 8352.00, '2021-07-04 03:15:14', '2021-07-03', b'1'),
('13bd9925529ea9e39d70b6e345ec9b4b', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-IILLI', '10', '', 0, 0.00, 5615.00, '2021-07-04 03:15:15', '2021-07-03', b'1'),
('1c5ba93a6db5fe6b1f7783c7d360b45d', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-OTTOU', 'Maricruz Orellana', '', 0, 0.00, 3412.50, '2021-07-04 05:02:56', '2021-07-03', b'1'),
('30cacd300e2a9ab9cade2fc4d9c86f87', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-EKEZY', 'Eder Marroquin', '', 0, 0.00, 62.50, '2021-07-04 03:15:16', '2021-07-03', b'1'),
('360acddfc9c5b6291c5beb01e775fb0d', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-XTCPN', 'Maricruz Orellana', 'El tejar', 33247456, 0.00, 5687.50, '2021-07-04 05:02:41', '2021-07-03', b'0'),
('49656a300c281ac268d7ae5a835e9470', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-NPZIU', 'Isaac Martinez', '', 0, 0.00, 2725.00, '2021-07-04 03:15:17', '2021-07-03', b'1'),
('5fc47710eb10a7bfc639dfd3d6a4d3fd', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-PLMUR', 'Andrea Estrada', '', 0, 0.00, 112.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('6572182137194255ba824d50d51f0cc1', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-TQEAI', 'Alejandra Palala', '', 0, 0.00, 32.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('8c255259992697ba973fcacc5b40932a', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-HXPPN', 'Jose Martinez', 'Chimaltenango, Chimaltenango', 4509, 0.00, 15825.00, '2021-07-04 04:52:27', '2021-07-03', b'0'),
('a91b50e04476431cbf9ed4ef7088f5dc', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-WCJHX', 'Isaac Martinez', '', 0, 0.00, 272.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('b0acd59d11ebb7ea06388aeac78d41ee', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-OWZFM', 'Isaac Martinez', '', 0, 0.00, 25.00, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('bcbdae65224e5a636df198a34624ee19', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-ZXNRY', 'Roberto Yoc', '', 0, 0.00, 115.00, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('bf4bc6209953a8c9650f85d34cccc038', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-PVVDX', 'Rudy Uluan', '', 0, 0.00, 137.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('c77718a1318965ddd16bd8fdf0afd3ba', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-TQRZV', 'Roberto Yoc', '', 0, 0.00, 322.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('c91fd4dff18383dfbc9e8d55b4056c8f', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-KLDUG', 'Isaac Martinez', '', 0, 0.00, 2250.00, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('d22275d59ae74ec71cd6117ed50b84dd', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-NPQRH', 'Andrea Estrada', '', 0, 0.00, 2337.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('d768e7c0772c73f051ab025f5282d371', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-ZXIYA', 'Isaac', '', 0, 0.00, 280.00, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('dc4bab7e1e2033b7fe9e049c1d629e1f', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-USJFI', 'Alejandra Palala', '', 0, 0.00, 87.50, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('e1ab60c9c7e680f54711755eb651acf5', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-AZONR', 'Eder Marroquin', '', 0, 0.00, 130.00, '2021-07-04 03:15:39', '2021-07-03', b'1'),
('f4571d891ab2e9f79bb9211a9526e177', 'c4ca4238a0b923820dcc509a6f75849b', 'FAC-2021-IVIXW', 'Isaac Martinez', '', 0, 0.00, 2700.00, '2021-07-04 03:15:39', '2021-07-03', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `codigo_funcion` varchar(50) NOT NULL,
  `funcion` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 0,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`codigo_funcion`, `funcion`, `icono`, `link`, `orden`, `estado`) VALUES
('5a5e2c14d4b6601a757c0a31646ed860', 'Compras', 'shopping-cart', 'Store', 1, b'1'),
('5d232f281a6276504840ac11313bc537', 'Usuarios', 'users', '#', 5, b'1'),
('693368373acc72527633fb9d1f3718cc', 'Productos', 'th', '#', 3, b'1'),
('830cb979a446c0eed165df0e62e72898', 'Ventas', 'store', '#', 4, b'1'),
('a9bb3fadf85962ae6b38e192561d20a8', 'Proveedores', 'truck', 'Supplier', 2, b'1'),
('b7e5cc3ba1cbc61e6bcf5601b4f4b7e3', 'Configuraciones', 'cog', '#', 6, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `codigo_inventario` varchar(50) NOT NULL,
  `codigo_categoria` varchar(50) NOT NULL,
  `codigo_producto` varchar(50) NOT NULL,
  `codigo_presentacion` varchar(50) NOT NULL,
  `stock` int(3) NOT NULL,
  `precio_compra` double(10,2) NOT NULL DEFAULT 0.00,
  `precio_venta` double(10,2) NOT NULL DEFAULT 0.00,
  `u_lote` double(10,2) NOT NULL DEFAULT 0.00,
  `utilidad` double(10,2) NOT NULL DEFAULT 0.00,
  `stock_libras` double(10,2) NOT NULL DEFAULT 0.00,
  `precio_libras` double(10,2) NOT NULL DEFAULT 0.00,
  `vencimiento` date DEFAULT curdate(),
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

INSERT INTO `inventario` (`codigo_inventario`, `codigo_categoria`, `codigo_producto`, `codigo_presentacion`, `stock`, `precio_compra`, `precio_venta`, `u_lote`, `utilidad`, `stock_libras`, `precio_libras`, `vencimiento`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('01f287e5a0907d9d20dfb074a3778d10', 'd583ed2bf0381b082922ec1b7f6abf70', '24c6d0e9cfd1ae282db6b16461fdc8e8', '30c865844259683b92811bcfc143b9fb', 1, 195.00, 200.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('0d3698355b50c58023950fbb3328a7a2', 'd583ed2bf0381b082922ec1b7f6abf70', 'e09bdd2d816850a5b676eeeab402ec51', '9daf33f726a1a305ad86d9dc467d3e33', 1, 85.00, 90.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('103c6e1e40c36ddd5a031046956952ef', 'd583ed2bf0381b082922ec1b7f6abf70', '60519158503c2540c9b2f8800d7fb0dc', '961d26ccde1ec19757a2869481fa9c7d', 1, 30.00, 35.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('13695efc5ae910e0fda733425f4d23b7', 'd583ed2bf0381b082922ec1b7f6abf70', '586bf50773ddb0e8027684037f747821', '434bc1ec37deb904edae7942b10cc350', 1, 20.00, 22.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('155acf75276314a765509d8278a7944b', 'd583ed2bf0381b082922ec1b7f6abf70', '18ea44856685650a6ab1bcd137345b37', '961d26ccde1ec19757a2869481fa9c7d', 1, 100.00, 105.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('1f1cffafd28dcaa5dd1877cc61e128d4', 'baa661154ee9582abf982570b201298e', '4f00419eb1e2b886a733526c76e33e47', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 150.00, 160.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('21ac5f5793dcd5f3f8e898352faffb5c', 'd583ed2bf0381b082922ec1b7f6abf70', '4b470473bfbf923934ad9e430545b7c2', '51f6fa532022193ae53f4ab49e994f76', 1, 85.00, 90.00, 10.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('223ada53032cc5aadfd5b20ac36889cd', '1be3842ece0b6fbab575bc32ea7737f5', '2223c27380ed1e4b6929d135eae87e6f', 'b14d265b293dd0e7e24df1c4513f7e11', 10, 150.00, 0.00, 1.00, -150.00, 0.00, 0.00, '2021-07-08', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-25 23:17:52', b'1'),
('262a984717aab66b1e3cf06060a1ac13', '1be3842ece0b6fbab575bc32ea7737f5', '847489c618fa6195792631e575f003a0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 100.00, 107.00, 0.00, 7.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('28316391129145667eef8741a20baa99', 'd583ed2bf0381b082922ec1b7f6abf70', '42b1c20160989a4dbedc1d827f80b774', '2d5a06d564dc87d865db2a502c7fe43b', 1, 3.00, 8.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('284d0c88b08836b9315c7f32d60dc491', 'd583ed2bf0381b082922ec1b7f6abf70', '8be20f4f18f92c2dda918ef4daa95ea8', '961d26ccde1ec19757a2869481fa9c7d', 1, 45.00, 50.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('2bb49ffb2e1c7917832d3656bfff7323', 'd583ed2bf0381b082922ec1b7f6abf70', '259d2cfbd5bebf466863ff03c801e676', '8bcc3be85c541bddc24d0ceffa1e7a46', 1, 55.00, 60.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('32e027907c907e76c20322febd40f041', '1be3842ece0b6fbab575bc32ea7737f5', 'd0737b572e4c38aaaa4893a5b3c382dd', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 200.00, 206.00, 0.00, 6.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('33dab1f8f6b721b2e7261b899565da6d', 'baa661154ee9582abf982570b201298e', '6fe4b69479dfa8c6c3b56da53059d8bb', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 215.00, 220.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('34af8dadcb15342fdc070cb765b7ac28', 'fb85aee11e7190e586d2422f24a604e6', '63471534d1cf922d62716dccc76ea1cb', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 23.00, 25.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('366187e11869d799e260368d8c46050e', 'd583ed2bf0381b082922ec1b7f6abf70', '480659e80ee97adaac165fb65a432d7d', '961d26ccde1ec19757a2869481fa9c7d', 1, 45.00, 50.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('3b338f8163ca28e836eb83384e428f9e', 'baa661154ee9582abf982570b201298e', '5e36c5dac6a16841ce52ffc66ba989cc', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 173.00, 175.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('438ae199f9d56c651fe4ac4f7de3063c', 'd583ed2bf0381b082922ec1b7f6abf70', '290cb70a001962b41ff9454b95fd7da4', '9daf33f726a1a305ad86d9dc467d3e33', 1, 80.00, 85.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('43b9016ca99dbceaecfe94a68e89eafd', 'd583ed2bf0381b082922ec1b7f6abf70', '746b462c6dfcc3ac54177e879c14d779', '434bc1ec37deb904edae7942b10cc350', 1, 55.00, 60.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('44ad263948a0e4e6c109a00e8ffc67e1', 'baa661154ee9582abf982570b201298e', '178cbb88fb31e407326b2706231e1040', 'b14d265b293dd0e7e24df1c4513f7e11', 15, 213.00, 218.00, 75.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('45821b0a5e960cfeed855a5dda0687f4', 'fb85aee11e7190e586d2422f24a604e6', 'bf7c4675664fb4ee730b91aaabbceda4', '208e489af92d56a877e47e5db1760a97', 1, 52.00, 60.00, 0.00, 8.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('48373981246d89564eec49255c64701a', 'd583ed2bf0381b082922ec1b7f6abf70', '89b24d6796aa0be4a10858d5ec32e9c6', '30c865844259683b92811bcfc143b9fb', 1, 171.00, 176.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5a85df474abb68c7914a3bb0af599d6b', '1be3842ece0b6fbab575bc32ea7737f5', '2b22d6f43e0249ff61c65b6ed6239df0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 200.00, 207.00, 0.00, 7.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5aa4bcf5eb05df8572366ce816c2afd1', 'baa661154ee9582abf982570b201298e', 'fade477ea3625ecfd5ef2e7ba46fed65', 'b14d265b293dd0e7e24df1c4513f7e11', 9, 100.00, 2.50, 1.50, 100.00, 0.00, 99.00, '2022-06-25', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5afbb3b4eabf87342ca75b21451638dc', 'd583ed2bf0381b082922ec1b7f6abf70', 'c8f0350bed2deca10801716973e4e028', '961d26ccde1ec19757a2869481fa9c7d', 1, 35.00, 40.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5d73bf41c01003b0513b24181a0789f6', 'd583ed2bf0381b082922ec1b7f6abf70', '88e004d005e0d3abc77fefe03422bc3c', '9daf33f726a1a305ad86d9dc467d3e33', 1, 20.00, 25.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5e26f82062361a11af36b25dd3362e96', 'baa661154ee9582abf982570b201298e', 'b2c1e320c81b54537a6270488e335e1c', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 83.00, 86.00, 0.00, 3.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('5f118b2f1c374ed6fdaaba6ca0e0e884', 'd583ed2bf0381b082922ec1b7f6abf70', 'd39f6f732213aba7d154ac474825117c', 'd940b157a75b8172b4ec6f6445975973', 1, 28.00, 32.00, 0.00, 4.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('634984d0ed72a80560d83ead9f59e978', 'fb85aee11e7190e586d2422f24a604e6', '636fb605e9a62683e281bd3b73e16fd8', '961d26ccde1ec19757a2869481fa9c7d', 10, 150.00, 2.50, 1.00, 150.00, 0.00, 100.00, '2022-06-25', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('64218ef65c2c29f0cc924e64fa37bdf2', 'baa661154ee9582abf982570b201298e', 'ec6d2557a790bf623c2b9c32e0291a62', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 171.00, 175.00, 0.00, 4.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('660b78d661e60047e747beb409979a00', 'baa661154ee9582abf982570b201298e', '2bee32cce13f96c15e7fb4da1dad90c0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 130.00, 140.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('686d519f15840616c083df93935dcca4', 'baa661154ee9582abf982570b201298e', 'd790c752a86e78d4bcb44715eb91ffa2', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 235.00, 243.00, 0.00, 8.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6ae83c824d9733b51b9f43acbcaa6a8f', 'd583ed2bf0381b082922ec1b7f6abf70', 'dacdfd4ba951a1da7686a617cc707de5', '30c865844259683b92811bcfc143b9fb', 1, 150.00, 155.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('6b01999c3777a637155a908518c31f6f', 'baa661154ee9582abf982570b201298e', '10be43288f53e7fdaeee916a8c4e1979', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 390.00, 400.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('71dd69b8434715bca868705faf6dcf08', '1be3842ece0b6fbab575bc32ea7737f5', 'b7e67b42b99762b090e84396e6145925', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 180.00, 190.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('75486958e0e7826d37756910f7a5ed04', 'baa661154ee9582abf982570b201298e', '57027c3685ed14d169d91cd18bf69111', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 150.00, 160.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('76de2a8076ab58c4335262845273ba07', 'baa661154ee9582abf982570b201298e', '8928bf5b39041d058b33a732c4deb350', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 240.00, 245.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('7af8fe65b6922ea03368c7403b8c69e7', 'fb85aee11e7190e586d2422f24a604e6', '83d548b152a44995e5a4d878d73428a0', '208e489af92d56a877e47e5db1760a97', 1, 63.00, 68.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('7b6fca793e5f82d27440da063d054e6d', 'baa661154ee9582abf982570b201298e', '1e9094269a9a451422cb769c6d80b91b', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 150.00, 153.00, 0.00, 3.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('7ce274b679ca6953e8dbb570994630fe', 'baa661154ee9582abf982570b201298e', 'd3244a3c483d5da20e6e66e0b1cbef7f', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 240.00, 245.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('805fb35d86a02ef839203906695ccd52', 'baa661154ee9582abf982570b201298e', '5643da897b1e06c7b2ddff5a322dc876', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 125.00, 130.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8091caf0a2ba993777ac14970ff40b76', 'd583ed2bf0381b082922ec1b7f6abf70', '26ea82cba4e0cfa6892a0e3c7fe35b15', '961d26ccde1ec19757a2869481fa9c7d', 1, 135.00, 140.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('80ddc1de5d0922e99558284569c9d8ef', 'baa661154ee9582abf982570b201298e', '9567ed170208b7d3cbefa1fc53b7363f', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 160.00, 165.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('8346fdaef2731922696da0a64af01c90', 'd583ed2bf0381b082922ec1b7f6abf70', '1cf900409b444cb2463df367bb3fd99c', '961d26ccde1ec19757a2869481fa9c7d', 1, 120.00, 125.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('85b21609b9676ccdb631d5740802d094', 'fb85aee11e7190e586d2422f24a604e6', '1b452a24794ecabd0b0298df04ac6b7e', '208e489af92d56a877e47e5db1760a97', 1, 62.00, 73.00, 0.00, 11.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('888001054e3cffbc7413fe9c5e58dca2', 'd583ed2bf0381b082922ec1b7f6abf70', '42cc855e60df2aaa57837a36f2c2e876', '961d26ccde1ec19757a2869481fa9c7d', 0, 50.00, 55.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('89947abfb006f51afcbc1a13fac121d4', 'baa661154ee9582abf982570b201298e', '3aabab50c5d9f46bd32db95d7fe4bbba', '2d5a06d564dc87d865db2a502c7fe43b', 1, 25.00, 30.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('91d52959fdfc94de471de7fe628b5ff9', '1be3842ece0b6fbab575bc32ea7737f5', '714ad6bfe88321790732292aae8dcf80', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 110.00, 117.00, 0.00, 7.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('94fe8098a08b9e2aff6f56d6b470529e', 'd583ed2bf0381b082922ec1b7f6abf70', '947ec16945a586c4d318ce817985ed52', '961d26ccde1ec19757a2869481fa9c7d', 1, 60.00, 65.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9537776e9cf854a28873029fb17d7f38', 'fb85aee11e7190e586d2422f24a604e6', '6bdb33b0ea397a2fd64f9e380526366c', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 48.00, 50.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9884d18f2e6c4893ae2458ad4d2d2d2e', 'fb85aee11e7190e586d2422f24a604e6', 'c2ca56faa87067619d5417f56c6e1d4d', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 18.50, 20.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('993fa95dd92b72e96a8487662ebb0dec', '1be3842ece0b6fbab575bc32ea7737f5', '33b678e54aa9d52369452ee5719e4142', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 145.00, 150.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9bf249c03a5419b329403fd1d6e953b0', 'd583ed2bf0381b082922ec1b7f6abf70', 'fbc7021c7734194ad2e10a4a9cd32314', '37f1413b88d8f7adb0790c326b6f84b3', 1, 795.00, 800.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('9eedee565d65ddf18381ad09e942e7a5', 'baa661154ee9582abf982570b201298e', 'ee8aaf2166747dcf1a3cf93287e94010', 'b14d265b293dd0e7e24df1c4513f7e11', 125, 180.00, 225.00, 6.08, 45.00, 70.00, 2.50, '1969-12-31', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-04 05:02:56', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a64fcb70ad86527400b411c53bebdf36', 'baa661154ee9582abf982570b201298e', '5f8df025fe3c156d9ba20ec3d87ddb6d', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 136.00, 140.00, 0.00, 4.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a7b001b6a52cf70ae3173db9c16d9ea6', 'baa661154ee9582abf982570b201298e', 'aadaf2a8d94910303379f27062699c87', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 140.00, 145.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a7e87a89acd5cda116bd1074c464f023', 'd583ed2bf0381b082922ec1b7f6abf70', '22687cc4300d5ed56df6453ab930d44c', '9daf33f726a1a305ad86d9dc467d3e33', 0, 20.00, 25.00, 10.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('a9699285fb77dc60588e29e9cb842e5b', 'baa661154ee9582abf982570b201298e', 'd30da45f5933bf9e7082c58964ef8d48', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 138.00, 140.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('aeb81824e1fd00f4c7d5a73ec7d9b73b', '1be3842ece0b6fbab575bc32ea7737f5', '8fd0c3ba6c8b0e7280855a9bc4289f43', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 180.00, 190.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b0b8495df420874d99d23e187171b759', 'baa661154ee9582abf982570b201298e', '9fc21aa42ea2042018f2f6bcdf4b95e3', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 137.00, 140.00, 0.00, 3.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b20eace895d79d4ca2da5c0c8ea907b6', 'd583ed2bf0381b082922ec1b7f6abf70', '49315777eca0ab4fb7d6a46951e40d62', '434bc1ec37deb904edae7942b10cc350', 1, 10.00, 12.00, 0.00, 2.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('b321575f90e96e8753ef9ef790432220', 'baa661154ee9582abf982570b201298e', '8c756ab7b931e89d81375fc56de44e9f', 'b14d265b293dd0e7e24df1c4513f7e11', 123, 180.00, 225.00, 6.08, 45.00, 0.00, 1.00, '1969-12-31', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c0408bcadaf025d7a52a41e9cfe3cfcd', 'fb85aee11e7190e586d2422f24a604e6', 'd7578c13b1ac91dc2d1379821f9e4fb1', '208e489af92d56a877e47e5db1760a97', 1, 69.00, 74.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c0cf452851fb758d3554be4524fda6fb', 'baa661154ee9582abf982570b201298e', 'a256a3033fef93cacec736a30c40eda1', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 240.00, 245.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c50979c6e7833605e4fc75af28bfe188', 'fb85aee11e7190e586d2422f24a604e6', 'f39504e1768f6205c43f135a0e9e8b55', '208e489af92d56a877e47e5db1760a97', 1, 57.00, 60.00, 0.00, 3.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('c9cf7d2f39121486237f3f25e90a2ef6', 'fb85aee11e7190e586d2422f24a604e6', 'e42b5938a9f505fc3733d5d1f4d86b75', '208e489af92d56a877e47e5db1760a97', 1, 69.00, 74.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('cd374850256ff25dc8320f898d43570c', 'baa661154ee9582abf982570b201298e', '865b72ef81b656273c686d1443ffd707', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 390.00, 400.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d2453d08dae088069275472a6557997a', 'd583ed2bf0381b082922ec1b7f6abf70', '5014cb4d03f2e3e1fb1cc726f9116f3e', '961d26ccde1ec19757a2869481fa9c7d', 1, 40.00, 45.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('d7629a2ee1844a500391f7f42b3a88fc', 'baa661154ee9582abf982570b201298e', '4be27f694c872972dce6813f3d30498a', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 130.00, 135.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('db4c0ec949b26817a13794b02d68a1c0', 'fb85aee11e7190e586d2422f24a604e6', '532cc0b3709ba52694d3694272370552', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 28.50, 30.00, 0.00, 1.50, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('dc03aa375cf1e45ecb0c7d306f9a4782', 'fb85aee11e7190e586d2422f24a604e6', '697feb8c33e404bbd02a693a44afbc2a', '961d26ccde1ec19757a2869481fa9c7d', 149, 160.00, 182.00, 2.27, 22.00, 0.00, 0.00, '2021-08-13', 'c4ca4238a0b923820dcc509a6f75849b', '2021-07-04 03:45:12', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-15 15:55:35', b'1'),
('e1ad1cc705002a643e51e8c2dcafe35f', 'baa661154ee9582abf982570b201298e', 'df9466b5ce80645800085a22eabe89c3', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 210.00, 215.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e46f48b360d88231427869ec1334c600', 'fb85aee11e7190e586d2422f24a604e6', '9969f7a5c6032acbfc8d6631b04b4941', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 18.50, 20.00, 0.00, 1.50, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('e79de15ca5975c44761f68bac68e8326', 'd583ed2bf0381b082922ec1b7f6abf70', 'c41d60c37e10f3e5bcf64e0852d23dc9', 'd940b157a75b8172b4ec6f6445975973', 1, 45.00, 50.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('ef4e6ea6d67463fc8a197e704740a8e4', 'd583ed2bf0381b082922ec1b7f6abf70', '13ac0d0c18fc0f835738709fee97782e', '961d26ccde1ec19757a2869481fa9c7d', 1, 115.00, 120.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f03b8d567a727a8df0348f659f45d836', 'fb85aee11e7190e586d2422f24a604e6', '9ba592041ff36687d2317fba8d844cb6', 'ae7623aaf5149513ab5bb76254a46ee5', 1, 28.50, 30.00, 0.00, 1.50, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f2cc7d818d594e7a9b46617ea6f34a23', 'd583ed2bf0381b082922ec1b7f6abf70', '9e4c3763be487aebfcfdd2a06e49d0d4', '961d26ccde1ec19757a2869481fa9c7d', 1, 135.00, 140.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f80c46543d38d9b3613e0b9aedff98a5', 'd583ed2bf0381b082922ec1b7f6abf70', '45bcfe730c60521abe678863d3733a9b', '961d26ccde1ec19757a2869481fa9c7d', 1, 130.00, 135.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('f96b593a455a4c4a60ba9dee64091f35', 'baa661154ee9582abf982570b201298e', '43eff83b2a44ee4789447fda61dc419e', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 390.00, 400.00, 0.00, 10.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fab79733c62878acdd2e07958ffa1092', 'baa661154ee9582abf982570b201298e', '64e042fd8ce9bda19a79877f1498b0f0', 'b14d265b293dd0e7e24df1c4513f7e11', 1, 218.00, 223.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fc5e9e862886a0cee5ce026f35304770', 'baa661154ee9582abf982570b201298e', '18c7e2e186a7691e15771292ed31f873', 'b14d265b293dd0e7e24df1c4513f7e11', 0, 160.00, 165.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('fef25c07910b45b44c0617e05c2fd480', 'd583ed2bf0381b082922ec1b7f6abf70', '6486d0d7302a353d25feb2a1d569c55f', '961d26ccde1ec19757a2869481fa9c7d', 1, 60.00, 65.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1'),
('ffc526fedc8bb5e123f147c4f9315ecb', 'd583ed2bf0381b082922ec1b7f6abf70', 'df3cbf191e1763939617de8d0ecce8cf', '961d26ccde1ec19757a2869481fa9c7d', 1, 45.00, 50.00, 0.00, 5.00, 0.00, 0.00, '2021-06-15', '6db9e08e4295925697af15059da4e995', '2021-07-04 03:45:12', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

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
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `libra` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `codigo_categoria`, `codigo_presentacion`, `codigo`, `producto`, `detalles`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`, `libra`) VALUES
('10be43288f53e7fdaeee916a8c4e1979', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-PKEN', 'FONTANA PECES', 'POR LIBRA', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:56', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'1'),
('13ac0d0c18fc0f835738709fee97782e', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VRGW', 'INDICADOR PLUS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('178cbb88fb31e407326b2706231e1040', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-BEIN', 'FINALIZADOR COMAYMA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('18c7e2e186a7691e15771292ed31f873', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-CPDZ', 'GRANILLO MOLSA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('18ea44856685650a6ab1bcd137345b37', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-DVRI', 'FORAFOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('1b452a24794ecabd0b0298df04ac6b7e', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-BXDT', '2 LITROS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('1cf900409b444cb2463df367bb3fd99c', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VTWF', 'ALBURET PH', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('1e9094269a9a451422cb769c6d80b91b', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-TLEA', 'TOROCAMPEON', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('2223c27380ed1e4b6929d135eae87e6f', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-QZBG', 'PRUEBA 2', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-26 05:17:52', '', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-25 23:17:52', b'0', b'0'),
('22687cc4300d5ed56df6453ab930d44c', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-FVHS', 'TERBUFOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('24c6d0e9cfd1ae282db6b16461fdc8e8', 'd583ed2bf0381b082922ec1b7f6abf70', '30c865844259683b92811bcfc143b9fb', 'PRS-OTUH', 'SUPERBAXONE', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('259d2cfbd5bebf466863ff03c801e676', 'd583ed2bf0381b082922ec1b7f6abf70', '8bcc3be85c541bddc24d0ceffa1e7a46', 'PRS-BYSV', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('26ea82cba4e0cfa6892a0e3c7fe35b15', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-YYHO', 'MAXIBOTS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('290cb70a001962b41ff9454b95fd7da4', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-ZATF', 'ZINC BORO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('2b22d6f43e0249ff61c65b6ed6239df0', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LZOI', '20-20-0 MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('2bee32cce13f96c15e7fb4da1dad90c0', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-ZNXW', 'GALLETA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('33b678e54aa9d52369452ee5719e4142', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-UISH', 'NUTRICAFE I MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('3aabab50c5d9f46bd32db95d7fe4bbba', 'baa661154ee9582abf982570b201298e', '2d5a06d564dc87d865db2a502c7fe43b', 'PRS-HDQY', 'CAFE MOLIDO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('42b1c20160989a4dbedc1d827f80b774', 'd583ed2bf0381b082922ec1b7f6abf70', '2d5a06d564dc87d865db2a502c7fe43b', 'PRS-EIPX', 'FOLIDOL', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('42cc855e60df2aaa57837a36f2c2e876', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-XMOP', 'ROOT OUT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('43eff83b2a44ee4789447fda61dc419e', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-CVPT', 'RUFO CACHORO', 'SE VENDE POR LIBRA ANOTACION', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:03:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'1'),
('45bcfe730c60521abe678863d3733a9b', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-DPZV', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('480659e80ee97adaac165fb65a432d7d', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-LKUG', 'PANTEX', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('49315777eca0ab4fb7d6a46951e40d62', 'd583ed2bf0381b082922ec1b7f6abf70', '434bc1ec37deb904edae7942b10cc350', 'PRS-RCOP', 'RATICIDA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('4b470473bfbf923934ad9e430545b7c2', 'd583ed2bf0381b082922ec1b7f6abf70', '51f6fa532022193ae53f4ab49e994f76', 'PRS-AFEX', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('4be27f694c872972dce6813f3d30498a', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-MPND', 'ECONOGANADO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('4f00419eb1e2b886a733526c76e33e47', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-MZSC', 'MAIZ AMARILLO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('4f98b17bbf97aa87bb3fe3e146be9525', 'fb85aee11e7190e586d2422f24a604e6', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-AODC', 'PRUEBA 3', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-26 05:17:40', '', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-25 23:17:40', b'0', b'0'),
('5014cb4d03f2e3e1fb1cc726f9116f3e', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-YUOZ', 'QUEMAXONE', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('532cc0b3709ba52694d3694272370552', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-AMXS', 'FRUTA FRESCA 20z', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('5643da897b1e06c7b2ddff5a322dc876', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-CTYX', 'MASECA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('57027c3685ed14d169d91cd18bf69111', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-BIBW', 'MAIZ BLANCO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('586bf50773ddb0e8027684037f747821', 'd583ed2bf0381b082922ec1b7f6abf70', '434bc1ec37deb904edae7942b10cc350', 'PRS-UCQS', 'MAGNUM', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('5e36c5dac6a16841ce52ffc66ba989cc', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-QILX', 'CINTA AZUL LECHERA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('5f8df025fe3c156d9ba20ec3d87ddb6d', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-TTXC', 'AFRECO MOLSA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('60519158503c2540c9b2f8800d7fb0dc', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-PHID', 'ALBULET ADERENTE', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('63471534d1cf922d62716dccc76ea1cb', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-ATSI', 'AQUA 20z', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('636fb605e9a62683e281bd3b73e16fd8', 'fb85aee11e7190e586d2422f24a604e6', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-ECAY', 'PRUEBA 3', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-26 05:16:29', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('6486d0d7302a353d25feb2a1d569c55f', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-KBTD', 'YARAVITA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('64e042fd8ce9bda19a79877f1498b0f0', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-OMOJ', 'DESARROLLO COMAYMA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('697feb8c33e404bbd02a693a44afbc2a', 'fb85aee11e7190e586d2422f24a604e6', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-IUCU', 'PRUEBA 1', 'Esto es una prueba', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-15 15:55:35', b'1', b'0'),
('6bdb33b0ea397a2fd64f9e380526366c', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-JJUM', 'AMP LATA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('6fe4b69479dfa8c6c3b56da53059d8bb', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-ZQNM', 'VITACERDO 2 ALIANZA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('714ad6bfe88321790732292aae8dcf80', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-XKGF', '12-05 FISICO MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('746b462c6dfcc3ac54177e879c14d779', 'd583ed2bf0381b082922ec1b7f6abf70', '434bc1ec37deb904edae7942b10cc350', 'PRS-EQTG', 'SEVIN', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('83d548b152a44995e5a4d878d73428a0', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-HTGR', '2.5 LITROS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('847489c618fa6195792631e575f003a0', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VULJ', 'SULFATO MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('865b72ef81b656273c686d1443ffd707', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LMDC', 'RUFO ADULTO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('88e004d005e0d3abc77fefe03422bc3c', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-PWZN', 'TAREA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('8928bf5b39041d058b33a732c4deb350', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-XKVD', 'VITAENGORDE FINALIZADOR', 'ESTE PRODUCTO SE VENDE POR DIFERENTES PRESENTACIONES', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('89b24d6796aa0be4a10858d5ec32e9c6', 'd583ed2bf0381b082922ec1b7f6abf70', '30c865844259683b92811bcfc143b9fb', 'PRS-GHPA', 'RANNDUP', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('8be20f4f18f92c2dda918ef4daa95ea8', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VBWF', 'GRAMOXONE', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('8c756ab7b931e89d81375fc56de44e9f', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-OKPH', 'IEMO', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-30 03:14:15', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('8fd0c3ba6c8b0e7280855a9bc4289f43', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VQLL', 'NITROEXTEND DISAGRO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('947ec16945a586c4d318ce817985ed52', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-ZVOE', 'BAYFOLAN', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('9567ed170208b7d3cbefa1fc53b7363f', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LEEQ', 'MAIZ MOLIDO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('9969f7a5c6032acbfc8d6631b04b4941', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-ESBU', 'SQUIZ 20z', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('9ba592041ff36687d2317fba8d844cb6', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-SODN', 'PEPSITA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('9e4c3763be487aebfcfdd2a06e49d0d4', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VTQK', 'ATADURA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('9fc21aa42ea2042018f2f6bcdf4b95e3', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RPUR', 'AFRECHO SALVAVIDA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('a256a3033fef93cacec736a30c40eda1', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LXGH', 'VITAENGORDE INICIO', 'POLLO\r\n', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('aadaf2a8d94910303379f27062699c87', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RGCT', 'MAIZ ARINA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('b2c1e320c81b54537a6270488e335e1c', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-LPVP', 'PALMISTE', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('b7e67b42b99762b090e84396e6145925', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-MZPQ', 'MAS CAFE NORDIC', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('bf7c4675664fb4ee730b91aaabbceda4', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-RLFJ', '1 1/4 LITRO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('c2ca56faa87067619d5417f56c6e1d4d', 'fb85aee11e7190e586d2422f24a604e6', 'ae7623aaf5149513ab5bb76254a46ee5', 'PRS-TGTM', 'RIQUITA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('c41d60c37e10f3e5bcf64e0852d23dc9', 'd583ed2bf0381b082922ec1b7f6abf70', 'd940b157a75b8172b4ec6f6445975973', 'PRS-QSMD', 'TRATAMAX', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('c8f0350bed2deca10801716973e4e028', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-VHIV', 'FOLIRAX', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('d0737b572e4c38aaaa4893a5b3c382dd', '1be3842ece0b6fbab575bc32ea7737f5', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-IXAM', 'UREA MAYAFERT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('d30da45f5933bf9e7082c58964ef8d48', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VPGW', 'ECONOLACTANO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('d3244a3c483d5da20e6e66e0b1cbef7f', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-QQYQ', 'VITAENGORDE INICIO', 'ESTE CONCENTRADO SE VENDE POR LIBRA, EL PRECIO DE VENTA VA A SER DIFERENTE EN LAS VENTAS\r\n', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:03:28', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'1'),
('d39f6f732213aba7d154ac474825117c', 'd583ed2bf0381b082922ec1b7f6abf70', 'd940b157a75b8172b4ec6f6445975973', 'PRS-QOAP', 'ATRAPA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('d7578c13b1ac91dc2d1379821f9e4fb1', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-QEKI', 'JUMBOS', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('d790c752a86e78d4bcb44715eb91ffa2', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-IFIF', 'ALIENGORDE I', 'TODOS LOS PRODUCTOS DE CONCENTRADOS SE VENDER POR DIFERENTES PRESENTACIONES', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('dacdfd4ba951a1da7686a617cc707de5', 'd583ed2bf0381b082922ec1b7f6abf70', '30c865844259683b92811bcfc143b9fb', 'PRS-WYSW', 'ROOT OUT', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('df3cbf191e1763939617de8d0ecce8cf', 'd583ed2bf0381b082922ec1b7f6abf70', '961d26ccde1ec19757a2869481fa9c7d', 'PRS-XOMO', 'RANNDUP', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('df9466b5ce80645800085a22eabe89c3', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-YCPN', 'VITACERDO 3 ALIANZA', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('e09bdd2d816850a5b676eeeab402ec51', 'd583ed2bf0381b082922ec1b7f6abf70', '9daf33f726a1a305ad86d9dc467d3e33', 'PRS-XVRZ', 'BORDOCOP', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('e42b5938a9f505fc3733d5d1f4d86b75', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-KNUK', 'PRB', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('ec6d2557a790bf623c2b9c32e0291a62', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RPFK', 'VITALECHERO #18', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('ee8aaf2166747dcf1a3cf93287e94010', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-RKKF', 'IEMO1', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-30 03:18:25', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('f39504e1768f6205c43f135a0e9e8b55', 'fb85aee11e7190e586d2422f24a604e6', '208e489af92d56a877e47e5db1760a97', 'PRS-OULS', 'PEQUEÑAS VIDRIO', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('fade477ea3625ecfd5ef2e7ba46fed65', 'baa661154ee9582abf982570b201298e', 'b14d265b293dd0e7e24df1c4513f7e11', 'PRS-VEDF', 'PRUEBA 4', '', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-27 04:04:49', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0'),
('fbc7021c7734194ad2e10a4a9cd32314', 'd583ed2bf0381b082922ec1b7f6abf70', '37f1413b88d8f7adb0790c326b6f84b3', 'PRS-ZONE', 'RANNDUP', '', '6db9e08e4295925697af15059da4e995', '2021-06-26 03:02:50', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1', b'0');

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

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codigo_proveedor`, `nombre`, `telefono`, `u_registro`, `f_registro`, `u_actualizacion`, `f_actualizacion`, `u_eliminacion`, `f_eliminacion`, `estado`) VALUES
('4ae1e09b7c823c118db14d70f9050a66', 'Isaac Martinez', '45093255', 'c4ca4238a0b923820dcc509a6f75849b', '2021-06-16 15:36:11', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', b'1');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_funcion`
--

CREATE TABLE `sub_funcion` (
  `codigo_sub` varchar(50) NOT NULL,
  `codigo_funcion` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sub_funcion`
--

INSERT INTO `sub_funcion` (`codigo_sub`, `codigo_funcion`, `sub`, `icono`, `link`, `orden`, `estado`) VALUES
('29661859df9d2b3c41cd5fc53f48caae', '693368373acc72527633fb9d1f3718cc', 'Categorias', 'plus', 'Products/category', 3, b'1'),
('2e03deda0e451ebabd6cd279a5847bce', '830cb979a446c0eed165df0e62e72898', 'Nueva venta', 'edit', 'Sales/Sales', 1, b'1'),
('5e2513f435c88c1739da248a6190da18', 'b7e5cc3ba1cbc61e6bcf5601b4f4b7e3', 'Presentacion', 'weight', 'Settings/Presentation', 1, b'1'),
('6759a380b7e31356e6d768a8463c2990', '830cb979a446c0eed165df0e62e72898', 'Listado de ventas', 'edit', 'Sales/Sales_L', 2, b'1'),
('7cb68c36e943ea408f91049a78daf940', '5d232f281a6276504840ac11313bc537', 'Registro de usuarios', 'user-plus', 'Users/New_user', 1, b'1'),
('8fc10cf5af4584f95d8c14ec743d832f', '693368373acc72527633fb9d1f3718cc', 'Registro de Productos', 'edit', 'Products/new_products', 1, b'1'),
('9c5bf95e1843ace6b8ac2a54251bc882', '5d232f281a6276504840ac11313bc537', 'Listado de Usuarios', 'users', 'Users/List_user', 2, b'1'),
('ab193954b132b314e902159b96b75db0', 'b7e5cc3ba1cbc61e6bcf5601b4f4b7e3', 'Roles', 'briefcase', 'Settings/Roles', 2, b'1'),
('d0c8e59ec15a4455e71ab084b3c5cf23', '693368373acc72527633fb9d1f3718cc', 'Inventario', 'list-alt', 'Products/list_products', 2, b'1');

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
  ADD KEY `codigo_producto` (`codigo_producto`),
  ADD KEY `codigo_presentacion` (`codigo_presentacion`);

--
-- Indices de la tabla `corte`
--
ALTER TABLE `corte`
  ADD PRIMARY KEY (`codigo_corte`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`codigo_factura`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`codigo_funcion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codigo_inventario`),
  ADD KEY `codigo_categoria` (`codigo_categoria`),
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
-- Indices de la tabla `sub_funcion`
--
ALTER TABLE `sub_funcion`
  ADD PRIMARY KEY (`codigo_sub`),
  ADD KEY `codigo_funcion` (`codigo_funcion`);

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
