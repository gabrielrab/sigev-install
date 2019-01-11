<?php
include_once('../../system/banco.php');

if(isset($_POST['nome_organizador']) && $_POST['nome_organizador'] != ''){
    $inserir = array();
    
    $inserir['nome_organizador'] = $_POST['nome_organizador'];
    //$inserir['assinatura'] = $_POST['assinatura'];
    $nome = 'assinatura';
    
    $var1 = explode(".", $_FILES['upload'] ["name"]);
    $var2 = end($var1);
    $extensao = strtolower($var2);
    
    $novo_nome = $nome.".".$extensao;
    
    $diretorio = "../usuario/certificado/";
    
    move_uploaded_file($_FILES['upload']['tmp_name'],   $diretorio.$novo_nome);
    
    $inserir['assinatura'] = $novo_nome;
    //Envia para o banco de dados
    cadastra_certificado($conexao, $inserir);
    
    echo('<script>alert("Certificado  Cadastrado");</script>');
    header('Location: dashboard.php');
} else{
    //
}

?>