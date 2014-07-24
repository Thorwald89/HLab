<?php
/*
 *
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


$ff = mysql_query("select * from criotank") or die(mysql_error());
		$gg= mysql_num_rows($ff);
		$id = $gg +1;





if($send =="Aggiungi"){

	$ff = mysql_query("insert into criotank (id, modello, stato) VALUES ('".$_POST['id']."', '".$_POST['modello']."', '".$_POST['stato']."')") or die(mysql_error());

?>
<script language="javascript">
alert("Tank Aggiunto Correttamente!");
</script>
<?php
}



?>

<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - CrioTank</title>
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

<?php

switch($pos){

	default:
	break;

	case 'Tank'
	?>
<form method="post" action="edit.php">

<table>

		<tr  align="center">
		<td colspan="2" align="center"><center><h3>Modifica Tank</h3></center></td>
		</tr>


	<tr><td><strong>ID: </strong></td>
	<td><input type="text" disabled name="id" value="<?=$id?>"></td>

		</tr>
	<tr><td><strong>Modello: </strong></td>
	<td><input type="text" name="modello" ></td>

		</tr>
		<tr><td><strong>Stato: </strong></td>
	<td><input type="radio" name="stato" value="attivo" checked="checked"> Attivo<input type="radio" name="stato" value="backup">BackUp</td>

		</tr>
		</tr>
	<tr><td colspan="2"> <input type="submit" name="send" value="Aggiungi"></td>

		</tr>
</form>
<?php
	break;

	case 'Sacche':
	?>

<table>

		<tr  align="center">
		<td colspan="5" align="center"><center><h3>Modifica Sacche</h3></center></td>
		</tr>

<?php
if($send == 'Cerca'){
	?>
	<tr>
	<td>Nome</td>	<td>Cognome</td>	<td>Tank</td>	<td>Aliquote</td>



	</tr>
	<?php
$z= mysql_query(" select schede.nome_r, schede.cognome_r from  schede  where nome_r like '".$_POST['nome_r']."' or cognome_r like '".$_POST['cognome_r']."'") or die(mysql_error());
$roww = mysql_num_rows($z);
while($b = mysql_fetch_array($z))
{
	?>
	<tr>
	<?php
	$za= mysql_query(" select * from  criotank_sacche where id_pz = '".$b['id']."'")or die(mysql_error());
	$roww = mysql_num_rows($za);

	$ra = mysql_fetch_array($za);
	?>
	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['nome_r'];?></a></td>
	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['cognome_r'];?></a></td>
	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$RA['id_tank'];?></a></td>
	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$roww?></a></td>

	</tr>
	<?php
}
}else{
?>
<form method="post" action="edit.php?pos=Sacche&user=<?=$login?>">

<tr><td>Nome </td>
	<td><input type="text" name="nome_r"></td>
	<td>Cognome </td>
	<td><input type="text" name="cognome_r"></td>
	</tr><tr>
	<td colspan="2">Inserisci Nome/Cognome del Paziente da trovare.<br> N.B.:<i> puoi cercare una scheda scrivendo %nome% nel caso si conosca parte del nome </i></td></tr>
	<tr><td style="text-align: center;" colspan="8">
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="Cerca">
		</td></tr>
<?php
}
?>
		</table>
	</form>
	<?php
	break;
}
?>
</body>

</html>
