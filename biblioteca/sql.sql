CREATE TABLE `biblioteca`.`tb_livro` (
  `idtb_livro` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `isbn` VARCHAR(255) NOT NULL,
  `edicao` VARCHAR(4) NOT NULL,
  `ano` YEAR NOT NULL,
  `upload` VARCHAR(45) NOT NULL,
  `tb_editora_idtb_editora` INT NOT NULL,
  `tb_categoria_idtb_categoria` INT NOT NULL,
  PRIMARY KEY (`idtb_livro`),
  UNIQUE INDEX `idtb_livro_UNIQUE` (`idtb_livro` ASC) VISIBLE,
  INDEX `fk_tb_livro_tb_editora_idx` (`tb_categoria_idtb_categoria` ASC) VISIBLE,
  INDEX `fk_tb_editora_tb__idx` (`tb_editora_idtb_editora` ASC) VISIBLE,
  CONSTRAINT `fk_tb_livro_tb_editora`
    FOREIGN KEY (`tb_categoria_idtb_categoria`)
    REFERENCES `biblioteca`.`tb_categoria` (`idtb_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_editora_tb_`
    FOREIGN KEY (`tb_editora_idtb_editora`)
    REFERENCES `biblioteca`.`tb_editora` (`idtb_editora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);