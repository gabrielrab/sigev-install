<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Etapa 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="step/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body class="bg-light">
    <img src="step/logo-sigev.png" alt="Logo SIGEV" class="logo">
    <section class="bg-white espaco">
        <h3 class="text-center">Etapa 3</h3>
        <p class="text-center">Cadastro de informações do evento.</p>
        <p class="text-center"><b>Lembre-se de utilizar as imagens no tamnho indicado no <a href="http://sigev.rf.gd" target="_blank"> site do sistema</a>.</b></p>
        <form action="evento-processa.php" method="post" enctype="multipart/form-data" class="form-group">
            <h6>Nome do evento:</h6>
            <input type="text" class="form-control" name="nome" required>
            <h6>Subtitulo do evento:</h6>
            <input type="text" class="form-control" name="subtitulo" required>
            <h6>Descrição do evento:</h6>
            <textarea name="descricao" class="form-control" required rows="7"></textarea>
            <h6>Logo do evento</h6>
            <input type="file" name="logo" class="form-control" required>
            <h6>Banner do evento</h6>
            <input type="file" name="banner" class="form-control" required>
            <button type="submit" class="btn btn-success">Próximo</button>
        </form>
    </section>
</body>
</html>