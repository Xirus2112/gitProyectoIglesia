-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para administradoriglesia
CREATE DATABASE IF NOT EXISTS `administradoriglesia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `administradoriglesia`;

-- Volcando estructura para tabla administradoriglesia.clasificacionsocial
CREATE TABLE IF NOT EXISTS `clasificacionsocial` (
  `id` int(4) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla administradoriglesia.clasificacionsocial: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `clasificacionsocial` DISABLE KEYS */;
INSERT INTO `clasificacionsocial` (`id`, `description`) VALUES
	(1, 'Clase Alta'),
	(2, 'Clase Media'),
	(3, 'Clase Baja');
/*!40000 ALTER TABLE `clasificacionsocial` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.datospersonas
CREATE TABLE IF NOT EXISTS `datospersonas` (
  `id` int(5) NOT NULL,
  `dctoIdentidad` int(10) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apePaterno` varchar(50) NOT NULL,
  `apeMaterno` varchar(50) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `telfMovil` varchar(10) NOT NULL,
  `telfFijo` varchar(10) DEFAULT NULL,
  `calle` varchar(4) DEFAULT NULL,
  `carrera` varchar(4) DEFAULT NULL,
  `casa` varchar(4) DEFAULT NULL,
  `ciudad` varchar(15) DEFAULT NULL,
  `departamento` varchar(15) DEFAULT NULL,
  `codPostal` varchar(5) DEFAULT NULL,
  `fNacimiento` date DEFAULT NULL,
  `idTipoPersona` int(4) NOT NULL,
  `idClasificacionSocial` int(4) NOT NULL,
  `idEstadoPersona` int(4) NOT NULL,
  `idGenero` int(4) NOT NULL,
  `idEstatusMembresia` int(4) NOT NULL,
  `fIngresoIglesia` date DEFAULT NULL,
  `fConversion` date DEFAULT NULL,
  `nombreIglesiaConversion` varchar(50) DEFAULT NULL,
  `esBautizado` bit(1) DEFAULT NULL,
  `nombreIglesiaAnterior` varchar(50) DEFAULT NULL,
  `profesion` varchar(20) DEFAULT NULL,
  `direccionTrabajo` varchar(100) DEFAULT NULL,
  `telfTrabajo` varchar(10) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `delete_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKdp_tipoPersona` (`idTipoPersona`),
  KEY `FKdp_clasificacionSocial` (`idClasificacionSocial`),
  KEY `FKdp_estadoPersona` (`idEstadoPersona`),
  KEY `FKdp_genero` (`idGenero`),
  KEY `FKdp_estatusMembresia` (`idEstatusMembresia`),
  CONSTRAINT `FKdp_clasificacionSocial` FOREIGN KEY (`idClasificacionSocial`) REFERENCES `clasificacionsocial` (`id`),
  CONSTRAINT `FKdp_estadoPersona` FOREIGN KEY (`idEstadoPersona`) REFERENCES `estadopersona` (`id`),
  CONSTRAINT `FKdp_estatusMembresia` FOREIGN KEY (`idEstatusMembresia`) REFERENCES `estatusmembresia` (`id`),
  CONSTRAINT `FKdp_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`id`),
  CONSTRAINT `FKdp_tipoPersona` FOREIGN KEY (`idTipoPersona`) REFERENCES `tipopersona` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla administradoriglesia.datospersonas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `datospersonas` DISABLE KEYS */;
INSERT INTO `datospersonas` (`id`, `dctoIdentidad`, `nombre`, `apePaterno`, `apeMaterno`, `correo`, `telfMovil`, `telfFijo`, `calle`, `carrera`, `casa`, `ciudad`, `departamento`, `codPostal`, `fNacimiento`, `idTipoPersona`, `idClasificacionSocial`, `idEstadoPersona`, `idGenero`, `idEstatusMembresia`, `fIngresoIglesia`, `fConversion`, `nombreIglesiaConversion`, `esBautizado`, `nombreIglesiaAnterior`, `profesion`, `direccionTrabajo`, `telfTrabajo`, `avatar`, `delete_status`) VALUES
	(1, 1143426188, 'Carlos', 'Alvarado', 'Martinez', 'carlosalvarado1901@gmail.com', '3017453145', '3194406', '21', '14', '41', 'Barranquilla', 'Atlantico', '80001', '1990-09-26', 3, 2, 4, 0, 3, '2021-05-28', '2021-05-28', 'Pentecostal', b'1', 'No recuerda', 'Ing. Sistemas', 'Sin trabajo', NULL, '17304.png', b'0');
/*!40000 ALTER TABLE `datospersonas` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.estadopersona
CREATE TABLE IF NOT EXISTS `estadopersona` (
  `id` int(4) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla administradoriglesia.estadopersona: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `estadopersona` DISABLE KEYS */;
INSERT INTO `estadopersona` (`id`, `descripcion`) VALUES
	(1, 'Soltero (a)'),
	(2, 'Casado (a)'),
	(3, 'Comprometido (a)'),
	(4, 'Unión Libre'),
	(5, 'Divorciado (a)'),
	(6, 'Viudo (a)'),
	(7, 'Separado (a)');
/*!40000 ALTER TABLE `estadopersona` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.estatusmembresia
CREATE TABLE IF NOT EXISTS `estatusmembresia` (
  `id` int(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla administradoriglesia.estatusmembresia: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estatusmembresia` DISABLE KEYS */;
