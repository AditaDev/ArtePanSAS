DROP DATABASE IF EXISTS artepansas;
CREATE DATABASE artepansas;
USE artepansas;
-- Base de datos: `artepansas`
--


CREATE TABLE `dotacion` (
  `ident` bigint(11) NOT NULL, -- id entrega
  `idperent` bigint(11) NOT NULL, -- id persona entrega
  `idperrec` bigint(11) NOT NULL, -- idpersona recibe
  `fecent` date DEFAULT NULL, -- fecha entrega
  `observ` varchar(1000) DEFAULT NULL, -- observaciones
  `estent` bigint(11) NOT NULL,
  `firpent` varchar(255) DEFAULT NULL, -- firma per entrega
  `firprec` varchar(255) DEFAULT NULL, -- firma per recibe
  `fecdev` datetime DEFAULT NULL, -- fecha devolucion
  `idperentd` bigint(11) DEFAULT NULL, -- id persona entrega devolucion
  `idperrecd` bigint(11) DEFAULT NULL, -- idpersona recibe devolucion
  `observd` varchar(1000) DEFAULT NULL, -- observaciones
  `difent` varchar(50) DEFAULT NULL -- este es diferenciar entrega para poder asignarle las dotaciones      
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `dotxent` (
  `ident` bigint(11) NOT NULL, -- id entrega
  `idvdot` bigint(11) NOT NULL, -- id valor referente a dotacion (pantalon/camiseta)
  `idvtal` bigint(11) NOT NULL -- id valor referente a talla (s/m)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ccxent` (
  `ident` bigint(11) NOT NULL, -- id entrega
  `idvdia` bigint(11) NOT NULL, -- id valor referente a 
  `idvcol` bigint(11) NOT NULL -- id valor referente a talla (s/m)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE `almuerzo` (
  `idalm` bigint(11) NOT NULL,
  `ppalm` varchar(70) NOT NULL,
  `spalm` varchar(70) NOT NULL,
  `jgalm` varchar(70) NOT NULL,
  `fecalm` date DEFAULT NULL,
  `rutpdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
(6, 'Estado de factura'),
(7, 'Dotación'),
(8, 'Talla CC'),
(9, 'Talla P'),
(10, 'Talla Z'),
(11, 'Talla G'),
(12, 'Colores'),
(13, 'Días');



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
  `fffac` datetime DEFAULT NULL,
  `idperpag` bigint(11) DEFAULT NULL, 
  `fpagfac` datetime DEFAULT NULL,
  `rutpdf` varchar(255) DEFAULT NULL,
  `rutspt` varchar(255) DEFAULT NULL,
  `idpernov` bigint(11) DEFAULT NULL, 
  `obsnov` varchar(255) DEFAULT NULL,
  `fnov` datetime DEFAULT NULL
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
(1, 'Facturas', 'img/mod_facturas.png', 1, 63),
(2, 'Configuración', 'img/mod_configuracion.png', 1, 101),
(3, 'Almuerzos', 'img/mod_almuerzos.png', 1, 62),
(4, 'Talento Humano', 'img/mod_novedades.png', 1, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `idnov` bigint(11) NOT NULL,
  `fecreg` datetime DEFAULT NULL,
  `fecinov` date DEFAULT NULL,
  `fecfnov` date DEFAULT NULL,
  `fecrev` datetime DEFAULT NULL,
  `tipnov` bigint(11) NOT NULL,
  `obsnov` varchar(100) DEFAULT NULL,
  `estnov` varchar(100) NOT NULL,
  `idpercre` bigint(11) NOT NULL,
  `idperrev` bigint(11) DEFAULT NULL,
  `idperg` bigint(11) DEFAULT NULL,
  `rutpdf` varchar(255) DEFAULT NULL,
  `tini` time DEFAULT NULL,
  `tfin` time DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(101, 'fa fa-solid fa-cubes', 'Módulos', 'views/vmod.php', 1, 'home.php', 1, 2),
(102, 'fa fa-regular fa-file', 'Paginas', 'views/vpag.php', 2, 'home.php', 1, 2),
(103, 'fa fa-solid fa-user', 'PagxPef', 'views/vpgxf.php', 3, 'home.php', 2, 2),
(104, 'fa fa-solid fa-address-card', 'Perfil', 'views/vpef.php', 4, 'home.php', 1, 2),
(105, 'fa fa-solid fa-user', 'PerxPef', 'views/vperxf.php', 5, 'home.php', 2, 2),
(106, 'fa fa-solid fa-user', 'Personas', 'views/vper.php', 6, 'home.php', 1, 2),
(107, 'fa fa-solid fa-boxes-stacked', 'Dominio', 'views/vdom.php', 7, 'home.php', 1, 2),
(108, 'fa fa-solid fa-dollar-sign', 'Valor', 'views/vval.php', 8, 'home.php', 1, 2),
(109, 'fa fa-solid fa-building', 'Empresas', 'views/vemp.php', 11, 'home.php', 1, 1),
(110, 'fa fa-solid fa-solid fa-lightbulb', 'Novedades', 'views/vnov.php', 16, 'home.php', 1, 4),
(111, 'fa fa-solid fa-solid fa-lightbulb', 'Dotación', 'views/vdot.php', 17, 'home.php', 1, 4);

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
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(60, 1),
(61, 1), 
(62, 1),
(63, 1),
(63, 2),
(62, 2),
(63, 3),
(62, 3),
(60, 4),
(109, 4),
(110, 4),
(62, 4),
(62, 5),
(61, 6),
(62, 6),
(110, 7),
(62, 7),
(63, 7),
(63, 8),
(62, 8),
(63, 9),
(62, 9),
(63, 10),
(62, 10),
(63, 11),
(62, 11),
(63, 12),
(62, 12),
(111, 7),
(111, 4);




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idped` bigint(11) NOT NULL,
  `idalm` bigint(11) NOT NULL,
  `idper` bigint(11) NOT NULL,
  `fecped` datetime DEFAULT NULL,
  `canalm` tinyint(1) NOT NULL DEFAULT 1,
  `sopa` boolean DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
(11, 'Coordinador calidad', 1, 63),
(12, 'Tesoreria', 1, 63);

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
(1, 'Ada', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ada@artepan.com', '3215646857', 'Rodriguez', '1071328321', 1, 47),
(2, 'Rita', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'rita@artepan.com', '3215456998', 'Bejarano', '1072749321', 1, 46),
(3, 'Adriana', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'adriana@artepan.com', '3021845120', 'Montaño', '1004985502', 1, 47),
(4, 'Amy', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'amy@artepan.com', '3112132208', 'Gavilan', '1076655342', 1, 48),
(5, 'Lupita', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'lupita@artepan.com', '3215495204', 'Jiménez', '1078944563', 1, 49),
(6, 'Ana', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ana@artepan.com', '3223548793', 'Moreno', '1077954332', 1, 50),
(7, 'Jenny', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'jenny@artepan.com', '322894463', 'Barrera', '1077954332', 1, 48),
(8, 'Fabian', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'fabianq@artepan.com', '322894463', 'Quiroga', '1077954332', 1, 49),
(9, 'Fabian', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'fabianb@artepan.com', '322894463', 'Bastidas', '1077954332', 1, 49),
(10, 'Jader', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'jader@artepan.com', '322894463', 'Mendoza', '1077954332', 1, 49),
(11, 'Mery', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'mery@artepan.com', '322894463', 'Agudelo', '1077954332', 1, 49),
(12, 'J', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'j@artepan.com', '322894463', 'Pardo', '1077954332', 1, 51);

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
(1, 4),
(1, 6),
(1, 7),
(2, 2),
(2, 5),
(3, 3),
(3, 5),
(4, 4),
(4, 5),
(5, 5),
(6, 6),
(6, 5),
(7, 7),
(7, 5),
(8, 8),
(8, 5),
(9, 9),
(9, 5),
(10, 10),
(10, 5),
(11, 11),
(11, 5),
(12, 12),
(12, 5);

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
(16, 'Cartón', 2, 203, 1),
(17, 'Cuenta de cobro', 2, 204, 1),
(18, 'Servicio', 2, 205, 1),
(19, 'Importación', 2, 206, 1),
(20, 'Exportación', 2, 207, 1),
(21, 'Mantenimiento', 2, 208, 1),
(22, 'Dotación', 2, 209, 1),
(23, 'Papelería', 2, 210, 1),
(24, 'Mercado', 2, 210, 1),
(25, 'Transporte M', 2, 210, 1),
(26, 'Plato fuerte', 3, 301, 1),
(27, 'Sopa', 3, 302, 1),
(28, 'Jugo', 3, 303, 1),
(29, 'Ensalada', 3, 304, 1),
(30, 'Postre', 3, 305, 1),
(31, 'Calamidad familiar', 4, 401, 1),
(32, 'Llegada tarde', 4, 402, 1),
(33, 'Liquidación vacaciones', 4, 403, 1),
(34, 'Ausencia', 4, 404, 1),
(35, 'Ausencia injustificada', 4, 405, 1),
(36, 'Ingreso', 4, 406, 1),
(37, 'Retiro', 4, 407, 1),
(38, 'Permiso remunerado', 4, 408, 1),
(39, 'Permiso no remunerado', 4, 409, 1),
(40, 'Censantias', 4, 409, 1),
(41, 'Prestamos', 4, 410, 1),
(42, 'Licencias', 4, 411, 1),
(43, 'Incapacidad Arl', 4, 412, 1),
(44, 'Incapacidad Eps', 4, 413, 1),
(45, 'Por si falta alguna jiji', 4, 414, 1),
(46, 'Contabilidad', 5, 501, 1),
(47, 'Logistica', 5, 502, 1),
(48, 'Tesoreria', 5, 503, 1),
(49, 'Cartera', 5, 504, 1),
(50, 'Facturación', 5, 505, 1),
(51, 'Ventas', 5, 506, 1),
(52, 'Sin revisar', 6, 601, 1),
(53, 'Primera Revisión', 6, 602, 1),
(54, 'Revisada', 6, 603, 1),
(55, 'Entregada', 6, 604, 1),
(56, 'Pagada', 6, 605, 1),
(57, 'En novedad', 6, 606, 1),
(58, 'Fumigaciones', 2, 211, 1), 
(59, 'Analisis de laboratorio', 2, 212, 1), 
(60, 'Compras ocasionales', 2, 213, 1),

(61, 'XS', 8, 801, 1),
(62, 'S', 8, 802, 1),
(63, 'M', 8, 803, 1),
(64, 'L', 8, 804, 1),
(65, 'XL', 8, 805, 1),
(66, 'XXL', 8, 806, 1),
(67, '28', 9, 901, 1),
(68, '30', 9, 902, 1),
(69, '32', 9, 903, 1),
(70, '34', 9, 904, 1),
(71, '36', 9, 905, 1),
(72, '36', 10, 1001, 1),
(73, '37', 10, 1002, 1),
(74, '38', 10, 1003, 1),
(75, '39', 10, 1004, 1),
(76, '40', 10, 1005, 1),
(77, '41', 10, 1006, 1),
(78, '42', 10, 1007, 1),
(79, '43', 10, 1008, 1),
(80, '44', 10, 1009, 1),

(81, 'Pantalón', 7, 701, 1),
(82, 'Camisa', 7, 702, 1),
(83, 'Chaqueta', 7, 703, 1),
(84, 'Botas', 7, 704, 1),
(85, 'Guantes', 7, 705, 1),

(86, '4', 11, 1101, 1),
(87, '5', 11, 1102, 1),
(88, '6', 11, 1103, 1),
(89, '7', 11, 1104, 1),
(90, '8', 11, 1105, 1),
(91, '9', 11, 1106, 1),
(92, '10', 11, 1107, 1),
(93, '11', 11, 1108, 1),


(94, 'Gris', 12, 1201, 1),
(95, 'Negro', 12, 1202, 1),
(96, 'Vino tinto', 12, 1203, 1),
(97, 'Azul oscuro', 12, 1204, 1),
(98, 'Azul rey', 12, 1205, 1),
(99, 'Beige', 12, 1206, 1),

(100, 'Lunes', 13, 1301, 1),
(101, 'Martes', 13, 1302, 1),
(102, 'Miércoles', 13, 1303, 1),
(103, 'Jueves', 13, 1304, 1),
(104, 'Viernes', 13, 1305, 1),
(105, 'Sábado', 13, 1306, 1);





ALTER TABLE `dotacion`
  ADD PRIMARY KEY (`ident`),
  ADD KEY `idperent` (`idperent`),
  ADD KEY `idperrec` (`idperrec`),
  ADD KEY `idperentd` (`idperentd`),
  ADD KEY `idperrecd` (`idperrecd`),
  ADD KEY `estent` (`estent`);

ALTER TABLE `dotxent`
  ADD KEY `ident` (`ident`),
  ADD KEY `idvdot` (`idvdot`),
  ADD KEY `idvtal` (`idvtal`);

ALTER TABLE `ccxent`
  ADD KEY `ident` (`ident`),
  ADD KEY `idvdia` (`idvdia`),
  ADD KEY `idvcol` (`idvcol`);

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
  ADD KEY `idperent` (`idperent`), 
  ADD KEY `idperpag` (`idperpag`),
  ADD KEY `idpernov` (`idpernov`);

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
  ADD KEY `estnov` (`estnov`),
  ADD KEY `idperg` (`idperg`),
  ADD KEY `idpercre` (`idpercre`),
  ADD KEY `idperrev` (`idperrev`); 

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
  ADD PRIMARY KEY `idped` (`idped`),
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
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`idval`),
  ADD KEY `iddom` (`iddom`);


ALTER TABLE `dotacion`
  MODIFY `ident` bigint(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `idval` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `pedido`
  MODIFY `idped` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

ALTER TABLE `dotxent`
  ADD CONSTRAINT `dotxent__ibfk_1` FOREIGN KEY (`ident`) REFERENCES `dotacion` (`ident`);

ALTER TABLE `ccxent`
  ADD CONSTRAINT `ccxent__ibfk_1` FOREIGN KEY (`ident`) REFERENCES `dotacion` (`ident`);

--
-- Filtros para la tabla `asignar`
--
ALTER TABLE `dotacion`
  ADD CONSTRAINT `dotacion_ibfk_1` FOREIGN KEY (`idperent`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `dotacion_ibfk_2` FOREIGN KEY (`idperrec`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `dotacion_ibfk_3` FOREIGN KEY (`idperentd`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `dotacion_ibfk_4` FOREIGN KEY (`idperrecd`) REFERENCES `persona` (`idper`);
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idemp`) REFERENCES `empresa` (`idemp`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idpercre`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idperrev`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idperapr`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`idperent`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_6` FOREIGN KEY (`idperpag`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_7` FOREIGN KEY (`idpernov`) REFERENCES `persona` (`idper`);


ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`idperg`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`idpercre`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`idperrev`) REFERENCES `persona` (`idper`);
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
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `valor_ibfk_1` FOREIGN KEY (`iddom`) REFERENCES `dominio` (`iddom`);