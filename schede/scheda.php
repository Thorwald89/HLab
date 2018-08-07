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
<title>Laboratorio di Manipolazione Cellulare - Scheda</title>
<link rel="stylesheet" href="../stile.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">
	jQuery( function($) {
		$('tbody tr[data-href]').addClass('clickable').click( function() {
			window.location = $(this).attr('data-href');
		}).find('a').hover( function() {
			$(this).parents('tr').unbind('click');
		}, function() {
			$(this).parents('tr').click( function() {
				window.location = $(this).attr('data-href');
			});
		});
	});
</script><style type="text/css">
	<!--
body {
background-color: white;

    }
    tbody tr.clickable:hover td {
 cursor: pointer;
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
		<tr><td colspan="8" style="text-align: center;"><h2><center>Cerca Paziente</h2></td></tr>
		<form method="post" action="scheda.php?pos=scheda&user=<?=$login?>">
	<tr><td>Nome </td>
	<td><input type="text" name="nome_d"></td>
	<td>Cognome </td>
	<td><input type="text" name="cognome_d"></td>
	</tr>
	<tr><td>Codice Famiglia</td>
	<td><input type="text" name="id_famiglia"></td>
	</td>
	</tr><tr>
	<td colspan="2">Inserisci Nome/Cognome del Paziente da trovare.<br> N.B.:<i> puoi cercare una scheda scrivendo %nome% nel caso si conosca parte del nome </i></td></tr>
	<tr><td style="text-align: center;" colspan="8">
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="Visualizza">
		</td></tr>
	</form>


	</table>
	<?php
	break;


	case 'scheda':

	if($send =="Visualizza"){


	?>

		<table>
			<tbody>
	<tr>
	<td>Nome </td>
	<td>Cognome </td>
	<td>Data di Nascita</td>

	</tr>

	<?php
	$s= mysqli_query($link,"select * from schede where nome_d like '".$_POST['nome_d']."' or cognome_d like '".$_POST['cognome_d']."' or id_famiglia like '".$_POST['id_famiglia']."' order by cognome_d") or die('1');
	while($b= mysqli_fetch_array($s)){

	?>

    <tr data-href="scheda.php?pos=scheda&id=<?=$b['id'];?>">

	<td><?=$b['nome_d'];?></td>
	<td><?=$b['cognome_d'];?></td>
	<td><?=$b['nascita_d'];?></td>

	</tr>

	<?php
	}

}

	?></tbody></table>

	<?php
	if($_GET['id'] !=0){
	$s=$link->query("select * from schede where id = '".$_GET['id']."'") or die('2');
	$b=mysqli_fetch_array($s);

	$n_d = date_create($b['nascita_d']);
		?>


	<table>


		<form method="POST" action="../setup/pdf2/create_result_CSE.php">

		<tr><td colspan="8" style="text-align: center;"><h2>Probando</h2></td></tr>

		<tr  style="text-align: center;">

		</tr>

	<tr><td>Nome: <?=$b['nome_d'];?></td>

	<td>Cognome: <?=$b['cognome_d'];?></td>


		</tr>

	<tr><td>Codice Famiglia: <?=$b['id_famiglia'];?></td>
	<td>Nascita: <?=date_format($n_d, 'd/m/Y')?></td>
	
	</tr>


	<tr><td>Telefono: <?=$b['telefono'];?></td>
		<td>Patologia: <?=$b['patologia'];?></td>
	</tr>


	
	</form>
	</table>
	<?php
		}
	break;


}


?>

</body>




</html>
