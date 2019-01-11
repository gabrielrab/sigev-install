<?php
    include_once("../../system/banco.php");
    session_start(); //inicia a sessao
    //se clicou em enviar
    if(isset($_POST['user'])){
        //cria um array para salvar os dados
        $usuario = array();
        //pega user e senha...
        $usuario['user'] = $_POST['user'];
        $usuario['senha'] = $_POST['senha'];
        //busca no banco se existe algum registro com user e senha passados COM LIMIT DE 1
        $sqlBusca = "SELECT * FROM usuario WHERE user ='{$usuario['user']}' AND senha='{$usuario['senha']}' LIMIT 1";
        //Associa o resultado a variavel
        $resultado = mysqli_query($conexao, $sqlBusca);
        $resultado = mysqli_fetch_assoc($resultado);
            
            if(isset($resultado)){
                //Salva um uma sessao os dados do usuario
                $_SESSION['id_usuario'] = $resultado['id_usuario'];
                $_SESSION['user'] = $resultado['user'];
                $_SESSION['nome'] = $resultado['nome'];
                $_SESSION['senha'] = $resultado['senha'];
                $_SESSION['tipo'] = $resultado['tipo'];
                
                
                if($_SESSION['tipo'] == '1'){
                    header('Location: ../adm/dashboard.php');
                } else{
                    header('Location: painel-user.php');
                }
                                
            } else{
                //Deu errado
                echo "<script>alert('Senha Errada');</script>";
                sleep(1);
                header('Location: login.php');
            }
            
            
            
            
        } else{
            //echo "Estamos com alguns problemas...";
        }
        
    ?>