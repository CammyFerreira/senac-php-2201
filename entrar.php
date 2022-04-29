<?php
session_start();
require_once 'conexao.php';

//trim - tira qualuqer espaço que tiver na frente ou atrás de uma String
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if(empty($email || empty($senha))){
   
    header('location: index.php');

}


$stmt = $bd -> prepare("SELECT senha FROM usuarios WHERE id = :email");
//substituição do label pelo valor
$stmt->bindParam(':email', $email);
$stmt->execute();

//fetch - retorno da consulta: retorna um vetor onde os indices do vetor são alfanumericos 
$val = $stmt->fetch(PDO::FETCH_ASSOC);

if(password_verify($senha, $val['senha'])){
    $_SESSION['id'] = $email;

    header('location: index.php');
    
}else{
    echo "Credenciais inválidas<br><br><a href='index.php'>Voltar</a>";
}