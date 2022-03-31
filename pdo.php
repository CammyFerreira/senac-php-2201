<?php

//ligar o php ao banco de dados

$dsn = 'mysql:dbname=phpLinguagemServidor;host=localhost';
$user = "root";
$pass = "";


$bd = new PDO($dsn, $user, $pass);
//FIM Conecta no Banco de Dados

//INSERT
$inseriu = $bd->exec('INSERT INTO Tarefa (descricao) VALUES ("Mais uma tarefa inserida via php")');


if($inseriu){
 
    echo "Gravou!";

}else{
    echo "Ai meu Deus!";
}
//FIM INSERT

//DELETE
$apagou = $bd->exec('DELETE FROM Tarefa WHERE id=18');
//FIM DELETE
if($inseriu){
 
    echo "Apagou!";

}else{
    echo "Ai meu Deus, não apagou!";
}