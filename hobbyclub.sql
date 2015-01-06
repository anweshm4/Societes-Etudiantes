-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Hobbyclub
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `club` (
  `clubid` int(5) NOT NULL DEFAULT '0',
  `clubname` varchar(30) DEFAULT NULL,
  `classroomid` int(5) DEFAULT NULL,
  PRIMARY KEY (`clubid`),
  UNIQUE KEY `clubname` (`clubname`),
  UNIQUE KEY `classroomid` (`classroomid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES (1,'Quizzing',443),(2,'Coding',444),(3,'Maths',446),(4,'Chemistry',448),(5,'Physics',449),(6,'Electronics',431),(7,'Graphics',442);
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor` (
  `mentorid` int(5) NOT NULL DEFAULT '0',
  `mentorname` varchar(30) DEFAULT NULL,
  `emailid` varchar(40) DEFAULT NULL,
  `clubid` int(5) DEFAULT NULL,
  PRIMARY KEY (`mentorid`),
  KEY `clubid` (`clubid`),
  CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`clubid`) REFERENCES `club` (`clubid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor`
--

LOCK TABLES `mentor` WRITE;
/*!40000 ALTER TABLE `mentor` DISABLE KEYS */;
INSERT INTO `mentor` VALUES (1,'Joy Paulose','joy.paulose@christuniversity.in',6),(2,'Rajeshwari CN','rajeshwari.cn@christuniversity.in',3),(3,'Rohini V','rohini.v@christuniversity.in',4),(4,'Vinay M','vinay.m@christuniversity.in',2),(5,'Nachamai M','nachamai.m@christuniversity.in',5),(6,'Jibrael Jos','jibrael.jos@christuniversity.in',1),(7,'Vaidehi V','vaidehi.v@christuniversity.in',7);
/*!40000 ALTER TABLE `mentor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `president`
--

DROP TABLE IF EXISTS `president`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `president` (
  `presidentid` int(2) NOT NULL AUTO_INCREMENT,
  `registerno` int(7) DEFAULT NULL,
  `clubid` int(5) DEFAULT NULL,
  PRIMARY KEY (`presidentid`),
  KEY `registerno` (`registerno`),
  KEY `clubid` (`clubid`),
  CONSTRAINT `president_ibfk_1` FOREIGN KEY (`registerno`) REFERENCES `student` (`registerno`),
  CONSTRAINT `president_ibfk_2` FOREIGN KEY (`clubid`) REFERENCES `club` (`clubid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `president`
--

LOCK TABLES `president` WRITE;
/*!40000 ALTER TABLE `president` DISABLE KEYS */;
INSERT INTO `president` VALUES (2,1425008,2),(3,1425006,6),(4,1425019,3),(5,1425004,4),(6,1425012,1),(7,1425043,5),(8,1425010,7);
/*!40000 ALTER TABLE `president` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `sessionid` int(5) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `clubid` int(5) DEFAULT NULL,
  `mentorid` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `registerno` int(7) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `clubid` int(5) NOT NULL,
  `emailid` varchar(60) DEFAULT NULL,
  `joindate` date NOT NULL,
  `AGP` mediumint(9) DEFAULT NULL,
  `CCGP` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`registerno`),
  KEY `clubid` (`clubid`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`clubid`) REFERENCES `club` (`clubid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1425001,'Aju Anthony',7,'aju.anthony@cs.christuniversity.in','2015-01-06',60,70),(1425002,'Amlan Saikia',5,'amlan.saikia@cs.christuniversity.in','2014-11-20',80,60),(1425004,'Arjun RL',4,'arjun.r@christuniversity.in','2014-12-29',65,75),(1425006,'Ashish Koushik',6,'ashish.koushik@cs.christuniversity.in','2014-12-29',75,70),(1425008,'Dukjam Gya',2,'dujkam.gya@cs.christuniversity.in','2014-11-18',70,60),(1425009,'Gururaj Bagali',5,'gururaj.bagali@cs.christuniversity.in','2014-12-29',65,60),(1425010,'Ayesha Farheen',7,'ayesha.farheen@cs.christuniversity.in','2015-01-06',65,65),(1425011,'Jijo Joseph',7,'jijo.joseph@cs.christuniversity.in','2015-01-06',65,60),(1425012,'Leo Jose',1,'leo.jose@cs.christuniversity.in','2014-12-29',65,65),(1425013,'Lijo Joby',5,'lijo.joby@cs.christuniversity.in','2014-12-29',65,70),(1425019,'Raphael Ribeiro',3,'raphael.ribeiro@cs.christuniversity.in','2014-11-17',60,50),(1425020,'Sachin Giriyappanavar',1,'sachin.giriyappanavar@cs.christuniversity.in','2014-12-29',75,70),(1425023,'Ramachandran Tawker',2,'ramachandran.tawker@cs.christuniversity.in','2014-12-29',65,70),(1425028,'Yogeshwar MV',4,'yogeshwar.mv@cs.christuniversity.in','2014-12-29',65,60),(1425043,'Christine Mathayis',5,'renita.mathayis@cs.christuniversity.in','2014-12-16',65,70),(1425049,'Tashi Mishra',3,'tashi.mishra@cs.christuniversity.in','2014-12-29',75,70);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-06 14:37:18
