<?php


require_once "models/FinanceiroModel.php";

class MesaController
{
    
    private $url = "http://financias/";

    private $financeiroModel;

    public function __construct(){
        $this->financeiroModel = new Financeiro();
    }
    public function index()
    {
        
      
        $financeiro =$this->financeiroModel->getAllFinanceiro();

        
        $baseUrl = $this->url;

       
    }

}