<?php
require 'conexao.php';

$stmt = $bd->query('SELECT id, descricao FROM Tarefa');//preparou a consulta

$stmt->execute();//executou

echo "<table border = '1'> 
            <tr> 
                <td>ID</td><td>DESCRICAO</td>
             </tr>";


//recupera primeiro registro, se colocar de novo, sempre vai resgatar a primeira inserção
/*colocou a repetição da exibição dos registros*/while($registro = $stmt ->fetch(PDO::FETCH_ASSOC)){


echo "<tr>
        <td>{$registro['id']}</td>
        <td>{$registro['descricao']}</td>
        </tr>";
}

    echo "</table>";