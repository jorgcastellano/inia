-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-07-2016 a las 17:43:10
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inicio_seguro`
--
CREATE DATABASE IF NOT EXISTS `inicio_seguro` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `inicio_seguro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE IF NOT EXISTS `intentos` (
  `id` int(9) unsigned zerofill NOT NULL COMMENT 'Contador de inicio de sesion',
  `user_id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha del intento fallido'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `intentos`
--

INSERT INTO `intentos` (`id`, `user_id`, `fecha`) VALUES
(000000001, 'jorgecm14@gmail.com', '2016-07-02 21:41:12');

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
  `block` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Usuario bloqueado por max intentos hechos al iniciar sesion'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de inicio de sesion seguro';

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id`, `ci`, `usuario`, `apellido`, `email`, `password`, `salt`, `pregunta`, `respuesta`, `aprobacion`, `privilegios`, `block`) VALUES
(12, 17896569, 'Jose Luis', 'Rivera', 'jlrivera@inia.gob.ve', '283fac8fe3fd80e91afef9523495012eefeaadee0ca59c8337666f3eb8504769090bbf6e7ff310e78ce4580165011f13411865e36992a872836ec880ac7cb2fc', '', '1', 'c6113d386edd46b2ff44e4eab60aa73a8caf87ba83e9aac45e32c00ca6aa8e169056726c0ce93a7da786ce82bd23fb29fc8c8768ff66921a0f8930ac07e64606', 'On', 1, 0),
(18, 87654321, 'Caja', '1', 'caja@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '', '1', 'd11e48cd4de9c64d5cd373fe868f45e06f5ee910cba49e4fdf3a99cf6b6fd41b8d1f16387f97ebc1f5d0a35f8b96a2e8af736ccf363e0552f66037f12284c883', 'On', 3, 0),
(25, 20709289, 'Jorge', 'Castellano', 'jorgecm14@gmail.com', 'b825cf2f6db03ba3a62f043cfa244f79b4c71e8476fa393921c1a417fffc8b0f9fc667d556d4fbe9bea8ee09b8e93efedcff058b995e5ec54457b6e45bde0b1d', '', '1', '5d4e12dfb4488101412ba40237a288634d46aab734f16a0dadcdf92810b7bf8c29fb80966cf61fbb777ed396487727f1831267a528ef3c40bd6550be3bee296e', 'On', 1, 0),
(26, 22721512, 'Benito', 'De La Paz', 'benitodelapaz@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '', '1', '1b71c1a8807987529f29eb5995cdc71575621ba8567914854777e77e51819268e663b2eef681a6814b3b617494adc970325ca23abaedbdc1611b0916aee4306c', 'On', 1, 0),
(28, 15922568, 'maria virginia', 'mendoza', 'mmendoza@inia.gob.ve', 'ad427581460cb831a08da2813204034960a9aec6a64a4ecae013baf5792f7e41beec9029b5d85c9affe0ffc003abac2045506aa0f225cf7ddfc348bcc3036f73', '', '7', '8b832dc3313b12084a87dec77a57965b2fc38af9f87dfc621066c11de3a512bcab5fe51ad1d38734811ef885166743fb4d5ff8c034cca654914352b680d4b6cc', 'On', 1, 0),
(29, 24191165, 'Josman', 'Mora', 'aromyosman@gmail.com', 'abdee47b13b255e7c1c3ba92cc4610eec0bedbcd1d01faeb929b5312d7725612d12ba1d30360578cf9e630b26fe27d138293c2a2abb5b213e8facb75a321f49e', '', '1', 'd97dfd1e4d1d083a06deb82c6779d9ade3fe5c20603bff0376f905b01e0cd7cbfe04471a057b0e5700973b9d91279c42801ceb7fab9f57e4f37ada9285d1a648', 'On', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `intentos`
--
ALTER TABLE `intentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id` int(9) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Contador de inicio de sesion',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;--
-- Base de datos: `proyecto3`
--
CREATE DATABASE IF NOT EXISTS `proyecto3` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `proyecto3`;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`Cod_ana`, `Nom_ana`, `Precio_ana`, `Tipo`, `estatus`) VALUES
(1, 'Semillas y plantas de hortalizas', 250, 1, 'On'),
(2, 'Materia Organica', 500, 1, 'On'),
(3, 'Macro elementos', 250, 2, 'On'),
(4, 'Micro elementos', 350, 2, 'On'),
(5, 'hongo', 160, 1, 'On');

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
(00027, 00031, 00017, 2016, 01);

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
  `Nat_ jur` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `Ced_cliente`, `Nom_cliente`, `Apelli_cliente`, `Contacto`, `Telf_cliente`, `Dire_cliente`, `Nat_ jur`) VALUES
(10, 12219711, 'Luis Jose', 'Marquez Castro', 'Luis Marquez', '0426-5471912', 'los curos merida ', ''),
(12, 15922177, 'Isabelina', 'Mantilla', 'Jorge Castellano', '0416-1753465', 'Manzano bajo, calle las frutas', ''),
(5, 19996312, 'Yisbeli', 'Karin', '', '0426-1604184', 'Jose Adelmo', ''),
(3, 20709289, 'Jorge AgustÃ­n', 'Castellano Mantilla', '', '0416-1379717', 'Campo Elias Estado Merida\r\nManzano Bajo', ''),
(9, 21417486, 'Yitzon Jose', 'ColmenÃ¡res Pulido', '', '0412-5689471', 'San benito, Lagunillas', ''),
(2, 22123432, 'Juan', 'Gutierrez', 'Pedro', '0412-1234567', 'merida-centro', ''),
(6, 22154312, 'Juanito', 'Alimana', 'Su Primo El Policia', '0412-2299666', 'La calle', ''),
(4, 22280499, 'Ines Del Carmen', 'Benitez Altuve', '', '0416-1234587', 'Springfield', ''),
(1, 23721512, 'Benito De La Paz', 'Gutierrez', 'Juan', '0424-1015159', 'Lagunillas sector los mamones', ''),
(13, 23721516, 'Pepito', 'Pregunton', 'Jaimito', '0234-8879865', 'la curba', ''),
(7, 24191165, 'Javier Alexis', 'Mora Contreras', 'Alexis Mora', '0275-9882097', 'CanaguÃ¡ ', ''),
(8, 78965412, 'Luis', 'Altuve', '', '0274-9842847', 'ryryr\r\n\r\n', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fact_descripcion`
--

INSERT INTO `fact_descripcion` (`Id_fact_produc`, `Cod_fact`, `Descripcion`, `Cantidad`, `Costo_unidad`, `Precio`, `Cod_produ`, `cod_ana`) VALUES
(77, 91, 'alevines', 300, 50, 15000, 3, NULL),
(78, 91, 'Abono orgÃ¡nico', 300, 2500, 750000, 5, NULL),
(86, 95, 'Tomate', 500, 200, 100000, 4, NULL),
(87, 95, 'Abono orgÃ¡nico', 20, 2500, 50000, 5, NULL),
(88, 96, 'piÃ±a', 90, 1005, 90450, 2, NULL),
(89, 96, 'Tomate', 20, 200, 4000, 4, NULL),
(90, 96, 'Humus de lombriz', 50, 3504, 175200, 6, NULL),
(91, 97, 'piÃ±a', 20, 1005, 20100, 2, NULL),
(92, 97, 'Tomate', 10, 200, 2000, 4, NULL),
(93, 97, 'Saco de NPK', 1, 6000, 6000, 7, NULL),
(94, 97, 'yucasss', 5, 789, 3945, 10, NULL),
(95, 98, 'alevines', 100, 50, 5000, 3, NULL),
(96, 98, 'Semilla de arroz', 10, 3000, 30000, 9, NULL),
(97, 99, 'piÃ±a', 30, 1005, 30150, 2, NULL),
(98, 99, 'Humus de lombriz', 100, 3504, 350400, 6, NULL),
(99, 99, 'Semilla de arroz', 10, 3000, 30000, 9, NULL),
(100, 100, 'Saco de NPK', 3, 6000, 18000, 7, NULL),
(101, 101, 'piÃ±a', 1, 1005, 1005, 2, NULL),
(102, 101, 'alevines', 20, 50, 1000, 3, NULL),
(103, 101, 'Saco de NPK', 40, 6000, 240000, 7, NULL),
(104, 102, 'Semila de cebolla', 2, 1520, 3040, 1, NULL),
(105, 102, 'Tomate', 20, 200, 4000, 4, NULL),
(106, 102, 'Semilla de arroz', 2, 3000, 6000, 9, NULL),
(107, 103, 'Tomate', 20, 200, 4000, 4, NULL),
(108, 103, 'Aguacates', 20, 89, 1780, 8, NULL),
(109, 104, 'Tomate', 3, 200, 600, 4, NULL),
(110, 105, 'alevines', 3, 50, 150, 3, NULL),
(111, 105, 'Humus de lombriz', 3, 3504, 10512, 6, NULL),
(112, 106, 'piÃ±a', 100, 1005, 100500, 2, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Cod_fact`, `Ced_cliente`, `Fecha`, `Tipo_pago`, `Forma_pago`, `Bauche`, `subtotal`, `exento`, `base`, `iva`, `retencion`, `alicuota`, `Total`, `observacion`, `ivaporc`, `exentoporc`, `Estatus`) VALUES
(91, 19996312, '2015-09-20', 'COMPRA', 'EFECTIVO', NULL, 765000, '0', '765000', 61200, '45900', '15300', 780300, 'PERONA DEL INTI', 8, 75, 'paga'),
(95, 20709289, '2015-09-25', 'COMPRA', 'EFECTIVO', NULL, 150000, '100000', '50000', 4000, '0', '4000', 154000, 'Para el Sr. del Manzano', 8, 0, 'paga'),
(96, 20709289, '2015-09-28', 'COMPRA', 'NINGUNO', NULL, 269650, '269650', '0', 0, '0', '0', 269650, '', 8, 0, 'paga'),
(97, 20709289, '2015-09-29', 'COMPRA', 'NINGUNO', NULL, 32045, '22100', '9945', 796, '0', '795.6', 32841, '', 8, 0, 'paga'),
(98, 20709289, '2015-09-29', 'COMPRA', 'EFECTIVO', NULL, 35000, '0', '35000', 2800, '2100', '700', 35700, 'INTI', 8, 75, 'paga'),
(99, 22280499, '2015-09-29', 'COMPRA', 'DEPOSITO', '009284564', 410550, '380550', '30000', 2400, '1800', '600', 411150, 'INIA CCS', 8, 75, 'paga'),
(100, 19996312, '2015-09-29', 'COMPRA', 'NINGUNO', NULL, 18000, '0', '18000', 1440, '0', '1440', 19440, '', 8, 0, 'paga'),
(101, 21417486, '2015-09-30', 'DONACION', 'NINGUNO', NULL, 242005, '1005', '241000', 4820, '48.2', '4771.8', 246777, '', 2, 1, 'paga'),
(102, 20709289, '2015-09-30', 'COMPRA', 'NINGUNO', NULL, 13040, '4000', '9040', 723, '0', '723.2', 13763, '', 8, 0, 'paga'),
(103, 23721512, '2015-09-30', 'COMPRA', 'EFECTIVO', NULL, 5780, '4000', '1780', 142, '0', '142.4', 5922, '', 8, 0, 'paga'),
(104, 23721512, '2015-09-30', 'DONACION', 'NINGUNO', NULL, 600, '600', '0', 0, '0', '0', 600, '', 8, 0, 'paga'),
(105, 23721512, '2015-09-30', 'DONACION', 'NINGUNO', NULL, 10662, '10512', '150', 12, '0', '12', 10674, '', 8, 0, 'paga'),
(106, 22280499, '2016-01-14', 'COMPRA', 'EFECTIVO', NULL, 100500, '100500', '0', 0, '0', '0', 100500, '', 12, 0, 'paga');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`Cod_fin`, `Ced_cliente`, `Nom_fin`, `Estado`, `Municipio`, `Parroquia`) VALUES
(1, 23721512, 'La vega de puente real', 'MÃ©rida', 'mun4', 'Pueblo nuevo'),
(2, 22123432, 'La vega de puente real', 'Aragua', 'mun3', 'Pueblo nuevo'),
(3, 20709289, 'La vivienda', 'Trujillo', 'mun2', 'Pampanito II'),
(11, 20709289, 'La vivienda 2', 'Trujillo', 'mun2', 'Pampanito II'),
(12, 78965412, 'Las amapolas', 'Amazonas', 'mun2', 'montalban'),
(13, 22280499, 'yiyi', 'Amazonas', 'mun2', 'inesita salada'),
(14, 22280499, 'Las amapolas', 'Amazonas', 'mun1', 'Saladito'),
(15, 12219711, 'Portachuelo', 'MÃ©rida', 'mun1', 'los curos'),
(16, 15922177, 'Las frutas', 'Falcon', 'mun4', 'Montalban'),
(17, 15922177, 'Erraco', 'TÃ¡chira', 'mun4', 'Silos'),
(18, 15922177, 'Pampanito', 'Falcon', 'mun4', 'La haciendita');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `iva`, `dia`, `mes`, `ano`, `estatus`, `reten`) VALUES
(3, 0.00, 1, 2, 2016, 0, 55.00),
(4, 9.00, 2, 1, 2016, 0, 50.00);

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
(1, 'FitopatologÃ­a', 'On'),
(2, 'Suelo', 'On');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_fito`
--

CREATE TABLE IF NOT EXISTS `m_fito` (
  `Cod_fito` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_lab` int(11) NOT NULL,
  `Tipo_fito` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Descrip_fito` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cult_fito` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Edad_fito` int(11) NOT NULL,
  `F_coleccion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Pobl_cercana` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_microorg` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Sintomas` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `F_sintomas` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Causa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_plant` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Tam_lote` int(11) NOT NULL,
  `Nro_plant` int(11) NOT NULL,
  `Nro_subm` int(11) NOT NULL,
  `dist_f` int(11) NOT NULL,
  `Origen_sem` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Pres_microorg` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Dist_planafect` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Part_afect` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Riego` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Topografia` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Text_sue` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Composicion` int(1) NOT NULL,
  `Hum_sue` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Drenaje` int(1) NOT NULL,
  `Practicas` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Produc_dosis` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Control` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Produc_dosisb` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cult_ant` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cond_agroclima` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_fin` int(4) NOT NULL,
  `Estatus` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `m_fito`
--

INSERT INTO `m_fito` (`Cod_fito`, `Cod_lab`, `Tipo_fito`, `Descrip_fito`, `Cult_fito`, `Edad_fito`, `F_coleccion`, `Pobl_cercana`, `Id_microorg`, `Sintomas`, `F_sintomas`, `Causa`, `Tipo_plant`, `Tam_lote`, `Nro_plant`, `Nro_subm`, `dist_f`, `Origen_sem`, `Pres_microorg`, `Dist_planafect`, `Part_afect`, `Riego`, `Topografia`, `Text_sue`, `Composicion`, `Hum_sue`, `Drenaje`, `Practicas`, `Produc_dosis`, `Control`, `Produc_dosisb`, `Cult_ant`, `Cond_agroclima`, `Observaciones`, `Cod_fin`, `Estatus`) VALUES
('FITO-MER-2015-1', 1, '1', 'Blablabla', 'bla', 11, '06-07-1996', 'qqqqqqqq', 'qqqq1', '1|9|10', '06-05-2013', 'qqqqqqqqqq', '1', 11, 11, 11, 11, '1', '5', '3', '1|2|3|4', '1', '3', '2', 2, '2', 2, '1|2', 'qqqqq', '1|2|3', 'qqqqq', 'qqqqq', 'qqqqq', 'Aaaaaaaa', 0, ''),
('FITO-MER-2016-1', 1, '2', 'aaa', 'aaa', 11, '02-01-1990', 'kjhkjk', 'kjkjk', '1|2|3|4|5|6', '01-01-1990', 'qqq', '1', 12, 12, 12, 12, '1', '2', '2', '1|2|3|4|5|6|7', '1', '2', '2', 2, '2', 2, '1', 'werre', '1|2|3', 'qwqq', 'eeww', 'fwss', 'tiuyt', 0, ''),
('FITO-MER-2016-10', 1, '2', 'aaaaaaaaa', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '3|4|5|6|7|8', '02-01-1990', 'qqq', '2', 12, 12, 12, 12, '1', '2', '2', '5|6', '2', '1', '1', 1, '1', 1, '1|2', 'werre', '2|5', 'qwqq', 'eeww', 'fwss', 'ghgh', 11, ''),
('FITO-MER-2016-11', 1, '2', 'asasass', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '1|2|3|4|5|6|7', '02-01-1990', 'qqq', '2', 12, 12, 12, 12, '1', '2', '2', '3|4|5|6', '1', '1', '1', 1, '1', 1, '1|2|3', 'werre', '2|3|4|5', 'qwqq', 'eeww', 'fwss', 'hjhj', 11, ''),
('FITO-MER-2016-12', 1, '3', 'kjkkj', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '1|2|3|4|5', '01-01-1990', 'qqq', '2', 12, 12, 12, 12, '1', '1', '1', '2|3|4|5', '1', '2', '1', 2, '1', 1, '1|2', 'werre', '2|3|4', 'qwqq', 'eeww', 'fwss', 'hghgh', 3, ''),
('FITO-MER-2016-13', 1, '2', 'asasa', 'trtrr', 22, '01-01-1990', 'rerere', 'fgfgfgf', '2|3|4|5', '02-02-1991', 'fgfgffg', '2', 11, 11, 11, 11, '2', '1', '1', '1|2|3|4', '2', '2', '2', 2, '2', 2, '1', 'jkjk', '1|2|3', 'ghghgh', 'ghghg', 'ghghgh', 'hghghgg', 1, ''),
('FITO-MER-2016-14', 1, '3', 'jkjkj', 'trtrr', 22, '02-01-1990', 'rerere', 'fgfgfgf', '4|5|6|7|8|9', '02-01-1990', 'fgfgffg', '2', 11, 11, 11, 11, '1', '2', '2', '2|3|4|6|7', '2', '2', '1', 1, '1', 1, '1|2', 'jkjk', '3|4|5', 'ghghgh', 'ghghg', 'ghghgh', 'jhjhjh', 11, ''),
('FITO-MER-2016-15', 1, '2', 'jhhjhhj', 'trtrr', 22, '02-02-1991', 'rerere', 'fgfgfgf', '3|4|5|6', '02-01-1990', 'fgfgffg', '2', 11, 11, 11, 11, '1', '2', '2', '4|5|6|7', '2', '1', '1', 1, '1', 1, '1|2|3', 'jkjk', '3|4|5', 'ghghgh', 'ghghg', 'ghghgh', 'ghghghg', 3, ''),
('FITO-MER-2016-16', 1, '', '', '', 0, '--', '', '', '', '--', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', 0, ''),
('FITO-MER-2016-17', 1, '5', 'qwqw', 'rrere', 11, '01-01-1990', 'gfgfgf', 'fgffgf', '3|4|8|9', '01-01-1990', 'ghghgh', '2', 11, 11, 11, 11, '2', '1', '1', '6|8', '1', '1', '1', 1, '1', 1, '3', 'uiuiu', '2|3|4|5', 'hghggh', 'pera', 'hjhj', 'ghgh', 11, ''),
('FITO-MER-2016-2', 1, '2', 'qq', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '2|3', '01-01-1990', 'qqq', '2', 12, 12, 12, 12, '1', '2', '2', '3|4|5', '1', '1', '2', 1, '1', 1, '1|2|3', 'werre', '1|2', 'qwqq', 'eeww', 'fwss', 'klklk', 0, ''),
('FITO-MER-2016-3', 1, '3', 'k', 'aaa', 11, '02-02-1990', 'kjhkjk', 'kjkjk', '1|2', '01-01-1990', 'qqq', '3', 12, 12, 12, 12, '1', '2', '2', '2|3|4', '1', '1', '1', 1, '1', 1, '1|2|3', 'werre', '2', 'qwqq', 'eeww', 'fwss', 'jhgf', 0, ''),
('FITO-MER-2016-4', 1, '2', 'qwq', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '2|3|4|5|6', '01-01-1990', 'qqq', '2', 12, 12, 12, 12, '1', '2', '2', '1|2|3', '1', '1', '1', 1, '1', 1, '1|2', 'werre', '1|2|3|4', 'qwqq', 'eeww', 'fwss', 'hjhjh', 1, ''),
('FITO-MER-2016-5', 1, '2', 'ghg', 'aaa', 11, '02-01-1990', 'kjhkjk', 'kjkjk', '2|3|4|5', '02-02-1991', 'qqq', '2', 12, 12, 12, 12, '1', '1', '2', '3|4|5|6', '2', '1', '1', 1, '1', 1, '3', 'werre', '1|2|3|4|5', 'qwqq', 'eeww', 'fwss', 'hghgh', 11, ''),
('FITO-MER-2016-6', 1, '1', 'dffdf', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '1|2|4|5|6', '02-02-1991', 'qqq', '2', 12, 12, 12, 12, '1', '2', '2', '5|6|7', '2', '1', '1', 1, '1', 1, '1|2', 'werre', '1|2|3', 'qwqq', 'eeww', 'fwss', 'jhjhjjhj', 1, ''),
('FITO-MER-2016-7', 1, '2', 'hjhjh', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '2|3|4|5', '01-02-1991', 'qqq', '2', 12, 12, 12, 12, '1', '2', '2', '3|4|5|6|7', '3', '2', '3', 2, '1', 1, '1|2', 'werre', '2|3|5', 'qwqq', 'eeww', 'fwss', 'jhjhjh', 1, ''),
('FITO-MER-2016-8', 1, '2', 'hghghg', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '2|3|4|5|6|7', '02-01-1990', 'qqq', '2', 12, 12, 12, 12, '1', '2', '1', '1|2|3|4', '1', '1', '1', 1, '1', 1, '1|2', 'werre', '2|3', 'qwqq', 'eeww', 'fwss', 'ghghggh', 1, ''),
('FITO-MER-2016-9', 1, '2', 'hghg', 'aaa', 11, '02-02-1991', 'kjhkjk', 'kjkjk', '2|3|4|5', '02-02-1990', 'qqq', '2', 12, 12, 12, 12, '1', '2', '1', '1|2|3|4|5', '2', '1', '1', 1, '1', 1, '1|2', 'werre', '2|3|4|5', 'qwqq', 'eeww', 'fwss', 'jhjhjhjhj', 11, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_suelo`
--

