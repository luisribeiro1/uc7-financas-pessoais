<?php

# Inclue o arquivo model
require_once "models/FinanceiroModel.php";

class FinanceiroController
{
    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    
    private $url = "http://localhost/uc7/financas-pessoais/";

    private $acao = "";

    # Cria a propriedade que será usada nos métodos abaixo
    private $financeiroModel;

    // public function __construct(){
    //     # Instancia a classe Mesa para obter os dados do model
    //     // $this->financeiroModel = new Financeiro();
    // }

    public function index(){
        $baseUrl = $this->url;
        $acao = "";
        echo "método index() foi chamado";
    }
    public function criar(){
        $baseUrl = $this->url;
        $acao = "criar";
        echo "método criar() foi chamado";
    }
    public function atualizar(){
        $baseUrl = $this->url;
        $acao = "atualizar";
        echo "método index() foi chamado";  
    }
    public function cancelar(){
        $baseUrl = $this->url;
        $acao = "cancelar";
        echo "método cancelar() foi chamado";
    }
}