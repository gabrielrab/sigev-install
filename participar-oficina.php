<?php
include_once('system/banco.php');

$id = $_GET['id'];
$oficina = $_GET['oficina'];

cadastra_participacao_oficina($conexao, $id, $oficina);

echo('<script>alert("Cadastro efetuado !");</script>');

header('Location: back/usuario/painel-user.php');
?>