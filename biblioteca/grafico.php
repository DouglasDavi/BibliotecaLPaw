<?php require_once "dao/functionsCharts.php"; ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['Task', 'Hours per Day'],
        	<?php 
        		$regra = "";
        		
        		foreach (EmprestimoNoMes() as $key => $value) {
        			$regra.= "['".$mesesAno[$value[1]]."', ".$value[0]."],";
        		}       			
        	$regra = substr($regra, 0, -1);
    		echo $regra;		
        	?>         
           
        ]);

        var options = {
          title: 'Emprestimos No Mês'
        };

        var chart = new google.visualization.PieChart(document.getElementById('EmprestimosNoMes'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['Task', 'Hours per Day'],
        	<?php 
        		$regra = "";
        		
        		foreach (ReservasNoMes() as $key => $value) {
        			$regra.= "['".$mesesAno[$value[1]]."', ".$value[0]."],";
        		}       			
        	$regra = substr($regra, 0, -1);
    		echo $regra;		
        	?>         
           
        ]);

        var options = {
          title: 'Reservas No Mês'
        };

        var chart = new google.visualization.PieChart(document.getElementById('ReservasNoMes'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['Task', 'Hours per Day'],
        	<?php 
        		$regra = "";
        		foreach (LivroReservadosEmprestados() as $key => $value) {
        			$regra.= "['".$value[1]."', ".$value[0]."],";
        		}       			
        	$regra = substr($regra, 0, -1);
    		echo $regra;		
        	?>         
           
        ]);

        var options = {
          title: 'Livros do Reservados/Emprestados do mês'
        };

        var chart = new google.visualization.PieChart(document.getElementById('emprestado_reservado'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['Task', 'Hours per Day'],
        	<?php 
        		$regra = "";
        		foreach (EmprestimoCategoria() as $key => $value) {
        			$regra.= "['".$value[0]."', ".$value[1]."],";
        		}       			
        	$regra = substr($regra, 0, -1);
    		echo $regra;		
        	?>         
           
        ]);

        var options = {
          title: 'Livros Emprestado Por Categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('emprestimoCategoria'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        	['Task', 'Hours per Day'],
        	<?php 
        		$regra = "";
        		foreach (ReservasCategoria() as $key => $value) {
        			$regra.= "['".$value[0]."', ".$value[1]."],";
        		}       			
        	$regra = substr($regra, 0, -1);
    		echo $regra;		
        	?>         
           
        ]);

        var options = {
          title: 'Livros Reservados Por Categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('reservaCategoria'));

        chart.draw(data, options);
      }
    </script>



  </head>
  <body>
  	
  	<div class="col-md-12">
  		<div class="col-md-3"></div>
  		<div class="col-md-6">	
	   		<div id="EmprestimosNoMes" style="width: 800px; height: 400px; margin-bottom: 10px;"></div>
	   </div>
	</div>
  	<div class="col-md-12">
	  	<div class="col-md-6">
	    	<div id="ReservasNoMes" style="width: 800px; height: 400px;"></div>
	    </div>
	    <div class="col-md-6">
	    	<div id="emprestado_reservado" style="width: 800px; height: 400px;"></div>
	    </div>
	</div>
	<div class="col-md-12">		    
	    <div class="col-md-6">
	    	<div id="emprestimoCategoria" style="width: 800px; height: 400px;"></div>
	    </div>
	    <div class="col-md-6">
	    	<div id="reservaCategoria" style="width: 800px; height: 400px;"></div>
	    </div>
	</div>    
  </body>
</html>