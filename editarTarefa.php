<?php
require_once 'conexao.php';

$id = preg_replace('/\D/', '', $_POST['id']);

if(isset($_POST['tarefa'])){//Atualiza o registro

$stmt = $bd->prepare('UPDATE tarefas SET descricao = :descricao WHERE id=:id');
$stmt->bindParam(':descricao', $_POST['tarefa']);
$stmt->bindParam(':id', $id);

if($stmt->execute()){
    echo "Tarefa atualizada";
}else{
    echo "Erro ao atualizar a tarefa";
}
};

//query - pegar o resultado
$stmt = $bd->query("SELECT descricao FROM tarefas WHERE id= $id");
$stmt->execute();
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

$img = 'N/D';

if(!empty($tarefa['imagem'])){
    if(is_file($tarefa['imagem'])){
        $img = "<img src='{$tarefa['imagem']'>";
    }
}

echo " <form method='post'>
        <label for='tarefa'>Tarefa</label>
        <input type='text' id='tarefa' name='tarefa' 
            value='{$tarefa['descricao']}'><br><br>
            $img<br><br>
        <img src='{$tarefa['imagem']}'<br><br>
        <input type='hidden' name='id' value='$id'>
        <input type='submit' value='Atualizar'> 
        </form><br><br><a href='listarTarefa.php'>Voltar</a>";