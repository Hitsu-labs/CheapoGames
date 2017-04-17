-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: Games
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Account` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Email` text NOT NULL,
  PRIMARY KEY (`ID`,`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account`
--

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
INSERT INTO `Account` VALUES ('ztest','$2y$10$XrCx4lxNr2kIZlWgwQ4/N.pneN/rfreuTx5xGQg.KWbkOi.TGIwPe',1,'ztest'),('','$2y$10$Ud0qGyU4jyO6c9.DcGNv4OqZ93lQ4myg4JhBhosv5K0oAwlL5pN7a',2,''),('asd','$2y$10$SbnKhheKawQk9x5UhrC9GeiKp1LLq7xJL.jCLAN32YBNl2noWx/XS',3,'asd'),('great','$2y$10$F6ah4jJIR73BACa.sZ8nReGdCmJMRnGdH0Kz2P2645O/AgVuKVxVW',4,'great'),('gold','$2y$10$LYNci4iE7KSXf/B9XBmk7eUYkZbUd6Owu2NWnPyllVuNro8vJXeyC',5,'gold'),('derp','$2y$10$jkO1eEkVROahlona65cDTunUmqn0K3u0U91Lg1Gs8BxIamFWZN6KG',6,'derp'),('lol','$2y$10$fLIJ8Ed/jtK2uCzT4ztr2u8mUybx2sbVIF2WrXgf7k1KmBVUI9.iq',7,'lol'),('boop','$2y$10$6gCefTz.0zelBaMERYRLJ.diUg4iwE1pWeOxmdwW5OxDSC8g98O1a',8,'boop'),('foob','$2y$10$zzXufylq1Hmd5aSqMlkTIuVzqdlnIBb8/dgjgSnGIsufjDOo8gwwe',9,'foob'),('dsad','$2y$10$Ls0CQ4vmgPfGPi.3/AzZnu34xj0eNo93n93pSSnGsVkJMz6SxA2H.',10,'wasd'),('JOhn','$2y$10$UjgyeHlb3iwJKWW7Lmw8aeSjqhC6TeyRWeZM/2n6lbxN4uxDqh1Bq',11,'jed34@njit.ed'),('blerp','$2y$10$66S6NZk75joL8VrUr/9S/e.3wPVWsnMAi9nCSAnUAOftaPcCeClNq',12,'blerp'),('fuck','$2y$10$3qbCJ/as.IPAogxV3vryy.TjS5aFApN9IHUMD2m667g5qJkaJKghe',13,'fuck'),('name','$2y$10$IscdMhwpYlKvW9cCxShvm.KWJO.vCjtOERgV77IvdRORgxm7yuZiO',14,'name'),('berp','$2y$10$ovnZnVmnIRSvLmz.W0icyuHl28H2IKmFQzOY7RIXLASomoBNnFynq',15,'berp'),('andy','$2y$10$/.NPthV6MvpQvsVP9Ufd6.JBR0e3VczSwNdicvvCv.Fshmnxe3PRm',16,'andy'),('pij','$2y$10$8iS6Yv.Xrc6tja4OwROE0ORkNynw5Y/8qOWy2TcwQeWfOKtVP4J0u',17,'pij'),('ook','$2y$10$pKtL8YdS/pXprtWyRyApXOEe/3cZ7WIgVNbdtLHRhYFoXesSwRX4W',18,'ook'),('wedidit','$2y$10$k6wPvZ9q.56tOaJLtsnERewSZ3F3xqob7drLNdanfxriCASol5XHG',19,'wedidit'),('yay','$2y$10$/if9yhtkq8lvUVi98VPEaePDEV0RZtgL5MrSjQpDL.WrxUWXul6xC',20,'yay'),('wow','$2y$10$1Im6rP8LwUeVqg2SC8ZFXehuePolpXFSjXeEFHqRMZc3xGG6mC9gK',21,'wow'),('free','$2y$10$49PllDq6MsSYIlnzXbGnnOywDPpq0K6NjNreXe/ZVRDrLe5pChzTi',22,'free'),('cpxpryde','$2y$10$ChnI5127RtqAvzNBWrw.JeWOdXdwb8Gsrl71R5OSkvfIZkLVrZUHu',23,'cpxpryde'),('hil','$2y$10$.uGh8XyEZU.3D4njTgwhIeU3S7ANwEfEQ0Cpz/n9R7DIUaVpnB0om',24,'hil'),('al','$2y$10$oW8ITV9HLmbZt31L/oEqTe.mSxGcQ1lLZeBmwtGm0bhzrPVDC646q',25,'al'),('zak','$2y$10$QAyMV/hziLS5E7Vu8AOaEuf2RUpVQImCqnT8SZbsbyV6pZVJJc.mm',26,'zak');
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Games`
--

DROP TABLE IF EXISTS `Games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Games` (
  `GameID` int(255) NOT NULL AUTO_INCREMENT,
  `Title` varchar(254) NOT NULL,
  `Summary` text NOT NULL,
  `Game_URL` text NOT NULL,
  `Picture_URL` text NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`GameID`,`Title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Games`
--

LOCK TABLES `Games` WRITE;
/*!40000 ALTER TABLE `Games` DISABLE KEYS */;
INSERT INTO `Games` VALUES (2,'','','','http://www.gamestop.com/browse/xbox-one?nav=16k-3-xbox+live+gold%2C28zu0%2C131e0/console-subscriptions/3-month-xbox-live-gold-membership/84476',24.99);
/*!40000 ALTER TABLE `Games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wishlist`
--

DROP TABLE IF EXISTS `Wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wishlist` (
  `AccountID` int(255) NOT NULL,
  `GameID` int(255) NOT NULL,
  KEY `AccountID` (`AccountID`),
  KEY `GameID` (`GameID`),
  CONSTRAINT `Wishlist_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`ID`),
  CONSTRAINT `Wishlist_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `Games` (`GameID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wishlist`
--

LOCK TABLES `Wishlist` WRITE;
/*!40000 ALTER TABLE `Wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-17 10:34:39
