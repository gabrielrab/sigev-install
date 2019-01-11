<?php
    include_once("../../system/banco.php");
    session_start();

    $oficina = $_GET['id'];

    remover_oficina($conexao, $oficina);

    header('Location: feed.php');
?>