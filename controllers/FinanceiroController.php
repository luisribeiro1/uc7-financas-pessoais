<?php

    require_once "models/FinanceiroModel.php";

    class FinanceiroController{

        private $baseUrl = "https://localhost/uc7/financeiro";

        private $financeiroModel;

        # Método construtor:
        public function __construct(){
            $this->financeiroModel = new Financeiro();
        }
        # Método Index:
        public function index(){
            $registro_financeiros = $this->financeiroModel->getAll();

            $baseUrl = $this->baseUrl;

            require "views/FinanceiroList.php";
        }
        # Método Criar:
        public function criar(){
            $baseUrl = $this->baseUrl;

            echo "método criar() foi chamado";

            $acao = "criar";
            require "views/FinanceiroForm.php";
        }
        # Método Atualizar:
        public function editar($id){
            // $financa = $this->financeiroModel->GetById($id);
            // $data = $financa["data"];
            // $descricao = $financa["descricao"];
            // $valor = $financa["valor"];
            // $deb_cred = $financa["deb_cred"];
            // $status = $financa["status"];

            $baseUrl = $this->baseUrl;

            echo "método editar() foi chamado ";

            $acao = "editar";
            require "views/FinanceiroForm.php";
        }
        # Método de aplicação no BD:
        public function atualizar() {
            // $data = $_POST["data"];
            // $descricao = $_POST["descricao"];
            // $valor = $_POST["valor"];
            // $deb_cred = $_POST["deb_cred"];
            // $status = $financa["status"];
            
            $acao = $_POST["acao"];

            if($acao=="editar"){
                $id = $_POST["idfinanca"];
                $this->financeiroModel->update($id,$data,$descricao,$valor,$dep_cred,$status);
            }else{
                $this->financeiroModel->insert($data,$descricao,$valor,$dep_cred,$status);
            }
            
            header("location: ".$this->baseUrl."/financeiro");
        }
        # Método Cancelar / excluir:
        public function cancelar($id){
            $this->financeiroModel->cancelar($id);
            header("location: ".$this->baseUrl."/financeiro");
        }

    }