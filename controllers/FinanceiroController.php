<?php

require_once "models/FinanceiroModel.php";

class FinanceiroController{

    private $url = "http://localhost/financas_pessoais";
    private  $financeiroModel;

    public function index(){
        echo "método index() foi chamado";
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