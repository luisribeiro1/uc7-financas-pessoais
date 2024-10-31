<?php

# Inicializa a sessão, permitindo que variáveis de sessão sejam criadas e usadas
session_start();

# Captar a URL redirecionada no .htaccess
# trim limpa caracteres vazios no início e final do texto
# strtolower() converte para minúsculos
$requisicao = trim(strolower($_SERVER['REQUEST_URI']));

# Substituir a parte da URL que não é útil
$requisicao = str_replace("/uc7/financeiro/","",$requisicao);

# Divide em partes, usando a barra como separador. Cria um array de indice
$segmentos = explode("/",$requisicao);

# Verifica o padrão da rota
$controlador = isset($segmentos[0])
    ? $segmentos[0]
    : "financeiro";

$metodo = isset($segmentos[1])
    ? $segmentos[1]
    : "index";

$identificador = isset($segmentos[2])
    ? $segmentos[2]
    : null;

switch($controlador){
    case "financeiro" :
        require "controllers/FinanceiroController.php";
        $controller = new FinanceiroController();
        break;    

        default:
        echo "Página não encontrada";
        break;
}

# Chama o método do controlador com ou sem o parâmetro $id
if ($identificador) {
    # Usado para os métodos excluir e editar, pois ambos usam o identificador
    $controller->$metodo($identificador);
}else{
    # Usado para os métodos index e criar
    $controller->$metodo();
}

    