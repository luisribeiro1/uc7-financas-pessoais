<?php

require_once "models/FinanceiroModel.php";

class FinanceiroController{
    private $baseUrl = "http://localhost/uc7/financas-pessoais";

    private $financeiroModel;

    public function __construct(){
        $this->financeiroModel = new Financeiro();
    }

    public function index(){
        $lista_de_financas = $this->financeiroModel->getAll();

        $baseUrl = $this->baseUrl;

        require "views/FinanceiroList.php";
    }

    public function criar(){
        $baseUrl = $this->baseUrl;
        $deb_cred = "<option></option>
        <option>Débito</option>
        <option>Crédito</option>";
        $status = "<option></option>
        <option>Finalizado</option>
        <option>Em andamento</option>";
        $acao = "criar";
        require "views/FinanceiroForm.php";

    }

    public function editar($id){
        $financeiro = $this->financeiroModel->getById($id);
        $data = $financeiro["data"];
        $descricao = $financeiro["descricao"];
        $valor = $financeiro["valor"];
        $deb_cred = $financeiro["deb_cred"];
        $status = $financeiro["status"];

        $baseUrl = $this->baseUrl;

        $acao = "editar";
        require "views/FinanceiroForm.php";
    }
  
    public function atualizar(){
        $data = $_POST["data"];
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];
        $deb_cred = $_POST["deb_cred"];
        $status = $_POST["status"];

        $acao = $_POST["acao"];

        if($acao=="editar"){
            $id = $_POST["id_financeiro"];
            $this->financeiroModel->update($id,$data,$descricao,$valor,$deb_cred,$status);
        }else{
            $this->financeiroModel->insert($data,$descricao,$valor,$deb_cred,$status);
        }
        header("location :".$this->baseUrl."/financeiro");
    }

    public function cancelar($id){
        $this->financeiroModel->cancelar($id);
        $baseUrl = $this->baseUrl;
        header("location: ".$this->baseUrl."/financeiro");
    }
}