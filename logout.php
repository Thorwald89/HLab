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
if($_POST['send'] == 'logout'){
	
	session_destroy();
	header("Location: index.php");
}

	
	

	
?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Logout</title>
<link rel="stylesheet" href="stile.css" />

<style>
<!--
body{

background-image: url('img/sfondo.png');


}
.contenitore{
align: center;
border: 1px;
width: 600px;
-webkit-box-shadow: 6px 6px 50px 3px #030303;
box-shadow: 6px 6px 50px 3px #030303;
}


-->
</style>
</head>



<body>
Laboratorio di Manipolazione Cellulare - Logout

<div class="contenitore">

<form method="post" action="logout.php">
  <table class="loginPassUpdate" width="100%" border="0" cellpadding="2" cellspacing="0">
   
    <tr><td><input class="submit" type="submit" name="send" value="logout" /></td></tr>  </table>
    </form>
   
    </div> 
</body>




</html>
