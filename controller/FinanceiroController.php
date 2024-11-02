<?php


require_once "models/FinanceiroModel.php";

class FinanceiroController
{
    
   private $url = "http://localhost/test/financias";

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
    }

    public function atualizar(){
      

        $baseUrl = $this->url;

        $acao = "atualizar";
        echo "método atualizar() foi chamado";
        
    }

    public function cancelar(){
        $baseUrl = $this->url;

        $acao = "cancelar";
    }

}