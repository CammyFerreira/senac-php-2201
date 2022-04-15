<?php

require 'controleDeAcesso.php';

require 'conexao.php'; //busca o código para eu não ter que repetir

$tarefa = $_POST['tarefa'];//isso foi digitado pelo usuário. o dado ainda é inseguro

if($_FILES['figuras']['error'] == 0 && $_FILES['figuras']['size'] > 0){
    move_uploaded_file($_FILES['figura']['tmp_name'], "imagens/{$_FILES['figura']['name']}");
}

$stmt = $bd->prepare('INSERT INTO tarefas (descricao) VALUES (:tarefa)');//statement prepara a consulta

$stmt->bindParam(':tarefa' , $tarefa);//se uma coisa potencialmente perigosa for digitada pelo usuário, ele será analisado mas não danificará o banco. fica gravado como dado apenas

//isso insere na tabela de tarefas e se der certo, avisa o usuário e senão, avisa também
if( $bd->exec("INSERT INTO tarefas (descricao) VALUES ('$tarefa')")){

    echo "$tarefa gravado"; 
} else {
    echo "nada foi gravado.";
}

echo "<a href='formulario.php'>Voltar</a>";
echo "<a href='listarTarefa.php'>Lista de tarefas</a>";