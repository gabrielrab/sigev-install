<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Noticia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<?php
    include_once("system/banco.php");
    session_start();
    $id = $_GET['id'];
    ?>
<body>
<header class="header d-flex flex-column bg-noticia">
        <div class="absolute">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <?php
            $busca = ler_noticia_esp($conexao, $id);

            foreach($busca as $i):
        ?>
        <h2> <?= $i['titulo'];?> </h2>
        <h4> <?= $i['subtitulo'];?></h4>
    </header>
    <section class="d-flex flex-column text-center min-size">
        <h3>Notícia</h3>
        <p> <?= $i['descricao'];?> </p>
    </section>
    <?php
        endforeach;
    ?>
<div class="m-1 p-2">
    <?php
        $tipo = $_SESSION['tipo'];
        if($tipo != 1 || $tipo == NULL){
            //
        } else{
            echo('<a href="remover-noticia.php?id='.$id.'" class="btn btn-danger">Remover Noticia</a>');
        }

    ?>
</div>
<footer class="d-flex flex-row justify-content-around flex-wrap p-5">
    <h5 class="branco">SIGEV - Sistema de Gerenciamento de Eventos</h5>
    <h6 class="branco">Todos os Direitos Reservados</h6>
</footer>
</body>
</html>