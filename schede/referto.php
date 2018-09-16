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
$navigazione_http="../";
	include($navigazione_http."head.php");
		$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
	
$barcode = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];






		

	


	$s=$link->query("select * from schede where barcode like '$barcode'") or die('2');
	$b=mysqli_fetch_array($s);

	$n_d = date_create($b['nascita_d']);
		?>



<div class="container">
	<div class="row"> 
		<div class="col-lg">
			<table id="tabella" class="table table-sm table-hover">		
				<tr><td colspan="5"><h2>Refertazione di <i><?=$barcode?></i></h2></td></tr>
				<form method="POST" action="referto.php">
	
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
	
    
	</div> 
	
	

</div>

 <div class="row">
	 <div class="col-xl-12">Loci
		<div class="row">
			<div class="col-md-2">Locus A</div>
			<div class="col-md-2">Locus B</div>
			<div class="col-md-2">Locus C</div>
			<div class="col-md-2">Locus DR</div>
			<div class="col-md-2">Locus DQ</div>
			<div class="col-md-2">Locus DP</div>
		</div>
	</div>
</div>


</div>


	



<?php
	
	include($navigazione_http."foot.php");
	?> 
