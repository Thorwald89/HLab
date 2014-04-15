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



if($send =="Inserisci"){
	$s=mysql_query("INSERT INTO schede (`nome_d`, `cognome_d`, `domicilio`, `comune`, `nascita_d`, `telefono`, `cellulare`, `nome_r`, `cognome_r`, `nascita_r`, `al1`, `al2`, `al3`, `al4`, `al5`, `al6`, `wbc-pre`, `wbc-post`, `scarto`, `finale`, `vol`, `siero`, `deplasmazione`) values ('".$_POST['nome_d']."', '".$_POST['cognome_d']."','".$_POST['domicilio']."','".$_POST['comune']."','".$_POST['nascita_d']."','".$_POST['telefono']."','".$_POST['cellulare']."','".$_POST['nome_r']."','".$_POST['cognome_r']."','".$_POST['nascita_r']."','".$_POST['al1']."','".$_POST['al2']."','".$_POST['al3']."','".$_POST['al4']."','".$_POST['al5']."','".$_POST['al6']."','".$_POST['wbc-pre']."','".$_POST['wbc-post']."','".$_POST['scarto']."','".$_POST['finale']."','".$_POST['vol']."','".$_POST['siero']."','".$_POST['deplasmazione']."') ") or die(mysql_error()); 
	echo "inserimento effettuato";
}


?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Inserisci Pazienti</title>
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
		<form method="POST" action="inserisci.php">
		
		<tr><td colspan="8" align="center"><h2><center>Inserisci Paziente</h2></td></tr>
		
		<tr  align="center">
			<td colspan="2" align="center"><center><h3>Donatore</h3></center></td>
			<td colspan="2" align="center"><center><h3>Ricevente</h3></center></td>

		</tr>
			
	<tr><td><strong>Nome Donatore</strong></td>					
	<td><input type="text" name="nome_d"></td>
	<td><strong>Nome Ricevente</strong></td>					
	<td><input type="text" name="nome_r"></td>
	</tr>
	
	<tr><td><strong>Cognome Donatore</strong></td>				
	<td><input type="text" name="cognome_d"></td>
	<td><strong>Cognome Ricevente</strong></td>				
	<td><input type="text" name="cognome_r"></td>
	
		</tr>
	
	<tr><td><strong>Nascita Donatore</strong></td>		
	<td><input type="date" name="nascita_d"></td>
	<td><strong>Nascita Ricevente</strong></td>		
	<td><input type="date" name="nascita_r"></td>
	</tr>
	
	<tr><td><strong>Residenza</strong></td>		
	<td><input type="text" name="comune"></td></tr>
	
	<tr><td><strong>Domicilio</strong></td>				
	<td><input type="text" name="domicilio"></td></tr>
	
	<tr><td><strong>Telefono</strong></td>				
	<td><input type="text" name="telefono"></td></tr>
	
	<tr><td><strong>Cellulare</strong></td>				
	<td><input type="text" name="cellulare"></td></tr>	
	
	
	<tr  align="center">
			<td colspan="2" align="center"><center><h3>Parametri</h3></center></td>
			<td colspan="2" align="center"><center><h3>Aliquote</h3></center></td>

		</tr>
	
	<tr>
	<td><strong>Deplasmazione</strong></td>					
	<td>SI<input type="radio" name="deplasmazione" value="SI"> NO<input type="radio" name="deplasmazione" value="NO"></td>
	<td><strong>Aliquota 1</strong></td>	
	<td><input name="al1" type="number">mL</td>
	</tr><tr>
	<td><strong>Siero</strong></td>					
	<td>FBS<input type="radio" name="siero" value="fbs"> FCS<input type="radio" name="siero" value="fcs"></td>
	<td><strong>Aliquota 2</strong></td>	
	<td><input name="al2" type="number">mL</td>
	</tr><tr>
	<td><strong>Volume mL</strong></td>					
	<td><input name="vol" type="number">mL</td>
	<td><strong>Aliquota 3</strong></td>	
	<td><input name="al3" type="number">mL</td>
	</tr><tr>
	<td><strong>Scarto mL</strong></td>					
	<td><input name="scarto" type="number">mL</td>
	<td><strong>Aliquota 4</strong></td>	
	<td><input name="al4" type="number">mL</td>
	</tr><tr>
	<td><strong>Finale mL</strong></td>					
	<td><input name="finale" type="number">mL</td>
	<td><strong>Aliquota 5</strong></td>	
	<td><input name="al5" type="number">mL</td>
	</tr><tr>
	<td><strong>jj</strong></td>					
	<td><input name="jj" type="number">mL</td>
	<td><strong>Aliquota 6</strong></td>	
	<td><input name="al6" type="number">mL</td>
	</tr><tr>
	<td><strong>WBC pre-Raccolta</strong></td>					
	<td><input name="wbc-pre" type="number">&mu;L</td>
	</tr><tr>
	<td><strong>WBC post-Raccolta</strong></td>					
	<td><input name="wbc-post" type="number">&mu;L</td>
	</tr>
	
	
	
	<tr><td colspan="8"><input type="submit" name="send" value="Inserisci"></td></tr>
	</form>
	</table>
	
</body>

	

</html>
