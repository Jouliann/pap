-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 26-Jun-2019 às 11:55
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idosos_pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idutente` int(11) DEFAULT NULL,
  `idutilizador` int(11) DEFAULT NULL,
  `notas` varchar(455) DEFAULT NULL,
  `datahora` datetime(1) DEFAULT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `consulta_fk0` (`idutente`),
  KEY `consulta_fk1` (`idutilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhesconsuta`
--

DROP TABLE IF EXISTS `detalhesconsuta`;
CREATE TABLE IF NOT EXISTS `detalhesconsuta` (
  `iddetalhe` int(11) NOT NULL AUTO_INCREMENT,
  `Precriçao` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `Dosagem` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `idutente` int(11) NOT NULL,
  `idutilizador` int(11) NOT NULL,
  PRIMARY KEY (`iddetalhe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gesthigiene`
--

DROP TABLE IF EXISTS `gesthigiene`;
CREATE TABLE IF NOT EXISTS `gesthigiene` (
  `idhigiene` int(11) NOT NULL AUTO_INCREMENT,
  `idutente` int(11) DEFAULT NULL,
  `idutilizador` int(11) DEFAULT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `datahora` datetime(1) DEFAULT NULL,
  `quantprod` int(11) NOT NULL,
  PRIMARY KEY (`idhigiene`),
  KEY `gesthigiene_fk0` (`idutente`),
  KEY `gesthigiene_fk1` (`idutilizador`),
  KEY `gesthigiene_fk2` (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacao`
--

DROP TABLE IF EXISTS `observacao`;
CREATE TABLE IF NOT EXISTS `observacao` (
  `idobs` int(11) NOT NULL AUTO_INCREMENT,
  `idutente` int(11) DEFAULT NULL,
  `idutilizador` int(11) DEFAULT NULL,
  `obs` varchar(455) DEFAULT NULL,
  `datahora` datetime(1) DEFAULT NULL,
  PRIMARY KEY (`idobs`),
  KEY `observacao_fk0` (`idutente`),
  KEY `observacao_fk1` (`idutilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `idproduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`idproduto`, `nome`, `quantidade`) VALUES
(18, 'Pensos', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utentes`
--

DROP TABLE IF EXISTS `utentes`;
CREATE TABLE IF NOT EXISTS `utentes` (
  `idutentes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `morada` varchar(45) DEFAULT NULL,
  `contacto` int(11) DEFAULT NULL,
  `acamado` enum('Sim','Nao') DEFAULT NULL,
  `mobilidade` varchar(45) DEFAULT NULL,
  `contactoemer` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) NOT NULL,
  PRIMARY KEY (`idutentes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utentes`
--

INSERT INTO `utentes` (`idutentes`, `nome`, `datanascimento`, `morada`, `contacto`, `acamado`, `mobilidade`, `contactoemer`, `departamento`) VALUES
(5, 'Rosa Anjos', '1955-02-04', 'Perre', 987654312, 'Sim', '', '897678564', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `idutilizador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `contacto` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `morada` varchar(45) DEFAULT NULL,
  `tipo` enum('Medico','Auxiliar','Chefe') DEFAULT NULL,
  `cc` varchar(12) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `nomeutili` varchar(45) DEFAULT NULL,
  `pass` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`idutilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idutilizador`, `nome`, `datanascimento`, `contacto`, `email`, `morada`, `tipo`, `cc`, `departamento`, `nomeutili`, `pass`) VALUES
(9, 'admin', '2000-06-05', 965674832, 'admin@gmail.com', 'Viana do Castelo', 'Chefe', '1234567', 'A', 'admin', '$2y$10$HPI/7X31v3UrSwQC.D5kXuMc6uy08bcm0BE5AVSS4a9S0XqREbmim'),
(10, 'auxiliar', '2000-04-03', 967650906, 'aux@sapo.pt', 'Viana do castelo', 'Auxiliar', '123456782zz3', 'B', 'axiliar', '$2y$10$vD.9q7R7HIJVO99tbMvtUu6/OFMPW/jpGyXmHvmzngPkW2CU4ygga'),
(11, 'Medico', '1976-07-05', 987897654, 'medico@sapo.pt', 'Viana', 'Medico', '123456789zz4', 'B', 'medico', '$2y$10$5Qd3vm4vo8KIB12OgVbrUupK129sXmbnPuarUpPw6wK45rPZXJ7tm');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_fk0` FOREIGN KEY (`idutente`) REFERENCES `utentes` (`idutentes`),
  ADD CONSTRAINT `consulta_fk1` FOREIGN KEY (`idutilizador`) REFERENCES `utilizador` (`idutilizador`);

--
-- Limitadores para a tabela `gesthigiene`
--
ALTER TABLE `gesthigiene`
  ADD CONSTRAINT `gesthigiene_fk0` FOREIGN KEY (`idutente`) REFERENCES `utentes` (`idutentes`),
  ADD CONSTRAINT `gesthigiene_fk1` FOREIGN KEY (`idutilizador`) REFERENCES `utilizador` (`idutilizador`),
  ADD CONSTRAINT `gesthigiene_fk2` FOREIGN KEY (`idproduto`) REFERENCES `stock` (`idproduto`);

--
-- Limitadores para a tabela `observacao`
--
ALTER TABLE `observacao`
  ADD CONSTRAINT `observacao_fk0` FOREIGN KEY (`idutente`) REFERENCES `utentes` (`idutentes`),
  ADD CONSTRAINT `observacao_fk1` FOREIGN KEY (`idutilizador`) REFERENCES `utilizador` (`idutilizador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
