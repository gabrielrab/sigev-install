<!DOCTYPE html>
<html>
<head>
    <title>Informações sobre a Oficina</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
    <?php
        include_once('system/banco.php');
        session_start();
        
        $oficina = $_GET['id'];
    ?>
    <header class="header d-flex flex-column bg-noticia">
        <div class="absolute">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <?php
            $busca = ler_oficina_esp($conexao, $oficina);

            foreach($busca as $i):
        ?>
        <h2> <?= $i['titulo'];?> </h2>
    </header>
    <section class="d-flex flex-column text-center">
        <h3>Descrição</h3>
        <p> <?= $i['descricao'];?> </p>
    </section>

    <section class="d-flex flex-column text-center">
        <h3>Informações da Oficina</h3>
        <div class="container-box">
            <div class="spec">
                <i class="far fa-clock fa-2x mb-2"></i>
                <h4><?= $i['horario'];?></h4>
                <h6>Horário</h6>
            </div>
            <div class="spec">
                <i class="far fa-calendar-check fa-2x mb-2"></i>
                <h4><?= $i['data'];?></h4>
                <h6>Dia</h6>
            </div>
            <div class="spec">
                <i class="fas fa-map-marker-alt fa-2x mb-2"></i>
                <h4><?= $i['local'];?></h4>
                <h6>Local</h6>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </section>

    <section class="participar">
        <h3>E ai, gostou?</h3>
        <!-- COLOCAR VAGAS RESTANTES -->
        <?php
            $busca = contar_vagas($conexao, $oficina);

            foreach($busca as $i){
                if($i['vagas'] > 0){
                    $participa = buscar_participacao($conexao, $oficina, $_SESSION['id_usuario']);
                    foreach($participa as $j){
                        if($j['resultado'] == '0'){
                            //Não participa
                            echo('<p>Clique no botão abaixo para participar. Não fique de fora, ainda <b>'.$i['vagas'].' vagas</b>.</p>
                            <a href="participar-oficina.php?id='.$_SESSION['id_usuario'].'&oficina='.$oficina.'" class="btn btn-success">Quero participar !</a>');
                        } else{
                            //Participa
                            echo('<div class="alert alert-success" role="alert">
                            Você ja se cadastrou nesta oficina. <a href="cancelar-oficina.php?id='.$_SESSION['id_usuario'].'&oficina='.$oficina.'">Cancelar participação</a>
                            </div>');
                        }
                    }
                } else{
                    echo('<div class="alert alert-danger" role="alert">
                            Infelismente as vagas acabaram! Tente mais tarde.
                        </div>');
                }
            }
        ?>
        
    </section>
</body>
</html>