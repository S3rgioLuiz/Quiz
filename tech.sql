-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Set-2024 às 04:59
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
  `status` tinyint(1) DEFAULT 0
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
  `dificuldade` int(11) NOT NULL DEFAULT 1,
  `tempo` int(11) NOT NULL,
  `nivel_um` int(11) NOT NULL DEFAULT 0,
  `nivel_dois` int(11) NOT NULL DEFAULT 0,
  `nivel_tres` int(11) NOT NULL DEFAULT 0,
  `nivel_quatro` int(11) NOT NULL DEFAULT 0,
  `nivel_cinco` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `configuracao`
--

INSERT INTO `configuracao` (`codigo`, `codigo_modulo`, `dificuldade`, `tempo`, `nivel_um`, `nivel_dois`, `nivel_tres`, `nivel_quatro`, `nivel_cinco`) VALUES
(1, 11, 1, 120, 1, 1, 1, 1, 1);

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

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`codigo`, `nome`, `foto`, `descricao`, `status`) VALUES
(1, 'Nenhum', '66d4ddf908eea.svg', 'QUESTÕES NÃO CADASTRADAS EM MÓDULOS.', 0),
(11, 'Operador de Atribuíção', '66d4c7821c1cf.svg', 'ATRIBUI UM VALOR AO OPERANDO À ESQUERDA BASEADO NO VALOR DO OPERANDO À DIREITA.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `codigo` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL,
  `codigo_questao` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`codigo`, `codigo_modulo`, `codigo_questao`, `nivel`) VALUES
(1, 11, 5, 1),
(3, 11, 7, 1),
(4, 11, 8, 2),
(5, 11, 9, 2),
(6, 11, 10, 1),
(7, 11, 11, 2),
(8, 11, 12, 3),
(9, 11, 13, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `codigo` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'Sem Foto',
  `pergunta` varchar(255) NOT NULL,
  `explicacao` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `tipo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`codigo`, `foto`, `pergunta`, `explicacao`, `referencia`, `status`, `tipo`) VALUES
(5, 'Sem Foto', 'Qual é a função do operador de atribuição \"=\" em uma expressão de programação?', 'O operador \"=\" atribui o valor à direita a uma variável à esquerda, como \"x = 5\". ', 'Microsoft Learn - Assignment Operator', 0, 0),
(7, '66dd44e9c8585.svg', 'Qual o valor de \"X\"?', 'Ele atribui o valor \"5\" à variável \"X\"', 'Python Documentation - Assignment Operators', 0, 0),
(8, '66de35f1a1567.svg', 'Qual o valor de \"a\"?', 'A variável a inicialmente recebe o valor \"6\", mas depois é reatribuída com o valor \"3\". A última atribuição é a que prevalece, então o valor final de \"a\" é \"3\".', 'Tutorial de C#: Operadores de atribuição.', 0, 0),
(9, '66de376e523ee.svg', 'Qual o valor de \"b\"?', 'A variável \"b\" inicialmente recebe o valor \"8\", mas depois é reatribuída com o valor \"5\". A última atribuição é a que prevalece, então o valor final de \"b\" é \"5\".', 'Documentação C: Operadores de atribuição.', 0, 0),
(10, '66de38cb05531.svg', 'Qual o valor de \"a\"?', 'Ele atribui o valor \"1\" à variável \"a\".', 'Documentação C: Operadores de atribuição.', 0, 0),
(11, '66de3aa2302de.svg', 'Qual o valor de \"b\"?', 'A variável \"a\" é declarada com o valor 1. Depois, a variável \"b\" é declarada e atribuída ao valor de \"a\", que é 1. Portanto, \"b\" também será igual a 1.', 'Documentação C: Operadores de atribuição.', 0, 0),
(12, '66de3bce38be4.svg', 'Qual o valor de \"a\"?', 'A variável \"a\" é inicialmente 12. Em seguida, \"a\" é redeclarada como \"a\" + 1, usando seu valor inicial 12. Portanto, \"a\" se torna 13.', ' Documentação C: Operadores de atribuição.', 0, 0),
(13, '66de3dc1b2e60.svg', 'Qual o valor de \"c\"?', 'É atribuído o valor 7 à variável \"c\".', ' Documentação C: Operadores de atribuição.', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `codigo` int(11) NOT NULL,
  `codigo_teste` int(11) NOT NULL,
  `codigo_questao` int(11) NOT NULL,
  `resposta` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `codigo` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_modulo` int(11) NOT NULL,
  `tempo` int(11) NOT NULL DEFAULT 0,
  `dia` date DEFAULT curdate(),
  `hora` time DEFAULT curtime(),
  `status` int(11) DEFAULT 0
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `apelido`, `nome`, `email`, `foto`, `pontuacao`, `senha`, `dificuldade`, `status`, `chave`) VALUES
(9, 'Sergio', 'Sérgio Luiz Ramires do Rosário', 'sergiorosario.pl012@academico.ifsul.edu.br', 'Foto.svg', 0, '$2y$10$Udmh0b8Dgnex5TrYV3c0z.YALMsFnLNN3wiZePn7n6uWr.K8oIMVC', 1, 2, 'NULL');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternativa`
--
ALTER TABLE `alternativa`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_questao` (`codigo_questao`);

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
-- Índices para tabela `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_modulo` (`codigo_modulo`),
  ADD KEY `codigo_questao` (`codigo_questao`);

--
-- Índices para tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_teste` (`codigo_teste`),
  ADD KEY `codigo_questao` (`codigo_questao`),
  ADD KEY `resposta` (`resposta`);

--
-- Índices para tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_usuario` (`codigo_usuario`),
  ADD KEY `codigo_modulo` (`codigo_modulo`);

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `nivel`
--
ALTER TABLE `nivel`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `questionario`
--
ALTER TABLE `questionario`
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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alternativa`
--
ALTER TABLE `alternativa`
  ADD CONSTRAINT `alternativa_ibfk_1` FOREIGN KEY (`codigo_questao`) REFERENCES `questao` (`codigo`);

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
-- Limitadores para a tabela `nivel`
--
ALTER TABLE `nivel`
  ADD CONSTRAINT `nivel_ibfk_1` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulo` (`codigo`),
  ADD CONSTRAINT `nivel_ibfk_2` FOREIGN KEY (`codigo_questao`) REFERENCES `questao` (`codigo`);

--
-- Limitadores para a tabela `questionario`
--
ALTER TABLE `questionario`
  ADD CONSTRAINT `questionario_ibfk_1` FOREIGN KEY (`codigo_teste`) REFERENCES `teste` (`codigo`),
  ADD CONSTRAINT `questionario_ibfk_2` FOREIGN KEY (`codigo_questao`) REFERENCES `questao` (`codigo`),
  ADD CONSTRAINT `questionario_ibfk_3` FOREIGN KEY (`resposta`) REFERENCES `alternativa` (`codigo`);

--
-- Limitadores para a tabela `teste`
--
ALTER TABLE `teste`
  ADD CONSTRAINT `teste_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `teste_ibfk_2` FOREIGN KEY (`codigo_modulo`) REFERENCES `modulo` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
