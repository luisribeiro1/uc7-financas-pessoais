<?php
require_once "models/FinanceiroModel.php";

class FinanceiroController
{

  public $baseUrl = "http://localhost/uc7/financas_pessoais";

  private $FinanceiroModel;

  public $acao;

  public function __construct()
  {
    $this->FinanceiroModel = new Financeiro;
  }

  public function index() {
    $registros_financeiros = $this->FinanceiroModel->getAll();
    $baseUrl = $this->baseUrl;
    require "views/FinanceiroList.php";
  }

  public function criar() {
    $baseUrl = $this->baseUrl;
    $acao = "criar";
    require "views/FinanceiroList.php";
  }

  public function atualizar() {
    $baseUrl = $this->baseUrl;
    $acao = "atualizar";
    echo "Método atualizar() foi chamado!";
  }

  public function cancelar($id_financeiro) {
    $baseUrl = $this->baseUrl;
    $this->FinanceiroModel->cancelar($id_financeiro);
    // $acao = "cancelar";
    // require "views/FinanceiroList.php";

    header("location: ".$this->baseUrl."/financeiro");
  }
}