CREATE TABLE IF NOT EXISTS `m_suelo` (
  `Cod_suelo` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_lab` int(11) NOT NULL,
  `Tipo_sue` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Tam_lote` float NOT NULL,
  `Profundidad` int(11) NOT NULL,
  `Carac_terreno` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Inundacion` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Riego` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Criego` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `F_toma` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `T_vege` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Cultivo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Edad_cult` int(11) DEFAULT NULL,
  `Dis_siembra` float DEFAULT NULL,
  `Nro_pl` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cult_antes` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Rend_cult` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Restos` tinyint(1) DEFAULT NULL,
  `Fertilizante` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fert_cant` int(11) DEFAULT NULL,
  `Epoca_aplic` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Aplicacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Cod_fin` int(4) NOT NULL,
  `Fecha` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `m_suelo`
--

INSERT INTO `m_suelo` (`Cod_suelo`, `Cod_lab`, `Tipo_sue`, `Tam_lote`, `Profundidad`, `Carac_terreno`, `Inundacion`, `Riego`, `Criego`, `F_toma`, `T_vege`, `Cultivo`, `Edad_cult`, `Dis_siembra`, `Nro_pl`, `Cult_antes`, `Rend_cult`, `Restos`, `Fertilizante`, `Fert_cant`, `Epoca_aplic`, `Aplicacion`, `Hora`, `Cod_fin`, `Fecha`, `Estatus`) VALUES
('SUE-MER-2015-1', 2, '', 12, 30, 's', '0', '1', 'aspercion', '14-09-2015', 'Densa', 'papa', 2, 2, '1000', 'yuca', 'B', 0, 'E|F|C', 30, 'verano', 'Tirao', NULL, 0, '', ''),
('SUE-MER-2015-2', 2, '', 2, 30, 's', '0', '1', 'Aspercion', '02-01-2015', 'Potrero', 'papa', 3, 2, '1000', 'yuca', 'B', 0, 'E|F', 22, 'verano', 'manual', NULL, 0, '', ''),
('SUE-MER-2016-1', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'jhyffgj', 'papa', 11, 11, '1000', 'pera', 'B', 0, 'E|F|C', 12, 'verano', 'hghghg', NULL, 1, '', ''),
('SUE-MER-2016-10', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1990', 'jhhjhj', 'papa', 11, 11, '1000', 'pera', 'B', 1, 'E|F', 12, 'verano', 'hjhjhjhj', NULL, 1, '', ''),
('SUE-MER-2016-11', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-01-1991', 'hjhjhj', 'papa', 11, 11, '1000', 'pera', 'R', 1, 'F|C', 12, 'verano', 'gfgff', NULL, 1, '', ''),
('SUE-MER-2016-12', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'kjk', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'C', 12, 'verano', 'hhjhhjh', NULL, 1, '', ''),
('SUE-MER-2016-13', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hjhhj', 'papa', 0, 11, '1000', 'pera', 'R', 1, 'E|F', 12, 'verano', 'ghghghg', NULL, 11, '', ''),
('SUE-MER-2016-14', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'ghg', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'C', 11, 'verano', 'hfgg', NULL, 11, '', ''),
('SUE-MER-2016-15', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-01-1990', 'jkjkj', 'papa', 11, 11, '1000', 'pera', 'M', 0, 'F|C', 12, 'verano', 'ased', NULL, 1, '', ''),
('SUE-MER-2016-16', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'bhghgg', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'F|C', 12, 'verano', 'jhjjh', NULL, 1, '', ''),
('SUE-MER-2016-17', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hghgh', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'F|C', 12, 'verano', '', NULL, 1, '', ''),
('SUE-MER-2016-18', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'nghgh', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'E|C', 12, 'nbhjb', 'bbj', NULL, 0, '', ''),
('SUE-MER-2016-19', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hghghgh', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'E|F|C', 12, 'verano', 'hghgh', NULL, 0, '', ''),
('SUE-MER-2016-2', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'jhjjh', 'papa', 0, 11, '1000', 'pera', 'M', 1, 'E|C', 12, 'verano', 'ghghg', NULL, 0, '', ''),
('SUE-MER-2016-20', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hjhj', 'h', 11, 11, '1000', 'pera', 'M', 1, 'F|C', 12, 'verano', 'jhhjj', NULL, 0, '', ''),
('SUE-MER-2016-21', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hjhjhjhj', 'papa', 11, 11, '1000', 'pera', 'B', 1, 'E|F|C', 12, 'verano', 'bjhhjh', NULL, 3, '', ''),
('SUE-MER-2016-22', 2, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'tytyt', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'F|C', 12, 'verano', 'ghgas', NULL, 11, '', ''),
('SUE-MER-2016-23', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hgghghgh', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'E', 11, 'verano', 'hjhjjhjh', NULL, 11, '', ''),
('SUE-MER-2016-24', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hjh', 'papa', 11, 11, '1000', 'pera', 'B', 0, 'E|F', 12, 'verano', 'hhjhjh', NULL, 11, '', ''),
('SUE-MER-2016-25', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1991', 'hjhghjhj', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'F|C', 12, 'verano', 'klklk', NULL, 11, '', ''),
('SUE-MER-2016-26', 2, '', 11, 11, 'i', '0', '1', 'kjkjkj', '03-02-1991', 'jhkhjhjh', 'papa', 0, 0, '', '', '', 0, '', 0, '', '', NULL, 0, '', ''),
('SUE-MER-2016-27', 1, '', 11, 11, 's', '1', '1', 'kjkjkj', '04-01-1990', 'hghgh', 'papa', 11, 11, '11', 'pere', 'M', 1, 'F|C', 22, 'tttt', 'jhjhj', NULL, 1, '', ''),
('SUE-MER-2016-28', 2, '', 11, 11, 's', '1', '1', 'kjkjkj', '01-02-1991', 'hghggh', 'papa', 11, 11, '11', 'pere', 'M', 1, 'E|F', 22, 'tttt', 'hghghg', NULL, 11, '', ''),
('SUE-MER-2016-29', 2, '', 11, 11, 's', '1', '1', 'kjkjkj', '04-02-1991', 'bhghg', 'papa', 11, 11, '11', 'pere', 'M', 1, 'E|F|C', 22, 'tttt', 'hghg', NULL, 11, '', ''),
('SUE-MER-2016-3', 1, '', 12, 11, 's', '0', '1', 'jhjh', '02-02-1991', 'jhgjk', 'papa', 11, 11, '1000', 'pera', 'R', 1, 'E|F|C', 12, 'verano', 'aaaa', NULL, 1, '', ''),
('SUE-MER-2016-30', 1, '', 1, 30, 'p', '1', '1', 'asp', '11-02-2016', 'hernacea', 'parchita', 24, 6, '800', 'yuca', 'B', 1, 'E|F', 0, '', '', NULL, 11, '', ''),
('SUE-MER-2016-31', 1, '2', 11, 11, 's', '1', '1', 'uno ahi', '02-02-1991', 'jhjh', 'papa', 11, 11, '11', 'pera', 'M', 0, 'F|C', 20, 'verano', 'jhjhj', NULL, 11, '', ''),
('SUE-MER-2016-4', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-01-1990', 'hghgh', 'papa', 11, 11, '1000', 'pera', 'B', 1, 'F|C', 12, 'verano', 'hhjhjh', NULL, 0, '', ''),
('SUE-MER-2016-5', 1, '', 12, 11, 'p', '1', '1', 'jhjh', '02-01-1990', 'jjh', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'E|F|C', 12, 'verano', 'hgjhbjh', NULL, 1, '', ''),
('SUE-MER-2016-6', 2, '', 12, 11, 'p', '1', '1', 'jhjh', '02-01-1990', 'ss', 'papa', 11, 11, '1000', 'pera', 'B', 1, 'C', 12, 'verano', 'ghhg', NULL, 0, '', ''),
('SUE-MER-2016-7', 2, '', 12, 11, 'p', '0', '0', '', '01-01-1990', 'kjjkj', 'papa', 11, 11, '1000', 'pera', 'B', 1, 'E|F', 12, 'verano', 'kjhj', NULL, 0, '', ''),
('SUE-MER-2016-8', 2, '', 12, 11, 's', '1', '0', 'jhjh', '02-02-1991', 'hjhjh', 'papa', 11, 11, '1000', 'pera', 'M', 1, 'E|C', 12, 'verano', 'hjhjhj', NULL, 1, '', ''),
('SUE-MER-2016-9', 1, '', 12, 11, 's', '1', '1', 'jhjh', '02-02-1990', 'bhgn', 'papa', 11, 11, '1000', 'pera', 'M', 0, 'C', 12, 'verano', 'bhgh', NULL, 1, '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_produ`, `Nom_produ`, `Existencia`, `Precio_produ`, `I_E`, `um`) VALUES
(1, 'Semila de cebolla', 200, 1520, 'I', '6'),
(2, 'trichoderma', 100, 35, 'E', '5'),
(3, 'alevines', 77, 50, 'I', '1'),
(4, 'Tomate', 286, 200, 'E', '6'),
(5, 'Abono orgÃ¡nico', 120, 2500, 'I', '6'),
(6, 'Humus de lombriz', 150, 3504, 'E', '3'),
(7, 'Saco de NPK', 1100, 6000, 'I', '6'),
(8, 'Aguacates', 460, 89, 'I', '1'),
(9, 'Semilla de arroz', 22, 3000, 'I', '6'),
(10, 'yucas', 140, 789, 'I', '1'),
(11, 'semillas de papa', 550, 100, 'I', '5'),
(12, 'semilla de apio', 1200, 300, 'I', '6'),
(13, 'PiÃ±ango', 150, 150, 'E', '6');

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
  `Cod_rsuelo` int(11) NOT NULL,
  `Ced_esp` int(11) NOT NULL,
  `Cod_suelo` varchar(18) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `gai_sol` int(5) unsigned zerofill NOT NULL COMMENT 'auto incrementable para generar codigo oficial',
  `Cod_sol` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_cliente` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`gai_sol`, `Cod_sol`, `Cod_cliente`, `Fecha`) VALUES
(00001, 'SSS-MER-2015-1', 23721512, NULL),
(00002, 'SSS-MER-2015-2', 22123432, NULL),
(00004, 'SSS-MER-2016-1', 23721512, NULL),
(00006, 'SSS-MER-2016-2', 23721512, NULL),
(00008, 'SSS-MER-2016-3', 23721512, NULL),
(00009, 'SSS-MER-2016-4', 23721512, NULL),
(00010, 'SSS-MER-2016-5', 23721512, NULL),
(00011, 'SSS-MER-2016-6', 23721512, NULL),
(00012, 'SSS-MER-2016-7', 23721512, NULL),
(00013, 'SSS-MER-2016-8', 20709289, NULL),
(00014, 'SSS-MER-2016-9', 20709289, NULL),
(00015, 'SSS-MER-2016-10', 23721512, NULL),
(00016, 'SSS-MER-2016-11', 23721512, NULL),
(00017, 'SSS-MER-2016-12', 23721512, NULL),
(00018, 'SSS-MER-2016-13', 20709289, NULL),
(00019, 'SSS-MER-2016-14', 20709289, NULL),
(00020, 'SSS-MER-2016-15', 20709289, NULL),
(00021, 'SSS-MER-2016-16', 20709289, NULL),
(00022, 'SSS-MER-2016-17', 20709289, NULL),
(00023, 'SSS-MER-2016-18', 20709289, NULL),
(00024, 'SSS-MER-2016-19', 20709289, NULL),
(00025, 'SSS-MER-2016-20', 23721512, NULL),
(00026, 'SSS-MER-2016-21', 23721512, NULL),
(00027, 'SSS-MER-2016-22', 20709289, NULL),
(00028, 'SSS-MER-2016-23', 20709289, NULL),
(00029, 'SSS-MER-2016-24', 20709289, NULL),
(00030, 'SSS-MER-2016-25', 20709289, NULL),
(00031, 'SSS-MER-2016-26', 20709289, NULL),
(00032, 'SSS-MER-2016-27', 20709289, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_analisis`
--

