<!DOCTYPE html>
<html>
<head>
    <title>Liberar Certificado</title>
    <?php
        include_once('../../system/scripts.php');
    ?>
</head>
<body>
    <header class="header d-flex flex-column bg-noticia">
        <div class="absolute">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Certificado</h1>
    </header>

    <section class="text-center">
        <h3>Sobre o certificado</h3>
        <p>O sistema SIGEV conta com a funcionalidade de geração de certificados para seu evento, assim o organizador do evento não tem que se preocupar com a emissão dos mesmos, facilitando ainda mais a organização e gerenciamento do evento. O certificado contém o nome do participante, o nome do evento, nome e assinatura digitalizada do organizador além da data de emissão do certificado. <b><a href="../usuario/certificado/modelo.pdf" download>Clique aqui</a> para baixar um modelo do certificado.</b></p>
        <h3>Configuração do Certificado</h3>
        <p>Os certificados necessitam de algumas configurações básicas, configurações estas que necessitam de dados como:  nome do evento, nome do organizador e upload da assinatura do organizador, ambos para o certificado. No site do sistema estão disponíveis arquivos em diversos formatos para auxiliar na submissão da assinatura e demais funcionalidades do sistema, portanto antes de fazer as configurações no sistema de uma olhada no site do sistema para obter as informações necessárias.</p>
        <a href="configurar-certificado.php" class="btn btn-success">Configuração do Certificado</a>
    </section>

    <section class="participar">
        <h3>Liberar certificado</h3>
        <?php
        include_once('../../system/banco.php');
        
        $verifica = verifica_certificado($conexao);

        foreach($verifica as $i){
            if($i['resultado'] == 0){
                echo('<div class="text-center">
                        <div class="alert alert-danger" role="alert">
                            Certificado não já foi configurado!
                        </div>
                    </div>');
            } else { //Certificado configurado
                $buscar = ler_evento($conexao);

                foreach($buscar as $i){
                    if($i['certificado'] == 1){
                        //Já liberou
                        echo('<div class="text-center">
                        <div class="alert alert-success" role="alert">
                            Você já liberou o certificado!
                        </div>
                        </div>');
                    } else {
                        //Ainda não liberou
                        echo('<a href="#" class="btn btn-success" onclick="liberar();">Liberar!</a>');
                    }
                }
            }
        }
        ?>
    </section>
    <script>
        function liberar() {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'ativarCertificado.php',
                async: true,
                success: function(response){
                    //
                }
                });
            }
    </script>
</body>
</html>