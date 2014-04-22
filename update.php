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

if($_POST['send'] == 'Update')
{
	
	
	 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"]. " kB<br>";
  
  $target_path = "setup/uploads/";
	$target_path = $target_path . basename( $_FILES['file']["name"]); 


if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "File ".  basename( $_FILES['file']['name']). 
    " copiato nella directory Uploads <br>";
} else{
    echo "There was an error uploading the file, please try again!";
}

/*
$zip = new ZipArchive();
$file= "uploads/update.zip";

if($zip->open($file)===TRUE) {
	$path= chdir('/');
    $zip->extractTo($path);
    $zip->close();
echo $path;
    echo "File estratto con successo!";
}else{ echo "Errore nell'apertura";}
*/

$path= "setup/uploads/update.zip";
$zip = new ZipArchive;
if ($zip->open($path) === true) {
    for($i = 0; $i < $zip->numFiles; $i++) {
        $filename = $zip->getNameIndex($i);
        $fileinfo = pathinfo($filename);
        copy("zip://".$path."#".$filename, "".$fileinfo['basename']);
        
        echo "File Estratto ed installato correttamente! <br><hr><br>";
    }                  
    $zip->close();                  
}               
   
}
?>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - Update</title>
<link rel="stylesheet" href="stile.css" />

<style type="text/css">
	<!--
body {
background-color: white;

    }
-->
</style></head>




<body>
Sezione Aggiornamento.
<br><br>
<font color="#A71616">Attenzione!</font> Effettuando questa operazione alcuni file saranno rimpiazzati, si consiglia di effettuare prima una copia di backup.<br>
<hr>Vuoi effettuare l'aggiornamento?

<form action="update.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" id="file"><br>
<input type="submit" name="send" value="Update">
</form>
</body>




</html>
