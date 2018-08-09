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

$barcode = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];


if($seld == 'referta') {

use Dompdf\Dompdf;

//generate some PDFs!
$dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));

?>

		}



<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Refertazione</title>
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
</script>


<style type="text/css">
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
	
	$s=$link->query("select * from schede where barcode like '$barcode'") or die('2');
	$b=mysqli_fetch_array($s);

	$n_d = date_create($b['nascita_d']);
		?>


	<table>


		<form method="POST" action="referto.php">

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


	<input type="submit" name="send" value="referta">
	</form>
	</table>

</body>




</html>
