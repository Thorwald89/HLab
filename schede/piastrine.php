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



if($send =="inserisci"){
	
	$s=mysql_query("insert into piastrine (id_campione, cognome, nome, diretto, indiretto, operatore, data_test) values ('".$_POST['id_campione']."', '".$_POST['cognome']."', '".$_POST['nome']."', '".$_POST['diretto']."', '".$_POST['indiretto']."', '".$_POST['operatore']."',NOW()) ") or die(mysql_error()); 
	echo "inserimento effettuato";
}
?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Piastrine</title>
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
		
		
		<tr><td colspan="10" align="center"><h2><center>Lista Esami Effettuati	</h2></td></tr>
		
	<tr>	
	<td><strong>ID Campione</strong></td>
	<td><strong>Cognome</strong></td>
	<td><strong>Nome</strong></td>
	<td><strong>Diretto</strong></td>
	<td><strong>Indiretto</strong></td>
	<td><strong>Data Esecuzione Test</strong></td>
	<td><strong>Operatore</strong></td>
	</tr>
	
	<?
	$s= mysql_query("select * from piastrine order by data_test") or die(mysql_error());
	while($r =mysql_fetch_array($s)){
		
		$data = date_create($r['data_test']);


		?>
		<tr>	
	<td><?=ucfirst($r['id_campione'])?></td>
	<td><?=ucfirst($r['cognome'])?></td>
	<td><?=ucfirst($r['nome'])?></td>
	<td><?=ucfirst($r['diretto'])?></td>
	<td><?=ucfirst($r['indiretto'])?></td>
	<td><?=date_format($data, 'd/m/Y');?></td>
	<td><?=ucfirst($r['operatore'])?></td>
	</tr>
		<?
	}
	?>
	
	
	</table>
	<?
	break;
	
	
	case 'inserisci':
	?>
	<table>
		<tr><td colspan="5"><h2>Inserisci Risultati Test</h2></td></tr>
		<form method="post" action="piastrine.php?user=<?=$login?>">
	<tr>
	<td>Data Test</td><td>Autoimpostato</td>
	</tr><tr>
	<td>ID Campione</td><td><input type="text" name="id_campione"></td>
	</tr><tr>
	<td>Cognome</td><td><input type="text" name="cognome"></td>
	</tr><tr>
	<td>Nome</td><td><input type="text" name="nome"></td>
	</tr><tr>
	<td>Diretto</td><td>
		<select name="diretto">
			<option value="positivo">Positivo</option>
			<option value="negativo">Negativo</option>
		</select></td>
	</tr><tr>
	<td>Indiretto</td><td>
		<select name="indiretto">
			<option value="positivo">Positivo</option>
			<option value="negativo">Negativo</option>
		</select></td>	</tr>
	<tr><td align="center" colspan="6">
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="inserisci">
		</td></tr>
	</form>
	
	
	</table>
	<?
	break;
		
	
	
	
}


?>

</body>




</html>
