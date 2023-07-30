-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Nov-2022 às 15:58
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tmw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `posicao` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` longtext NOT NULL,
  `excluido` tinyint(1) DEFAULT '0',
  `data_exclusao` datetime DEFAULT NULL,
  `usuario_exclusao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome`, `posicao`, `quantidade`, `preco`, `descricao`, `excluido`, `data_exclusao`, `usuario_exclusao`) VALUES
(1, 'ONU DATACOM', 90, 414, '550.00', 'ONU Fibra Ã³ptica', 0, NULL, NULL),
(2, 'Modem Datacom', 80, 314, '350.00', 'Modem DATACOM', 0, NULL, NULL),
(3, 'Antena', 70, 215, '250.00', 'Antena via rÃ¡dio', 0, NULL, NULL),
(4, 'Ponteira', 44, 10250, '2.00', 'Ponteira Cabo LAN', 1, '2022-11-17 20:07:20', 'Kelvin Koller'),
(5, 'Cabo LAN', 45, 900, '2.00', 'Cabo de Ethernet', 1, '2022-11-17 20:07:37', 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `desabilitado` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `cargo`, `senha`, `desabilitado`, `admin`) VALUES
(1, 'Admin', 'admin@admin.com', '(11) 99999-9999', 'Desenvolvedor', '$2y$10$ZnGSOk.kFB0YHN5bSpjIDuLdtmmT2uwmAJF7TH7XL5ITpiCjjOin.', 0, 1),
(2, 'Kelvin Koller', 'kelvin@kelvin.com', '(51) 99529-8192', 'Desenvolvedor', '$2y$10$EEF4yKaAyKqP0kvjIajrIeMUlRnb1WTsq1U7cRTRkvj1d3R0/ZDvK', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
