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

		$s= mysql_query("select * from user where user='".$_POST['user']."' and pass='".md5($_POST['pass'])."'") or die(mysql_error());
		$controllo = mysql_num_rows($s);

		if($controllo == 1){
			$login = $_POST['user'];
			$_SESSION['login'] = $login;

			$rr = mysql_fetch_array($s);
			$admin= $rr['other'];
			$_SESSION['admin'] = $admin;

			echo 'LogIn OK!<br>';
				echo $login;


		}else{
header("Location: login.php?result=errore");
		}
	}
?>


<html>
<head>
<link rel="shortcut icon" href="img/favicon.ico" >
<title>Laboratorio di Manipolazione Cellulare</title>
<script src='setup/jquery.min.js'></script>
<script type='text/javascript' src='setup/menu_jquery.js'></script>
<link rel="stylesheet" href="stile.css" />
<style>
<!--
body{

background-image: url('img/sfondo.png');


}
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu {
  width: 200px;
  font-family: Helvetica, Arial, sans-serif;
  color: #ffffff;
}
#cssmenu ul ul {
  display: none;
}
.align-right {
  float: right;
}
#cssmenu > ul > li > a {
  padding: 15px 20px;
  border-left: 1px solid #0b2a3a;
  border-right: 1px solid #0b2a3a;
  border-top: 1px solid #0b2a3a;
  cursor: pointer;
  z-index: 2;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  color: #ffffff;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
  background: #18597a;
  background: -webkit-linear-gradient(#18597a, #144965);
  background: -moz-linear-gradient(#18597a, #144965);
  background: -o-linear-gradient(#18597a, #144965);
  background: -ms-linear-gradient(#18597a, #144965);
  background: linear-gradient(#18597a, #144965);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15);
}
#cssmenu > ul > li > a:hover,
#cssmenu > ul > li.active > a,
#cssmenu > ul > li.open > a {
  color: #eeeeee;
  background: #144965;
  background: -webkit-linear-gradient(#144965, #103a4f);
  background: -moz-linear-gradient(#144965, #103a4f);
  background: -o-linear-gradient(#144965, #103a4f);
  background: -ms-linear-gradient(#144965, #103a4f);
  background: linear-gradient(#144965, #103a4f);
}
#cssmenu > ul > li.open > a {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.15);
  border-bottom: 1px solid #0b2a3a;
}
#cssmenu > ul > li:last-child > a,
#cssmenu > ul > li.last > a {
  border-bottom: 1px solid #0b2a3a;
}
.holder {
  width: 0;
  height: 0;
  position: absolute;
  top: 0;
  right: 0;
}
.holder::after,
.holder::before {
  display: block;
  position: absolute;
  content: '';
  width: 6px;
  height: 6px;
  right: 20px;
  z-index: 10;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.holder::after {
  top: 17px;
  border-top: 2px solid #ffffff;
  border-left: 2px solid #ffffff;
}
#cssmenu > ul > li > a:hover > span::after,
#cssmenu > ul > li.active > a > span::after,
#cssmenu > ul > li.open > a > span::after {
  border-color: #eeeeee;
}
.holder::before {
  top: 18px;
  border-top: 2px solid;
  border-left: 2px solid;
  border-top-color: inherit;
  border-left-color: inherit;
}
#cssmenu ul ul li a {
  cursor: pointer;
  border-bottom: 1px solid #32373e;
  border-left: 1px solid #32373e;
  border-right: 1px solid #32373e;
  padding: 10px 20px;
  z-index: 1;
  text-decoration: none;
  font-size: 13px;
  color: #eeeeee;
  background: #49505a;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li.open > a,
#cssmenu ul ul li.active > a {
  background: #424852;
  color: #ffffff;
}
#cssmenu ul ul li:first-child > a {
  box-shadow: none;
}
#cssmenu ul ul ul li:first-child > a {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
#cssmenu ul ul ul li a {
  padding-left: 30px;
}
#cssmenu > ul > li > ul > li:last-child > a,
#cssmenu > ul > li > ul > li.last > a {
  border-bottom: 0;
}
#cssmenu > ul > li > ul > li.open:last-child > a,
#cssmenu > ul > li > ul > li.last.open > a {
  border-bottom: 1px solid #32373e;
}
#cssmenu > ul > li > ul > li.open:last-child > ul > li:last-child > a {
  border-bottom: 0;
}
#cssmenu ul ul li.has-sub > a::after {
  display: block;
  position: absolute;
  content: '';
  width: 5px;
  height: 5px;
  right: 20px;
  z-index: 10;
  top: 11.5px;
  border-top: 2px solid #eeeeee;
  border-left: 2px solid #eeeeee;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
