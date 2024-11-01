<?php

require "models/FinanceiroModel.php";

class FinanceiroController {
    
    private $baseUrl = "http://localhost/uc7/financas";
    private $acao;
    private $financeiroModel;

    public function index(){
        echo "metodo index() foi chamado";    
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