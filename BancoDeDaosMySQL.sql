CREATE DATABASE  IF NOT EXISTS `decoracoes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `decoracoes`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: decoracoes
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `telefone` int DEFAULT NULL,
  `instagram` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `data_update` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (1,1999999933,'asdndsds','fddssdfsf','2023-11-25 18:35:08');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decoracoes`
--

DROP TABLE IF EXISTS `decoracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decoracoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `highlighted` tinyint(1) NOT NULL,
  `data_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decoracoes`
--

LOCK TABLES `decoracoes` WRITE;
/*!40000 ALTER TABLE `decoracoes` DISABLE KEYS */;
INSERT INTO `decoracoes` VALUES (1,'ARRIÁ','Essa festa foi feita com o tema de arraiá','ArriaPng.png',1,'2023-09-27 21:46:03'),(2,'Frozen','Essa festa foi feita com o tema de Frozen','ArriaPng.png',1,'2023-09-27 21:47:33'),(3,'Branca de neve','Essa festa foi feita com o tema de Branca de neve','ArriaPng.png',1,'2023-09-27 21:48:17'),(4,'Batman','Essa festa foi feita com o tema de Batman','ArriaPng.png',0,'2023-10-03 18:13:17'),(5,'Chaves','Essa festa foi feita com o tema de Batman','ArriaPng.png',0,'2023-10-03 18:13:17'),(6,'Chaves','Essa festa foi feita com o tema de Batman','ArriaPng.png',0,'2023-10-03 18:13:17'),(7,'RRobrin','Essa festa foi feita com o tema de robin','ArriaPng.png',1,'2023-10-15 18:20:00'),(8,'RRobrin','Essa festa foi feita com o tema de robin','ArriaPng.png',1,'2023-10-15 18:20:10'),(9,'RRobrin','Essa festa foi feita com o tema de robin','ArriaPng.png',0,'2023-10-15 18:20:20'),(10,'RRobrin','Essa festa foi feita com o tema de robin','ArriaPng.png',0,'2023-10-15 18:20:30'),(11,'RRobrin','Essa festa foi feita com o tema de robin','ArriaPng.png',0,'2023-10-15 18:20:40');
/*!40000 ALTER TABLE `decoracoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `comentario` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `data_update` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  `produto_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'João','Muito legal','Monstro1.png','2023-11-24 23:48:03',1),(2,'Victor','Gostei','Monstro2.png','2023-11-24 23:48:04',1),(3,'Luiz','Muito Bacana','Monstro4.png','2023-11-24 23:49:03',2),(4,'Cleber','Amei','Monstro5.png','2023-11-24 23:50:03',2),(40,'Gabriel',' Eu Asssmeeiiii','Monstro3.png','2023-11-25 15:42:12',1),(41,'Denise',' lgall','Monstro5.png','2023-11-25 15:42:37',1),(42,'Cleber',' muito legal','Monstro1.png','2023-11-25 15:43:14',4),(43,'teste',' teste','Monstro4.png','2023-11-25 15:53:02',3);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens`
--

DROP TABLE IF EXISTS `imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(250) DEFAULT NULL,
  `produto` int DEFAULT NULL,
  `data` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
INSERT INTO `imagens` VALUES (1,'ArriaPng.png',1,'CURRENT_TIMESTAMP'),(2,'ArriaPng.png',1,'CURRENT_TIMESTAMP'),(3,'ArriaPng.png',1,'CURRENT_TIMESTAMP'),(4,'ArriaPng.png',2,'CURRENT_TIMESTAMP'),(5,'ArriaPng.png',2,'CURRENT_TIMESTAMP'),(6,'ArriaPng.png',3,'CURRENT_TIMESTAMP');
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcerias`
--

DROP TABLE IF EXISTS `parcerias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parcerias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `localizacao` varchar(100) DEFAULT NULL,
  `horario` varchar(20) DEFAULT NULL,
  `celular` int DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `data_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcerias`
--

LOCK TABLES `parcerias` WRITE;
/*!40000 ALTER TABLE `parcerias` DISABLE KEYS */;
INSERT INTO `parcerias` VALUES (1,'Diversão e alegria','Rua do Ousvaldo','09:00 até 18:20',199423523,'decoracao.png','2023-10-02 18:16:24'),(2,'Lugar legal','Rua do marquinho','01:00 até 23:50',1994231231,'decoracao2.jpg','2023-10-02 18:28:38'),(3,'Estrela do céu','Rua do ohdayr','05:00 até 22:50',199432231,'decoracao3.png','2023-10-02 18:29:39');
/*!40000 ALTER TABLE `parcerias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-25 19:10:10
