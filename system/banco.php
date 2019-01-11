<?php

include_once('config.inc.php');

$conexao = mysqli_connect($hostname, $username, $password, $database);

mysqli_set_charset($conexao, "utf8");

if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}
function criar_evento($conexao, $inserir){
    $sql="INSERT INTO evento (nome, subtitulo, descricao, avaliacao, certificado, trabalho, oficina, logo, banner) VALUES(
        '{$inserir['nome']}',
        '{$inserir['subtitulo']}',
        '{$inserir['descricao']}',
        '0',
        '0',
        '0',
        '0',
        '{$inserir['logo']}',
        '{$inserir['banner']}'
        );";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

function ler_evento($conexao){
    $sql="SELECT * FROM evento";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }

 function atualizar_evento($conexao, $inserir){
    $sql="UPDATE evento SET nome='{$inserir['nome']}', subtitulo='{$inserir['subtitulo']}', descricao='{$inserir['descricao']}', logo='{$inserir['logo']}', avaliacao='{$inserir['avaliacao']}', certificado='{$inserir['certificado']}', trabalho='{$inserir['trabalho']}', oficina='{$inserir['oficina']}' WHERE id_evento = '{$inserir['id']}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function atualizar_dados_evento($conexao, $inserir){
   $sql="UPDATE evento SET nome='{$inserir['nome']}', subtitulo='{$inserir['subtitulo']}', descricao='{$inserir['descricao']}' WHERE id_evento = '{$inserir['id']}';";
   mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
}

 function criar_programacao($conexao, $inserir){
    $sql="INSERT INTO programacao (data, descricao) VALUES(
        '{$inserir['data']}',
        '{$inserir['descricao']}',
        );";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 } 

 function ler_programacao($conexao){
    $sql="SELECT * FROM programacao";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }

 function atualizar_programacao($conexao, $inserir){
    $sql="UPDATE programacao SET data='{$inserir['data']}', descricao='{$inserir['descricao']}' WHERE id_programacao = '{$inserir['id']}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function deletar_programacao($conexao, $id){
    $sql="DELETE FROM programacao WHERE id_programacao ='{$id}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function criar_noticia($conexao, $inserir){
    $sql="INSERT INTO noticia (titulo, subtitulo, descricao) VALUES(
        '{$inserir['titulo']}',
        '{$inserir['subtitulo']}',
        '{$inserir['descricao']}'
        );";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }
 
 function ler_noticia($conexao){
    $sql="SELECT * FROM noticia";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }

 function ler_noticia_esp($conexao, $id){
    $sql="SELECT * FROM noticia WHERE id_noticia = '{$id}'";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }

 function ler_noticia_limitador($conexao){
    $sql="SELECT * FROM noticia ORDER BY id_noticia DESC LIMIT 3";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }

 function atualizar_noticia($conexao, $inserir){
    $sql="UPDATE noticia SET titulo='{$inserir['titulo']}', subtitulo='{$inserir['subtitulo']}', descricao='{$inserir['descricao']}' WHERE id_noticia = '{$inserir['id']}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function deletar_noticia($conexao, $id){
    $sql="DELETE FROM noticia WHERE id_noticia ='{$id}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function criar_organizacao($conexao, $inserir){
    $sql="INSERT INTO organizacao (nome, descricao) VALUES(
        '{$inserir['nome']}',
        '{$inserir['descricao']}',
        );";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function ler_organizacao($conexao){
    $sql="SELECT * FROM organizacao";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
 }

 function atualizar_organizacao($conexao, $inserir){
    $sql="UPDATE organizacao SET nome='{$inserir['nome']}', descricao='{$inserir['descricao']}' WHERE id_organizacao = '{$inserir['id']}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function deletar_organizacao($conexao, $id){
    $sql="DELETE FROM organizacao WHERE id_organizacao ='{$id}';";
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
 }

 function cadastrar_usuario($conexao, $enviar, $endereco){
    $sql = "INSERT INTO usuario (nome, telefone, email, user, senha, tipo) VALUES(
        '{$enviar['nome']}',
        '{$enviar['telefone']}',
        '{$enviar['email']}',
        '{$enviar['user']}',
        '{$enviar['senha']}',
        '{$enviar['tipo']}'
    );";
    
    //die($sql);
    mysqli_query($conexao, $sql);
    
    $id_usuario = mysqli_insert_id($conexao);
    
    $sql = "INSERT INTO endereco (id_usuario, rua, bairro, cidade, estado)
    VALUES(
        '{$id_usuario}',
        '{$endereco['rua']}',
        '{$endereco['bairro']}',
        '{$endereco['cidade']}',
        '{$endereco['estado']}'
    );";
    
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

