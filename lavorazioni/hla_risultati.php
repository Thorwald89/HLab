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


	$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
	
$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];

$navigazione_http="../";

if($send =="inserisci"){
	
	$s=$link->query("insert into esami (id_campione, locus_a, locus_b, locus_c, locus_dr, locus_dqa, locus_dqb, locus_dp, operatore, data_test) values ('".$_POST['id_campione']."', '".$_POST['locus_a']."', '".$_POST['locus_b']."', '".$_POST['locus_c']."', '".$_POST['locus_dr']."', '".$_POST['locus_dqa']."', '".$_POST['locus_dqb']."', '".$_POST['locus_dp']."', '".$_POST['operatore']."',NOW()) ") or die(mysqli_error($link)); 
	echo "inserimento effettuato";
}




	include($navigazione_http."head.php");

switch($pos){
	
	default:
	?>
<div class="container">
  <div class="row"> 
    <div class="col-lg">
	<table id="tabella" class="table table-sm table-hover">
		
		<thead>
		<tr><td colspan="15" align="center"><h2><center>Lista Esami Effettuati	</h2></td></tr>
		
	<tr>	
	<th scope="col"><strong>ID Campione</strong></th>
	<th scope="col"><strong>Cognome</strong></th>
	<th scope="col"><strong>Nome</strong></th>
	<th scope="col"><strong>Locus A</strong></th>
	<th scope="col"><strong>Locus B</strong></th>
	<th scope="col"><strong>Locus C</strong></th>
	<th scope="col"><strong>Locus DRB</strong></th>
	<th scope="col"><strong>Locus DQA1</strong></th>
	<th scope="col"><strong>Locus DQB</strong></th>
	<th scope="col"><strong>Locus DPB1</strong></th>
	<th scope="col"><strong>Data Esecuzione Test</strong></th>
	<th scope="col"><strong>Operatore</strong></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$s= $link->query("select * from esami order by data_test") or die('1');
	while($r =mysqli_fetch_array($s)){
		
		$data = date_create($r['data_test']);


		?>
		<tr>	
	<td><a href="referto.php?id=<?=$r['id_campione'];?>"><?=ucfirst($r['id_campione'])?></a></td>
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
	</tbody>
	
	</table>
	
		</div>
	</div>
</div>
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


	include($navigazione_http."foot.php");
	?>
