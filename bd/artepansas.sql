DROP DATABASE IF EXISTS artepansas;
CREATE DATABASE artepansas;
USE artepansas;



-- --------------------------------------------------------

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
-- Estructura de tabla para la tabla `ccxent`
--

CREATE TABLE `ccxent` (
  `ident` bigint(11) NOT NULL,
  `idvdia` bigint(11) NOT NULL,
  `idvcol` bigint(11) NOT NULL
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
(13, 'Días'),
(14, 'Bodega'),
(15, 'T. Permiso'),
(16, 'Ubicación'),
(17, 'Departamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dotacion`
--

CREATE TABLE `dotacion` (
  `ident` bigint(11) NOT NULL,
  `idperent` bigint(11) NOT NULL,
  `idperrec` bigint(11) NOT NULL,
  `fecent` date DEFAULT NULL,
  `observ` varchar(1000) DEFAULT NULL,
  `estent` bigint(11) NOT NULL,
  `firpent` varchar(255) DEFAULT NULL,
  `firprec` varchar(255) DEFAULT NULL,
  `fecdev` datetime DEFAULT NULL,
  `idperentd` bigint(11) DEFAULT NULL,
  `idperrecd` bigint(11) DEFAULT NULL,
  `observd` varchar(1000) DEFAULT NULL,
  `difent` varchar(50) DEFAULT NULL,
  `rutpdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dotxent`
--

CREATE TABLE `dotxent` (
  `ident` bigint(11) NOT NULL,
  `idvdot` bigint(11) NOT NULL,
  `idvtal` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `fnov` datetime DEFAULT NULL,
  `numegr` int(5) DEFAULT NULL,
  `numbod` int(5) DEFAULT NULL,
  `vneto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmod` int(5) NOT NULL,
  `nommod` varchar(100) NOT NULL,
  `imgmod` varchar(255) DEFAULT NULL,
  `actmod` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmod`, `nommod`, `imgmod`, `actmod`) VALUES
(1, 'Facturas', 'img/mod_facturas.png', 1),
(2, 'Configuración', 'img/mod_configuracion.png', 1),
(3, 'Almuerzos', 'img/mod_almuerzos.png', 1),
(4, 'Talento Humano', 'img/mod_novedades.png', 1),
(5, 'Permisos', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `idnov` bigint(11) NOT NULL,
  `fecreg` date DEFAULT NULL,
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
(109, 'fa fa-solid fa-building', 'Proveedores', 'views/vemp.php', 11, 'home.php', 1, 1),
(110, 'fa fa-solid fa-solid fa-lightbulb', 'Novedades', 'views/vnov.php', 16, 'home.php', 1, 4),
(111, 'fa fa-solid fa-solid fa-lightbulb', 'Dotación', 'views/vdot.php', 17, 'home.php', 1, 4),
(55, 'fa fa-solid fa-file-circle-check', 'Permisos', 'views/vprm.php', 55, 'home.php', 1, 5);

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
(60, 1),
(60, 4),
(61, 1),
(61, 6),
(62, 1),
(62, 6),
(62, 5),
(63, 1),
(63, 2),
(63, 3),
(63, 7),
(63, 8),
(63, 9),
(63, 10),
(63, 11),
(63, 12),
(63, 13),
(101, 1),
(102, 1),
(104, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(109, 4),
(110, 1),
(110, 7),
(110, 4),
(111, 7),
(111, 1),
(55, 7),
(55, 5),
(55, 1);

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
  `sopa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `permiso` (
  `idprm` bigint(11) NOT NULL,
  `noprm` bigint(11) DEFAULT NULL,
  `fecini` datetime DEFAULT NULL,
  `fecfin` datetime DEFAULT NULL,
  `idjef` bigint(11) NOT NULL,
  `idvtprm` bigint(11) NOT NULL,
  `sptrut` varchar(255) DEFAULT NULL,
  `desprm` varchar(250) DEFAULT NULL,
  `obsprm` varchar(250) DEFAULT NULL,
  `estprm` tinyint(1) DEFAULT NULL,
  `idper` bigint(11) NOT NULL,
  `idvubi` bigint(11) NOT NULL,
  `fecsol` date DEFAULT NULL,
  `fecrev` date DEFAULT NULL,
  `rutpdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pefxmod`
--

CREATE TABLE `pefxmod` (
  `idmod` int(5) NOT NULL,
  `idpef` bigint(11) NOT NULL,
  `idpag` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pefxmod`
--

INSERT INTO `pefxmod` (`idmod`, `idpef`, `idpag`) VALUES
(1, 1, 60),
(1, 2, 63),
(1, 3, 63),
(1, 4, 60),
(1, 7, 63),
(1, 8, 63),
(1, 9, 63),
(1, 10, 63),
(1, 11, 63),
(1, 12, 63),
(1, 13, 63),
(2, 1, 106),
(3, 1, 61),
(3, 5, 62),
(3, 6, 61),
(4, 4, 110),
(4, 1, 110),
(4, 7, 110),
(5, 7, 55),
(5, 5, 55),
(5, 1, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idpef` bigint(11) NOT NULL,
  `nompef` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idpef`, `nompef`) VALUES
(1, 'SuperAdmin'),
(2, 'Control interno'),
(3, 'Gerencia'),
(4, 'Contabilidad'),
(5, 'Colaborador'),
(6, 'Servicios generales'),
(7, 'Talento humano'),
(8, 'Coordinador exportaciones'),
(9, 'Mantenimiento'),
(10, 'Coordinador logistica'),
(11, 'Coordinador calidad'),
(12, 'Tesoreria'),
(13, 'Jefe producción');

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
(1, 'Nicole Adamarys', '4ba5359101befefed89e3e748de749f3ac438bfc', 'rodriada24@gmail.com', '3215646857', 'Rodríguez Estevez ', '1071328321', 1, 45),
(2, 'Luz Mery', '2dc193c588614bbb41e97826613ceab930129c79', 'agudeloluzmery@yahoo.com.co', NULL, 'Agudelo Romero', '20533039', 1, 45),
(3, 'David Alexander', '7624cbd77a187735ed5212c208a8d44a509dc985', 'davidalvarado0803@gmail.com', NULL, 'Alvarado Cardona', '1233509778', 1, 46),
(4, 'Diego Alberto', '550ebb4ca1e7e8261860662a3d488e2194c4217f', 'diegokatyandrade@gmail.com', NULL, 'Andrade', '93377712', 1, 47),
(5, 'Edson Arante', '238a57246f1250ff609a75dd447128141526e609', 'edsonballen.15@gmail.com', NULL, 'Ballen Rivera ', '1022967621', 1, 46),
(6, 'Jenny Paola', '90bb5c55227c92e4fd6d14c2b7f9ee1d10f5c49e', 'jpaopulido@gmail.com', NULL, 'Barrera Pulido', '53050180', 1, 45),
(7, 'Edgar Fabian', '5d52fa3bfa3ca9f9fd54ca442f49ac0049664819', 'masterr4@hotmail.es', NULL, 'Bastidas Mariño', '79915984', 1, 45),
(8, 'Jorge Eduardo', '265b671a3e6500b5669cb893d80d2878b74fbc13', 'jebellog@hotmail.com', NULL, 'Bello', '11519701', 1, 45),
(9, 'Maria Rita', 'bce325c962b45fd3d67e9a3519ae3347605241a6', 'mari_beme6@hotmail.com', NULL, 'Bejarano', '41363619', 1, 45),
(10, ' Luz Antonia', '1a2bda55a67b7a02ae3a2bc656bccfc01524281f', 'Luz-antonia@hotmail.com', NULL, 'Blanco Maldonado', '41692666', 1, 47),
(11, 'Gladys Astrid', '2ae43cf71c61fba2541f765ff5506c03c1d55eb3', 'astridbravogiraldo8@gmail.com', NULL, 'Bravo Giraldo ', '65731647', 1, 47),
(12, 'Victor', '548ab4f8ed58f80fe6e61fba30821c05b170dc44', 'camachop589@gmail.com', NULL, 'Buitrago ', '1023943022', 1, 46),
(13, 'Rafael Eduardo', 'aa9930597c59ed54cb2ee1ca9556660ef5024eab', 'rbustos@artepan.com.co', NULL, 'Bustos Malagón ', '11346490', 1, 46),
(14, 'Ricardo', '35f2ecf85b73114a7ee2625b4c88dfee180ca3cd', 'ricardocabre3@hotmail.com', NULL, 'Cabrera Ducuara ', '93117819', 1, 46),
(15, 'Brandon Antonio', 'bdc72aa5710a82f36a35e3c272b5923005e76790', 'calderonbrandon0411@gmail.com', NULL, 'Calderón Pinzon ', '1001175984', 1, 45),
(16, 'Martha Doris', '5b8d2a864dd941213e3aa257771e77173f4a897b', 'Mdcmonita@hotmail.com', NULL, 'Castaño ', '52305522', 1, 47),
(17, 'Ronald', 'a04e77bbfc1e983478990384be6c0d30151b78cb', 'ronaldcas041220@gmail.com', NULL, 'Castañeda Peña ', '79733403', 1, 46),
(18, 'Walther Oswaldo', '8ec687a5052bc8d19d79a3b08a84a1608b17f0b4', 'walthcruz1886@gmail.com', NULL, 'Cruz Rodriguez ', '1024505932', 1, 46),
(19, 'Sandra Rocio', '8649889a345c6b98ee40f9869dab3d607519c22c', 'sandradiazv@gmail.com', NULL, 'Diaz Valbuena ', '52089423', 1, 45),
(20, 'Hernán Bernardo', 'e69fdae7200efa9703e19805995a9e476eb95500', 'hernanduranb52@yahoo.com', NULL, 'Durán Baron ', '19166998', 1, 46),
(21, 'Claudia Bibiana', '15341f259801f248790f63954217a6a5c8591f23', 'claudiadurannhuergo@gmail.com', NULL, 'Durán huergo ', '40780475', 1, 47),
(22, 'Ivan', 'a06c4b323c4453572b0615671c77c6aae8413733', 'ivanvergara0976@gmail.com', NULL, 'Escobar Vergara ', '79729150', 1, 46),
(23, 'Alvaro Fernando', 'f35d8f7e30b99b2e9f368164ecda2f9ae328adb4', 'ferespejo69@hotmail.com', NULL, 'Espejo Beltran ', '79498889', 1, 47),
(24, 'Yolanda', '3187c188b6c4e37719cba209020110a0af15c295', 'yolanda.fonseca.artepan@gmail.com', NULL, 'Fonseca Martinez ', '41786746', 1, 47),
(25, 'Jaime Alexander', 'cb724eb0d7c66d76474165374a6830f774005038', 'pitero125@gmail.com', NULL, 'Forero Useche ', '1031138935', 1, 46),
(26, 'Carlos Hernando', 'a9f245f71f40e5bc42c8e70b96f6222262475f19', 'chgaravitov@hotmail.com', NULL, 'Garavito Velázquez ', '80424994', 1, 47),
(27, 'Amylee Andrea', 'c830712d4f3b017cb6803d21d813b22dbcc750cb', 'amy.gavilan12@gmail.com', NULL, 'Gavilán Niño ', '1031125822', 1, 45),
(28, 'Jefferson', 'd8c0b21ed80421d7c19a7208e6fe4da76faf159a', 'jegold2120@hotmail.com', NULL, 'González Usme ', '1013683528', 1, 46),
(29, 'Albadan Yilmer', 'c71fd0eebf603c103399c133e3382d40bc40e42a', 'yilmerguerrero@yahoo.es', NULL, 'Guerrero ', '79731631', 1, 46),
(30, 'William', '637f09ce67f2e15507be110cc49ff1bb17f11030', 'Williams061@hotmail.com', NULL, 'Guerrero Gomez ', '79320979', 1, 47),
(31, 'Luz Yeny', 'ec8138832520225ed3fe338a7290bcf2d71b378e', 'luzyeny8@gmail.com', NULL, 'Guerrero Moreno ', '53118633', 1, 47),
(32, 'Blanca Nelsy', '7cddc1bb0d62a2c0509908f2c946416c5d41dc4d', 'blancajimenez49@hotmail.com', NULL, 'Jiménez Castro ', '41456223', 1, 47),
(33, 'Jenny yisell', 'f93b0f33e3c0e7215b9f85c54dcaed0cb6e23848', 'ronalfabijim@hotmail.com', NULL, 'Jiménez Godoy ', '52879265', 1, 47),
(34, 'Oscar Javier', 'e8fb02df657490acea802341edf8ffbed8e311da', 'Ooscarjimenez0@gmail.com', NULL, 'Jimenez grazon ', '1026270180', 1, 46),
(35, 'Miguel Angel', 'dffe7f3040a2e075d926187078785d909a94dc81', 'angeldavilleren01a@gmail.com', NULL, 'Llerena Castro ', '1044928400', 1, 46),
(36, 'Jairo', '68e77bb6064fc196442902481c95d90a52150d37', 'martinezcorzojairo3@gmail.com', NULL, 'Martinez Corzo ', '19483662', 1, 46),
(37, 'Jader Hasmeth', '5e138b27e909b588709c3dc6774857a7ccfe7eee', 'jadermen14@gmail.com', NULL, 'Mendoza Maza ', '1001913358', 1, 46),
(38, 'Miguel Angel', 'afa192e4e55e423516590f10835abc9d150e9cd7', 'mk1218mendoza@gmail.com', NULL, 'Mendoza Maza ', '1001911952', 1, 46),
(39, 'Adriana', '4ea2fd893bf03e470ceb74ea0f7baea56aafe3cd', 'amontano@artepan.com.co', NULL, 'Montaño Bejarano ', '52263295', 1, 45),
(40, 'Camilo Andrés', '4e7a5f5dfaeb5e160cf482c764305a4add402688', 'camilomontano02@gmail.com', NULL, 'Montaño Rodríguez ', '1193139757', 1, 46),
(41, 'Sandra Milena', 'da926dfe6de9873e377a764f8ba9f0aecb4929de', 'smontenegro@artepan.com.co', NULL, 'Montenegro ', '52130059', 1, 47),
(42, 'Juan Sebastian', '4f61307024e951bf661fa20a188820fb6c189b77', 'jmoreno400@misena.edu.co', NULL, 'Moreno Garzon ', '1030666431', 1, 45),
(43, 'Ana Cecilia', '4f3a1e6cc48f615356ca3ea5b2c8a1c9b42fd66d', 'anaceciliasm11@gmail.com', NULL, 'Moreno Suarez ', '51988759', 1, 45),
(44, 'Alvaro', '0248e4c2e5f8c2902ebd921b05e04f5a1dc7d7f2', 'alvaromoreraw123@gmail.com', NULL, 'Morera Rodriguez ', '19073145', 1, 46),
(45, 'Yenny Astrid', 'e0854fe9cb9c8bf0a06c76f433252d454e1c355c', 'yenny.astridm@gmail.com', NULL, 'Morera Rugeles ', '52470161', 1, 47),
(46, 'Yined Milandy', 'fa2c11047ca9212539caa2271f61c0adf5fb7dd3', 'Yined.pacacira@gmail.com', NULL, 'Pacacira Guio ', '1056802041', 1, 45),
(47, 'Juan Manuel', 'ce9bd93febc3ddfe04f7f32c98401656338cf735', 'jumapal2@hotmail.com', NULL, 'Palacios Chaves ', '79135140', 1, 45),
(48, 'Jairo Ancizar', 'd2c7a6a03b3d808639079463e279e3efd458235e', 'jairopardoasesorias@hotmail.com', NULL, 'Pardo Diaz ', '17120780', 1, 45),
(49, 'Juan Jairo', 'ac6fed2889c5a52538276334b41677c3bb2b2241', 'jjpardo@artepan.com.co', NULL, 'Pardo Rodríguez ', '1069712627', 1, 45),
(50, 'Germán Alfonso', 'e79fa2f06772118c1682e2e3e98f83d71ef0f6da', 'gap@artepan.com.co', NULL, 'Párraga a Gutiérrez ', '1032365342', 1, 45),
(51, 'Alba', '94346ff445dd8fd0f7e4c225e8ab8fe4e6b59977', 'albaparrag@gmail.com', NULL, 'Parraga ', '1024478347', 1, 45),
(52, 'Marisol', 'c638add91a4654c89733df3edd2da691da2d2c40', 'shamarysu@gmail.com', NULL, 'Pedraza ', '52349796', 1, 47),
(53, 'Pablo', 'ab3da323a997cc76923488e52241d7ee8c32dab3', 'Pabloalfonsopenagospastran@hmail.com', NULL, 'Penagos Pastran ', '79917272', 1, 46),
(54, 'Alfonso', '9b5b185253cc1b6e82f63708fc37faf3d70c5142', 'HJKHJGK', NULL, 'Penagos Suares ', '19238591', 1, 46),
(55, 'Luis Dario', '630c16e6468d539f2f1b87211fca698c57b29d26', 'dariopena.2703@gmail.com', NULL, 'Peña Charry ', '80274540', 1, 46),
(56, 'Maria Concepcion', '350843f5a95dc298236853650613b0b8239993e6', 'cperez@artepan.com.co', NULL, 'Perez Nepta ', '41504804', 1, 45),
(57, 'Victor Manuel', 'bbac55ecfdb43f589d24df348d9cad4970bd6b89', 'victortransportevmp@gmail.com', NULL, 'Pinzon ', '79640480', 1, 46),
(58, 'Nickson Fabián', 'e4cc10ef038de7bfa93ce0f7a0b77ff0d5552f1e', 'agerencia@artepan.com.co', NULL, 'Quiroga Lopez ', '1020771962', 1, 45),
(59, 'Jhon Jairo', '4f367d11e69d9c3fc1cdd382ab170d1db5435692', 'jhonjramirez45@gmail.com', NULL, 'Ramírez González ', '75067802', 1, 46),
(60, 'Kevin Andrés', '6d64fba1b4cb31f524c3a3157c08cbe7337db928', 'keviinramirez62@gmail.com', NULL, 'Ramírez Isaza ', '1073715535', 1, 46),
(61, 'Gustavo', '6f37174c887902bdac659c3ad17491b91fb8a38a', 'JHKYUJK', NULL, 'Ramírez Valencia ', '10078656', 1, 46),
(62, 'Walter Stiven', '6742682fdad01a59a17f631d88b41db81139ddd3', 'wsrr1013@gmail.com', NULL, 'Rodriguez Rodriguez ', '1013678254', 1, 46),
(63, 'Óscar Eduardo', '4b47dcfd141ce019b493f92b374b1cbe1458eb6d', 'osrodriguez76@hotmail.com', NULL, 'Rodríguez Soche ', '79212499', 1, 46),
(64, 'Alejandro', '8230d9a0e0f8fe3cdcc3c6cbe4d7e5bfde251340', 'alrogehernandez@outlook.com', NULL, 'Rogelis Hernandez ', '1192738328', 1, 46),
(65, 'Brandon Jahir', '3c5af3f1d44c1c79f442cdde2c2f3728cffd7a70', 'brandonjahirsandoval@gmail.com', NULL, 'Sandoval Moreno ', '1233509090', 1, 46),
(66, 'Nelly Johana', '44d09936c21775af717c0a60ebe1ea6e9f8aafe6', 'johanita242009@gmail.com', NULL, 'Sandoval Moreno ', '1030658669', 1, 45),
(67, 'Gladys Milena', 'b4ccfd8159fd725a128a0ccaa826b15042ea8fd8', 'milenatovar@gmail.com', NULL, 'Tovar Murillo ', '52217915', 1, 47),
(68, 'Angel Roberto', '554e45046c0d0ed48e0bef63b8d79ef331ba0b62', 'atrilleras@artepan.com.co', NULL, 'Trilleras Viscaya ', '7684074', 1, 45),
(69, 'Alex Armando', '84082da34468b72e26f0455d321a3ee29bc3c6ef', 'valenciaalexarmando@gmail.com', NULL, 'Valencia Rincon ', '79532961', 1, 46);

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
(2, 5),
(2, 11),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(6, 7),
(7, 5),
(7, 9),
(8, 3),
(8, 5),
(9, 2),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 4),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 10),
(37, 5),
(38, 5),
(39, 3),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 6),
(44, 5),
(45, 5),
(46, 4),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(49, 12),
(50, 3),
(50, 5),
(51, 4),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(56, 13),
(57, 5),
(58, 5),
(58, 8),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(66, 7),
(67, 5),
(68, 5),
(69, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `idemp` bigint(11) NOT NULL,
  `nitemp` bigint(11) DEFAULT NULL,
  `razsoem` varchar(100) DEFAULT NULL,
  `actemp` tinyint(1) NOT NULL DEFAULT 1,
  `tipemp` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`idemp`, `nitemp`, `razsoem`, `actemp`, `tipemp`) VALUES
(1, 860026759, 'CARTONES AMERICA S.A. CAME', 1, 1),
(2, 900486803, 'PALMICULTORES DEL NORTE SAS', 1, 1),
(3, 900514713, 'APE QUIMICOS SAS', 1, 1),
(4, 830097789, 'PROCESADORA DE MATERIAS PRIMAS S.A', 1, 1),
(5, 830086848, 'BOL SAS', 1, 1),
(6, 900319753, 'PRICESMART COLOMBIA SAS', 1, 1),
(7, 860009578, 'SEGUROS DEL ESTADO S.A', 1, 1),
(8, 901383865, ' CENTRO COMERCIAL PASEO VILLA DEL RIO - PROPIEDAD HORIZONTAL', 1, 1),
(9, 901463013, 'COMERCIALIZADORA LA CAUCANA S.A.S', 1, 1),
(10, 900628888, 'VOSAVOS SAS', 1, 1),
(11, 830111876, 'DISTRIBUIDORA EL FARO LTDA', 1, 1),
(12, 901677213, 'CARPALM ENGINEERING SAS', 1, 1),
(13, 900009495, 'COMPAÑIA PAPELERA NACIONAL SAS', 1, 1),
(14, 901105593, 'CENTRO LATAS Y AUTOPARTES A4 SAS', 1, 1),
(15, 830135186, 'LA BIFERIA S.A', 1, 1),
(16, 899999115, 'EMPRESA DE TELECOMUNICACIONES DE BOGOTA SA ESP', 1, 1),
(17, 860531989, 'POLIPACK SAS', 1, 1),
(18, 900642402, 'TORNILLOS Y HERRAMIENTAS 777 CL 13 SAS', 1, 1),
(19, 890900608, 'ALMACENES EXITO S.A', 1, 1),
(20, 900383959, 'HUMAN RESEARCH SAS', 1, 1),
(21, 860531097, 'MASTER QUIMICA S A S', 1, 1),
(22, 901323279, 'TRANSSUPRA SAS', 1, 1),
(23, 860525732, 'FERRETERIA EL TRIUNFO SAS', 1, 1),
(24, 900209640, 'GRANPLAST DE COLOMBIA SAS', 1, 1),
(25, 860030723, 'MATERIALES ELECTRICOS Y MECANICOS SAS', 1, 1),
(26, 901568523, 'PRINTESCO SAS', 1, 1),
(27, 860512699, 'PRODUCTORA NACIONAL DE AROMAS FRAGANCIAS Y COLORANTES S.A. DISAROMAS S.A', 1, 1),
(28, 901170724, 'CREW GARAGE S.A.S', 1, 1),
(29, 901090013, 'ESTRUMEC SAS', 1, 1),
(30, 900641692, 'ECONTAINERS S.A.S', 1, 1),
(31, 830071467, 'TRANSPORTE MINERIA Y CONSTRUCCION TRAMICON LOGISTICA S.A', 1, 1),
(32, 900956617, 'HIDROLAVADORAS INDISTRIALES SAS', 1, 1),
(33, 901428261, 'EMPAQUES BOPET SAS', 1, 1),
(34, 900508664, 'EXTRACTORA SABANA SAS', 1, 1),
(35, 901488480, 'HS SEGURIDAD ELECTRONICA SAS', 1, 1),
(36, 900276604, 'INTERPAK S.A.S', 1, 1),
(37, 900938938, 'TIR ASESORES SAS', 1, 1),
(38, 860006380, 'ASOCIACION NACIONAL DE FABRICANTES DE PAN ADEPAN', 1, 1),
(39, 860063875, 'ENEL COLOMBIA S.A E.S.P', 1, 1),
(40, 51987601, 'TECNILUBRILLANTAS SANTA LIBRADA', 1, 1),
(41, 52215235, 'FERRETERIA VF SOLFER', 1, 1),
(42, 80022603, 'EXTINBOG', 1, 1),
(43, 80056258, 'FUMINSECT', 1, 1),
(44, 660889258, 'ADAMANTE CONSULTING GROUP', 1, 1),
(45, 800014875, 'TELESENTINEL LTDA', 1, 1),
(46, 800042928, 'PROASISTEMAS S.A', 1, 1),
(47, 800092138, 'DISMACOR COLOMBIA S.A.S', 1, 1),
(48, 800105213, 'TRACTOCARGA SAS', 1, 1),
(49, 800106774, 'MERCADO ZAPATOCA SA', 1, 1),
(50, 800116164, 'TERMINAL DE CONTENEDORES DE CARTAGENA S.A', 1, 1),
(51, 800132302, 'OFIMA SAS', 1, 1),
(52, 800171581, 'BARENTZ S.A.S', 1, 1),
(53, 800237608, 'CENTRAL DE INSUMOS Y MATERIAS PRIMAS PARA LA INDUSTRIA ALIMENTARIA S.A.S', 1, 1),
(54, 804016305, 'ALHUM LIMITADA', 1, 1),
(55, 811012106, 'MAGNUM LOGISTICS SAS', 1, 1),
(56, 811039342, 'LOGISTICA SAS', 1, 1),
(57, 830003107, 'PRODUQUIM LTDA', 1, 1),
(58, 830005752, 'LITOPAPELES OCHOA S.A.S', 1, 1),
(59, 830018214, 'MPS MAYORISTA DE COLOMBIA S.A', 1, 1),
(60, 830034195, 'CASTOR DATA SAS', 1, 1),
(61, 830038805, 'REPRESENTACIONES OIL FILTERS S.A', 1, 1),
(62, 830062441, 'ENVASAR S.A.S', 1, 1),
(63, 830075074, 'AGROPECUARIA SANTAMARIA S.A', 1, 1),
(64, 830084433, 'SOCIEDAD CAMERAL DE CERTIFICACION DIGITAL CARTICAMARA SA', 1, 1),
(65, 830105693, 'PROVEEDORA SURAMERICANA DE ACEITES S.A', 1, 1),
(66, 830106715, 'SISTEMAS SATELITALES DE COLOMBIA S.A. ESP', 1, 1),
(67, 830127739, 'DISTRIBUIDOR DE PRODUCTOS QUIMICOS SESAN SAS', 1, 1),
(68, 830142721, 'MEDICINA LABORAL S.A.S', 1, 1),
(69, 860002180, 'SEGUROS COMERCIALES BOLIVAR SA', 1, 1),
(70, 860004875, 'GENERALI COLOMBIA CIA. DE SEGUROS S.A', 1, 1),
(71, 860007322, 'CAMARA DE COMERCIO DE BOGOTA', 1, 1),
(72, 860015715, 'ACOPI', 1, 1),
(73, 860019063, 'MOTORES Y MAQUINAS S.A. BIC', 1, 1),
(74, 860024423, 'FEDEPALMA', 1, 1),
(75, 860025188, 'NIKE COLOMBIANA S.A', 1, 1),
(76, 860028415, 'LA EQUIDAD SEGUROS GENERALES ORGANISMO COOPERATIVO LA CUAL PODRA IDENTTIFICARSE TAMBIEN CON LA DENOM', 1, 1),
(77, 860032115, 'CENTRO AUTOMOTOR DIESEL S.A CENTRODIESEL', 1, 1),
(78, 860037013, 'COMPAÑIA MUNDIAL DE SEGUROS S.A', 1, 1),
(79, 860052634, 'DISTRIBUIDORA LOS COCHES LA SABANA S.A.S', 1, 1),
(80, 860054978, 'ADISPETROL S.A', 1, 1),
(81, 860071598, 'CARLOS TRIANA Y CIA LTDA', 1, 1),
(82, 860076919, 'CREPES Y WAFFLES S.A', 1, 1),
(83, 860508358, 'RAWMCO S A S', 1, 1),
(84, 860524772, 'KASSANI DISEÑO S.A.S', 1, 1),
(85, 861067977, 'REGISTRAR CORP', 1, 1),
(86, 890100577, 'AEROVIAS DEL CONTINENTE AMERICANO S.A. AVIANCA', 1, 1),
(87, 890208596, 'COMERCIALIZADORA INTERNACIONAL SANTANDEREANA DE ACEITES SAS', 1, 1),
(88, 890311628, 'ENVASES SAS', 1, 1),
(89, 890903407, 'SEGUROS GENERALES SURAMERICANA SA', 1, 1),
(90, 891224005, 'CHAMORRO PORTILLA SAS', 1, 1),
(91, 900080939, 'HERIBERTO ANGEL MARTINEZ REPRESENTACIONES H.A.M SAS', 1, 1),
(92, 900081160, 'TRANSPORTES T.M.C & CIA S.A.S', 1, 1),
(93, 900084379, 'AROMASYNT SAS', 1, 1),
(94, 900084636, 'LABORATORIO HERNANDIESEL E.U', 1, 1),
(95, 900089961, 'TRANSPORTE LOGISTICO CON CALIDAD S.A.S', 1, 1),
(96, 900133181, 'INVERSIONES EN TRANSPORTE Y LOGISTICA SAS', 1, 1),
(97, 900153392, 'HARMONY FLAVOURS & INGREDIENTS LTDA', 1, 1),
(98, 900178159, 'MUNDO BIZ S.A.S', 1, 1),
(99, 900225347, 'ABANSYS DE COLOMBIA SAS', 1, 1),
(100, 900230826, 'AUTOMAS COMERCIAL LTDA', 1, 1),
(101, 900242470, 'ASESORIAS Y DESARROLLO DE APLICACIONES TECNOLOGICAS S.A.S', 1, 1),
(102, 900260192, 'DISTRIBUIDORA BRAHMAN S.A.S', 1, 1),
(103, 900274028, 'CENTROMOTOR AVENIDA BOYACA E U', 1, 1),
(104, 900303634, 'TRANSPORTES LA SIERRA S.A.S', 1, 1),
(105, 900314026, 'ACEITES CIMARRONES S.A.S. ZONA FRANCA PERMANENTE ESPECIAL AG', 1, 1),
(106, 900350772, 'GESTION TOTAL CORPORATIVA SAS BIC', 1, 1),
(107, 900357604, 'PRIMORIS DE COLOMBIA SAS', 1, 1),
(108, 900378966, 'INVERSIONES VADISA SAS', 1, 1),
(109, 900400551, 'UPS SERVICIOS EXPRESOS S.A.S', 1, 1),
(110, 900407900, 'DISTRIBUCIONES MONARCA SAS', 1, 1),
(111, 900411057, 'IDIMERCO S.A.S', 1, 1),
(112, 900422614, 'EXPERIAN COLOMBIA S.A', 1, 1),
(113, 900459526, 'MOGOLLON S.A.S. OPERADOR LOGISTICO DE CARGA', 1, 1),
(114, 900487308, 'RPM COLOMBIA SAS', 1, 1),
(115, 900491691, 'COMERCIALIZADORA DE SALES EL TITAN S.A.S', 1, 1),
(116, 900545179, 'TAURET COMPUTADORES S.A.S', 1, 1),
(117, 900551700, 'AGROPECUARIA LA RIVERA GAITAN SAS', 1, 1),
(118, 900572445, 'CIFIN S.A.S', 1, 1),
(119, 900628183, 'CARTONERIA INTERCAJAS S.A.S', 1, 1),
(120, 900648031, 'LOGISTCARGA SAS', 1, 1),
(121, 900706402, 'IINOVACION BIOAMBIENTAL SAS ESP', 1, 1),
(122, 900713050, 'CONFIA CONTROL SAS', 1, 1),
(123, 900761037, 'FAYTEX SAS', 1, 1),
(124, 900791897, 'ONTRACK COLOMBIA S.A.S', 1, 1),
(125, 900798175, 'CONSTRUADRE SAS', 1, 1),
(126, 900813884, 'EW TECH S.A.S', 1, 1),
(127, 900911973, 'DEL LLANO ALTO OLEICO S.A.S', 1, 1),
(128, 900935445, 'LA ESTANZUELA LUJOS & ACCESORIOS S.A.S', 1, 1),
(129, 900936006, 'SURACARGA SAS', 1, 1),
(130, 900938069, 'ALDDOR INVERSIONES INMOBILIARIAS S.A.S', 1, 1),
(131, 900995767, 'EXTRACTORA EL ESTERO SAS', 1, 1),
(132, 901003327, 'AMAZON WEB SERVICES COLOMBIA SAS', 1, 1),
(133, 901004464, 'GRUPO SERATTA SAS', 1, 1),
(134, 901017183, 'EDITORIAL LA REPUBLICA SAS', 1, 1),
(135, 901086691, 'LOG ON COLOMBIA SAS', 1, 1),
(136, 901091028, 'CARPAS LA REINA NC S.A.S', 1, 1),
(137, 901107126, 'IMAG IMAGEN GRAFICA SAS', 1, 1),
(138, 901116711, 'MI ISLA S.A.S', 1, 1),
(139, 901150055, 'UNIVERSAL DE RINES DN S.A.S', 1, 1),
(140, 901151628, 'EQUANOVA S.A.S', 1, 1),
(141, 901251437, 'BIOMPORTEX SAS', 1, 1),
(142, 901304601, 'EUROFLEX DISEÑO Y FLEXOGRAFIA S.A.S', 1, 1),
(143, 901320225, 'COMPAÑIA MUNDIAL DE COMERCIO S.A.S', 1, 1),
(144, 901349661, 'LA PANADERIA UNIVERSAL S.A.S', 1, 1),
(145, 901370428, 'SUPERMERCADOS MERCACENTRO S.A.S', 1, 1),
(146, 901374794, 'MISCELÁNEA TURMEQUÉ SAS', 1, 1),
(147, 901421317, 'TSR BARUK S.A.S', 1, 1),
(148, 901435333, 'ACEITES Y GRASAS LA CRISTALINA ZOMAC SAS', 1, 1),
(149, 901437261, 'PAOLA ANDREA RAMIREZ PROOYECTA SAS', 1, 1),
(150, 901469037, 'INVERSIONES JAR SAS', 1, 1),
(151, 901474224, 'SUMITRANSP S.A.S', 1, 1),
(152, 901491519, 'AGENCIA DE ADUANAS COMEX CJC SAS NIVEL 2', 1, 1),
(153, 901529625, 'COMERGRAS DE COLOMBIA S.A.S', 1, 1),
(154, 901554939, 'DISTRIESTANTES DE LA 27 SAS', 1, 1),
(155, 901555974, 'OPERADOR LOGISTICO Y COMERCIAL ATLANTIS SAS', 1, 1),
(156, 901595840, 'IMPORTADORA NAVIL SAS', 1, 1),
(157, 901726332, 'DUVAN PEREZ DISTRIBUIDORA SAS', 1, 1),
(158, 901737156, 'POLAROMA S.A.S', 1, 1),
(159, 800241469, 'TRANSBORDER S A S', 1, 1),
(160, 800079983, 'SOCO SAS', 1, 1),
(161, 890917018, 'UNICOR S.A', 1, 1),
(162, 900645725, 'ORGANIZACION DE LOGISTICA INTEGRAL DE TRANSPORTE S.A.S', 1, 1),
(163, 900586622, 'TRANSPORTES DE CARGA FLOREZ SAS', 1, 1),
(164, 890312630, 'PROTECNICA INGENIERIA S.A.S', 1, 1),
(165, 800043202, 'DEL LLANO S.A', 1, 1),
(166, 890900943, 'COLOMBIANA DE COMERCIO S.A', 1, 1),
(167, 800206442, 'COMIAGRO S.A', 1, 1),
(168, 830095213, 'ORGANIZACION TERPEL S.A', 1, 1),
(169, 830080092, 'TORONTO DE COLOMBIA LTDA', 1, 1),
(170, 800205150, 'INFEREX S.A.S', 1, 1),
(171, 860002534, 'ZURICH COLOMBIA SEGUROS S.A', 1, 1),
(172, 830022636, 'POLYAROMA SAS', 1, 1),
(173, 900396331, 'INNOVA FOOD SOLUTIONS SAS', 1, 1),
(174, 900367868, 'MARKETING DE INSUMOS SAS', 1, 1),
(175, 900577482, 'SOLUCIONES EMPRESARIALES GRM SAS', 1, 1),
(176, 890401802, 'PROSEGUR VIGILANCIA Y SEGURIDAD PRIVADA LTDA', 1, 1),
(177, 800242106, 'SODIMAC COLOMBIA S.A', 1, 1),
(178, 900491889, 'MASSER S A S', 1, 1),
(179, 890107487, 'SUPERTIENDAS Y DROGUERIAS OLIMPICA S.A', 1, 1),
(180, 900477154, 'HOTELES PARQUEADEROS Y SERVICENTROS HOPA S.A.S', 1, 1),
(181, 800153993, 'COMUNICACION CELULAR S A COMCEL S A', 1, 1),
(182, 900276962, 'D1 S A S', 1, 1),
(183, 901444831, 'AG RESPUESTOS SAS', 1, 1),
(184, 901685789, 'INVERSIONES YESHUA SAS', 1, 1),
(185, 901391118, 'GRUPO EMPRESARIAL NB ROMBER CARROCERIAS S.A.S', 1, 1),
(186, 900470526, 'VIALTRUCK SAS', 1, 1),
(187, 860512330, 'SERVIENTREGA S.A', 1, 1),
(188, 900568774, 'K-SAVAL ENERGY S.A.S. BIC', 1, 1),
(189, 901164673, 'INDUSTRIAS HECAR SAS', 1, 1),
(190, 860402526, 'LA RUEDA SAS', 1, 1),
(191, 901112692, 'INVERSIONES PALMA GRANDE SAS', 1, 1),
(192, 800251569, 'INTER RAPIDISIMO S.A', 1, 1),
(193, 900564893, 'MULTISERVICIOS INEL SAS', 1, 1),
(194, 900245885, 'MULPLAST SAS', 1, 1),
(195, 860501145, 'DUQUESA S.A. BIC', 1, 1),
(196, 890206592, 'ORLANDO RIASCOS F. DISMACOR S.A.S', 1, 1),
(197, 900155107, 'CENCOSUD COLOMBIA S.A', 1, 1),
(198, 860079913, 'A. ESCOBAR & CIA S.A.S', 1, 1),
(199, 900069482, 'EDITORA ACTUALICESE.COM LTDA', 1, 1),
(200, 830054405, 'FONDANT CAKES S.A.S.', 1, 1),
(201, 830138476, 'INVERSIONES F R A LTDA', 1, 1),
(202, 800167847, 'PRODUCTOS FLORESTA S.A.S', 1, 1),
(203, 830101160, 'BIO TRENDS LABORATORIOS SAS', 1, 1),
(204, 900347102, 'SERVYCOPY CANON S.A.S', 1, 1),
(205, 900786869, 'TIENDAROME S.A.S', 1, 1),
(206, 901362455, 'ACCECARS J&P SAS', 1, 1),
(207, 830020860, 'ASOCIACION DE PROPIETARIOS PLAZA DE MERCADO LAS FLORES', 1, 1),
(208, 800185781, 'AEROREPUBLICA S.A', 1, 1),
(209, 830055897, 'PATRIMONIOS AUTONOMOS FIDUCIARIA BOGOTA S.A', 1, 1),
(210, 860500480, 'ALMACENES CORONA S.A.S', 1, 1),
(211, 900343005, 'ALIMENTOS RIE SAS', 1, 1),
(212, 860001371, 'AUTOBOY S A', 1, 1),
(213, 830052998, 'FIDEICOMISOS BBVA ASSET MANAGEMENT S. A. SOCIEDAD FIDUCIARIA', 1, 1),
(214, 900903279, 'AUTOVIA NEIVA GIRARDOT S.A.S', 1, 1),
(215, 860034313, 'BANCO DAVIVIENDA S.A', 1, 1),
(216, 860002964, 'BANCO DE BOGOTA', 1, 1),
(217, 890300279, 'BANCO DE OCCIDENTE', 1, 1),
(218, 890200756, 'BANCO PICHINCHA S A', 1, 1),
(219, 890903938, 'BANCOLOMBIA S.A', 1, 1),
(220, 901095468, 'BKAL S.A.S', 1, 1),
(221, 860013777, 'CAMARA DE COMERCIO COLOMBO AMERICANA QUE TAMBIEN SERA CONOCIDA POR EL NOMBRE COLOMBIAN AMERICAN CHAM', 1, 1),
(222, 860010451, 'CASALIMPIA S.A', 1, 1),
(223, 830037248, 'CODENSA S.A ESP', 1, 1),
(224, 830122566, 'COLOMBIA TELECOMUNICACIONES S.A. E.S.P. BIC', 1, 1),
(225, 800235280, 'CONCESION SABANA DE OCCIDENTE S.A.S', 1, 1),
(226, 900864150, 'CONCESIONARIA ALTERNATIVAS VIALES S.A.S', 1, 1),
(227, 830053700, 'PATRIMONIOS AUTONOMOS ADMINISTRADOS POR LA SOC FIDUCIARIA DAVIVIENDA', 1, 1),
(228, 900053861, 'CONCESIONARIA COVIAL S.A', 1, 1),
(229, 830036556, 'CONCESIONARIA PANAMERICANA S A S', 1, 1),
(230, 891800043, 'COOPERATIVA DE TRANSPORTADORES FLOTAX DUITAMA', 1, 1),
(231, 891800589, 'COOPERATIVA DE TRANSPORTADORES TAX TUNJA COOTAX TUNJA', 1, 1),
(232, 800190463, 'COOPERATIVA INTEGRAL TRANSPORTADORES COMBITA LTDA', 1, 1),
(233, 891855257, 'COOPERATIVA DE TRANSPORTADORES CIUDAD DEL ACERO', 1, 1),
(234, 891800044, 'COOPERATIVA DE TRANSPORTADORES RAPIDO CHICAMOCHA', 1, 1),
(235, 891855325, 'COOPERATIVA DE TRANSPORTADORES DEL SOL', 1, 1),
(236, 860002464, 'CORPORACIÓN DE FERIAS Y EXPOSICIONES S.A. USUARIO OPERADOR DE ZONA FRANCA', 1, 1),
(237, 890207780, 'COOPERATIVA DE TRANSPORTADORES RICAURTE LTDA', 1, 1),
(238, 832006599, 'CSS. CONSTRUCTORES S. A', 1, 1),
(239, 899999114, 'DEPARTAMENTO DE CUNDINAMARCA', 1, 1),
(240, 901209021, 'DEVISAB S.A.S', 1, 1),
(241, 901800671, 'DISTRIBUCIONES CENTER PLAST S.A.S', 1, 1),
(242, 899999094, 'EMPRESA DE ACUEDUCTO Y ALCANTARILLADO DE BOGOTA - ESP', 1, 1),
(243, 900642173, 'ERGONOMUS SAS', 1, 1),
(244, 860062440, 'EXPRESO GAVIOTA S A', 1, 1),
(245, 900219834, 'F2X S.A.S', 1, 1),
(246, 830054060, 'FIDEICOMISOS SOCIEDAD FIDUCIARIA FIDUCOLDEX', 1, 1),
(247, 890327996, 'PROYECTOS DE INFRAESTRUCTURA S.A.S', 1, 1),
(248, 891800075, 'FLOTA SUGAMUXI S.A', 1, 1),
(249, 860009143, 'FLOTA VALLE DE TENZA S.A', 1, 1),
(250, 901579284, 'GRUPO INDUSTRIAL CETINA SAS', 1, 1),
(251, 806000179, 'HOTELES DECAMERON COLOMBIA S.A.S', 1, 1),
(252, 900135270, 'ICF INVERSIONES CON FUTURO S.A.S', 1, 1),
(253, 900258711, 'INSTITUTO DE INFRAESTRUCTURA Y CONCESIONES DE CUNDINAMARCA', 1, 1),
(254, 830000167, 'INSTITUTO NACIONAL DE VIGILANCIA DE MEDICAMENTOS Y ALIMENTOS', 1, 1),
(255, 901226698, 'INVERSIONES 1YA SAS', 1, 1),
(256, 901425938, 'INVERSIONES JIMENEZ ALDANA S.A.S.', 1, 1),
(257, 860533413, 'I R C C S.A.S INDUSTRIA DE RESTAURANTES CASUALES S.A.S', 1, 1),
(258, 901523385, 'IVANA VIDAL REPOSTERÍA SAS', 1, 1),
(259, 800232795, 'TRANSPORTES LA VERDE S.A', 1, 1),
(260, 890704196, 'AEROVIAS DE INTEGRACION REGIONAL S.A', 1, 1),
(261, 891800045, 'COOPERATIVA DE TRANSPORTADORES FLOTA NORTE LTDA COFLONORTE', 1, 1),
(262, 830123461, 'LIMPIEZA METROPOLITANA S A E S P', 1, 1),
(263, 800108272, 'ORGANIZACION COOPERATIVA DE TRANSPORTADORES LOS DELFINES', 1, 1),
(264, 800052869, 'EXPRESO LOS PATRIOTAS S.A', 1, 1),
(265, 860030478, 'LOS TRES ELEFANTES S.A', 1, 1),
(266, 900282527, 'MAYGER LTDA', 1, 1),
(267, 830027339, 'MECANIZADOS EL BLOQUE LTDA', 1, 1),
(268, 830067394, 'MERCADOLIBRE COLOMBIA LTDA', 1, 1),
(269, 901103677, 'MERCADOS REGIONALES SOSIL S.A.S', 1, 1),
(270, 900664736, 'MINICHUMBIE S.A.S', 1, 1),
(271, 900408728, 'NEGOCIOS E INVERSIONES LA PROSPERIDAD SAS', 1, 1),
(272, 800168382, 'NUEVA FLOTA BOYACA S A', 1, 1),
(273, 830054076, 'FIDEICOMISOS SOCIEDAD FIDUCIARIA DE OCCIDENTE SA', 1, 1),
(274, 890203838, 'TRANSPORTES SANTANDER S.A', 1, 1),
(275, 830054539, 'P.A FIDUCIARIA BANCOLOMBIA SA', 1, 1),
(276, 860063095, 'CORPORACION DE COMERCIANTES PLAZA DE MERCADO DE PALOQUEMAO', 1, 1),
(277, 860061403, 'PPC S. A', 1, 1),
(278, 901145808, 'PROMOAMBIENTAL DISTRITO S A S ESP', 1, 1),
(279, 830112317, 'PROMOTORA DE CAFE COLOMBIA SA', 1, 1),
(280, 900333591, 'PROMOTORA LA ROCA S.A.S', 1, 1),
(281, 900843898, 'RAPPI S.A.S', 1, 1),
(282, 901791553, 'RCM MONTACARGAS SAS', 1, 1),
(283, 900118838, 'RUTA DEL SOL II S.A.S', 1, 1),
(284, 860025461, 'COMPAÑIA COMERCIAL E INDUSTRIAL LA SABANA AVESCO S.A.S', 1, 1),
(285, 901051433, 'SCALE SERVICES S.A.S', 1, 1),
(286, 899999061, 'BOGOTA DISTRITO CAPITAL', 1, 1),
(287, 860002183, 'AXA COLPATRIA SEGUROS DE VIDA S.A', 1, 1),
(288, 890310455, 'SERCOFUN LTDA', 1, 1),
(289, 901853922, 'SERVICIOS Y COMERCIOS PALMAGRANDE S.A.S', 1, 1),
(290, 800176089, 'SUPERINTENDENCIA DE INDUSTRIA Y COMERCIO', 1, 1),
(291, 899999007, 'SUPERINTENDENCIA DE NOTARIADO Y REGISTRO', 1, 1),
(292, 899999086, 'SUPERINTENDENCIA DE SOCIEDADES', 1, 1),
(293, 820001359, 'TRANSPORTES EL PINO SABOYA S.A. TRANSPINO S.A', 1, 1),
(294, 900800130, 'TRANSPORTES BRAHMAN S.A.S', 1, 1),
(295, 891801450, 'TRANSPORTES LOS MUISCAS S.A', 1, 1),
(296, 800214444, 'TRANSPORTES REINA S.A', 1, 1),
(297, 800206124, 'TRANSPORTES TISQUESUSA S A', 1, 1),
(298, 901412317, 'ASOCOMUNAL DEL MUNICIPIO DE EL COPEY', 1, 1),
(299, 900676165, 'LIEBER COLOMBIA S.A.S', 1, 1),
(300, 800007813, 'VANTI S.A ESP', 1, 1),
(301, 890700189, 'COOPERATIVA DE TRANSPORTES VELOTAX LIMITADA', 1, 1),
(302, 800256769, 'PATRIMONIOS AUTONOMOS FIDUCIARIA CORFICOLOMBIANA S A', 1, 1),
(303, 900708792, 'WG INGENIERIA Y COMUNICACIONES E & H SAS', 1, 1),
(304, 900373092, 'YUMA CONCESIONARIA S A - EN REORGANIZACION', 1, 1),
(305, 900912212, 'EMPRESA DE SERVICIOS DE TRANSITO DE ZIPAQUIRA SAS - SEM', 1, 1),
(306, 4932490, 'ORTIZ VILLALBA ALEJANDRO', 1, 2),
(307, 23809302, 'SEGURA VARGAS MARIA PIEDAD', 1, 2),
(308, 52479910, 'GONZALEZ JENNY ROCIO', 1, 2),
(309, 52197670, 'TRIANA PEÑUELA DIANA ELIZABETH', 1, 2),
(310, 19301571, 'SANTOS CASTELLANOS LUIS EDUARDO', 1, 2),
(311, 93407827, 'SANDOVAL CIFUENTES JAIME ALBERTO', 1, 2),
(312, 87572123, 'GIRON BEDOYA WALTER ALFONSO', 1, 2),
(313, 19409280, 'GONZALEZ VASQUEZ MIGUEL ANGEL', 1, 2),
(314, 1000730741, 'PACHECO GUTIERREZ JUAN SEBASTIAN', 1, 2),
(315, 1033704710, 'PARRA ACHIPI ANDREY', 1, 2),
(316, 51782187, 'HERNANDEZ HERNANDEZ NUBIA STELLA', 1, 2),
(317, 39543184, 'NOVOA MACIAS MARIA ERISEL', 1, 2),
(318, 1001279870, 'PEREZ RODRIGUEZ DUVAN CAMILO', 1, 2),
(319, 41692666, 'BLANCO MALDONADO LUZ ANTONIA', 1, 2),
(320, 19387160, 'URIBE ROLDAN GABRIEL', 1, 2),
(321, 52217915, 'TOVAR MURILLO GLADYS MILENA', 1, 2),
(322, 80879783, 'LOPEZ SUAREZ JOSE ANTONIO', 1, 2),
(323, 41363619, 'BEJARANO DE MONTAÑO MARIA RITA', 1, 2),
(324, 19483662, 'MARTINEZ CORZO JAIRO', 1, 2),
(325, 41786746, 'FONSECA MARTINEZ YOLANDA', 1, 2),
(326, 17120780, 'PARDO DIAZ JAIRO ANCIZAR', 1, 2),
(327, 19073145, 'MORERA RODRIGUEZ ALVARO', 1, 2),
(328, 79749520, 'SANTANA PEDRO ALFONSO', 1, 2),
(329, 51930728, 'ESTEBAN MYRIAM CARMENZA', 1, 2),
(330, 1063954170, 'PEREZ PEREZ CLAUDIA MARCELA', 1, 2),
(331, 70506203, 'MESA AGUDELO TULIO ALBERTO', 1, 2),
(332, 359950, 'SABOGAL LUIS', 1, 2),
(333, 3000423, 'RINCON COTRINO HECTOR FRANCISCO', 1, 2),
(334, 3210065, 'BOADA RIAÑO MARCO ANTONIO', 1, 2),
(335, 3232132, 'RAMOS VANEGAS PABLO HONORIO', 1, 2),
(336, 4215999, 'LOPEZ BARRERA EPIMENIO', 1, 2),
(337, 4234542, 'PACACIRA IBAÑEZ JOSE MANUEL', 1, 2),
(338, 4281445, 'BELTRAN CARDENAS WILLIAM', 1, 2),
(339, 4408472, 'CARDENAS MARQUEZ ELIUD', 1, 2),
(340, 5576625, 'RUEDA LUIS POMPEYO', 1, 2),
(341, 6762650, 'SUAREZ MOJICA NUMAEL', 1, 2),
(342, 7685352, 'QUIZA NARVAEZ GUILLERMO', 1, 2),
(343, 11409751, 'LEAL VANEGAS FERNANDO', 1, 2),
(344, 14940956, 'ERAZO REINA EMIRO RIGOBERTO', 1, 2),
(345, 16460539, 'GONZALEZ VALENCIA JHON DAVID', 1, 2),
(346, 17096348, 'PARRAGA MORALEZ EDWIN', 1, 2),
(347, 17152789, 'MENDOZA MENDOZA ANGEL ALBERTO', 1, 2),
(348, 17170377, 'PINEDA ARISTIZABAL JORGE ARTURO', 1, 2),
(349, 17309089, 'ROMERO MARTINEZ FERNANDO', 1, 2),
(350, 17647916, 'FAJARDO GONZALEZ EFREN JOSE', 1, 2),
(351, 19225631, 'FERNANDEZ CAICEDO GONZALO RICARDO', 1, 2),
(352, 19339699, 'PACHON GONZALEZ JORGE ENRIQUE', 1, 2),
(353, 19436928, 'RAMIREZ BERNAL JORGE OSWALDO', 1, 2),
(354, 19460200, 'BASTIDAS GIL HIPOLITO', 1, 2),
(355, 19498565, 'GUERRERO DIAZ ANGEL ANIVAL', 1, 2),
(356, 24815557, 'ARIAS RAMOS ERIKA FERNANDA', 1, 2),
(357, 27160173, 'IBARRA VALENZUELA CUSTODIA JAEL', 1, 2),
(358, 28204970, 'SANTAMARIA QUIROGA LETICIA', 1, 2),
(359, 28535394, 'ANDRADE MORALES ELIZABETH', 1, 2),
(360, 37014797, 'BASTIDAS ROSERO LUCY ANALITH', 1, 2),
(361, 39729649, 'CARRILLO SAAVEDRA LUZ MARY', 1, 2),
(362, 39797006, 'AGUIRRE MEJIA NORMA CECILIA', 1, 2),
(363, 40993160, 'SALCEDO VARGAS KAROL BEYKER', 1, 2),
(364, 41405486, 'GUITIERREZ RUIZ MIRYAM', 1, 2),
(365, 41425559, 'RAMIREZ GUZMAN GILMA CECILIA', 1, 2),
(366, 41456223, 'JIMENEZ CASTRO BLANCA NELSY', 1, 2),
(367, 41504804, 'PEREZ NEPTA MARIA CONCEPCION', 1, 2),
(368, 41553819, 'MONTEJO VANEGAS EUGENIA', 1, 2),
(369, 41732474, 'ARENAS BLANCO ANA JOAQUINA', 1, 2),
(370, 45529545, 'CONTRERAS DE LA ROSA ELIN JOHANNA', 1, 2),
(371, 45534175, 'ZUÑIGA GUZMAN YURGANIS DEL CARMEN', 1, 2),
(372, 51641056, 'BLANCO SANCHEZ CARMEN MYRIAM', 1, 2),
(373, 51734687, 'BARON QUIJANO GLORIA', 1, 2),
(374, 51857754, 'QUETGLAS BERMUDEZ ADRIANA MARIA', 1, 2),
(375, 52017204, 'MOYANO RODRIGUEZ MERY YOLANDA', 1, 2),
(376, 52061998, 'CARDENAS MONTEJO DIANA', 1, 2),
(377, 52071036, 'VALENCIA ZULUAGA SONIA', 1, 2),
(378, 52211654, 'ESCOBAR PEDRAZA SANDRA PATRICIA', 1, 2),
(379, 52263295, 'MONTAÑO BEJARANO ADRIANA MARCELA', 1, 2),
(380, 52349421, 'ALVAREZ ESPITIA MONICA HAYDE', 1, 2),
(381, 52470161, 'MORERA RUGELES YENNY ASTRID', 1, 2),
(382, 52487431, 'LAGO VELANDIA ZULY ANDREA', 1, 2),
(383, 52544813, 'ARCINIEGAS ARCINIEGAS FLORALBA', 1, 2),
(384, 52557605, 'CORREA SANCHEZ YENY PATRICIA', 1, 2),
(385, 52711001, 'RODRIGUEZ MARROQUIN KAROL JOHANNA', 1, 2),
(386, 53007045, 'PARRAGA GUTIERREZ DIANA', 1, 2),
(387, 65634216, 'VARON SOTO DIANA PAOLA', 1, 2),
(388, 65731647, 'BRAVO GIRALDO GLADYS ASTRID', 1, 2),
(389, 70825672, 'GOMEZ GIRALDO JAIRO ALFREDO', 1, 2),
(390, 77184049, 'URREGO CORRALES BERNARDO ALCIDES', 1, 2),
(391, 79156709, 'SANCHEZ RUEDA JUAN PABLO', 1, 2),
(392, 79156710, 'SANCHEZ RUEDA LUIS IGNACIO', 1, 2),
(393, 79205543, 'MORALES SAAVEDRA JOSE LUIS', 1, 2),
(394, 79216575, 'ALVAREZ AVILA ORLANDO', 1, 2),
(395, 79279298, 'DIAZ MORENO ORLANDO', 1, 2),
(396, 79353925, 'SALAZAR NEVA LUIS ENRIQUE', 1, 2),
(397, 79424432, 'MURILLO MURILLO IDELMAN', 1, 2),
(398, 79473451, 'PATIÑO MEDINA JOHNSON', 1, 2),
(399, 79485564, 'HURTADO VILLADA JOHN JAIRO', 1, 2),
(400, 79498889, 'ESPEJO BELTRAN ALVARO FERNANDO', 1, 2),
(401, 79515570, 'FORERO JOSE JAIME', 1, 2),
(402, 79581746, 'CASTRO MUÑOZ MARCO ANTONIO', 1, 2),
(403, 79616487, 'TIGUAQUE SARMIENTO GABRIEL ALEXANDER', 1, 2),
(404, 79655735, 'MARTINEZ ACUÑA JOSE ALFONSO', 1, 2),
(405, 79707544, 'GONZALEZ MORALES ANDRES', 1, 2),
(406, 79752324, 'HUERTAS BUSTAMANTE FREDY ALDEMAR', 1, 2),
(407, 79826061, 'CARO ALARCON PREDRO JOSE', 1, 2),
(408, 79886792, 'DIAZ ARDILA JIMMY', 1, 2),
(409, 79973490, 'CONTRERAS MENDEZ ELMER EDUARDO', 1, 2),
(410, 80130944, 'TOVAR OVALLE OSCAR JAVIER', 1, 2),
(411, 80168687, 'RUBIO GALVIS HARBEY', 1, 2),
(412, 80371580, 'PAEZ RAMIREZ ERNESTO', 1, 2),
(413, 80374182, 'SANDOVAL ROJAS HUGO ALBERTO', 1, 2),
(414, 88288690, 'DIAZ SANABRIA PEDRO ALFONSO', 1, 2),
(415, 91018720, 'INFANTE AYALA DEIVI LORENZO', 1, 2),
(416, 91257863, 'GAMBOA SAAVEDRA EDUARDO', 1, 2),
(417, 93117819, 'CABRERA DUCUARA RICARDO', 1, 2),
(418, 93361826, 'ROMERO VARGAS LEONEL', 1, 2),
(419, 93377712, 'ANDRADE MAHECHA DIEGO ALBERTO', 1, 2),
(420, 93405060, 'VACA HAMID NAICIPE', 1, 2),
(421, 98561320, 'SERNA URREGO JESUS MARIA', 1, 2),
(422, 700281264, 'MEJIAS ROMERO JESUS ALFONSO', 1, 2),
(423, 1000319260, 'MONTENEGRO MORENO CRISTIAN CAMILO', 1, 2),
(424, 1000983988, 'DIAZ GONZALEZ ANGELA VIVIANA', 1, 2),
(425, 1000988711, 'PRECIADO LANCHEROS MANUEL ANTONIO', 1, 2),
(426, 1012335592, 'RIVERA JHON ALEXANDER', 1, 2),
(427, 1012392049, 'GUZMAN ORTIZ LEIDY MARCELA', 1, 2),
(428, 1022369256, 'SANTAMARIA SANCHEZ JUAN CARLOS', 1, 2),
(429, 1022378271, 'PARRAGA GUTIERREZ EDWIN LEONARDO', 1, 2),
(430, 1022929890, 'NAVARRO ROZO DAVID ESTEBAN', 1, 2),
(431, 1022958020, 'VANEGAS IBAÑEZ EDWIN JAIR', 1, 2),
(432, 1026588819, 'LOZANO REYES ANGIE VIVIANA', 1, 2),
(433, 1030556510, 'FRESNEDA HURTADO DIERSON RUBEN', 1, 2),
(434, 1030608337, 'SOLANO RODRIGUEZ LEYDEN GEASSETTE', 1, 2),
(435, 1030611968, 'LUQUE VILLAMIL RICHARD DAVID', 1, 2),
(436, 1032365342, 'PARRAGA GUTIERREZ GERMAN ALFONSO', 1, 2),
(437, 1033788958, 'LOMBANA JIMENEZ CRISTIAN SKANDER', 1, 2),
(438, 1058818321, 'AGUDELO MARIN JOHAN', 1, 2),
(439, 1069257749, 'MORENO MORENO YOHNY ALEJANDRO', 1, 2),
(440, 1084847158, 'VALLEJO IBARRA MAURICIO HERNAN', 1, 2),
(441, 1085635165, 'LEGARDA NASTUL WILSON FERNEY', 1, 2),
(442, 1085917767, 'USAMA YAMA NESTOR DANILO', 1, 2),
(443, 1093772514, 'ALVIAREZ NOGALES RUDDY JERITZA', 1, 2),
(444, 1193032990, 'LAURA MARIA ESTRADA SUAREZ', 1, 2),
(445, 1057215167, 'AGUILERA GONZALEZ CRISTIAN MAURICIO', 1, 2),
(446, 80275610, 'ALVAREZ TINOCO JOSE RAFAEL', 1, 2),
(447, 79892139, 'AMEZQUITA MORENO LUIS HERNANDO', 1, 2),
(448, 1067725324, 'ARRIETA NIÑO RUBEN DARIO', 1, 2),
(449, 46356574, 'BARRERA BARRERA FLOR ISMELDA', 1, 2),
(450, 91528024, 'BONILLA CORSO JOHN HAMILSON', 1, 2),
(451, 19329277, 'CABALLERO MILLAN LUIS ANTONIO', 1, 2),
(452, 1103364654, 'CALA AGUEDELO JUAN CARLOS', 1, 2),
(453, 1003614126, 'CASTILLO DIAZ NICHOLLE SOFIA', 1, 2),
(454, 52230602, 'CORTES SANABRIA MARITZA', 1, 2),
(455, 40780475, 'DURAN HUERGO CLAUDIA BIBIANA', 1, 2),
(456, 39651009, 'GALLEGO VIDAL SANDRA PATRICIA', 1, 2),
(457, 1013654518, 'GAMBOA CRISTANCHO OSCAR DANIEL', 1, 2),
(458, 79756176, 'GARAVITO BERNAL MANUEL RENE', 1, 2),
(459, 1038413409, 'GOMEZ DUQUE CRHISTIAN CAMILO', 1, 2),
(460, 52852281, 'GONZALEZ CRISTANCHO NIDIA YAZMIN', 1, 2),
(461, 2369978, 'JIMENEZ BEDOYA LUIS ABEL', 1, 2),
(462, 98363037, 'LARA PALMA YONNY JESUS', 1, 2),
(463, 76306165, 'LOPEZ HERNANDEZ WILLIAM', 1, 2),
(464, 80125262, 'MAHECHA SAENZ JUAN CARLOS', 1, 2),
(465, 46681281, 'MARTINEZ GIL FLOR ESPERANZA', 1, 2),
(466, 74323115, 'MATEUS VALDERRAMA JOSE JAIRO', 1, 2),
(467, 13720959, 'NOVA GARCIA CESAR JULIAN', 1, 2),
(468, 1013587942, 'ORTIZ SANCHEZ JENNIFER PATRICIA', 1, 2),
(469, 39533506, 'PARDO PARDO ANA RAQUEL', 1, 2),
(470, 7318717, 'IBAGUE PINILLA GUILLERMO ALFONSO', 1, 2),
(471, 26172945, 'PETRO MORENO MARIA CATALINA', 1, 2),
(472, 1024565534, 'PINZON CARDENAS ANGIE PAOLA', 1, 2),
(473, 1082855966, 'QUINTERO CELIS MIGUEL ANTONIO', 1, 2),
(474, 1051287672, 'REYES RIVERA JHON LEANDRO', 1, 2),
(475, 79218198, 'RODRIGUEZ CAÑON OSCAR JAVIER', 1, 2),
(476, 37085217, 'RODRIGUEZ OVIEDO PAOLA ANDREA', 1, 2),
(477, 12276038, 'SALAZAR RIVERA OSCAR SANDRO', 1, 2),
(478, 79910480, 'SALCEDO ROMERO LUIS ALBERTO', 1, 2),
(479, 1010180238, 'SANTA CRUZ NIETO LUISA FERNANDA', 1, 2),
(480, 1233498896, 'TAFUR OBANDO LINA MARIA', 1, 2),
(481, 1114888008, 'TROCHEZ MEDINA LILIANA', 1, 2),
(482, 8870470, 'VELEZ MONTOYA JOHN DARWIN', 1, 2),
(483, 1136882776, 'VERDUGO VELANDIA GIOVANY ENRIQUE', 1, 2),
(484, 21183918, 'VERGARA ALVARADO JUANA GUISELLY', 1, 2),
(485, 1023880515, 'ZAROMA LOPEZ MARYLUZ', 1, 2),
(486, 830033279, 'QUIMERCO S.A.S', 1, 1);

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
(45, 'Directivos', 5, 501, 1),
(46, 'Logistica', 5, 502, 1),
(47, 'Ventas', 5, 503, 1),
(48, 'Sin revisar', 6, 601, 1),
(49, 'Primera Revisión', 6, 602, 1),
(50, 'Revisada', 6, 603, 1),
(51, 'Entregada', 6, 604, 1),
(52, 'Pagada', 6, 605, 1),
(53, 'En novedad', 6, 606, 1),
(54, 'Fumigaciones', 2, 211, 1),
(55, 'Analisis de laboratorio', 2, 212, 1),
(56, 'Compras ocasionales', 2, 213, 1),
(57, 'XS', 8, 801, 1),
(58, 'S', 8, 802, 1),
(59, 'M', 8, 803, 1),
(60, 'L', 8, 804, 1),
(61, 'XL', 8, 805, 1),
(62, 'XXL', 8, 806, 1),
(63, '28', 9, 901, 1),
(64, '30', 9, 902, 1),
(65, '32', 9, 903, 1),
(66, '34', 9, 904, 1),
(67, '36', 9, 905, 1),
(68, '36', 10, 1001, 1),
(69, '37', 10, 1002, 1),
(70, '38', 10, 1003, 1),
(71, '39', 10, 1004, 1),
(72, '40', 10, 1005, 1),
(73, '41', 10, 1006, 1),
(74, '42', 10, 1007, 1),
(75, '43', 10, 1008, 1),
(76, '44', 10, 1009, 1),
(77, 'Pantalón', 7, 701, 1),
(78, 'Camisa', 7, 702, 1),
(79, 'Chaqueta', 7, 703, 1),
(80, 'Botas', 7, 704, 1),
(81, 'Guantes', 7, 705, 1),
(82, '4', 11, 1101, 1),
(83, '5', 11, 1102, 1),
(84, '6', 11, 1103, 1),
(85, '7', 11, 1104, 1),
(86, '8', 11, 1105, 1),
(87, '9', 11, 1106, 1),
(88, '10', 11, 1107, 1),
(89, '11', 11, 1108, 1),
(90, 'Gris', 12, 1201, 1),
(91, 'Negro', 12, 1202, 1),
(92, 'Vino tinto', 12, 1203, 1),
(93, 'Azul oscuro', 12, 1204, 1),
(94, 'Azul rey', 12, 1205, 1),
(95, 'Beige', 12, 1206, 1),
(96, 'Lunes', 13, 1301, 1),
(97, 'Martes', 13, 1302, 1),
(98, 'Miércoles', 13, 1303, 1),
(99, 'Jueves', 13, 1304, 1),
(100, 'Viernes', 13, 1305, 1),
(101, 'Sábado', 13, 1306, 1),
(102, 'Artepan', 14, 1401, 1),
(103, 'PMP', 14, 1402, 1),
(104, 'Del llano', 14, 1403, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  ADD PRIMARY KEY (`idalm`);

--
-- Indices de la tabla `ccxent`
--
ALTER TABLE `ccxent`
  ADD KEY `ident` (`ident`),
  ADD KEY `idvdia` (`idvdia`),
  ADD KEY `idvcol` (`idvcol`);

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`iddom`);

--
-- Indices de la tabla `dotacion`
--
ALTER TABLE `dotacion`
  ADD PRIMARY KEY (`ident`),
  ADD KEY `idperent` (`idperent`),
  ADD KEY `idperrec` (`idperrec`),
  ADD KEY `idperentd` (`idperentd`),
  ADD KEY `idperrecd` (`idperrecd`),
  ADD KEY `estent` (`estent`);

ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idprm`),
  ADD KEY `idjef` (`idjef`),
  ADD KEY `idvtprm` (`idvtprm`),
  ADD KEY `idper` (`idper`),
  ADD KEY `idvubi` (`idvubi`);


--
-- Indices de la tabla `dotxent`
--
ALTER TABLE `dotxent`
  ADD KEY `ident` (`ident`),
  ADD KEY `idvdot` (`idvdot`),
  ADD KEY `idvtal` (`idvtal`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfac`),
  ADD KEY `idemp` (`idemp`),
  ADD KEY `tipfac` (`tipfac`),
  ADD KEY `forpag` (`forpag`),
  ADD KEY `estfac` (`estfac`),
  ADD KEY `numbod` (`numbod`),
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
  ADD PRIMARY KEY (`idped`),
  ADD KEY `idalm` (`idalm`),
  ADD KEY `idper` (`idper`);

--
-- Indices de la tabla `pefxmod`
--
ALTER TABLE `pefxmod`
  ADD KEY `idmod` (`idmod`),
  ADD KEY `idpef` (`idpef`),
  ADD KEY `idpag` (`idpag`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idpef`);

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
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`idemp`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`idval`),
  ADD KEY `iddom` (`iddom`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  MODIFY `idalm` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dominio`
--


ALTER TABLE `dominio`
  MODIFY `iddom` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `dotacion`
--
ALTER TABLE `dotacion`
  MODIFY `ident` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `permiso`
  MODIFY `idprm` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfac` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `idnov` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idpag` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idped` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idpef` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idper` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `provedores`
--
ALTER TABLE `provedores`
  MODIFY `idemp` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `idval` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ccxent`
--
ALTER TABLE `ccxent`
  ADD CONSTRAINT `ccxent__ibfk_1` FOREIGN KEY (`ident`) REFERENCES `dotacion` (`ident`);

--
-- Filtros para la tabla `dotacion`
--
ALTER TABLE `dotacion`
  ADD CONSTRAINT `dotacion_ibfk_1` FOREIGN KEY (`idperent`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `dotacion_ibfk_2` FOREIGN KEY (`idperrec`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `dotacion_ibfk_3` FOREIGN KEY (`idperentd`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `dotacion_ibfk_4` FOREIGN KEY (`idperrecd`) REFERENCES `persona` (`idper`);


ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`idjef`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`idper`) REFERENCES `persona` (`idper`);

--
-- Filtros para la tabla `dotxent`
--
ALTER TABLE `dotxent`
  ADD CONSTRAINT `dotxent__ibfk_1` FOREIGN KEY (`ident`) REFERENCES `dotacion` (`ident`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idemp`) REFERENCES `provedores` (`idemp`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idpercre`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idperrev`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`idperapr`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`idperent`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_6` FOREIGN KEY (`idperpag`) REFERENCES `persona` (`idper`),
  ADD CONSTRAINT `factura_ibfk_7` FOREIGN KEY (`idpernov`) REFERENCES `persona` (`idper`);

--
-- Filtros para la tabla `novedad`
--
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
-- Filtros para la tabla `pefxmod`
--
ALTER TABLE `pefxmod`
  ADD CONSTRAINT `pefxmod_ibfk_1` FOREIGN KEY (`idmod`) REFERENCES `modulo` (`idmod`),
  ADD CONSTRAINT `pefxmod_ibfk_2` FOREIGN KEY (`idpef`) REFERENCES `perfil` (`idpef`);

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
