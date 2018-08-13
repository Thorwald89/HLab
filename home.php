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
include('setup/setup.php');
session_start();



$send ="";

if(isset($_POST['send'])){
	$send = $_POST['send'];
}


if($send == 'login'){

		$s= mysqli_query($link, "select * from user where user='".$_POST['user']."' and pass='".($_POST['pass'])."'") or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);
		$controllo = mysqli_num_rows($s);

		if($controllo == 1){
			$login = $_POST['user'];
			$_SESSION['login'] = $login;

			$rr = mysqli_fetch_array($s);
			$admin= $rr['other'];
			$_SESSION['admin'] = $admin;

		


		}else{
header("Location: login.php?result=errore");
		}
	}
	
	
	
	
	include("head.php");
	
	?>



<div class="container">
  <div class="row justify-content-between">
	  
	  
   
    <div class="col">
		<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="indice.php" id="centro" name="centro"></iframe>
</div>
    </div>
 
    
  </div>
</div>



<?php
	
	include("foot.php");
	?>
