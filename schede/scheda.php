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
		<tr><td colspan="8" style="text-align: center;"><h2><center>Cerca Paziente</h2></td></tr>
		<form method="post" action="scheda.php?pos=scheda&user=<?=$login?>">
	<tr><td>Nome Donatore</td>
	<td><input type="text" name="nome_d"></td>
	<td>Cognome Donatore</td>
	<td><input type="text" name="cognome_d"></td>
	</tr>
	<tr><td>Nome Ricevente</td>
	<td><input type="text" name="nome_r"></td>
	<td>Cognome Ricevente</td>
	<td><input type="text" name="cognome_r"></td>
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
	<tr>
	<td>Nome Ricevente</td>
	<td>Cognome Ricevente</td>
	<td>Data di Nascita Ricevente</td>

	</tr>

	<?php
	$s=mysql_query("select * from schede where nome_d like '".$_POST['nome_d']."' or cognome_d like '".$_POST['cognome_d']."' or nome_r like '".$_POST['nome_r']."' or cognome_r like '".$_POST['cognome_r']."' order by cognome_d") or die(mysql_error());
	while($b=mysql_fetch_array($s)){

	?>

	<tr>

	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['nome_r'];?></a></td>
	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['cognome_r'];?></a></td>
	<td><a href="scheda.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['nascita_r'];?></a></td>

	</tr>

	<?php
	}

}

	?></table>

	<?php
	if($_GET['id'] !=0){
	$s=mysql_query("select * from schede where id = '".$_GET['id']."'") or die(mysql_error());
	$b=mysql_fetch_array($s);

	$n_d = date_create($b['nascita_d']);
	$n_r = date_create($b['nascita_r']);
		?>


	<table>


		<form method="POST" action="../setup/pdf2/create_result_CSE.php">

		<tr><td colspan="8" style="text-align: center;"><h2>Scheda Paziente</h2></td></tr>

		<tr  style="text-align: center;">
			<td colspan="2" style="text-align: center;"><center><h3>Donatore</h3></center></td>
			<td colspan="2" style="text-align: center;"><center><h3>Ricevente</h3></center></td>

		</tr>

	<tr><td>Nome Donatore</td>
	<td><?=$b['nome_d'];?></td>
	<td>Nome Ricevente</td>
	<td><?=$b['nome_r'];?></td>
	</tr>

	<tr><td>Cognome Donatore</td>
	<td><?=$b['cognome_d'];?></td>
	<td>Cognome Ricevente</td>
	<td><?=$b['cognome_r'];?></td>

		</tr>

	<tr><td>Nascita Donatore</td>
	<td><?=date_format($n_d, 'd/m/Y')?></td>
	<td>Nascita Ricevente</td>
	<td><?=date_format($n_r, 'd/m/Y')?></td>
	</tr>


	<tr><td>Telefono</td>
	<td><?=$b['telefono'];?></td>
	<td>Peso</td>
	<td><?=$b['peso'];?> Kg</td></tr>


	<tr  style="text-align: center;">
	<td colspan="2" style="text-align: center;"><h3>Parametri</h3></td>
	<td colspan="2" style="text-align: center;"><h3>Aliquote</h3></td>

		</tr>

	<tr>
	<td>Deplasmazione</td>
	<td><?=$b['deplasmazione']?></td>
	<td>Aliquota 1</td>
	<td><?=$b['al1']?>mL</td>
	</tr><tr>
	<td>Procedura</td>
	<td><?=$b['procedura']?></td>
	<td>Aliquota 2</td>
	<td><?=$b['al2']?>mL</td>
	</tr><tr>
	<td>Vol. Raccolta</td>
	<td><?=$b['vol']?>mL</td>
	<td>Aliquota 3</td>
	<td><?=$b['al3']?>mL</td>
	</tr><tr>
	<td>Vol. Scarto</td>
	<td><?=$b['scarto']?>mL</td>
	<td>Aliquota 4</td>
	<td><?=$b['al4']?>mL</td>
	</tr><tr>
	<td>Vol. Finale</td>
	<td><?=$b['finale']?>mL</td>
	<td>Aliquota 5</td>
	<td><?=$b['al5']?>mL</td>
	</tr><tr>
	<td>Data Congelamento</td>
	<td><?=$b['data_congelamento']?></td>
	<td>Aliquota 6</td>
	<td><?=$b['al6']?>mL</td>
	</tr><tr>
	<td>Data Raccolta</td>
	<td><?=$b['data_raccolta']?></td>
	</tr>



	<tr  align="center">
			<td colspan="4" align="center"><center><h3>Dati Pre-Raccolta</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <?=$b['wbc-pre']?>&mu;L</td>
	<td><strong>CD34 %</strong>  <?=$b['cd34-pre-perc']?>%</td>
	<td><strong>CD34/&mu;L</strong>  <?=$b['cd34_pre_micro']?>&mu;L</td>

</tr>
	<tr  align="center">
			<td colspan="4" align="center"><center><h3>Dati Raccolta</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <?=$b['wbc-racc']?>&mu;L</td>
	<td><strong>CD34 %</strong>  <?=$b['cd34_racc_perc']?>%</td>
	<td><strong>CD34/&mu;L</strong>  <?=$b['cd34_racc_micro']?>&mu;L</td>

</tr>

	<tr  align="center">
			<td colspan="4" align="center"><center><h3>Dati Post-Raccolta</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <?=$b['wbc-post']?>&mu;L</td>
	<td><strong>CD34 %</strong>  <?=$b['cd34_post_perc']?>%</td>
	<td><strong>CD34/&mu;L</strong>  <?=$b['cd34_post_micro']?>&mu;L</td>

</tr>

	<tr  align="center">
			<td colspan="4" align="center"><center><h3>Dati Deplasmazione</h3></center></td>
		</tr>
	<tr>
	<td><strong>WBC/&mu;L</strong> <?=$b['wbc-depl']?>&mu;L</td>
	<td><strong>CD34 %</strong>  <?=$b['cd34_depl_perc']?>%</td>
	<td><strong>CD34/&mu;L</strong>  <?=$b['cd34_depl_micro']?>&mu;L</td>

</tr>

<tr  align="center">
			<td colspan="4" align="center"><center><h3>Monitoraggio CD34</h3></center></td>
		</tr>

	<tr>
				<td><b></b></td>

		<td><strong>Data</strong></td>
		<td><strong>WBC</strong></td>
		<td><strong>CD34 %</strong></td>
		<td><strong>CD34/&mu;L</strong></td>

		</tr>
<tr>
	<?php
	$m1 =date_create($b['data_monitoraggio1']);
	$m2 =date_create($b['data_monitoraggio2']);
	$m3 =date_create($b['data_monitoraggio3']);
	$m4 =date_create($b['data_monitoraggio4']);


	?>
	<td><b>1</b></td>
	<td><?=date_format($m1, 'd/m/Y')?></td>
	<td><?=$b['wbc_monitoraggio1']?></td>
	<td><?=$b['cd34_perc_monitoraggio1']?></td>
	<td><?=$b['cd34_micro_monitoraggio1']?></td>

	</tr>
<tr>
	<td><b>2</b></td>
	<td><?=date_format($m2, 'd/m/Y')?></td>
	<td><?=$b['wbc_monitoraggio2']?></td>
	<td><?=$b['cd34_perc_monitoraggio2']?></td>
	<td><?=$b['cd34_micro_monitoraggio2']?></td>

	</tr>
<tr>
	<td><b>3</b></td>
	<td><?=date_format($m3, 'd/m/Y')?></td>
	<td><?=$b['wbc_monitoraggio3']?></td>
	<td><?=$b['cd34_perc_monitoraggio3']?></td>
	<td><?=$b['cd34_micro_monitoraggio3']?></td>

	</tr>
<tr>
	<td><b>4</b></td>
	<td><?=date_format($m4, 'd/m/Y')?></td>
	<td><?=$b['wbc_monitoraggio4']?></td>
	<td><?=$b['cd34_perc_monitoraggio4']?></td>
	<td><?=$b['cd34_micro_monitoraggio4']?></td>

	</tr>
<tr  align="center">
			<td colspan="4" align="center"><center><h3>Prodotti</h3></center></td>
		</tr>
	<tr><td></td><td colspan="4" style="align: center;"><strong>Lotto Sacche</strong>: <?=$b['lotto_sacche']?></td></tr>

	<tr><td></td><td><strong>Lotto Albumina</strong>: <?=$b['lotto_albumina']?></td>
	<td><strong>Lotto DMSO</strong>: <?=$b['lotto_DMSO']?></td></tr>

	<tr><td></td><td><strong>Lotto Siringhe</strong>: <?=$b['lotto_siringhe']?></td>
	<td><strong>Lotto Rubinetti</strong>: <?=$b['lotto_rubinetti']?></td></tr>

	<tr><td></td><td><strong>Lotto Anti &gamma;&gamma;</strong>: <?=$b['lotto_antigamma']?></td>
	<td><strong>Lotto Anti CD34</strong>: <?=$b['lotto_cd34']?></td></tr>

	<input type="hidden" name ="id" value="<?=$b['id'];?>">

	<tr><td colspan="8" style="text-align: center;"><input type="submit" name="send" value="Esporta"></td></tr>
	</form>
	</table>
	<?php
		}
	break;


}


?>

</body>




</html>
