<?php
require_once 'db/Conexao.php';
require_once "view/template.php";
// $p = new Conexao("bibliotecaLPAW", "localhost", "root", "");
template::header();
template::sidebar();
template::mainpanel();
?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h1 class='title' style="text-align: center">Biblioteca</h1>
                        <p class='category'></p>
                    </div>
                    <div class='content table-responsive'>
                          <h4 class="title">Seja bem-vindo </h4>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
template::footer();
?>