<?php

# Inclue o arquivo model
require_once "models/FinanceiroModel.php";

class FinanceiroController {

    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/financeiro";


    # Cria a propriedade que será usada nos métodos abaixo
    private $financeiroModel;

    // public function __construct(){
    //     # Instancia a classe Financeiro para obter os dados do model
    //     $this->financeiroModel = new Financeiro();
    // }

    public function index(){

        // # Cria um objeto que receberá a lista de transacoes que o Model retornará
        // $transacoes = $this->financeiroModel->getAllFinanceiro();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        echo "Método index() foi chamado";

        require "views/FinanceiroList.php";
    }

    // Método responsável pela rota criar (financeiro/criar)
    public function criar(){
        $baseUrl = $this->url;

        echo "Método criar() foi chamado";

        $acao = "criar";
        require "views/FinanceiroForm.php";
    }


    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar(){

        echo "Método atualizar() foi chamado";

        // $acao = $_POST["acao"];
    }

    public function excluir(){
        # Executa o método delete da classe de Model
        // $this->financeiroModel->delete();

        echo "Método delete() foi chamado";

        // # Redirecionar o usuário para a listagem de transacoes
        // header("location: ".$this->url."/financeiro");
    }
}