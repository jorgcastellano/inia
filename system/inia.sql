-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-06-2015 a las 18:30:38
-- Versión del servidor: 5.6.23
-- Versión de PHP: 5.5.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
  `Cod_ana` int(11) NOT NULL,
  `Nom_ana` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Precio_ana` int(11) NOT NULL,
  `Tipo` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`Cod_ana`, `Nom_ana`, `Precio_ana`, `Tipo`) VALUES
(1, 'PH', 100, 0),
(2, 'Macro Elementos', 200, 0),
(3, 'humedad', 150, 0),
(4, 'Micro Elementos', 250, 0),
(5, 'nematodos', 300, 0),
(6, 'bacterias', 100, 0),
(7, 'plagas', 200, 0),
(8, 'microorganismos', 100, 0),
(9, 'Nuevo', 300, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `Ced_cliente` int(11) NOT NULL,
  `Nom_cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apelli_cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Contacto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telf_cliente` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `Dire_cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `Ced_cliente`, `Nom_cliente`, `Apelli_cliente`, `Contacto`, `Telf_cliente`, `Dire_cliente`) VALUES
(1, 23721514, 'Benito', 'Gutierrez', 'Pedro', '0212-0000000', 'la variante'),
(3, 23721516, 'Benito', 'Gutierrez', 'Pedro', '0212-0000123', 'qqqq'),
(4, 23721545, 'Benito', 'Gutierrez', 'Pedro', '0212-0000122', 'qqqq');

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
  `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `Cod_fact` int(11) NOT NULL,
  `Ced_cliente` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Tipo_pago` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `Forma_pago` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Bauche` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE IF NOT EXISTS `finca` (
  `Cod_fin` int(4) NOT NULL,
  `Ced_cliente` int(11) NOT NULL,
  `Nom_fin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Municipio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `Cod_lab` int(11) NOT NULL,
  `Nom_lab` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`Cod_lab`, `Nom_lab`) VALUES
(1, 'Fitopatología'),
(2, 'Suelo');

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
  `Sintomas` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `F_sintomas` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Causa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_plant` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Otro_tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
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
  `Observaciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_suelo`
--

CREATE TABLE IF NOT EXISTS `m_suelo` (
  `Cod_suelo` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_lab` int(11) NOT NULL,
  `Cod_rsuelo` int(11) NOT NULL,
  `Tam_lote` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `Profundidad` int(11) NOT NULL,
  `Carac_terreno` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `Inundacion` tinyint(1) NOT NULL,
  `Riego` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Criego` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `F_toma` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `T_vege` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Cultivo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Edad_cult` int(11) DEFAULT NULL,
  `Dis_siembra` int(11) DEFAULT NULL,
  `Nro_pl` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Cult_antes` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Rend_cult` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Restos` tinyint(1) DEFAULT NULL,
  `Fertilizante` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fert_cant` int(11) DEFAULT NULL,
  `Epoca_aplic` tinyint(10) DEFAULT NULL,
  `Aplicacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `Cod_produ` int(11) NOT NULL,
  `Nom_produ` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Existencia` int(11) NOT NULL,
  `Precio_produ` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_produ`, `Nom_produ`, `Existencia`, `Precio_produ`) VALUES
(1, 'tuberculos', 10, 1000),
(2, 'alevines', 160, 800),
(3, 'papas', 400, 200),
(5, 'abono', 50, 700),
(6, 'truchas', 700, 20),
(7, 'terneros', 20, 2000),
(8, 'vacas', 25, 2500),
(9, 'chivos', 50, 500),
(10, 'ovejas', 40, 400),
(11, 'yuca', 110, 45),
(12, 'manzana', 50, 50),
(13, 'repoyo', 70, 85),
(14, 'lechuga', 29, 90),
(15, 'platano', 500, 600),
(16, 'fertilizantes', 80, 950),
(17, 'cambur', 60, 600),
(18, 'frezas', 60, 80),
(19, 'naranjas', 70, 700),
(20, 'pavo', 70, 500),
(21, 'azucar', 40, 400),
(22, 'tomate', 70, 700),
(23, 'tamarindo', 90, 10),
(24, 'mandarina', 60, 600),
(25, 'zanahorias', 60, 250);

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
  `Cod_sol` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_cliente` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  ADD UNIQUE KEY `UQ_FACT_PRODUC_cod_ana` (`cod_ana`),
  ADD UNIQUE KEY `UQ_FACT_PRODUC_Cod_produ` (`Cod_produ`),
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
  ADD PRIMARY KEY (`Cod_sol`),
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
  MODIFY `Cod_ana` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
  MODIFY `Id_fact_produc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Cod_fact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `Cod_fin` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `Cod_lab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_produ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
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
  ADD CONSTRAINT `FK_SOLI_ANA_SOLICITUD` FOREIGN KEY (`Cod_sol`) REFERENCES `solicitud` (`Cod_sol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_analisis_ibfk_1` FOREIGN KEY (`Cod_ana`) REFERENCES `analisis` (`Cod_ana`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
