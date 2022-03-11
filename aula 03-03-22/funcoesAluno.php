<?php

function cadastraAluno(array $aluno): bool
{
//função que cria um banco de dados
    $f = fopen('alunos.csv', 'a');
    $escreveu = fwrite($f, "{$aluno['matricula']};\" {$aluno['nome']}\"");
    fclose($f);

    if($escreveu){
        return true;
    }else{
    return false;
    }
}

function listarAlunos():array{
$alunos = [];

    $f = fopen('alunos.csv', 'r');

    while($linha = fgets($f)){

        var_dump($linha);
        echo"<br>";
    }
    return $alunos;
}