INSERT INTO `estatusmembresia` (`id`, `description`) VALUES
	(1, 'Activo'),
	(2, 'Inactivo'),
	(3, 'En Observación');
/*!40000 ALTER TABLE `estatusmembresia` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla administradoriglesia.genero: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`id`, `description`) VALUES
	(0, 'Masculino'),
	(1, 'Femenino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) DEFAULT 0,
  `delete_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla administradoriglesia.groups: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `delete_status`, `delete_date`) VALUES
	(1, 'admin', 'admin', '2017-06-06 06:23:04', 0, NULL),
	(2, 'role 1', 'role 1', '2019-04-08 05:51:05', 0, NULL),
	(3, 'role2', 'role2', '2019-04-08 05:52:00', 0, NULL),
	(4, 'role 3', 'role 3', '2019-04-08 05:54:18', 0, NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.modal
CREATE TABLE IF NOT EXISTS `modal` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `header` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla administradoriglesia.modal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modal` DISABLE KEYS */;
INSERT INTO `modal` (`id`, `header`, `title`, `description`) VALUES
	(1, 'Modal Header Title', 'Hello, this is version 2.0 and I am still working on this.\r\n', 'Please don\'t forget to give credit to original developer because I really worked hard to develop this project and please don\'t forget to like and share it if you found it useful :) For students or anyone else who needs program or source code for thesis writing or any Professional Software Development,Website Development,Mobile Apps Development at affordable cost contact me at Email : mayuri.infospace@gmail.com');
/*!40000 ALTER TABLE `modal` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla administradoriglesia.permissions: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `role_name`) VALUES
	(1, 'manage_medicinals', 'Manage Medicinals', 'Manage Medicinals', NULL),
	(2, 'manage_pos', 'Manage POS', 'Manage POS', NULL),
	(3, 'manage_roles', 'Manage User Roles', 'Manage User Roles', NULL),
	(4, 'manage_users', 'Manage Users', 'Manage Users', NULL),
	(5, 'manage_sales', 'Manage Sales', 'Manage Sales', NULL),
	(6, 'manage_categories', 'Manage Categories', 'Manage Categories', NULL),
	(7, 'manage_suppliers', 'Manage Suppliers', 'Manage Suppliers', NULL),
	(8, 'manage_customers', 'Manage Customers', 'Manage Customers', NULL),
	(9, 'manage_reports', 'Manage Reports', 'Manage Reports', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla administradoriglesia.permission_role: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 1),
	(7, 5, 1),
	(8, 6, 1),
	(9, 7, 1),
	(10, 8, 1),
	(11, 9, 1),
	(16, 6, 3),
	(17, 7, 3),
	(18, 3, 4),
	(19, 4, 4),
	(20, 8, 4),
	(21, 9, 2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `fevicon` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `login_image` varchar(100) NOT NULL,
  `footer` varchar(300) NOT NULL,
  `currency` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla administradoriglesia.settings: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `fevicon`, `logo`, `title`, `login_image`, `footer`, `currency`) VALUES
	(1, 'fevicon.png', 'logo_iaunj.png', 'Iglesia IAUNJ', 'login_image-324.png', 'Footer', 'Rs.');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `avator` varchar(255) DEFAULT NULL,
  `group_id` int(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla administradoriglesia.tbl_admin: 2 rows
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id`, `email`, `login`, `role`, `avator`, `group_id`, `delete_status`) VALUES
	(1, 'admin@admin.com', '$2y$10$1Fw7l55APPq6hmLCOYL3cOzO8ZMznDpd0CuWYdjkYqonBSPs3nLYG', 'admin', '70520.png', 1, 0),
	(3, 'user@gmail.com', '$2y$10$7XeEViIuymfneVxO1U.sZeIv1eW.OJvFGvdmWoTjbigk6NeaQaZa6', 'users', NULL, 3, 0);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.tbl_alerts
CREATE TABLE IF NOT EXISTS `tbl_alerts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla administradoriglesia.tbl_alerts: 5 rows
/*!40000 ALTER TABLE `tbl_alerts` DISABLE KEYS */;
INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
	(1, '001', 'El correo o la clave no es invalida!', 'warning'),
	(2, '002', 'La configuración se actualizó correctamente', 'success'),
	(3, '003', 'Registro agregado exitosamente', 'success'),
	(4, '004', 'Registro actualizado con éxito', 'success'),
	(5, '005', 'Registro eliminado con éxito', 'success');
/*!40000 ALTER TABLE `tbl_alerts` ENABLE KEYS */;

-- Volcando estructura para tabla administradoriglesia.tipopersona
CREATE TABLE IF NOT EXISTS `tipopersona` (
  `id` int(4) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla administradoriglesia.tipopersona: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipopersona` DISABLE KEYS */;
INSERT INTO `tipopersona` (`id`, `description`) VALUES
	(1, 'Vicitante'),
	(2, 'Diácono'),
	(3, 'Miembro'),
	(4, 'Pastor Principal');
/*!40000 ALTER TABLE `tipopersona` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
