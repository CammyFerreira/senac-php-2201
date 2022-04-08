<?php

//ligar o php ao banco de dados

$dsn = 'mysql:dbname=php;host=localhost';
$user = "root";
$pass = "";


$bd = new PDO($dsn, $user, $pass);
//FIM Conecta no Banco de Dados

//INSERT
$inseriu = $bd->exec('INSERT INTO tarefas (descricao) VALUES ("Mais uma tarefa inserida via php")');


if($inseriu){
 
    echo "Gravou!";

}else{
    echo "Ai meu Deus!";
}
//FIM INSERT

//DELETE
$apagou = $bd->exec('DELETE FROM tarefas WHERE id=18');
//FIM DELETE
if($inseriu){
 
    echo "Apagou!";

}else{
    echo "Ai meu Deus, não apagou!";
}