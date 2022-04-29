<?php

require 'controleDeAcesso.php';

require 'conexao.php'; //busca o código para eu não ter que repetir

$tarefa = $_POST['tarefa'];//isso foi digitado pelo usuário. o dado ainda é inseguro

if($_FILES['figura']['error'] == 0 && 
    $_FILES['figura']['size'] > 0){

    $mimeType = mime_content_type($_FILES['figura']['tmp_name']);

    $campos = explode('/', $mimeType);

    $tipo = $campos[0];

    $ext = $campos[1];

    if($tipo == 'imagem'){
        
    $arquivoEnviado = 'imagem/' . $_FILES['figura']['name'] . '_' . md5(rand(-99999, 99999) . microtime()) . '.' . $ext;

    move_uploaded_file($_FILES['figura']['tmp_name'], 
                        "imagens/$arquivoEnviado");
    }else{
        echo "Só é possível enviar tipo de arquivo de imagens<br><br>";
    }
}
$stmt = $bd->prepare('INSERT INTO tarefas (descricao, imagem) VALUES (:tarefa, :imagem)');//statement prepara a consulta

$stmt->bindParam(':tarefa' , $tarefa);//se uma coisa potencialmente perigosa for digitada pelo usuário, ele será analisado mas não danificará o banco. fica gravado como dado apenas
$stmt->bindParam(':imagem' , $arquivoEnviado);

//isso insere na tabela de tarefas e se der certo, avisa o usuário e senão, avisa também
if($stmt->execute()){

    echo "$tarefa gravada com sucesso!"; 
} else {
    echo "nada foi gravado.";
}

echo "<a href='formulario.php'>Voltar</a>";
echo "<a href='listarTarefa.php'>Lista de tarefas</a>";