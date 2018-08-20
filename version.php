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

	$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
	
	



$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];


?>


<html>
<head>
<title><?= $titolo?> - Version</title>
<link rel="stylesheet" href="stile.css" />

<style type="text/css">
	<!--
body {
background-color: white;

    }
-->
</style></head>




<body>
<?= $titolo?>

<br><br>
<hr>
<h4>0.10.0 Beta</h4>
<ul>
<li>Migrazione a Progetto di HLA e Immunogenetica</li>
<li>Modifica Layout</li>
<li>Modificati UI</li>
<li>Modifica DB</li>
<li>aggiornato il file sql</li>
<li>Migrazione a bootstrap</li>

</ul>
<hr>
<h4>0.9.1 Beta</h4>
<ul>
<li>Migliorata la nomenclatura</li>
<li>Aggiunto gestore CrioTank</li>
<li>Modificati gli Esami</li>
<li>Collegato il criotank agli esami</li>
<li>aggiornato il file sql</li>
<li>ATTENZIONE: da fixare l'area criotank.</li>

</ul>
<hr>
<h4>0.9 Beta</h4>
<ul>
<li>Migliorata la schermata principale.</li>
<li>Aggiunto il comando Archivio per i prodotti.</li>
<li>aggiunto lo storico per i prodotti.</li>
<li>Rilasciato Bug-Fix per il Database.</li>
<li>Varie migliorie grafiche e correzioni di forma.</li>

</ul>
<hr>
<h4>0.8 Beta</h4>
<ul>
<li>Migliorato il sistema di Installazione</li>
<li>Aggiunti i privilegi di Amministratore</li>
<li>aggiunti errori e redirect prima assenti.</li>
<li>Migliorata l'organizzazione dei file</li>
<li>Aggiunto al Setup il file SQL (solo Struttura) che genererà il DB e l'utente Admin</li>

</ul>
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
