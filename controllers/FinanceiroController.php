<?php

require_once "models/FinanceiroModel.php";

class FinanceiroController{

    private $url = "http://localhost/financas_pessoais";
    private  $financeiroModel;

    public function __construct(){
        $this->financeiroModel = new  Financeiro();
        
    }

    public function index(){
        $registros_financeiros = $this->financeiroModel->getAllFinanceiro();
        $baseUrl = $this->url;
        require "views/FinanceiroList.php";

    }

    public function criar(){
        echo "método criar() foi chamado";
        $acao = "criar";
    }

    public function atualizar(){
        echo "método atualizar() foi chamado";
        $acao = "atualizar";
    }

    public function cancelar(){
        echo "método cancelar() foi chamado";
        $acao = "cancelar";
    }

}