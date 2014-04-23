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


if($send =="Inserisci"){
	$s=mysql_query("INSERT INTO linfociti (`nome`, `cognome`, `valore1`, `valore2`, `valore3`, `valore4`, `data_test`, `operatore`) values ('".$_POST['nome']."', '".$_POST['cognome']."','".$_POST['valore1']."','".$_POST['valore2']."','".$_POST['valore3']."','".$_POST['valore4']."',NOW(),'".$_POST['operatore']."') ") or die(mysql_error()); 
	echo "inserimento effettuato";
}

if($send =="Esporta"){
	
	require('../setup/pdf/html2pdf.class.php');

	
	$s=mysql_query("select * from linfociti where id = '".$_POST['id']."'") or die(mysql_error()); 
	$b=mysql_fetch_array($s);
	
	
	// get the HTML
    $content = " 
    <page><table style=\"width: 100%; text-size: 18px;\">
		
		
		
		<tr><td colspan=\"8\" style=\"width: 100%; text-align: center;\"><h2>Scheda Paziente</h2></td></tr>
		
		<tr  style=\"text-align: center;\">
			<td colspan=\"2\" style=\"text-align: center;\"><h3>Anagrafica</h3></td>
			<td colspan=\"2\" style=\"text-align: center;\"><h3>Profilo</h3></td>

		</tr>
			
	<tr><td style=\"font-weight:bold\">Nome</td>					
	<td>".$b['nome']."</td>
	<td style=\"font-weight:bold\">Valore1</td>					
	<td>".$b['valore1']."</td>
	</tr>
	
	<tr><td style=\"font-weight:bold\">Cognome</td>				
	<td>".$b['cognome']."</td>
	<td style=\"font-weight:bold\">Valore2</td>				
	<td>".$b['valore2']."</td>
	
		</tr>
	
	<tr><td style=\"font-weight:bold\"></td>		
	<td></td>
	<td style=\"font-weight:bold\">Valore3</td>		
	<td>".$b['valore3']."</td>
	</tr>
	
	<tr><td style=\"font-weight:bold\"></td>		
	<td></td>
	<td style=\"font-weight:bold\">Valore4</td>		
	<td>".$b['valore4']."</td>
	</tr>
	
	</table>
    </page>
    
    ";
	
	
	//  $url="scheda.php?pos=scheda&id=".$_POST['id']."";

   
   
		$titolo = $b['cognome'].' '.$b['nome'].' '.$b['data_test'];
        $html2pdf = new HTML2PDF('P','A4','it');
        $html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
     //   $html2pdf->getHtmlFromPage($url);
        $html2pdf->Output("".$titolo.".pdf", 'D'); //VISUALIZZO CON BROWSER

}

?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Linfociti</title>
<link rel="stylesheet" href="../stile.css" />

<style type="text/css">
	<!--
body {
background-color: white;

    }
-->
</style>
</head>



<body>


<?php
switch($pos){
	
	default:
	?>
	
	
	<table>
		<tr><td colspan="8" style="text-align: center;"><h2><center>Cerca Paziente</h2></td></tr>
		<form method="post" action="linfociti.php?pos=scheda&user=<?=$login?>">
	<tr><td>Nome</td>					
	<td><input type="text" name="nome"></td>
	<td>Cognome </td>					
	<td><input type="text" name="cognome"></td>
	</tr><tr>
	<td colspan="2">Inserisci Nome/Cognome del Paziente da trovare.<br> N.B.:<i> puoi cercare una scheda scrivendo %nome% nel caso si conosca parte del nome </i></td></tr>
	<tr><td style="text-align: center;" colspan="8">	
	<input type="hidden" name="operatore" value="<?=$login?>">
	<input type="submit" class="submit"  name="send" value="Visualizza">
		</td></tr>
	</form>
	
	
	</table>
	<?php
	break;
	
	case 'inserisci':
	?>
	
	
	<table>
		<tr><td colspan="8" style="text-align: center;"><h2><center>Inserisci Paziente</h2></td></tr>
		<form method="post" action="linfociti.php?user=<?=$login?>">
	<tr><td>Nome </td>					
	<td><input type="text" name="nome"></td>
	<td>Cognome </td>					
	<td><input type="text" name="cognome"></td>
	</tr><tr>
	
	<tr><td>valore1 </td>					
	<td><input type="text" name="valore1"></td>
	<td>valore2 </td>					
	<td><input type="text" name="valore2"></td>
	</tr><tr>
		
	<tr><td>valore3 </td>					
	<td><input type="text" name="valore3"></td>
	<td>valore4 </td>					
	<td><input type="text" name="valore4"></td>
	</tr><tr>
	<tr><td colspan="8"><input type="submit" name="send" value="Inserisci"></td></tr>

	</form>
	
	
	</table>
	<?php
	break;
	
	case 'scheda':
	
	if($send =="Visualizza"){
	
	
	?>
		<table>
	<tr>	
	<td>Nome</td>
	<td>Cognome</td>

	</tr>
	
	<?php
	$s=mysql_query("select * from linfociti where nome like '".$_POST['nome']."' or cognome like '".$_POST['cognome']."' order by cognome") or die(mysql_error()); 
	echo $_POST['nome'];
	while($b=mysql_fetch_array($s)){
		
	?>	
		
	<tr>	
	
	<td><a href="linfociti.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['nome'];?></a></td>
	<td><a href="linfociti.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['cognome'];?></a></td>
	<td><a href="linfociti.php?pos=scheda&id=<?=$b['id'];?>"><?=$b['data_test'];?></a></td>
		
	</tr>
	
	<?php	
	}
	
}

	?></table>
	
	<?php 
	if($_GET['id'] !=0){
	$s=mysql_query("select * from linfociti where id = '".$_GET['id']."'") or die(mysql_error()); 
	$b=mysql_fetch_array($s);
		?>
	
	
	<table>
		
		
		<form method="POST" action="linfociti.php">
		
		<tr><td colspan="8" style="text-align: center;"><h2>Profilo Linfocitario</h2></td></tr>
		
		<tr  style="text-align: center;">
			<td colspan="2" style="text-align: center;"><center><h3>Anagrafica</h3></center></td>
			<td colspan="2" style="text-align: center;"><center><h3>Profilo</h3></center></td>

		</tr>
			
	<tr><td>Nome</td>					
	<td><?=$b['nome'];?></td>
	<td>Valore1</td>					
	<td><?=$b['valore1'];?></td>
	</tr>
	
	<tr><td>Cognome</td>				
	<td><?=$b['cognome'];?></td>
	<td>Valore2</td>				
	<td><?=$b['valore2'];?></td>
	
		</tr>
	
	<tr><td></td>		
	<td></td>
	<td>Valore3</td>		
	<td><?=$b['valore3'];?></td>
	</tr>
	
	<tr><td></td>		
	<td></td>
	<td>Valore4</td>		
	<td><?=$b['valore4'];?></td>
	</tr>
	
	
	<input type="hidden" name ="id" value="<?=$b['id'];?>">
	
	<tr><td colspan="8" style="text-align: center;"><input type="submit" name="send" value="Esporta"></td></tr>
	</form>
	</table>
	<?php
		}
	break;
	
		
}


?>

</body>




</html>
