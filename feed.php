<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feed de Nóticias</title>
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
    ?>
<body>
    <header class="header d-flex flex-column bg-noticia">
        <div class="absolute">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h2> Feed de Notiícias </h2>
        <span>Aqui estão listadas todas as notícias do evento.</span>
    </header>
    <div id="noticias" class="d-flex flex-row justify-content-around text-center flex-wrap m-3">
            <?php
                $busca = ler_noticia($conexao);
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

</body>
<footer>
    
</footer>
</html>