<?php
session_start();

$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

$requisicao = str_replace("financas_pessoais/","",$requisicao);

$segmentos = explode("/",$requisicao);

$controlador = isset($segmentos[0]) ? $segmentos[0] : "financeiro-adm";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

switch($controlador){
    case "finceiro-adm":
        require "controllers/FinanceiroController.php";
        $controller = new FinanceiroController();
        break;
        default:
        echo "Pagina não encontrada";
        break;
    
}
if ($identificador){
    $controller->$metodo($identificador);
}else{  
    $controller->$metodo();
}



