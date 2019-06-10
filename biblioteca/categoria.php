<?php 
require_once "view/template.php";
require_once "db/Conexao.php";
require_once "dao/categoriaDao.php";
require_once "modelo/categoria.php";
$cat = new categoriaDao();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$categoria = $_POST['categoria'];
	$id = $_REQUEST["id"];
	$cat->salvarCategoria($id, $categoria);
}
template::header();
template::sidebar();
template::mainpanel();

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoCategoria = new categoriaDao();
    $categoria = new categoria();
    $categoria = $daoCategoria->atulizarCategoria($id);
    
  	$nome = $categoria->getNomeCategoria();
  	$id = $categoria->getIdCategoria();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoCategoria = new categoriaDao();
    $daoCategoria->remover($id);
}


 ?>
 <style type="text/css">
 	.cab{text-align: center; font-size: 18px; background-color: #fd3142;}
 </style>
 <div class="panel panel-default col-md-offset-2 col-md-8">
 	<div class="panel-heading cab"><strong>Adicione uma Categoria</strong></div>
 	<div class="panel-body">
 		<form class="form-horizontal" method="POST">
 			<div class="form-group col-md-6">
 				<label class="control-label">Nome da Categoria:</label>
 				<input class="form-control col-md-6" type="text" name="categoria" value="<?php if(!empty($nome)){echo $nome;}?>">
 			</div>
 			<div class="form-group">
 				<button type="submit" name="enviar" class="form-control">Enviar</button>
        <button type="button" class="btn btn-primary" onclick="document.location.href='PDF/exportar.php?pagina=categoria'">Relatório</button>
 			</div>
 		</form>
 	</div>
 </div>
 <?php 
 	$daoCategoria = new categoriaDao();
    $daoCategoria->tabelapaginada();
  ?>	 