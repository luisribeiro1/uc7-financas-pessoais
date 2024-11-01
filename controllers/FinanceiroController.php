<?php

class FinanceiroController 
{

  public $baseUrl = "http://localhost/uc7/financas_pessoais";

  private $FinanceiroModel;

  public $acao;

  public function index() {
    echo "Método index() foi chamado!";
  }

  public function criar() {
    $acao = "criar";
    echo "Método criar() foi chamado!";
  }

  public function atualizar() {
    $acao = "atualizar";
    echo "Método atualizar() foi chamado!";
  }

  public function cancelar() {
    $acao = "cancelar";
    echo "Método cancelar() foi chamado";
  }





}