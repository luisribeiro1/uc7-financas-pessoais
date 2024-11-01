<?php
 require_once "models/FinanceiroModel.php";

 class FinanceiroController{

    private $url = "http://localhost/uc7/financas-pessoais";

    private $financeiroModel;

     public function __construct() {
        $this->FinanceiroModel = new FinanceiroModel();
    }
    

    public function index(){
         $transacoes = $this->FinanceiroModel->getAll();

        $baseUrl = $this->url;
        require 'views/FinanceiroList.php';
        echo "metodo index() foi chamado";
    }
    public function criar(){
        $baseUrl = $this->url;
        echo "metodo criar() foi chamado";

         $acao = "criar";
         require 'views/FinanceiroForm.php';
    }

    public function atualizar(){
        echo "metodo atualizar() foi chamado";

        // $acao = $_POST['acao'];
    }

    public function cancelar() {
        // $this->FinanceiroModel->delete();
        // header("Location: ".$this->baseUrl."/financeiro");
        echo "metodo excluir() foi chamado";
    }
 }