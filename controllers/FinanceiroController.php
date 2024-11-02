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
        ob_start();
        include 'views/FinanceiroList.php';
        $conteudo = ob_get_clean();

        // Carrega o template e substitui o marcador [[conteudo]]
        $template = file_get_contents('views/financeiro-template.html');
        echo str_replace('[[conteudo]]', $conteudo, $template);
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