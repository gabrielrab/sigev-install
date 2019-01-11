<?php
include_once('../../system/banco.php');

$dado = $_POST['tipo'];
//die ($dado);
configurar_trabalho($conexao, $dado);
$respone = $dado;
echo json_encode($response);
?>