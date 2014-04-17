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
session_start();

$login = $_SESSION['login']; 

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];

if($send =="Scarica"){
	
	$s=mysql_query("update prodotti set data_scarico=NOW(), operatore_scarico='".$_POST['operatore']."' where id='".$_POST['id']."'") or die(mysql_error()); 
	echo "inserimento effettuato";
}

if($send =="aggiungi"){
	
	$s=mysql_query("insert into prodotti (prodotto, data_carico, operatore_carico, quota, codice, lotto, scadenza) values ('".$_POST['prodotto']."', NOW(), '".$_POST['operatore']."', '".$_POST['quota']."', '".$_POST['codice']."', '".$_POST['lotto']."', '".$_POST['scadenza']."') ") or die(mysql_error()); 
	echo "inserimento effettuato";
}


if($send =="Esporta"){
	
	require('../setup/pdf/html2pdf.class.php');

	
	$s=mysql_query("select * from schede where id = '".$_POST['id']."'") or die(mysql_error()); 
	$b=mysql_fetch_array($s);
	
	
	// get the HTML
    $content = " 
    <page><table style=\"width: 100%; text-size: 18px;\">
		
		
		
		<tr><td colspan=\"10\" align=\"center\"><h2><center>Lista Prodotti	</h2></td></tr>
		
	<tr>	
	<td><strong>Prodotto</strong></td>
	<td><strong>Data Carico</strong></td>
	<td><strong>Data Scarico</strong></td>
	<td><strong>Codice</strong></td>
	<td><strong>Lotto</strong></td>
	<td><strong>Quanti</strong></td>
	<td><strong>Scadenza</strong></td>
	<td><strong>Operatore Carico</strong></td>
	<td><strong>Operatore Scarico</strong></td>
	</tr>
	</table>    </page>
   
    ";
     
   
		$titolo = 'Lista_Prodotti';
        $html2pdf = new HTML2PDF('P','A4','it');
        $html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
     //   $html2pdf->getHtmlFromPage($url);
        $html2pdf->Output("".$titolo.".pdf", 'D'); //VISUALIZZO CON BROWSER

}





		// controllo prodotti esauriti
		
		$gg= mysql_query("select * from prodotti where quota <= '0' and data_scarico = '0000-00-00'") or die(mysql_error());
		while($r=mysql_fetch_array($gg))
		{
			?>
			<div><br></div>
			<div style="font-size: 1.2rem; border: 1px solid; background-color: #DF4141; align: center;"><center><strong>Attenzione!</strong> il prodotto	<?=ucfirst($r['prodotto'])?> - Lotto: <?=$r['lotto']?> &eacute; esaurito.</center></div>
			<?
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


<?
switch($pos){
	
	default:
	?>
	<table>
		
		
		<tr><td colspan="10" align="center"><h2><center>Lista Prodotti	</h2></td></tr>
		
	<tr>	
	<td><strong>Prodotto</strong></td>
	<td><strong>Data Carico</strong></td>
	<td><strong>Data Scarico</strong></td>
	<td><strong>Codice</strong></td>
	<td><strong>Lotto</strong></td>
	<td><strong>Quantit&aacute;</strong></td>
	<td><strong>Scadenza</strong></td>
	<td><strong>Operatore Carico</strong></td>
	<td><strong>Operatore Scarico</strong></td>
	</tr>
	
	<?
	$s= mysql_query("select * from prodotti order by id") or die(mysql_error());
	while($r =mysql_fetch_array($s)){
		
		$caric = date_create($r['data_carico']);
		$scaric= date_create($r['data_scarico']);
		$scad= date_create($r['scadenza']);

		?>
		<tr>	
	<td><a href="prodotti.php?pos=scarico&user=<?=$login?>&id=<?=$r['id']?>"><?=ucfirst($r['prodotto'])?></a></td>
	<td><?=date_format($caric, 'd/m/Y');?></td>
	<td><? if($r['data_scarico'] == '0000-00-00'){echo '-';}else{ echo date_format($scaric, 'd/m/Y');} ?></td>
	<td><?=ucfirst($r['codice'])?></td>
	<td><?=ucfirst($r['lotto'])?></td>
	<td><?=ucfirst($r['quota'])?></td>
	<td><?=date_format($scad, 'd/m/Y');?></td>
	<td><?=ucfirst($r['operatore_carico'])?></td>
	<td><?=ucfirst($r['operatore_scarico'])?></td>
	</tr>
		<?
	}
	?>
	
	<form method="post" action="prodotti.php">
	<tr><td colspan="8" style="text-align: center;"><input type="submit" name="send" value="Esporta"></td></tr>
	</form>
	</table>
	<?
	break;
	
	
	case 'carico':
	?>
	<table>
		<tr><td colspan="5"><h2>Carico Prodotti</h2></td></tr>
		<form method="post" action="prodotti.php?user=<?=$login?>">
	<tr>
	<td>Data Carico</td><td>Autoimpostato</td>
	</tr><tr>
	<td>Prodotto</td><td><input type="text" name="prodotto"></td>
	</tr><tr>
	<td>Lotto</td><td><input type="text" name="lotto"></td>
	</tr><tr>
	<td>Codice</td><td><input type="text" name="codice"></td>
	</tr><tr>
	<td>Scadenza</td><td><input type="date" name="scadenza"></td>
	</tr><tr>
	<td>Quantit&aacute;</td><td><input type="number" name="quota"></td>
	</tr>
	<tr><td align="center" colspan="8">
	<input type="submit" class="submit"  name="send" value="aggiungi">
	<input type="hidden" name="operatore" value="<?=$login?>">
		</td></tr>
	</form>
	
	
	</table>
	<?
	break;
	
	case 'scarico':
	?>
	<table>
		
		<?
	$s= mysql_query("select * from prodotti where id ='$id'") or die(mysql_error());
	$r =mysql_fetch_array($s);
		
		$caric = date_create($r['data_carico']);
		$scaric= date_create($r['data_scarico']);
		$scad= date_create($r['scadenza']);
	
		?>
	<form method="post" action="prodotti.php?user=<?=$login?>">
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="operatore" value="<?=$login?>">

	<tr><td colspan="8" align="center"><h2><center>Prodotto: <?=ucfirst($r['prodotto'])?>	</h2></td></tr>
	<tr><td>Prodotto:</td><td><?=ucfirst($r['prodotto'])?></td></tr>
	<tr><td>Data Carico:</td><td><?=date_format($caric, 'd/m/Y');?></td></tr>
	<tr><td>Codice:</td><td><?=ucfirst($r['codice'])?></td></tr>
	<tr><td>Quantit&aacute;:</td><td><?=ucfirst($r['quota'])?></td></tr>
	<tr><td>Scadenza:</td><td><?=date_format($scad, 'd/m/Y');?></td></tr>
	<tr><td>Operatore Carico:</td>	<td><?=ucfirst($r['operatore_carico'])?></td></tr>
	<tr><td>Scaricare?</td>	<td><input type="submit" name="send" class="submit" value="Scarica"></td></tr>
</form>
	
	
	</table>
	<?
	break;
	
	
	
	
	
}


?>

</body>




</html>
