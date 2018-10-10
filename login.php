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



	$result= "";

if($_POST['send'] == 'login'){
$user = $_POST['user'];	
$pass = $_POST['pass'];	
	$s= $link->query("SELECT * FROM user WHERE user like '$user' and pass = '$pass'") or die(mysqli_error($link));
	$row = $s->num_rows;
	$rr = mysqli_fetch_array($s);
	
	if($row >0){
?>
			<script language="javascript">
			alert("ok!");
			</script>
			
			<?php
	session_start();
		$_SESSION['login'] = $user;
		$admin=$_SESSION['admin'];
		$login=$_SESSION['login'];
	header('location: home.php');
}else{
		
		
			?>
			<script language="javascript">
			alert("Username o Password Errati!");
			</script>
			
			<?php

	}
	
}
	
	

?>


<!DOCTYPE html> 
<html>
<head>
	<title><?= $titolo?></title>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- Latest compiled and minified CSS table-bootstrap-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">


<!-- datatoggle-->

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<script>
$(document).ready(function() {

    $('#tabella').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });


 

});
</script>
<style>
<!--

html,
body {
  height: 100%;

}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

-->
</style>


</head>



<body class="text-center">



<form method="post" action="login.php" class="form-signin">
	        <img class="mb-4" src="hlab.png" alt="" width="92" height="92">
 <h1 class="h3 mb-3 font-weight-normal">Accesso Utenti</h1>

  <input type="hidden" name="page" value="home" />
	        <label for="inputEmail" class="sr-only">Utente</label>
      <input type="text" id="inputEmail" class="form-control" name="user" placeholder="Nome Utente" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>   
  <input class="btn btn-lg btn-primary btn-block" type="submit" name="send" value="login" />
         <p class="mt-5 mb-3 text-muted"><center><a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licenza Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">HLab</span> di <a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/Thorwald89/LabMan" property="cc:attributionName" rel="cc:attributionURL">https://github.com/Thorwald89/LabMan</a> &eacute; distribuito con Licenza <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribuzione - Condividi allo stesso modo 4.0 Internazionale</a>.
</p>
</body>




</html>
