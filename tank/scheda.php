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
	?>


	<table>
		<tr><td colspan="8" style="text-align: center;"><h2><center>Lista Crio-Tank</h2></td></tr>
		<tr ><td>N° e Modello</td><td>Aliquote</td><td>Stato</td></tr>
		<?php
		$ff = mysql_query("select criotank.id, criotank.modello, criotank.stato from criotank") or die(mysql_error());
		$row = mysql_num_rows($ff);
		while($gg= mysql_fetch_array($ff))
		{


		?>
		<tr>
			<?php
			$dadd = mysql_query("select * from criotank_sacche where id_tank = '".$gg['id']."'")or die(mysql_error());
			$ali_row = mysql_num_rows($dadd);
			?>
			<td><?=$gg['id']?>-<?=$gg['modello']?></td><td><?=$ali_row?></td><td><?=$gg['stato']?></td> </tr>
		<?php
		}
		if($row <= 0){
			?>
		<tr> <td>Non sono ancora presenti Crio-Tank!</td> </tr>
		<?php
		}
		?>

		<tr> <td></td> </tr>

	</table>
	<?php
	break;




}


?>

</body>




</html>
