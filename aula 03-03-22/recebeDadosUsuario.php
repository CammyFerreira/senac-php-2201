<?php

//include não dá erro fatal 
//require dá erro fatal - essencial para continuar o funcionamento do programa

require 'funcoesAluno.php';

$matricula = $_POST['matricula']; 
$aluno = $_POST['aluno'];

if(cadastraAluno(['matricula' => $matricula, 'nome' => $aluno])){
    echo "$aluno, você foi matriculado(a) com sucesso!";
}else{
    echo "$aluno, alguma coisa deu errado :c";
}

echo "<br><br><a href='dadosUsuario.php'>Cadastrar outro</a>
        <br><br>
        <a href='listarUsuarios.php'>Listar Alunos</a>";


//require_once - verifica se já fez o include do arquivo 