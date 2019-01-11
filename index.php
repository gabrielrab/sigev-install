<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGEV - Bem Vindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="js/main.js"></script>
</head>
<?php
        if(!file_exists('system/config.inc.php')) {
            echo('Clique <a href="./install" title="Iniciar a instalação">aqui</a> para iniciar a instalação do sistema SIGEV.');
            exit;
        }
        //Caso já estiver instalado
        // if (file_exists('install/')) {
        //     echo ('<div class="alert alert-danger" role="alert">
        //              Porfavor delete a pasta install!
        //         </div>');
        //     exit;
        // }
?>
<?php
    include_once("system/banco.php");
    session_start();

    if(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] != ''){
        if($_SESSION['tipo'] == 1){
            header('Location: back/adm/dashboard.php');
        } else{
            header('Location: back/usuario/painel-user.php');
        }
    } else{
        //
    }
    
    ?>
<body>
    <nav class="bg-light">
        <ul class="d-flex justify-content-end">
            <li class="nav-item">
                <a href="#" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
                <a href="#programacao" class="nav-link">Programação</a>
            </li>

            <li class="nav-item">
                <a href="back/usuario/login.php" class="nav-link">Login</a>
            </li>

            <li class="nav-item">
                <a href="back/usuario/cadastrar.php" class="nav-link">Cadastrar</a>
            </li>
        </ul>
    </nav>
        <?php
            $busca = ler_evento($conexao);
            foreach ($busca as $i):
        ?>
    <header class="d-flex flex-column" style="background-image: url('img/<?= $i['banner']; ?>');">
        <!-- Colocar nome do evento -->
        <img src="img/<?= $i['logo']; ?>" class="logo-evento">
        <p><?php echo $i['subtitulo']; ?></p>
        <a href="#sobre" class="btn btn-primary">Saiba Mais</a>
    </header>

    <section class="text-center bg-light" id="sobre">
        <h3>Sobre</h3>
        <!-- Colocar descrição do evento -->
        <p class="text-justify pt"><?php echo $i['descricao']; ?></p>
        <?php
            endforeach;
        ?>
    </section>
    
    <section class="text-center">
        <h3 id="programacao">Programação</h3>
        <?php 
            // Se a quantidade de programação for igual a 0 -> Section muda o texto.
        $busca = contar_noticias($conexao);
        foreach($busca as $i){
            if($i['resultado'] == '0'){
                echo('<p>A progrmação do evento ainda não está disponivél.</p>');
            } else {
                echo('<p>Confira a programação do evento..</p>');
            }
        }
    ?>
        
        <div class="container-box">
            <?php
                $busca = ler_programacao($conexao);
                foreach($busca as $i):
            ?>
            <div class="spec">
                <i class="far fa-calendar-check fa-2x mb-2"></i>
                <h4><?php echo $i['data']; ?></h4>
                <h6><?php echo $i['descricao']; ?></h6>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </section>
    
    <section class="text-center" <?php 
    // Se a quantidade de noticias for igual a 0 -> Section fica invisivél.
        $busca = contar_noticias($conexao);
        foreach($busca as $i){ if($i['resultado'] == '0'){ echo('hidden'); } else { exit; } }
    ?>>
        <h3 class="mt-4">Últimas Noticias</h3>
        <!-- Colocar noticias do evento -->
        <div id="noticias" class="d-flex flex-row justify-content-around flex-wrap">
            <?php
                $busca = ler_noticia_limitador($conexao);
                foreach($busca as $i):
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $i['titulo']; ?></h5>
                    <p class="card-text"><?php echo $i['subtitulo']; ?></p>
                    <a href="single.php?id=<?php echo $i['id_noticia']; ?>" class="btn btn-primary">Saiba Mais</a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </section>

    <section class="participar">
        <h3 class="mt-4">Organização</h3>
        <ul>
            <?php
                $busca = ler_organizacao($conexao);
                foreach($busca as $i):
            ?>
            <li><h5><b><?php echo $i['nome']; ?></b> - <?php echo $i['descricao']; ?></h5></li>
            <?php
                endforeach;
            ?>
        </ul>
    </section>
<footer class="d-flex flex-row justify-content-around flex-wrap p-5">
    <h5 class="branco">SIGEV - Sistema de Gerenciamento de Eventos</h5>
    <h6 class="branco">Todos os Direitos Reservados</h6>
</footer>
</body>
</html>