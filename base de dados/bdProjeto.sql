CREATE DATABASE  IF NOT EXISTS `db_ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_ecommerce`;
-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: db_ecommerce
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_carts`
--

DROP TABLE IF EXISTS `tb_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carts` (
  `idcart` int NOT NULL AUTO_INCREMENT,
  `dessessionid` varchar(64) NOT NULL,
  `iduser` int DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_users_idx` (`iduser`),
  CONSTRAINT `fk_carts_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (23,'b597f9b43a7a92861712244d815f2bdd',NULL,'2022-02-10 11:11:52'),(24,'553b58b104a3e571e90d73f72f7676f6',19,'2022-02-10 11:12:56'),(25,'72403915951453522c209f0e9c8ca70f',NULL,'2022-02-10 11:13:12'),(26,'6c51e0d19c028688c367fecf7a2d5191',20,'2022-02-10 11:13:57'),(27,'b291e6801f20340a2a6651ff297b5b01',NULL,'2022-02-10 11:13:59'),(28,'872304469896a76ec8b7034417f0a03b',13,'2022-02-10 11:51:32'),(29,'848f8426e7e08256e373cbe53aa20beb',NULL,'2022-02-10 11:51:39'),(30,'d59c8222da5871d352919a9bcbdafcf8',NULL,'2022-02-10 12:01:59'),(31,'7696b1970395ab920151087e83216ba2',13,'2022-02-10 14:58:34'),(32,'2338825fa000466b681d1ab6c8157a22',13,'2022-02-10 15:50:26'),(33,'c8c76051a0e3ff1c3e197b77b47b5f79',13,'2022-02-10 15:52:23'),(34,'abd471030eb722882b99e0713c5352e6',NULL,'2022-02-10 15:58:22'),(35,'132204a05159c2e307da869c07c2b401',NULL,'2022-02-10 16:00:23'),(36,'55569210403bfa8314f31bfba8dc9026',NULL,'2022-02-10 17:15:47'),(37,'260e379311a7b4e031aaaa79923c7e03',NULL,'2022-02-10 20:23:55'),(38,'8fcd94e0cea7ade2448f91f6e53270e4',13,'2022-02-10 20:25:16'),(39,'6aa2254c166d8bb9111218e633e7f24c',NULL,'2022-02-10 20:25:42'),(40,'e5ed89c00bc1b1af3ea387203b78505c',NULL,'2022-02-10 20:27:56'),(41,'d07371de01c3b13552af361cba8beef7',NULL,'2022-02-11 16:34:00'),(42,'191c218eb7f885561f30621ca9bb9ff2',13,'2022-02-12 11:13:28'),(43,'447c1d85ca3c95a523064359dedfb7d5',13,'2022-02-12 11:51:21'),(44,'fd2824729fb09b6267c4c15343e05394',13,'2022-02-12 16:26:23'),(45,'dc37fa644b0e6602303c155976f80501',NULL,'2022-02-12 16:26:26'),(46,'54993dcf1a277f53c2a345a388c4115e',21,'2022-02-12 16:29:29'),(47,'24b6c4e45ccf48291c6adbce9d5e1e4d',NULL,'2022-02-12 16:31:25'),(48,'ddf16fdf5fc95636797c259295a36b92',NULL,'2022-02-13 16:08:02'),(49,'ad5ba70e5712454fd202092ed3550e06',NULL,'2022-02-13 18:24:25'),(50,'d71ecd1402a5d44abf506d3132ead09e',NULL,'2022-02-13 18:25:26'),(51,'8f17bf25352c9ee7b0d75492cb3ef4be',NULL,'2022-02-15 09:47:27'),(52,'b0e03f67dbc8a92637e2e03c1a549b96',NULL,'2022-02-15 11:30:03'),(53,'5ee3d17ababa3736444dd8c1aa30fd11',NULL,'2022-02-15 11:30:55'),(54,'8f3d281577d5af7612701ecfda131ed2',NULL,'2022-02-15 11:50:57'),(55,'3d82a9350e22f606063e8a62a1ddb324',NULL,'2022-02-15 12:13:50'),(56,'15188ad4371e368d634263e356cc54ab',NULL,'2022-02-15 14:08:01'),(57,'99bf87f8e51e3e988dd7236d2a00d61c',13,'2022-02-15 14:37:15'),(58,'2b6c64dd25bc6893150d4d9143468e31',NULL,'2022-02-15 15:35:25');
/*!40000 ALTER TABLE `tb_carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cartsproducts`
--

DROP TABLE IF EXISTS `tb_cartsproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cartsproducts` (
  `idcartproduct` int NOT NULL AUTO_INCREMENT,
  `idcart` int NOT NULL,
  `idproduct` int NOT NULL,
  `dtremoved` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcartproduct`),
  KEY `FK_cartsproducts_carts_idx` (`idcart`),
  KEY `fk_cartsproducts_products_idx` (`idproduct`),
  CONSTRAINT `fk_cartsproducts_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`),
  CONSTRAINT `fk_cartsproducts_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartsproducts`
