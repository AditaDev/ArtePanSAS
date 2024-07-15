DROP DATABASE IF EXISTS artepansas;
CREATE DATABASE artepansas;
USE artepansas;
-- Base de datos: `artepansas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE `almuerzo` (
  `idalm` bigint(11) NOT NULL,
  `ppalm` varchar(70) NOT NULL,
  `spalm` varchar(70) NOT NULL,
  `jgalm` varchar(70) NOT NULL,
  `fecalm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almuerzo`
--
-- INSERT INTO `almuerzo` (`idalm`, `ppalm`, `spalm`, `jgalm`, `fecalm`) VALUES
-- (1, 'Arroz, lentejas y papa sudada', 'Arroz', 'Piña' , NULL),
-- (2, 'Arroz chino', 'Pasta', 'Mora', NULL),
-- (3, 'Arroz con pollo', 'Platano', 'Guanabana', NULL),
-- (4, 'Lasaña', 'Avena', 'Fresa',  NULL),
-- (5, 'Ajiaco', 'Verduras', 'Mango', NULL);


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
(2, 'Tipo de factura'),
(3, 'Tipo de plato'),
(4, 'Tipo de Novedad'),
(5, 'Area'),
(6, 'Estado de factura');


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

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idemp`, `nitemp`, `razsoem`, `actemp`) VALUES
(1, 12345698, 'Cartones America', 1),
(2, 98756485, 'Tracto Carga', 1),
(3, 78516362, 'Palnorte', 1),
(4, 95463198, 'Cimpa', 1),
(5, 84521098, 'Quimerco', 1),
(6, 4511255, 'te amo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfac` bigint(11) NOT NULL,
  `nofac` bigint(11) NOT NULL,
  `confac` varchar(100) NOT NULL,
  `idemp` bigint(11) DEFAULT NULL,
  `estfac` bigint(11) NOT NULL,
  `fefac` date NOT NULL,
  `fvfac` date NOT NULL,
  `forpag` bigint(11) NOT NULL,
  `tipfac` bigint(11) NOT NULL,
  `idpercre` bigint(11) NOT NULL,
  `fifac` datetime NOT NULL,
  `idperrev` bigint(11) DEFAULT NULL,
  `fprfac` datetime DEFAULT NULL,
  `idperapr` bigint(11) DEFAULT NULL,
  `faprfac` datetime DEFAULT NULL,
  `idperent` bigint(11) DEFAULT NULL, 
  `fffac` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `idnov` bigint(11) NOT NULL,
  `fecreg` date DEFAULT NULL,
  `fecinov` date DEFAULT NULL,
  `fecfnov` date DEFAULT NULL,
  `fecrev` date DEFAULT NULL,
  `tipnov` bigint(11) NOT NULL,
  `obsnov` varchar(100) NOT NULL,
  `estnov` varchar(100) NOT NULL,
  `idper` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`idnov`, `fecreg`, `fecinov`, `fecfnov`, `fecrev`, `tipnov`, `obsnov`, `estnov`, `idper`) VALUES
(1, '2024-07-01', '2024-08-01', '2024-09-01', '2024-07-01', 42, 'Se cancela todo', '1', 1),
(2, '2024-07-01', '2024-08-01', '2024-09-01', '2024-07-01', 38, 'Se cancela todo', '1', 2),
(3, '2024-07-01', '2024-08-01', '2024-09-01', '2024-07-01', 41, 'Se cancela todo', '1', 3),
(4, '2024-07-01', '2024-08-01', '2024-09-01', '2024-07-01', 36, 'Se cancela todo', '1', 4),
(5, '2024-07-01', '2024-08-01', '2024-09-01', '2024-07-01', 35, 'Se cancela todo', '1', 5),
(6, '2024-07-01', '2024-08-01', '2024-09-01', '2024-07-01', 39, 'Se cancela todo', '1', 6);

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
(63, 'fa fa-solid fa-duotone fa-wallet', 'Facturas por revisar', 'views/vfac.php', 15, 'home.php', 1, 1),
(64, 'fa fa-solid fa-cookie-bite', 'Producto', 'views/vpro.php', 17, 'home.php', 1, 3),
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
(64, 1),
(64, 6),
(110, 7),
(63, 2),
(63, 8),
(63, 9),
(63, 10),
(63, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idped` bigint(11) NOT NULL,
  `idalm` bigint(11) NOT NULL,
  `idper` bigint(11) NOT NULL,
  `fecped` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

-- INSERT INTO `pedido` (`idped`, `idalm`, `idper`, `fecped`) VALUES
-- (1, 1, 1,'2024-07-01'),
-- (2, 2, 2,'2024-07-01'),
-- (3, 3, 3,'2024-07-01'),
-- (4, 4, 4,'2024-07-01'),
-- (5, 5, 5,'2024-07-01');

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
(6, 'Servicios generales', 3, 61),
(7, 'Talento humano', 4, 110),
(8, 'Coordinador exportaciones', 1, 63),
(9, 'Mantenimiento', 1, 63),
(10, 'Coordinador logistica', 1, 63),
(11, 'Coordinador calidad', 1, 63);

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
  `actper` tinyint(1) DEFAULT 1,
  `area` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idper`, `nomper`, `pasper`, `emaper`, `telper`, `apeper`, `ndper`, `actper`, `area`) VALUES
