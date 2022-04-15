
<?php
require 'controleDeAcesso.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h5>CRUD Usuários</h5>
    <div>
        <form action="gravaUsuario.php" method="post">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome">
            <br>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha">
            <br>
            <label for="confirmacao_senha">Confirme a senha</label>
            <input type="password" id="confirmacao_senha" 
                    name="confirmacao_senha">
            <br><br>
            <input type="submit" value="Gravar">
        </form>
    </div>
    <div>
        <a href="listarUsuarios.php">Listar</a>
    </div>
</body>
</html>