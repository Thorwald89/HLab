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

			if($_POST['a_lr'] != '')$a_lr = $_POST['a_lr'].",";
			if($_POST['b_lr'] != '')$b_lr = $_POST['b_lr'].",";
			if($_POST['c_lr'] != '')$c_lr = $_POST['c_lr'].",";
			if($_POST['dr_lr'] != '')$dr_lr = $_POST['dr_lr'].",";
			if($_POST['dq_lr'] != '')$dq_lr = $_POST['dq_lr'].",";
			if($_POST['a1_hr'] != '0')$a1_hr = "A".$_POST['a1_hr'].","; 
			if($_POST['a2_hr'] != '0')$a2_hr = "A".$_POST['a2_hr'].",";
			if($_POST['b1_hr'] != '0')$b1_hr = "B".$_POST['b1_hr'].",";
			if($_POST['b2_hr'] != '0')$b2_hr = "B".$_POST['b2_hr'].",";
			if($_POST['c1_hr'] != '0')$c1_hr = "C".$_POST['c1_hr'].",";
			if($_POST['c2_hr'] != '0')$c2_hr = "C".$_POST['c2_hr'].",";
			if($_POST['dr1_hr'] != '0')$dr1_hr = "DR".$_POST['dr1_hr'].",";
			if($_POST['dr2_hr'] != '0')$dr2_hr = "DR".$_POST['dr2_hr'].",";
			if($_POST['dqa1_hr'] != '0')$dqa1_hr = "DQA".$_POST['dqa1_hr'].",";
			if($_POST['dqa2_hr'] != '0')$dqa2_hr = "DQA".$_POST['dqa2_hr'].",";
			if($_POST['dqb1_hr'] != '0')$dqb1_hr = "DQB".$_POST['dqb1_hr'].",";
			if($_POST['dqb2_hr'] != '0')$dqb2_hr = "DQB".$_POST['dqb2_hr'].",";
			if($_POST['dp1_hr'] != '0')$dp1_hr = "DP".$_POST['dp1_hr'].",";
			if($_POST['dp2_hr'] != '0')$dp2_hr = "DP".$_POST['dp2_hr'];

				$array_locus = $a_lr."".$b_lr."".$c_lr."".$dr_lr."".$dq_lr."".$a1_hr."".$a2_hr."".$b1_hr."".$b2_hr."".$c1_hr."".$c2_hr."".$dr1_hr."".$dr2_hr."".$dqa1_hr."".$dqa2_hr."".$dqb1_hr."".$dqb2_hr."".$dp1_hr."".$dp2_hr;
			
			$locus = array($array_locus);
			$locus = implode(',', $locus);


			if($_POST['ssp_lr'] != '')$ssp_lr = $_POST['ssp_lr'].",";
			if($_POST['ssp_hr'] != '')$ssp_hr = $_POST['ssp_hr'].",";
			if($_POST['sso'] != '')$sso = $_POST['sso'].",";
			if($_POST['sbt'] != '')$sbt = $_POST['sbt'];

				$array_metodica= $ssp_lr."".$ssp_hr."".$sso."".$sbt;

			$metodica = array($array_metodica);
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
		<tr><td colspan="15" align="center"><h2><center>Campioni NON Lavorati</h2></td></tr>
		
	<tr>	
	<th scope="col"><strong>ID Campione</strong></th>
	<th scope="col"><strong>Cognome</strong></th>
	<th scope="col"><strong>Nome</strong></th>

	<th scope="col"><strong>Operatore</strong></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$s= $link->query("select esami.*, schede.nome_d as nome, schede.cognome_d as cognome, schede.barcode from esami right join schede on esami.id_campione=schede.barcode order by id") or die('1');
	while($r =mysqli_fetch_array($s)){
		
		$data = date_create($r['data_test']);


		?>
		<tr>	
	<td><a href="inserisci.php?pos=esame&id=<?=$r['barcode'];?>"><?=ucfirst($r['barcode'])?></a></td>
	<td><?=ucfirst($r['cognome'])?></td>
	<td><?=ucfirst($r['nome'])?></td>

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



	</div>
	<?php
	break;
	
	case 'esame':
	
	
	$q = $link ->query("SELECT id_famiglia FROM schede ORDER BY id_famiglia DESC") or die(mysqli_error($link));
	$r = mysqli_fetch_array($q);
		?>

<div id="generico">
				
			
		<form method="POST" action="inserisci.php">


		
	<div class="container">
		<div class="form-row " >
			<div class="form-group col-lg-3" >
						<center><label for="id_campione"><h3>Codice</h3></label>
						<input type="text" class="form-control" name="id_campione" id="id_campione" placeholder="ID Campione" value="<?= $id ?>" readonly></center>
			</div>	
			<div class="form-group col-lg-3" >
						<center><label for="dna"><h3>Lettura DNA</h3></label>
						<input type="text" class="form-control" name="dna" id="dna" placeholder="ng/&micro;l" >ng/&micro;l</center>
			</div>		
		</div>			
	
		
		
		
		
  <div class="row"> 
    <div class="col-md">
		<h3 class="text-center">Bassa Risoluzione</h3>
		<div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="ssp_lr" id="ssp_lr" value="ssp_lr">
				<label for="ssp_lr" class="form-check-label">SSP</label>
			</div>
		</div>
		<hr>
		 <div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="a_lr" id="a_lr" value="a_lr">
				<label for="a_lr" class="form-check-label">Locus A</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="b_lr" id="b_lr" value="b_lr">
				<label for="b_lr" class="form-check-label">Locus B</label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="c_lr" id="c_lr" value="c_lr">
				<label for="c_lr" class="form-check-label">Locus C</label>
			</div>
			<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dr_lr" id="dr_lr" value="dr_lr">
				<label for="dr_lr">Locus DRB</label>
			</div>			
		</div>
		<div class="form-row">
			<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dq_lr" id="dq_lr" value="dq_lr">
				<label for="dq_lr">Locus DQB</label>
			</div>			
		</div>
	</div>
	
	
    <div class="col-md">
		<h3  class="text-center">Alta Risoluzione</h3>
		<div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="ssp_hr" id="ssp_hr" value="ssp_hr">
				<label for="ssp_hr" class="form-check-label">SSP</label>
			</div>			
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="sso" id="sso" value="sso">
				<label for="sso" class="form-check-label">SSO</label>
			</div>			
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="sbt" id="sbt" value="sbt">
				<label for="sbt" class="form-check-label">SBT</label>
			</div>
		</div>
		<hr>
		 <div class="form-row">
			<div class="form-group">
				<label for="a1_hr">Locus A<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="a1_hr" value="0" id="a_hr">
			</div>
			<div class="form-group">
				<label for="a2_hr">Locus A<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="a2_hr" value="0"id="a_hr">
			</div>
		</div>
		<div class="form-row">			
			<div class="form-group">
				<label for="b1_hr">Locus B<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="b1_hr"value="0" id="b_hr">
			</div>			
			<div class="form-group">
				<label for="b_2hr">Locus B<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="b2_hr"value="0" id="b_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="c1_hr">Locus C<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="c1_hr" value="0"id="c_hr">
			</div>			
			<div class="form-group">
				<label for="c2_hr">Locus C<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="c2_hr"value="0" id="c_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="dr1_hr">Locus DRB<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="dr1_hr"value="0" id="dr_hr">
				</div>
			<div class="form-group">
				<label for="dr2_hr">Locus DRB<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="dr2_hr" value="0"id="dr_hr">
			</div>		
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="dqa1_hr">Locus DQA<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="dqa1_hr" value="0"id="dqa_hr">
			</div>			
			<div class="form-group">
				<label for="dqa2_hr">Locus DQA<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="dqa2_hr"value="0" id="dqa_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="dqb1_hr">Locus DQB<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="dqb1_hr" value="0"id="dqb_hr">
			</div>			
			<div class="form-group">
				<label for="dqb2_hr">Locus DQB<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="dqb2_hr" value="0"id="dqb_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="dp1_hr">Locus DP<sup>1</sup></label>
				<input class="form-control form-control-sm" type="number" name="dp1_hr"value="0" id="dp_hr">
			</div>				
			<div class="form-group">
				<label for="dp2_hr">Locus DP<sup>2</sup></label>
				<input class="form-control form-control-sm" type="number" name="dp2_hr"value="0" id="dp_hr">
			</div>		
		</div>
	</div>
	



</div>
</div>
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
