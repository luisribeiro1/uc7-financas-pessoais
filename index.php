<?php   
$baseUrl = "/uc7/financas-pessoais";

session_start();

// Captura diretamente os parâmetros 'rota' e 'id' da query string
$rota = $_GET['rota'] ?? 'index';
$id = $_GET['id'] ?? null;


// Instancia o controlador apropriado
require "controllers/FinanceiroController.php";
$controller = new FinanceiroController();

// Define o método no controlador com base em 'rota'
switch ($rota) {
    case 'index':
        $controller->index();
        break;
    case 'cancelar':
        $controller->cancelar($id);
        break;
    case 'confirmarCancelamento':
        $controller->confirmarCancelamento();
        break;
    default:
        echo "PÁGINA NÃO ENCONTRADA: Rota inválida!";
        break;

        case 'atualizar':
            $controller->atualizar($id);
            break;

            case 'confirmarAtualizacao':
                $controller->confirmarAtualizacao();
                break;
            

                case 'adicionar':
                    $controller->adicionar();
                    break;
                case 'confirmarAdicao':
                    $controller->confirmarAdicao();
                    break;
                       
        
}
