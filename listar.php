<?php

$f = fopen('nomes.csv', 'r');

echo "<a href='index.php'>Voltar</a>";

echo "<table border='1'>
        <tr>
            <td>Nome</td><td>Repeticoes</td>
        </tr>";

while($linha = fgets($f)){

        $campos = explode(';', $linha); //Divide uma string em strings
        $nome = $campos[0];
        $rep = $campos[1];
        
        echo " <tr> 
                    <td>$nome</td><td>$rep</td>
                </tr>";
    }

    echo "</table>";
