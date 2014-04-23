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


$filename = "../setup/labman.sql";
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
 ?>
 
 
<script language="javascript">
alert("Creazione Database conclusa con successo!");
</script>
<?php

header ("Location: registra.php");



	
?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Installazione</title>
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
Laboratorio di Manipolazione Cellulare - Installazione

<div class="contenitore">

<!-- content start here -->
<center><h2 class="pagetitle"><font color="black">Installazione LabMan</font></h2></center>

<form method="post" action="install.php">
  <input type="hidden" name="page" value="home" />
  <table class="loginPassUpdate" width="100%" border="0" cellpadding="2" cellspacing="0">
    
    <tr><td><span class="general"><font  size="13"><strong>Host <i>(Spesso &egrave; definito Localhost)</i>:</strong></font></span></td></tr>
    <tr><td><input type="text" name="host" placeholder="Host" value="" size="30"  autofocus="autofocus" /></td></tr>
   
    <tr><td><span class="general"><font  size="13"><strong>Nome DataBase :</strong></font></span></td></tr>
    <tr><td><input type="text" name="database" placeholder="database" value="" size="30"  autofocus="autofocus" /></td></tr>
   
    <tr><td><span class="general"><font  size="13"><strong>Nome Utente :</strong></font></span></td></tr>
    <tr><td><input type="text" name="utente" placeholder="utente" value="" size="30"  autofocus="autofocus" /></td></tr>
   
	<tr><td><span class="general"><font  size="13"><strong>Password Utente :</strong></font></span></td></tr>
    <tr><td><input type="text" name="password" placeholder="password" value="" size="30"  autofocus="autofocus" /></td></tr>
   
       <tr><td><input class="submit" type="submit" name="send" value="Installa" /></td></tr>  </table>
    </form>
   
    </div> 
</body>




</html>
