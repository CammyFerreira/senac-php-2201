<?php

require 'listar.php';

$nome = $_POST['nome'];// é uma variável super global
//PHP que é usada para coletar dados de formulário após enviar um formulário HTML com method="post". $_POST também é amplamente usado para passar variáveis.
$numero = $_POST['numero'];

echo "$nome, Seja Bem-Vindo!";

for($i=0; $i < $numero && $numero < 10; $i++){
    echo "$nome<br>";
}

//função que cria um banco de dados
    
    $f = fopen('nomes.csv', 'a');
    fwrite($f, "$nome;$numero\r\n");
    fclose($f);

     


//CRUD - Creat, Read, Update, Delete 
//if($i > 1000) break;
//$numero = $numero > 1000 ? 1000 : $numero;
