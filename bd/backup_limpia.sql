-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2017 a las 01:55:31
-- Versión del servidor: 10.0.28-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u258201550_inia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
  `Cod_ana` int(11) NOT NULL,
  `Nom_ana` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `Precio_ana` int(11) NOT NULL,
  `Tipo` int(1) NOT NULL,
  `estatus` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'On' COMMENT 'estado del analisis'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`Cod_ana`, `Nom_ana`, `Precio_ana`, `Tipo`, `estatus`) VALUES
(1, 'nematodos', 252, 1, 'On'),
(3, 'Macro elementos', 2502, 2, 'On'),
(9, 'Bacterias', 300, 1, 'On'),
(10, 'Ph Relación', 200, 2, 'On'),
(11, 'Fósforo Disponible', 300, 2, 'On'),
(12, 'Hongos', 100, 1, 'On'),
(13, 'Textura Método de Bouyucos', 200, 2, 'On'),
(14, 'Potasio Disponible', 300, 2, 'On'),
(15, 'Magnesio Disponible', 300, 2, 'On'),
(16, 'Materia Organica', 200, 2, 'On'),
(17, 'Conductividad Electrica', 140, 2, 'On'),
(18, 'Recomendaciones De Fertilidad', 300, 2, 'On'),
(19, 'Micro Elementos', 600, 2, 'On'),
(20, 'Aluminio Intercambiable', 300, 2, 'On');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayudante`
--

CREATE TABLE IF NOT EXISTS `ayudante` (
  `aiso` int(5) unsigned zerofill NOT NULL COMMENT 'AutoIncrementable Solicitud',
  `aims` int(5) unsigned zerofill NOT NULL COMMENT 'AutoIncrementable muestra suelo',
  `aimf` int(5) unsigned zerofill NOT NULL COMMENT 'AutoIncrementable muestra fito',
  `ano` int(4) unsigned NOT NULL COMMENT 'ultimo año',
  `id` int(2) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ayudante`
--

INSERT INTO `ayudante` (`aiso`, `aims`, `aimf`, `ano`, `id`) VALUES
(00000, 00000, 00000, 2017, 01);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `Ced_cliente` int(11) NOT NULL,
  `Nom_cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apelli_cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Contacto` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'No',
  `Telf_cliente` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `Dire_cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Nat_jur` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'V',
  `tipoUser` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `tipOrg` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE IF NOT EXISTS `especialista` (
  `Ced_esp` int(11) NOT NULL,
  `Cod_lab` int(11) NOT NULL,
  `Nom_esp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Ape_esp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telf_esp` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`Ced_esp`, `Cod_lab`, `Nom_esp`, `Ape_esp`, `Telf_esp`, `Especialidad`) VALUES
