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
            $data = "";
            $descricao = "";
            $valor = "";
            
            $deb_cred = "<option></option>
            <option>Débito</option>
            <option>Crédito</option>
            ";
            
            $acao = "Criar";
            require "views/FinanceiroForm.php";
        }
        # Método Atualizar:
        public function editar($id){
            $financa = $this->financeiroModel->GetById($id);
            $id = $financa["id_financeiro"];
            $data = $financa["data"];
            $descricao = $financa["descricao"];
            $valor = $financa["valor"];

            $tipos = ["Débito","Crédito"];
            $deb_cred = "<option></option>";
            foreach ($tipos as $t) {
                $selection = $financa["dep_cred"] == $t ? "selected" : " ";
                $deb_cred .= "<option $selection>$t</option>";
            }

            $baseUrl = $this->baseUrl;

            $acao = "Editar";
            require "views/FinanceiroForm.php";
        }
        # Método de aplicação no BD:
        public function atualizar($id = null) {
            $data = $_POST["data"];
            $descricao = $_POST["descricao"];
            $valor = $_POST["valor"];
            $dep_cred = $_POST["deb_cred"];

            $acao = $_POST["acao"];
            $baseUrl = $this->baseUrl;
            if($acao=="Editar"){
                $id = $_POST["idfinanca"];
                $this->financeiroModel->update($id,$data,$descricao,$valor,$dep_cred,$status);
            }else{
                $this->financeiroModel->insert($data,$descricao,$valor,$dep_cred,$status);
            }
            
            header("location: ".$this->baseUrl."/financas");
        }
        # Método Cancelar:
        public function cancelar($id){
            $this->financeiroModel->cancelar($id);
            $baseUrl = $this->baseUrl;
            header("location: ".$this->baseUrl."/financas");
        }

    }