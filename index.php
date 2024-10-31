<?php

session_start();

$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

$requisicao = str_replace("/uc7/finanças-pessoais/", "", $requisicao);

$segmentos = explode("/", $requisicao);

$controlador = isset($segmentos[0]) ? $seguimentos[0] : "finaceiro";
$metodo = isset($segmentos[1]) ? $seguimentos[1] : "index";
$identificador = isset($segmentos[2]) ? $seguimentos[2] : null;

switch ($controlador) {
  
  case 'finaceiro';
    require "controllers/FinanceiroController.php";
    // $controller = new FinanceiroController();
    break;

    default:
    $baseUrl = "http://localhost/uc7/financeiro";
    header("location: " . $baseUrl . "/views/pagina-404.html");
    break;
}

if ($identificador) {
  $controller->$metodo($identificador);
} else {
  $controller->$metodo();
}