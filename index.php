<?php

$requisicao = trim(strtolower( $_SERVER['REQUEST_URI']));
//echo $requisicao;

$requisicao = str_replace("/test/financias/","",$requisicao);
//echo $requisicao;
$segmentos = explode("/",$requisicao);


$controlador = isset($segmentos[0]) ? $segmentos[0] : "financeiro";
$metodo = isset($segmentos[1]) && $segmentos[1] != "" ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) && $segmentos[2] != "" ? $segmentos[2] : null;

switch($controlador){
    case"financeiro":
        require "controller/FinanceiroController.php";
        $controller = New FinanceiroController();
        break;
        default:
       // echo"Pagina nao encontrada, controlador: $controlador, metodo: $metodo identificador: $indentificador";
        break;
      
}


if ($identificador) {
    
    $controller-> $metodo($identificador);
}else{
    
    $controller->$metodo();
}