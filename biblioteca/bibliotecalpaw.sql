-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Abr-2019 às 03:09
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(2, 'juan');

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
(1, 'n1');

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
(1, 'n1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emprestimo`
--

CREATE TABLE `tb_emprestimo` (
  `tb_usuaio_idtb_usuaio` int(11) NOT NULL,
  `tb_exemplar_idtb_exemplar` int(11) NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `observacao` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_exemplar`
--

CREATE TABLE `tb_exemplar` (
  `idtb_exemplar` int(11) NOT NULL,
  `tb_livro_idtb_livro` int(11) NOT NULL,
  `tipoExemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `idtb_livro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `edicao` varchar(4) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `tb_editora_idtb_editora` int(11) NOT NULL,
  `tb_categoria_idtb_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_livro`
--

INSERT INTO `tb_livro` (`idtb_livro`, `titulo`, `isbn`, `edicao`, `ano`, `upload`, `tb_editora_idtb_editora`, `tb_categoria_idtb_categoria`) VALUES
(5, 'teste', '', 'um', '2004', 'ttt', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro_autor`
--

CREATE TABLE `tb_livro_autor` (
  `tb_livro_idtb_livro` int(11) NOT NULL,
  `tb_autores_idtb_autores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'douglas', 1, 'douglassromano@gmail.com', '1234');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_autores`
--
ALTER TABLE `tb_autores`
  MODIFY `idtb_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `idtb_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `idtb_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_exemplar`
--
ALTER TABLE `tb_exemplar`
  MODIFY `idtb_exemplar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `idtb_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_usuaio`
--
ALTER TABLE `tb_usuaio`
  MODIFY `idtb_usuaio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
