CREATE DATABASE  IF NOT EXISTS `servicosonline` /*!40100 DEFAULT CHARACTER SET latin1 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprego`
--

LOCK TABLES `emprego` WRITE;
/*!40000 ALTER TABLE `emprego` DISABLE KEYS */;
INSERT INTO `emprego` VALUES (1,'Adestrador','img/empregos/adestrador.jpg'),(2,'Administrador','img/empregos/administrador.jpg'),(3,'Advogado','img/empregos/advogado.jpg'),(4,'Alfaiate','img/empregos/alfaiate.jpg'),(5,'Arquiteto','img/empregos/arquiteto.jpg'),(6,'Artista circense','img/empregos/artistacircense.jpg'),(7,'Artista plástico','img/empregos/artistaplastico.jpg'),(8,'Ator','img/empregos/ator.jpg'),(9,'Barbeiro','img/empregos/barbeiro.jpg'),(10,'Barman','img/empregos/barman.jpg'),(11,'Cabeleireiro','img/empregos/cabeleireiro.jpg'),(12,'Cantor','img/empregos/cantor.jpg'),(13,'Carpinteiro','img/empregos/carpinteiro.jpg'),(14,'Confeiteiro','img/empregos/confeiteiro.jpg'),(15,'Contador','img/empregos/contador.jpg'),(16,'Cozinheiro','img/empregos/cozinheiro.jpg'),(17,'Costureiro','img/empregos/costureiro.jpg'),(18,'Dançarino','img/empregos/dancarino.jpg'),(19,'Dentista','img/empregos/dentista.jpg'),(20,'Depilador','img/empregos/depilador.jpg'),(21,'Designer','img/empregos/designer.jpg'),(22,'Despachante','img/empregos/despachante.jpg'),(23,'Diarista','img/empregos/diarista.jpg'),(24,'DJ','img/empregos/dj.jpg'),(25,'Educador físico','img/empregos/educadorfisico.jpg'),(26,'Eletricista','img/empregos/eletricista.jpg'),(27,'Encanador','img/empregos/encanador.jpg'),(28,'Enfermeiro','img/empregos/enfermeiro.jpg'),(29,'Engenheiro','img/empregos/engenheiro.jpg'),(30,'Estatístico','img/empregos/estatistico.jpg'),(31,'Fisioterapeuta','img/empregos/fisioterapeuta.jpg'),(32,'Fonoaudiólogo','img/empregos/fonoaudiologo.jpg'),(33,'Fotógrafo','img/empregos/fotografo.jpg'),(34,'Guia de turismo','img/empregos/guiadeturismo.jpg'),(35,'Jardineiro','img/empregos/jardineiro.jpg'),(36,'Lavador de veículos automotores','img/empregos/lavador.jpg'),(37,'Manicure','img/empregos/manicure.jpg'),(38,'Maquiador','img/empregos/maquiador.jpg'),(39,'Marceneiro','img/empregos/marceneiro.jpg'),(40,'Massagista','img/empregos/massagista.jpg'),(41,'Mecânico','img/empregos/mecanico.jpg'),(42,'Médico','img/empregos/medico.jpg'),(43,'Montador de móveis e equipamentos','img/empregos/montador.jpg'),(44,'Motoboy','img/empregos/motoboy.jpg'),(45,'Motorista','img/empregos/motorista.jpg'),(46,'Músico','img/empregos/musico.jpg'),(47,'Nutricionista','img/empregos/nutricionista.jpg'),(48,'Padeiro','img/empregos/padeiro.jpg'),(49,'Pedicure','img/empregos/pedicure.jpg'),(50,'Pedreiro','img/empregos/pedreiro.jpg'),(51,'Pintor','img/empregos/pintor.jpg'),(52,'Professor','img/empregos/professor.jpg'),(53,'Profissional de banho e tosa','img/empregos/profissionalbanhoetosa.jpg'),(54,'Profissional de manutenção de piscinas','img/empregos/profissionalpiscinas.jpg'),(55,'Programador','img/empregos/programador.jpg'),(56,'Psicólogo','img/empregos/psicologo.jpg'),(57,'Publicitário','img/empregos/publicitario.jpg'),(58,'Recepcionista','img/empregos/recepcionista.jpg'),(59,'Relações públicas','img/empregos/rp.jpg'),(60,'Relojoeiro','img/empregos/relojoeiro.jpg'),(61,'Revisor de textos','img/empregos/revisor.jpg'),(62,'Segurança','img/empregos/seguranca.jpg'),(63,'Serralheiro','img/empregos/serralheiro.jpg'),(64,'Técnico em iluminação','img/empregos/tecnicoiluminacao.jpg'),(65,'Técnico em informática','img/empregos/tecnicoinformatica.jpg'),(66,'Técnico em manutenção','img/empregos/tecnicomanutencao.jpg'),(67,'Técnico em som','img/empregos/tecnicosom.jpg'),(68,'Tradutor','img/empregos/tradutor.jpg'),(69,'Veterinário','img/empregos/veterinario.jpg'),(70,'Vidraceiro','img/empregos/vidraceiro.jpg'),(71,'Borracheiro','img/empregos/borracheiro.jpg'),(72,'Cerimonialista','img/empregos/cerimonialista.jpg'),(73,'Chapeador','img/empregos/chapeador.jpg');
/*!40000 ALTER TABLE `emprego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `negociacao`
--

DROP TABLE IF EXISTS `negociacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `negociacao` (
  `id_negociacao` int(11) NOT NULL AUTO_INCREMENT,
  `contratante` int(11) DEFAULT NULL,
  `contratado` int(11) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_negociacao`),
  KEY `contratante` (`contratante`),
  KEY `contratado` (`contratado`),
  KEY `servico` (`id_servico`),
  CONSTRAINT `negociacao_ibfk_1` FOREIGN KEY (`contratante`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `negociacao_ibfk_2` FOREIGN KEY (`contratado`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `negociacao_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `negociacao`
--

LOCK TABLES `negociacao` WRITE;
/*!40000 ALTER TABLE `negociacao` DISABLE KEYS */;
INSERT INTO `negociacao` VALUES (8,12,2,3),(9,11,2,3),(10,11,3,4),(15,12,11,2);
/*!40000 ALTER TABLE `negociacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(999) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_notificacao`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacao`
--

LOCK TABLES `notificacao` WRITE;
/*!40000 ALTER TABLE `notificacao` DISABLE KEYS */;
INSERT INTO `notificacao` VALUES (1,'Uma de suas negociações foi apagada, pois o(a) Teste teste não está mais prestando o serviço de Adestrador\nSe ainda quiser o contato do mesmo(a), segue abaixo: \nE-mail: emailcontato@gmail.com Tel: (51) 3737-9281 Cel: (51) 9438-2932','2015-09-30',12),(2,'Uma de suas negociações foi apagada, pois o(a) Teste teste não está mais prestando o serviço de Alfaiate\nSe ainda quiser o contato do mesmo(a), segue abaixo: \nE-mail: emailcontato@gmail.com Tel: (51) 3737-9281 Cel: (51) 9438-2932','2015-09-30',12),(3,'Uma de suas negociações foi apagada, pois o(a) Teste teste não está mais prestando o serviço de Alfaiate\nSe ainda quiser o contato do mesmo(a), segue abaixo: \nE-mail: emailcontato@gmail.com Tel: (51) 3737-9281 Cel: (51) 9438-2932','2015-09-30',12);
/*!40000 ALTER TABLE `notificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `slogan` varchar(50) DEFAULT NULL,
  `descricao` varchar(999) DEFAULT NULL,
  `destaque` tinyint(4) DEFAULT '0',
  `estado` varchar(10) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `email_contato` varchar(350) DEFAULT NULL,
  `cel_contato` varchar(255) DEFAULT NULL,
  `tel_contato` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_emprego` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `id_emprego` (`id_emprego`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`id_emprego`) REFERENCES `emprego` (`id_emprego`),
  CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (2,'Ser rápido e veloz','x',1,'SP',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',11,1),(3,'Jogo 10','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',2,2),(4,'Trabalho com felicidade','x',0,'RJ',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',3,3),(12,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,6),(13,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,7),(14,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,8),(16,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,10),(17,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,11),(18,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,12),(19,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,13),(20,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,14),(21,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,15),(22,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,16),(23,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,17),(24,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,18),(25,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,19),(26,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,20),(27,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,21),(28,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,22),(29,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,23),(30,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,24),(31,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,25),(32,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,26),(33,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,27),(34,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,28),(35,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,29),(36,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,30),(37,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,31),(38,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,32),(39,'Teste','x',0,'RS',NULL,'emailcontato@gmail.com','(51) 9438-2932','(51) 3737-9281',12,33);
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
  `numero_servicos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'joao_belezza@gmail.com','123456','João Belezza',19,'M',NULL,3,0),(2,'pedro.ernesto@gmail.com','123456','Pedro Ernesto',26,'M',NULL,4,0),(3,'maria.rosario@gmail.com','123456','Maria do Rosário',60,'F',NULL,NULL,0),(4,'rosana.coimbar@gmail.com','123456','Rosana Coimbra',32,'F',NULL,5,4),(5,'pedro@gmail.com','123456','Pedro Escobar',89,'m',NULL,NULL,2),(6,'qisso@gmail.com','123456','qisso',19,'m',NULL,NULL,1),(8,'email@mail.com','123456','nome',18,'m',NULL,NULL,3),(9,'larissamerelles@gmail.com','123456','Larissa Merelles',25,'f',NULL,NULL,2),(10,'joaobecker@gmail.com','123456','João Becker',35,'m',NULL,NULL,0),(11,'Silvana@gmail.com','123456','Silvana Valdemort',36,'f',NULL,3,1),(12,'teste@gmail.com','123456','Teste teste',20,'m',NULL,NULL,5);
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

-- Dump completed on 2015-09-30  1:22:02