#cssmenu ul ul li.active > a::after,
#cssmenu ul ul li.open > a::after,
#cssmenu ul ul li > a:hover::after {
  border-color: #ffffff;
}


.centro
{
position:absolute;
top:60%;
left:65%;
margin-top:-250px;
margin-left:-450px;
width:700px;
height:300px;
opacity: 0.8;

}


.foot
{
position:absolute;
top:80%;
left:65%;
margin-top:-250px;
margin-left:-450px;
width:700px;
height:300px;
opacity: 0.8;

}
-->
</style>
</head>



<body>
Laboratorio di Manipolazione Cellulare

<div id='cssmenu'>
<ul>
   <li class='active'><a href="indice.php" target="centro"><span>Home</span></a></li>
   <li class="has-sub"><a href="prodotti/prodotti.php" target="centro"><span>Prodotti</span></a>
    <ul>
         <li><a href="prodotti/prodotti.php?user=<?=$login?>" target="centro"><span>Lista</span></a></li>
         <li class='last'><a href="prodotti/prodotti.php?pos=carico&user=<?=$login?>" target="centro"><span>Carica Prodotto</span></a></li>
         <li class='last'><a href="prodotti/archivio.php?user=<?=$login?>" target="centro"><span>Archivio</span></a></li>
      </ul>
   </li>
   <li class="has-sub"><a href="schede/scheda.php?user=<?=$login?>" target="centro"><span>Esami</span></a>
   <ul>
         <li class='last'><a href="schede/scheda.php?user=<?=$login?>" target="centro"><span>CSE - Scheda Paziente </span></a></li>
         <li><a href="schede/inserisci.php?user=<?=$login?>" target="centro"><span>CSE - Inserisci Paziente </span></a></li>
         <li class='last'><a href="schede/piastrine.php?user=<?=$login?>" target="centro"><span>Piastrine - Lista</span></a></li>
         <li ><a href="schede/piastrine.php?pos=inserisci&user=<?=$login?>" target="centro"><span>Piastrine - Aggiungi Test </span></a></li>
		 <li class='last'><a href="schede/linfociti.php?user=<?=$login?>" target="centro"><span>Linfociti - Scheda Paziente</span></a></li>
         <li ><a href="schede/linfociti.php?pos=inserisci&user=<?=$login?>" target="centro"><span>Linfociti - Aggiungi Test </span></a></li>

      </ul>

   </li>
   <?php
   if($admin =='admin'){
   ?>
   <li class="has-sub"><a href="#"><span>Amministrazione</span></a>
	<ul>
         <li class='last'><a href="registra.php?user=<?=$login?>" target="centro"><span>Registra Operatore</span></a></li>
         <li class='last'><a href="version.php" target="centro"><span>Versione Software</span></a></li>
         <li class='last'><a href="https://github.com/Thorwald89/LabMan/wiki" target="_blank"><span>Documentazione</span></a></li>
         <li class='last'><a href="update.php" target="centro"><span>UpDate</span></a></li>
    </ul>
   </li>
   <?php
   }
   ?>
   <li class='last'><a href="logout.php" ><span>Esci</span></a></li>
</ul>
</div>

<div class="centro" >
<iframe allowtransparency="true" width="700" height="400" src="indice.php" id="centro" name="centro">
</iframe>
<center><a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licenza Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">LabMan</span> di<a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/Thorwald89/LabMan" property="cc:attributionName" rel="cc:attributionURL">https://github.com/Thorwald89/LabMan</a> &eacute; distribuito con Licenza <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribuzione - Condividi allo stesso modo 4.0 Internazionale</a>.
</center>
</div>

</body>




</html>
