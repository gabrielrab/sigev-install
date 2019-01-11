<?php
include_once('../../system/banco.php');

configurar_certificado($conexao);

echo json_encode($response);
?>