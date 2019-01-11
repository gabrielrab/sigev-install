<?php
include_once('../../system/banco.php');


date_default_timezone_set('America/Sao_Paulo');


if(isset($_POST['nome_trabalho']) && $_POST['nome_trabalho'] != ''){
    $enviar = array();
    
    $enviar['id_usuario'] = $_POST['id_usuario'];
    $enviar['tipo'] = 0;
    $enviar['nome_trabalho'] = $_POST['nome_trabalho'];
    $enviar['pc1'] = $_POST['pc1'];
    $enviar['pc2'] = $_POST['pc2'];
    $enviar['pc3'] = $_POST['pc3'];
    
    if($_POST['resumo-text'] != ''){
        $enviar['resumo'] = $_POST['resumo-text'];
    } else{
        $enviar['resumo'] = 'Não informado';
    }
    
        $var1 = explode(".", $_FILES['upload'] ["name"]);
        $var2 = end($var1);
        $extensao = strtolower($var2);

        $novo_nome = $_POST['nome_trabalho']. time() . "." .   $extensao;
    
        $diretorio = "upload/";
    
        move_uploaded_file($_FILES['upload']['tmp_name'],   $diretorio.$novo_nome);
    
        $enviar['upload'] = $novo_nome;
        echo $novo_nome;
    
    $enviar['referencias'] = $_POST['referencias'];
    $enviar['situacao'] = $_POST['situacao'];
    date_default_timezone_set('America/Sao_Paulo');
    $enviar['data'] = date("d/m/Y");
    
    $enviar['id_usuario'] = $_POST['id_usuario'];

    $enviar['autor'] = $_POST['autor'];
    $enviar['instituicao_autor'] = $_POST['instituicao_autor'];
    
    $vai = cadastrar_trabalho($conexao, $enviar);
    
    foreach(array_combine($_POST['autor'], $_POST['instituicao_autor']) as $autor => $instituicao){
        $cad = cadastrar_autor($conexao, $autor, $instituicao, $vai);
    }
    
    echo "<script>alert('Cadastrado com sucesso !');</script>";
     header('Location: painel-user.php');
} else{
    echo "Algo deu errado";
}




?>