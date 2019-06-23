<?php 
require_once "view/template.php";
require_once "db/Conexao.php";
require_once "dao/daoEditora.php";
require_once "modelo/editora.php";	
$edit = new daoEditora();


template::header();
template::sidebar();
template::mainpanel();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$edicao = $_POST['edicao']; 
  if(isset($_REQUEST["id"])){
     $id = $_REQUEST["id"];
  }else{
    $id ="";
  }  
  
	$edit->salvarEditora($id, $edicao);
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoEdicao = new daoEditora();
    $edicao = new editora();
    $edicao = $daoEdicao->atulizarEditora($id);

    
  	$nome = $edicao->getNomeEditora();
  	$id = $edicao->getIdEditora();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoEditora = new daoEditora();
    $daoEditora->remover($id);
}

 ?>
 <style type="text/css">
 	.cab{text-align: center; font-size: 18px; background-color: #fd3142;}
 </style>
 <div class="panel panel-default col-md-offset-2 col-md-8">
 	<div class="panel-heading cab"><strong>Adicione uma Edição</strong></div>
 	<div class="panel-body">
 		<form class="form-horizontal" method="POST">
 			<div class="form-group col-md-6">
 				<label class="control-label">Edição:</label>
 				<input class="form-control col-md-6" type="text" name="edicao" value="<?php if(!empty($nome)){echo $nome;}?>">
 			</div>
      <br>
      <div class="col-md-12">
        <div class="form-group col-md-6">
   				<button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
          <button type="button" class="btn btn-primary" onclick="document.location.href='PDF/exportar.php?pagina=editora'">Relatório</button>
   			</div>
    </div>
 		</form>
 	</div>
 	
 </div>

<?php 
 	$daoEditora = new daoEditora();
    $daoEditora->tabelapaginada();
  ?>	 
<?php
template::footer();
?>  