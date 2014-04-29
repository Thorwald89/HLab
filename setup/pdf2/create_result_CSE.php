<?php

date_default_timezone_set('UTC');
require('fpdf/fpdf.php');





class PDF_result extends FPDF {
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 10) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin);

		$this->SetAutoPageBreak(true, $margin);
	}

	function Header () {
	     $this->Image('logo.png',100,15,250);

	//	$this->SetFont('Arial', 'B', 20);
	//	$this->SetFillColor(36, 96, 84);
	//	$this->SetTextColor(225);
	//	$this->Cell(0, 30, "YouHack MCQ Results", 0, 1, 'C', true);
	}

 function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Testo - Testo',0,0,'C');
}


function Generate_Table($nome_d, $cognome_d, $nascita_d,$nome_r, $cognome_r,$nascita_r,$peso) {

$nascita_d = date_create($nascita_d);
$nascita_r = date_create($nascita_r);
$nascita_d = date_format($nascita_d, 'd/m/Y');
$nascita_r = date_format($nascita_r, 'd/m/Y');

	$this->SetFont('Arial', '');
	$this->SetFillColor(0);
	$this->SetLineWidth(0.2);
	$fill = false;

//	for ($i = 0; $i < count($subjects); $i++) {

		$this->Cell(100, 20, 'Nome:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $nome_d, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Nome:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $nome_r, 'R', 1, 'R', $fill);

		$this->Cell(100, 20, 'Cognome:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $cognome_d, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Cognome:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $cognome_r, 'R', 1, 'R', $fill);

		$this->Cell(100, 20, 'Data di Nascita:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $nascita_d, 'RB', 0, '', $fill);
		$this->Cell(100, 20, 'Data di Nascita:', 'LB', 0, '', $fill);
		$this->Cell(100, 20, $nascita_r, 'RB', 1, 'R', $fill);

		$this->Cell(100, 20, 'Peso:'.$peso, 'LBR', 0, 'L', $fill);
		$fill = !$fill;

//	}
//	$this->SetX(367);
	//$this->Cell(100, 20, "Total", 1);
//	$this->Cell(100, 20,  array_sum($marks), 1, 1, 'R');
}
function Generate_Table2($al1, $al2, $al3, $al4, $al5, $al6, $deplasmazione, $procedura, $vol, $scarto, $finale, $data_congelamento, $data_raccolta)
 {
$data_congelamento = date_create($data_congelamento);
$data_raccolta = date_create($data_raccolta);
$data_congelamento = date_format($data_congelamento, 'd/m/Y');
$data_raccolta = date_format($data_raccolta, 'd/m/Y');
	$this->SetFont('Arial', '');
	$this->SetFillColor(0);
	$this->SetLineWidth(0.2);
	$fill = false;

//	for ($i = 0; $i < count($subjects); $i++) {

		$this->Cell(100, 20, 'Deplasmazione:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $deplasmazione, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Aliquota 1:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $al1, 'R', 1, 'R', $fill);
$this->Cell(100, 20, 'Procedura:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $procedura, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Aliquota 2:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $al2, 'R', 1, 'R', $fill);
$this->Cell(100, 20, 'Vol. Raccolta:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $vol, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Aliquota 3:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $al3, 'R', 1, 'R', $fill);
$this->Cell(100, 20, 'Vol. Scarto:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $scarto, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Aliquota 4:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $al4, 'R', 1, 'R', $fill);
$this->Cell(100, 20, 'Vol. Finale:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $finale, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Aliquota 5:', 'L', 0, '', $fill);
		$this->Cell(100, 20, $al5, 'R', 1, 'R', $fill);
$this->Cell(100, 20, 'Congelamento:', 'L', 0, 'L', $fill);
		$this->Cell(100, 20, $data_congelamento, 'R', 0, '', $fill);
		$this->Cell(100, 20, 'Aliquota 6:', 'LB', 0, '', $fill);
		$this->Cell(100, 20, $al6, 'BR', 1, 'R', $fill);
$this->Cell(100, 20, 'Raccolta:', 'BL', 0, 'L', $fill);
		$this->Cell(100, 20, $data_raccolta, 'BR', 0, '', $fill);


		$fill = !$fill;

//	}
//	$this->SetX(367);
	//$this->Cell(100, 20, "Total", 1);
//	$this->Cell(100, 20,  array_sum($marks), 1, 1, 'R');
}



function Generate_Table_pre($wbc_pre, $cd34_pre_perc, $cd34_pre_micro, $wbc_2, $cd34_2_perc, $cd34_2_micro)
{
	$this->SetFont('Arial', '');
	$this->SetFillColor(0);
	$this->SetLineWidth(0.2);
	$fill = false;

//	for ($i = 0; $i < count($subjects); $i++) {

		$this->Cell(100, 20, 'WBC/microL: '.$wbc_pre, 'LB', 0, 'L', $fill);
		$this->Cell(100, 20, 'CD34%: '.$cd34_pre_perc, 'B', 0, '', $fill);
		$this->Cell(100, 20, 'CD34/microL: '.$cd34_pre_micro, 'BR', 0, 'L', $fill);
		$this->Cell(100, 20, 'WBC/microL: '.$wbc_2, 'LB', 0, 'L', $fill);
		$this->Cell(100, 20, 'CD34%: '.$cd34_2_perc, 'B', 0, '', $fill);
		$this->Cell(100, 20, 'CD34/microL: '.$cd34_2_micro, 'BR', 0, 'L', $fill);

		$fill = !$fill;

}



function Generate_Table_monitoraggio($data, $wbc_mon, $cd34_perc, $cd34_micro)
{

	$data = date_create($data);
	$data = date_format($data, 'd/m/Y');
	$this->SetFont('Arial', '');
	$this->SetFillColor(0);
	$this->SetLineWidth(0.2);
	$fill = false;

//	for ($i = 0; $i < count($subjects); $i++) {

		$this->Cell(100, 20, $data, 'LB', 0, 'L', $fill);
		$this->Cell(100, 20, $wbc_mon, 'B', 0, 'L', $fill);
		$this->Cell(100, 20, $cd34_perc, 'B', 0, '', $fill);
		$this->Cell(100, 20, $cd34_micro, 'BR', 1, 'L', $fill);

		$fill = !$fill;

}
}



include('../setup.php');





$pdf = new PDF_result();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(100);

$pdf->Cell(100, 13, "Scheda CSE");
$pdf->SetFont('Arial', '');

$pdf->Cell(250, 13, '');


// head DX
$pdf->SetFont('Arial', 'B');
$pdf->Cell(50, 13, "Data:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, date('j-m-Y'), 0, 1);


// head SX
$pdf->SetFont('Arial', 'I');
$pdf->SetX(140);
$pdf->Cell(200, 15, $b['quota'], 0, 2);
$pdf->Cell(200, 15, $b['data_carico'] . ',' . $_POST['City'] , 0, 2);
$pdf->Cell(200, 15, $b['operatore_carico'], 0, 2);

$pdf->Ln(10);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetTextColor(0);
//	$pdf->SetFillColor(94, 188, z);
	$pdf->SetFillColor(94, 188, 225);
	$pdf->SetLineWidth(1);
	$pdf->Cell(100, 25, "Donatore", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'RT', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "Ricevente", 'TR', 1, 0, 'C', true);



	$s=mysql_query("select * from schede where id='".$_POST['id']."' ") or die(mysql_error());

	while($b=mysql_fetch_array($s)){

$pdf->Generate_Table($b['nome_d'], $b['cognome_d'], $b['nascita_d'], $b['nome_r'], $b['cognome_r'], $b['nascita_r'], $b['peso']);
}


$pdf->Ln(20);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetTextColor(0);
//	$pdf->SetFillColor(94, 188, z);
	$pdf->SetFillColor(94, 188, 225);
	$pdf->SetLineWidth(1);
	$pdf->Cell(100, 25, "Parametri", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'RT', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "Aliquote", 'TR', 1, 0, 'C', true);
$sa=mysql_query("select * from schede where id='".$_POST['id']."' ") or die(mysql_error());

	while($b=mysql_fetch_array($sa)){

$pdf->Generate_Table2($b['al1'], $b['al2'], $b['al3'], $b['al4'], $b['al5'], $b['al6'], $b['deplasmazione'], $b['procedura'], $b['vol'], $b['scarto'], $b['finale'], $b['data_congelamento'], $b['data_raccolta']);
}


$pdf->Ln(20);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetTextColor(0);
//	$pdf->SetFillColor(94, 188, z);
	$pdf->SetFillColor(94, 188, 225);
	$pdf->SetLineWidth(1);
	$pdf->Cell(100, 25, "", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "Pre-Raccolta", 'T', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'TR', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "Raccolta", 'T', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'TR', 1, 'C', true);

$sa=mysql_query("select * from schede where id='".$_POST['id']."' ") or die(mysql_error());

	while($b=mysql_fetch_array($sa)){

$pdf->Generate_Table_pre($b['wbc-pre'], $b['cd34_pre_perc'], $b['cd34_pre_micro'],$b['wbc-racc'], $b['cd34_racc_perc'], $b['cd34_racc_micro']);
}


$pdf->Ln(20);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetTextColor(0);
//	$pdf->SetFillColor(94, 188, z);
	$pdf->SetFillColor(94, 188, 225);
	$pdf->SetLineWidth(1);
	$pdf->Cell(100, 25, "", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "Post-Raccolta", 'T', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'TR', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "Deplasmazione", 'T', 0, 'C', true);
	$pdf->Cell(100, 25, "", 'TR', 1, 'C', true);
$sa=mysql_query("select * from schede where id='".$_POST['id']."' ") or die(mysql_error());

	while($b=mysql_fetch_array($sa)){

$pdf->Generate_Table_pre($b['wbc-post'], $b['cd34_post_perc'], $b['cd34_post_micro'],$b['wbc-depl'], $b['cd34_depl_perc'], $b['cd34_depl_micro']);
}




$pdf->Ln(20);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetTextColor(0);
//	$pdf->SetFillColor(94, 188, z);
	$pdf->SetFillColor(94, 188, 225);
	$pdf->SetLineWidth(1);
	$pdf->Cell(400, 25, "Monitoraggio", 'LTR', 1, 'C', true);

	$pdf->Cell(100, 25, "Data", 'LT', 0, 'C', true);
	$pdf->Cell(100, 25, "WBC", 'T', 0, 'C', true);
	$pdf->Cell(100, 25, "CD34%", 'T', 0, 'C', true);
	$pdf->Cell(100, 25, "CD34/microL", 'RT', 1, 'C', true);

$sa=mysql_query("select * from schede where id='".$_POST['id']."' ") or die(mysql_error());

	$b=mysql_fetch_array($sa);

$pdf->Generate_Table_monitoraggio($b['data_monitoraggio1'], $b['wbc_monitoraggio1'], $b['cd34_perc_monitoraggio1'], $b['cd34_micro_monitoraggio1']);
$pdf->Generate_Table_monitoraggio($b['data_monitoraggio2'], $b['wbc_monitoraggio2'], $b['cd34_perc_monitoraggio2'], $b['cd34_micro_monitoraggio2']);
$pdf->Generate_Table_monitoraggio($b['data_monitoraggio3'], $b['wbc_monitoraggio3'], $b['cd34_perc_monitoraggio3'], $b['cd34_micro_monitoraggio3']);
$pdf->Generate_Table_monitoraggio($b['data_monitoraggio4'], $b['wbc_monitoraggio4'], $b['cd34_perc_monitoraggio4'], $b['cd34_micro_monitoraggio4']);






$pdf->Ln(50);

$message = "Esportazione conclusa. ";

$pdf->MultiCell(0, 15, $message);

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor(1, 162, 232);

$pdf->Write(13, "prova@prova.com", "mailto:example@example.com");

$pdf->Output('esporta_CSE.pdf', 'F');

$now = date("d-m-Y");
$origine = "esporta_CSE.pdf";
$sposta = "../../download/esporta_CSE.pdf";
copy($origine, $sposta);
chmod('esporta_CSE.pdf', 0777);
$ren= "../../download/".$now."_CSE.pdf";
chmod($ren, 0777);

rename($sposta, $ren);



?>

<script language="javascript">
alert("Export eseguito correttamente");
</script>


<html>
<head>
<title>Laboratorio di Manipolazione Cellulare - CSE</title>
<link rel="stylesheet" href="../../stile.css" />

<style type="text/css">
	<!--
body {
background-color: white;

    }
-->
</style>



</head>



<body>


 <center>Troverai il file pdf nella cartella "download".</center>
</body>

</html>
