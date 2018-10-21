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


include($navigazione_http."setup/setup.php");
	 session_start();

include($navigazione_http."setup/setup.php");
include('setup/setup.php');


	$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



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


 $("select#sample").on("change",function(){  
        var campione = $("#sample").val();  
        $.ajax({  
          type: "GET",
          url: "/fogli_lavoro.php",  
          data: "campione=" + campione + ,
          dataType: "html",
          success: function(risposta) {  
				alert("ok"); 
				         },
          error: function(){
            alert("Chiamata fallita!!!");
          } 
        }); 
        return false;  
      });

});
</script>
<style>
<!--
body{

background-image: url('<?=$navigazione_http?>img/sfondo.png');
}
table#tabella {
    border-collapse: collapse;   
}
#tabella tr {
    background-color: #eee;
    border-top: 1px solid #fff;
}
#tabella tbody tr:hover {
    background-color: #ccc;
}
#tabella th, .row {
    background-color: #fff;
}
#tabella th, #tabella td {
    padding: 3px 5px;
}
#tabella td:hover {
    cursor: pointer;
}
#tabella a {
    style: none;
}
#probando .container{
    background-color: #fff;

}
#familiare .container{
    background-color: #fff;

}
#generico .container{
    background-color: #fff;
 
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
        <a class="nav-link" href="<?=$navigazione_http?>home.php" >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accettazione</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="<?=$navigazione_http?>pazienti/inserisci.php?pos=probando" >Inserisci Probando</a>
		<a class="dropdown-item" href="<?=$navigazione_http?>pazienti/inserisci.php?pos=familiare" >Inserisci Familiare</a>
		</div>
      </li>  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Campioni
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$navigazione_http?>lavorazioni/inserisci.php?user=<?=$login?>" >Prenota Esame</a>
          <a class="dropdown-item" href="<?=$navigazione_http?>lavorazioni/fogli_lavoro.php?pos=inserisci&user=<?=$login?>" >Fogli di Lavoro</a>
          <a class="dropdown-item" href="<?=$navigazione_http?>lavorazioni/fogli_lavoro.php?pos=pendenti&user=<?=$login?>" >Esami Pendenti</a>
          <a class="dropdown-item" href="<?=$navigazione_http?>lavorazioni/hla_risultati.php?user=<?=$login?>" >Inserisci Risultati</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pazienti
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$navigazione_http?>schede/scheda.php?user=<?=$login?>" >Scheda Paziente</a>
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
          <a class="dropdown-item" href="<?=$navigazione_http?>registra.php?user=<?=$login?>" >Nuovo Utente</a>
          <a class="dropdown-item" href="<?=$navigazione_http?>sversion.php" >Versione Software</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=$navigazione_http?>update.php" >Update</a>
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
				<a class="dropdown-item" href="<?=$navigazione_http?>logout.php" >LogOut</a>
			</div>
       </li>
  </div>
</nav>
