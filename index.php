<?php

    session_start();

    $requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

    $requisicao = str_replace("/uc7/financeiro","",$requisicao);

    $segmentos = explode("/",$requisicao);

    $controlador = isset($segmentos[0]) ? $seguimentos[0] : "financeiro";
    $metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
    $identificador = isset($segmentos[2]) ? $segmentos[2] : null;

    switch($controlador){
        case "financeiro" :
            require "controllers/FinanceiroController.php";
            $Controller = new FinanceiroController();
            break;
        default :
            echo "<strong>404</strong> = Não encontrado"
            break;
    }