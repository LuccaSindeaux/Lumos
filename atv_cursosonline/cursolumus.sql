-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/12/2024 às 23:17
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cursolumus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nome`, `senha`, `email`) VALUES
(1, 'Lucca Sindeaux', 'b6808c6a6514680b9d8425c63148958350b9eaf6', 'lucca@email.com'),
(2, 'Cauê Grazziotin', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', 'caue@email.com'),
(3, 'Roberto Camilo', '011c945f30ce2cbafc452f39840f025693339c42', 'rob@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `avisos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `email`, `senha`, `foto`, `avisos`) VALUES
(1, 'Robierto Camus', 'rob@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL),
(35, 'Lucca Cadalora', 'cadal@email.com', '6270d5df96dcb74b2db48709715b202384703747', NULL, 'opa\r\n'),
(39, 'Lisiane Hoffmeister', 'lisa@email.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', NULL, 'Fala guria'),
(46, 'Artur Raguse', 'butia@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '46_675c946668d8f.jpg', 'Aproveite! As férias em Butiá!'),
(53, 'Thiago Kernel da Silva', 'kernel@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '53_675cae38cbd76.jpg', NULL),
(54, 'Ingui Teste II', 'in@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '54_675ca91ea2870.png', NULL),
(55, 'Gustavo Muller', 'gugu@email.com', '19590cfd3057723458a63f534c06812ca4b6f466', NULL, NULL),
(56, 'Felipe André', 'indian@email.com', 'c28dc1fe18f79267567f68702332aceb8a847953', NULL, NULL),
(86, 'Novo Teste Again', 'test@email.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', NULL, NULL),
(88, 'Funcao Nova Teste', 'funcao@email.com', '011c945f30ce2cbafc452f39840f025693339c42', NULL, NULL),
(89, 'João Teste', 'maisum@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL),
(91, 'João Tete II', 'testes@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL),
(92, 'José teste II', 'jose@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '92_675cabbc93575.jpg', 'Foto atualizada para a pedida.'),
(93, 'Pedro Teste', 'peter@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '93_675b7f7134921.jpeg', NULL),
(94, 'Nico teste', 'nic@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '94_675b7ebaa0921.jpg', NULL),
(95, 'Nico Teste IV', 'nicolas@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '95_675b666a7bad8.png', 'Promoção no curso de Java para você!'),
(97, 'Luisa Teste', 'lu@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL),
(98, 'Luis teste', 'luis@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 'Parabéns pela nova conta! Seja bem vindo à Lumos!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL,
  `tituloCurso` varchar(255) NOT NULL,
  `descricaoCurso` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
