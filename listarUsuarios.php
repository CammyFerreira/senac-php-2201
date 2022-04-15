<?php
require 'conexao.php';
require 'controleDeAcesso.php';

$stmt = $bd->query('SELECT id, descricao FROM usuarios');//preparou a consulta

$stmt->execute();//executou

echo "<a href='formUsuario.php>+ Novo Usuário</a><br>
    '<form method='post'>

<table border = '1'> 
            <tr> 
                <td>EMAIL</td><td>NOME</td>
             </tr>";

while($registro = $stmt ->fetch(PDO::FETCH_ASSOC)){


echo "<tr>
        <td>{$registro['id']}</td>
        <td>{$registro['nome']}</td>
        <td><button name='id' formaction='editarUsuario.php' value='{$registro['id']}'>Editar</button></td>
        <td><button name='id' formaction='apagarUsuario.php' value='{$registro['id']}'>Apagar</button></td>
        </tr>";
}

    echo "</table></form><a href='formUsuario.php'>Menu</a>";