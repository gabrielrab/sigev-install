<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Etapa 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="step/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body class="bg-light">
    <img src="step/logo-sigev.png" alt="Logo SIGEV" class="logo">
    <section class="bg-white espaco">
        <h3 class="text-center">Etapa 4</h3>
        <p class="text-center">Cadastro de informações do evento.</p>
        <form action="organizadores-processa.php" method="post" enctype="multipart/form-data" class="form-group max">
            <h6>Organizador:</h6>
            <div class="form-inline" id="organizadores">
                <input type="text" class="form-control col-md-6" name="nome[]" placeholder="Nome:">
                <input type="text" class="form-control col-md-6" name="descricao[]" placeholder="Descrição:">
            </div>
            <a id="add-autor"><i class="fas fa-plus-circle"></i> Novo organizador</a>
            <button type="submit" class="btn btn-success">Próximo</button>
        </form>
    </section>
    <script>
         $("#add-autor").click(function(){
        $("#organizadores").append($('<input type="text" class="form-control col-md-6" name="nome[]" placeholder="Nome:"><input type="text" class="form-control col-md-6" name="descricao[]" placeholder="Descrição:">'));
    });
    </script>
</body>
</html>