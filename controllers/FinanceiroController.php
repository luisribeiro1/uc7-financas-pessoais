<?php

require_once "models/FinanceiroModel.php";

class FinanceiroController {
    
    private $baseUrl = "http://localhost/uc7/financas";
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
        $data = $_POST["data"];
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];
        $deb_cred = $_POST["deb_cred"];

        $status = $_POST["status"];

        $acao = $_POST["acao"];
    }

    public function cancelar($id_financeiro){
        $this->financeiroModel->cancel($id_financeiro);
        header("location: ".$this->baseUrl . "/financeiro");
    }

}