CREATE TABLE IF NOT EXISTS `solicitud_analisis` (
  `Id_sa` int(11) NOT NULL,
  `Cod_sol` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_ana` int(11) NOT NULL,
  `Cod_suelo` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cod_fito` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_analisis`
--

INSERT INTO `solicitud_analisis` (`Id_sa`, `Cod_sol`, `Cod_ana`, `Cod_suelo`, `Cod_fito`) VALUES
(51, 'SSS-MER-2016-11', 2, 'SUE-MER-2016-18', NULL),
(53, 'SSS-MER-2016-12', 1, 'SUE-MER-2016-19', NULL),
(54, 'SSS-MER-2016-12', 2, 'SUE-MER-2016-19', NULL),
(60, 'SSS-MER-2016-13', 1, 'SUE-MER-2016-20', NULL),
(61, 'SSS-MER-2016-13', 2, 'SUE-MER-2016-20', NULL),
(66, 'SSS-MER-2016-14', 1, 'SUE-MER-2016-21', NULL),
(71, 'SSS-MER-2016-15', 3, NULL, 'FITO-MER-2016-9'),
(72, 'SSS-MER-2016-15', 4, NULL, 'FITO-MER-2016-9'),
(74, 'SSS-MER-2016-16', 1, 'SUE-MER-2016-22', NULL),
(75, 'SSS-MER-2016-16', 2, 'SUE-MER-2016-22', NULL),
(77, 'SSS-MER-2016-17', 1, 'SUE-MER-2016-23', NULL),
(78, 'SSS-MER-2016-17', 2, 'SUE-MER-2016-23', NULL),
(83, 'SSS-MER-2016-18', 1, 'SUE-MER-2016-24', NULL),
(84, 'SSS-MER-2016-18', 2, 'SUE-MER-2016-24', NULL),
(88, 'SSS-MER-2016-19', 3, NULL, 'FITO-MER-2016-12'),
(89, 'SSS-MER-2016-19', 4, NULL, 'FITO-MER-2016-12'),
(91, 'SSS-MER-2016-21', 1, 'SUE-MER-2016-27', NULL),
(92, 'SSS-MER-2016-21', 2, 'SUE-MER-2016-27', NULL),
(95, 'SSS-MER-2016-22', 1, 'SUE-MER-2016-28', NULL),
(96, 'SSS-MER-2016-22', 2, 'SUE-MER-2016-28', NULL),
(97, 'SSS-MER-2016-22', 1, 'SUE-MER-2016-29', NULL),
(98, 'SSS-MER-2016-23', 3, NULL, 'FITO-MER-2016-14'),
(99, 'SSS-MER-2016-23', 4, NULL, 'FITO-MER-2016-14'),
(100, 'SSS-MER-2016-23', 3, NULL, 'FITO-MER-2016-15'),
(104, 'SSS-MER-2016-24', 1, 'SUE-MER-2016-30', NULL),
(105, 'SSS-MER-2016-24', 5, 'SUE-MER-2016-30', NULL),
(106, 'SSS-MER-2016-26', 4, NULL, 'FITO-MER-2016-17'),
(107, 'SSS-MER-2016-27', 1, 'SUE-MER-2016-31', NULL),
(108, 'SSS-MER-2016-27', 2, 'SUE-MER-2016-31', NULL);

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
-- Indices de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  ADD PRIMARY KEY (`Id_fact_produc`),
  ADD KEY `cod_ana` (`cod_ana`),
  ADD KEY `Cod_fact` (`Cod_fact`),
  ADD KEY `Cod_produ` (`Cod_produ`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Cod_fact`),
  ADD UNIQUE KEY `UQ_FACTURA_Bauche` (`Bauche`),
  ADD KEY `Ced_cliente` (`Ced_cliente`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`Cod_fin`),
  ADD KEY `Ced_cliente` (`Ced_cliente`);

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
-- Indices de la tabla `m_fito`
--
ALTER TABLE `m_fito`
  ADD PRIMARY KEY (`Cod_fito`),
  ADD KEY `Cod_lab` (`Cod_lab`);

