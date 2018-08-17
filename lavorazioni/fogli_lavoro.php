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
	
$navigazione_http="../";

	include($navigazione_http."head.php");

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
		
		// inserisco i dati nel db fogli_lavoro per il probando


		
			
			$locus = array($_POST['a_lr'],$_POST['b_lr'],$_POST['c_lr'],$_POST['dr_lr'],$_POST['dq_lr'],"A".$_POST['a1_hr'],"A".$_POST['a2_hr'],"B".$_POST['b1_hr'],"B".$_POST['b2_hr'],"C".$_POST['c1_hr'],"C".$_POST['c2_hr'],"DR".$_POST['dr1_hr'],"DR".$_POST['dr2_hr'],"DQA".$_POST['dqa1_hr'],"DQA".$_POST['dqa2_hr'],"DQB".$_POST['dqb1_hr'],"DQB".$_POST['dqb2_hr'],"DP".$_POST['dp1_hr'],"DP".$_POST['dp2_hr']);
			$locus = implode(',', $locus);

			$metodica = array($_POST['ssp_lr'], $_POST['ssp_hr'], $_POST['sso'], $_POST['sbt']);
			$metodica = implode(',', $metodica);
			
			
		$s= $link->query("INSERT INTO fogli_lavoro (`id_campione`, `locus`, `metodica`) values ('".$_POST['id_campione']."', '$locus','$metodica') ") or die(mysqli_error($link));		
		?>
<script language="javascript">
alert("Inserimento effettuato.");
</script>
<?php
	
	

		


}


?>


<body>
		<?php
switch($pos){
	
	default:
	
	
	?>	
	
<div class="container">
  <div class="row"> 
    <div class="col-lg">
	<table id="tabella" class="table table-sm table-hover">
		
		<thead>
		<tr><td colspan="15" align="center"><h2><center>Campioni SENZA Esami	</h2></td></tr>
		
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
	<td><a href="fogli_lavoro.php?pos=lavorazione&id=<?=$r['id_campione'];?>"><?=ucfirst($r['id_campione'])?></a></td>


	</tr>
		<?php
	}
	?>
	</tbody>
	
	</table>
	
		</div>
	</div>
</div>



	</div>
	<?php
	break;
	
	case 'lavorazione':
	
	
	$q = $link ->query("select fogli_lavoro.* from fogli_lavoro where id_campione = '$id' ") or die(mysqli_error($link));
		?>

<div id="generico">
				
			
		<form method="POST" action="fogli_lavoro.php">


		
	<div class="container">
		<table id="tabella_foglio_lavoro" class="table table-sm table-hover">
			<thead>
				<tr>	
					<th scope="col"><strong>ID Campione</strong></th>
					<th scope="col"><strong>Locus</strong></th>
					<th scope="col"><strong>Metodica</strong></th>
				</tr>
			</thead>
			
			<tbody>
				
				<?php
				while($r = mysqli_fetch_array($q))
				{
					$locus = $r['locus'];
					$metodica = $r['metodica'];
				
				?>
				<tr>	
					<td scope="col"><strong><?= $id ?></strong></td>
				</tr>			
				<?php
					$locus = explode(',',$locus);
					$metodica = explode(',',$locus);
						foreach($locus as $locus ) {
        
				?>
				<tr>
					<td></td>	
					<td scope="col"><strong><?= $locus ?></strong></td>
				</tr>			
				<?php
					}
				}
				?>
			</tbody>
		</table>

</div>




	</div>
	
	<center><input type="submit" name="send" value="Inserisci"></center>

</form>
</div>

<?php
	break;
	
}
	?>

	</form>
<?php
	include($navigazione_http."foot.php");
?>
