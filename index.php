<?php
session_start();

$endereco = trim(strtolower($_SERVER['REQUEST_URI']));

$endereco = str_replace("/atividade/financas_pessoais/", "", $endereco);

$segmentos = explode("/", $endereco);

$controlador = isset($segmentos[0]) ? $segmentos[0] : "financas";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] :  null;

switch($controlador){
    case "financas":
        require "controllers/FinanceiroController.php";
        $controller = new FinanceiroController();
        break;
    default: 
    echo "controlador $controlador , metodo $metodo, identificador $identificador";
}

if($identificador){
    $controller->$metodo($identificador);
}else{
    $controller->$metodo();
}
