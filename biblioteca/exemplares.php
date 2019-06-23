<?php
require_once "view/template.php";
require_once "dao/daoLivro.php";
require_once "modelo/livro.php";
require_once "dao/daoExemplar.php";
require_once "modelo/exemplar.php";
template::header();
template::sidebar();
template::mainpanel();
$daoLivro = new daoLivro();
$daoExemplar = new daoExemplar();
$livros = $daoLivro->BuscaLivro(NULL);
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save") {
    $livro = new Livro();
    $exemplar = new Exemplar();
    if(isset($_POST["id"])){
        $exemplar->setIdExemplar($_POST["id"]);
    }
    $livro->setIdLivro($_POST['livro']);
    $exemplar->setLivro($livro);
    $exemplar->setTipoLivro($_POST['tipoLivro']);
    $daoExemplar->salvar($exemplar); 
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $exemplar = new Exemplar();
    $exemplar = $daoExemplar->atualizar($id);
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    $daoExemplar->remover($id);
}
?>

    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Exemplares</h4>
                            <p class='category'>Lista de Exemplares do Sistema</p>
                        </div>
                        <div class='content table-responsive'>
                            <form action="?act=save&id=" method="POST">
                                
                                <input type="hidden" name="id" value="<?php if(isset($exemplar) && $exemplar != null) {echo $exemplar->getIdExemplar();}?>">
                                    <div class="form-group">
                                        <label>Tipo de Exemplar</label>
                                        <select class="form-control"  name="tipoLivro">
                                            <option value="0" <?php isset($exemplar) && !empty($exemplar) && $exemplar->getTipoLivro() == 0 ? "selected" : ''; ?>>Não circular</option>
                                            <option value="1" <?php isset($exemplar) && !empty($exemplar) && $exemplar->getTipoLivro() == 1 ? "selected" : ''; ?>>Circular</option>
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        <label>Livro</label>
                                        <select name="livro" class="form-control">
                                            <option value="0" selected>Selecione</option>

                                            <?php
                                            foreach($livros as $livro){
                                                if(isset($exemplar) && $exemplar != null && $livro->getTitulo() === $exemplar->getLivro()->getTitulo()){
                                                ?>
                                                    <option value="<?php echo $livro->getIdLivro() ?>" selected><?php echo $livro->getTitulo()?></option>
                                                <?php
                                                }else{ ?>
                                                <option value="<?php echo $livro->getIdLivro() ?>"><?php echo $livro->getTitulo()?></option>
                                            <?php }} ?>
                                        </select>
                                     </div>
                                    <br/><br/>
                                <input class="btn btn-success" type="submit" value="REGISTRAR">                               
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $daoExemplar->tabelaPaginada();
            ?>
        </div>
    </div>


<?php
    template::footer();
?>
