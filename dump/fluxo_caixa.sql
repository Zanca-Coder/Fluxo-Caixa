-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jan-2022 às 17:13
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fluxo_caixa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamento`
--

CREATE TABLE `lancamento` (
  `sequencia` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fluxo` int(11) DEFAULT NULL,
  `obs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `lancamento`
--

INSERT INTO `lancamento` (`sequencia`, `data`, `tipo`, `valor`, `fluxo`, `obs`) VALUES
(7, '0000-00-00 00:00:00', 2, '546.00', 1, 'nenhuma irregularidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivelusuario`
--

CREATE TABLE `nivelusuario` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipofluxo`
--

CREATE TABLE `tipofluxo` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipofluxo`
--

INSERT INTO `tipofluxo` (`codigo`, `descricao`) VALUES
(1, 'Entrada'),
(2, 'Saida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipolancamento`
--

CREATE TABLE `tipolancamento` (
  `sequencia` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipolancamento`
--

INSERT INTO `tipolancamento` (`sequencia`, `descricao`) VALUES
(1, 'Rapido'),
(2, 'Normal'),
(3, 'Turbo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lancamento`
--
ALTER TABLE `lancamento`
  ADD PRIMARY KEY (`sequencia`),
  ADD KEY `IX_Relationship1` (`tipo`),
  ADD KEY `IX_Relationship2` (`fluxo`);

--
-- Índices para tabela `nivelusuario`
--
ALTER TABLE `nivelusuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `tipofluxo`
--
ALTER TABLE `tipofluxo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `tipolancamento`
--
ALTER TABLE `tipolancamento`
  ADD PRIMARY KEY (`sequencia`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship3` (`nivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lancamento`
--
ALTER TABLE `lancamento`
  MODIFY `sequencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `nivelusuario`
--
ALTER TABLE `nivelusuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipofluxo`
--
ALTER TABLE `tipofluxo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipolancamento`
--
ALTER TABLE `tipolancamento`
  MODIFY `sequencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lancamento`
--
ALTER TABLE `lancamento`
  ADD CONSTRAINT `fk_tp_lan` FOREIGN KEY (`tipo`) REFERENCES `tipolancamento` (`sequencia`),
  ADD CONSTRAINT `fk_tpf_lan` FOREIGN KEY (`fluxo`) REFERENCES `tipofluxo` (`codigo`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_nv_us` FOREIGN KEY (`nivel`) REFERENCES `nivelusuario` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
