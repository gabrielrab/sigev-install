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
<section class="container">
        <img src="../../img/logo-sigev.png" alt="SIGEV" class="logo-pequena">
        <h1>Cadastrar Trabalho</h1>
    <form id="form-singin" method="POST" action="trabalho-processa.php" enctype="multipart/form-data">
    <!--TESTE-->
<!--    <form id="form-singin" method="GET" action="" enctype="multipart/form-data">-->
       <div class="form-group">
       <input type="text" name="id_usuario" class="form-control" value="<?php  echo $_SESSION['id_usuario']; ?>" hidden>
       </div>
       <div class="form-group">
           <h3>Dados do Trabalho</h3>
           <input type="text" name="nome_trabalho" class="form-control" placeholder="Nome completo do trabalho" required>
           <div id="autores" class="form-inline">
               <input type="text" name="autor[]" class="form-control col-md-6" placeholder="Autor" maxlength="50"><input type="text" name="instituicao_autor[]" class="form-control col-md-6" placeholder="Instituição" maxlength="50">
           </div>
           <a id="add-autor"><i class="fas fa-plus-circle"></i> Novo autor</a>
       </div>
       <div class="form-group">
           <h3>Resumo</h3>
           <textarea name="resumo-text" id="tx-resumo" class="form-control"></textarea>
           <h3>Palavras-chave</h3>
            <div class="form-inline">
                <input type="text" name="pc1" class="form-control" placeholder="Palavra-chave 1" required>
                <input type="text" name="pc2" class="form-control" placeholder="Palavra-chave 2" required>
                <input type="text" name="pc3" class="form-control" placeholder="Palavra-chave 3" required>
            </div>
            <h3>Referências Bibliograficas</h3>
            <textarea name="referencias" class="form-control"></textarea>
            <label><input type="checkbox" id="resumo-file"> Enviar resumo por arquivo</label>
           <input type="file" name="upload" id="resumo" class="form-control" disabled>
       </div>
       <div class="form-group">
           <h3>Termos e condições</h3>
           <small class="form-text text-justify"><input type="checkbox" required> Estou ciente de que o uso de minha imagem poderá ocorrer para efeitos de divulgação do evento e ou publicação de resultados do mesmo no âmbito midiático e científico.</small>
       </div>
       <div class="form-group">
          <input type="text" name="situacao" class="form-control" value="Trabalho enviado" hidden>
           <button type="submit" class="btn btn-success btn-block" >Cadastrar</button>
       </div>
       <a href="painel-user.php" class="btn btn-light btn-block">Voltar</a>
    </form>
</section>
<script>
    $("#add-autor").click(function(){
        $("#autores").append($('<input type="text" name="autor[]" class="form-control col-md-6" placeholder="Autor" maxlength="50"><input type="text" name="instituicao_autor[]" class="form-control col-md-6" placeholder="Instituição" maxlength="50">'));
    });
    
    $("#resumo-file").change(function(){
       if($("#resumo-file").prop("checked", true)){
           $("#resumo").prop("disabled", false);
       } 
        
    });
</script>
</body>
</html>