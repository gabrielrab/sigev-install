<!DOCTYPE html>
<html>
<head>
    <title>Configurar Certificado</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
<?php
    include_once('../../system/banco.php');
    
    $verifica = verifica_certificado($conexao);

    foreach($verifica as $i){
        if($i['resultado'] > 0){
            die('<div class="text-center">
                <div class="alert alert-danger" role="alert">
                    Certificado já foi configurado!
                </div>
            </div>');
        }
    }
?>
<section class="centralizar">
    <form action="certificado-processa.php" method="POST" class="form-sigin" enctype="multipart/form-data">
        <div class="form-group text-center">
            <img src="../../img/logo-sigev.png" alt="SIGEV" class="logo-pequena">
            <h1>Certificado</h1>
            <p>Digite os dados vão estar presentes no certificado</p>
        </div>
        <div class="form-group">
            <input type="text" name="nome_organizador" class="form-control" placeholder="Nome do Organizador do Evento:">
            <span>Faça aqui o upload do seu arquivo de assinatura.</span><br>
            <b>Lembre-se de seguir o <a href="#">modelo</a> disponivel no site do sitema.</b>
            <input type="file" name="upload" class="form-control" placeholder="Assinatura:">
            <button type="submit" class="btn btn-success btn-block">Inserir</button>
            <a href="certificado.php" class="btn btn-light btn-block">Voltar</a>
        </div>
    </form>
    
</section>
</body>
</html>