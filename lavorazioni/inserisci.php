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
		
		// inserisco i dati nel db schede per il probando


		if($_POST['tipologia'] == 'probando'){
		$s= $link->query("INSERT INTO schede (`nome_d`, `cognome_d`, `nascita_d`, `telefono`, `id_famiglia`, `patologia`, `barcode`) values ('".$_POST['nome_d']."', '".$_POST['cognome_d']."','".$_POST['nascita_d']."','".$_POST['telefono']."','".$_POST['id_famiglia']."','".$_POST['patologia']."','".$_POST['barcode_d']."') ") or die('1');		
		?>
<script language="javascript">
alert("Inserimento "<?=$_POST['tipologia']?>" effettuato.");
</script>
<?php
	}
		// inserisco i dati nel db schede per i familiari
		if($_POST['tipologia'] == 'familiare'){


		$s= $link->query("INSERT INTO famiglie (`nome`, `cognome`, `nascita`, `id_famiglia`, `grado`, `prelievo`, `arrivo`, `barcode`) values ('".$_POST['nome_f']."', '".$_POST['cognome_f']."','".$_POST['nascita_f']."','".$_POST['id_famiglia']."','".$_POST['grado']."','".$_POST['prelievo_f']."',NOW(), '".$_POST['barcode_f']."') ") or die(mysqli_error($link));
?>
<script language="javascript">
alert("Inserimento "<?=$_POST['tipologia']?>" effettuato.");
</script>
<?php
	}

		


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
		</div>			
	
		
		
		
		
  <div class="row"> 
    <div class="col-md">
		<h3 class="text-center">Bassa Risoluzione</h3>
		 <div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="a_lr" id="a_lr">
				<label for="a_lr" class="form-check-label">Locus A</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="b_lr" id="b_lr">
				<label for="b_lr" class="form-check-label">Locus B</label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="c_lr" id="c_lr">
				<label for="c_lr" class="form-check-label">Locus C</label>
			</div>
			<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dr_lr" id="dr_lr">
				<label for="dr_lr">Locus DRB</label>
			</div>			
		</div>
	</div>
	
	
    <div class="col-md">
		<h3  class="text-center">Alta Risoluzione</h3>
		 <div class="form-row">
			<div class="form-group">
				<div class="form-check">
				<input type="checkbox" class="form-check-input" name="a_hr" id="a_hr">
				<label for="a_hr" class="form-check-label">Locus A<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="a_hr" id="a_hr">
			</div>
			<div class="form-group">
				<div class="form-check">
				<input type="checkbox" class="form-check-input" name="a_hr" id="a_hr">
				<label for="a_hr" class="form-check-label">Locus A<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="a_hr" id="a_hr">
			</div>
		</div>
		<div class="form-row">			
			<div class="form-group">
				<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="b_hr" id="b_hr">
				<label for="b_hr" class="form-check-label">Locus B<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="b_hr" id="b_hr">
			</div>			
			<div class="form-group">
				<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="b_hr" id="b_hr">
				<label for="b_hr" class="form-check-label">Locus B<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="b_hr" id="b_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="c_hr" id="c_hr">
				<label for="c_hr" class="form-check-label">Locus C<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="c_hr" id="c_hr">
			</div>			
			<div class="form-group">
				<div class="form-check">
				<input type="checkbox" class="form-check-input"  name="c_hr" id="c_hr">
				<label for="c_hr" class="form-check-label">Locus C<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="c_hr" id="c_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dr_hr" id="dr_hr">
				<label for="dr_hr">Locus DRB<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dr_hr" id="dr_hr">
			</div>			
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dr_hr" id="dr_hr">
				<label for="dr_hr">Locus DRB<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dr_hr" id="dr_hr">
			</div>		
		</div>
		<div class="form-row">
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dqa_hr" id="dqa_hr">
				<label for="dqa_hr">Locus DQA<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dqa_hr" id="dqa_hr">
			</div>			
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dqa_hr" id="dqa_hr">
				<label for="dqa_hr">Locus DQA<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dqa_hr" id="dqa_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dqb_hr" id="dqb_hr">
				<label for="dqb_hr">Locus DQB<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dqb_hr" id="dqb_hr">
			</div>			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dqb_hr" id="dqb_hr">
				<label for="dqb_hr">Locus DQB<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dqb_hr" id="dqb_hr">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dp_hr" id="dp_hr">
				<label for="dp_hr">Locus DP<sup>1</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dp_hr" id="dp_hr">
			</div>				
			<div class="form-group">
				<div class="form-check" class="form-check-label">
				<input type="checkbox" class="form-check-input"  name="dp_hr" id="dp_hr">
				<label for="dp_hr">Locus DP<sup>2</sup></label>
				</div>
				<input class="form-control form-control-sm" type="number" name="dp_hr" id="dp_hr">
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
