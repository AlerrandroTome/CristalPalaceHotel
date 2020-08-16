-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Ago-2020 às 00:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `Id` int(11) NOT NULL,
  `Quarto_Id` int(11) NOT NULL,
  `DataHoraPedido` varchar(255) CHARACTER SET utf8 NOT NULL,
  `DataHoraConfirmacao` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Cliente_Id` int(11) NOT NULL,
  `StatusPedido_Id` int(11) NOT NULL,
  `DataInicioEstadia` date NOT NULL,
  `DataFimEstadia` date NOT NULL,
  `ValorTotal` float NOT NULL,
  `Alteracao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`Id`, `Quarto_Id`, `DataHoraPedido`, `DataHoraConfirmacao`, `Cliente_Id`, `StatusPedido_Id`, `DataInicioEstadia`, `DataFimEstadia`, `ValorTotal`, `Alteracao`) VALUES
(21, 3, '15/08/2020 20:43:08', NULL, 4, 1, '2020-08-20', '2020-08-22', 400, 0),
(23, 4, '16/08/2020 19:00:02', NULL, 6, 1, '2020-08-24', '2020-08-26', 600, 0),
(24, 3, '16/08/2020 19:01:23', NULL, 5, 1, '2020-08-29', '2020-08-30', 200, 0),
(25, 10, '16/08/2020 19:12:57', NULL, 7, 1, '2020-08-31', '2020-09-02', 640, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `Id` int(11) NOT NULL,
  `Numero` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ValorDiaria` float NOT NULL,
  `StatusQuarto_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`Id`, `Numero`, `ValorDiaria`, `StatusQuarto_Id`) VALUES
(1, '104', 100.99, 2),
(3, '105', 200, 1),
(4, '103', 300, 1),
(5, '101', 500, 1),
(6, '102', 600, 1),
(7, '106', 250, 1),
(8, '108', 350, 1),
(9, '109', 380, 1),
(10, '110', 320, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuspedido`
--

CREATE TABLE `statuspedido` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `statusquarto` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CPF` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id`, `Nome`, `CPF`, `Login`, `Senha`, `Admin`) VALUES
(4, 'gabi', '098765', 'gabi@email.com', '098', 1),
(5, 'Ana', '123.456.789-10', 'ana@email.com', 'ana123', 0),
(6, 'Adriely', '123.456.789-22', 'adriely@email.com', 'adriely22', 0),
(7, 'Alerrandro', '123.456.789-23', 'alerrandro@email.com', 'alerrandro23', 0);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `statuspedido`
--
ALTER TABLE `statuspedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `statusquarto`
--
ALTER TABLE `statusquarto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
