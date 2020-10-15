<?php
//permite acesso de todos os sites
header("Access-Control-Allow-Origin: *") ;
//Permite acesso a todos os methodos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//Dizer que é um arquivo Json
header("Content-Type: application/json");
//convert o array em arquivo json
echo json_encode($array);
exit; 