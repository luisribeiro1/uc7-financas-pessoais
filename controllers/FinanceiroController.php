<?php

require "models/FinanceiroModels.php";

class FinanceiroController {
    
    private $baseUrl = "http://localhost/uc7/financas";
    private $acao;
    private $financeiroModel;


    public function __construct(){
        $this->financeiroModel = new Financas();
    }

    public function index(){
        $registro_financeiros = $this->financeiroModel->getAll();
        $baseUrl = $this->baseUrl;
        require "views/FinanceiroList.php";

    }

    public function criar(){
        echo "metodo criar() foi chamado";    
    }

    public function atualizar(){
        echo "metodo atualizar() foi chamado";    
    }

    public function cancelar(){
        echo "metodo cancelar() foi chamado";    
    }

}