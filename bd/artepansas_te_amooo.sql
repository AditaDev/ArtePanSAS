DROP DATABASE IF EXISTS artepansas;
CREATE DATABASE artepansas;
USE artepansas;
--
-- Base de datos: `artepansas`
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE `almuerzo` (
  `idalm` bigint(11) NOT NULL,
  `ppalm` varchar(100) DEFAULT NULL,
  `spalm` varchar(100) DEFAULT NULL,
  `jgalm` varchar(100) DEFAULT NULL,
  `fecalm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `almuerzo` (`idalm`, `ppalm`, `spalm`, `jgalm`, `fecalm`) VALUES
(1, 'Arroz con pollo', 'Arroz', 'Mora', '2024-07-01'),
(2, 'Arroz con camarones', 'Pasta', 'Mora', '2024-07-01'),
(3, 'Arroz y lentejas', 'Mute', 'Mora', '2024-07-01'),
(4, 'Arroz, pollo y ensalada', 'Crema de pollo', 'Mora', '2024-07-01'),
(5, 'Arroz y pasta', 'Arroz', 'Verduras', '2024-07-01'),
(6, 'Arroz y carne', 'Arroz', 'Avena', '2024-07-01');


CREATE TABLE `pedido` (
    `idalm` bigint(11) NOT NULL,
    `idper` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pedido` (`idalm`, `idper`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6');


CREATE TABLE `producto` (
    `idpro` bigint(11) NOT NULL,
    `nompro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `producto` (`idpro`, `nompro`) VALUES
(1, 'Lentejas'),
(2, 'Pasta'),
(3, 'Arroz'),
(4, '4'),
(5, '5'),
(6, '6');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `iddom` bigint(11) NOT NULL,
  `nomdom` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`iddom`, `nomdom`) VALUES
(1, 'Forma de pago'),
(2, 'Tipo de factura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idemp` bigint(11) NOT NULL,
  `nitemp` bigint(11) DEFAULT NULL,
  `razsoem` varchar(100) DEFAULT NULL,
  `actemp` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `empresa` (`idemp`, `nitemp`, `razsoem`, `actemp`) VALUES
(1, '12345698', 'Cartones America', 1),
(2, '98756485', 'Tracto Carga', 1),
(3, '78516362', 'Palnorte', 1),
(4, '95463198', 'Cimpa', 1),
(5, '84521098', 'Quimerco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfac` bigint(11) NOT NULL,
  `nofac` bigint(11) NOT NULL,
  `fifac` datetime NOT NULL,
  `confac` varchar(100) NOT NULL,
  `fffac` datetime NOT NULL,
  `idemp` bigint(11) DEFAULT NULL,
  `estfac` int(4) DEFAULT NULL,
  `fefac` date NOT NULL,
  `fvfac` date NOT NULL,
  `forpag` varchar(100) NOT NULL,
  `tipfac` varchar(100) NOT NULL,
  `idper` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `factura` (`idfac`, `nofac`, `fifac`,`fffac`, `confac`, `idemp`, `estfac`, `fefac`, `fvfac`, `tipfac`, `idper`, `forpag`) VALUES
(1, '123456', '2024-05-01', '2024-06-01',  '2000 kl de sodio', 1, 1, '2024-08-01', '2024-09-01','Dotación', 1, '2 Días'),
(2, '987564', '2024-05-02', '2024-06-02',  '2000 kl de potacsio', 2, 2, '2024-08-01', '2024-09-01','Papelería', 2, '8 Días'),
(3, '785163', '2024-05-03', '2024-06-03',  '2000 kl de aguacate', 3, 3, '2024-08-01', '2024-09-01','Importación', 3, '10 Días'),
(4, '954631', '2024-05-04', '2024-06-04',  '2000 kl de plata', 4, 4, '2024-08-01', '2024-09-01','Mercado', 4, '20 Días'),
(5, '845210', '2024-05-05', '2024-06-05',  '2000 kl de azucar', 4, 2, '2024-08-01', '2024-09-01','Servicios', 3, '60 Días');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmod` int(5) NOT NULL,
  `nommod` varchar(100) NOT NULL,
  `imgmod` varchar(255) DEFAULT NULL,
  `actmod` tinyint(1) NOT NULL DEFAULT 1,
  `idpag` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmod`, `nommod`, `imgmod`, `actmod`, `idpag`) VALUES
(1, 'Facturas', 'img/mod_facturas.png', 1, 60),
(2, 'Configuración', 'img/mod_configuracion.png', 1, 101),
(3, 'Almuerzos', 'img/mod_almuerzos.png', 1, 61),
(4, 'Novedades', 'img/mod_configuracion.png', 1, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idpag` bigint(11) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `nompag` varchar(25) NOT NULL,
  `arcpag` varchar(100) NOT NULL,
  `ordpag` int(3) NOT NULL,
  `menpag` varchar(30) NOT NULL,
  `mospag` tinyint(1) DEFAULT NULL,
  `idmod` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idpag`, `icono`, `nompag`, `arcpag`, `ordpag`, `menpag`, `mospag`, `idmod`) VALUES
(60, 'fa fa-solid fa-file-invoice-dollar', 'Facturas', 'views/vfac.php', 12, 'home.php', 1, 1),
(61, 'fa-solid fa-bacon', 'Almuerzos', 'views/valm.php', 13, 'home.php', 1, 3),
(62, 'fa fa-solid fa-file-invoice-dollar', 'Pedidos', 'views/vped.php', 14, 'home.php', 1, 3),
(63, 'fa fa-solid fa-duotone fa-wallet', 'Facturas por revisar', 'views/vfacpr.php', 15, 'home.php', 1, 1),
(101, 'fa fa-solid fa-cubes', 'Módulos', 'views/vmod.php', 1, 'home.php', 1, 2),
(102, 'fa fa-regular fa-file', 'Paginas', 'views/vpag.php', 2, 'home.php', 1, 2),
(103, 'fa fa-solid fa-user', 'PagxPef', 'views/vpgxf.php', 3, 'home.php', 2, 2),
(104, 'fa fa-solid fa-address-card', 'Perfil', 'views/vpef.php', 4, 'home.php', 1, 2),
(105, 'fa fa-solid fa-user', 'PerxPef', 'views/vperxf.php', 5, 'home.php', 2, 2),
(106, 'fa fa-solid fa-user', 'Personas', 'views/vper.php', 6, 'home.php', 1, 2),
(107, 'fa fa-solid fa-boxes-stacked', 'Dominio', 'views/vdom.php', 7, 'home.php', 1, 2),
(108, 'fa fa-solid fa-dollar-sign', 'Valor', 'views/vval.php', 8, 'home.php', 1, 2),
(109, 'fa fa-solid fa-building', 'Empresas', 'views/vemp.php', 11, 'home.php', 1, 1),
(110, 'fa fa-solid fa-solid fa-lightbulb', 'Novedades', 'views/vnov.php', 16, 'home.php', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagxpef`
--

CREATE TABLE `pagxpef` (
  `idpag` bigint(11) NOT NULL,
  `idpef` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagxpef`
--

INSERT INTO `pagxpef` (`idpag`, `idpef`) VALUES
(109, 4),
(60, 4),
(61, 6),
(62, 5),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(62, 1),
(61, 1),
(62, 6),
(108, 1),
(63, 1),
(63,2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idpef` bigint(11) NOT NULL,
  `nompef` varchar(100) NOT NULL,
  `idmod` int(5) NOT NULL,
  `idpag` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idpef`, `nompef`, `idmod`, `idpag`) VALUES
(1, 'SuperAdmin', 2, 101),
(2, 'Control interno', 1, 63),
(3, 'Gerencia', 1, 63),
(4, 'Contabilidad', 1, 60),
(5, 'Colaborador', 3, 62),
(6, 'Servicios generales', 3, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idper` bigint(11) NOT NULL,
  `nomper` varchar(100) NOT NULL,
  `pasper` text DEFAULT NULL,
  `emaper` varchar(255) NOT NULL,
  `telper` varchar(10) DEFAULT NULL,
  `apeper` varchar(50) NOT NULL,
  `ndper` varchar(12) NOT NULL,
  `actper` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idper`, `nomper`, `pasper`, `emaper`, `telper`, `apeper`, `ndper`, `actper`) VALUES
(1, 'Ada', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'ada@artepan.com', '3215646857', 'Rodriguez', '1071328321', 1),
(2, 'Nico', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'nico@artepan.com', '3215456998', 'Rodriguez', '1072749321', 1),
(3, 'Amy', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'amy@artepan.com', '3021845120', 'Gavilan', '1004985502', 1),
(4, 'Andrea', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'ada2@artepan.com', '3112132208', 'Casas', '1076655342', 1),
(5, 'Luisa', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'nico2@artepan.com', '3215495204', 'Jiménez', '1078944563', 1),
(6, 'Lucas', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'amy2@artepan.com', '3223548793', 'Mora', '1077954332', 1),
(7, 'Prueba', 'b37276a94dfc2d512045932d36c8df69b8c2c729sGlaqs2%', 'prueba@artepan.com', '322894463', 'Prueba', '1077954332', 1);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perxpef`
--

CREATE TABLE `perxpef` (
  `idper` bigint(11) NOT NULL,
  `idpef` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perxpef`
--

INSERT INTO `perxpef` (`idper`, `idpef`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(1, 4),
(1, 6),
(1, 3);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `idval` bigint(11) NOT NULL,
  `nomval` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `iddom` bigint(11) DEFAULT NULL,
  `codval` bigint(11) DEFAULT NULL,
  `actval` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`idval`, `nomval`, `iddom`, `codval`, `actval`) VALUES
(1, '2 Días', 1, 101, 1),
(2, '3 Días', 1, 102, 1),
(3, '5 Días', 1, 103, 1),
(4, '8 Días', 1, 104, 1),
(5, '10 Días', 1, 105, 1),
(6, '15 Días', 1, 106, 1),
(7, '20 Días', 1, 107, 1),
(8, '28 Días', 1, 108, 1),
(9, '30 Días', 1, 109, 1),
(10, '45 Días', 1, 110, 1),
(11, '60 Días', 1, 111, 1),
(12, '70 Días', 1, 112, 1),
(13, 'Contado-Crédito', 1, 113, 1),
(14, 'Materia prima', 2, 114, 1),
(15, 'Insumo', 2, 115, 1),
(16, 'Transporte', 2, 116, 1),
(17, 'Cartón', 2, 117, 1),
(18, 'Cuenta de cobro', 2, 118, 1),
(19, 'Servicio', 2, 119, 1),
(20, 'Exportación', 2, 120, 1),
(21, 'Mantenimiento', 2, 121, 1),
(22, 'Dotación', 2, 122, 1),
(23, 'Papelería', 2, 123, 1),
(24, 'Mercado', 2, 124, 1);

--
-- Índices para tablas volcadas
--
ALTER TABLE `pedido`
  ADD KEY `idper` (`idper`),
  ADD KEY `idalm` (`idalm`);
--
-- Indices de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  ADD PRIMARY KEY (`idalm`);

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`iddom`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idemp`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfac`),
  ADD KEY `factura_ibfk_1` (`idemp`),
  ADD KEY `persona_ibfk_1` (`idper`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmod`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idpag`),
  ADD KEY `idmod` (`idmod`);

--
-- Indices de la tabla `pagxpef`
--
ALTER TABLE `pagxpef`
  ADD KEY `idpag` (`idpag`),
  ADD KEY `idpef` (`idpef`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idpef`),
  ADD KEY `idmod` (`idmod`),
  ADD KEY `idpag` (`idpag`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idper`);

--
-- Indices de la tabla `perxpef`
--
ALTER TABLE `perxpef`
  ADD KEY `idper` (`idper`),
  ADD KEY `idpef` (`idpef`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`idval`),
  ADD KEY `fk_valxdom` (`iddom`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `iddom` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idpag` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idpef` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idper` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `idval` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idalm`) REFERENCES `almuerzo` (`idalm`);
--
-- Filtros para la tabla `almuerzo`
--

-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idemp`) REFERENCES `empresa` (`idemp`),
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `persona` (`idper`);

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`idmod`) REFERENCES `modulo` (`idmod`);

--
-- Filtros para la tabla `pagxpef`
--
ALTER TABLE `pagxpef`
  ADD CONSTRAINT `pagxpef_ibfk_1` FOREIGN KEY (`idpag`) REFERENCES `pagina` (`idpag`),
  ADD CONSTRAINT `pagxpef_ibfk_2` FOREIGN KEY (`idpef`) REFERENCES `perfil` (`idpef`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`idmod`) REFERENCES `modulo` (`idmod`);

--
-- Filtros para la tabla `perxpef`
--
ALTER TABLE `perxpef`
  ADD CONSTRAINT `perxpef_ibfk_1` FOREIGN KEY (`idpef`) REFERENCES `perfil` (`idpef`),
  ADD CONSTRAINT `perxpef_ibfk_2` FOREIGN KEY (`idper`) REFERENCES `persona` (`idper`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `valor_ibfk_1` FOREIGN KEY (`iddom`) REFERENCES `dominio` (`iddom`);
