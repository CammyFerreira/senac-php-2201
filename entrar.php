<?php
session_start();
require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

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
    echo "Credenciais inválidas";
}