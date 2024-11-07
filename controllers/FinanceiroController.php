<?php
require_once "models/FinanceiroModel.php";

class FinanceiroController {

    private $url = "http://localhost/uc7/financas-pessoais";
    private $financeiroModel;

    public function __construct() {
        $this->financeiroModel = new FinanceiroModel();
    }

    public function index() {
        $transacoes = $this->financeiroModel->getAll();

        $baseUrl = $this->url;
        ob_start();
        include 'views/FinanceiroList.php';
        $conteudo = ob_get_clean();

        $template = file_get_contents('views/financeiro-template.html');
        echo str_replace('[[conteudo]]', $conteudo, $template);
    }

    public function cancelar($id_financeiro) {
        if ($id_financeiro) {
            // Carrega os dados do registro específico para a confirmação
            $registro = $this->financeiroModel->getById($id_financeiro);
            
            // Exibe a página de confirmação sem ainda realizar o cancelamento
            include 'views/FinanceiroCancel.php';
        } else {
            // Se o ID não for válido, redireciona para a página principal
            header("Location: index.php?rota=index");
            exit();
        }
    }
    public function confirmarCancelamento() {
        $id_financeiro = $_POST['id'] ?? null;
    
        if ($id_financeiro) {
            // Realiza o cancelamento do registro alterando o status para "cancelado"
            $this->financeiroModel->cancelar($id_financeiro);
        }
    
        // Redireciona para a página principal após o cancelamento
        header("Location: index.php?rota=index");
        exit();
    }

    public function atualizar($id_financeiro) {
        if ($id_financeiro) {
            // Carrega os dados do registro específico
            $registro = $this->financeiroModel->getById($id_financeiro);
            
            // Exibe a página de formulário com os dados carregados
            include 'views/FinanceiroForm.php';
        } else {
            // Redireciona para a página principal se o ID for inválido
            header("Location: index.php?rota=index");
            exit();
        }
    }
    
    public function confirmarAtualizacao() {
        // Recebe os dados do formulário via POST
        $id_financeiro = $_POST['id'] ?? null;
        $data = $_POST['data'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $valor = $_POST['valor'] ?? null;
        $deb_cred = $_POST['deb_cred'] ?? null;
        $status = $_POST['status'] ?? null;
    
        // Verifica se os campos obrigatórios estão preenchidos
        if ($id_financeiro && $data && $descricao && $valor && $deb_cred && $status) {
            // Chama o método do modelo para atualizar o registro
            $this->financeiroModel->atualizar($id_financeiro, $data, $descricao, $valor, $deb_cred, $status);
    
            // Redireciona para a página principal após a atualização
            header("Location: index.php?rota=index");
            exit();
        } else {
            // Caso algum campo esteja faltando, exibe uma mensagem de erro ou redireciona
            echo "Erro: Todos os campos são obrigatórios.";
        }
    }

    public function adicionar() {
        // Inclui a página de formulário para adicionar um novo registro
        include 'views/FinanceiroAdd.php';
    }

    public function confirmarAdicao() {
        $data = $_POST['data'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $valor = $_POST['valor'] ?? null;
        $deb_cred = $_POST['deb_cred'] ?? null;
        $status = $_POST['status'] ?? null;
    
        if ($data && $descricao && $valor && $deb_cred && $status) {
            // Chama o método do modelo para inserir o novo registro
            $this->financeiroModel->adicionar($data, $descricao, $valor, $deb_cred, $status);
    
            // Redireciona para a página principal após a adição
            header("Location: index.php?rota=index");
            exit();
        } else {
            echo "Erro: Todos os campos são obrigatórios.";
        }
    }
    
    
    



}
