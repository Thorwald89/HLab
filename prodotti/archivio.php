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
 *e
 *
 */
include('../setup/setup.php');
session_start();

$login = $_SESSION['login'];

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];

if($send =="Archivia"){

	$s=mysql_query("update prodotti set view = '0' where view= '1'") or die(mysql_error());
	$archive_log= mysql_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto']."','0',NOW(), 'Archiviazione Dati')") or die(mysql_error());


?>
<script language="javascript">
alert("Archiviazione Eseguita.");
</script>
<?php
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


<?php
switch($pos){

	case 'arc':
	?>
	<table>


		<tr><td colspan="10" align="center"><h2><center> Lista Prodotti	</h2></td></tr>

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

	<?php
	$s= mysql_query("select * from prodotti where view ='0' and (data_carico = '".$_POST['data_carico']."' or data_scarico = '".$_POST['data_scarico']."' or lotto = '".$_POST['lotto']."' or prodotto = '".$_POST['prodotto']."') order by prodotto ASC") or die(mysql_error());
	while($r =mysql_fetch_array($s)){

		$caric = date_create($r['data_carico']);
		$scaric= date_create($r['data_scarico']);
		$scad= date_create($r['scadenza']);

		?>
		<tr>
	<td><a href="prodotti.php?pos=scarico&user=<?=$login?>&id=<?=$r['id']?>"><?=ucfirst($r['prodotto'])?></a></td>
	<td><?=date_format($caric, 'd/m/Y');?></td>
	<td><?php if($r['data_scarico'] == '0000-00-00'){echo '-';}else{ echo date_format($scaric, 'd/m/Y');} ?></td>
	<td><?=ucfirst($r['codice'])?></td>
	<td><?=ucfirst($r['lotto'])?></td>
	<td><?=ucfirst($r['quota'])?></td>
	<td><?=date_format($scad, 'd/m/Y');?></td>
	<td><?=ucfirst($r['operatore_carico'])?></td>
	<td><?=ucfirst($r['operatore_scarico'])?></td>
	</tr>
		<?php
	}
	?>


	</table>
	<?php
	break;




	default:
	?>
	<table>
		<tr><td colspan="8" style="text-align: center;"><h2><center>Cerca Prodotto in Archivio</h2></td></tr>
		<form method="post" action="archivio.php?pos=arc&user=<?=$login?>">
	<tr><td>Data Carico</td>
	<td><input type="date" name="data_carico"></td>
	<td>Data Scarico</td>
	<td><input type="date" name="data_scarico"></td>
	</tr>
	<tr><td>Lotto</td>
	<td><input type="text" name="lotto"></td>
	<td>Prodotto</td>
	<td><input type="text" name="prodotto"></td>
	</tr><tr>
	<td colspan="2">N.B.:<i> Ppuoi cercare un prodotto scrivendo %nome% nel caso si conosca parte del nome </i></td></tr>
	<tr><td style="text-align: center;" colspan="8">
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="Visualizza">
		</td></tr>
	</form>


	</table>
	<?php
	break;





}


?>

</body>




</html>
