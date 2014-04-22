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

$login = $_SESSION['login']; 

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];

if($send =='Registra')
{
$s = mysql_query("insert into user(user, pass, other) values ('".$_POST['user']."','".md5($_POST['pass'])."', 'admin')") or die (mysql_error());


header("Location: ../login.php");
}	
?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Registra Admin</title>

<link rel="stylesheet" href="../stile.css" />

<style>
<!--
body{

background-image: url('../img/sfondo.png');


}
.contenitore{
position: absolute;
left: 300px;
top: 200px;
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
Laboratorio di Manipolazione Cellulare - Registra Admin

<form method="post" action="reg_admin.php">
user:<input type="text" name="user" >
pass:<input type= "password" name="pass">
<input type="submit" name="send" value="Registra">
</form>
</body>




</html>
