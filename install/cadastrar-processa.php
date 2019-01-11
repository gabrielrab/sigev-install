<?php
include_once("../system/config.inc.php");

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
    $_SESSION['tipo'] = 1;
    
//    ENDEREÇO
    $endereco = array();
    
    $endereco['rua'] = $_POST['rua'];
    $endereco['numero'] = $_POST['numero'];
    $endereco['bairro'] = $_POST['bairro'];
    $endereco['cidade'] = $_POST['cidade'];
    $endereco['estado'] = $_POST['estado'];

    //Banco de Dados
    $conexao = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($conexao, "utf8");

    function cadastrar_usuario($conexao, $enviar, $endereco){
        $sql = "INSERT INTO usuario (nome, telefone, email, user, senha, tipo) VALUES(
            '{$enviar['nome']}',
            '{$enviar['telefone']}',
            '{$enviar['email']}',
            '{$enviar['user']}',
            '{$enviar['senha']}',
            '1'
        );";
        
        //die($sql);
        mysqli_query($conexao, $sql);
        
        $id_usuario = mysqli_insert_id($conexao);
        
        $sql = "INSERT INTO endereco (id_usuario, rua, bairro, cidade, estado)
        VALUES(
            '{$id_usuario}',
            '{$endereco['rua']}',
            '{$endereco['bairro']}',
            '{$endereco['cidade']}',
            '{$endereco['estado']}'
        );";
        
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }
    
    $vai = cadastrar_usuario($conexao, $enviar, $endereco);
    echo "<script>alert('Cadastrado com sucesso !');</script>";
    header('Location: ./?step=3');
} else{
    echo "Algo deu errado";
}


?>