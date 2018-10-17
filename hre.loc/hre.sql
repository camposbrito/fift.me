-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Out-2018 às 13:04
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hre`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Testes', NULL, NULL),
(2, 'Rodrigo', 'Testes', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `Chave` int(11) NOT NULL,
  `DataIni` datetime DEFAULT NULL,
  `DataFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `Chave` int(11) NOT NULL,
  `Operador` varchar(50) DEFAULT NULL,
  `Equipamento` varchar(50) DEFAULT NULL,
  `Produto` varchar(50) DEFAULT NULL,
  `Operacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sessao`
--

INSERT INTO `sessao` (`Chave`, `Operador`, `Equipamento`, `Produto`, `Operacao`) VALUES
(1, 'José Sipriano de Oliveira', 'TORNO CNC 20-B', 'Disco de Freio VW 301E', '10-A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `status_id` int(30) NOT NULL,
  `s_text` text NOT NULL,
  `t_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`status_id`, `s_text`, `t_status`) VALUES
(18, 'Hello youtube ! greetings from code for geek.', '2014-06-29 12:09:35'),
(32, 'Hello World !', '2015-03-01 12:43:59'),
(33, 'Hello World !', '2015-03-01 12:44:01'),
(34, 'Hello World !', '2015-03-01 12:44:02'),
(35, 'Hello World !', '2015-03-01 12:44:02'),
(36, 'Hello World !', '2015-03-01 12:44:03'),
(37, 'Hello World !', '2015-03-01 12:44:03'),
(38, 'Hello World !', '2015-03-01 12:44:03'),
(39, 'Hello World !', '2015-03-01 12:44:04'),
(40, 'Hello World !', '2015-03-01 12:47:21'),
(41, 'Hello World !', '2015-03-01 12:47:26'),
(42, 'Hello World !', '2015-03-01 12:47:26'),
(43, 'Hello World !', '2015-03-01 12:47:27'),
(44, 'Hello World !', '2015-03-01 12:47:27'),
(45, 'Hello World !', '2015-03-01 12:47:27'),
(46, 'Hello World !', '2015-03-01 12:47:27'),
(47, 'Hello World !', '2015-03-01 12:47:27'),
(48, 'Hello World !', '2015-03-01 12:47:28'),
(49, 'a', '2015-03-01 12:47:45'),
(50, 'Hello World !!', '2015-03-01 13:11:15'),
(51, 'This is Hi', '2015-03-01 13:11:30'),
(52, 'From This Window ! It Should update on second one !', '2015-03-01 13:11:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_post`
--

CREATE TABLE `tbl_post` (
  `postId` int(11) NOT NULL,
  `postText` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_post`
--

INSERT INTO `tbl_post` (`postId`, `postText`) VALUES
(43, 'ok'),
(44, 'ok'),
(45, 'b'),
(46, 'jh'),
(47, 'd'),
(48, 'asdad'),
(49, 'sdf'),
(50, 'sdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `terceiro`
--

CREATE TABLE `terceiro` (
  `Chave` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`Chave`);

--
-- Indexes for table `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`Chave`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `terceiro`
--
ALTER TABLE `terceiro`
  ADD PRIMARY KEY (`Chave`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `Chave` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessao`
--
ALTER TABLE `sessao`
  MODIFY `Chave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `terceiro`
--
ALTER TABLE `terceiro`
  MODIFY `Chave` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
