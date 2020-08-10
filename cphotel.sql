-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Ago-2020 às 23:24
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
  `DataHoraPedido` datetime(6) NOT NULL,
  `DataHoraConfirmacao` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Cliente_Id` int(11) NOT NULL,
  `StatusPedido_Id` int(11) NOT NULL,
  `DataInicioEstadia` date NOT NULL,
  `DataFimEstadia` date NOT NULL,
  `ValorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`Id`, `Quarto_Id`, `DataHoraPedido`, `DataHoraConfirmacao`, `Cliente_Id`, `StatusPedido_Id`, `DataInicioEstadia`, `DataFimEstadia`, `ValorTotal`) VALUES
(1, 1, '0000-00-00 00:00:00.000000', '01/08/2020 09:00:00', 1, 1, '0000-00-00', '0000-00-00', 201.98),
(2, 1, '0000-00-00 00:00:00.000000', NULL, 1, 1, '0000-00-00', '0000-00-00', 200),
(3, 1, '2020-08-10 20:11:31.000000', '', 1, 1, '2020-08-10', '2020-08-11', 100.99),
(4, 1, '2020-08-10 20:29:52.000000', '', 1, 1, '2020-08-11', '2020-08-12', 100.99),
(6, 3, '2020-08-10 20:37:09.000000', '', 1, 1, '2020-08-11', '2020-08-14', 600),
(7, 3, '2020-08-10 20:40:46.000000', NULL, 1, 1, '2020-08-11', '2020-08-14', 600),
(8, 3, '2020-08-10 20:40:52.000000', NULL, 1, 1, '2020-08-11', '2020-08-13', 400),
(9, 3, '2020-08-10 20:41:49.000000', NULL, 1, 1, '2020-08-11', '2020-08-13', 400),
(10, 3, '2020-08-10 20:42:15.000000', NULL, 1, 1, '2020-08-11', '2020-08-14', 600);

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
(1, '104', 100.99, 1),
(3, '105', 200, 1);

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
(1, 'Solicitado');

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
(1, 'Livre');

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
(1, 'Teste', '111.111.111-11', 'teste', '123', 0),
(2, 'bolinho', '123.456.789-10', 'bolinho@email.com', '1234', 0),
(4, 'gabi', '098765', 'gabi@email.com', '098', 0);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `statuspedido`
--
ALTER TABLE `statuspedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `statusquarto`
--
ALTER TABLE `statusquarto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
