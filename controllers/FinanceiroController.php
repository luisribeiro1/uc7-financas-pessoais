<?php

require "models/FinanceiroModel.php";

class FinanceiroController{
    private $url = "http://localhost/atividade/financeiro";
    private $financeiroModel;

    public function index(){
        echo "método index foi criado";
    }

    public function criar(){
        echo "método criar foi criado";
    }

    public function atualizar(){
        echo "método atualizar foi criado";
    }

    public function cancelar(){
        echo "método cancelar foi criado";
    }
}