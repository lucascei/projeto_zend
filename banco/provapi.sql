-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `provapi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `nomeCliente` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(50) NOT NULL,
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`nomeCliente`, `email`, `telefone`, `id_cliente`) VALUES
('lucas noleto', 'exemplo@exemplo', 8888888, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregador`
--

CREATE TABLE IF NOT EXISTS `entregador` (
  `id_entregador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  PRIMARY KEY (`id_entregador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `garcom`
--

CREATE TABLE IF NOT EXISTS `garcom` (
  `id_garcom` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGarcom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(30) NOT NULL,
  PRIMARY KEY (`id_garcom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `garcom`
--

INSERT INTO `garcom` (`id_garcom`, `nomeGarcom`, `email`, `telefone`) VALUES
(5, 'renan', 'exemplo@exemplo', 8888888);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(45) NOT NULL,
  `numeroMesa` int(10) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_garcom` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_mesa`),
  UNIQUE KEY `id_produto` (`id_produto`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_cliente_2` (`id_cliente`),
  KEY `id_garcom` (`id_garcom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `quantidade`, `numeroMesa`, `id_cliente`, `id_garcom`, `id_produto`) VALUES
(20, 3, 2, 2, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome`) VALUES
(4, 'administrador'),
(5, 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(45) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `preco` int(10) NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nomeProduto`, `categoria`, `preco`, `foto`) VALUES
(31, 'faca', '', 10, '31.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `id_uf` char(2) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_perfil_idx` (`id_perfil`),
  KEY `fk_usuario_uf1_idx` (`id_uf`),
  KEY `fk_usuario_municipio1_idx` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `mesa_ibfk_2` FOREIGN KEY (`id_garcom`) REFERENCES `garcom` (`id_garcom`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
