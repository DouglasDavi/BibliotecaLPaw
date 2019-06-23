<?php

require_once "view/template.php";
require_once "dao/daoLivro.php";
require_once "modelo/livro.php";
require_once "db/Conexao.php";
require_once "dao/categoriaDao.php";
require_once "dao/daoEditora.php";
require_once "dao/daoAutor.php";

$daol = new daoLivro();
$catg = new categoriaDao();
$editora = new daoEditora(); 
$buscaCategoria=$catg->buscaCategoria();
$buscaEditora = $editora->buscaEditora();
$daoAutor = new daoAutor();

$autores = "";

template::header();
template::sidebar();
template::mainpanel();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 if(isset($_REQUEST["id"])){
     $id = $_REQUEST["id"];
  }else{
    $id ="";
  }   
  $ano     = $_POST['ano'];
  $titulo    = $_POST['titulo'];
  $isbn      = $_POST['isbn'];
  $edicao    = $_POST['edicao'];
  $upload    = $_POST['upload'];
  $editora   = $_POST['editora'];
  $categoria = $_POST['categoria'];
  $autores   = $_POST['autores'];

  $daol->salvarLivro ($id, $ano, $isbn, $edicao,$editora, $categoria,$titulo, $upload, $autores);
  
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $_REQUEST["id"]) {
  $id = $_REQUEST["id"];
  $daoLivro = new daoLivro();
  $livro = new Livro();
  $livro = $daoLivro->select($id);


  $titulo = $livro->getTitulo();
  $ano = $livro->getAno();
  $edicao = $livro->getEdicao();
  $isbn = $livro->getIsbn();
  $upload = $livro->getUpload();
  $autores = $livro->getAutor();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoLivro = new daoLivro();
    $daoLivro->remover($id);
}
$autoresCadastrados = $daoAutor->buscaAtt();

?>
<div class="col-md-12">
	<div class="col-md-1"></div>
	<form class="form-horizontal col-md-11" action="" method="POST" enctype="multipart/form-data">
		<div class="form-group ">
  	    <label class="col-md-2 col-form-label">Título:</label>
  	    <div class="col-md-10">
  	      <input type="text" name="titulo" class="form-control-plaintext" id="Título" value="<?php if(!empty($titulo)){ echo $titulo;} ?>">
  	    </div>
  	</div>

    <div class="form-group">
        <Label class="col-md-2 col-form-label">Autores</Label>
        <div class="col-md-10">
            <select name="autores[]">
                <option value="">--Selecione--</option>
                <?php foreach ($autoresCadastrados as $key=>$value) { ?>
                    <option value="<?=$value['idtb_autores']?>" <?=$value['idtb_autores'] == $autores ? "selected" : '' ?>><?=$value['nomeAutor']?></option>
                <?php } ?>
            </select>
          </div>
      </div>
  		<div class="form-group">
		    <label class="col-md-2 col-form-label">Ano:</label>
		    <div class="col-md-10">
		      <input type="text" name="ano" class="form-control-plaintext" id="ano" value="<?php if(!empty($ano)){ echo $ano;} ?>">
		    </div>
  		</div>
  		<div class="form-group">
		    <label class="col-md-2 col-form-label">Edição:</label>
		    <div class="col-md-10">
		      <input type="text" name="edicao" class="form-control-plaintext" id="edicao" value="<?php if(!empty($edicao)){ echo $edicao;} ?>">
		    </div>
  		</div>
  		<div class="form-group">
		    <label class="col-md-2 col-form-label">isbn:</label>
		    <div class="col-md-10">
		      <input type="text" name="isbn" class="form-control-plaintext" id="isbn" value="<?php if(!empty($isbn)){ echo $isbn;} ?>">
		    </div>
  		</div>
  		
  		<div class="form-group">
		    <label class="col-md-2 col-form-label">Categoria:</label>
		    <div class="col-md-10">
		      <select name="categoria">		    	
		    		<?php
              $daoCategoria = new categoriaDao();
              $categorias = $daoCategoria->buscaCategoria();
              foreach($categorias as $categoria){
                  if(isset($livro) && $livro != null && $categoria->getNomeCategoria() == $livro->getCategoria()){
                  ?>
                    <option value="<?php echo $categoria->getIdCategoria() ?>" selected><?php echo $categoria->getNomeCategoria()?></option>
                  <?php
                  }else{ ?>
                  <option value="<?php echo $categoria->getIdCategoria() ?>"><?php echo $categoria->getNomeCategoria()?></option>
            <?php }
              } ?>
		    	</select>	
		    </div>
  		</div>
  		<div class="form-group">
		    <label class="col-md-2 col-form-label">Editora:</label>
		    <div class="col-md-10">
		      <select name="editora">		    		
		    		<?php
            	$daoEditora = new daoEditora();
              $editoras = $daoEditora->buscaEditora();
                foreach($editoras as $editora){
                    if(isset($livro) && $livro != null && $editora->getNomeEditora() == $livro->getEditora()){?>
                        <option value="<?php echo $editora->getIdEditora() ?>" selected><?php echo $editora->getNomeEditora() ?></option>
                    <?php
                    }else{?>
                      <option value="<?php echo $editora->getIdEditora() ?>"><?php echo $editora->getNomeEditora() ?></option>
            <?php   }
               	}?>
		    	</select>	
		    </div>
  		</div>

  		<div class="form-group">
		    <label class="col-md-2 col-form-label">Upload:</label>
		    <div class="col-md-10">
		      <input type="text" name="upload" class="form-control-plaintext" id="upload" value="<?php if(!empty($upload)){echo $upload;}?>">
		    </div>
  		</div>
  		
  		<div class="form-group col-md-12">
  			<div class="col-md-2">
  				 <button type="submit" class="btn btn-primary">Cadastrar</button>
  			</div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="document.location.href='PDF/exportar.php?pagina=livro'">Relatório</button>
        </div>
  		</div>
	</form>
	    <?php
        $daoLivro = new daoLivro();
        $daoLivro->tabelapaginada();
      ?>
<?php
  template::footer();
?>  
</div>
