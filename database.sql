-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: localhost    Database: 000_SI_database
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `fest`
--

DROP TABLE IF EXISTS `fest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ticket_count_d1` int(11) NOT NULL,
  `ticket_count_d2` int(11) NOT NULL,
  `ticket_count_d3` int(11) NOT NULL,
  `ticket_price_d1` int(11) NOT NULL,
  `ticket_price_d2` int(11) NOT NULL,
  `ticket_price_d3` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fest`
--

LOCK TABLES `fest` WRITE;
/*!40000 ALTER TABLE `fest` DISABLE KEYS */;
INSERT INTO `fest` VALUES (1,'FestiCoquin','Dans ta chambre','13/02/2018','14/02/2018','Il parait que la nuit, tout est permis...',2,2,-1,69,69,0),(2,'Dark Souls Fest','Dans tes cauchemards','19/02/2018','21/02/2018','C\'est hardcore et tu vas prendre cher...',50,50,50,30,30,30),(3,'LoveFest','Dans tes rêves','29/03/2018','29/03/2018','I love you, you love me... Le festival des amoureux.ses!',200,250,-1,10,12,10),(4,'Rock en Seine','Ile de France','10/04/2018','12/04/2018','Un festival de rock pas comme les autres, qui réunit chaque année des milliers de fans de rock!',2000,2000,2000,30,30,30),(5,'Hellfest','Clisson','25/06/2018','27/06/2018','Le festival des metalleux. Le Hellfest rassemble les fans de musiques extrêmes.',100000,100000,100000,50,50,50),(6,'Beermaggeddon Fest','Paris','22/11/2018','22/11/2018','Le Beermaggeddon fest est fait pour ceux qui aiment le metal et la bière.',200,-1,-1,15,0,0),(7,'Black Metal Death Fest','Paris','22/11/2018','22/11/2018','Âmes sensibles et poseurs en tous genres, s\'abstenir. Ce festival est fait pour les metalleux, les vrais.',150,-1,-1,15,0,0),(8,'Jazz en baie','Normandie','15/08/2018','17/08/2018','Vous avez le blues? Allez à ce festival...',300,300,300,25,25,25),(9,'Festival de la richesse','Paris','14/09/2018','16/09/2018','Le festival des gens fortunés revient pour une 2ème édition!',30,30,30,1000,1000,1000);
/*!40000 ALTER TABLE `fest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Rogeror','rogeroro@roromail.fr','coolpassword','member'),(3,'Monsieur','monsieur@hotmail.fr','1234','member'),(4,'root','root@localhost.fr','root','admin'),(5,'BigBear','poutinette@gmail.fr','jesaispaslol','member');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-14 13:45:31
