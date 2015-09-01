-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-09-2015 a las 10:21:00
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.12-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inicio_seguro`
--
DROP DATABASE `inicio_seguro`;
CREATE DATABASE IF NOT EXISTS `inicio_seguro` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `inicio_seguro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE IF NOT EXISTS `intentos` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
`id` int(11) NOT NULL,
  `ci` int(9) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(128) COLLATE utf8_spanish_ci NOT NULL,
  `salt` char(128) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `aprobacion` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de inicio de sesion seguro';

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id`, `ci`, `usuario`, `email`, `password`, `salt`, `pregunta`, `respuesta`, `aprobacion`) VALUES
(1, 21417486, 'Jitzon Colmenares', 'jitzon.jose@gmail.com', '123456', '', '1', 'garfield', 'NO'),
(3, 20709289, 'Jorge Castellano', 'jorgecm14@gmail.com', '123456', '', '1', 'garfield', 'NO'),
(4, 22280499, 'Ines Benitez', 'ines.benitez2@gmail.com', '1234', '', '2', 'benitez', 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;--
-- Base de datos: `proyecto3`
--
DROP DATABASE `proyecto3`;
CREATE DATABASE IF NOT EXISTS `proyecto3` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `proyecto3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
`Cod_ana` int(11) NOT NULL,
  `Nom_ana` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Precio_ana` int(11) NOT NULL,
  `Tipo` int(1) NOT NULL,
  `estatus` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'On' COMMENT 'estado del analisis'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `analisis`
--

INSERT INTO `analisis` (`Cod_ana`, `Nom_ana`, `Precio_ana`, `Tipo`, `estatus`) VALUES
(1, 'PH', 100, 2, 'Off'),
(2, 'Macro Elementos', 200, 2, 'On'),
(3, 'humedad', 150, 2, 'Off'),
(4, 'Micro Elementos', 250, 1, 'On'),
(5, 'nematodos', 300, 2, 'On'),
(6, 'bacterias', 100, 1, 'Off'),
(7, 'plagas', 200, 2, 'On'),
(8, 'microorganismos', 100, 1, 'Off'),
(9, 'Nuevo', 300, 1, 'On'),
(10, 'Ph45', 250, 1, 'Off'),
(11, 'd3f', 250, 1, 'On'),
(12, 'HematologÃ­a', 350, 2, 'Off');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayudante`
--

CREATE TABLE IF NOT EXISTS `ayudante` (
  `aiso` int(5) unsigned zerofill NOT NULL COMMENT 'AutoIncrementable Solicitud',
  `aims` int(5) unsigned zerofill NOT NULL COMMENT 'AutoIncrementable muestra suelo',
  `aimf` int(5) unsigned zerofill NOT NULL COMMENT 'AutoIncrementable muestra fito',
  `ano` int(4) unsigned NOT NULL COMMENT 'ultimo año'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ayudante`
--

INSERT INTO `ayudante` (`aiso`, `aims`, `aimf`, `ano`) VALUES
(00000, 00000, 00000, 2015);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `Ced_cliente`, `Nom_cliente`, `Apelli_cliente`, `Contacto`, `Telf_cliente`, `Dire_cliente`) VALUES
(9, 15922177, 'Isabelina', 'Mantilla', '', '0212-1753465', 'Pamplona, Norte de Santander, Colombia'),
(5, 20709289, 'Jorge Agustin', 'Castellano Mantilla', '', '0416-1379717', 'Manzano bajo, Calle las Frutas, Casa S/N, Ejido, Estado MÃ©rida'),
(14, 21417486, 'Yitzon Jose', 'ColmenÃ¡res Pulido', 'Jorge Castellano', '0212-1234567', 'San Benito, Lagunillas, Estado MÃ©rida'),
(6, 22280499, 'Ines', 'Benitez', 'Jorge', '0416-1234587', 'Manzano'),
(1, 23721514, 'Benito', 'Gutierrez', 'Pedro', '0212-0000000', 'la variante');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`Cod_fin`, `Ced_cliente`, `Nom_fin`, `Estado`, `Municipio`, `Parroquia`) VALUES
(1, 20709289, 'EscorpiÃ³n', 'MÃ©rida', 'mun4', 'Manzano bajo'),
(3, 22280499, 'las frutas 2', 'MÃ©rida', 'mun4', 'Manzano'),
(6, 15922177, 'Barrio cristo rey', 'Tachira', 'mun3', 'Cristo rey'),
(13, 21417486, 'Junco', 'TÃ¡chira', 'mun5', 'TÃ¡riba'),
(14, 22280499, 'lolo', 'A', 'm', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
`Cod_lab` int(11) NOT NULL,
  `Nom_lab` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Off'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`Cod_lab`, `Nom_lab`, `estatus`) VALUES
(1, 'FitopatologÃ­a', 'Off'),
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

--
-- Volcado de datos para la tabla `m_suelo`
--

INSERT INTO `m_suelo` (`Cod_suelo`, `Cod_lab`, `Cod_rsuelo`, `Tam_lote`, `Profundidad`, `Carac_terreno`, `Inundacion`, `Riego`, `Criego`, `F_toma`, `T_vege`, `Cultivo`, `Edad_cult`, `Dis_siembra`, `Nro_pl`, `Cult_antes`, `Rend_cult`, `Restos`, `Fertilizante`, `Fert_cant`, `Epoca_aplic`, `Aplicacion`, `Hora`) VALUES
('SUE-MER-2015-1', 2, 0, '11', 11, 'x', 1, '1', 'qq', '02-02-1991', 'qq', 'qq', 0, 0, 'qq', 'qq', 'R', 0, 'E|F', 0, 0, 'qq', NULL);

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
`gai_sol` int(5) unsigned zerofill NOT NULL COMMENT 'auto incrementable para generar codigo oficial',
  `Cod_sol` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Cod_cliente` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`gai_sol`, `Cod_sol`, `Cod_cliente`, `Fecha`) VALUES
