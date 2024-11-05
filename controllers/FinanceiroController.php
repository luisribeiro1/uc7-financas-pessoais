<?php

require "models/FinanceiroModel.php";

class FinanceiroController{
    private $url = "http://localhost/atividade/financas_pessoais";
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

    public function cancelar($id){
        $registros_financeiros = $this->financeiroModel->cancel($id);
        $baseUrl = $this->url;
        header("location: " . $this->url . "/financas");
    }
}