(22280499, 1, 'Ines', 'Benitez', '0416-6716229', 'Hongos y nematodos'),
(23721512, 2, 'Benito', 'Gutierrez', '0412-1379717', 'PH y texturas'),
(24191165, 2, 'Josman', 'Mora', '0274-9961608', 'Texturas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `Cod_fact` int(11) NOT NULL,
  `Ced_cliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Tipo_pago` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Forma_pago` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Bauche` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `exento` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `base` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `iva` int(2) DEFAULT NULL,
  `retencion` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alicuota` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ivaporc` int(2) NOT NULL,
  `exentoporc` int(2) NOT NULL,
  `Estatus` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'impaga'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fact_descripcion`
--

CREATE TABLE IF NOT EXISTS `fact_descripcion` (
  `Id_fact_produc` int(11) NOT NULL,
  `Cod_fact` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL DEFAULT '1',
  `Costo_unidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Cod_produ` int(11) DEFAULT NULL,
  `cod_ana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE IF NOT EXISTS `finca` (
  `Cod_fin` int(4) NOT NULL,
  `Ced_cliente` int(11) NOT NULL,
  `Nom_fin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Municipio` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `Parroquia` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE IF NOT EXISTS `intentos` (
  `id` int(9) unsigned zerofill NOT NULL COMMENT 'Contador de inicio de sesion',
  `user_id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha del intento fallido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE IF NOT EXISTS `iva` (
  `id` int(10) NOT NULL,
  `iva` decimal(5,2) unsigned NOT NULL,
  `dia` int(2) unsigned NOT NULL,
  `mes` int(2) unsigned NOT NULL,
  `ano` int(4) unsigned NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `reten` decimal(5,2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `Cod_lab` int(11) NOT NULL,
  `Nom_lab` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'On'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`Cod_lab`, `Nom_lab`, `estatus`) VALUES
(1, 'Fitopatología', 'On'),
(2, 'Suelo', 'On');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `id` int(11) NOT NULL,
  `ci` int(9) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(128) COLLATE utf8_spanish_ci NOT NULL,
  `salt` char(128) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `aprobacion` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Off',
  `privilegios` int(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Privilegios de la persona',
  `block` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Usuario bloqueado por max intentos hechos al iniciar sesion',
  `jefe` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Si es jefe de laboratorio'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de inicio de sesion seguro';

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id`, `ci`, `usuario`, `apellido`, `email`, `password`, `salt`, `pregunta`, `respuesta`, `aprobacion`, `privilegios`, `block`, `jefe`) VALUES
(1, 17896569, 'Jose Luis', 'Rivera', 'jlrivera@inia.gob.ve', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '', '1', 'c6113d386edd46b2ff44e4eab60aa73a8caf87ba83e9aac45e32c00ca6aa8e169056726c0ce93a7da786ce82bd23fb29fc8c8768ff66921a0f8930ac07e64606', 'On', 4, 0, 0),
(2, 20709289, 'Jorge', 'Castellano', 'jorgecm14@gmail.com', 'b825cf2f6db03ba3a62f043cfa244f79b4c71e8476fa393921c1a417fffc8b0f9fc667d556d4fbe9bea8ee09b8e93efedcff058b995e5ec54457b6e45bde0b1d', '', '1', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'On', 1, 0, 0),
(3, 24191165, 'Josman', 'Mora', 'aromyosman@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '', '1', 'd97dfd1e4d1d083a06deb82c6779d9ade3fe5c20603bff0376f905b01e0cd7cbfe04471a057b0e5700973b9d91279c42801ceb7fab9f57e4f37ada9285d1a648', 'On', 2, 0, 0),
(4, 22280499, 'Ines', 'Benitez', 'ines.benitez2@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '', '9', 'f50c18fbf32633fb597094da976713b524d23d2b05de9a4567aa98efedbfaabbfed97ea9e791b63af5d9970d3009e40a96847f55dd7e31b0aeda05d2c44f0a91', 'On', 2, 0, 1),
(5, 23721512, 'Benito', 'Gutierrez', 'benitodelapaz@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '', '8', 'e27eccae53df8821d2eaa9f07b81c9fbea566bee7c5d35946bf48ecc515f7a412f9cf27c03effcbb1a8148852b2fa6680df1ff3ee63bf3e33f6dbbcd7498b3fe', 'On', 2, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra`
--

CREATE TABLE IF NOT EXISTS `muestra` (
  `id` int(9) NOT NULL,
  `Cod_muestra` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_m` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cult_act` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nro_pl` int(10) NOT NULL,
  `Edad_cul` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Tam_lote` float NOT NULL,
  `Topografia` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Dist_siembra` varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Riego` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cult_ant` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `F_toma` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Practicas` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Produc_dosis` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Epoca_aplic` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Modo_aplic` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Pobl_cercana` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Profundidad` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Inundacion` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `T_vege` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Rend_cult` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Restos` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descrip_fito` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Id_microorg` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Sintomas` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `F_sintomas` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Causa` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_plant` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nro_subm` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Origen_sem` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Pres_microorg` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Dist_planafect` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Parts_afect` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Text_sue` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Composicion` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Hum_sue` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Drenaje` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Controles` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Produc_dosisb` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Cond_agroclima` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Recomendar` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Finca` int(4) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estatus` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'esper_espec'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra_especialista`
--

CREATE TABLE IF NOT EXISTS `muestra_especialista` (
  `id` int(6) NOT NULL,
  `idm` int(9) NOT NULL,
  `Ced_esp` int(11) NOT NULL,
  `Tipo` int(1) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `Cod_produ` int(11) NOT NULL,
  `Nom_produ` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Existencia` int(11) NOT NULL,
  `Precio_produ` int(11) NOT NULL,
  `I_E` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `um` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rec_suelo`
--

CREATE TABLE IF NOT EXISTS `rec_suelo` (
  `id` int(8) NOT NULL,
  `Cod_suelo` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `Ced_esp` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `TituloA` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `DescripcionA` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `TituloB` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DescripcionB` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_fito`
--

CREATE TABLE IF NOT EXISTS `r_fito` (
  `Cod_rfito` int(11) NOT NULL,
  `Ced_esp` int(11) NOT NULL,
  `Cod_fito` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Hongos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Bacterias` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nematodos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Recomendaciones` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_suelo`
--

CREATE TABLE IF NOT EXISTS `r_suelo` (
  `Cod_rsuelo` int(6) NOT NULL,
  `Ced_esp` int(11) NOT NULL,
  `Cod_suelo` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Are` double DEFAULT NULL,
  `Lim` double DEFAULT NULL,
  `Arc` double DEFAULT NULL,
  `Tex` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Grup` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fos` int(4) DEFAULT NULL,
  `FosL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pot` int(4) DEFAULT NULL,
  `PotL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ca` int(4) DEFAULT NULL,
  `CaL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Mag` int(4) DEFAULT NULL,
  `MagL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Mat` double DEFAULT NULL,
  `MatL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PH` double DEFAULT NULL,
  `PHL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Con` double DEFAULT NULL,
  `ConL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Alu` double DEFAULT NULL,
  `AluL` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `gai_sol` int(5) unsigned zerofill NOT NULL COMMENT 'auto incrementable para generar codigo oficial',
  `Cod_sol` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_cliente` int(11) NOT NULL,
  `Estatus` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'inicio',
  `Fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_analisis`
--

CREATE TABLE IF NOT EXISTS `solicitud_analisis` (
  `Id_sa` int(11) NOT NULL,
  `Cod_sol` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_ana` int(11) NOT NULL,
  `Cod_muestra` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`Cod_ana`);

--
-- Indices de la tabla `ayudante`
--
ALTER TABLE `ayudante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Ced_cliente`),
  ADD UNIQUE KEY `UQ_CLIENTE_Telf_cliente` (`Telf_cliente`),
  ADD UNIQUE KEY `Id_cliente` (`Id_cliente`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`Ced_esp`),
  ADD UNIQUE KEY `UQ_ESPECIALISTA_Telf_esp` (`Telf_esp`),
  ADD KEY `Cod_lab` (`Cod_lab`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Cod_fact`),
  ADD UNIQUE KEY `UQ_FACTURA_Bauche` (`Bauche`),
  ADD KEY `Ced_cliente` (`Ced_cliente`);

--
-- Indices de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  ADD PRIMARY KEY (`Id_fact_produc`),
  ADD KEY `cod_ana` (`cod_ana`),
  ADD KEY `Cod_fact` (`Cod_fact`),
  ADD KEY `Cod_produ` (`Cod_produ`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`Cod_fin`),
  ADD KEY `Ced_cliente` (`Ced_cliente`);

--
-- Indices de la tabla `intentos`
--
ALTER TABLE `intentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dia` (`dia`,`mes`,`ano`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`Cod_lab`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Cod_muestra` (`Cod_muestra`),
  ADD KEY `Finca` (`Finca`);

--
-- Indices de la tabla `muestra_especialista`
--
ALTER TABLE `muestra_especialista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idm` (`idm`),
  ADD KEY `Ced_esp` (`Ced_esp`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_produ`);

--
-- Indices de la tabla `rec_suelo`
--
ALTER TABLE `rec_suelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `r_fito`
--
ALTER TABLE `r_fito`
  ADD PRIMARY KEY (`Cod_rfito`),
  ADD KEY `Ced_esp` (`Ced_esp`),
  ADD KEY `Cod_fito` (`Cod_fito`);

--
-- Indices de la tabla `r_suelo`
--
ALTER TABLE `r_suelo`
  ADD PRIMARY KEY (`Cod_rsuelo`),
  ADD KEY `Ced_esp` (`Ced_esp`),
  ADD KEY `Cod_suelo` (`Cod_suelo`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`gai_sol`),
  ADD UNIQUE KEY `Cod_sol` (`Cod_sol`),
  ADD KEY `Cod_cliente` (`Cod_cliente`);

--
-- Indices de la tabla `solicitud_analisis`
--
ALTER TABLE `solicitud_analisis`
  ADD PRIMARY KEY (`Id_sa`),
  ADD KEY `Cod_ana` (`Cod_ana`),
  ADD KEY `Cod_suelo` (`Cod_muestra`),
  ADD KEY `Cod_sol` (`Cod_sol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `Cod_ana` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `ayudante`
--
ALTER TABLE `ayudante`
  MODIFY `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Cod_fact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  MODIFY `Id_fact_produc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `Cod_fin` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id` int(9) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Contador de inicio de sesion';
--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `Cod_lab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `muestra`
--
ALTER TABLE `muestra`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `muestra_especialista`
--
ALTER TABLE `muestra_especialista`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_produ` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rec_suelo`
--
ALTER TABLE `rec_suelo`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `r_suelo`
--
ALTER TABLE `r_suelo`
  MODIFY `Cod_rsuelo` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `gai_sol` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'auto incrementable para generar codigo oficial';
--
-- AUTO_INCREMENT de la tabla `solicitud_analisis`
--
ALTER TABLE `solicitud_analisis`
  MODIFY `Id_sa` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD CONSTRAINT `especialista_ibfk_1` FOREIGN KEY (`Cod_lab`) REFERENCES `laboratorio` (`Cod_lab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Ced_cliente`) REFERENCES `cliente` (`Ced_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  ADD CONSTRAINT `fact_descripcion_ibfk_1` FOREIGN KEY (`Cod_fact`) REFERENCES `factura` (`Cod_fact`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_descripcion_ibfk_2` FOREIGN KEY (`Cod_produ`) REFERENCES `producto` (`Cod_produ`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_descripcion_ibfk_3` FOREIGN KEY (`cod_ana`) REFERENCES `analisis` (`Cod_ana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `finca`
--
ALTER TABLE `finca`
  ADD CONSTRAINT `finca_ibfk_1` FOREIGN KEY (`Ced_cliente`) REFERENCES `cliente` (`Ced_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_fito`
--
ALTER TABLE `r_fito`
  ADD CONSTRAINT `FK_R_FITO_ESPECIALISTA` FOREIGN KEY (`Ced_esp`) REFERENCES `especialista` (`Ced_esp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `FK_SOLICITUD_CLIENTE` FOREIGN KEY (`Cod_cliente`) REFERENCES `cliente` (`Ced_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_analisis`
--
ALTER TABLE `solicitud_analisis`
  ADD CONSTRAINT `FK_SOLI_ANA_SOL` FOREIGN KEY (`Cod_sol`) REFERENCES `solicitud` (`Cod_sol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_analisis_ibfk_1` FOREIGN KEY (`Cod_ana`) REFERENCES `analisis` (`Cod_ana`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
