<?php

//comentário 

/*
Comentário de bloco
*/

define('XPTO', 'Valor sempre igual');

echo XPTO;

$num = 2;

$var = '<br>' . "Olá mundo! $num";

echo $var;

echo '<br><br><h1>Vamos tomar um café!</h1>';

//var_dump($var);

//phpinfo(); Informações importantes, como variáveis de ambiente

$domingo = 'Domingo';
$segunda = 'Segunda';
$terça = 'Terça-Feira';
$quarta = 'Quarta-Feira';
$quinta = 'Quinta-Feira';
$sexta = 'Sexta-Feira';
$sabado = 'Sábado';

$diaSemana = [ 1 => 'Domingo',  
               2 => 'Segunda', 
               3 => 'Terça', 
               10 => 'Quarta', 
               3 => 'Quinta', 
               4 => 'Sexta', 
               5 => 'Sábado'];

$contatos = ['Carol', 'Rebeca', 'Robson', 'Pedro'];

echo "<pre>";
var_dump($diaSemana);

echo "<br>Hoje é {$diaSemana[10]}";//interpolação com {}
echo "<br>Hoje é " . $diaSemana[3];


$usuario = [
           ["NOME" => "Luiz", "SENHA" => 123],
           ["NOME" => "Fer", "SENHA" => 321],
           ["NOME" => "Bono", "SENHA" => 627]
];

var_dump($usuario);