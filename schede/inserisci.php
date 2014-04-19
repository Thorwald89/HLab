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


		// decurto i lotti dal db prodotti
		
		$var_alb = "2";
		$var_DMSO = "1";
		$var_siringhe = "3";
		$var_rubinetti = "1";
		$var_sacche = "";
		$var_antigamma="";
		$var_cd34 ="";
		
		
		$albumina = mysql_query("update prodotti set quota = quota - '".$var_alb."' where lotto = '".$_POST['lotto_albumina']."' ") or die (mysql_error());
		$DMSO = mysql_query("update prodotti set quota = quota - '".$var_DMSO."' where lotto = '".$_POST['lotto_DMSO']."' ") or die (mysql_error());
		$siringhe = mysql_query("update prodotti set quota = quota - '".$var_siringhe."' where lotto = '".$_POST['lotto_siringhe']."' ") or die (mysql_error());
		$rubinetti = mysql_query("update prodotti set quota = quota - '".$var_rubinetti."' where lotto = '".$_POST['lotto_rubinetti']."' ") or die (mysql_error());
		$sacche = mysql_query("update prodotti set quota = quota - '".$var_sacche."' where lotto = '".$_POST['lotto_sacche']."' ") or die (mysql_error());
		$antigamma = mysql_query("update prodotti set quota = quota - '".$var_antigamma."' where lotto = '".$_POST['lotto_antigamma']."' ") or die (mysql_error());
		$cd34 = mysql_query("update prodotti set quota = quota - '".$var_cd34."' where lotto = '".$_POST['lotto_cd34']."' ") or die (mysql_error());



		// inserisco in log_prodotti
		
		$f_albumina= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_albumina']."','$var_alb','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());
		$f_DMSO= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_DMSO']."','$var_DMSO','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());
		$f_rubinetti= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_siringhe']."','$var_siringhe','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());
		$f_siringhe= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_rubinetti']."','$var_rubinetti','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());
		$f_sacche= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_sacche']."','$var_rubinetti','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());
		$f_antigamma= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_antigamma']."','$var_rubinetti','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());
		$f_cd34= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_cd34']."','$var_rubinetti','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysql_error());

		// inserisco i dati nel db schede
		
	
		if($_POST['donazione'] == 'allogenico')
		{
		$s=mysql_query("INSERT INTO schede (`nome_d`, `cognome_d`, `domicilio`, `comune`, `nascita_d`, `telefono`, `cellulare`, `nome_r`, `cognome_r`, `nascita_r`, `al1`, `al2`, `al3`, `al4`, `al5`, `al6`, `wbc-pre`, `wbc-post`, `scarto`, `finale`, `vol`, `procedura`, `deplasmazione`, `lotto_albumina`, `lotto_DMSO`, `lotto_siringhe`, `lotto_rubinetti`, `data_congelamento`, `data_raccolta`, `donazione`, `peso`, `data_monitoraggio1`, `wbc_monitoraggio1`, `cd34_perc_monitoraggio1`, `cd34_micro_monitoraggio1`, `data_monitoraggio2`, `wbc_monitoraggio2`, `cd34_perc_monitoraggio2`, `cd34_micro_monitoraggio2`, `data_monitoraggio3`, `wbc_monitoraggio3`, `cd34_perc_monitoraggio3`, `cd34_micro_monitoraggio3`, `data_monitoraggio4`, `wbc_monitoraggio4`, `cd34_perc_monitoraggio4`, `cd34_micro_monitoraggio4`) values ('".$_POST['nome_d']."', '".$_POST['cognome_d']."','".$_POST['domicilio']."','".$_POST['comune']."','".$_POST['nascita_d']."','".$_POST['telefono']."','".$_POST['cellulare']."','".$_POST['nome_r']."','".$_POST['cognome_r']."','".$_POST['nascita_r']."','".$_POST['al1']."','".$_POST['al2']."','".$_POST['al3']."','".$_POST['al4']."','".$_POST['al5']."','".$_POST['al6']."','".$_POST['wbc-pre']."','".$_POST['wbc-post']."','".$_POST['scarto']."','".$_POST['finale']."','".$_POST['vol']."','".$_POST['procedura']."','".$_POST['deplasmazione']."','".$_POST['lotto_albumina']."', '".$_POST['lotto_DMSO']."', '".$_POST['lotto_siringhe']."', '".$_POST['lotto_rubinetti']."', '".$_POST['data_congelamento']."', '".$_POST['data_raccolta']."', '".$_POST['donazione']."', '".$_POST['peso']."', '".	$_POST['data_monitoraggio1']."', '".$_POST['wbc_monitoraggio1']."', '".	$_POST['cd34_perc_monitoraggio1']."', '".$_POST['cd34_micro_monitoraggio1']."', '".	$_POST['data_monitoraggio2']."', '".$_POST['wbc_monitoraggio2']."', '".	$_POST['cd34_perc_monitoraggio2']."', '".$_POST['cd34_micro_monitoraggio2']."', '".	$_POST['data_monitoraggio3']."', '".$_POST['wbc_monitoraggio3']."', '".	$_POST['cd34_perc_monitoraggio3']."', '".$_POST['cd34_micro_monitoraggio3']."', '".	$_POST['data_monitoraggio4']."', '".$_POST['wbc_monitoraggio4']."', '".	$_POST['cd34_perc_monitoraggio4']."', '".$_POST['cd34_micro_monitoraggio4']."') ") or die(mysql_error()); 
		$tipo= "Allogenico";
		}
		if($_POST['donazione'] == 'autologo')
		{
		$s=mysql_query("INSERT INTO schede (`nome_d`, `cognome_d`, `domicilio`, `comune`, `nascita_d`, `telefono`, `cellulare`, `nome_r`, `cognome_r`, `nascita_r`, `al1`, `al2`, `al3`, `al4`, `al5`, `al6`, `wbc-pre`, `wbc-post`, `scarto`, `finale`, `vol`, `procedura`, `deplasmazione`, `lotto_albumina`, `lotto_DMSO`, `lotto_siringhe`, `lotto_rubinetti`, `data_congelamento`, `data_raccolta`, `donazione`, `peso`, `data_monitoraggio1`, `wbc_monitoraggio1`, `cd34_perc_monitoraggio1`, `cd34_micro_monitoraggio1`, `data_monitoraggio2`, `wbc_monitoraggio2`, `cd34_perc_monitoraggio2`, `cd34_micro_monitoraggio2`, `data_monitoraggio3`, `wbc_monitoraggio3`, `cd34_perc_monitoraggio3`, `cd34_micro_monitoraggio3`, `data_monitoraggio4`, `wbc_monitoraggio4`, `cd34_perc_monitoraggio4`, `cd34_micro_monitoraggio4`) values ('".$_POST['nome_d']."', '".$_POST['cognome_d']."','".$_POST['domicilio']."','".$_POST['comune']."','".$_POST['nascita_d']."','".$_POST['telefono']."','".$_POST['cellulare']."','".$_POST['nome_d']."','".$_POST['cognome_d']."','".$_POST['nascita_d']."','".$_POST['al1']."','".$_POST['al2']."','".$_POST['al3']."','".$_POST['al4']."','".$_POST['al5']."','".$_POST['al6']."','".$_POST['wbc-pre']."','".$_POST['wbc-post']."','".$_POST['scarto']."','".$_POST['finale']."','".$_POST['vol']."','".$_POST['procedura']."','".$_POST['deplasmazione']."','".$_POST['lotto_albumina']."', '".$_POST['lotto_DMSO']."', '".$_POST['lotto_siringhe']."', '".$_POST['lotto_rubinetti']."', '".$_POST['data_congelamento']."', '".$_POST['data_raccolta']."', '".$_POST['donazione']."', '".$_POST['peso']."', '".	$_POST['data_monitoraggio1']."', '".$_POST['wbc_monitoraggio1']."', '".	$_POST['cd34_perc_monitoraggio1']."', '".$_POST['cd34_micro_monitoraggio1']."', '".	$_POST['data_monitoraggio2']."', '".$_POST['wbc_monitoraggio2']."', '".	$_POST['cd34_perc_monitoraggio2']."', '".$_POST['cd34_micro_monitoraggio2']."', '".	$_POST['data_monitoraggio3']."', '".$_POST['wbc_monitoraggio3']."', '".	$_POST['cd34_perc_monitoraggio3']."', '".$_POST['cd34_micro_monitoraggio3']."', '".	$_POST['data_monitoraggio4']."', '".$_POST['wbc_monitoraggio4']."', '".	$_POST['cd34_perc_monitoraggio4']."', '".$_POST['cd34_micro_monitoraggio4']."') ") or die(mysql_error()); 
		$tipo= "Autologo";
		}		
