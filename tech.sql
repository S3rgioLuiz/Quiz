-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Ago-2024 às 03:28
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativa`
--

CREATE TABLE `alternativa` (
  `codigo` int(11) NOT NULL,
  `codigo_questao` int(11) NOT NULL,
  `opcao` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizade`
--

CREATE TABLE `amizade` (
  `codigo` int(11) NOT NULL,
  `remetente` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

CREATE TABLE `configuracao` (
  `codigo` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL,
  `dificuldade` int(11) NOT NULL,
  `tempo` int(11) NOT NULL,
  `nivel_um` int(11) NOT NULL DEFAULT 0,
  `nivel_dois` int(11) NOT NULL DEFAULT 0,
  `nivel_tres` int(11) NOT NULL DEFAULT 0,
  `nivel_quatro` int(11) NOT NULL DEFAULT 0,
  `nivel_cinco` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `codigo` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'Sem Foto',
  `pergunta` varchar(255) NOT NULL,
  `explicacao` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL DEFAULT 'DESCONHECIDO',
  `nivel` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `codigo` int(11) NOT NULL,
  `codigo_teste` int(11) NOT NULL,
  `codigo_questao` int(11) NOT NULL,
  `codigo_resposta` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisito`
--

CREATE TABLE `requisito` (
  `codigo` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL,
  `requisito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `codigo` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'Foto.svg',
  `pontuacao` int(11) NOT NULL DEFAULT 0,
  `senha` varchar(255) NOT NULL,
  `dificuldade` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `chave` varchar(255) NOT NULL DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternativa`
--
ALTER TABLE `alternativa`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `escolha` (`codigo_questao`);

--
-- Índices para tabela `amizade`
--
ALTER TABLE `amizade`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `enviou` (`remetente`),
  ADD KEY `recebeu` (`destinatario`);

--
-- Índices para tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `criterio` (`codigo_modulo`);

--
-- Índices para tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `pertence` (`codigo_modulo`);

--
-- Índices para tabela `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `avaliacao` (`codigo_teste`),
  ADD KEY `exame` (`codigo_questao`),
  ADD KEY `verificacao` (`codigo_resposta`);

--
-- Índices para tabela `requisito`
--
ALTER TABLE `requisito`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `acessar` (`codigo_modulo`),
  ADD KEY `acesso` (`requisito`);

--
-- Índices para tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `tentativa` (`codigo_usuario`),
  ADD KEY `topico` (`codigo_modulo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativa`
--
ALTER TABLE `alternativa`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `amizade`
--
ALTER TABLE `amizade`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `requisito`
--
ALTER TABLE `requisito`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `teste`
--
ALTER TABLE `teste`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alternativa`
--
ALTER TABLE `alternativa`
  ADD CONSTRAINT `escolha` FOREIGN KEY (`codigo_questao`) REFERENCES `questao` (`codigo`);

--
-- Limitadores para a tabela `amizade`
--
ALTER TABLE `amizade`
  ADD CONSTRAINT `enviou` FOREIGN KEY (`remetente`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `recebeu` FOREIGN KEY (`destinatario`) REFERENCES `usuario` (`codigo`);

--
-- Limitadores para a tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD CONSTRAINT `criterio` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulo` (`codigo`);

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `pertence` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulo` (`codigo`);

--
-- Limitadores para a tabela `questionario`
--
ALTER TABLE `questionario`
  ADD CONSTRAINT `avaliacao` FOREIGN KEY (`codigo_teste`) REFERENCES `teste` (`codigo`),
  ADD CONSTRAINT `exame` FOREIGN KEY (`codigo_questao`) REFERENCES `questao` (`codigo`),
  ADD CONSTRAINT `verificacao` FOREIGN KEY (`codigo_resposta`) REFERENCES `alternativa` (`codigo`);

--
-- Limitadores para a tabela `requisito`
--
ALTER TABLE `requisito`
  ADD CONSTRAINT `acessar` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulo` (`codigo`),
  ADD CONSTRAINT `acesso` FOREIGN KEY (`requisito`) REFERENCES `modulo` (`codigo`);

--
-- Limitadores para a tabela `teste`
--
ALTER TABLE `teste`
  ADD CONSTRAINT `tentativa` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `topico` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulo` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
