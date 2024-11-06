<?php
// inicializa a sessao, permitindo que variaveis de sessao sejam criadas e usadas

# Captar a URL reridicionada no .htaccess  ($_indica uma super global)
# trim() limpa caracteres vazios no inicio e final do texto.
# srttolower() converte para minuscula
$requisicao = trim(strtolower($_SERVER["REQUEST_URI"]));

# Subistitui a parte da url que não é util
$requisicao = str_replace("/teste/Financas-Pessoais/","", $requisicao);

//$requisicao = strtolower($requisicao);
//echo $requisicao;

#Divide em partes , usando a barra como separador. Cria um array de indice
$segmentos = explode("/",$requisicao);
//var_dump($segmentos);

# verifica o padrao da rota

# Segmentos [0] contera o primeiro  elemento da rota que identificamos com o controller , ou seja ,o metodo
#aqui verificamos se ela existe e nao for  vazio. caso sim assume  index como matodo

$controlador = isset($segmentos[0]) ? $segmentos[0] : "financeiro";


$metodo = isset($segmentos[1]) && $segmentos[1]!="" ? $segmentos[1] : "index";

# Segmentos [1] contera o segundo  elemento da rota , ou seja ,o metodo
#aqui verificamos se ela existe e nao for  vazio. caso sim assume  index como matodo

$identificador = isset($segmentos[2]) && $segmentos[2]!="" ? $segmentos[2] : null;
# Segmentos [2] contera o terceiro  elemento da rota , ou seja , identificador
#aqui verificamos se ela existe e nao for  vazio. caso sim assume  null

// echo "<br>". $controlador;
// echo "<br>". $metodo;
// echo "<br>". $identificador;

# mesa/editar/4
# controller     (mesa)
# metodo         (editar)
# identificador   (4)
# mesa/novo 
switch($controlador){
    case "financeiro":
        require "controllers/financeirocontroller.php";
        $controller = new FinanceiroController();
        // $controller->index();
        break;

    default:
     echo "Página não encontrada,"; 
     break;    
    
        
}

// Verifica se o controlador foi instanciado corretamente
if (isset($controller)) {
    // Chama o método do controlador com ou sem o parâmetro $identificador
    if ($identificador) {
        // Se o identificador estiver presente, passa ele para o método
        if (method_exists($controller, $metodo)) {
            $controller->$metodo($identificador);
        } else {
            echo "Método não encontrado: $metodo";
        }
    } else {
        // Se o identificador não estiver presente, chama o método sem parâmetros
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        } else {
            echo "Método não encontrado: $metodo";
        }
    }
} else {
    echo "Controlador não encontrado!";
}

