/*
Navicat MySQL Data Transfer

Source Server         : MySQLClase
Source Server Version : 50736
Source Host           : localhost:3306
Source Database       : mitaller

Target Server Type    : MYSQL
Target Server Version : 50736
File Encoding         : 65001

Date: 2022-06-10 12:47:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bitacora_acceso`
-- ----------------------------
DROP TABLE IF EXISTS `bitacora_acceso`;
CREATE TABLE `bitacora_acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(20) NOT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `bitacora_acceso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cat_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bitacora_acceso
-- ----------------------------
INSERT INTO `bitacora_acceso` VALUES ('1', '1', '2022-06-09 10:32:31');
INSERT INTO `bitacora_acceso` VALUES ('2', '1', '2022-06-09 10:35:40');
INSERT INTO `bitacora_acceso` VALUES ('3', '1', '2022-06-09 10:39:30');
INSERT INTO `bitacora_acceso` VALUES ('4', '1', '2022-06-09 10:40:56');
INSERT INTO `bitacora_acceso` VALUES ('5', '1', '2022-06-09 10:44:02');
INSERT INTO `bitacora_acceso` VALUES ('6', '1', '2022-06-09 10:44:28');

-- ----------------------------
-- Table structure for `cat_acciones_herramienta`
-- ----------------------------
DROP TABLE IF EXISTS `cat_acciones_herramienta`;
CREATE TABLE `cat_acciones_herramienta` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `desc_acth` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_acciones_herramienta
-- ----------------------------
INSERT INTO `cat_acciones_herramienta` VALUES ('1', 'Prestada');
INSERT INTO `cat_acciones_herramienta` VALUES ('2', 'Disponible');
INSERT INTO `cat_acciones_herramienta` VALUES ('3', 'Agregada');
INSERT INTO `cat_acciones_herramienta` VALUES ('4', 'Eliminada');

-- ----------------------------
-- Table structure for `cat_acciones_refaccion`
-- ----------------------------
DROP TABLE IF EXISTS `cat_acciones_refaccion`;
CREATE TABLE `cat_acciones_refaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_actr` varchar(20) CHARACTER SET latin1 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_acciones_refaccion
-- ----------------------------
INSERT INTO `cat_acciones_refaccion` VALUES ('1', 'Entrada');
INSERT INTO `cat_acciones_refaccion` VALUES ('2', 'Salida');
INSERT INTO `cat_acciones_refaccion` VALUES ('3', 'Eliminada');

-- ----------------------------
-- Table structure for `cat_herramientas`
-- ----------------------------
DROP TABLE IF EXISTS `cat_herramientas`;
CREATE TABLE `cat_herramientas` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cod_barra` int(20) DEFAULT NULL,
  `tipo_h` varchar(50) CHARACTER SET latin1 DEFAULT '',
  `desc_h` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `estado` varchar(10) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_herramientas
-- ----------------------------
INSERT INTO `cat_herramientas` VALUES ('1', '80571455', 'Manuales', 'Perico de 3g', 'Disponible', 'visible');
INSERT INTO `cat_herramientas` VALUES ('2', '12579449', 'Mecanicas', 'Taladro Bosch PSB 500 RE', 'Disponible', 'visible');
INSERT INTO `cat_herramientas` VALUES ('3', '8207646', 'Mecanicas', 'Taladro DeWalt DCD795D2-QW', 'Disponible', 'visible');
INSERT INTO `cat_herramientas` VALUES ('4', '21737742', 'Mecanicas', 'Taladro Black & Decker BDCHD18KB-QW', 'Prestada', 'visible');
INSERT INTO `cat_herramientas` VALUES ('5', '39645653', 'Mecanicas', 'Taladro Makita HP457DWE', 'Prestada', 'visible');
INSERT INTO `cat_herramientas` VALUES ('6', '90247406', 'Mecanicas', 'Taladro Ronix 8905K', 'Disponible', 'visible');
INSERT INTO `cat_herramientas` VALUES ('7', '5390143', 'Manuales', 'Destornillador plano', 'Prestada', 'visible');
INSERT INTO `cat_herramientas` VALUES ('8', '61201928', 'Manuales', 'Destornillador Phillips Plano', 'Disponible', 'visible');
INSERT INTO `cat_herramientas` VALUES ('10', '90247406', 'Trazo', 'Cinta Metrica 5M Acero Anvil', 'Disponible', 'visible');
INSERT INTO `cat_herramientas` VALUES ('11', '1155332200', 'Palanca', 'Palanca Truper 1.25 metros', 'Disponible', 'visible');

-- ----------------------------
-- Table structure for `cat_nivel_acceso`
-- ----------------------------
DROP TABLE IF EXISTS `cat_nivel_acceso`;
CREATE TABLE `cat_nivel_acceso` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `desc` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_nivel_acceso
-- ----------------------------
INSERT INTO `cat_nivel_acceso` VALUES ('1', 'Administrador');
INSERT INTO `cat_nivel_acceso` VALUES ('2', 'Trabajador');

-- ----------------------------
-- Table structure for `cat_refacciones`
-- ----------------------------
DROP TABLE IF EXISTS `cat_refacciones`;
CREATE TABLE `cat_refacciones` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cod_barra` int(20) DEFAULT NULL,
  `desc_r` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `precio_r` double(20,2) DEFAULT NULL,
  `existencias_r` int(20) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT 'visible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_refacciones
-- ----------------------------
INSERT INTO `cat_refacciones` VALUES ('2', '5390143', 'Autolite Iridium Ultra Bujia de Iridio AI5245', '500.00', '15', 'visible');
INSERT INTO `cat_refacciones` VALUES ('3', '61201928', 'Radiador Chevrolet Chevy A2420-28N', '1115.00', '6', 'visible');
INSERT INTO `cat_refacciones` VALUES ('4', '1234567890', '[Prueba]', '1500.00', '1', 'visible');

-- ----------------------------
-- Table structure for `cat_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `cat_usuarios`;
CREATE TABLE `cat_usuarios` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `id_nivel_acceso` int(20) NOT NULL,
  `estatus` varchar(10) DEFAULT 'visible',
  PRIMARY KEY (`id`),
  KEY `id_acceso` (`id_nivel_acceso`),
  KEY `id_user` (`id`),
  CONSTRAINT `cat_usuarios_ibfk_1` FOREIGN KEY (`id_nivel_acceso`) REFERENCES `cat_nivel_acceso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

-- ----------------------------
-- Records of cat_usuarios
-- ----------------------------
INSERT INTO `cat_usuarios` VALUES ('1', 'Angel', '1234', 'Angel Madero Orozco', '1', 'visible');
INSERT INTO `cat_usuarios` VALUES ('2', 'Ramon', '1234', 'Ramon Antonio', '1', 'visible');
INSERT INTO `cat_usuarios` VALUES ('3', 'Pablo', '1234', 'Pablo Salazar', '2', 'visible');
INSERT INTO `cat_usuarios` VALUES ('4', 'Armando', '1234', 'Armando Borbon', '2', 'visible');
INSERT INTO `cat_usuarios` VALUES ('7', 'Oscar', '1234', 'Oscar Rodriguez', '2', 'visible');
INSERT INTO `cat_usuarios` VALUES ('9', 'Orlando', '1234', 'Orlando Cota Limon', '1', 'visible');
INSERT INTO `cat_usuarios` VALUES ('10', 'dockerburner69', '0009', 'PAVLO PICAZZO', '2', 'invisible');
INSERT INTO `cat_usuarios` VALUES ('11', 'Palindronev2', '0009', 'PAVLO PICAZZO', '2', 'invisible');
INSERT INTO `cat_usuarios` VALUES ('12', 'dockerburner69', '0009', 'PAVLO PICAZZO', '2', 'invisible');
INSERT INTO `cat_usuarios` VALUES ('13', 'dockerburner69', '1234', 'PAVLO PICAZZO', '2', 'invisible');
INSERT INTO `cat_usuarios` VALUES ('14', 'colsankfc', '00001', 'Coronel Sanders', '2', 'invisible');

-- ----------------------------
-- Table structure for `movimientos_herramientas`
-- ----------------------------
DROP TABLE IF EXISTS `movimientos_herramientas`;
CREATE TABLE `movimientos_herramientas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(20) DEFAULT NULL,
  `id_herramienta` int(20) DEFAULT NULL,
  `id_acciones_h` int(20) DEFAULT NULL,
  `fecha_uh` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_h` (`id_herramienta`),
  KEY `accion_h` (`id_acciones_h`),
  KEY `user-herr` (`id_usuario`),
  CONSTRAINT `movimientos_herramientas_ibfk_1` FOREIGN KEY (`id_herramienta`) REFERENCES `cat_herramientas` (`id`),
  CONSTRAINT `movimientos_herramientas_ibfk_2` FOREIGN KEY (`id_acciones_h`) REFERENCES `cat_acciones_herramienta` (`id`),
  CONSTRAINT `movimientos_herramientas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `cat_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movimientos_herramientas
-- ----------------------------
INSERT INTO `movimientos_herramientas` VALUES ('1', '2', '2', '1', '2022-05-18 05:32:49');
INSERT INTO `movimientos_herramientas` VALUES ('2', '1', '6', '1', '2022-05-18 05:33:20');
INSERT INTO `movimientos_herramientas` VALUES ('3', '2', '5', '1', '2022-06-08 14:49:13');
INSERT INTO `movimientos_herramientas` VALUES ('4', '3', '7', '1', '2022-06-08 14:51:30');
INSERT INTO `movimientos_herramientas` VALUES ('5', '1', '6', '2', '2022-06-09 03:27:58');
INSERT INTO `movimientos_herramientas` VALUES ('6', '4', '1', '1', '2022-06-09 05:04:52');
INSERT INTO `movimientos_herramientas` VALUES ('7', '4', '4', '1', '2022-06-09 05:11:55');
INSERT INTO `movimientos_herramientas` VALUES ('8', '1', '4', '2', '2022-06-09 05:12:12');
INSERT INTO `movimientos_herramientas` VALUES ('9', '1', '1', '2', '2022-06-09 05:16:59');
INSERT INTO `movimientos_herramientas` VALUES ('10', '1', '8', '4', '2022-06-09 05:19:27');
INSERT INTO `movimientos_herramientas` VALUES ('11', '1', '10', '4', '2022-06-09 05:21:46');
INSERT INTO `movimientos_herramientas` VALUES ('12', '1', '3', '4', '2022-06-09 05:24:17');
INSERT INTO `movimientos_herramientas` VALUES ('13', '1', '5', '4', '2022-06-09 05:24:36');
INSERT INTO `movimientos_herramientas` VALUES ('14', '1', '1', '4', '2022-06-09 07:10:09');
INSERT INTO `movimientos_herramientas` VALUES ('15', '1', '1', '4', '2022-06-09 07:10:09');
INSERT INTO `movimientos_herramientas` VALUES ('16', '1', '1', '4', '2022-06-09 07:10:15');
INSERT INTO `movimientos_herramientas` VALUES ('17', '1', '1', '4', '2022-06-09 07:10:28');
INSERT INTO `movimientos_herramientas` VALUES ('18', '1', '7', '4', '2022-06-09 07:48:58');
INSERT INTO `movimientos_herramientas` VALUES ('19', '1', '2', '2', '2022-06-10 02:44:28');
INSERT INTO `movimientos_herramientas` VALUES ('20', '9', '4', '1', '2022-06-10 17:53:28');
INSERT INTO `movimientos_herramientas` VALUES ('21', '9', '11', '1', '2022-06-10 18:09:35');
INSERT INTO `movimientos_herramientas` VALUES ('22', '1', '11', '2', '2022-06-10 18:09:56');

-- ----------------------------
-- Table structure for `movimientos_refaccion`
-- ----------------------------
DROP TABLE IF EXISTS `movimientos_refaccion`;
CREATE TABLE `movimientos_refaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(20) NOT NULL,
  `id_refaccion` int(20) NOT NULL,
  `id_accion_refaccion` int(20) NOT NULL,
  `fecha_ur` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_r` (`id_refaccion`),
  KEY `accion_r` (`id_accion_refaccion`),
  KEY `id_user` (`id_usuario`),
  CONSTRAINT `movimientos_refaccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cat_usuarios` (`id`),
  CONSTRAINT `movimientos_refaccion_ibfk_2` FOREIGN KEY (`id_accion_refaccion`) REFERENCES `cat_acciones_refaccion` (`id`),
  CONSTRAINT `movimientos_refaccion_ibfk_3` FOREIGN KEY (`id_refaccion`) REFERENCES `cat_refacciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movimientos_refaccion
-- ----------------------------
INSERT INTO `movimientos_refaccion` VALUES ('1', '2', '2', '2', '2022-06-06 03:27:45');
INSERT INTO `movimientos_refaccion` VALUES ('2', '3', '3', '2', '0000-00-00 00:00:00');
INSERT INTO `movimientos_refaccion` VALUES ('3', '3', '2', '2', '0000-00-00 00:00:00');
INSERT INTO `movimientos_refaccion` VALUES ('4', '3', '3', '2', '2022-06-06 00:00:00');
INSERT INTO `movimientos_refaccion` VALUES ('5', '1', '3', '1', '2022-06-06 00:00:00');
INSERT INTO `movimientos_refaccion` VALUES ('6', '3', '3', '2', '2022-06-08 14:11:23');
INSERT INTO `movimientos_refaccion` VALUES ('7', '2', '2', '2', '2022-06-08 14:25:01');
INSERT INTO `movimientos_refaccion` VALUES ('8', '9', '2', '2', '2022-06-10 17:30:03');
INSERT INTO `movimientos_refaccion` VALUES ('9', '1', '2', '1', '2022-06-10 17:30:53');
INSERT INTO `movimientos_refaccion` VALUES ('10', '1', '2', '1', '2022-06-10 18:15:00');
INSERT INTO `movimientos_refaccion` VALUES ('11', '1', '2', '1', '2022-06-10 18:18:27');
INSERT INTO `movimientos_refaccion` VALUES ('12', '3', '2', '2', '2022-06-10 21:18:08');
