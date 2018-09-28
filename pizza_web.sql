-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 28-Set-2018 às 05:23
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
-- Database: `pizza_web`
--
CREATE DATABASE IF NOT EXISTS `pizza_web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizza_web`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

DROP TABLE IF EXISTS `bebida`;
CREATE TABLE IF NOT EXISTS `bebida` (
  `id_bebida` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bebida` varchar(100) NOT NULL,
  `preco_bebida` float NOT NULL,
  `industrializado` int(11) NOT NULL,
  PRIMARY KEY (`id_bebida`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida_ingrediente`
--

DROP TABLE IF EXISTS `bebida_ingrediente`;
CREATE TABLE IF NOT EXISTS `bebida_ingrediente` (
  `cod_bebida` int(11) NOT NULL,
  `cod_ingrediente_bebida` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ingrediente` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ingrediente`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente_bebida`
--

DROP TABLE IF EXISTS `ingrediente_bebida`;
CREATE TABLE IF NOT EXISTS `ingrediente_bebida` (
  `id_ingrediente_bebida` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ingrediente_bebida` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ingrediente_bebida`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `id_pizza` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pizza` varchar(100) NOT NULL,
  `preco_pizza` float NOT NULL,
  PRIMARY KEY (`id_pizza`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza_ingrediente`
--

DROP TABLE IF EXISTS `pizza_ingrediente`;
CREATE TABLE IF NOT EXISTS `pizza_ingrediente` (
  `cod_pizza` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
