<?php
include_once("../system/config.inc.php");

if(isset($_POST['nome']) && $_POST['nome'] != ''){
    $enviar = array();
    
    $enviar['nome'] = $_POST['nome'];
    $enviar['subtitulo'] = $_POST['subtitulo'];
    $enviar['descricao'] = $_POST['descricao'];

    $var1 = explode(".", $_FILES['logo'] ["name"]);
        $var2 = end($var1);
        $extensao = strtolower($var2);

        $novo_nome = "logo." .   $extensao;
    
        $diretorio = "../img/";
    
        move_uploaded_file($_FILES['logo']['tmp_name'],   $diretorio.$novo_nome);

        $enviar['logo'] = $novo_nome;

    $var1 = explode(".", $_FILES['banner'] ["name"]);
        $var2 = end($var1);
        $extensao = strtolower($var2);
        $novo_nome = "banner." .   $extensao;

        move_uploaded_file($_FILES['banner']['tmp_name'],   $diretorio.$novo_nome);

        $enviar['banner'] = $novo_nome;

    //Banco de Dados
    $conexao = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($conexao, "utf8");

    function cadastrar_evento($conexao, $enviar, $endereco){
        $sql = "INSERT INTO evento (nome, subtitulo, descricao, logo, banner) VALUES(
            '{$enviar['nome']}',
            '{$enviar['subtitulo']}',
            '{$enviar['descricao']}',
            '{$enviar['logo']}',
            '{$enviar['banner']}'
        );";
        
        //die($sql);
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }
    
    $vai = cadastrar_evento($conexao, $enviar, $endereco);
    echo "<script>alert('Cadastrado com sucesso !');</script>";
    header('Location: ./?step=4');
} else{
    echo "Algo deu errado";
}


?>