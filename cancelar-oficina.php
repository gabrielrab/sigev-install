<?php
include_once('system/banco.php');

$id = $_GET['id'];
$oficina = $_GET['oficina'];

remover_participacao($conexao, $oficina, $id);

echo('<script>alert("Cancelamento efetuado !");</script>');

header('Location: back/usuario/painel-user.php');
?>