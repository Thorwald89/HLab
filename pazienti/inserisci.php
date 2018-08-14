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
	
	case 'probando':
	
	
	?>	
	
		

		<form method="POST" action="inserisci.php">


		
<div id="probando">
	<div class="container">
		<div class="form-row">
			<div class="form-group col-lg-3">
						<center><label for="id_famiglia"><h3>Codice Famiglia</h3></label>
						<input type="text" class="form-control" name="id_famiglia" id="id_famiglia" placeholder="ID Famiglia" ></center>
			</div>
		
		</div>		
		<div class="form-row">
			<div class="form-group col-md-3">
					<input type="radio" name="tipo" value="DEP" id="tipo">DEP - <input type="radio" name="tipo" value="EST" id="tipo">EST - <input type="radio" name="tipo" value="CQ" id="tipo">CQ			
			</div>
		    <div class="form-group col-md-3">
      <label for="impegnativa">Impegnativa</label>
<input type="radio" name="impegnativa" value="SI" id="impegnativa">SI - <input type="radio" name="impegnativa" value="NO" id="impegnativa">NO    
  </div>
		</div>
		
		
		
		
		
  <div class="row"> 
    <div class="col-lg">
<center><h3>Probando</h3></center>
 <div class="form-row">
    <div class="form-group col-sm-6">
      <label for="nome_d">Nome</label>
      <input type="text" class="form-control" name="nome_d" id="nome_d" placeholder="Nome">
    </div>
    <div class="form-group col-sm-6">
      <label for="cognome_d">Cognome</label>
      <input type="text" class="form-control" name="cognome_d" id="cognome_d" placeholder="Cognome">
    </div>
  
  <div class="form-group col-sm-6">
    <label for="barcode_d">Barcode</label>
    <input type="text" class="form-control" name="barcode_d" id="barcode_d" placeholder="Barcode">
  </div> 
    <div class="form-group col-md-6">
      <label for="nascita_d">Nascita</label>
      <input type="date" class="form-control" name="nascita_d" id="nascita_d">
    </div>
  <div class="form-group col-sm-6">
    <label for="inputAddress2">Telefono</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="333 33 33 333">
  </div>
</div>
 <div class="form-row">
    <div class="form-group col-md-3">
      <label for="prelievo">Sede Prelievo</label>
		<input id="prelievo" class="form-control" type="text" name="prelievo">
    </div>
    <div class="form-group col-md-3">
      <label for="patologia">Patologia</label>
		<input id="patologia" class="form-control" type="text" name="patologia">
    </div>
    <div class="form-group col-md-3">
      <label for="arrivo">Data di Arrivo</label>
		<input id="arrivo" class="form-control" type="date" name="arrivo">
    </div>

 

</div>


</div></div></div>


<input type="hidden" name="tipologia" value="probando">

	<center><input type="submit" name="send" value="Inserisci"></center>


	</div>
	</form>
	<?php
	break;
	
	case 'familiare':
	
	
	$q = $link ->query("SELECT id_famiglia FROM schede ORDER BY id_famiglia DESC") or die(mysqli_error($link));
	$r = mysqli_fetch_array($q);
		?>

<div id="principale">
				
			
		<form method="POST" action="inserisci.php">


		
<div id="familiare">
	<div class="container">
		<div class="form-row">
			<div class="form-group col-lg-3">
						<center><label for="id_famiglia"><h3>Codice Famiglia</h3></label>
						<input type="text" class="form-control" name="id_famiglia" id="id_famiglia" placeholder="ID Famiglia" value="<?= $r['id_famiglia'] ?>"></center>
			</div>		
		</div>			
	
		
		
		
		
  <div class="row"> 
    <div class="col-lg">
<center><h3>Familiare</h3></center>
 <div class="form-row">
    <div class="form-group col-sm-6">
      <label for="nome_f">Nome</label>
      <input type="text" class="form-control" name="nome_f" id="nome_f" placeholder="Nome">
    </div>
    <div class="form-group col-sm-6">
      <label for="cognome_f">Cognome</label>
      <input type="text" class="form-control" name="cognome_f" id="cognome_f" placeholder="Cognome">
    </div>
  
  <div class="form-group col-sm-6">
    <label for="barcode_f">Barcode</label>
    <input type="text" class="form-control" name="barcode_f" id="barcode_f" placeholder="Barcode">
  </div> 
    <div class="form-group col-md-6">
      <label for="nascita_f">Nascita</label>
      <input type="date" class="form-control" name="nascita_f" id="nascita_f">
    </div>
      <div class="form-group col-md-3">
      <label for="prelievo_f">Sede Prelievo</label>
		<input id="prelievo_f" class="form-control" type="text" name="prelievo_f">
    </div>
    <div class="form-group col-md-6">
      <label for="grado">Parentela</label>
		<select class="form-control" name="grado" id="grado">
		<option value="madre">Madre</option>
		<option value="padre">Padre</option>
		<option value="f1">Fratello 1</option>
		<option value="f2">Fratello 2</option>
		<option value="f3">Fratello 3</option>
		<option value="f4">Fratello 4</option>
		<option value="f5">Fratello 5</option>
		<option value="f6">Fratello 6</option>
		<option value="f7">Fratello 7</option>
		<option value="f8">Fratello 8</option>

		</select>
    </div>
 
</div>



</div></div></div>

<input type="hidden" name="tipologia" value="familiare">



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
