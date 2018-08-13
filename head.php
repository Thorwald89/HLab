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

<style>
<!--
body{

background-image: url('<?=$navigazione_http?>img/sfondo.png');


}

-->
</style>


</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light  bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=$navigazione_http?>home.php" target="centro">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$navigazione_http?>pazienti/inserisci.php" target="centro">Accettazione</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Esami
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$navigazione_http?>schede/scheda.php?user=<?=$login?>" target="centro">Scheda Paziente</a>
          <a class="dropdown-item" href="<?=$navigazione_http?>schede/hla_risultati.php?pos=inserisci&user=<?=$login?>" target="centro">Inserisci Esami</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=$navigazione_http?>schede/hla_risultati.php?user=<?=$login?>" >Refertazione</a>
        </div>
      </li>
      <?php
   if($admin =='admin'){
   ?>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Amministrazione
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$navigazione_http?>registra.php?user=<?=$login?>" target="centro">Nuovo Utente</a>
          <a class="dropdown-item" href="<?=$navigazione_http?>sversion.php" target="centro">Versione Software</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=$navigazione_http?>update.php" target="centro">Update</a>
        </div>
      </li>
         <?php
   }
  
   ?>
      <li class="nav-item">
      <a class="nav-link" href="https://github.com/Thorwald89/LabMan/wiki">?</a>
      </li>
    </ul>
      <a class="navbar-text" href="#"><?= $titolo?></a>
 <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?= $login?></b> <span class="caret"></span></a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="<?=$navigazione_http?>logout.php" target="centro">LogOut</a>
			</div>
       </li>
  </div>
</nav>