--
-- Indices de la tabla `m_suelo`
--
ALTER TABLE `m_suelo`
  ADD PRIMARY KEY (`Cod_suelo`),
  ADD KEY `Cod_lab` (`Cod_lab`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_produ`);

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
  ADD KEY `Cod_fito` (`Cod_fito`),
  ADD KEY `Cod_suelo` (`Cod_suelo`),
  ADD KEY `Cod_sol` (`Cod_sol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `Cod_ana` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ayudante`
--
ALTER TABLE `ayudante`
  MODIFY `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  MODIFY `Id_fact_produc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Cod_fact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `Cod_fin` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `Cod_lab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_produ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `gai_sol` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'auto incrementable para generar codigo oficial',AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `solicitud_analisis`
--
ALTER TABLE `solicitud_analisis`
  MODIFY `Id_sa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD CONSTRAINT `especialista_ibfk_1` FOREIGN KEY (`Cod_lab`) REFERENCES `laboratorio` (`Cod_lab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  ADD CONSTRAINT `fact_descripcion_ibfk_1` FOREIGN KEY (`Cod_fact`) REFERENCES `factura` (`Cod_fact`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_descripcion_ibfk_2` FOREIGN KEY (`Cod_produ`) REFERENCES `producto` (`Cod_produ`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_descripcion_ibfk_3` FOREIGN KEY (`cod_ana`) REFERENCES `analisis` (`Cod_ana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Ced_cliente`) REFERENCES `cliente` (`Ced_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `finca`
--
ALTER TABLE `finca`
  ADD CONSTRAINT `finca_ibfk_1` FOREIGN KEY (`Ced_cliente`) REFERENCES `cliente` (`Ced_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `m_fito`
--
ALTER TABLE `m_fito`
  ADD CONSTRAINT `m_fito_ibfk_2` FOREIGN KEY (`Cod_lab`) REFERENCES `laboratorio` (`Cod_lab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `m_suelo`
--
ALTER TABLE `m_suelo`
  ADD CONSTRAINT `m_suelo_ibfk_1` FOREIGN KEY (`Cod_lab`) REFERENCES `laboratorio` (`Cod_lab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_fito`
--
ALTER TABLE `r_fito`
  ADD CONSTRAINT `FK_R_FITO_ESPECIALISTA` FOREIGN KEY (`Ced_esp`) REFERENCES `especialista` (`Ced_esp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_R_FITO_M_FITO` FOREIGN KEY (`Cod_fito`) REFERENCES `m_fito` (`Cod_fito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `r_suelo`
--
ALTER TABLE `r_suelo`
  ADD CONSTRAINT `FK_R_SUELO_ESPECIALISTA` FOREIGN KEY (`Ced_esp`) REFERENCES `especialista` (`Ced_esp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_R_SUELO_M_SUELO` FOREIGN KEY (`Cod_suelo`) REFERENCES `m_suelo` (`Cod_suelo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `FK_SOLICITUD_CLIENTE` FOREIGN KEY (`Cod_cliente`) REFERENCES `cliente` (`Ced_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_analisis`
--
ALTER TABLE `solicitud_analisis`
  ADD CONSTRAINT `FK_SOLI_ANA_M_FITO` FOREIGN KEY (`Cod_fito`) REFERENCES `m_fito` (`Cod_fito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SOLI_ANA_M_SUELO` FOREIGN KEY (`Cod_suelo`) REFERENCES `m_suelo` (`Cod_suelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SOLI_ANA_SOL` FOREIGN KEY (`Cod_sol`) REFERENCES `solicitud` (`Cod_sol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_analisis_ibfk_1` FOREIGN KEY (`Cod_ana`) REFERENCES `analisis` (`Cod_ana`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
