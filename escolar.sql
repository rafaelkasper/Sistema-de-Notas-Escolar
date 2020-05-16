-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/05/2020 às 01:16
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escolar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `ads_id` int(11) DEFAULT NULL,
  `professores_id` int(11) DEFAULT NULL,
  `alunos_id` int(11) DEFAULT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `func_id` int(11) DEFAULT NULL,
  `niveis_acesso_id` int(11) DEFAULT NULL,
  `login` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `acesso`
--

INSERT INTO `acesso` (`id`, `ads_id`, `professores_id`, `alunos_id`, `equipe_id`, `func_id`, `niveis_acesso_id`, `login`, `senha`, `status`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 1, 'administrador', '$2y$10$6OAN3IZnrPktcim33XHqGO58FsOgG71My.XtGdLJQBkc6u7IUZ4sy', 1),
(2, 2, NULL, NULL, NULL, NULL, 1, 'secretaria', '$2y$10$w4U8ZaxNX8oD/IiP/wyx.e.tbXuCnTiH2eQCAM12rNOCcZ9hDsOKi', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `nome_ads` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `niveis_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `ads`
--

INSERT INTO `ads` (`id`, `nome_ads`, `login`, `senha`, `email`, `telefone`, `niveis_acesso`) VALUES
(1, 'Administrador', 'administrador', '$2y$10$6OAN3IZnrPktcim33XHqGO58FsOgG71My.XtGdLJQBk', '', '', 1),
(2, 'Secretaria', 'secretaria', '$2y$10$w4U8ZaxNX8oD/IiP/wyx.e.tbXuCnTiH2eQCAM12rNO', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome_aluno` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveis_acesso` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `ano_letivo_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `chamada` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ano_letivo`
--

CREATE TABLE `ano_letivo` (
  `id` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `nome_disciplina` varchar(250) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `ano_letivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipe_diretiva`
--

CREATE TABLE `equipe_diretiva` (
  `id` int(11) NOT NULL,
  `nome_equipe` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `niveis_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `ano_letivo_id` int(11) DEFAULT NULL,
  `trimestre_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `Artes` varchar(4) DEFAULT NULL,
  `Ciências` varchar(4) DEFAULT NULL,
  `Educação_Física` varchar(4) DEFAULT NULL,
  `Ensino_Religioso` varchar(4) DEFAULT NULL,
  `Ética` varchar(4) DEFAULT NULL,
  `Geografia` varchar(4) DEFAULT NULL,
  `História` varchar(4) DEFAULT NULL,
  `Inglês` varchar(4) DEFAULT NULL,
  `Matemática` varchar(4) DEFAULT NULL,
  `Música` varchar(4) DEFAULT NULL,
  `Português` varchar(4) DEFAULT NULL,
  `atitude` varchar(4) DEFAULT NULL,
  `descritivo` varchar(250) DEFAULT NULL,
  `faltas_Artes` varchar(50) DEFAULT NULL,
  `faltas_Ciências` varchar(50) DEFAULT NULL,
  `faltas_Educação_Física` varchar(50) DEFAULT NULL,
  `faltas_Ensino_Religioso` varchar(50) DEFAULT NULL,
  `faltas_Ética` varchar(50) DEFAULT NULL,
  `faltas_Geografia` varchar(50) DEFAULT NULL,
  `faltas_História` varchar(50) DEFAULT NULL,
  `faltas_Inglês` varchar(50) DEFAULT NULL,
  `faltas_Matemática` varchar(50) DEFAULT NULL,
  `faltas_Música` varchar(50) DEFAULT NULL,
  `faltas_Português` varchar(50) DEFAULT NULL,
  `total_faltas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `func_id` int(11) DEFAULT NULL,
  `mensagem` varchar(250) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis_acesso`
--

CREATE TABLE `niveis_acesso` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `niveis_acesso`
--

INSERT INTO `niveis_acesso` (`id`, `nome`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'PROFESSOR'),
(3, 'ALUNO'),
(4, 'EQUIPE DIRETIVA'),
(5, 'FUNCIONARIO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `nota1` varchar(4) DEFAULT NULL,
  `nota2` varchar(4) DEFAULT NULL,
  `nota3` varchar(4) DEFAULT NULL,
  `nota4` varchar(4) DEFAULT NULL,
  `nota5` varchar(4) DEFAULT NULL,
  `nota6` varchar(4) DEFAULT NULL,
  `nota7` varchar(4) DEFAULT NULL,
  `nota8` varchar(4) DEFAULT NULL,
  `nota9` varchar(4) DEFAULT NULL,
  `nota10` varchar(4) DEFAULT NULL,
  `data1` varchar(250) DEFAULT NULL,
  `descricao1` varchar(250) DEFAULT NULL,
  `data2` varchar(250) DEFAULT NULL,
  `descricao2` varchar(250) DEFAULT NULL,
  `data3` varchar(250) DEFAULT NULL,
  `descricao3` varchar(250) DEFAULT NULL,
  `data4` varchar(250) DEFAULT NULL,
  `descricao4` varchar(250) DEFAULT NULL,
  `data5` varchar(250) DEFAULT NULL,
  `descricao5` varchar(250) DEFAULT NULL,
  `data6` varchar(250) DEFAULT NULL,
  `descricao6` varchar(250) DEFAULT NULL,
  `data7` varchar(250) DEFAULT NULL,
  `descricao7` varchar(250) DEFAULT NULL,
  `data8` varchar(250) DEFAULT NULL,
  `descricao8` varchar(250) DEFAULT NULL,
  `data9` varchar(250) DEFAULT NULL,
  `descricao9` varchar(250) DEFAULT NULL,
  `data10` varchar(250) DEFAULT NULL,
  `descricao10` varchar(250) DEFAULT NULL,
  `media` varchar(4) DEFAULT NULL,
  `faltas` varchar(50) DEFAULT NULL,
  `aluno_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `turmas_id` int(11) NOT NULL,
  `professores_id` int(11) NOT NULL,
  `trimestre_id` int(11) NOT NULL,
  `ano_letivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `niveis_acesso` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'ATIVO'),
(2, 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trimestre`
--

CREATE TABLE `trimestre` (
  `id` int(11) NOT NULL,
  `nome_trimestre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `trimestre`
--

INSERT INTO `trimestre` (`id`, `nome_trimestre`, `status`) VALUES
(1, '1º TRIMESTRE', 1),
(2, '2º TRIMESTRE', 2),
(3, '3º TRIMESTRE', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `nome_turma` varchar(250) NOT NULL,
  `ano_letivo_id` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunos_id` (`alunos_id`) USING BTREE,
  ADD KEY `niveis_acesso_id` (`niveis_acesso_id`) USING BTREE,
  ADD KEY `professores_id` (`professores_id`) USING BTREE,
  ADD KEY `ads_id` (`ads_id`) USING BTREE,
  ADD KEY `equipe_id` (`equipe_id`) USING BTREE,
  ADD KEY `func_id` (`func_id`),
  ADD KEY `status` (`status`);

--
-- Índices de tabela `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveis_acesso_id` (`niveis_acesso`) USING BTREE;

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveis_acesso` (`niveis_acesso`),
  ADD KEY `turma` (`turma`),
  ADD KEY `ano_letivo_id` (`ano_letivo_id`),
  ADD KEY `status` (`status`);

--
-- Índices de tabela `ano_letivo`
--
ALTER TABLE `ano_letivo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `ano_letivo_id` (`ano_letivo_id`);

--
-- Índices de tabela `equipe_diretiva`
--
ALTER TABLE `equipe_diretiva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveis_acesso` (`niveis_acesso`);

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ano_letivo_id` (`ano_letivo_id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `trimestre_id` (`trimestre_id`),
  ADD KEY `aluno_id` (`aluno_id`) USING BTREE;

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`,`func_id`),
  ADD KEY `func_id` (`func_id`),
  ADD KEY `professor_id_2` (`professor_id`,`func_id`);

--
-- Índices de tabela `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveis_acesso` (`niveis_acesso`),
  ADD KEY `status` (`status`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `trimestre`
--
ALTER TABLE `trimestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ano_letivo_id` (`ano_letivo_id`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT de tabela `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ano_letivo`
--
ALTER TABLE `ano_letivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipe_diretiva`
--
ALTER TABLE `equipe_diretiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `trimestre`
--
ALTER TABLE `trimestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `acesso`
--
ALTER TABLE `acesso`
  ADD CONSTRAINT `acesso_ibfk_2` FOREIGN KEY (`ads_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acesso_ibfk_3` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acesso_ibfk_4` FOREIGN KEY (`niveis_acesso_id`) REFERENCES `niveis_acesso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acesso_ibfk_5` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acesso_ibfk_6` FOREIGN KEY (`equipe_id`) REFERENCES `equipe_diretiva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acesso_ibfk_7` FOREIGN KEY (`func_id`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acesso_ibfk_8` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`niveis_acesso`) REFERENCES `niveis_acesso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`niveis_acesso`) REFERENCES `niveis_acesso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alunos_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alunos_ibfk_3` FOREIGN KEY (`ano_letivo_id`) REFERENCES `ano_letivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alunos_ibfk_4` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplinas_ibfk_2` FOREIGN KEY (`ano_letivo_id`) REFERENCES `ano_letivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `equipe_diretiva`
--
ALTER TABLE `equipe_diretiva`
  ADD CONSTRAINT `equipe_diretiva_ibfk_1` FOREIGN KEY (`niveis_acesso`) REFERENCES `niveis_acesso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensagens_ibfk_2` FOREIGN KEY (`func_id`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professores_ibfk_2` FOREIGN KEY (`niveis_acesso`) REFERENCES `niveis_acesso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `trimestre`
--
ALTER TABLE `trimestre`
  ADD CONSTRAINT `trimestre_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