//DASHBOARD
function contar_usuarios($conexao){
    $sql="SELECT COUNT(id_usuario) AS resultado FROM usuario;";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function contar_avaliacao($conexao){
    $sql="SELECT COUNT(id_avaliacao) AS resultado FROM avaliacao;";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function contar_noticias($conexao){
   $sql="SELECT COUNT(id_noticia) AS resultado FROM noticia;";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function contar_programacao($conexao){
   $sql="SELECT COUNT(id_programacao) AS resultado FROM programacao;";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function contar_trabalho($conexao){
    $sql="SELECT COUNT(id_trabalho) AS resultado FROM trabalho;";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

//Trabalho

function cadastrar_trabalho($conexao, $enviar){
    $sql = "INSERT INTO trabalho (titulo, pc1, pc2, pc3, resumo, referencias, upload) VALUES( 
       '{$enviar['nome_trabalho']}',  
       '{$enviar['pc1']}', 
       '{$enviar['pc2']}', 
       '{$enviar['pc3']}', 
       '{$enviar['resumo']}', 
       '{$enviar['referencias']}', 
       '{$enviar['upload']}' 
    );";
    
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
    
    $id_trabalho = mysqli_insert_id($conexao);
    $id_usuario = $enviar['id_usuario'];
    
    $sql = "INSERT INTO publica (id_usuario, id_trabalho, data, status, tipo) VALUES(
        '{$id_usuario}',
        '{$id_trabalho}',
        '{$enviar['data']}',
        '{$enviar['situacao']}',
        '0'
    );";
    
    mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
    
    return $id_trabalho;
}
function cadastrar_autor($conexao, $autor, $instituicao, $id_trabalho){
    $sql = "INSERT INTO autor (nome_autor, instituicao_autor, id_trabalho) VALUES(
           '{$autor}',
           '{$instituicao}',
           '{$id_trabalho}'
       );";
   
   mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
}

function ler_trabalho($conexao){
    $sql = "SELECT t.id_trabalho, t.titulo, p.status, p.tipo FROM trabalho t, publica p WHERE t.id_trabalho = p.id_trabalho;";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function ler_trabalho_usuario($conexao, $id){
   $sql = "SELECT t.id_trabalho, t.titulo, p.status, p.tipo FROM trabalho t, publica p WHERE t.id_trabalho = p.id_trabalho and p.id_usuario = '{$id}';";
   
   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function outras_informacoes($conexao, $id){
   $sql = "select t.id_trabalho, t.titulo, t.pc1, t.pc2, t.pc3, t.resumo, t.referencias, t.upload, p.data, p.status from trabalho t, publica p where t.id_trabalho = '{$id}' limit 1;";
   
   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function atualizar_situacao($conexao, $atualiza){
   $sql = "UPDATE publica SET status = '{$atualiza['situacao'] }' WHERE publica.id_trabalho = {$atualiza['id_trabalho']};";
   
   mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
}

function configurar_trabalho($conexao, $tipo){
   $sql = "UPDATE evento SET trabalho ='{$tipo}';";

   mysqli_query($conexao, $sql) or die("Erro: ".mysqli_error($conexao));
}

function configurar_avaliacao($conexao, $tipo){
   $sql = "UPDATE evento SET avaliacao ='{$tipo}';";

   mysqli_query($conexao, $sql) or die("Erro: ".mysqli_error($conexao));
}

function criar_avaliacao($conexao, $inserir){
   $sql="INSERT INTO avaliacao (id_usuario, nota_evento, comentario_evento, nota_organizacao, comentario_organizacao, nota_sistema, comentario_sistema) VALUES(
       '{$inserir['id_usuario']}',
       '{$inserir['nota_evento']}',
       '{$inserir['comentario_evento']}',
       '{$inserir['nota_organizacao']}',
       '{$inserir['comentario_organizacao']}',
       '{$inserir['nota_sistema']}',
       '{$inserir['comentario_sistema']}'
       );";
   mysqli_query($conexao, $sql) or die ("Erro ao inserir dados: ".mysqli_error($conexao));
}

function avaliou_evento($conexao, $id){
   $sql = "select count(id_usuario) as resultado from avaliacao where id_usuario = {$id};";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function criar_oficina($conexao, $inserir){
   $sql = "INSERT INTO oficinas (titulo, descricao, data, vagas) VALUES(
      '{$inserir['titulo']}',
      '{$inserir['descricao']}',
      '{$inserir['data']}',
      '{$inserir['vagas']}',
      '{$inserir['local']}',
      '{$inserir['horario']}',
   );";

   mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function ler_oficinas ($conexao){
   $sql = "SELECT * FROM oficinas;";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function ler_oficina_esp ($conexao, $id){
   $sql = "SELECT * FROM oficinas WHERE id_oficina = '{$id}';";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function ler_oficinas_limitador ($conexao){
   $sql = "SELECT * FROM oficinas LIMIT 3;";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function remover_oficina($conexao, $id){
   $sql = "DELETE FROM oficinas WHERE id_oficina = '{$id}';";
   mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   $sql = "DELETE FROM participacao WHERE id_oficina = '{$id}';";
   mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

//Participação
function cadastra_participacao_oficina($conexao, $usuario, $oficina){
   $sql="INSERT INTO participacao (id_usuario, id_oficina) VALUES(
       '{$usuario}',
       '{$oficina}'
   );";
   
   mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function remover_participacao($conexao, $oficina, $usuario){
   $sql = "DELETE FROM participacao WHERE id_oficina = '{$oficina}' AND id_usuario = '{$usuario}';";
   
   mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function contar_vagas($conexao, $oficina){
   $sql = "select oficinas.vagas - count(participacao.id_participacao) as vagas from oficinas, participacao where participacao.id_oficina = '{$oficina}' and oficinas.id_oficina = '{$oficina}';";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function buscar_participacao($conexao, $oficina, $id){
   $sql = "select count(participacao.id_participacao) as resultado from participacao where id_oficina = '{$oficina}' and id_usuario = '{$id}';";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function verifica_certificado($conexao){
   $sql = "SELECT COUNT(id_certificado) as resultado FROM certificado;";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function cadastra_certificado($conexao, $inserir){
   $sql="INSERT INTO certificado (nome_organizador, assinatura) VALUES(
      '{$inserir['nome_organizador']}',
      '{$inserir['assinatura']}'
   );";

   mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function configurar_certificado($conexao){
   $sql = "UPDATE evento SET certificado = 1 ;";

   mysqli_query($conexao, $sql) or die("Erro: ".mysqli_error($conexao));
}

function dados_certificado($conexao, $usuario){
   $sql = "SELECT usuario.nome, evento.nome as evento, certificado.nome_organizador FROM usuario, evento, certificado WHERE usuario.id_usuario = '{$usuario}';";

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
?>