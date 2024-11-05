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
       $data = "" ;
       $descricao = "" ;
       $valor = "" ;
       $deb_cred = "" ;
       $status = "";
       $baseUrl = $this->baseUrl;
        
        require "views/FinanceiroForm.php";
    }

    public function atualizar(){
        $data = $_POST["data"];
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];
        $deb_cred = $_POST["deb_cred"];
        $status = isset($_POST["status"]) ? true : false;

        $acao = $_POST["acao"];

        if($acao == "editar"){
            $id_financeiro = $_POST["id_financeiro"];
            $this->financeiroModel->update($id_financeiro,$data,$descricao,$valor,$deb_cred,$status);
        }else{
            $this->financeiroModel->insert($data,$descricao,$valor,$deb_cred,$status);
        }

        header("location: " . $this->baseUrl. "/financeiro");
    }

    public function aprovar($id_financeiro){
        
        $this->financeiroModel->cancelar($id_financeiro);
        header ("location: " . $this->baseUrl . "/financeiro");
    }

}