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
    require "views/FinanceiroForm.php";
  }

  public function atualizar() {
    $baseUrl = $this->baseUrl;
    $acao = "atualizar";
    echo "Método atualizar() foi chamado!";
  }

  public function cancelar() {
    $baseUrl = $this->baseUrl;
    $acao = "cancelar";
    echo "Método cancelar() foi chamado";
  }
}