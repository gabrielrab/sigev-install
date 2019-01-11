<?php
require_once('../../../fpdf/fpdf.php');
include_once('../../../system/banco.php');

//Dados
$buscar = dados_certificado($conexao, $_GET['id']);
foreach($buscar as $i){
    $nome = $i['nome'];
    $evento = $i['evento'];
    $organizador = $i['nome_organizador'];
}

$pdf = new FPDF('l', 'mm', 'a4');
$pdf->AddPage();
$pdf->Image('certificado.png', 0, 0, 297, 210);

//Nome do Sujeito
$pdf->SetXY(35, 81);
$pdf->SetFont('helvetica','B',20);
$pdf->Cell(227, 15, $nome, 0, 0, 'C');

//Nome do Evento
$pdf->SetXY(35, 124);
$pdf->SetFont('helvetica','B',20);
$pdf->Cell(227, 15, utf8_decode($evento), 0, 0, 'C');

//Assinatura
$pdf->Image('assinatura.png', 110, 147);

//Organizador
$pdf->SetXY(35, 160);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(227, 15, $organizador, 0, 0, 'C');

//Data
$dia = date('d');
switch (date("m")) {
    case "01":    $mes = "Janeiro";     break;
    case "02":    $mes = "Fevereiro";   break;
    case "03":    $mes = "Março";       break;
    case "04":    $mes = "Abril";       break;
    case "05":    $mes = "Maio";        break;
    case "06":    $mes = "Junho";       break;
    case "07":    $mes = "Julho";       break;
    case "08":    $mes = "Agosto";      break;
    case "09":    $mes = "Setembro";    break;
    case "10":    $mes = "Outubro";     break;
    case "11":    $mes = "Novembro";    break;
    case "12":    $mes = "Dezembro";    break; 
}
$ano = date('Y');

$data_completa = "Data emissão {$dia} de {$mes} de {$ano}";
//Data de Emissão
$pdf->SetXY(108, 178);
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(82, 8, utf8_decode($data_completa), 0, 0, 'C');

$pdf->Output("certificado.pdf","D");

header('Location: ../painel-user.php');
?>