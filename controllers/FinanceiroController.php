<?php

require "models/FinanceiroModel.php";

class FinanceiroController{
    private $url = "http://localhost/atividade/financeiro";
    private $financeiroModel;

    public function __construct(){
        $this->financeiroModel = new FinanceiroModel();
    }

    public function index(){
        $registros_financeiros = $this->financeiroModel->getAll();
        $baseUrl = $this->url;
        require "views/FinanceiroList.php";
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