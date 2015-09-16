CREATE DATABASE  IF NOT EXISTS `servicosonline` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `servicosonline`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: servicosonline
-- ------------------------------------------------------
-- Server version	5.6.25

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
-- Table structure for table `emprego`
--

DROP TABLE IF EXISTS `emprego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprego` (
  `id_emprego` int(11) NOT NULL AUTO_INCREMENT,
  `emprego` varchar(255) DEFAULT NULL,
  `img_url` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id_emprego`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprego`
--

LOCK TABLES `emprego` WRITE;
/*!40000 ALTER TABLE `emprego` DISABLE KEYS */;
INSERT INTO `emprego` VALUES (1,'Pedreiro','img/pedrero.jpg'),(2,'Carpinteiro','img/carpinteiro.jpg'),(3,'Barbeiro','img/joao_barbeiro.jpg'),(4,'Gestor','img/carpinteiro.jpg');
/*!40000 ALTER TABLE `emprego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `slogan` varchar(50) DEFAULT NULL,
  `descricao` varchar(999) DEFAULT NULL,
  `destaque` tinyint(4) DEFAULT '0',
  `estado` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_emprego` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (0,'','asd',0,NULL,11,1);
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `img_url` varchar(999) DEFAULT NULL,
  `estrelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'joao_belezza@gmail.com','123456','João Belezza',19,'M',NULL,3),(2,'pedro.ernesto@gmail.com','123456','Pedro Ernesto',26,'M',NULL,4),(3,'maria.rosario@gmail.com','123456','Maria do Rosário',60,'F',NULL,NULL),(4,'rosana.coimbar@gmail.com','123456','Rosana Coimbra',32,'F',NULL,5),(5,'pedro@gmail.com','123456','Pedro Escobar',89,'m',NULL,NULL),(6,'qisso@gmail.com','123456','qisso',19,'m',NULL,NULL),(8,'email@mail.com','123456','nome',18,'m',NULL,NULL),(9,'larissamerelles@gmail.com','123456','Larissa Merelles',25,'f',NULL,NULL),(10,'joaobecker@gmail.com','123456','João Becker',35,'m',NULL,NULL),(11,'Silvana@gmail.com','123456','Silvana Valdemort',36,'f',NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-16  1:01:00
