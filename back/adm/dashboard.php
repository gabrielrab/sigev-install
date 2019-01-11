<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
    <?php
        include_once('../../system/scripts.php');
        include_once('../../system/banco.php');
        session_start();
        $tipo = $_SESSION['tipo'];

        if($tipo != 1 || $tipo == NULL){
            header('Refresh:2; ../usuario/login.php');
        }
    ?>
</head>
<body>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <!-- Colocar Nome do Evento -->
        <?php
            $busca = ler_evento($conexao);
            foreach ($busca as $i):
        ?>
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../../index.php"><?php echo $i['nome']; ?></a>
      <?php
        endforeach;
      ?>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../usuario/sair.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#dashboard">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#trabalhos">Trabalhos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#postagens">Postagens</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#avaliacao">Avaliações</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#avaliacao">Oficinas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#configuracao">Configurações</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="certificado.php">Certificado</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <div class="container-box" id="dashboard">
            <div class="box">
                <h3>
                  <?php 
                   $busca = contar_usuarios($conexao);
                   foreach ($busca as $i){
                     echo $i['resultado'];
                   }
                  ?>
                </h3>
                <h5>Usuários Cadastrados</h5>
            </div>
            <div class="box">
                <h3>
                <?php 
                   $busca = contar_trabalho($conexao);
                   foreach ($busca as $i){
                     echo $i['resultado'];
                   }
                  ?>
                </h3>
                <h5>Trabalhos Enviados</h5>
            </div>
            <div class="box">
                <h3>
                <?php 
                   $busca = contar_avaliacao($conexao);
                   foreach ($busca as $i){
                     echo $i['resultado'];
                   }
                  ?>
                </h3>
                <h5>Avaliações</h5>
            </div>
        </div>
        <label class="form-inline">
          <h2 class="h2">Trabalhos  </h2>
          <?php
            $buscar = ler_evento($conexao);
            foreach ($buscar as $i) {
              if($i['trabalho'] == 0){
                echo('<i class="fas fa-toggle-off fa-2x" onclick="configurar(1);"></i>');
              } else{
                echo('<i class="fas fa-toggle-on fa-2x" onclick="configurar(0);"></i>');
              }
            }
          ?>
          <input type="text" name="tipo" id="tipo" hidden>
        </label>
        <p>Clique o switch para habilitar/desabilitar o envio de trabalhos. </p>
          <div class="table-responsive" id="trabalhos">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Situação</th>
                  <th>Mais</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $busca = ler_trabalho($conexao);
                foreach($busca as $i):
              ?>
                <tr>
                  <td><?php echo $i['id_trabalho']; ?></td>
                  <td><?php echo $i['titulo']; ?></td>
                  <td><?php echo $i['status']; ?></td>
                  <td><a href="mais.php?id=<?php echo $i['id_trabalho']; ?>" class="btn btn-primary">Mais</a></td>
                </tr>
                <?php
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
          <label for="" class="form-inline">
            <h2 class="h2">Postagens </h2>
            <a href="criar-noticia.php"><i class="fas fa-plus-circle"></i></a>
          </label>
          <p>Clique no botão para adicionar uma nova postagem. </p>
          <div id="noticias" class="d-flex flex-row justify-content-around flex-wrap text-center">
            <?php
                $busca = ler_noticia_limitador($conexao);
                foreach($busca as $i):
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $i['titulo']; ?></h5>
                    <p class="card-text"><?php echo $i['subtitulo']; ?></p>
                    <a href="../../single.php?id=<?php echo $i['id_noticia']; ?>" class="btn btn-primary">Saiba Mais</a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
        </div>
        <div class="d-flex text-center m-3">
                <a href="../../feed.php" class="btn btn-light btn-block">Mostrar Todas</a>
        </div>
        
        <label for="" class="form-inline">
            <h2 class="h2" id="avaliacao">Avaliações </h2>
            <?php
            $buscar = ler_evento($conexao);
            foreach ($buscar as $i) {
              if($i['avaliacao'] == 0){
                echo('<i class="fas fa-toggle-off fa-2x" onclick="configurar2(1);"></i>');
              } else{
                echo('<i class="fas fa-toggle-on fa-2x" onclick="configurar2(0);"></i>');
              }
            }
          ?>
          <input type="text" name="habilitar" id="habilitar" hidden>
          </label>
          <p>Clique o switch para habilitar/desabilitar as avaliações. </p>
        <!-- OFICINAS -->
          <label for="" class="form-inline" id="oficinas">
            <h2 class="h2">Oficinas </h2>
            <a href="criar-oficina.php"> <i class="fas fa-plus-circle fa-1x"></i></a>
          </label>
          <p>Clique no botão para adicionar uma nova oficina. </p>
          <div id="noticias" class="d-flex flex-row justify-content-around flex-wrap text-center mb-4">
            <?php
                $busca = ler_oficinas($conexao);
                foreach($busca as $i):
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $i['titulo']; ?></h5>
                    <p class="card-text"><?php echo $i['data']; ?></p>
                    <a href="../../mais-oficinas.php?id=<?php echo $i['id_oficina']; ?>" class="btn btn-primary">Saiba Mais</a>
                    <a href="remover-oficina.php?id=<?php echo $i['id_oficina']; ?>" class="btn btn-danger">Remover</a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
        </div>
        <!-- CONFIGURAÇÕES -->
        <h2 class="h2" id="configuracao">Configurações <i class="fas fa-cogs fa-1x" id="configuracao-modal"></i></h2>
        <p>Clique na engrenagem para poder realizar alterações no evento. </p>
        <div class="container p-3">
            <form action="" method="post">
            <?php
              $buscar = ler_evento($conexao);
              foreach($buscar as $i):
            ?>
                <h5>Nome do Evento:</h5>
                <input type="text" class="form-control" name="nome" value="<?php echo $i['nome']; ?>" placeholder="Nome do Evento" disabled>
                <h5>Subtitulo:</h5>
                <input type="text" class="form-control" name="subtitulo" value="<?php echo $i['subtitulo']; ?>"  placeholder="Subtitulo" disabled>
                <h5>Descrição:</h5>
                <textarea name="descricao" class="form-control" rows="4" disabled><?php echo $i['descricao']; ?></textarea>
                </div>
                <?php
                  endforeach;
                ?>
                <button type="submit" class="btn btn-success ativar" disabled>Alterar Dados</button>
            </form>
            <?php
              if(isset($_POST['nome']) && $_POST['nome'] != ''){
                $inserir = array();
                
                $inserir['id'] = 1;
                $inserir['nome'] = $_POST['nome'];
                $inserir['subtitulo'] = $_POST['subtitulo'];
                $inserir['descricao'] = $_POST['descricao'];

                atualizar_dados_evento($conexao, $inserir);
                echo('<script>alert("Alteração Realizada faça o LOGOUT");</script>');
                echo('<div class="alert alert-success" role="alert">
                Alteração realizada com sucesso. <a href="../usuario/sair.php">Faça o Logout para efetiva-la</a>
                </div>');
              } else{
                //
              }

            ?>
        </div>
        </main>
      </div>
    </div>
    <script>
    function configurar(tipo){
      
      $('#tipo').val(tipo);
      var dados = $('#tipo').serialize();
      console.log(dados); 
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'configurarTrabalho.php',
        async: true,
        data: dados,
          success: function(response){
          }
        });
        alert("Alteração Realizada");
        location.reload();
      }
      
      function configurar2(habilitar){
      
      $('#habilitar').val(habilitar);
      var dados = $('#habilitar').serialize();
      console.log(dados); 
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'configurarAvaliacao.php',
        async: true,
        data: dados,
          success: function(response){
            //
          }
        });
        alert("Alteração Realizada");
        location.reload();
      }

      $("#configuracao-modal").click(function(){
        $(".form-control").prop("disabled", false);
        $(".ativar").prop("disabled", false);
      });
    </script>
</body>
</html>