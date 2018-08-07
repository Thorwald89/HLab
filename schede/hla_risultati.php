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
	
	$s=$link->query("insert into esami (id_campione, locus_a, locus_b, locus_c, locus_dr, locus_dqa, locus_dqb, locus_dp, operatore, data_test) values ('".$_POST['id_campione']."', '".$_POST['locus_a']."', '".$_POST['locus_b']."', '".$_POST['locus_c']."', '".$_POST['locus_dr']."', '".$_POST['locus_dqa']."', '".$_POST['locus_dqb']."', '".$_POST['locus_dp']."', '".$_POST['operatore']."',NOW()) ") or die(mysqli_error($link)); 
	echo "inserimento effettuato";
}
?>


<html>
<head>
<title><?=$titolo?></title>
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
switch($pos){
	
	default:
	?>
	<table>
		
		
		<tr><td colspan="10" align="center"><h2><center>Lista Esami Effettuati	</h2></td></tr>
		
	<tr>	
	<td><strong>ID Campione</strong></td>
	<td><strong>Cognome</strong></td>
	<td><strong>Nome</strong></td>
	<td><strong>Locus A</strong></td>
	<td><strong>Locus B</strong></td>
	<td><strong>Locus C</strong></td>
	<td><strong>Locus DRB</strong></td>
	<td><strong>Locus DQA1</strong></td>
	<td><strong>Locus DQB</strong></td>
	<td><strong>Locus DPB1</strong></td>
	<td><strong>Data Esecuzione Test</strong></td>
	<td><strong>Operatore</strong></td>
	</tr>
	
	<?php
	$s= $link->query("select * from esami order by data_test") or die('1');
	while($r =mysqli_fetch_array($s)){
		
		$data = date_create($r['data_test']);


		?>
		<tr data-href="scheda.php?pos=scheda&id=<?=$r['id_campione'];?>">	
	<td><?=ucfirst($r['id_campione'])?></td>
	<td><?=ucfirst($r['cognome'])?></td>
	<td><?=ucfirst($r['nome'])?></td>
	<td><?=ucfirst($r['locus_a'])?></td>
	<td><?=ucfirst($r['locus_b'])?></td>
	<td><?=ucfirst($r['locus_c'])?></td>
	<td><?=ucfirst($r['locus_dr'])?></td>
	<td><?=ucfirst($r['locus_dqa'])?></td>
	<td><?=ucfirst($r['locus_dqb'])?></td>
	<td><?=ucfirst($r['locus_dp'])?></td>
	<td><?=date_format($data, 'd/m/Y');?></td>
	<td><?=ucfirst($r['operatore'])?></td>
	</tr>
		<?php
	}
	?>
	
	
	</table>
	<?php
	break;
	
	
	case 'inserisci':
	?>
	<table>
		<tr><td colspan="5"><h2>Inserisci Risultati Test</h2></td></tr>
		<form method="post" action="hla_risultati.php?user=<?=$login?>">
	<tr>
	<td>Data Test</td><td>Autoimpostato</td>
	</tr><tr>
	<td>ID Campione</td><td><input type="text" name="id_campione"></td>
	</tr><tr>
	<td><strong>Locus A</strong></td><td><input type="text" name="locus_a"></td>	</tr><tr>
	<td><strong>Locus B</strong></td><td><input type="text" name="locus_b"></td>	</tr><tr>
	<td><strong>Locus C</strong></td><td><input type="text" name="locus_b"></td>	</tr><tr>
	<td><strong>Locus DRB</strong></td><td><input type="text" name="locus_dr"></td>	</tr><tr>
	<td><strong>Locus DQA1</strong></td><td><input type="text" name="locus_dqa"></td>	</tr><tr>
	<td><strong>Locus DQB</strong></td><td><input type="text" name="locus_dqb"></td>	</tr><tr>
	<td><strong>Locus DPB1</strong></td><td><input type="text" name="locus_dp"></td>	</tr>
	<tr><td align="center" colspan="6">
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="inserisci">
		</td></tr>
	</form>
	
	
	</table>
	<?php
	break;
		
	
	
	
}


?>

</body>




</html>
