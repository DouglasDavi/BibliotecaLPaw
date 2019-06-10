<?php 
require_once "view/template.php";
require_once "db/Conexao.php";
require_once "modelo/livro.php";

template::header();
template::sidebar();
template::mainpanel();

function dadosGrafico(){

	$cmd = Conexao::getInstance()->
    prepare("SELECT a.titulo AS Titulo FROM tb_livro a");                                                        
                                                                   
        if ($cmd->execute()) {
            $livros = [];
            while($rs = $cmd->fetch(PDO::FETCH_OBJ)) {
                $livro = new livro;
                $livro->setIdLivro($rs->IdLivro);
                $livro->setTitulo($rs->Titulo);                    
                array_push($livros, $livro);
            }
            return $livros;
        }
}
$dadosGrafico = dadosGrafico();
?>
<div class="container">
	<div class="row">
    	<div class="col-sm-4">    
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			    <script type="text/javascript">
			      google.charts.load("current", {packages:["corechart"]});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			      	
			        var data = google.visualization.arrayToDataTable([
			               	
			       
			          ['Task', 'Hours per Day'],
			         <?php foreach ($dadosGrafico as $key => $value) {
			          echo "['".$value[1]."',  '".$value[0]."'],";
			         }?>
			          ['Eat',      2],
			          ['Commute',  2],
			          ['Watch TV', 2],
			          ['Sleep',    7]
			        	  
			        ]);
					
			        var options = {
			          title: 'Meu titulo',
			          is3D: true,
			        };

			        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			        chart.draw(data, options);
			      }
			    </script>

		    <div id="piechart_3d" style="width: 900px; height: 500px;"></div> 
		</div>    
    </div>
</div>