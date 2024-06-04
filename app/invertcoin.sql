-- MySQL dump 10.13  Distrib 5.7.19, for solaris11 (x86_64)
--
-- Host: localhost    Database: invertcoin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordenes` (
  `idOrden` int(11) NOT NULL AUTO_INCREMENT,
  `inversion` double(10,2) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `orden1` double(10,2) NOT NULL,
  `fechamin1` date NOT NULL,
  `valorbtcmin1` double(10,2) NOT NULL,
  `tradebtc1` double(10,2) NOT NULL,
  `fechamax1` date NOT NULL,
  `valorBTCmax1` double(10,2) NOT NULL,
  `outusd1` double(10,2) NOT NULL,
  `gananciabruta1` double(10,2) NOT NULL,
  `retab1` double(10,2) NOT NULL,
  `comision1` double(10,2) NOT NULL,
  `recupero1` double(10,2) NOT NULL,
  `estado1` varchar(15) NOT NULL,
  `orden2` double(10,2) NOT NULL,
  `fechamin2` date NOT NULL,
  `valorbtcmin2` double(10,2) NOT NULL,
  `tradebtc2` double(10,2) NOT NULL,
  `fechamax2` date NOT NULL,
  `valorBTCmax2` double(10,2) NOT NULL,
  `outusd2` double(10,2) NOT NULL,
  `gananciabruta2` double(10,2) NOT NULL,
  `retab2` double(10,2) NOT NULL,
  `comision2` double(10,2) NOT NULL,
  `recupero2` double(10,2) NOT NULL,
  `estado2` varchar(15) NOT NULL,
  `orden3` double(10,2) NOT NULL,
  `fechamin3` date NOT NULL,
  `valorbtcmin3` double(10,2) NOT NULL,
  `tradebtc3` double(10,2) NOT NULL,
  `fechamax3` date NOT NULL,
  `valorBTCmax3` double(10,2) NOT NULL,
  `outusd3` double(10,2) NOT NULL,
  `gananciabruta3` double(10,2) NOT NULL,
  `retab3` double(10,2) NOT NULL,
  `comision3` double(10,2) NOT NULL,
  `recupero3` double(10,2) NOT NULL,
  `estado3` varchar(15) NOT NULL,
  `orden4` double(10,2) NOT NULL,
  `fechamin4` date NOT NULL,
  `valorbtcmin4` double(10,2) NOT NULL,
  `tradebtc4` double(10,2) NOT NULL,
  `fechamax4` date NOT NULL,
  `valorBTCmax4` double(10,2) NOT NULL,
  `outusd4` double(10,2) NOT NULL,
  `gananciabruta4` double(10,2) NOT NULL,
  `retab4` double(10,2) NOT NULL,
  `comision4` double(10,2) NOT NULL,
  `recupero4` double(10,2) NOT NULL,
  `estado4` varchar(15) NOT NULL,
  PRIMARY KEY (`idOrden`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes`
--

