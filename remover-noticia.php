<?php
    include_once("system/banco.php");
    session_start();

    $noticia = $_GET['id'];

    deletar_noticia($conexao, $noticia);

    header('Location: dashboard.php');
?>