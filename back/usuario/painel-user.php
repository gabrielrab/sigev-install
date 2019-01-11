<!DOCTYPE html>
<html>
<head>
    <title>Painel do Usuário</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
<?php
    include_once('../../system/banco.php');
    include_once('../../system/nav-interno.php');
?>
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#dashboard">Dados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#trabalhos">Trabalhos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#postagens">Noticias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#oficinas">Oficinas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#certificado">Certificado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#avaliacao">Avaliações</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dados</h1>
          </div>
          <div class="mb-4">
          <!-- DADOS DO USUARIO -->
          <h3>Bem-vindo <b><?= $_SESSION['nome']; ?></b></h3>
          <p>Este é o painel do usuário aqui estão dispostos várias informações e atualizações do evento.</p>
          <?php
            $buscar = ler_evento($conexao);
            foreach ($buscar as $i) {
              if($i['avaliacao'] == 0){
                //echo('<a href="#" onclick="alerta();"><i class="fas fa-plus-circle"></i></a>');
              } else{
                echo('<div class="alert alert-primary" role="alert">
                Faça a avaliação do evento para ter acesso aos certificado
              </div>');
              }
            }
          ?>
          </div>
          <div class="form-inline">
            <h2 class="h2">Trabalhos </h2>
          <?php
            $buscar = ler_evento($conexao);
            foreach ($buscar as $i) {
              if($i['trabalho'] == 0){
                echo('<a href="#" onclick="alerta();"><i class="fas fa-plus-circle"></i></a>');
              } else{
                echo('<a href="trabalho.php"><i class="fas fa-plus-circle"></i></a>');
              }
            }
          ?>
          </div>
          <p>Aqui estão listados os seus trabalhos enviados. Para enviar um trabalho clique no botão acima .</p>
          <div class="table-responsive" id="trabalhos">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Situação</th>
                  <!-- <th>Notificações</th> -->
                </tr>
              </thead>
              <tbody>
              <?php
                $busca = ler_trabalho_usuario($conexao, $_SESSION['id_usuario']);
                foreach($busca as $i):
              ?>
                <tr>
                  <td><?php echo $i['id_trabalho']; ?></td>
                  <td><?php echo $i['titulo']; ?></td>
                  <td><?php echo $i['status']; ?></td>
                  <!-- <td><a href="mais.php?id=<?php //echo $i['id_trabalho']; ?>" class="btn btn-primary">Notificações</a></td> -->
                </tr>
                <?php
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
          <h2 class="h2">Notícias</h2>
          <div id="noticias" class="d-flex flex-row justify-content-around flex-wrap text-center">
            <?php
                $busca = ler_noticia($conexao);
                foreach($busca as $i):
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $i['titulo']; ?></h5>
                    <p class="card-text"><?php echo $i['subtitulo']; ?></p>
                    <a href="../../single.php?id=<?php echo $i['id_noticia']; ?>" class="btn btn-success">Saiba Mais</a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
          </div>
          <div class="d-flex text-center m-3">
                <a href="../../feed.php" class="btn btn-light btn-block">Mostrar Todas</a>
          </div>
          <h2 class="h2">Oficinas</h2>
          <div id="noticias" class="d-flex flex-row justify-content-around flex-wrap text-center mb-4">
            <?php
                $busca = ler_oficinas($conexao);
                foreach($busca as $i):
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $i['titulo']; ?></h5>
                    <p class="card-text"><?php echo $i['data']; ?></p>
                    <a href="../../mais-oficinas.php?id=<?php echo $i['id_oficina']; ?>" class="btn btn-success">Saiba Mais</a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
          </div>
          <h2 class="h2" id="certificado">Certificado</h2>
          <?php
            $buscar = ler_evento($conexao);
              foreach($buscar as $i){
                if($i['certificado'] == 0){
                  //Não está disponível
                  echo('<div class="alert alert-primary" role="alert">
                          Certificados ainda não estão disponiveis.
                        </div>');
                } else{
                  //Disponível
                  echo('<div class="text-left">
                          Seu certificado já está disponível<br>
                          <a href="certificado/gerar-certificado.php?id='.$_SESSION['id_usuario'].'" class="btn btn-success">Baixar Certificado</a>                  
                        </div>');
                }
              }
            
          ?>
          <h2 class="h2">Avaliação</h2>
          <?php
            $buscar = ler_evento($conexao);
            foreach ($buscar as $i) {
              if($i['avaliacao'] == 0){
                echo('<div class="alert alert-primary" role="alert">
                Avaliação do evento ainda não está disponível.
              </div>');
              } else{
                $busca = avaliou_evento($conexao, $_SESSION['id_usuario']);
                foreach($busca as $i){
                  if($i['resultado'] == 0){
                    echo('<form action="" method="POST" class="form-sigin">
                <h3>Questionário</h3>
                <h4>Sobre o evento</h4>
                <label for="" class="form-inline">
                  <input type="number" name="nota_evento" class="form-control col-4" placeholder="Nota do Evento">
                  <input type="text" name="comentario_evento" class="form-control col" placeholder="Comentário do Evento">
                </label>
                <h4>Sobre o organização</h4>
                <label for="" class="form-inline">
                  <input type="number" name="nota_organizacao" class="form-control col-4" placeholder="Nota do organizacao">
                  <input type="text" name="comentario_organizacao" class="form-control col" placeholder="Comentário do organizacao">
                </label>
                <h4>Sobre o sistema</h4>
                <label for="" class="form-inline">
                  <input type="number" name="nota_sistema" class="form-control col-4" placeholder="Nota do sistema">
                  <input type="text" name="comentario_sistema" class="form-control col" placeholder="Comentário do sistema">
                </label>
                <input type="submit" class="btn btn-success">
                </form>');
                  } else{
                    echo('<div class="alert alert-success" role="alert">
                    Você já avaliou o evento!
                  </div>');
                  }
                }
              }
            }
          ?>
          <div class="form-group"></div>
            <?php
              if(isset($_POST['nota_evento']) && $_POST['nota_evento'] != ''){
                $inserir = array();
                
                $inserir['id_usuario'] = $_SESSION['id_usuario'];
                $inserir['nota_evento'] = $_POST['nota_evento'];
                $inserir['comentario_evento'] = $_POST['comentario_evento'];

                $inserir['nota_organizacao'] = $_POST['nota_organizacao'];
                $inserir['comentario_organizacao'] = $_POST['comentario_organizacao'];
                $inserir['nota_sistema'] = $_POST['nota_sistema'];
                $inserir['comentario_sistema'] = $_POST['comentario_sistema'];
                
                criar_avaliacao($conexao, $inserir);
                echo('<script>alert("Avaliação enviada. Aguarde");</script>');
              } else{
                //
              }
              //echo('<script>location.reload();</script>');
            ?>
        </main>
      </div>
    </div>
    <script>
      function alerta() {
        alert("Submisão de trablhos não está disponível");
      }
    </script>
</body>
</html>