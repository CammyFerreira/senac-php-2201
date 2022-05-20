<?php
require_once '../conexao.php';

 $metodo = $_SERVER['REQUEST_METHOD'];

//Se o requisitante usar o método GET
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $strSql = '';

    if(isset($_GET['id'])){

        $id = PREG_REPLACE('/\D/', '', $_GET['id']);
        $strSql = "WHERE id = $id" ;
    }


    $stmt = $bd->query('SELECT id, descricao, imagem, apagado FROM tarefas ' .$strSql);
    $stmt->execute();

    $saida = [];

    while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

        if($registro['apagado'] == 1){
            
            if(isset($_GET['id'])) exit(204);
            
            continue;
        }

        $saida[] = $registro;
    }

    if(count($saida) <= 0){
        http_response_code(404);
        exit();
    }

    http_response_code(200);  

    echo json_encode($saida);

    exit();  
}
//FIM Se o requisitante usar o método GET

//Se o requisitante usar o método POST ou PUT
if($metodo == 'POST' || $metodo == 'PUT'){
    
    $tarefa = json_decode(file_get_contents('php//input'));
    
    //faz a validação vendo se a descrição e imagem estão preenchidas
    if(json_last_error() != JSON_ERROR_NONE){

        echo json_encode(['erro' => 'JSON inválido']);
        exit(http_response_code(400));
    }
    
    if(!isset($tarefa->descricao) || !isset($tarefa->imagem)){
        
        echo json_encode(['erro' => 'Campos Obrigatórios: descricao e imagem']);
        exit(http_response_code(400));
    }

    $stmt = $bd->prepare('INSERT INTO tarefas(descricao, imagem) VALUES (:descricao, :imagem)');
    $stmt->bindParam(':descricao', $tarefa->descricao);
    $stmt->bindParam(':imagem', $tarefa->imagem);
    $stmt->execute();
    $id = $bd->lastInsertId();

    echo json_encode(['id' => $id]);

    exit(http_response_code(200));
    
}

//Se o requisitante usar o método DELETE
if($metodo == 'DELETE'){

        if(!isset($_GET['id'])){
            echo json_encode(['erro' => 'ID não fornecido']);
            exit(http_response_code(400));
        }

        $id = preg_replace('/\D/', '', $_GET['ID']);

        $stmt = $bd->query("UPDATE tarefas SET apagado = 1 WHERE id=$id");
        if($stmt->execute()){
            exit(http_response_code(500));
        }


        // if($stmt->rowCount() <= 0){
        //     exit(http_response_code(204));
        // }

        exit(http_response_code(200));

}

//Se o requisitante usar o método PATCH
if($metodo == 'PATCH'){
    $tarefa = json_decode(file_get_contents('php//input'));
    
    if(json_last_error() != JSON_ERROR_NONE){

        echo json_encode(['erro' => 'JSON inválido']);
        exit(http_response_code(400));
    }
    
    if(!isset($tarefa->descricao) || !isset($tarefa->imagem)){
        
        echo json_encode(['erro' => 'Campos Obrigatórios: descricao e imagem']);
        exit(http_response_code(400));
    }

    $stmt = $bd->prepare('UPDATE tarefas SET descricao = :descricao, imagem = :imagem WHERE id = :id');
    $stmt->bindParam(':descricao', $tarefa->descricao);
    $stmt->bindParam(':imagem', $tarefa->imagem);
    $stmt->bindParam(':id', $tarefa->id);
    
    if($stmt->execute()){
        exit(http_response_code(200));
    }else{
        exit(http_response_code()200);
    }
   

    
}
//FIM se o requisitante usar o método PATCH

//Retorna código de erro método não permitido
http_response_code(405);


