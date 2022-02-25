<?php

$usuario[0] = ["nome" => "Luiz", "senha" => 123];
$usuario[1] = ["nome" => "Fer", "senha" => 321];
$usuario[2] = ["nome" => "Bono", "senha" => 627];

echo '<table border=1>
    <tr>
        <td>ID</td><td>NOME</td><td>SENHA</td>
    </tr>';

foreach ($usuario as $id => $valor) {
    
    echo '<tr>';

    echo "<td>$id</td><td>{$valor['nome']}</td><td>{$valor['senha']}</td>";

    echo '</tr>';
}
    echo '</table>';

$dias = ['Dom' => ['Domingo', 'Domingo'],
'Seg' => ['Segunda', 'Segunda-Feira'],
'Ter' => ['Terça', 'Terça-Feira'],
'Qua' => ['Quarta', 'Quarta-Feira'],
'Qui' => ['Quinta', 'Quinta-Feira'],
'Sex' => ['Sexta', 'Sexta-Feira'],
'Sab' => ['Sabado', 'Sábado']];

foreach ($dias as $id => $nomes){

    echo "$id: {$nomes[0]} ou {$nomes[1]}<br>";
} 


foreach ($dias as $id => [$nomesimples, $nomecomposto]){

    echo "$id: {$nomesimples} ou {$nomecomposto}<br>";
} 