?>
<script language="javascript">
alert("Inserimento <?=$tipo?> effettuato.");
</script>
<?
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
<script src='../setup/jquery.min.js'></script>

<script>
  function sel1() {
			$("div#ricevente").hide("slow");
		}
		
	function sel2() {
			$("div#ricevente").show("slow");
		}
</script>
</head>



<body>
		<form method="POST" action="inserisci.php">
			<div id="principale">
				<center>
		<b>Tipologia di Donazione:</b>	Autologo<input type="radio" name="donazione" value="autologo" onclick="javascript:sel1()"  checked="checked" > 	
			Allogenico<input type="radio" name="donazione" onclick="javascript:sel2()" value="allogenico" >
			</center>
<div id="donatore"style=" position: absolute; top: 50px; left: 50px; width:200px; height:100px;">

<table width="200">

		<tr  align="center">
		<td colspan="2" align="center"><center><h3>Donatore</h3></center></td>
		</tr>
		
				
	<tr><td><strong>Nome Donatore</strong></td>					
	<td><input type="text" name="nome_d"></td>
	
		</tr>

	<tr><td><strong>Cognome Donatore</strong></td>				
	<td><input type="text" name="cognome_d"></td>
		</tr>
	
	<tr><td><strong>Nascita Donatore</strong></td>		
	<td><input type="date" name="nascita_d"></td>
	</tr>
	
	<tr><td><strong>Telefono</strong></td>				
	<td><input type="text" name="telefono"></td></tr>
	

	
