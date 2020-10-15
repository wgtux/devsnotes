<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'delete'){
    //pegamos o metodo raiz e transformamos em array e jogamos em $input
    //pois não tem o metodo put em php
    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;
    $id = filter_var($id);
   
    if($id){
        $sql = $pdo->prepare("DELETE FROM notes WHERE  id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
    else{
        $array['error'] = "ID NÃO ENVIADO";
    }
} 
else{
    $array['error'] = 'Metodo não permitido - Apenas metodos DELETE';
}

require('../return.php');