<?php

/*-- SELECT coluna1, coluna2, colunaN FROM tabela WHERE   =value;
 --  UPDATE tabela SET coluna1 = valor, coluna2 = valor WHERE colunax = valor;
 -- INSERT INTO tabela (co1, col2, colN) VALUES 
*/


//ligar o php ao banco de dados

$dsn = 'mysql:dbname=phpLinguagemServidor;host=localhost';
$user = "root";
$pass = "";

$bd = new PDO($dsn, $user, $pass);
// FIM da conexão


//para atualizar registro na tabela
$trocou = $bd->exec('UPDATE Tarefa SET descricao = "Estudar php" WHERE id=1');
//FIM atualização de registro

if( $trocou ){
 
    echo "Atualizado.";

}else{
    echo "Registro não atualizado.";
}