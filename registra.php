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

if(isset($_POST['send'])){
	$send = $_POST['send'];
}

if($send =='registra')
{
$s = mysql_query("insert into user(user, pass) values ('".$_POST['user']."','".md5($_POST['pass'])."')") or die (mysql_error());
}	
?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Registra</title>
</head>



<body>
Laboratorio di Manipolazione Cellulare - Registra

<form method="post" action="registra.php">
user:<input type="text" name="user" >
pass:<input type= "password" name="pass">
<input type="submit" name="send" value="registra">
</form>
</body>




</html>