LOCK TABLES `ordenes` WRITE;
/*!40000 ALTER TABLE `ordenes` DISABLE KEYS */;
INSERT  IGNORE INTO `ordenes` VALUES (1,100000.00,1,25000.00,'2021-03-03',29039.00,0.86,'2021-03-03',34720.00,29890.45,4890.45,19.56,489.05,29401.40,'Aceptado',35000.00,'2021-03-03',30933.00,1.13,'2021-03-03',33142.00,37500.17,2500.17,7.14,250.02,37250.15,'Aceptado',15000.00,'2021-03-03',29355.00,0.51,'2021-03-03',32511.00,16613.12,1613.12,10.75,161.31,16451.81,'Aceptado',25000.00,'2021-03-03',28408.00,0.88,'2021-03-03',32195.00,28331.60,3331.60,13.33,333.16,27998.44,'Aceptado'),(2,100000.00,1,25000.00,'2021-03-04',29039.00,0.86,'2021-03-04',34720.00,29890.45,4890.45,19.56,489.05,29401.40,'Aceptado',35000.00,'2021-03-04',30933.00,1.13,'2021-03-04',33142.00,37500.17,2500.17,7.14,250.02,37250.15,'Aceptado',15000.00,'2021-03-04',29355.00,0.51,'2021-03-04',32511.00,16613.12,1613.12,10.75,161.31,16451.81,'Aceptado',25000.00,'2021-03-04',28408.00,0.88,'2021-03-04',32195.00,28331.60,3331.60,13.33,333.16,27998.44,'Aceptado');
/*!40000 ALTER TABLE `ordenes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10  6:15:08


-- MySQL dump 10.13  Distrib 5.7.19, for solaris11 (x86_64)
--
-- Host: localhost    Database: invertcoin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `billetera` varchar(20) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT  IGNORE INTO `clientes` VALUES (1,'Laura Piragine','31450395','23155544',1,'Activo',''),(10,'Matias','8888','54654',1,'Activo',''),(15,'Matias Galasso','37240444','50000',2,'Activo','Hay que poner stop'),(16,'Test','123456','10000',1,'Activo','');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10  6:15:08


-- MySQL dump 10.13  Distrib 5.7.19, for solaris11 (x86_64)
--
-- Host: localhost    Database: invertcoin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) NOT NULL,
  `orden1` float NOT NULL,
  `minOr1` float NOT NULL,
  `maxOr1` float NOT NULL,
  `orden2` float NOT NULL,
  `minOr2` float NOT NULL,
  `maxOr2` float NOT NULL,
  `orden3` float NOT NULL,
  `maxOr3` float NOT NULL,
  `minOr3` float NOT NULL,
  `orden4` float NOT NULL,
  `maxOr4` float NOT NULL,
  `minOr4` float NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT  IGNORE INTO `perfil` VALUES (1,'Conservador',25,8,10,35,2,5,15,3,7,25,2,10),(2,'Intermedio',40,10,12,30,12,14,20,8,6,10,6,4),(3,'R-A ',35,35,30,40,55,5,80,5,15,90,5,5),(4,'R-A ',35,35,30,40,55,5,80,5,15,90,5,5);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10  6:15:08


-- MySQL dump 10.13  Distrib 5.7.19, for solaris11 (x86_64)
--
-- Host: localhost    Database: invertcoin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `bitcoinvalorapi`
--

DROP TABLE IF EXISTS `bitcoinvalorapi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitcoinvalorapi` (
  `valor` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitcoinvalorapi`
--

LOCK TABLES `bitcoinvalorapi` WRITE;
/*!40000 ALTER TABLE `bitcoinvalorapi` DISABLE KEYS */;
INSERT  IGNORE INTO `bitcoinvalorapi` VALUES (31564);
/*!40000 ALTER TABLE `bitcoinvalorapi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10  6:15:07


-- MySQL dump 10.13  Distrib 5.7.19, for solaris11 (x86_64)
--
-- Host: localhost    Database: invertcoin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usu_codigo` varchar(30) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_ult_acceso` varchar(20) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `usu_estado` char(10) NOT NULL,
  `usu_nivel` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT  IGNORE INTO `usuarios` VALUES ('admin','Invertcoin2021*','admin','08/04/2021 16:40:41',NULL,'Activo','A'),('37240444','37240444','37240444','03/03/2021 11:58:16',15,'Activo','C'),('31450395','31450395','31450395','08/04/2021 16:32:59',1,'Activo','C'),('123456','123456','123456','03/03/2021 12:00:35',16,'Activo','C');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10  6:15:08


-- MySQL dump 10.13  Distrib 5.7.19, for solaris11 (x86_64)
--
-- Host: localhost    Database: invertcoin
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `ordenes1`
--

DROP TABLE IF EXISTS `ordenes1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordenes1` (
  `orden1` double(10,2) NOT NULL,
  `fechamin1` date NOT NULL,
  `valorbtcmin1` double(10,2) NOT NULL,
  `tradebtc1` double(10,2) NOT NULL,
  `fechamax1` date NOT NULL,
  `valorBTCmax1` double(10,2) NOT NULL,
  `outusd1` double(10,2) NOT NULL,
  `gananciabruta1` double(10,2) NOT NULL,
  `retab1` double(10,2) NOT NULL,
  `comision1` double(10,2) NOT NULL,
  `recupero1` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes1`
--

LOCK TABLES `ordenes1` WRITE;
/*!40000 ALTER TABLE `ordenes1` DISABLE KEYS */;
INSERT  IGNORE INTO `ordenes1` VALUES (2500.00,'2021-03-02',29038.88,0.09,'2021-03-02',34720.40,1.00,1.00,1.00,1.00,1.00);
/*!40000 ALTER TABLE `ordenes1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-10  6:15:08