--

LOCK TABLES `tb_cartsproducts` WRITE;
/*!40000 ALTER TABLE `tb_cartsproducts` DISABLE KEYS */;
INSERT INTO `tb_cartsproducts` VALUES (17,23,7,NULL,'2022-02-10 11:12:40'),(18,23,6,NULL,'2022-02-10 11:12:46'),(19,23,7,NULL,'2022-02-10 11:12:48'),(20,25,7,NULL,'2022-02-10 11:13:31'),(21,25,7,NULL,'2022-02-10 11:13:33'),(22,25,7,NULL,'2022-02-10 11:13:34'),(23,25,7,NULL,'2022-02-10 11:13:35'),(24,25,7,NULL,'2022-02-10 11:13:36'),(25,25,6,NULL,'2022-02-10 11:13:46'),(26,25,6,NULL,'2022-02-10 11:13:46'),(27,25,6,NULL,'2022-02-10 11:13:46'),(28,25,6,NULL,'2022-02-10 11:13:46'),(29,25,6,NULL,'2022-02-10 11:13:46'),(30,25,6,NULL,'2022-02-10 11:13:46'),(31,25,6,NULL,'2022-02-10 11:13:46'),(32,25,6,NULL,'2022-02-10 11:13:46'),(33,27,7,NULL,'2022-02-10 11:39:58'),(34,31,6,NULL,'2022-02-10 15:49:39'),(35,32,7,NULL,'2022-02-10 15:51:26'),(36,33,7,NULL,'2022-02-10 15:53:53'),(37,37,8,NULL,'2022-02-10 20:24:45'),(38,37,8,NULL,'2022-02-10 20:24:47'),(39,41,8,'2022-02-11 16:58:36','2022-02-11 16:58:33'),(40,45,6,NULL,'2022-02-12 16:28:45'),(41,45,6,NULL,'2022-02-12 16:29:03'),(42,45,6,NULL,'2022-02-12 16:29:04'),(43,55,8,NULL,'2022-02-15 12:27:09'),(44,56,8,NULL,'2022-02-15 14:29:37');
/*!40000 ALTER TABLE `tb_cartsproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categories` (
  `idcategory` int NOT NULL AUTO_INCREMENT,
  `descategory` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (4,'Distribuição','2022-02-10 11:02:19'),(6,'Logística','2022-02-10 11:03:16');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_orders`
--

DROP TABLE IF EXISTS `tb_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_orders` (
  `idorder` int NOT NULL AUTO_INCREMENT,
  `idcart` int NOT NULL,
  `iduser` int NOT NULL,
  `idstatus` int NOT NULL,
  `vltotal` decimal(10,2) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idorder`),
  KEY `FK_orders_users_idx` (`iduser`),
  KEY `fk_orders_ordersstatus_idx` (`idstatus`),
  KEY `fk_orders_carts_idx` (`idcart`),
  CONSTRAINT `fk_orders_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`),
  CONSTRAINT `fk_orders_ordersstatus` FOREIGN KEY (`idstatus`) REFERENCES `tb_ordersstatus` (`idstatus`),
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orders`
--

LOCK TABLES `tb_orders` WRITE;
/*!40000 ALTER TABLE `tb_orders` DISABLE KEYS */;
INSERT INTO `tb_orders` VALUES (3,23,19,4,3499.96,'2022-02-10 11:12:53'),(4,25,20,2,16999.79,'2022-02-10 11:13:52'),(5,27,13,1,999.99,'2022-02-10 11:40:01'),(6,31,13,1,1499.98,'2022-02-10 15:50:03'),(7,32,13,5,999.99,'2022-02-10 15:51:58'),(8,37,13,1,4198.00,'2022-02-10 20:25:06'),(9,45,21,2,4499.94,'2022-02-12 16:29:20'),(10,56,13,1,2099.00,'2022-02-15 14:37:13');
/*!40000 ALTER TABLE `tb_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ordersstatus`
--

DROP TABLE IF EXISTS `tb_ordersstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_ordersstatus` (
  `idstatus` int NOT NULL AUTO_INCREMENT,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ordersstatus`
--

LOCK TABLES `tb_ordersstatus` WRITE;
/*!40000 ALTER TABLE `tb_ordersstatus` DISABLE KEYS */;
INSERT INTO `tb_ordersstatus` VALUES (1,'Em Aberto','2017-03-13 03:00:00'),(2,'A Aguardar Pagamento','2017-03-13 03:00:00'),(3,'Pago','2017-03-13 03:00:00'),(4,'Serviço Prestado','2017-03-13 03:00:00'),(5,'Cancelado','2017-03-13 03:00:00');
/*!40000 ALTER TABLE `tb_ordersstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_persons` (
  `idperson` int NOT NULL AUTO_INCREMENT,
  `desperson` varchar(64) NOT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (13,'Vasco Peixoto','vascomfpeixoto@gmail.com',965195772,'2022-02-10 01:00:19'),(19,'Sofia Viana','sofia@gmail.com',916360087,'2022-02-10 11:00:25'),(20,'Joana Freitas','joana@gmail.com',960473218,'2022-02-10 11:01:18'),(21,'Filipe','luisviana@gmail.com',0,'2022-02-12 16:27:37');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_products`
--

DROP TABLE IF EXISTS `tb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_products` (
  `idproduct` int NOT NULL AUTO_INCREMENT,
  `desproduct` varchar(64) NOT NULL,
  `vlprice` decimal(10,2) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_products`
--

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;
INSERT INTO `tb_products` VALUES (6,'Pacote Logística',1499.98,'Este pacote de Logística  corresponde a um dia inteiro em que assumimos toda a sua operação logística, incluindo o desenvolvimento estratégico. Tornamo-nos no seu departamento de logística e coordenamos os processos, com actividades de aprovisionamento de matéria-prima, gestão dos indicadores e relações com os clientes, este preço é apenas um preço base e pode sofrer alterações com as caracteristicas do serviço, por isso, depois de realizada a pre-reserva sem qualquer custo, receberá um email para marcação de uma reunião novamente sem qualquer custo.','pack_logistica','2022-02-10 11:04:29'),(7,'Pacote Distribuição',999.99,'Este pacote de Distribuição corresponde a um dia inteiro de distribuição feita pela nossa empresa, este preço é apenas um preço base e pode sofrer alterações com as caracteristicas do serviço, por isso, depois de realizada a pre-reserva sem qualquer custo, receberá um email para marcação de uma reunião novamente sem qualquer custo.','pack_distribuicao','2022-02-10 11:07:17'),(8,'Pacote Combinado',2099.00,'Este pacote combinado contém o pacote de Logística e o de Distribuição, este preço é apenas um preço base e pode sofrer alterações com as caracteristicas do serviço, por isso, depois de realizada a pre-reserva sem qualquer custo, receberá um email para marcação de uma reunião novamente sem qualquer custo.','pack_combo','2022-02-10 16:40:59');
/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productscategories`
--

DROP TABLE IF EXISTS `tb_productscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_productscategories` (
  `idcategory` int NOT NULL,
  `idproduct` int NOT NULL,
  PRIMARY KEY (`idcategory`,`idproduct`),
  KEY `fk_productscategories_products_idx` (`idproduct`),
  CONSTRAINT `fk_productscategories_categories` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`),
  CONSTRAINT `fk_productscategories_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productscategories`
--

LOCK TABLES `tb_productscategories` WRITE;
/*!40000 ALTER TABLE `tb_productscategories` DISABLE KEYS */;
INSERT INTO `tb_productscategories` VALUES (6,6),(4,7),(4,8),(6,8);
/*!40000 ALTER TABLE `tb_productscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_users` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `idperson` int NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint NOT NULL DEFAULT '0',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`),
  KEY `FK_users_persons_idx` (`idperson`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (13,13,'admin','$2y$12$Z4uyCPcyq.1eihWBVNsjDO9euNPVdhFFfXDM0Ko07Z7yxnoo4iiWW',1,'2022-02-10 01:00:19'),(19,19,'sofss','$2y$12$tQCace3OC5VBVghvxjSj1eL8nROhqh6ztgU3VeXCrOwS.1UhRmdIi',0,'2022-02-10 11:00:25'),(20,20,'joana@gmail.com','$2y$12$uk7mcNaxS6NdLdhNteljB.7B2iMonHt.Hh7Fzix0LHC6H4fFR3rVq',0,'2022-02-10 11:01:18'),(21,21,'luisviana@gmail.com','$2y$12$P3cj2Ryu.6iMl3.L.KcchOtqiL9I5W3fxLZAchWAxijTZgA28iMhO',0,'2022-02-12 16:27:37');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userslogs`
--

DROP TABLE IF EXISTS `tb_userslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_userslogs` (
  `idlog` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlog`),
  KEY `fk_userslogs_users_idx` (`iduser`),
  CONSTRAINT `fk_userslogs_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userslogs`
--

LOCK TABLES `tb_userslogs` WRITE;
/*!40000 ALTER TABLE `tb_userslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userspasswordsrecoveries`
--

DROP TABLE IF EXISTS `tb_userspasswordsrecoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrecovery`),
  KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`),
  CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_ecommerce'
--

--
-- Dumping routines for database 'db_ecommerce'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_carts_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_carts_save`(
pidcart INT,
pdessessionid VARCHAR(64),
piduser INT
)
BEGIN

    IF pidcart > 0 THEN
        
        UPDATE tb_carts
        SET
            dessessionid = pdessessionid,
            iduser = piduser
        WHERE idcart = pidcart;
        
    ELSE
        
        INSERT INTO tb_carts (dessessionid, iduser)
        VALUES(pdessessionid, piduser);
        
        SET pidcart = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_carts WHERE idcart = pidcart;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_categories_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save`(
pidcategory INT,
pdescategory VARCHAR(64)
)
BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET descategory = pdescategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (descategory) VALUES(pdescategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_orders_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orders_save`(
pidorder INT,
pidcart int(11),
piduser int(11),
pidstatus int(11),
pvltotal decimal(10,2)
)
BEGIN
	
	IF pidorder > 0 THEN
		
		UPDATE tb_orders
        SET
			idcart = pidcart,
            iduser = piduser,
            idstatus = pidstatus,
            vltotal = pvltotal
		WHERE idorder = pidorder;
        
    ELSE
    
		INSERT INTO tb_orders (idcart, iduser, idstatus, vltotal)
        VALUES(pidcart, piduser, pidstatus, pvltotal);
		
		SET pidorder = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * 
    FROM tb_orders a
    INNER JOIN tb_ordersstatus b USING(idstatus)
    INNER JOIN tb_carts c USING(idcart)
    INNER JOIN tb_users d ON d.iduser = a.iduser
    WHERE idorder = pidorder;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_products_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_save`(
pidproduct int(11),
pdesproduct varchar(64),
pvlprice decimal(10,2),
pdescricao varchar(1000),
pdesurl varchar(128)
)
BEGIN
	
	IF pidproduct > 0 THEN
		
		UPDATE tb_products
        SET 
			desproduct = pdesproduct,
            vlprice = pvlprice,
            descricao = pdescricao,
            desurl = pdesurl
        WHERE idproduct = pidproduct;
        
    ELSE
		
		INSERT INTO tb_products (desproduct, vlprice, descricao, desurl) 
        VALUES(pdesproduct, pvlprice, pdescricao, pdesurl);
        
        SET pidproduct = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_products WHERE idproduct = pidproduct;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pdesip VARCHAR(45)
)
BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(
piduser INT,
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete`(
piduser INT
)
BEGIN
    
    DECLARE vidperson INT;
    
    SET FOREIGN_KEY_CHECKS = 0;
	
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
	
    DELETE FROM tb_persons WHERE idperson = vidperson;
    
    DELETE FROM tb_userslogs WHERE iduser = piduser;
    DELETE FROM tb_userspasswordsrecoveries WHERE iduser = piduser;
    DELETE FROM tb_orders WHERE iduser = piduser;
    DELETE FROM tb_cartsproducts WHERE idcart IN(SELECT idcart FROM tb_carts WHERE iduser = piduser);
    DELETE FROM tb_carts WHERE iduser = piduser;
    DELETE FROM tb_users WHERE iduser = piduser;
    
    SET FOREIGN_KEY_CHECKS = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-16 14:38:59
