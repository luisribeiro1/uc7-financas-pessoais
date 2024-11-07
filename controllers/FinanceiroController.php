<?php

# Inclue o arquivo model
require_once "models/FinanceiroModel.php";

class FinanceiroController{

    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/financas-pessoais/";

    # Cria a propriedade que será usada nos métodos abaixo
    private $financeiroModel;

    public function __construct(){
    #instancia a classe Financeiro para obter os dados do model
     $this->financeiroModel = new Financeiro();
    }

    public function index(){
        
        # Cria um objeto que receberá a lista de transações que o Model retornará
        $registros_financeiros = $this->financeiroModel->getAllFinanceiro();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        

        # Importa a view que irá renderizar o template usando as variáveis acima:
        # $transacoes (array com dados) e $baseUrl com o endereço da aplicação
        require "views/FinanceiroList.php";
    }

    public function criar(){
        $baseUrl = $this->url;

        $data = "";
        $descricao = "";
        $valor = "";
        $status = "";
        $deb_cred = "<option></option>
        <option>Débito</option>
        <option>Crédito</option>";
        
        $acao = "criar";
        require "views/FinanceiroForm.php";
    }

    public function atualizar(){
        
        //$id_financeiro = $_POST["id_financeiro"];
        $data = $_POST["data"];
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];
        $deb_cred = $_POST["deb_cred"];

        $status = isset($_POST["status"]) ? true : false;

        $acao = $_POST["acao"];

        if($acao=="editar"){
            $id_financeiro = $_POST["id_financeiro"];
            $this->financeiroModel->update($data,$descricao,$valor,$deb_cred,$status,$id_financeiro);
        }else{
            $id_financeiro = $_POST["id_financeiro"];
            $this->financeiroModel->insert($id_financeiro,$data,$descricao,$valor,$deb_cred,$status);
        }
     

        header("location: ".$this->url."financeiro");

    }

    public function cancelar($id_financeiro) {
        
        $this->financeiroModel->cancelar($id_financeiro);
        $baseUrl = $this->url;
        
        # Redirecionar o usuário para a listagem de transações
        header("location: ".$this->url."financeiro");
    }

}