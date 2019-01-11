<nav class="navbar navbar-light bg-light">
    <?php
        $busca = ler_evento($conexao);
        foreach ($busca as $i):
    ?>
    <h4><?php echo $i['nome']; ?></h4>
    <?php
        endforeach;
    ?>
        <ul class="d-flex justify-content-around">
            <li class="nav-item">
                <a href="../../index.php" class="nav-link">Home</a>
            </li>
            <?php
                 session_start();
                 $tipo = $_SESSION['tipo'];

                 if($tipo != 1 || $tipo == NULL){
                     echo('<li class="nav-item">
                     <a href="../usuario/painel-user.php" class="nav-link">Painel do Usuário</a>
                 </li>');
                 } else{
                    echo('<li class="nav-item">
                     <a href="../adm/dashboard.php" class="nav-link">Dashboard</a>
                 </li>');
                 }
            ?>
            <li class="nav-item">
                <a href="../../feed.php" class="nav-link">Noticias</a>
            </li>

            <li class="nav-item">
                <a href="sair.php" class="nav-link">Sair</a>
            </li>
        </ul>
    </nav>