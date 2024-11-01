<?php

session_start();

# Captar a URL redirecionada no .htaccess ($_ indica uma super global)
# trim() limpa caracteres vazios no inicio e final do texto.
# strlower() converte tudo o que for digitado na URL em letras minusculas
$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

# Substituir a parte da URL que não é útil
$requisicao = str_replace("/uc7/financas_pessoais/","", $requisicao);

# Divide em partes, usando a barra como separador. Cria um array de índice 
$segmentos = explode("/", $requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0]) ? $segmentos[0] : "financeiro";
$metodo = isset($segmentos[1]) ? $segmentos[1] : "index";
$identificador = isset($segmentos[2]) ? $segmentos[2] : null;

switch($controlador){
    case "financeiro":
        require "controllers/FinanceiroController.php";
        $controller = new FinanceiroController();
        break;

    default:
        echo "Página não encontrada";
        break;
}

# Chama o método do controlador com ou sem o parâmetro $id

if($identificador) {

    # Usado para os métodos excluir e editar, pois ambos usam o identificador
    $controller->$metodo($identificador);
}
else{

    $controller->$metodo();
}