<?php

class FinanceiroController {
    
    private $baseUrl = "http://localhost/uc7/financas/";
    private $acao;
    private $financeiroModel;

    public function index(){
        echo "Método index() foi chamado.";    
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