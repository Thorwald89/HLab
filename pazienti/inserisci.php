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

/*
		// decurto i lotti dal db prodotti

		$var_alb = "2";
		$var_DMSO = "1";
		$var_siringhe = "3";
		$var_rubinetti = "1";
		$var_sacche = "";
		$var_antigamma="";
		$var_cd34 ="";


		$albumina = mysqli_query("update prodotti set quota = quota - '".$var_alb."' where lotto = '".$_POST['lotto_albumina']."' ") or die (mysqli_error());
		$DMSO = mysqli_query("update prodotti set quota = quota - '".$var_DMSO."' where lotto = '".$_POST['lotto_DMSO']."' ") or die (mysqli_error());
		$siringhe = mysqli_query("update prodotti set quota = quota - '".$var_siringhe."' where lotto = '".$_POST['lotto_siringhe']."' ") or die (mysqli_error());
		$rubinetti = mysqli_query("update prodotti set quota = quota - '".$var_rubinetti."' where lotto = '".$_POST['lotto_rubinetti']."' ") or die (mysqli_error());
		$sacche = mysqli_query("update prodotti set quota = quota - '".$var_sacche."' where lotto = '".$_POST['lotto_sacche']."' ") or die (mysqli_error());
		$antigamma = mysqli_query("update prodotti set quota = quota - '".$var_antigamma."' where lotto = '".$_POST['lotto_antigamma']."' ") or die (mysqli_error());
		$cd34 = mysqli_query("update prodotti set quota = quota - '".$var_cd34."' where lotto = '".$_POST['lotto_cd34']."' ") or die (mysqli_error());



		// inserisco in log_prodotti

		$f_albumina= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_albumina']."','$var_alb','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_DMSO= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_DMSO']."','$var_DMSO','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_rubinetti= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_siringhe']."','$var_siringhe','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_siringhe= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_rubinetti']."','$var_rubinetti','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_sacche= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_sacche']."','$var_sacche','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_antigamma= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_antigamma']."','$var_antigamma','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_cd34= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_cd34']."','$var_cd34','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
*/
		
		// inserisco i dati nel db schede per il probando


		
		$s= $link->query("INSERT INTO schede (`nome_d`, `cognome_d`, `nascita_d`, `telefono`, `id_famiglia`, `patologia`) values ('".$_POST['nome_d']."', '".$_POST['cognome_d']."','".$_POST['nascita_d']."','".$_POST['telefono']."','".$_POST['id_famiglia']."','".$_POST['patologia']."') ") or die('1');		
		
		
		// inserisco i dati nel db schede per i familiari


		$s= $link->query("INSERT INTO famiglie (`nome`, `cognome`, `nascita`, `id_famiglia`, `grado`, `prelievo`, `arrivo`) values ('".$_POST['nome_f']."', '".$_POST['cognome_f']."','".$_POST['nascita_f']."','".$_POST['id_famiglia']."','".$_POST['grado']."','".$_POST['prelievo']."','".$_POST['arrivo']."') ") or die('2');

		

		

?>
<script language="javascript">
alert("Inserimento <?=$tipo?> effettuato.");
</script>
<?php
}


?>


<html>
<head>
<title><?=$titolo?></title>
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
				
				<center><input type="radio" name="tipo" value="DEP" id="tipo">DEP - <input type="radio" name="tipo" value="EST" id="tipo">EST - <input type="radio" name="tipo" value="CQ" id="tipo">CQ</center>
						<tr>
		<center><strong>Codice Famiglia</strong><input type="text" name="id_famiglia"></center>

		</tr>
		

<div id="anamnesi">
<table>
<tr>
	<td><strong>Patologia</strong><input type="text" name="patologia"></td>
	<td><strong>Sede Prelievo</strong><input type="text" name="prelievo"></td>
</tr>

<tr>
	<td><strong>Data Arrivo</strong><input type="date" name="arrivo"></td>
	<td><strong>Impegnativa</strong><input type="radio" name="impegnativa" value="SI" id="impegnativa">SI - <input type="radio" name="impegnativa" value="NO" id="impegnativa">NO</td>

</tr>
</table>






</div>		



		
<div id="probando">

<table>

		<tr  align="center">
		<td colspan="2" align="center"><center><h3>Probando</h3></center></td>
		

		<tr>
		<td><strong>BarCode</strong><input type="text" name="barcode_d"></td>

		</tr>
		
		<tr>
		<td><strong>Nome</strong><input type="text" name="nome_d"></td>

		<td><strong>Cognome</strong><input type="text" name="cognome_d"></td>
		</tr>

		<tr>
		<td><strong>Nascita</strong><input type="date" name="nascita_d"></td>
	
	<td><strong>Telefono</strong><input type="text" name="telefono"></td></tr>



</table>

</div>


<div id="famiglia" >

<table width="200">

		<tr  align="center">
		<td colspan="2" align="center"><center><h3>Familiari</h3></center></td>
		</tr>
		<tr>
		<td><strong>BarCode</strong><input type="text" name="barcode_f"></td>

		</tr>
		
<tr>
		<td><strong>Nome</strong><input type="text" name="nome_f"></td>

		<td><strong>Cognome</strong><input type="text" name="cognome_f"></td>
		</tr>

		<tr>
		<td><strong>Nascita</strong><input type="date" name="nascita_f"></td>
		<td><strong>Parentela</strong>
		<select id="select" name="grado">
		<option value="madre">Madre</option>
		<option value="padre">Padre</option>
		<option value="f1">Fratello 1</option>
		<option value="f2">Fratello 2</option>
		<option value="f3">Fratello 3</option>
		<option value="f4">Fratello 4</option>
		<option value="f5">Fratello 5</option>
		<option value="f6">Fratello 6</option>
		<option value="f7">Fratello 7</option>
		<option value="f8">Fratello 8</option>

		</select></td>

</tr>
		

</table>

</div>







<input type="submit" name="send" value="Inserisci">

	</div>
	</form>
</body>



</html>
