<?php 
require_once "view/template.php";
require_once "db/Conexao.php";
require_once "modelo/livro.php";

$host = "localhost";
$user = "root";
$pass = "";
$banco= "bibliotecalpaw";
$charset="utf8";

	$connect = mysqli_connect($host, $user, $pass, $banco) or die (mysqli_erro());
	mysqli_set_charset($connect, $charset) or die(mysqli_error($connect));

	



template::header();
template::sidebar();
template::mainpanel();

function EmprestimoNoMes(){
	GLOBAL $connect;
	 
	$sql = mysqli_query($connect, 
		"SELECT 
			COUNT(*) AS totMes,
			MONTH(dataEmprestimo) AS mes FROM tb_emprestimo 
            WHERE DATE_ADD(dataEmprestimo, INTERVAL 3 MONTH) >= NOW() AND tipo = 1
            GROUP BY mes");
	while ($rs = mysqli_fetch_array($sql)) {
		$array[] = $rs;	
	}
	return $array;        
}
function ReservasNoMes(){
	GLOBAL $connect;
	 
	$sql = mysqli_query($connect, 
		"SELECT 
			COUNT(*) AS totMes,
			MONTH(dataEmprestimo) AS mes FROM tb_emprestimo 
            WHERE DATE_ADD(dataEmprestimo, INTERVAL 3 MONTH) >= NOW() AND tipo = 0
            GROUP BY mes");
	while ($rs = mysqli_fetch_array($sql)) {
		$array[] = $rs;	
	}
	return $array;
}

function LivroReservadosEmprestados(){
	GLOBAL $connect;
	$sql = "SELECT COUNT(*) AS totMes,
            IF(tipo = 0,'Reserva','Empréstimo')AS tipo 
            FROM tb_emprestimo
            WHERE DATE_ADD(dataEmprestimo, INTERVAL 1 MONTH) >= NOW()
            GROUP BY tipo";
	$rs = mysqli_query($connect, $sql);
	while($row = mysqli_fetch_array($rs)){
		$array[] = $row;
	}
	return $array;
}
function EmprestimoCategoria(){
	GLOBAL $connect;
	$sql="SELECT d.nomeCategoria AS categoria, count(a.tipo) AS totMes FROM tb_emprestimo a 
            INNER JOIN tb_exemplar b 
            ON a.tb_exemplar_idtb_exemplar = b.idtb_exemplar
            INNER JOIN tb_livro c 
            ON b.tb_livro_idtb_livro = c.idtb_livro
            INNER JOIN tb_categoria d 
            ON c.tb_categoria_idtb_categoria = d.idtb_categoria
            WHERE DATE_ADD(a.dataEmprestimo, INTERVAL 3 MONTH) >= NOW() AND a.tipo = 1
            GROUP BY d.nomeCategoria";
    $rs = mysqli_query($connect, $sql);
	while($row = mysqli_fetch_array($rs)){
		$array[] = $row;
	}
	return $array;        
}
function ReservasCategoria(){
	GLOBAL $connect;
	$sql = "SELECT d.nomeCategoria AS categoria, count(a.tipo) AS totMes FROM tb_emprestimo a 
            INNER JOIN tb_exemplar b 
            ON a.tb_exemplar_idtb_exemplar = b.idtb_exemplar
            INNER JOIN tb_livro c 
            ON b.tb_livro_idtb_livro = c.idtb_livro
            INNER JOIN tb_categoria d 
            ON c.tb_categoria_idtb_categoria = d.idtb_categoria
            WHERE DATE_ADD(a.dataEmprestimo, INTERVAL 3 MONTH) >= NOW() AND a.tipo = 0
            GROUP BY d.nomeCategoria";
    $rs = mysqli_query($connect, $sql);
	while($row = mysqli_fetch_array($rs)){
		$array[] = $row;
	}
	return $array;        
}
$mesesAno = array(
				1 => 'Janeiro', 
                2 =>'Fevereiro',
                3 =>'Março',
                4 =>'Abril',
                5 =>'Maio',
                6 =>'Junho',
                7 =>'Julho',
                8 =>'Agosto',
                9 =>'Setembro',
                10 =>'Outubro',
                11 =>'Novembro',
                12 =>'Dezembro');
?>