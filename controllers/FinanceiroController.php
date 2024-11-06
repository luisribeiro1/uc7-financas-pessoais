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
        $baseUrl = $this->url;
        $status='
        <option></option>
        <option>Aprovada</option>
        <option>Em Análise</option>
        <option>Cancelada</option>
        ';
        $acao = "criar";
        require "views/FinanceiroForm.php";
    }

    public function atualizar(){
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];
        $valor =$_POST['valor'];
        $deb_cred = $_POST['deb_cred'];
        $status = $_POST['status'];

        $this->financeiroModel->insert($data, $descricao, $valor, $deb_cred, $status);
        header("location: " . $this->url . "/financas");
    }

    public function cancelar($id){
        $registros_financeiros = $this->financeiroModel->cancel($id);
        $baseUrl = $this->url;
        header("location: " . $this->url . "/financas");
    }
}