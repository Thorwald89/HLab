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
include('../setup/function.php');
session_start();


	$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
	
$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];

$navigazione_http="../";

if($send =="inserisci"){
	

		$id_campione = $_POST['id_campione'];
	//controllo l'esistenza di un vecchio inserimento
	if($c = $link ->query("select * from esami where id_campione like '$id_campione'") or die(mysqli_error($link)))
	{
		
		//inserisco barcode e risultati in esami
		
			
			$s=$link->query("update esami set locus_a ='".$_POST['locus_a']."', locus_b ='".$_POST['locus_b']."', locus_c = '".$_POST['locus_c']."', locus_dr = '".$_POST['locus_dr']."', locus_dqa = '".$_POST['locus_dqa']."', locus_dqb = '".$_POST['locus_dqb']."', locus_dp = '".$_POST['locus_dp']."', operatore = '".$_POST['operatore']."', data_test = NOW() where id_campione = '$id_campione' ") or die(mysqli_error($link)); 

	}else{
		//inserisco barcode e risultati in esami
		
			
			$s=$link->query("insert into esami (id_campione, locus_a, locus_b, locus_c, locus_dr, locus_dqa, locus_dqb, locus_dp, operatore, data_test) values ('".$_POST['id_campione']."', '".$_POST['locus_a']."', '".$_POST['locus_b']."', '".$_POST['locus_c']."', '".$_POST['locus_dr']."', '".$_POST['locus_dqa']."', '".$_POST['locus_dqb']."', '".$_POST['locus_dp']."', '".$_POST['operatore']."',NOW()) ") or die(mysqli_error($link)); 

	}
	
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Inserimento Effettuato!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php


		
	
	
	





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
		<tr><td colspan="15" align="center"><h2><center>Flussi di Lavoro</h2></td></tr>
		
	<tr>	
	<th scope="col"><strong>ID Campione</strong></th>


	</tr>
	</thead>
	<tbody>
	<?php
	$s= $link->query("select fogli_lavoro.* from fogli_lavoro order by id") or die('1');
	while($r =mysqli_fetch_array($s)){
		


		?>
		<tr>	
	<td><a href="hla_risultati.php?pos=inserisci&id=<?=$r['id_campione'];?>"><?=ucfirst($r['id_campione'])?></a></td>


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
<div class="container">
  <div class="row"> 
    <div class="col-lg">
	<table id="tabella" class="table table-sm table-hover">		
		<tr><td colspan="5"><h2>Inserisci Risultati Test</h2></td></tr>
		<form method="post" action="hla_risultati.php?user=<?=$login?>">
			<tr>
	<td>Data Test</td><td>Autoimpostato</td>
	</tr>
	<tr>
	<td>ID Campione</td><td><input type="text" name="id_campione"readonly value="<?=$id?>"></td>
	</tr>
		
			<?php
	$s= $link->query("select fogli_lavoro.*, esami.locus_a,esami.locus_b,esami.locus_c,esami.locus_dr,esami.locus_dqa,esami.locus_dqb,esami.locus_dp from fogli_lavoro right join esami on fogli_lavoro.id_campione=esami.id_campione where fogli_lavoro.id_campione ='$id'") or die('1');
	while($r =mysqli_fetch_array($s))
		{
				$locus = $r['locus'];
				$locus = explode(',',$locus);
				//	$metodica = explode(',',$metodica);
				
		?>

	<?php
			foreach($locus as &$value )
        {
        


				$value2 = substr(strtolower($value), 0, 1);
				if($value2 == 'd')
				{
					$value2 = substr(strtolower($value), 0, 2);
						
						if($value2 == 'dq')
						{
							$value2 = substr(strtolower($value), 0, 3);
								if($value2 == 'dq_')
								{
									$value2 ='dqb';
								}
						}	
				}
				
			switch($value2)
			{
				default:
				$temp_locus ='';
				break;
				case 'a':
				$temp_locus = $r['locus_a'];
				break;				
				case 'b':
				$temp_locus = $r['locus_b'];
				break;				
				case 'c':
				$temp_locus = $r['locus_c'];
				break;				
				case 'dr':
				$temp_locus = $r['locus_dr'];
				break;				
				case 'dqa':
				$temp_locus = $r['locus_dqa'];
				break;				
				case 'dqb':
				$temp_locus = $r['locus_dqb'];
				break;				
				case 'dp':
				$temp_locus = $r['locus_dp'];
				break;
			}
				?>
				<tr>
					<td scope="col"><strong><?= $value2 ?></strong></td><td><input type="text" name="locus_<?= $value2 ?>"value="<?= $temp_locus ?>"></td>
				</tr>			
				<?php
				}	}

			?>
	<tr><td align="center" colspan="6">
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="inserisci">
		</td></tr>
	</form>
	
	
	</table>
		</div>
	</div>
</div>
	<?php
	break;
		
	
	
	
}


	include($navigazione_http."foot.php");
	?>
