<!DOCTYPE html>
<html>
<head>
    <title>Criar Notícia</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
<?php
    include_once('../../system/banco.php');
?>
<section class="centralizar">
    <form action="" method="post" class="form-sigin">
        <div class="form-group text-center">
            <img src="../../img/logo-sigev.png" alt="SIGEV" class="logo-pequena">
            <h1>Inserir Noticia</h1>
            <p>Insira uma noticia no sistema</p>
        </div>
        <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo:">
            <input type="text" name="subtitulo" class="form-control" placeholder="Subtitulo:">
            <span>Descrição:</span>
            <textarea class="form-control" name="descricao"></textarea>
            <button type="submit" class="btn btn-success btn-block">Inserir</button>
            <a href="dashboard.php" class="btn btn-light btn-block">Voltar</a>
        </div>
    </form>
    <?php
              if(isset($_POST['titulo']) && $_POST['titulo'] != ''){
                $inserir = array();
                
                $inserir['titulo'] = $_POST['titulo'];
                $inserir['subtitulo'] = $_POST['subtitulo'];
                $inserir['descricao'] = $_POST['descricao'];

                criar_noticia($conexao, $inserir);
                echo('<script>alert("Noticia inserida");</script>');
                header('Location: dashboard.php');
              } else{
                //
              }

            ?>
</section>
</body>
</html>