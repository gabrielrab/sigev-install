<!DOCTYPE html>
<html>
<head>
    <title>Enviar Trabalho</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
<?php
    include_once('../../system/banco.php');
    include_once('../../system/nav-interno.php');
?>
<div class="conteiner-fluid text-center m-2">
<h2>Dados do Trabalho</h2>
</div>
<section class="container col">
    <?php
        $id = $_GET['id'];
        $buscar = outras_informacoes($conexao, $id);

        foreach($buscar as $i):
    ?>
    <h5><b>Titulo:</b> <?= $i['titulo']; ?></h5>
    <h5><b>Palavras Chave:</b> <?= $i['pc1']; ?>, <?= $i['pc2']; ?>, <?= $i['pc3']; ?></h5>
    <h5><b>Referencias:</b> <?= $i['referencias']; ?></h5>
    <?php
        if($i['resumo'] == 'Não informado'){
            echo('<a href="../usuario/upload/'.$i['upload'].'" class="btn btn-success" download>Baixar Resumo <i class="fas fa-arrow-alt-circle-down"></i></a>');
        } else{
            echo('<h5>Resumo:</h5><textarea class="form-control">'.$i['resumo'].'</textarea>');
        }
    ?>
    <h5><b>Data de Envio:</b> <?= $i['data']; ?></h5>
    <div class="form-group">
    <form action="" method="post" class="form-singin">
    <h5>Atualizar Status do Trabalho</h5>
        <input type="text" name="id_trabalho" id="" value="<?= $i['id_trabalho']; ?>" hidden>
        <select name="situacao" class="form-control col-sm-5">
            <option hidden>Selecionar situação</option>
            <option <?php if($i['status'] == 'Trabalho enviado'){echo "selected";} ?>>Trabalho enviado</option>
            <option <?php if($i['status'] == 'Em análise'){echo "selected";} ?>>Em análise</option>
            <option <?php if($i['status'] == 'Realizar Alterações'){echo "selected";} ?>>Realizar Alterações</option>
            <option <?php if($i['status'] == 'Aprovado'){echo "selected";} ?>>Aprovado</option>
            <option <?php if($i['status'] == 'Reprovado'){echo "selected";} ?>>Reprovado</option>
        </select>
        <input type="submit" class="btn btn-primary" name="envia-att">
    </form>
    <?php
    if(isset($_POST['envia-att'])){
        $atualiza = array();
                    
        $atualiza['id_trabalho'] = $id;
        $atualiza['situacao'] = $_POST['situacao'];
                    
        $att = atualizar_situacao($conexao, $atualiza);
                    
        echo "Atualizado com sucesso";
    }
    ?>
    </div>
    <?php
        endforeach;
    ?>
</section>
</body>
</html>