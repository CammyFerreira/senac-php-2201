<?php

//No php não é obrigatório mas é recomendado fazer inferência de tipo
//variavel de escopo de função: só existe dentro da função. Ex: aluno 

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

$funcionou = cadastraAluno(['matricula' => 863123, 'nome' => 'Amanda']);

if($funcionou){
    echo "<br> Minha função funcionou!";
}else{
    echo "<br> Minha função NÃO funcionou!";
}
