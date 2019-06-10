<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Douglas Davi
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF/tcpdf.php');
include_once('../db/Conexao.php');
if($_GET['pagina'] == 'livro'){
	$sql = "SELECT l.*, c.nomeCategoria, e.nomeEditora FROM tb_livro l INNER JOIN tb_categoria c ON l.tb_categoria_idtb_categoria = c.idtb_categoria INNER JOIN 	tb_editora e ON l.tb_editora_idtb_editora = e.idtb_editora";
}else if($_GET['pagina'] == 'autor'){
	$sql = "SELECT * FROM tb_autores";
}else if($_GET['pagina'] == 'editora'){
	$sql = "SELECT * FROM tb_editora";
}else if($_GET['pagina'] == 'categoria'){
	$sql = "SELECT * FROM tb_categoria";
}

$statement = Conexao::getInstance()->prepare($sql);
$statement->execute();
$dados = $statement->fetchAll(PDO::FETCH_ASSOC);

class MYPDF extends TCPDF {
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf= new MYPDF();
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Douglas Davi');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Livros');
$pdf->SetKeywords('TCPDF, PDF, example, biblioteca, guide');

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

// Set some content to print
if($_GET['pagina'] == 'livro'){
	$html = '<table>
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>TÍTULO</th>
	            <th>ANO</th>
	            <th>EDIÇÃO</th>
	            <th>ISBN</th>
	            <th>CATEGORIA</th>
	            <th>EDITORA</th>
	        </tr>
	    </thead>    
	    <tbody>';
	foreach ($dados as $key => $value) {
	    $html.= '
	        <tr>
	            <td>'.$value['idtb_livro'].'</td>
	            <td>'.$value['titulo'].'</td>
	            <td>'.$value['isbn'].'</td>
	            <td>'.$value['edicao'].'</td>
	            <td>'.$value['ano'].'</td>
	            <td>'.$value['nomeCategoria'].'</td>
	            <td>'.$value['nomeEditora'].'</td>
	        </tr>
	    <hr>';
	}
	$html.='
	    </tbody>
	</table>
	';
}else if($_GET['pagina'] == 'autor'){
	$html = '<table>
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>NOME</th>	            
	        </tr>
	    </thead>    
	    <tbody>';
	foreach ($dados as $key => $value) {
	    $html.= '
	        <tr>
	            <td>'.$value['idtb_autores'].'</td>
	            <td>'.$value['nomeAutor'].'</td>
	        </tr>
	    <hr>';
	}
	$html.='
	    </tbody>
	</table>
	';
}else if($_GET['pagina'] == 'editora'){
	$html = '<table>
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>EDITORA</th>	            
	        </tr>
	    </thead>    
	    <tbody>';
	foreach ($dados as $key => $value) {
	    $html.= '
	        <tr>
	            <td>'.$value['idtb_editora'].'</td>
	            <td>'.$value['nomeEditora'].'</td>
	        </tr>
	    <hr>';
	}
	$html.='
	    </tbody>
	</table>
	';
}else if($_GET['pagina'] == 'categoria'){
	$html = '<table>
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>CATEGORIA</th>	            
	        </tr>
	    </thead>    
	    <tbody>';
	foreach ($dados as $key => $value) {
	    $html.= '
	        <tr>
	            <td>'.$value['idtb_categoria'].'</td>
	            <td>'.$value['nomeCategoria'].'</td>
	        </tr>
	    <hr>';
	}
	$html.='
	    </tbody>
	</table>
	';
}
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
