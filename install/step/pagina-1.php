<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Etapa 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="step/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-light">
    <img src="step/logo-sigev.png" alt="Logo SIGEV" class="logo">
    <section class="bg-white espaco">
        <h3 class="text-center">Etapa 1</h3>
        <p>Insira abaixo os dados relacionados ao banco de dados da sua hospedagem.</p>
        <form action="" method="post">
            <h6>Nome do banco de dados:</h6>
            <input type="text" name="database" id="" class="form-control col-5" required>
            <h6>Nome do usuário:</h6>
            <input type="text" name="user" id="" class="form-control col-5" required>
            <h6>Nome do senha:</h6>
            <input type="text" name="password" id="" class="form-control col-5">
            <h6>HostName:</h6>
            <input type="text" name="host" id="" class="form-control col-5" required>
            <span class="col-5 text-center">Para instalações locais utlize localhost.</span>
            <button type="submit" class="btn btn-success">Próximo</button>
        </form>
        
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = (isset($_POST['database'])) ? trim($_POST['database']) : null;
    $username = (isset($_POST['user'])) ? trim($_POST['user']) : null;
    $password = (isset($_POST['password'])) ? trim($_POST['password']) : null;
    $hostname = (isset($_POST['host'])) ? trim($_POST['host']) : null;

    if (!empty($database) || !empty($username) || !empty($hostname)) {

        //Nesse caso em especifico, precisamos fazer uma conexão com o banco
        //usando os dados informados pelo usuário, para ter certeza de que estão
        //corretos.

        function dbTest($host, $user, $pass, $db) {
            try {
                $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8", $user, $pass);
                return $pdo;
            } catch (PDOException $e) {
                return false;
            }
        }

        if (dbTest($hostname, $username, $password, $database)) {
            $conexao = mysqli_connect($hostname, $username, $password, $database);
            mysqli_set_charset($conexao, "utf8");

            $autor = "CREATE TABLE autor (
                id_autor int(11) NOT NULL primary key auto_increment,
                nome_autor varchar(255) NOT NULL,
                instituicao_autor varchar(255) NOT NULL,
                id_trabalho int(11) NOT NULL
              );";
            mysqli_query($conexao, $autor) or die(mysqli_error($conexao));
            
            $avaliacao = "CREATE TABLE avaliacao (
                id_avaliacao int(11) NOT NULL primary key auto_increment,
                id_usuario int(11) NOT NULL,
                nota_evento int(11) NOT NULL,
                comentario_evento text NOT NULL,
                nota_organizacao int(11) NOT NULL,
                comentario_organizacao text NOT NULL,
                nota_sistema int(11) NOT NULL,
                comentario_sistema text NOT NULL
              );";
            mysqli_query($conexao, $avaliacao) or die(mysqli_error($conexao));
            
              $certificado = "CREATE TABLE certificado (
                id_certificado int(11) NOT NULL primary key auto_increment,
                nome_organizador varchar(255) NOT NULL,
                assinatura varchar(255) NOT NULL
              );";
            mysqli_query($conexao, $certificado) or die(mysqli_error($conexao));
            
              $endereco = "CREATE TABLE endereco (
                id_endereco int(11) NOT NULL primary key auto_increment,
                id_usuario int(11) NOT NULL,
                rua varchar(50) NOT NULL,
                complemento varchar(50) NOT NULL,
                numero int(11) NOT NULL,
                bairro varchar(50) NOT NULL,
                cidade varchar(50) NOT NULL,
                estado varchar(5) NOT NULL
              );";
            mysqli_query($conexao, $endereco) or die(mysqli_error($conexao));
            
              $evento = "CREATE TABLE evento (
                id_evento int(11) NOT NULL primary key auto_increment,
                nome varchar(255) NOT NULL,
                subtitulo varchar(255) NOT NULL,
                descricao text NOT NULL,
                avaliacao tinyint(1) NOT NULL,
                certificado tinyint(1) NOT NULL,
                trabalho int(11) NOT NULL,
                oficina int(11) NOT NULL,
                logo varchar(255) NOT NULL,
                banner varchar(255) NOT NULL
              );";
              mysqli_query($conexao, $evento) or die(mysqli_error($conexao));
            
              $noticia = "CREATE TABLE noticia (
                id_noticia int(11) NOT NULL primary key auto_increment,
                titulo varchar(20) NOT NULL,
                subtitulo varchar(30) NOT NULL,
                descricao varchar(300) NOT NULL
              );";
            mysqli_query($conexao, $noticia) or die(mysqli_error($conexao));
            
              $oficinas = "CREATE TABLE oficinas (
                id_oficina int(11) NOT NULL primary key auto_increment,
                titulo varchar(255) NOT NULL,
                descricao text NOT NULL,
                data varchar(100) NOT NULL,
                vagas int(11) NOT NULL,
                local varchar(255) NOT NULL,
                horario varchar(255) NOT NULL
              );";
              mysqli_query($conexao, $oficinas) or die(mysqli_error($conexao));
            
              $organizacao = "CREATE TABLE organizacao (
                id_organizacao int(11) NOT NULL primary key auto_increment,
                nome varchar(30) NOT NULL,
                descricao varchar(30) NOT NULL
              );";
              mysqli_query($conexao, $organizacao) or die(mysqli_error($conexao));
            
              $participacao = "CREATE TABLE participacao (
                id_participacao int(11) NOT NULL primary key auto_increment,
                id_usuario int(11) NOT NULL,
                id_oficina int(11) NOT NULL
              );";
              mysqli_query($conexao, $participacao) or die(mysqli_error($conexao));
            
              $programacao = "CREATE TABLE programacao (
                id_programacao int(11) NOT NULL primary key auto_increment,
                data varchar(10) NOT NULL,
                descricao varchar(50) NOT NULL
              );";
              mysqli_query($conexao, $programacao) or die(mysqli_error($conexao));
            
              $publica = "CREATE TABLE publica (
                id_publica int(11) NOT NULL primary key auto_increment,
                id_usuario int(11) NOT NULL,
                id_trabalho int(11) NOT NULL,
                data varchar(255) NOT NULL,
                status varchar(255) NOT NULL,
                tipo int(11) NOT NULL
              );";
              mysqli_query($conexao, $publica) or die(mysqli_error($conexao));
            
              $trabalho = "CREATE TABLE trabalho (
                id_trabalho int(11) NOT NULL primary key auto_increment,
                titulo varchar(100) NOT NULL,
                pc1 varchar(100) NOT NULL,
                pc2 varchar(100) NOT NULL,
                pc3 varchar(100) NOT NULL,
                resumo text NOT NULL,
                referencias text NOT NULL,
                upload varchar(256) NOT NULL
              );
              ";
              mysqli_query($conexao, $trabalho) or die(mysqli_error($conexao));
            
              $usuario = "CREATE TABLE usuario (
                id_usuario int(11) NOT NULL primary key auto_increment,
                nome varchar(255) NOT NULL,
                telefone varchar(15) NOT NULL,
                email varchar(100) NOT NULL,
                user varchar(50) NOT NULL,
                senha varchar(50) NOT NULL,
                tipo tinyint(1) NOT NULL
              );";
              mysqli_query($conexao, $usuario) or die(mysqli_error($conexao));
            
            //Se a conexão der certo, cria (caso não exista) o arquivo config.inc.php
            //dentro da pasta system e escreve os dados nele.
            file_put_contents('../system/config.inc.php',
                '<?php'
              . '    $hostname = ' . "'{$hostname}'; \n"
              . '    $username = ' . "'{$username}'; \n"
              . '    $password = ' . "'{$password}'; \n"
              . '    $database = ' . "'{$database}'; \n"
              .'?>'
            );
            echo('<script>alert("Conexão feita com sucesso!");</script>');
            //Redireciona para próxima etapa, se for o caso.
            header('Location: ./?step=2');
        } else {
            echo 'Desculpe, mas não foi possível conectar-se ao banco de dados informado.';
        }
    } else {
        echo('<script>alert("Ops! Por favor, preencha os campos corretamente...");</script>');
        echo '';
    }
}
?>
    </section>
</body>
</html>