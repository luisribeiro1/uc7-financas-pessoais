<?php

require_once "models/FinanceiroModel.php";

class FinanceiroController {
    
    private $baseUrl = "http://localhost/uc7/financas/";
    private $acao;
    private $financeiroModel;

    public function __construct() {
        $this->financeiroModel = new Financeiro();
      }

    public function index(){
        $registros_financeiros = $this->financeiroModel->getAll();
        $baseUrl = $this->baseUrl;
        require "views/FinanceiroList.php";
    }

    public function criar(){
        echo "Método criar() foi chamado.";    
    }

    public function atualizar(){
        echo "Método atualizar() foi chamado.";    
    }

    public function cancelar(){
        echo "Método cancelar() foi chamado.";    
    }

}