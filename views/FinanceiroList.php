<?php

$lista = " 
 <section class='container mt-4 mb-5'>
 <div class='row'>
    <div class='col md-6'>
        <a href='[[base-url]]financeiro/criar' class='btn btn-success btn-sm'>
        <i class='bi bi-plus-circle me-1 '></i>Adicionar
      </a>
    </div>   

<table class='table text-center'>
    <thead>
    <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Data</th>
        <th scope='col'>Descrição</th>
        <th scope='col'>Valor</th>
        <th scope='col'>Débito/Crédito</th>
        <th scope='col'>Status</th>
        <th scope='col'></th>
        <th scope='col'></th>
    </tr>
    </thead>
    <tbody>";


# Iterar sobre o array  que foi criado no controller e que contém os dados das mesas.
//var_dump($lista_de_usuarios);

function ajusteData($data){
    $parts = explode('-',$data);
    if(sizeof($parts) ===3){
        # A data vem do BD no formato aaaa-mm-dd
        $ano = $parts[0];
        $mes = $parts[1];
        $dia = $parts[2];
        return "$dia/$mes/$ano";
    }else{
        return false;
    }
}

function ajusteStatus($status){
    if($status == "1"){
        return "Ativo";
    }else{
        return "Cancelado";
    }    
    }


foreach ($registros_financeiros as $financas) {
    
    $id_financeiro = $financas["id_financeiro"];
    $data = ajusteData($financas["data"]);
    $descricao = $financas["descricao"];
    $valor = $financas["valor"];
    $deb_cred = $financas["deb_cred"];
    $status = ajusteStatus($financas["status"]);
    
    # Cria os cars HTML com os dados dos usuários
    $lista.="
        <tr>
      <th scope='row'>$id_financeiro</th>
      <td>$data</td>  
      <td>$descricao</td>  
      <td>R$$valor</td>  
      <td>$deb_cred</td>  
      <td>$status</td>  
      <td><a href='[[base-url]]financeiro/cancelar/$id_financeiro'class='btn btn-danger'>Cancelar</a></td>
      <td><a href='[[base-url]]financeiro/atualizar/$id_financeiro'class='btn btn-primary'>Atualizar</a></td>
        </tr>
    ";
}    

$lista.="
    <!--<tr>
    <td></td>
    <td></td>
    <td><b>Total</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr> --!>
    </tbody>
    </table>
    ";

# Faz a leitura dos arquivos de templatyes e armazena nas variáveis
$html = file_get_contents("views/financeiro-template.html");

# Substituir a tag [[lista]] pelo conteúdo de variável $lista. O mesmo acontece com as demais variáveis
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;