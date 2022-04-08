<?php
require_once 'conexao.php';

//Expressão regular - tudo oq não for dígito transforma em uma String vazia(elimina tudo o que não é número)
$id = preg_replace('/\D/','', $_POST['id']);

if($bd->exec("DELETE FROM tarefas WHERE id = $id")){

    echo "Tarefa apagada com sucesso!";

}else{

    echo "Erro ao tentar apagar tarefa!";
}

echo "<br><br><a href='listarTarefa.php>Voltar</a>'";