</table>

</div>


<div id="ricevente"  style="display:none;  position: absolute; top: 50px; left: 300px; width:200px; height:100px;">

<table width="200">

		<tr  align="center">
		<td colspan="2" align="center"><center><h3>Ricevente</h3></center></td>
		</tr>
		
<tr>
	
		<td><strong>Nome Ricevente</strong></td>					
	<td><input type="text" name="nome_r"></td>
	</tr>
	<td><strong>Cognome Ricevente</strong></td>				
	<td><input type="text" name="cognome_r"></td>
	
		</tr>
	<td><strong>Nascita Ricevente</strong></td>				
	<td><input type="date" name="nascita_r"></td>
	
		</tr>
	
	<tr><td><strong>Telefono</strong></td>				
	<td><input type="text" name="telefono"></td></tr>
	

	
</table>

</div>



	
	
		
	
	
	<div id="parametri"style=" position: absolute; top: 270px; left: 50px; width:550px; height:100px;">

	<table width="550";>
	<tr  align="center">
			<td colspan="2" align="center"><center><h3>Parametri</h3></center></td>
			<td colspan="2" align="center"><center><h3>Aliquote</h3></center></td>

		</tr>
	
	<tr>
	<td><strong>Deplasmazione </strong></td>					
	<td>SI<input type="radio" name="deplasmazione" value="SI" checked="checked"> NO<input type="radio" name="deplasmazione" value="NO"></td>
	<td><strong>Aliquota 1</strong></td>	
	<td><input name="al1" type="number">mL</td>
	</tr><tr>
	<td><strong>Procedura</strong></td>					
	<td>PBSC<input type="radio" name="procedura" value="pbsc" checked="checked"> BM<input type="radio" name="procedura" value="bm"></td>
	<td><strong>Aliquota 2</strong></td>	
	<td><input name="al2" type="number">mL</td>
	</tr><tr>
	<td><strong>Vol. Raccolta</strong></td>					
	<td><input name="vol" type="number">mL</td>
	<td><strong>Aliquota 3</strong></td>	
	<td><input name="al3" type="number">mL</td>
	</tr><tr>
	<td><strong>Vol. Scarto</strong></td>					
	<td><input name="scarto" type="number">mL</td>
	<td><strong>Aliquota 4</strong></td>	
	<td><input name="al4" type="number">mL</td>
	</tr><tr>
	<td><strong>Data Congelamento</strong></td>					
	<td><input name="data_congelamento" type="date"></td>
	<td><strong>Aliquota 5</strong></td>	
	<td><input name="al5" type="number">mL</td>
	</tr><tr>
	<td><strong>Vol. Finale</strong></td>					
	<td><input name="finale" type="number">mL</td>
	<td><strong>Aliquota 6</strong></td>	
	<td><input name="al6" type="number">mL</td>	
	</tr><tr>
	<td><strong>Data raccolta</strong></td>					
	<td><input name="data_raccolta" type="date"></td>
	</tr>
	<tr>
	<td><strong>Peso in Kg</strong></td>					
	<td><input name="peso" type="number"> Kg</td>
	</tr>
	</table>
	
	<table>
		<tr  align="center">
			<td colspan="3" align="center"><center><h3>Dati Pre-Raccolta</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <input name="wbc-pre" type="number">&mu;L</td>
	<td><strong>CD34 %</strong> <input name="cd34-pre-perc" type="number">%</td>
	<td><strong>CD34/&mu;L</strong> <input name="cd34-pre-micro" type="number">&mu;L</td>

