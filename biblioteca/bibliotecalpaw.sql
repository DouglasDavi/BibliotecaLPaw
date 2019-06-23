-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jun-2019 às 00:37
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotecalpaw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autores`
--

CREATE TABLE `tb_autores` (
  `idtb_autores` int(11) NOT NULL,
  `nomeAutor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_autores`
--

INSERT INTO `tb_autores` (`idtb_autores`, `nomeAutor`) VALUES
(1, 'Douglas Davi'),
(2, 'juan'),
(3, 'Nelson da captinga'),
(4, 'Keanu Reeves');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `idtb_categoria` int(11) NOT NULL,
  `nomeCategoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`idtb_categoria`, `nomeCategoria`) VALUES
(2, 'Romance'),
(3, 'Religião'),
(4, 'jogos'),
(5, 'Terror'),
(6, 'Ação, tiro e sangue'),
(7, 'Ação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editora`
--

CREATE TABLE `tb_editora` (
  `idtb_editora` int(11) NOT NULL,
  `nomeEditora` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_editora`
--

INSERT INTO `tb_editora` (`idtb_editora`, `nomeEditora`) VALUES
(2, 'editora teste'),
(3, 'Cesjf'),
(4, 'Programadores'),
(5, 'Hollywood');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emprestimo`
--

CREATE TABLE `tb_emprestimo` (
  `tb_usuaio_idtb_usuaio` int(11) NOT NULL,
  `tb_exemplar_idtb_exemplar` int(11) NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `observacao` tinytext,
  `vencimento` date NOT NULL,
  `tipo` int(11) NOT NULL,
  `dt_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_emprestimo`
--

INSERT INTO `tb_emprestimo` (`tb_usuaio_idtb_usuaio`, `tb_exemplar_idtb_exemplar`, `dataEmprestimo`, `observacao`, `vencimento`, `tipo`, `dt_entrega`) VALUES
(1, 2, '2019-06-22', 'alguma coisa', '2019-07-08', 1, '2019-06-22'),
(1, 3, '2019-05-28', 'sadasdsadsa', '2019-07-08', 1, '2019-06-22'),
(1, 4, '2019-06-10', 'observações', '2019-06-20', 1, '2019-06-22'),
(2, 5, '2019-06-24', 'teste bibliotecario', '2019-07-04', 1, '0000-00-00'),
(2, 6, '2019-06-22', 'qwertyu', '2019-07-02', 1, '0000-00-00'),
(2, 7, '2019-06-22', 'tiro porrada e bomba', '2019-07-02', 0, '0000-00-00'),
(3, 2, '2019-05-14', 'ioHOISHsddsgjksda', '2019-05-29', 0, '0000-00-00'),
(4, 4, '2019-06-23', 'plakasjkasdhasd', '2019-07-03', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exemplar`
--

CREATE TABLE `tb_exemplar` (
  `idtb_exemplar` int(11) NOT NULL,
  `tb_livro_idtb_livro` int(11) NOT NULL,
  `tipoExemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_exemplar`
--

INSERT INTO `tb_exemplar` (`idtb_exemplar`, `tb_livro_idtb_livro`, `tipoExemplar`) VALUES
(2, 18, 1),
(3, 20, 0),
(4, 32, 0),
(5, 19, 1),
(6, 33, 1),
(7, 35, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `idtb_livro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `edicao` varchar(255) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `tb_editora_idtb_editora` int(11) NOT NULL,
  `tb_categoria_idtb_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_livro`
--

INSERT INTO `tb_livro` (`idtb_livro`, `titulo`, `isbn`, `edicao`, `ano`, `upload`, `tb_editora_idtb_editora`, `tb_categoria_idtb_categoria`) VALUES
(18, 'hoje', 'isbbb', 'edit', '2028', 'upup', 2, 3),
(19, 'Anjos da Noite', 'is', 'edit', '2018', 'upup', 3, 3),
(20, 'Livro dois', 'ised', 'edit', '2019', 'upup', 2, 4),
(32, 'meu livro', 'ijhj', 'E4', '2014', 'teste', 3, 5),
(33, 'TI em um dia', 'bn', '4edi', '2016', 'upload', 3, 4),
(35, 'john wick 3', 'BLAU', '3 edição', '2019', 'tiro tiro', 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro_autor`
--

CREATE TABLE `tb_livro_autor` (
  `tb_livro_idtb_livro` int(11) NOT NULL,
  `tb_autores_idtb_autores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_livro_autor`
--

INSERT INTO `tb_livro_autor` (`tb_livro_idtb_livro`, `tb_autores_idtb_autores`) VALUES
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(32, 1),
(33, 2),
(35, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuaio`
--

CREATE TABLE `tb_usuaio` (
  `idtb_usuaio` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuaio`
--

INSERT INTO `tb_usuaio` (`idtb_usuaio`, `nomeUsuario`, `tipo`, `email`, `senha`) VALUES
(1, 'douglas', 4, 'douglassromano@gmail.com', '1234'),
(2, 'admin', 1, 'bibliotecario@gmail.com', '4321'),
(3, 'professor', 3, 'professor@gmail.com', '8d5e957f297893487bd98fa830fa6413'),
(4, 'Funcinário', 2, 'funcionario@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tp_usuario_tb`
--

CREATE TABLE `tp_usuario_tb` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tp_usuario_tb`
--

INSERT INTO `tp_usuario_tb` (`id`, `nome`) VALUES
(1, 'Administrativo'),
(2, 'Funcionário'),
(3, 'Professor'),
(4, 'Aluno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_autores`
--
ALTER TABLE `tb_autores`
  ADD PRIMARY KEY (`idtb_autores`);

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`idtb_categoria`);

--
-- Indexes for table `tb_editora`
--
ALTER TABLE `tb_editora`
  ADD PRIMARY KEY (`idtb_editora`);

--
-- Indexes for table `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  ADD PRIMARY KEY (`tb_usuaio_idtb_usuaio`,`tb_exemplar_idtb_exemplar`),
  ADD KEY `fk_tb_usuaio_has_tb_exemplar_tb_exemplar1_idx` (`tb_exemplar_idtb_exemplar`),
  ADD KEY `fk_tb_usuaio_has_tb_exemplar_tb_usuaio1_idx` (`tb_usuaio_idtb_usuaio`);

--
-- Indexes for table `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  ADD PRIMARY KEY (`idtb_exemplar`),
  ADD KEY `fk_tb_exemplar_tb_livro1_idx` (`tb_livro_idtb_livro`);

--
-- Indexes for table `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`idtb_livro`),
  ADD UNIQUE KEY `isbn_UNIQUE` (`isbn`),
  ADD KEY `fk_tb_livro_tb_editora1_idx` (`tb_editora_idtb_editora`),
  ADD KEY `fk_tb_livro_tb_categoria1_idx` (`tb_categoria_idtb_categoria`);

--
-- Indexes for table `tb_livro_autor`
--
ALTER TABLE `tb_livro_autor`
  ADD PRIMARY KEY (`tb_livro_idtb_livro`,`tb_autores_idtb_autores`),
  ADD KEY `fk_tb_livro_has_tb_autores_tb_autores1_idx` (`tb_autores_idtb_autores`),
  ADD KEY `fk_tb_livro_has_tb_autores_tb_livro_idx` (`tb_livro_idtb_livro`);

--
-- Indexes for table `tb_usuaio`
--
ALTER TABLE `tb_usuaio`
  ADD PRIMARY KEY (`idtb_usuaio`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `tp_usuario_tb`
--
ALTER TABLE `tp_usuario_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_autores`
--
ALTER TABLE `tb_autores`
  MODIFY `idtb_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `idtb_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `idtb_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  MODIFY `idtb_exemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `idtb_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_usuaio`
--
ALTER TABLE `tb_usuaio`
  MODIFY `idtb_usuaio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tp_usuario_tb`
--
ALTER TABLE `tp_usuario_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  ADD CONSTRAINT `fk_tb_usuaio_has_tb_exemplar_tb_exemplar1` FOREIGN KEY (`tb_exemplar_idtb_exemplar`) REFERENCES `tb_exemplar` (`idtb_exemplar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_usuaio_has_tb_exemplar_tb_usuaio1` FOREIGN KEY (`tb_usuaio_idtb_usuaio`) REFERENCES `tb_usuaio` (`idtb_usuaio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  ADD CONSTRAINT `fk_tb_exemplar_tb_livro1` FOREIGN KEY (`tb_livro_idtb_livro`) REFERENCES `tb_livro` (`idtb_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD CONSTRAINT `fk_tb_livro_tb_categoria1` FOREIGN KEY (`tb_categoria_idtb_categoria`) REFERENCES `tb_categoria` (`idtb_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_livro_tb_editora1` FOREIGN KEY (`tb_editora_idtb_editora`) REFERENCES `tb_editora` (`idtb_editora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_livro_autor`
--
ALTER TABLE `tb_livro_autor`
  ADD CONSTRAINT `fk_tb_livro_has_tb_autores_tb_autores1` FOREIGN KEY (`tb_autores_idtb_autores`) REFERENCES `tb_autores` (`idtb_autores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_livro_has_tb_autores_tb_livro` FOREIGN KEY (`tb_livro_idtb_livro`) REFERENCES `tb_livro` (`idtb_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
