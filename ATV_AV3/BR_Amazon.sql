-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: transportabrasil
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `destinatario`
--

DROP TABLE IF EXISTS `destinatario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinatario` (
  `iddestinatario` int(11) NOT NULL AUTO_INCREMENT,
  `destinatario` varchar(150) NOT NULL,
  `cpf` bigint(11) unsigned zerofill DEFAULT NULL,
  `cep` int(8) unsigned zerofill DEFAULT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`iddestinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinatario`
--

LOCK TABLES `destinatario` WRITE;
/*!40000 ALTER TABLE `destinatario` DISABLE KEYS */;
INSERT INTO `destinatario` VALUES (1,'Estevão',32544876511,12345678,'Avenida Sete','324','Centro','Distrito Federal','Brasília',61998477454,'estevao@email.net'),(2,'Carlos',23423423401,45124456,'Rodovia Bahia','4345','Centro','Roraima','Boa Vista',95985785612,'carlos@email.com'),(3,'Fernando',75315985251,65742645,'Travessa Amazonas','22-b','Centro','Acre','Rio Branco',68956483574,'fernando@email.com'),(4,'Roberto',42569899412,24670912,'Rua 7 de Setembro','232f','Centro','Distrito Federal','Brasília',61923574012,'roberto@email.com.br'),(5,'Abraão',25845675119,32452452,'Rua Raul Seixas','5553','Centro','Bahia','Salvador',71985743257,'abraao@email.edu.br');
/*!40000 ALTER TABLE `destinatario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrega`
--

DROP TABLE IF EXISTS `entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrega` (
  `identrega` int(11) NOT NULL AUTO_INCREMENT,
  `idenviopk` int(11) NOT NULL,
  `statusenvio` varchar(30) NOT NULL,
  PRIMARY KEY (`identrega`),
  KEY `idenviopk` (`idenviopk`),
  CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`idenviopk`) REFERENCES `envio` (`idenvio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
INSERT INTO `entrega` VALUES (1,5,'Chegou na unidade de destino'),(2,1,'Entregue'),(3,4,'Postado'),(4,2,'Saiu para a entrega'),(5,3,'Voltando para o remetente');
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio`
--

DROP TABLE IF EXISTS `envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envio` (
  `idenvio` int(11) NOT NULL AUTO_INCREMENT,
  `idremetentepk` int(11) NOT NULL,
  `idmercadoriapk` int(11) NOT NULL,
  `iddestinatariopk` int(11) NOT NULL,
  `tipoenvio` varchar(10) NOT NULL,
  PRIMARY KEY (`idenvio`),
  KEY `idremetentepk` (`idremetentepk`),
  KEY `idmercadoriapk` (`idmercadoriapk`),
  KEY `iddestinatariopk` (`iddestinatariopk`),
  CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`idremetentepk`) REFERENCES `remetente` (`idremetente`),
  CONSTRAINT `envio_ibfk_2` FOREIGN KEY (`idmercadoriapk`) REFERENCES `mercadoria` (`idmercadoria`),
  CONSTRAINT `envio_ibfk_3` FOREIGN KEY (`iddestinatariopk`) REFERENCES `destinatario` (`iddestinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio`
--

LOCK TABLES `envio` WRITE;
/*!40000 ALTER TABLE `envio` DISABLE KEYS */;
INSERT INTO `envio` VALUES (1,1,1,1,'Normal'),(2,2,2,2,'Expresso'),(3,3,3,3,'Expresso'),(4,4,4,4,'Normal'),(5,5,5,5,'Expresso');
/*!40000 ALTER TABLE `envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mercadoria`
--

DROP TABLE IF EXISTS `mercadoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mercadoria` (
  `idmercadoria` int(11) NOT NULL AUTO_INCREMENT,
  `idremetentepk` int(11) NOT NULL,
  `mercadoria` varchar(150) NOT NULL,
  `peso` float(7,2) DEFAULT NULL,
  `fragil` varchar(4) NOT NULL,
  PRIMARY KEY (`idmercadoria`),
  KEY `idremetentepk` (`idremetentepk`),
  CONSTRAINT `mercadoria_ibfk_1` FOREIGN KEY (`idremetentepk`) REFERENCES `remetente` (`idremetente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mercadoria`
--

LOCK TABLES `mercadoria` WRITE;
/*!40000 ALTER TABLE `mercadoria` DISABLE KEYS */;
INSERT INTO `mercadoria` VALUES (1,1,'Espelho',0.60,'Sim'),(2,2,'M4 Mechanical Shock',3.00,'Não'),(3,3,'300 Reis FC',0.10,'Sim'),(4,4,'RTX 3090',1.40,'Sim'),(5,5,'Xiaomi Mi 9t Pro',0.20,'Sim');
/*!40000 ALTER TABLE `mercadoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remetente`
--

DROP TABLE IF EXISTS `remetente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remetente` (
  `idremetente` int(11) NOT NULL AUTO_INCREMENT,
  `remetente` varchar(150) NOT NULL,
  `cpfcnpj` bigint(14) unsigned zerofill DEFAULT NULL,
  `cep` int(8) unsigned zerofill DEFAULT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idremetente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remetente`
--

LOCK TABLES `remetente` WRITE;
/*!40000 ALTER TABLE `remetente` DISABLE KEYS */;
INSERT INTO `remetente` VALUES (1,'Eduardo',00012345678910,02458642,'Av. Campos','30','Paraíso','São Paulo','São Paulo',11993429919,'eduardo@email.com'),(2,'AirGuns',12345678000001,55255444,'Travessa Bela Vista','1456','Horizonte','Paraná','Curitiba',46984130024,'contato@airguns.com'),(3,'NumisCoin',58956000045851,68903430,'Rua Professor Caramuru','358','Zerão','Amapá','Macapá',96981425060,'moedas@NumisCoin.com'),(4,'André',00042569899412,42850000,'Rua Maranhão','58-A','Cristo Rei','Bahia','Dias D\'avila',71997020475,'andre@email.com'),(5,'Renan',00065201244801,98547422,'Av. 7 de Setembro','9984','Centro','Rio de Janeiro','Rio de Janeiro',21932542514,'renan@email.com.br');
/*!40000 ALTER TABLE `remetente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-22 16:04:46
