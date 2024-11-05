<?php

require_once "models/FinanceiroModel.php";

class FinanceiroController{

    private $url = "http://localhost/teste/financas_pessoais";
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

    public function cancelar($id_financeiro){
        $this->financeiroModel->cancelar($id_financeiro);
        $baseUrl = $this->url;
        header("location: ".$this->url."/financeiro");
        $acao = "cancelar";
    }

}