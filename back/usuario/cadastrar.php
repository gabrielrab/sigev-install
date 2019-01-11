<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Usuário</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
    <section class="container col-md-5">
    <form action="cadastrar-processa.php" method="post" class="form-singin" id="form-cadastrar">
    <div class="text-center">
        <img src="../../img/logo-sigev.png" alt="SIGEV" class="logo-pequena">
    </div>
        <h4>Dados Pessoais</h4>
        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome completo" maxlength="50" required>
        <input type="text" name="telefone" class="form-control" placeholder="Digite seu telefone" maxlength="50" required id="telefone">
        <label for="" class="form-inline">
            <input type="email" name="email" class="form-control col" placeholder="Digite seu email" maxlength="50" required>
            <input type="text" name="user" class="form-control col" placeholder="Nome de usuário" maxlength="50" required>
        </label>
        <label class="form-inline">
            <input type="password" name="senha" class="form-control col" placeholder="Digite sua senha" maxlength="50" required id="senha">
            <input type="password" name="re-senha" class="form-control col" placeholder="Confirme sua senha" maxlength="50" required id="re-senha">        
        </label>
        <h4>Endereço</h4>
        <label class="form-inline">
            <input type="text" name="rua" class="form-control col" placeholder="Rua" maxlength="50" required>
            <input type="number" name="numero" class="form-control col" placeholder="Número" maxlength="50" required>
        </label>
        <label class="form-inline">
            <input type="text" name="complemento" class="form-control col" placeholder="Complemento" maxlength="50" >
            <input type="text" name="bairro" class="form-control col" placeholder="Bairro" maxlength="50" required>
            <input type="text" name="cep" class="form-control col" placeholder="Cep" maxlength="50" required id="cep">
        </label>
        <label class="form-inline">
        <input type="text" class="form-control col" name="cidade" placeholder="Cidade" required maxlength="50">
            <select class="form-control col" name="estado" required>
                <option hidden>Selecione o estado</option>
                <option>Selecione o estado</option>
                <option value="AC">Acre</option>
	            <option value="AL">Alagoas</option>
	            <option value="AP">Amapá</option>
	            <option value="AM">Amazonas</option>
	            <option value="BA">Bahia</option>
	            <option value="CE">Ceará</option>
	            <option value="DF">Distrito Federal</option>
	            <option value="ES">Espírito Santo</option>
	            <option value="GO">Goiás</option>
	            <option value="MA">Maranhão</option>
	            <option value="MT">Mato Grosso</option>
	            <option value="MS">Mato Grosso do Sul</option>
	            <option value="MG">Minas Gerais</option>
	            <option value="PA">Pará</option>
	            <option value="PB">Paraíba</option>
	            <option value="PR">Paraná</option>
	            <option value="PE">Pernambuco</option>
	            <option value="PI">Piauí</option>
	            <option value="RJ">Rio de Janeiro</option>
	            <option value="RN">Rio Grande do Norte</option>
	            <option value="RS">Rio Grande do Sul</option>
	            <option value="RO">Rondônia</option>
	            <option value="RR">Roraima</option>
	            <option value="SC">Santa Catarina</option>
	            <option value="SP">São Paulo</option>
	            <option value="SE">Sergipe</option>
	            <option value="TO">Tocantins</option>
            </select>
        </label>
        <input type="submit" value="Enviar" class="btn btn-success btn-block">
        <a href="../../index.php" class="btn btn-light btn-block">Voltar</a>
    </form>
    </section>
    <script>
        $(document).ready(function(){
            $("#telefone").mask("(00) 00000-0000");
            $("#cep").mask("00.000.000");

            $("#form-cadastrar").submit(function(){
                //Aqui se quiser pode fazer outras validações, mas nesse caso farei apenas a validação de ambos campos de senha.
                if($("#senha").val() == $("#re-senha").val()){
                    return true;
                }
                alert('As senhas não sao iguais');
                return false; // Aqui ele irá cancelar o submit tenha seja inválido ambas senhas.
            });
     });
    </script>
</body>
</html>