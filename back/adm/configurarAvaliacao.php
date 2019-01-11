<?php
include_once('../../system/banco.php');

$dado = $_POST['habilitar'];
//die ($dado);
configurar_avaliacao($conexao, $dado);
$response = $dado;
echo json_encode($response);
?>