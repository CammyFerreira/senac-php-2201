<?php
require 'conexao.php';
require 'controleDeAcesso.php'; 

$stmt = $bd->query('SELECT id, descricao FROM tarefas');//preparou a consulta

$stmt->execute();//executou

echo "<a href='formulario.php'>+Nova Tarefa</a>
    <form method='post'>
    <table border = '1'> 
            <tr> 
                <td>ID</td>
                <td>Tarefa</td>
                <td>Imagem</td>
                <td>DESCRICAO</td>
                <td>APAGAR/EDITAR</td>
             </tr>";

while($registro = $stmt ->fetch(PDO::FETCH_ASSOC)){

    $img = 'N/D';
    if(!empty($registro['imagem'])){
        if(is_file($registro['imagem'])){
            $img = "<img src='{$registro['imagem']}'>";
        }
    }

echo "<tr>
        <td>{$registro['id']}</td>
        <td>{$registro['descricao']}</td>
        <td>$img</td>
        <td><button name='id' formaction='editarTarefa.php' value='{$registro['id']}'>Editar</button></td>
        <td><button name='id' formaction='apagaTarefa.php' value='{$registro['id']}'>Apagar</button></td>
        </tr>";
}

    echo "</table></form><a href='formulario.php'>Voltar</a>";