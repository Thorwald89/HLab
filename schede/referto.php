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


	<table class="table">


		<form method="POST" action="referto.php">
		<thead>
		<tr><th colspan="8" style="text-align: center;"><h2>Probando</h2></th></tr>
		</thead>
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



<?php
	
	include($navigazione_http."foot.php");
	?> 
