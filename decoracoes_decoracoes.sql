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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-21 11:38:32
