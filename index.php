<?php

    session_start();

    $requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

    $requisicao = str_replace("/uc7/financeiro/","",$requisicao);

    $segmentos = explode("/",$requisicao);

    $controlador = isset($segmentos[0]) ? $segmentos[0] : "financas";
    $metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
    $identificador = isset($segmentos[2]) ? $segmentos[2] : null;

    switch($controlador){
        case "financas" :
            require "controllers/FinanceiroController.php";
            $controller = new FinanceiroController();
            break;
        default :
            echo "<strong>404</strong> = Não encontrado";
            break;
    }

    if($identificador) {
        $controller->$metodo($identificador);
    }else{
        $controller->$metodo();
    }