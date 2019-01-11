<?php
include_once("../system/config.inc.php");

if(isset($_POST['nome']) && $_POST['nome'] != ''){
    //Banco de Dados
    $conexao = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($conexao, "utf8");

    function criar_organizacao($conexao, $nome, $descricao){
        $sql="INSERT INTO organizacao (nome, descricao) VALUES(
            '{$nome}',
            '{$descricao}'
            );";
        mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
     }
    
     foreach(array_combine($_POST['nome'], $_POST['descricao']) as $autor => $instituicao){
        $cad = criar_organizacao($conexao, $autor, $instituicao);
    }

    echo "<script>alert('Cadastrado com sucesso !');</script>";
    header('Location: ./?step=5');
} else{
    echo "Algo deu errado";
}


?>