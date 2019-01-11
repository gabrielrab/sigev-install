<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
<section class="centralizar">
    <form action="login-processa.php" method="post" class="form-sigin">
        <div class="form-group text-center">
            <img src="../../img/logo-sigev.png" alt="SIGEV" class="logo-pequena">
            <h1>Realizar Login</h1>
            <p>Faça o login para entrar no sistema</p>
        </div>
        <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="Nome de Usuário:">
            <input type="password" name="senha" class="form-control" placeholder="Senha:">
            <button type="submit" class="btn btn-success btn-block">Entrar</button>
            <a href="cadastrar.php" class="btn btn-light btn-block">Cadastrar</a>
        </div>
    </form>
</section>
</body>
</html>