</tr>

<tr  align="center">
			<td colspan="3" align="center"><center><h3>Dati Raccolta</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <input name="wbc-racc" type="number">&mu;L</td>
	<td><strong>CD34 %</strong> <input name="cd34-racc-perc" type="number">%</td>
	<td><strong>CD34/&mu;L</strong> <input name="cd34-racc-micro" type="number">&mu;L</td>

</tr>

<tr  align="center">
			<td colspan="3" align="center"><center><h3>Dati Post-Raccolta</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <input name="wbc-post" type="number">&mu;L</td>
	<td><strong>CD34 %</strong> <input name="cd34-post-perc" type="number">%</td>
	<td><strong>CD34/&mu;L</strong> <input name="cd34-post-micro" type="number">&mu;L</td>

</tr>
	
<tr  align="center">
			<td colspan="3" align="center"><center><h3>Dati Deplasmazione</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <input name="wbc-depl" type="number">&mu;L</td>
	<td><strong>CD34 %</strong> <input name="cd34-depl-perc" type="number">%</td>
	<td><strong>CD34/&mu;L</strong> <input name="cd34-depl-micro" type="number">&mu;L</td>

</tr>
	</table>
	
	</div>
	
	<div style=" position: absolute; top: 880px; left: 50px; width:300px; height:100px;">
	<table width="300">
	
	<tr  align="center">
			<td colspan="2" align="center"><center><h3>Prodotti</h3></center></td>
		</tr>
	
	<tr><td colspan="2"><strong>Lotto Sacche</strong><input type="text" name="lotto_sacche"></td></tr>

	<tr><td><strong>Lotto Albumina</strong><input type="text" name="lotto_albumina"></td>
	<td><strong>Lotto DMSO</strong><input type="text" name="lotto_DMSO"></td></tr>
	
	<tr><td><strong>Lotto Siringhe</strong><input type="text" name="lotto_siringhe"></td>
	<td><strong>Lotto Rubinetti</strong><input type="text" name="lotto_rubinetti"></td></tr>	

	<tr><td><strong>Lotto Anti &gamma;&gamma;</strong><input type="text" name="lotto_antigamma"></td>
	<td><strong>Lotto Anti CD34	</strong><input type="text" name="lotto_cd34"></td></tr>
		
	
	</table>
	</div>
	
	<div style="  position: absolute; top: 1200px; left: 50px; width:500px; height:100px;">
	<table width="500" align="center">
	
	<tr  align="center">
			<td colspan="5" align="center"><center><h3>Monitoraggio CD34</h3></center></td>
		</tr>
	
	<tr>
				<td><b></b></td>

		<td><strong>Data</strong></td>
		<td><strong>WBC</strong></td>	
		<td><strong>CD34 %</strong></td>	
		<td><strong>CD34/&mu;L</strong></td>	
	
		</tr>		
	
	<tr>
	<td><b>1</b></td>		
	<td><input type="date" name="data_monitoraggio1"></td>
	<td><input type="text" name="wbc_monitoraggio1"></td>
	<td><input type="text" name="cd34_perc_monitoraggio1"></td>
	<td><input type="text" name="cd34_micro_monitoraggio1"></td>

	</tr>
	<tr>
		<td><b>2</b></td>
				
	<td><input type="date" name="data_monitoraggio2"></td>
	<td><input type="text" name="wbc_monitoraggio2"></td>
	<td><input type="text" name="cd34_perc_monitoraggio2"></td>
	<td><input type="text" name="cd34_micro_monitoraggio2"></td>

	</tr>
	<tr>	
				<td><b>3</b></td>
			
	<td><input type="date" name="data_monitoraggio3"></td>
	<td><input type="text" name="wbc_monitoraggio3"></td>
	<td><input type="text" name="cd34_perc_monitoraggio3"></td>
	<td><input type="text" name="cd34_micro_monitoraggio3"></td>

	</tr>
	<tr>		
				<td><b>4</b></td>
		
	<td><input type="date" name="data_monitoraggio4"></td>
	<td><input type="text" name="wbc_monitoraggio4"></td>
	<td><input type="text" name="cd34_perc_monitoraggio4"></td>
	<td><input type="text" name="cd34_micro_monitoraggio4"></td>

	</tr>
	
	<tr><td colspan="8" style="align: center;"><center><input type="submit" name="send" value="Inserisci"></center></td></tr>

	</table>
	</div>
	
	</div>
	</form>
</body>

	

</html>
