-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: eugene
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acl`
--

DROP TABLE IF EXISTS `acl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ai`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl`
--

LOCK TABLES `acl` WRITE;
/*!40000 ALTER TABLE `acl` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_actions`
--

DROP TABLE IF EXISTS `acl_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_actions` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`action_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_actions`
--

LOCK TABLES `acl_actions` WRITE;
/*!40000 ALTER TABLE `acl_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_categories`
--

DROP TABLE IF EXISTS `acl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`),
  UNIQUE KEY `category_desc` (`category_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_categories`
--

LOCK TABLES `acl_categories` WRITE;
/*!40000 ALTER TABLE `acl_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_sessions`
--

DROP TABLE IF EXISTS `auth_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_sessions`
--

LOCK TABLES `auth_sessions` WRITE;
/*!40000 ALTER TABLE `auth_sessions` DISABLE KEYS */;
INSERT INTO `auth_sessions` VALUES ('0fajdjhb4m3bo5l4srcqt47d0aiq9s63',2147484848,'2017-08-16 02:03:50','2017-08-16 05:14:34','::1','Chrome 60.0.3112.90 on Windows 10'),('7icgftf7bq2p7pdnamfjioobibffraed',2147484848,'2017-08-15 06:15:38','2017-08-15 07:01:52','::1','Chrome 60.0.3112.90 on Windows 10'),('3et5emar79mm0qa7h4j8gudab0lao422',2147484848,'2017-08-15 20:10:32','2017-08-15 21:50:21','::1','Chrome 60.0.3112.90 on Windows 10');
/*!40000 ALTER TABLE `auth_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `identificacion` varchar(13) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identificacion_UNIQUE` (`identificacion`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_clientes_users1_idx` (`usuario_id`),
  CONSTRAINT `fk_clientes_users1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (2,'Christian Cruz',NULL,'0920338043','0993008176','chambers 6700 y la 40','cruzchristian@outlook.com',NULL,NULL,NULL),(3,'Diana Vargas',NULL,'0930769526','1545454','545454','454545@hotmail.com',NULL,NULL,NULL),(4,'ALVARADO NARVÁEZ CARMEN LASTENIA',NULL,'0102486024','','','',NULL,NULL,NULL),(5,'BELTRÁN ROMERO PATRICIA ALEXANDRA ',NULL,'0102498755','','','',NULL,NULL,NULL),(6,'MARÍN JIMÉNEZ GLADYS YOLANDA',NULL,'0101975514','','','',NULL,NULL,NULL),(7,'PINTADO PACURUCU CLAUDIA MARGOTH',NULL,'0104814751','','','',NULL,NULL,NULL),(8,'SALGADO CAMPOVERDE NOELIA MARGARITA',NULL,'0103812822','','','',NULL,NULL,NULL),(9,'SUAREZ SAQUINAULA ALEJANDRA GABRIELA',NULL,'0105603047','','','',NULL,NULL,NULL),(10,'VERA SARMIENTO NORMA ISABEL',NULL,'0103989836','','','',NULL,NULL,NULL),(11,'CALDERON AVILA DANIEL ANTONIO',NULL,'0301246369','','','',NULL,NULL,NULL),(12,'GONZÁLEZ ARÍZAGA JOSÉ FRANCISCO',NULL,'0300721941','','','',NULL,NULL,NULL),(13,'PULLA ZAMBRANO RUTH EULALIA',NULL,'0301714077','','','',NULL,NULL,NULL),(14,'LASTRE LASCANO ESTHER SARA',NULL,'0803476167','','','',NULL,NULL,NULL),(15,'DEL SALTO CAZAÑAS HERMES EGBERTO',NULL,'0200579183','','','',NULL,NULL,NULL),(16,'MASSÓN CHÁVEZ LUZVENIA',NULL,'1204413122','','','',NULL,NULL,NULL),(17,'NUÑEZ VARGAS CLARA ARACELY',NULL,'0201586005','','','',NULL,NULL,NULL),(18,'ATI CONCHA VERONICA CECILIA',NULL,'0604310870','','','',NULL,NULL,NULL),(19,'LARA VIZUETE MARIANITA DE JESÚS',NULL,'0602920167','','','',NULL,NULL,NULL),(20,'Joshua Valderde',NULL,'0922019377','','','',NULL,NULL,NULL),(21,'Eddy Velez',NULL,'0919563452','','','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denied_access`
--

DROP TABLE IF EXISTS `denied_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denied_access` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denied_access`
--

LOCK TABLES `denied_access` WRITE;
/*!40000 ALTER TABLE `denied_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `denied_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tienda_id` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `numero` char(15) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `solicitud_id` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_factura_establecimiento_idx` (`tienda_id`),
  KEY `fk_facturas_solicitudes1_idx` (`solicitud_id`),
  CONSTRAINT `fk_factura_tienda` FOREIGN KEY (`tienda_id`) REFERENCES `tiendas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_facturas_solicitudes1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (60,2,'2017-08-15','001-002-5454515',146.50,50,'2017-08-15 16:36:30',NULL,'2017-08-15 16:36:30'),(61,4,'2017-08-15','001-002-0006565',33.30,50,'2017-08-15 16:36:30',NULL,'2017-08-15 16:36:30'),(62,5,'2017-08-14','002-001-5656565',37.55,51,'2017-08-15 16:37:42',NULL,'2017-08-15 16:37:42'),(63,8,'2017-08-13','003-005-0256565',265.00,52,'2017-08-15 16:38:07',NULL,'2017-08-15 16:38:07'),(64,14,'2017-08-12','001-005-0000000',98.75,53,'2017-08-15 16:38:40',NULL,'2017-08-15 16:38:40'),(65,2,'2017-08-12','002-002-1545484',126.00,54,'2017-08-15 16:40:12',NULL,'2017-08-15 16:40:12'),(66,2,'2017-08-11','002-003-6596595',225.00,55,'2017-08-15 16:40:46',NULL,'2017-08-15 16:40:46'),(67,14,'2017-08-10','001-002-0004545',145.00,56,'2017-08-15 16:42:01',NULL,'2017-08-15 16:42:01'),(68,15,'2017-08-10','001-001-0001154',13.00,56,'2017-08-15 16:42:01',NULL,'2017-08-15 16:42:01'),(69,15,'2017-08-09','001-006-5656565',142.00,57,'2017-08-15 16:42:51',NULL,'2017-08-15 16:42:51'),(70,17,'2017-08-14','001-006-5959595',80.00,58,'2017-08-15 16:43:26',NULL,'2017-08-15 16:43:26'),(71,17,'2017-08-15','011-002-1548484',102.00,59,'2017-08-15 16:44:24',NULL,'2017-08-15 16:44:24'),(72,5,'2017-08-14','656-565-1488484',45.00,60,'2017-08-15 16:46:04',NULL,'2017-08-15 16:46:04'),(73,16,'2017-08-08','001-029-9898989',78.00,61,'2017-08-15 16:46:35',NULL,'2017-08-15 16:46:35'),(74,12,'2017-08-12','001-263-5656599',25.00,62,'2017-08-15 16:47:50',NULL,'2017-08-15 16:47:50'),(75,6,'2017-08-12','565-656-5656565',33.00,62,'2017-08-15 16:47:50',NULL,'2017-08-15 16:47:50'),(76,9,'2017-08-12','695-965-9595959',75.00,62,'2017-08-15 16:47:50',NULL,'2017-08-15 16:47:50'),(77,17,'2017-08-15','000-010-0021515',55.00,63,'2017-08-15 19:35:00',NULL,'2017-08-15 19:35:00'),(78,5,'2017-08-15','000-115-1515151',40.00,63,'2017-08-15 19:35:00',NULL,'2017-08-15 19:35:00'),(79,2,'2017-08-15','121-212-1212121',50.00,64,'2017-08-15 22:24:27',NULL,'2017-08-15 22:24:27'),(80,2,'2017-08-15','001-001-1212121',50.00,64,'2017-08-15 22:24:27',NULL,'2017-08-15 22:24:27');
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ips_on_hold`
--

DROP TABLE IF EXISTS `ips_on_hold`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ips_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ips_on_hold`
--

LOCK TABLES `ips_on_hold` WRITE;
/*!40000 ALTER TABLE `ips_on_hold` DISABLE KEYS */;
/*!40000 ALTER TABLE `ips_on_hold` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_errors`
--

DROP TABLE IF EXISTS `login_errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_errors` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_errors`
--

LOCK TABLES `login_errors` WRITE;
/*!40000 ALTER TABLE `login_errors` DISABLE KEYS */;
INSERT INTO `login_errors` VALUES (8,'admin','::1','2017-08-14 20:08:59');
/*!40000 ALTER TABLE `login_errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promociones`
--

DROP TABLE IF EXISTS `promociones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promociones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `valor_cupon` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `finalizado_por_id` int(11) DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `creado_por_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promociones`
--

LOCK TABLES `promociones` WRITE;
/*!40000 ALTER TABLE `promociones` DISABLE KEYS */;
INSERT INTO `promociones` VALUES (12,'Mall del Sol te pone sobre ruedas.',30.00,'por cada $30 de compras te damos  cupones para que participes en el sorteo de una CAMIONETA FORD F150','activo',NULL,NULL,2147483647,'2017-08-15 21:28:39','2017-08-15 21:28:39',NULL);
/*!40000 ALTER TABLE `promociones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `promocion_id` int(11) NOT NULL,
  `cupones` int(11) DEFAULT NULL,
  `estado` varchar(255) NOT NULL,
  `aprobado_por_id` int(10) unsigned DEFAULT NULL,
  `fecha_aprobacion` datetime DEFAULT NULL,
  `creado_por_id` int(10) unsigned DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitudes_clientes1_idx` (`cliente_id`),
  KEY `fk_solicitudes_users1_idx` (`creado_por_id`),
  KEY `fk_solicitudes_users2_idx` (`aprobado_por_id`),
  KEY `fk_solicitudes_promociones1_idx` (`promocion_id`),
  CONSTRAINT `fk_solicitudes_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitudes_users1` FOREIGN KEY (`creado_por_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitudes_users2` FOREIGN KEY (`aprobado_por_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (50,2,12,5,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:36:30','2017-08-15 16:36:30',NULL),(51,3,12,1,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:37:42','2017-08-15 16:37:42',NULL),(52,8,12,8,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:38:07','2017-08-15 16:38:07',NULL),(53,8,12,3,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:38:40','2017-08-15 16:38:40',NULL),(54,18,12,4,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:40:12','2017-08-15 16:40:12',NULL),(55,11,12,7,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:40:46','2017-08-15 16:40:46',NULL),(56,12,12,5,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:42:01','2017-08-15 16:42:01',NULL),(57,19,12,4,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:42:51','2017-08-15 16:42:51',NULL),(58,21,12,2,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:43:26','2017-08-15 16:43:26',NULL),(59,20,12,3,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:44:24','2017-08-15 16:44:24',NULL),(60,10,12,NULL,'pendiente',NULL,NULL,2147484848,'2017-08-15 16:46:04','2017-08-15 16:46:04',NULL),(61,11,12,NULL,'pendiente',NULL,NULL,2147484848,'2017-08-15 16:46:35','2017-08-15 16:46:35',NULL),(62,9,12,4,'aprobado',NULL,NULL,2147484848,'2017-08-15 16:47:50','2017-08-15 16:47:50',NULL),(63,3,12,3,'aprobado',NULL,NULL,2147484848,'2017-08-15 19:35:00','2017-08-15 19:35:00',NULL),(64,3,12,3,'aprobado',NULL,NULL,2147484848,'2017-08-15 22:24:27','2017-08-15 22:24:27',NULL);
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiendas`
--

DROP TABLE IF EXISTS `tiendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiendas`
--

LOCK TABLES `tiendas` WRITE;
/*!40000 ALTER TABLE `tiendas` DISABLE KEYS */;
INSERT INTO `tiendas` VALUES (2,'Marathon Sport','locl 101B','042841395','cruzchristian@outlook.com',NULL,NULL,NULL),(3,'Mundo Adidas','202A','042205250','info@mundoadidas.com',NULL,NULL,NULL),(4,'Locuras Halmark','Planta Alta – Zona 1 Megamaxi',' (+593)(4)2082096','',NULL,NULL,NULL),(5,'TVentas','Planta Baja – Zona 2 Sukasa',' (+593)(4)2082320; (+593)(4)2082321','',NULL,NULL,NULL),(6,'Totto','Planta Baja – Zona 4 Bebemundo',' (+593)(4)2082324','',NULL,NULL,NULL),(7,'Sunglass Hot','Planta Alta – Zona 1 Megamaxi',' (+593)(4)2082091','',NULL,NULL,NULL),(8,'Pycca','Planta Baja – Zona 5 Torres del Mall','(+593)(4)2082034','',NULL,NULL,NULL),(9,'Levi\'s','Planta Alta – Zona 1 Megamaxi','(+593)(4)2082724','',NULL,NULL,NULL),(10,'Kywi','Planta Alta – Zona 1 Megamaxi','(593-4) 228-3940','',NULL,NULL,NULL),(11,'Guimsa','Planta baja – Zona 2 Sukasa','(+593)(4)2082377','',NULL,NULL,NULL),(12,'D’ Pisar','Planta Baja – Zona 2 Sukasa','(+593)(4)2082162; (+593)(4)2082543','',NULL,NULL,NULL),(13,'Jansport','Planta Baja – Zona 1 Megamaxi','','',NULL,NULL,NULL),(14,'Sports Planet','Planta Baja – Zona 1 Megamaxi','(+593)(4) 2082413','',NULL,NULL,NULL),(15,'Pasteles y Compañía','Planta Alta – Zona 1 Megamaxi',' (+593)(4)208284','',NULL,NULL,NULL),(16,'Fybeca','Planta Baja – Zona 4 Bebemundo','(+593)(4)2082732; (+593)(4)2082734','',NULL,NULL,NULL),(17,'Supermaxi','Planta Baja – Zona 1 Megamaxi','','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tiendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `username_or_email_on_hold`
--

DROP TABLE IF EXISTS `username_or_email_on_hold`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `username_or_email_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `username_or_email_on_hold`
--

LOCK TABLES `username_or_email_on_hold` WRITE;
/*!40000 ALTER TABLE `username_or_email_on_hold` DISABLE KEYS */;
/*!40000 ALTER TABLE `username_or_email_on_hold` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) unsigned NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2147484848,'admin','skunkbot3@example.com',9,'0','$2y$11$eUyPokBE3mttRtDeRXiE2.5jdJzmnw.uPPETx5Eyib5pzyBKuhhaq',NULL,NULL,NULL,'2017-08-16 02:03:50','2017-08-12 16:04:56','2017-08-16 02:03:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-29 17:21:22
