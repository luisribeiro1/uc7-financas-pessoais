<?php


require_once "models/FinanceiroModel.php";

class FinanceiroController
{
    
   private $url = "http://localhost/teste/Financas-Pessoais";

    private $financeiroModel;


    public function __construct(){
        $this->financeiroModel = new Financeiro();
    }

    public function index()
    {
        
      
       $registros_financeiros = $this->financeiroModel->getAll();
        
        $baseUrl = $this->url;
       require "views/FinanceiroList.php";
       
    }

    public function criar(){
        $baseUrl = $this->url;  
         $acao = "criar";
         echo "método criar() foi chamado";
         require "views/FinanceiroForm.php";
    }

    public function atualizar(){ 

        $baseUrl = $this->url;
        $acao = "atualizar";
        echo "método atualizar() foi chamado";
        require "views/FinanceiroForm.php";
        
    }

    public function cancelar($id_financeiro){

        $this->financeiroModel->cancelar($id_financeiro);        
        header("location:".$this->url."/financeiro");
       // $acao = "cancelar";
    }

}