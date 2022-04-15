<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location: login.php');
    //matar o processamento
    exit();
}