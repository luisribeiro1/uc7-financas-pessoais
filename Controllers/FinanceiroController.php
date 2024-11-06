<?php

# Inclue o arquivo model
require_once "models/FinanceiroModel.php";

class FinanceiroController {

    # Criar a propriedade que receberá o endereço absoluto do site
    # este endereço será usado para compor as rotas
    # $url é uma propriedade pois está sendo criada no escopo da classe
    private $url = "http://localhost/uc7/financas_pessoais/";


    # Cria a propriedade que será usada nos métodos abaixo
    private $financeiroModel;

    public function __construct(){
        # Instancia a classe Financeiro para obter os dados do model
        $this->financeiroModel = new Financeiro();
    }

    public function index(){

        // # Cria um objeto que receberá a lista de transacoes que o Model retornará
        $registros_financeiros = $this->financeiroModel->getAllFinanceiro();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        // echo "Método index() foi chamado";

        require "views/FinanceiroList.php";
    }

    // Método responsável pela rota criar (financeiro/criar)
    public function criar(){
        
        $baseUrl = $this->url;
        $data = "";
        $descricao = "";
        $valor = "";
        $status = "";
        $deb_cred = "<option></option>
        <option>Débito</option>
        <option>Crédito</option>";
        
        // echo "Método criar() foi chamado";
        
        $acao = "criar";
        require "views/FinanceiroForm.php";
    }


    // Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar(){

        $data = $_POST["data"];
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];
        $deb_cred = $_POST["deb_cred"];


        // isset verifica se algo existe, nesse caso, se o checkbox está marcado
        $status = isset($_POST["status"]) ? true : false;

        $acao = $_POST["acao"];

        if($acao=="editar"){
            $id_financeiro = $_POST["id_financeiro"];
            $this->financeiroModel->update($id_financeiro,$data,$descricao,$valor,$deb_cred,$status);
        }else{
            $this->financeiroModel->insert($id_financeiro,$data,$descricao,$valor,$deb_cred,$status);
        }

        

        # Redirecionar o usuário para a rota principal de cardápio
        header("location: ".$this->url."financeiro");
    }
    
    public function cancelar($id_financeiro){
        # Executa o método delete da classe de Model
        $this->financeiroModel->cancelar($id_financeiro);
        $baseUrl = $this->url;

        // # Redirecionar o usuário para a listagem de transacoes
         header("location: ".$this->url."financeiro");
    }
}