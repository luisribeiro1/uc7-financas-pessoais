<?php
 require_once "models/FinanceiroModel.php";

 class FinanceiroController{

    private $url = "http://localhost/uc7/financeiro";

    private $financeiroModel;

    public function __construct() {
        $this->FinanceiroModel = new Financeiro();
    }
    

    public function index(){
        $transacoes = $this->FinaceiroModel->getAllFinanceiro();

        $baseUrl = $this->url;
        require 'views/FinanceiroList.php';

    }
    public function criar(){
        $baseUrl = $this->url;
        echo "metodo criar() foi chamado"

        $acao = "criar";
        require 'views/FinanceiroForm.php';
    }

    public function atualizar(){
        echo "metodo atualizar() foi chamado"

        $acao = $_POST['acao'];
    }

    public function excluir() {
        $this->FinanceiroModel->delete();
        header("Location: ".$this->baseUrl."/financeiro");
        echo "metodo excluir() foi chamado"
    }
 }