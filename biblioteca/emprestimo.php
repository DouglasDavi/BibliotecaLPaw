<?php 
require_once "view/template.php";
require_once "db/Conexao.php";
require_once "dao/daoEmprestimo.php";
require_once "modelo/categoria.php";
$cat = new daoEmprestimo();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$emprestimo = $_POST['categoria'];
	$id = $_REQUEST["id"];
	$cat->salvarCategoria($id, $emprestimo);
}
template::header();
template::sidebar();
template::mainpanel();

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoEmprestimo = new daoEmprestimo();
    $emprestimo = new emprestimo();
    $emprestimo = $daoEmprestimo->atulizarCategoria($id);
    
  	$nome = $emprestimo->getNomeCategoria();
  	$id = $emprestimo->getIdCategoria();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoEmprestimo = new daoEmprestimo();
    $daoEmprestimo->remover($id);
}


 ?>
 <style type="text/css">
 	.cab{text-align: center; font-size: 18px; background-color: #fd3142;}
 </style>
 <div class="panel panel-default col-md-offset-2 col-md-8">
 	<div class="panel-heading cab"><strong>Adicione uma emprestimo</strong></div>
 	<div class="panel-body">
 		<form class="form-horizontal" method="POST">
 			<div class="form-group col-md-6">
 				<label class="control-label">Nome da emprestimo:</label>
 				<input class="form-control col-md-6" type="text" name="categoria" value="<?php if(!empty($nome)){echo $nome;}?>">
 			</div>
 			<div class="form-group">
 				<button type="submit" name="enviar" class="form-control">Enviar</button>
 			</div>
 		</form>
 	</div>
 </div>
 <?php 
 	$daoEmprestimo = new daoEmprestimo();
    $daoEmprestimo->tabelapaginada();
  ?>	 