(00017, 'SSS-MER-2015-1', 20709289, NULL);

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
 ADD PRIMARY KEY (`Ced_cliente`), ADD UNIQUE KEY `UQ_CLIENTE_Telf_cliente` (`Telf_cliente`), ADD UNIQUE KEY `Id_cliente` (`Id_cliente`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
 ADD PRIMARY KEY (`Ced_esp`), ADD UNIQUE KEY `UQ_ESPECIALISTA_Telf_esp` (`Telf_esp`), ADD KEY `Cod_lab` (`Cod_lab`);

--
-- Indices de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
 ADD PRIMARY KEY (`Id_fact_produc`), ADD UNIQUE KEY `UQ_FACT_PRODUC_cod_ana` (`cod_ana`), ADD UNIQUE KEY `UQ_FACT_PRODUC_Cod_produ` (`Cod_produ`), ADD KEY `cod_ana` (`cod_ana`), ADD KEY `Cod_fact` (`Cod_fact`), ADD KEY `Cod_produ` (`Cod_produ`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`Cod_fact`), ADD UNIQUE KEY `UQ_FACTURA_Bauche` (`Bauche`), ADD KEY `Ced_cliente` (`Ced_cliente`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
 ADD PRIMARY KEY (`Cod_fin`), ADD KEY `Ced_cliente` (`Ced_cliente`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
 ADD PRIMARY KEY (`Cod_lab`);

--
-- Indices de la tabla `m_fito`
--
ALTER TABLE `m_fito`
 ADD PRIMARY KEY (`Cod_fito`), ADD KEY `Cod_lab` (`Cod_lab`);

--
-- Indices de la tabla `m_suelo`
--
ALTER TABLE `m_suelo`
 ADD PRIMARY KEY (`Cod_suelo`), ADD KEY `Cod_lab` (`Cod_lab`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`Cod_produ`);

--
-- Indices de la tabla `r_fito`
--
ALTER TABLE `r_fito`
 ADD PRIMARY KEY (`Cod_rfito`), ADD KEY `Ced_esp` (`Ced_esp`), ADD KEY `Cod_fito` (`Cod_fito`);

--
-- Indices de la tabla `r_suelo`
--
ALTER TABLE `r_suelo`
 ADD PRIMARY KEY (`Cod_rsuelo`), ADD KEY `Ced_esp` (`Ced_esp`), ADD KEY `Cod_suelo` (`Cod_suelo`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
 ADD PRIMARY KEY (`gai_sol`), ADD UNIQUE KEY `Cod_sol` (`Cod_sol`), ADD KEY `Cod_cliente` (`Cod_cliente`);

--
-- Indices de la tabla `solicitud_analisis`
--
ALTER TABLE `solicitud_analisis`
 ADD PRIMARY KEY (`Id_sa`), ADD KEY `Cod_ana` (`Cod_ana`), ADD KEY `Cod_fito` (`Cod_fito`), ADD KEY `Cod_suelo` (`Cod_suelo`), ADD KEY `Cod_sol` (`Cod_sol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
MODIFY `Cod_ana` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `fact_descripcion`
--
ALTER TABLE `fact_descripcion`
MODIFY `Id_fact_produc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `Cod_fact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
MODIFY `Cod_fin` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
MODIFY `gai_sol` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'auto incrementable para generar codigo oficial',AUTO_INCREMENT=18;
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
ADD CONSTRAINT `FK_SOLI_ANA_SOL` FOREIGN KEY (`Cod_sol`) REFERENCES `solicitud` (`Cod_sol`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `solicitud_analisis_ibfk_1` FOREIGN KEY (`Cod_ana`) REFERENCES `analisis` (`Cod_ana`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
