<!DOCTYPE html>
<html>
<head>
    <title>Criar Oficina</title>
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
            <h1>Inserir Oficina</h1>
            <p>Insira uma oficina no evento</p>
        </div>
        <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo:" required>
            <span>Data:</span>
            <input type="date" name="data" class="form-control" placeholder="Data:" required>
            <span>Descrição:</span>
            <textarea class="form-control" name="descricao" placeholder="Coloque aqui uma descrição da oficina" required></textarea>
            <input type="number" name="vagas" id="" class="form-control" placeholder="Número de vagas:" required>
            <input type="text" name="local" id="" class="form-control" placeholder="Local:" required>
            <h6>Horário:</h6>
            <input type="time" name="horario" id="" class="form-control" placeholder="Horário:" required>
            <button type="submit" class="btn btn-success btn-block">Inserir</button>
            <a href="dashboard.php" class="btn btn-light btn-block">Voltar</a>
        </div>
    </form>
    <?php
              if(isset($_POST['titulo']) && $_POST['titulo'] != ''){
                $inserir = array();
                
                $inserir['titulo'] = $_POST['titulo'];

                // $v1 = $_POST['data'];
                // $data = new DateTime($v1);
                // $data -> format('d/m/Y');
                // $inserir['data'] = $data;
                $inserir['data'] = date( 'd/m/Y' , strtotime($_POST['data']));

                $inserir['descricao'] = $_POST['descricao'];
                $inserir['vagas'] = $_POST['vagas'];
                $inserir['local'] = $_POST['local'];
                $inserir['horario'] = $_POST['horario'];
                
                criar_oficina($conexao, $inserir);
                echo('<script>alert("Noticia inserida");</script>');
                header('Location: dashboard.php');
              } else{
                //
              }

            ?>
</section>
</body>
</html>