-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2024 às 04:13
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecologisticabeta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `id_bairro` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`id_bairro`, `nome`) VALUES
(1, 'dos Legumes'),
(2, 'do Tabaco'),
(3, 'Labirinto'),
(4, 'asdf'),
(5, 'SF'),
(6, 'SFSDF'),
(7, 'SFSDF'),
(8, 'ASER'),
(9, 'ASER'),
(10, 'ASER'),
(11, 'ASER'),
(12, 'ASER'),
(13, 'ASER'),
(14, 'ASER'),
(15, 'ASER'),
(16, 'ASER'),
(17, 'ASER'),
(18, 'ASER'),
(19, 'ASER'),
(20, 'ASER'),
(21, 'Dois');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `nome`) VALUES
(1, 'Condado'),
(2, 'Terra Encantada'),
(3, 'Lugar muito distante'),
(4, 'bl'),
(5, 'ERE'),
(6, 'ERE'),
(7, 'ERE'),
(8, 'ASRE'),
(9, 'ASRE'),
(10, 'ASRE'),
(11, 'ASRE'),
(12, 'ASRE'),
(13, 'ASRE'),
(14, 'ASRE'),
(15, 'ASRE'),
(16, 'ASRE'),
(17, 'ASRE'),
(18, 'ASRE'),
(19, 'ASRE'),
(20, 'ASRE'),
(21, 'Doisópolis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_bairro` int(11) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `cep`, `id_usuario`, `id_bairro`, `id_cidade`) VALUES
(1, 'Bolsão', '1', '1', 1, 1, 1),
(2, 'Rua 1', '1', '12352566', 2, 2, 2),
(5, 'SAR', '123', '23423', 5, 5, 5),
(8, 'ASDF', '34', '324', 8, 8, 8),
(9, 'ASDF', '34', '324', 9, 9, 9),
(10, 'ASDF', '34', '324', 10, 10, 10),
(11, 'ASDF', '34', '324', 11, 11, 11),
(12, 'ASDF', '34', '324', 12, 12, 12),
(13, 'ASDF', '34', '324', 13, 13, 13),
(21, 'Rua 2', '2', '222222', 21, 21, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cnh` varchar(12) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `cnh`, `telefone`, `email`, `senha`) VALUES
(1, 'Frodo Bolseiro', '123456', '98987878', 'frodoBaggins@lor.com', '123'),
(2, 'Gandalf o Branco', '235678976', '6787980', 'obranco@magos.com', '321'),
(5, 'RUI', '23', '32', 'ASDF@FAS', '0000'),
(8, 'SAF', '234', '234', 'ASER@AS', '123'),
(9, 'SAF', '234', '234', 'ASER@AS', '123'),
(10, 'SAF', '234', '234', 'ASER@AS', '123'),
(11, 'SAF', '234', '234', 'ASER@AS', '123'),
(12, 'SAF', '234', '234', 'ASER@AS', '123'),
(13, 'SAF', '234', '234', 'ASER@AS', '123'),
(21, 'Valmir', '9876543122', '99998888', 'valmir@valmir', '1243');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id_bairro`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_usuario` (`id_usuario`),
  ADD KEY `fk_bairro` (`id_bairro`),
  ADD KEY `fk_cidade` (`id_cidade`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_bairro` FOREIGN KEY (`id_bairro`) REFERENCES `bairro` (`id_bairro`),
  ADD CONSTRAINT `fk_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
