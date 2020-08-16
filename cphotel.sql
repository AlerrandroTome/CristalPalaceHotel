-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2020 às 01:06
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cphotel`
--
CREATE DATABASE IF NOT EXISTS `cphotel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cphotel`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `Id` int(11) NOT NULL,
  `Quarto_Id` int(11) NOT NULL,
  `DataHoraPedido` varchar(30) NOT NULL,
  `DataHoraConfirmacao` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Cliente_Id` int(11) NOT NULL,
  `StatusPedido_Id` int(11) NOT NULL,
  `DataInicioEstadia` date NOT NULL,
  `DataFimEstadia` date NOT NULL,
  `ValorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `pedido`:
--   `StatusPedido_Id`
--       `statuspedido` -> `Id`
--   `Cliente_Id`
--       `usuario` -> `Id`
--   `Quarto_Id`
--       `quarto` -> `Id`
--

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`Id`, `Quarto_Id`, `DataHoraPedido`, `DataHoraConfirmacao`, `Cliente_Id`, `StatusPedido_Id`, `DataInicioEstadia`, `DataFimEstadia`, `ValorTotal`) VALUES
(3, 1, '2020-08-10', '10/08/2020 19:27:35', 1, 2, '2020-08-10', '2020-08-11', 100.99),
(4, 1, '2020-08-10', '', 1, 1, '2020-08-11', '2020-08-12', 100.99),
(6, 3, '2020-08-10', '', 1, 1, '2020-08-11', '2020-08-14', 600),
(7, 3, '2020-08-10', NULL, 1, 1, '2020-08-11', '2020-08-14', 600),
(8, 3, '2020-08-10', NULL, 1, 1, '2020-08-11', '2020-08-13', 400),
(9, 3, '2020-08-10', NULL, 1, 1, '2020-08-11', '2020-08-13', 400),
(10, 3, '2020-08-10', NULL, 1, 1, '2020-08-11', '2020-08-14', 600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

DROP TABLE IF EXISTS `quarto`;
CREATE TABLE `quarto` (
  `Id` int(11) NOT NULL,
  `Numero` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ValorDiaria` float NOT NULL,
  `StatusQuarto_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `quarto`:
--   `StatusQuarto_Id`
--       `statusquarto` -> `Id`
--

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`Id`, `Numero`, `ValorDiaria`, `StatusQuarto_Id`) VALUES
(1, '104', 100.99, 1),
(3, '105', 200, 1),
(4, '106', 150, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuspedido`
--

DROP TABLE IF EXISTS `statuspedido`;
CREATE TABLE `statuspedido` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `statuspedido`:
--

--
-- Extraindo dados da tabela `statuspedido`
--

INSERT INTO `statuspedido` (`Id`, `Nome`) VALUES
(1, 'Solicitado'),
(2, 'Confirmado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusquarto`
--

DROP TABLE IF EXISTS `statusquarto`;
CREATE TABLE `statusquarto` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `statusquarto`:
--

--
-- Extraindo dados da tabela `statusquarto`
--

INSERT INTO `statusquarto` (`Id`, `Nome`) VALUES
(1, 'Livre'),
(2, 'Ocupado'),
(3, 'Reservado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CPF` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `usuario`:
--

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id`, `Nome`, `CPF`, `Login`, `Senha`, `Admin`) VALUES
(1, 'Teste', '111.111.111-11', 'teste', '123', 1),
(2, 'bolinho', '123.456.789-10', 'bolinho@email.com', '1234', 0),
(4, 'gabi', '098765', 'gabi@email.com', '098', 0),
(5, 'Alerrandro Tomé', '023.023.023-02', 'alerrandro@gmail.com', 'teste', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Quarto_Id` (`Quarto_Id`),
  ADD KEY `Cliente_Id` (`Cliente_Id`),
  ADD KEY `StatusPedido_Id` (`StatusPedido_Id`);

--
-- Índices para tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `StatusQuarto_Id` (`StatusQuarto_Id`) USING BTREE;

--
-- Índices para tabela `statuspedido`
--
ALTER TABLE `statuspedido`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `statusquarto`
--
ALTER TABLE `statusquarto`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `statuspedido`
--
ALTER TABLE `statuspedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `statusquarto`
--
ALTER TABLE `statusquarto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`StatusPedido_Id`) REFERENCES `statuspedido` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Cliente_Id`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`Quarto_Id`) REFERENCES `quarto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `quarto`
--
ALTER TABLE `quarto`
  ADD CONSTRAINT `quarto_ibfk_1` FOREIGN KEY (`StatusQuarto_Id`) REFERENCES `statusquarto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