(1, 'Ada', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ada@artepan.com', '3215646857', 'Rodriguez', '1071328321', 1, 45),
(2, 'Nico', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'nico@artepan.com', '3215456998', 'Rodriguez', '1072749321', 1, 46),
(3, 'Amy', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'amy@artepan.com', '3021845120', 'Gavilan', '1004985502', 1, 47),
(4, 'Andrea', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ada2@artepan.com', '3112132208', 'Casas', '1076655342', 1, 48),
(5, 'Luisa', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'nico2@artepan.com', '3215495204', 'Jiménez', '1078944563', 1, 49),
(6, 'Lucas', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'amy2@artepan.com', '3223548793', 'Mora', '1077954332', 1, 50),
(7, 'Prueba', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'prueba@artepan.com', '322894463', 'Prueba', '1077954332', 1, 48),
(8, 'Prueba1', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'prueba1@artepan.com', '322894463', 'Prueba1', '1077954332', 1, 49),
(9, 'Prueba2', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'prueba2@artepan.com', '322894463', 'Prueba2', '1077954332', 1, 49),
(10, 'Prueba3', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'prueba3@artepan.com', '322894463', 'Prueba3', '1077954332', 1, 49),
(11, 'Prueba4', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'prueba4@artepan.com', '322894463', 'Prueba4', '1077954332', 1, 49);

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
(1, 3),
(1, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idpro` bigint(11) NOT NULL,
  `nompro` varchar(100) NOT NULL,
  `idval` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idpro`, `nompro`, `idval`) VALUES
(1, 'Lentejas', 26),
(2, 'Pasta', 27),
(3, 'Arroz', 25),
(4, 'Pollo frito', 26),
(5, 'Carne sudada', 27),
(6, 'Pepinos', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proxalm`
--

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
(14, 'Materia prima', 2, 201, 1),
(15, 'Insumo', 2, 202, 1),
(16, 'Transporte', 2, 203, 1),
(17, 'Cartón', 2, 204, 1),
(18, 'Cuenta de cobro', 2, 205, 1),
(19, 'Servicio', 2, 206, 1),
(20, 'Exportación', 2, 207, 1),
(21, 'Mantenimiento', 2, 208, 1),
(22, 'Dotación', 2, 209, 1),
(23, 'Papelería', 2, 210, 1),
(24, 'Mercado', 2, 210, 1),
(25, 'Plato fuerte', 3, 301, 1),
(26, 'Sopa', 3, 302, 1),
(27, 'Jugo', 3, 303, 1),
(28, 'Ensalada', 3, 304, 1),
(29, 'Postre', 3, 305, 1),
(30, 'Calamidad familiar', 4, 401, 1),
(31, 'Llegada tarde', 4, 402, 1),
(32, 'Liquidación vacaciones', 4, 403, 1),
(33, 'Ausencia', 4, 404, 1),
(34, 'Ausencia injustificada', 4, 405, 1),
(35, 'Ingreso', 4, 406, 1),
(36, 'Retiro', 4, 407, 1),
(37, 'Permiso remunerado', 4, 408, 1),
(38, 'Permiso no remunerado', 4, 409, 1),
(39, 'Censantias', 4, 409, 1),
(40, 'Prestamos', 4, 410, 1),
(41, 'Licencias', 4, 411, 1),
(42, 'Incapacidad Arl', 4, 412, 1),
(43, 'Incapacidad Eps', 4, 413, 1),
(44, 'Por si falta alguna jiji', 4, 414, 1),
(45, 'Contabilidad', 5, 501, 1),
(46, 'Logistica', 5, 502, 1),
(47, 'Tesoreria', 5, 503, 1),
(48, 'Cartera', 5, 504, 1),
(49, 'Facturación', 5, 505, 1),
(50, 'Ventas', 5, 506, 1),
(51, 'Sin revisar', 6, 601, 1),
(52, 'Primera Revisión', 6, 602, 1),
(53, 'Revisada', 6, 603, 1),
(54, 'Entregada', 6, 604, 1);








--
-- Índices para tablas volcadas
--

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
  ADD KEY `idemp` (`idemp`),
  ADD KEY `tipfac` (`tipfac`),
  ADD KEY `forpag` (`forpag`),
  ADD KEY `estfac` (`estfac`),
  ADD KEY `idpercre` (`idpercre`),
  ADD KEY `idperrev` (`idperrev`),
  ADD KEY `idperapr` (`idperapr`), 
  ADD KEY `idperent` (`idperent`); 

--
-- Indices de la tabla `modulo`                                        
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmod`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`idnov`),
  ADD KEY `tipnov` (`tipnov`),
  ADD KEY `idper` (`idper`);

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
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD KEY `idalm` (`idalm`),
  ADD KEY `idper` (`idper`);

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
  ADD PRIMARY KEY (`idper`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `perxpef`
--
ALTER TABLE `perxpef`
  ADD KEY `idper` (`idper`),
  ADD KEY `idpef` (`idpef`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idpro`),
  ADD KEY `idval` (`idval`);

--
-- Indices de la tabla `proxalm`
--

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`idval`),
  ADD KEY `iddom` (`iddom`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
ALTER TABLE `almuerzo`
  MODIFY `idalm` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `iddom` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `empresa`
  MODIFY `idemp` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfac` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `idnov` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idpag` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idpef` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idper` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idpro` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `idval` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almuerzo`
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idemp`) REFERENCES `empresa` (`idemp`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idpercre`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idperrev`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idperapr`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`idperent`) REFERENCES `persona` (`idper`);


ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `persona` (`idper`);
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
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idalm`) REFERENCES `almuerzo` (`idalm`);

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
-- Filtros para la tabla `producto`
--

--
-- Filtros para la tabla `proxalm`
--


--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `valor_ibfk_1` FOREIGN KEY (`iddom`) REFERENCES `dominio` (`iddom`);