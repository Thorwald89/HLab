<?php
/*
 * Copyright 2014 Thorwald Donato Madalese
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */
 
 

include('../setup/setup.php');

require('../setup/pdf/html2pdf.class.php');

session_start();

$login = $_SESSION['login']; 

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];


if($send =="Esporta"){
	
	
	
	$data= $_POST['data'];
	$data= date_create($data);
	$data = date_format($data, 'd-m-Y');
	$autore= ''.$_POST['operatore'];
	$titolo= 'Prodotti'.$data;
  
  
 function bubu(){ 
  $s= mysql_query("select * from prodotti where data_carico = '".$_POST['data']."'") or die(mysql_error());
	while($r =mysql_fetch_array($s)){
		
		$caric = date_create($r['data_carico']);
		$scaric= date_create($r['data_scarico']);
	
	print "
	 
	<tr>	
	<td><?=ucfirst($r['prodotto'])?></td>
	<td><?=date_format($caric, 'd/m/Y');?></td>
	<td><? if($r['data_scarico'] == '0000-00-00'){echo '-';}else{ echo date_format($scaric, 'd/m/Y');} ?></td>
	<td><?=ucfirst($r['codice'])?></td>
	<td><?=ucfirst($r['lotto'])?></td>
	<td><?=ucfirst($r['quota'])?></td>
	<td><?=ucfirst($r['operatore_carico'])?></td>
	<td><?=ucfirst($r['operatore_scarico'])?></td>
	</tr>
	<?
	";
	 } 
	
	
  }
  $content = "
  
  
  
<page>
    <h1><center>Lista Prodotti ".$data."</center></h1>
    <br>
  <br>
  <table>
		
		
	<tr>	
	<td><strong>Prodotto</strong></td>
	<td><strong>Data Carico</strong></td>
	<td><strong>Data Scarico</strong></td>
	<td><strong>Codice</strong></td>
	<td><strong>Lotto</strong></td>
	<td><strong>Quantit&aacute;</strong></td>
	<td><strong>Operatore Carico</strong></td>
	<td><strong>Operatore Scarico</strong></td>
	</tr>
	
". bubu() ."	</table>
	
</page>"


;

   
        $html2pdf = new HTML2PDF('P','A4','it');
        $html2pdf->WriteHTML($content);
        //$html2pdf->Output($destination_path . $num_fattura . ".pdf", 'F'); //SALVO IN FILE SYSTEM
        $html2pdf->Output($titolo.".pdf", 'D'); //VISUALIZZO CON BROWSER
	
}





?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Prodotti</title>
<link rel="stylesheet" href="../stile.css" />

<style type="text/css">
	<!--
body {
background-color: white;

    }
-->
</style>
</head>



<body>


	
	<table>
		<tr><td colspan="8" align="center"><h2><center>Esporta PDF</h2></td></tr>
		<form method="post" action="esporta.php?user=<?=$login?>">
	<tr>
	<td>Anno</td><td><input type="date" name="data"></td>
	</tr><tr>
	<td colspan="2">Seleziona la data da cui intendi partire per effettuare l'esportazione</td></tr>
	<tr><td align="center" colspan="8">	
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="Esporta">
		</td></tr>
	</form>
	
	
	</table>

	

</body>




</html>
