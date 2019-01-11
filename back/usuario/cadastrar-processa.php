<?php
include_once("../../system/banco.php");

if(isset($_POST['nome']) && $_POST['nome'] != ''){
    $enviar = array();
    
    $enviar['nome'] = $_POST['nome'];
    $enviar['telefone'] = $_POST['telefone'];
    $enviar['email'] = $_POST['email'];
    $enviar['user'] = $_POST['user'];
    $enviar['senha'] = $_POST['senha'];
    $enviar['tipo'] = 0;

    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['telefone'] = $_POST['telefone'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['senha'] = $_POST['senha'];
    $_SESSION['tipo'] = 0;
    
//    ENDEREÇO
    $endereco = array();
    
    $endereco['rua'] = $_POST['rua'];
    $endereco['numero'] = $_POST['numero'];
    $endereco['bairro'] = $_POST['bairro'];
    $endereco['cidade'] = $_POST['cidade'];
    $endereco['estado'] = $_POST['estado'];
    
    $vai = cadastrar_usuario($conexao, $enviar, $endereco);
    echo "<script>alert('Cadastrado com sucesso !');</script>";
    header('Location: painel-user.php');
} else{
    echo "Algo deu errado";
}


?>