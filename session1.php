<?php
session_start();

$_SESSION['nome'] = 'Camila';

echo $_SESSION['nome'];