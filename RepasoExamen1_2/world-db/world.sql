-- MySQL dump 10.13  Distrib 8.0.19, for osx10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: world
-- ------------------------------------------------------
-- Server version	8.0.19-debug

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @old_autocommit=@@autocommit;

--
-- Current Database: `world`
--

/*!40000 DROP DATABASE IF EXISTS `world`*/;

CREATE DATABASE `world` DEFAULT CHARACTER SET utf8mb4;

USE `world`;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` char(35) NOT NULL DEFAULT '',
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `District` char(20) NOT NULL DEFAULT '',
  `Population` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `CountryCode` (`CountryCode`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `country` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--
-- ORDER BY:  `ID`

set autocommit=0;
INSERT INTO `city` VALUES (1,'Kabul','AFG','Kabol',1780000);
INSERT INTO `city` VALUES (2,'Qandahar','AFG','Qandahar',237500);
INSERT INTO `city` VALUES (3,'Herat','AFG','Herat',186800);
INSERT INTO `city` VALUES (4,'Mazar-e-Sharif','AFG','Balkh',127800);
INSERT INTO `city` VALUES (5,'Amsterdam','ABW','Noord-Holland',731200);
INSERT INTO `city` VALUES (6,'Rotterdam','ABW','Zuid-Holland',593321);
INSERT INTO `city` VALUES (7,'Haag','ABW','Zuid-Holland',440900);
INSERT INTO `city` VALUES (8,'Utrecht','ABW','Utrecht',234323);
INSERT INTO `city` VALUES (9,'Eindhoven','ABW','Noord-Brabant',201843);
INSERT INTO `city` VALUES (10,'Tilburg','ABW','Noord-Brabant',193238);
INSERT INTO `city` VALUES (11,'Groningen','ABW','Groningen',172701);
INSERT INTO `city` VALUES (12,'Breda','ABW','Noord-Brabant',160398);
INSERT INTO `city` VALUES (13,'Apeldoorn','ABW','Gelderland',153491);
INSERT INTO `city` VALUES (14,'Nijmegen','ABW','Gelderland',152463);
INSERT INTO `city` VALUES (15,'Enschede','ABW','Overijssel',149544);
INSERT INTO `city` VALUES (16,'Haarlem','ABW','Noord-Holland',148772);
INSERT INTO `city` VALUES (17,'Almere','ABW','Flevoland',142465);
INSERT INTO `city` VALUES (18,'Arnhem','ABW','Gelderland',138020);
INSERT INTO `city` VALUES (19,'Zaanstad','ABW','Noord-Holland',135621);
INSERT INTO `city` VALUES (20,'´s-Hertogenbosch','ABW','Noord-Brabant',129170);
INSERT INTO `city` VALUES (21,'Amersfoort','ABW','Utrecht',126270);
INSERT INTO `city` VALUES (22,'Maastricht','ABW','Limburg',122087);
INSERT INTO `city` VALUES (23,'Dordrecht','ABW','Zuid-Holland',119811);
INSERT INTO `city` VALUES (24,'Leiden','ABW','Zuid-Holland',117196);
INSERT INTO `city` VALUES (25,'Haarlemmermeer','ABW','Noord-Holland',110722);
INSERT INTO `city` VALUES (26,'Zoetermeer','ABW','Zuid-Holland',110214);
INSERT INTO `city` VALUES (27,'Emmen','ABW','Drenthe',105853);
INSERT INTO `city` VALUES (28,'Zwolle','ABW','Overijssel',105819);
INSERT INTO `city` VALUES (29,'Ede','ABW','Gelderland',101574);
INSERT INTO `city` VALUES (30,'Delft','ABW','Zuid-Holland',95268);
INSERT INTO `city` VALUES (31,'Heerlen','ABW','Limburg',95052);
INSERT INTO `city` VALUES (32,'Alkmaar','ABW','Noord-Holland',92713);
INSERT INTO `city` VALUES (33,'Willemstad','ANT','Curaçao',2345);
INSERT INTO `city` VALUES (34,'Tirana','ALB','Tirana',270000);
INSERT INTO `city` VALUES (35,'Alger','ARG','Alger',2168000);
INSERT INTO `city` VALUES (36,'Oran','ARG','Oran',609823);
INSERT INTO `city` VALUES (37,'Constantine','ARG','Constantine',443727);
INSERT INTO `city` VALUES (38,'Annaba','ARG','Annaba',222518);
INSERT INTO `city` VALUES (39,'Batna','ARG','Batna',183377);
INSERT INTO `city` VALUES (40,'Sétif','ARG','Sétif',179055);
INSERT INTO `city` VALUES (41,'Sidi Bel Abbès','ARG','Sidi Bel Abbès',153106);
INSERT INTO `city` VALUES (42,'Skikda','ARG','Skikda',128747);
INSERT INTO `city` VALUES (43,'Biskra','ARG','Biskra',128281);
INSERT INTO `city` VALUES (44,'Blida (el-Boulaida)','ARG','Blida',127284);
INSERT INTO `city` VALUES (45,'Béjaïa','ARG','Béjaïa',117162);
INSERT INTO `city` VALUES (46,'Mostaganem','ARG','Mostaganem',115212);
INSERT INTO `city` VALUES (47,'Tébessa','ARG','Tébessa',112007);
INSERT INTO `city` VALUES (48,'Tlemcen (Tilimsen)','ARG','Tlemcen',110242);
INSERT INTO `city` VALUES (49,'Béchar','ARG','Béchar',107311);
INSERT INTO `city` VALUES (50,'Tiaret','ARG','Tiaret',100118);
commit;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `Code` char(3) NOT NULL DEFAULT '',
  `Name` char(52) NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL DEFAULT 'Asia',
  `Region` char(26) NOT NULL DEFAULT '',
  `SurfaceArea` decimal(10,2) NOT NULL DEFAULT '0.00',
  `IndepYear` smallint DEFAULT NULL,
  `Population` int NOT NULL DEFAULT '0',
  `LifeExpectancy` decimal(3,1) DEFAULT NULL,
  `GNP` decimal(10,2) DEFAULT NULL,
  `GNPOld` decimal(10,2) DEFAULT NULL,
  `LocalName` char(45) NOT NULL DEFAULT '',
  `GovernmentForm` char(45) NOT NULL DEFAULT '',
  `HeadOfState` char(60) DEFAULT NULL,
  `Capital` int DEFAULT NULL,
  `Code2` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--
-- ORDER BY:  `Code`

set autocommit=0;
INSERT INTO `country` VALUES ('ABW','Aruba','North America','Caribbean',193.00,NULL,103000,78.4,828.00,793.00,'Aruba','Nonmetropolitan Territory of The Netherlands','Beatrix',129,'AW');
INSERT INTO `country` VALUES ('AFG','Afghanistan','Asia','Southern and Central Asia',652090.00,1919,22720000,45.9,5976.00,NULL,'Afganistan/Afqanestan','Islamic Emirate','Mohammad Omar',1,'AF');
INSERT INTO `country` VALUES ('AGO','Angola','Africa','Central Africa',1246700.00,1975,12878000,38.3,6648.00,7984.00,'Angola','Republic','José Eduardo dos Santos',56,'AO');
INSERT INTO `country` VALUES ('AIA','Anguilla','North America','Caribbean',96.00,NULL,8000,76.1,63.20,NULL,'Anguilla','Dependent Territory of the UK','Elisabeth II',62,'AI');
INSERT INTO `country` VALUES ('ALB','Albania','Europe','Southern Europe',28748.00,1912,3401200,71.6,3205.00,2500.00,'Shqipëria','Republic','Rexhep Mejdani',34,'AL');
INSERT INTO `country` VALUES ('AND','Andorra','Europe','Southern Europe',468.00,1278,78000,83.5,1630.00,NULL,'Andorra','Parliamentary Coprincipality','',55,'AD');
INSERT INTO `country` VALUES ('ANT','Netherlands Antilles','North America','Caribbean',800.00,NULL,217000,74.7,1941.00,NULL,'Nederlandse Antillen','Nonmetropolitan Territory of The Netherlands','Beatrix',33,'AN');
INSERT INTO `country` VALUES ('ARE','United Arab Emirates','Asia','Middle East',83600.00,1971,2441000,74.1,37966.00,36846.00,'Al-Imarat al-´Arabiya al-Muttahida','Emirate Federation','Zayid bin Sultan al-Nahayan',65,'AE');
INSERT INTO `country` VALUES ('ARG','Argentina','South America','South America',2780400.00,1816,37032000,75.1,340238.00,323310.00,'Argentina','Federal Republic','Fernando de la Rúa',69,'AR');
INSERT INTO `country` VALUES ('ARM','Armenia','Asia','Middle East',29800.00,1991,3520000,66.4,1813.00,1627.00,'Hajastan','Republic','Robert Kotšarjan',126,'AM');
commit;

--
-- Table structure for table `countrylanguage`
--

DROP TABLE IF EXISTS `countrylanguage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countrylanguage` (
  `CountryCode` char(3) NOT NULL DEFAULT '',
  `Language` char(30) NOT NULL DEFAULT '',
  `IsOfficial` enum('T','F') NOT NULL DEFAULT 'F',
  `Percentage` decimal(4,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`CountryCode`,`Language`),
  KEY `CountryCode` (`CountryCode`),
  CONSTRAINT `countryLanguage_ibfk_1` FOREIGN KEY (`CountryCode`) REFERENCES `country` (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrylanguage`
