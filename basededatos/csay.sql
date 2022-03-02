-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-06-2021 a las 11:57:43
-- Versión del servidor: 10.3.29-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `promay20_csay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contraseña` varchar(8) NOT NULL,
  `id_tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nombre_cat` varchar(80) NOT NULL,
  `imagen_cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_cat`, `imagen_cat`) VALUES
(1, 'Camisas     ', '../img/img_categorias/camisa.png'),
(2, 'Pantalones ', '../img/img_categorias/pantalones.png'),
(3, 'Sudaderas ', '../img/img_categorias/sudadera.png'),
(4, 'Tenis ', '../img/img_categorias/shoes.png'),
(5, 'Zapatos ', '../img/img_categorias/shoe.png'),
(6, 'Relojes ', '../img/img_categorias/reloj.png'),
(7, 'Gafas ', '../img/img_categorias/gafas.png'),
(8, 'Cinturones ', '../img/img_categorias/cinturon.png'),
(11, 'Gorras', '../img/img_categorias/gorra-de-beisbol.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(10) NOT NULL,
  `calle` varchar(120) NOT NULL,
  `num_casa` int(10) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `calle`, `num_casa`, `colonia`, `municipio`, `estado`, `codigo_postal`, `id_usuario`) VALUES
(1, 'MIguel Aleman', 34, 'Centro', 'Orizaba', 'VER', 6789, 10),
(4, 'MIguel Aleman', 45, 'Reforma', 'Rio Blanco', 'Veracruz', 94760, 9),
(5, 'Priv. Enrique Flores', 23, 'El Espinal', 'Orizaba', 'Colima', 12345, 2),
(6, 'Av. Miguel Castillo', 77, 'Gardenias', 'Orizaba', 'Veracruz', 44356, 2),
(7, 'Lomas azules', 45, 'El Espinal', 'Orizaba', 'Veracruz', 97970, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) NOT NULL,
  `id_venta` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` int(20) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(2, 2, 8, 1, 400, 400),
(3, 2, 9, 1, 344, 344),
(4, 3, 12, 1, 345, 345),
(5, 4, 13, 2, 345, 690),
(6, 5, 12, 1, 345, 345),
(7, 7, 9, 2, 344, 688),
(8, 8, 9, 3, 344, 1032),
(9, 8, 14, 2, 200, 400),
(10, 9, 9, 3, 344, 1032),
(11, 9, 14, 2, 200, 400),
(12, 10, 9, 3, 344, 1032),
(13, 11, 15, 2, 1233, 2466),
(14, 12, 15, 100, 1233, 123300),
(15, 13, 9, 1, 344, 344),
(16, 14, 13, 1, 345, 345),
(17, 15, 14, 3, 200, 600),
(18, 16, 10, 3, 400, 1200),
(19, 17, 14, 3, 200, 600),
(20, 18, 10, 3, 400, 1200),
(21, 19, 10, 1, 400, 400),
(22, 19, 11, 1, 500, 500),
(23, 19, 14, 1, 200, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `modelo` varchar(80) NOT NULL,
  `precio` float NOT NULL,
  `cantidad_existente` int(10) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_tallas` int(10) NOT NULL,
  `promo` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `modelo`, `precio`, `cantidad_existente`, `imagen`, `id_categoria`, `id_tallas`, `promo`) VALUES
(8, 'Pantalón Mezclilla Negro ', 'PMN01', 400, 50, '../img/img_productos/pantalonnegro.jpg', 2, 5, 'SI'),
(9, 'Reloj Pulsera Negro   ', 'RN01', 344, 29, '../img/img_productos/relojnegro.jpg', 6, 11, 'SI'),
(10, 'Camisa Nike', 'CNK4', 400, 27, '../img/img_productos/camiseta_nike.png', 1, 5, 'SI'),
(11, 'Tenis Adidas ', 'TNA01', 500, 11, '../img/img_productos/tenis_adidas.jpg', 4, 9, 'NO'),
(12, 'Sudadera Negra Francia   ', 'SNF01', 345, 45, '../img/img_productos/sudaderanegra.jpg', 3, 5, 'SI'),
(13, 'Gafas Oscuras', 'GFO01', 345, 19, '../img/img_productos/gafanegra.jpg', 7, 11, 'NO'),
(14, 'Gorra Yankees   ', 'GYNY01', 200, 5, '../img/img_productos/1257752-1.jpg', 11, 1, 'SI'),
(15, 'AGREGADO PRUEBA', 'PRUEBA', 1233, 0, '../img/img_productos/camisas.jpg', 8, 11, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id_tallas` int(10) NOT NULL,
  `tipo_talla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id_tallas`, `tipo_talla`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'G'),
(5, 'XG'),
(6, '25'),
(7, '26'),
(8, '27'),
(9, '28'),
(10, '29'),
(11, 'UNITALLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipo_usuario` int(10) NOT NULL,
  `tipo_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(8) NOT NULL,
  `id_tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `email`, `password`, `id_tipo_usuario`) VALUES
(1, 'Luis', 'luis05@gmail.com', '12345678', 2),
(2, 'Luis', 'richard777@gmail.com', '12345', 2),
(4, 'Mota', 'koke0mota@gmail.com', 'e10adc39', 2),
(5, 'Luis', 'luis111@gmail.com', 'fcea920f', 2),
(6, 'Luis', 'luisiano@hotmail.com', '1234567', 2),
(8, 'Admin', 'admin1@gmail.com', '12345678', 1),
(9, 'Ricardo', 'riv030700@hotmail.com', 'ri03ca07', 2),
(10, 'David', 'deividrocan2508@gmail.com', '12345678', 2),
(11, 'Lizzeth', 'noli1954@hotmail.com', 'noli1954', 2),
(12, 'Fernanda LÃ³pez ', 'fer.lopez@gmail.com', '123456', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `total` double NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_usuario`, `total`, `fecha`) VALUES
(2, 1, 744, '2021-06-08'),
(3, 1, 345, '2021-06-08'),
(4, 1, 690, '2021-06-08'),
(5, 1, 345, '2021-06-08'),
(6, 1, 0, '2021-06-08'),
(7, 1, 688, '2021-06-09'),
(8, 1, 1432, '2021-06-09'),
(9, 1, 1432, '2021-06-09'),
(10, 10, 1032, '2021-06-09'),
(11, 10, 2466, '2021-06-09'),
(12, 9, 123300, '2021-06-09'),
(13, 9, 344, '2021-06-09'),
(14, 9, 345, '2021-06-09'),
(15, 10, 600, '2021-06-09'),
(16, 2, 1200, '2021-06-09'),
(17, 10, 600, '2021-06-09'),
(18, 9, 1200, '2021-06-09'),
(19, 9, 1100, '2021-06-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `FKAdministra424420` (`id_tipo_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `FKDireccion299172` (`id_usuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `FKProducto306052` (`id_categoria`),
  ADD KEY `FKProducto146767` (`id_tallas`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id_tallas`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FKUsuario518014` (`id_tipo_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_tallas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipo_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FKAdministra424420` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipousuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FKProducto146767` FOREIGN KEY (`id_tallas`) REFERENCES `tallas` (`id_tallas`),
  ADD CONSTRAINT `FKProducto306052` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FKUsuario518014` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipousuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
