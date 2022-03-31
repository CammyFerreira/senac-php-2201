<?php

//ligar o php ao banco de dados

$dsn = 'mysql:dbname=phpLinguagemServidor;host=localhost';
$user = "root";
$pass = "";

$bd = new PDO($dsn, $user, $pass);
// FIM da conexão