--
-- ORDER BY:  `CountryCode`,`Language`

set autocommit=0;
INSERT INTO `countrylanguage` VALUES ('ABW','Dutch','T',5.3);
INSERT INTO `countrylanguage` VALUES ('ABW','English','F',9.5);
INSERT INTO `countrylanguage` VALUES ('ABW','Papiamento','F',76.7);
INSERT INTO `countrylanguage` VALUES ('ABW','Spanish','F',7.4);
INSERT INTO `countrylanguage` VALUES ('AFG','Balochi','F',0.9);
INSERT INTO `countrylanguage` VALUES ('AFG','Dari','T',32.1);
INSERT INTO `countrylanguage` VALUES ('AFG','Pashto','T',52.4);
INSERT INTO `countrylanguage` VALUES ('AFG','Turkmenian','F',1.9);
INSERT INTO `countrylanguage` VALUES ('AFG','Uzbek','F',8.8);
INSERT INTO `countrylanguage` VALUES ('AGO','Ambo','F',2.4);
INSERT INTO `countrylanguage` VALUES ('AGO','Chokwe','F',4.2);
INSERT INTO `countrylanguage` VALUES ('AGO','Kongo','F',13.2);
INSERT INTO `countrylanguage` VALUES ('AGO','Luchazi','F',2.4);
INSERT INTO `countrylanguage` VALUES ('AGO','Luimbe-nganguela','F',5.4);
INSERT INTO `countrylanguage` VALUES ('AGO','Luvale','F',3.6);
INSERT INTO `countrylanguage` VALUES ('AGO','Mbundu','F',21.6);
INSERT INTO `countrylanguage` VALUES ('AGO','Nyaneka-nkhumbi','F',5.4);
INSERT INTO `countrylanguage` VALUES ('AGO','Ovimbundu','F',37.2);
INSERT INTO `countrylanguage` VALUES ('AIA','English','T',0.0);
INSERT INTO `countrylanguage` VALUES ('ALB','Albaniana','T',97.9);
INSERT INTO `countrylanguage` VALUES ('ALB','Greek','F',1.8);
INSERT INTO `countrylanguage` VALUES ('ALB','Macedonian','F',0.1);
INSERT INTO `countrylanguage` VALUES ('AND','Catalan','T',32.3);
INSERT INTO `countrylanguage` VALUES ('AND','French','F',6.2);
INSERT INTO `countrylanguage` VALUES ('AND','Portuguese','F',10.8);
INSERT INTO `countrylanguage` VALUES ('AND','Spanish','F',44.6);
INSERT INTO `countrylanguage` VALUES ('ANT','Dutch','T',0.0);
INSERT INTO `countrylanguage` VALUES ('ANT','English','F',7.8);
INSERT INTO `countrylanguage` VALUES ('ANT','Papiamento','T',86.2);
INSERT INTO `countrylanguage` VALUES ('ARE','Arabic','T',42.0);
INSERT INTO `countrylanguage` VALUES ('ARE','Hindi','F',0.0);
INSERT INTO `countrylanguage` VALUES ('ARG','Indian Languages','F',0.3);
INSERT INTO `countrylanguage` VALUES ('ARG','Italian','F',1.7);
INSERT INTO `countrylanguage` VALUES ('ARG','Spanish','T',96.8);
INSERT INTO `countrylanguage` VALUES ('ARM','Armenian','T',93.4);
INSERT INTO `countrylanguage` VALUES ('ARM','Azerbaijani','F',2.6);
INSERT INTO `countrylanguage` VALUES ('ASM','English','T',3.1);
INSERT INTO `countrylanguage` VALUES ('ASM','Samoan','T',90.6);
INSERT INTO `countrylanguage` VALUES ('ASM','Tongan','F',3.1);
INSERT INTO `countrylanguage` VALUES ('ATG','Creole English','F',95.7);
INSERT INTO `countrylanguage` VALUES ('ATG','English','T',0.0);
INSERT INTO `countrylanguage` VALUES ('AUS','Arabic','F',1.0);
INSERT INTO `countrylanguage` VALUES ('AUS','Canton Chinese','F',1.1);
INSERT INTO `countrylanguage` VALUES ('AUS','English','T',81.2);
INSERT INTO `countrylanguage` VALUES ('AUS','German','F',0.6);
INSERT INTO `countrylanguage` VALUES ('AUS','Greek','F',1.6);
INSERT INTO `countrylanguage` VALUES ('AUS','Italian','F',2.2);
INSERT INTO `countrylanguage` VALUES ('AUS','Serbo-Croatian','F',0.6);
INSERT INTO `countrylanguage` VALUES ('AUS','Vietnamese','F',0.8);
INSERT INTO `countrylanguage` VALUES ('AUT','Czech','F',0.2);
INSERT INTO `countrylanguage` VALUES ('AUT','German','T',92.0);
INSERT INTO `countrylanguage` VALUES ('AUT','Hungarian','F',0.4);
INSERT INTO `countrylanguage` VALUES ('AUT','Polish','F',0.2);
INSERT INTO `countrylanguage` VALUES ('AUT','Romanian','F',0.2);
INSERT INTO `countrylanguage` VALUES ('AUT','Serbo-Croatian','F',2.2);
INSERT INTO `countrylanguage` VALUES ('AUT','Slovene','F',0.4);
INSERT INTO `countrylanguage` VALUES ('AUT','Turkish','F',1.5);
INSERT INTO `countrylanguage` VALUES ('AZE','Armenian','F',2.0);
INSERT INTO `countrylanguage` VALUES ('AZE','Azerbaijani','T',89.0);
INSERT INTO `countrylanguage` VALUES ('AZE','Lezgian','F',2.3);
INSERT INTO `countrylanguage` VALUES ('AZE','Russian','F',3.0);
commit;

--
-- Dumping events for database 'world'
--

--
-- Dumping routines for database 'world'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
SET autocommit=@old_autocommit;

-- Dump completed on 2020-01-22  9:56:18
