-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2017 às 01:41
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indicadores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturamento`
--

CREATE TABLE `faturamento` (
  `id` int(5) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `valor` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faturamento`
--

INSERT INTO `faturamento` (`id`, `mes`, `valor`) VALUES
(1, 'Janeiro', 100000),
(2, 'Fevereiro', 100000),
(3, 'Marco', 98000),
(4, 'Abril', 73000),
(5, 'Maio', 110000),
(6, 'Junho', 150000),
(7, 'Julho', 198000),
(8, 'Agosto', 136000),
(9, 'Setembro', 127000),
(10, 'Outubro', 149000),
(11, 'Novembro', 137000),
(12, 'Dezembro', 112000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `garantia`
--

CREATE TABLE `garantia` (
  `id` int(5) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `qtd` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `garantia`
--

INSERT INTO `garantia` (`id`, `mes`, `qtd`) VALUES
(1, 'Janeiro', 117),
(2, 'Fevereiro', 39),
(3, 'Março', 190),
(4, 'Abril', 210),
(5, 'Maio', 73),
(6, 'Junho', 95),
(7, 'Julho', 54),
(8, 'Agosto', 129),
(9, 'Setembro', 450),
(10, 'Outubro', 1200),
(11, 'Novembro', 13),
(12, 'Dezembro', 49);

-- --------------------------------------------------------

--
-- Estrutura da tabela `propostas`
--

CREATE TABLE `propostas` (
  `id` int(5) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `valor` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `propostas`
--

INSERT INTO `propostas` (`id`, `mes`, `valor`) VALUES
(1, 'Janeiro', 18),
(2, 'Fevereiro', 34),
(3, 'Março', 12),
(4, 'Abril', 28),
(5, 'Maio', 7),
(6, 'Junho', 16),
(7, 'Julho', 27),
(8, 'Agosto', 41),
(9, 'Setembro', 37),
(10, 'Outubro', 21),
(11, 'Novembro', 23),
(12, 'Dezembro', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reprova`
--

CREATE TABLE `reprova` (
  `id` int(5) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `valor` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reprova`
--

INSERT INTO `reprova` (`id`, `mes`, `valor`) VALUES
(1, 'Janeiro', 70),
(2, 'Fevereiro', 25),
(3, 'Março', 39),
(4, 'Abril', 110),
(5, 'Maio', 41),
(6, 'Junho', 115),
(7, 'Julho', 85),
(8, 'Agosto', 21),
(9, 'Setembro', 40),
(10, 'Outubro', 32),
(11, 'Novembro', 71),
(12, 'Dezembro', 63);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel` int(1) UNSIGNED NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `nivel`, `ativo`) VALUES
(1, 'Comercial', 'comercial', 'a5ccc35c70b532355ed530b77a73522278ebec15', 1, 1),
(2, 'Qualidade', 'qualidade', '7d4b8658f1a18879c3ed21a9951b4d96711c47bd', 2, 1),
(3, 'Administrador Teste', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faturamento`
--
ALTER TABLE `faturamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propostas`
--
ALTER TABLE `propostas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reprova`
--
ALTER TABLE `reprova`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `nivel` (`nivel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faturamento`
--
ALTER TABLE `faturamento`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `garantia`
--
ALTER TABLE `garantia`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `propostas`
--
ALTER TABLE `propostas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `reprova`
--
ALTER TABLE `reprova`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
