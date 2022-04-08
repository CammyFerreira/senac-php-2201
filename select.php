<?php

//ligar o php ao banco de dados

$dsn = 'mysql:dbname=php;host=localhost';
$user = "root";
$pass = "";

$bd = new PDO($dsn, $user, $pass);
// FIM da conexão


$stmt = $bd-> query('SELECT id, descricao FROM tarefas');//fazer consulta

$stmt-> execute(); //executar consulta

//exibir numa tabelinha organizada
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
