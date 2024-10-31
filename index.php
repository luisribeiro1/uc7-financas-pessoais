<?php
session_start();

$endereco = trim($_SERVER['REQUEST_URI']);

$segmentos = str_replace("/atividade/financas/", "", $segmentos);

$segmentos = explode('/', $endereco, $segmentos);

$controlador = isset($segmentos[0]) ? $segmentos[0] : $controlador = "financeiro";
$metodo = isset($segmentos[1]) ? $segmentos[1] : $metodo = "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : $identificador = null;


switch($controlador){
    case "financas":
        require "controllers/FinanceiroController.php";
        $controller = new FinanceiroController
        break;
    default: 
    echo "Pagina não encontrada";
}

if($identificador){
    $controller->$metodo($identificador);
}else{
    $controller->$metodo();
}