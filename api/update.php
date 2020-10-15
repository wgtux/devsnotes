<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'put'){
    //pegamos o metodo raiz e transformamos em array e jogamos em $input
    //pois não tem o metodo put em php
    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;
    $title = $input['title'] ?? null;
    $body = $input['body'] ?? null;

    $id = filter_var($id);
    $title = filter_var($title);
    $body = filter_var($body);

    if($id && $title && $body){

        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount()>0){

            $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE  id = :id");
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->bindValue(':id', $id);
            $sql->execute();

            $array['result']=[
                'id'=>$id,
                'title'=>$title,
                'body'=>$body
            ];
        }
        else{
            $array['error'] = "ID não encontrado";
        }

    }
    else{
        $array['error'] = 'Não foram passados os parametros';
    }
 
}
else {
    $array['error'] = 'Metodo não permitido - Apenas metodos PUT';
}

require('../return.php');