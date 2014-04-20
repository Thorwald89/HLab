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

$login = $_SESSION['login']; 

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];


?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Version</title>
<link rel="stylesheet" href="stile.css" />

<style type="text/css">
	<!--
body {
background-color: white;

    }
-->
</style></head>




<body>
Laboratorio di Manipolazione Cellulare - Version

<br><br>

<hr>
<h4>0.7 Beta</h4>
<ul>
<li>Aggiunto file indicante Versione</li>
<li>Aggiunto Comando di configurazione Utente</li>
<li>Aggiunto file Installazione</li>
<li>I TRE file sono da MIGLIORARE</li>

</ul>
</body>




</html>
