<?php

$lista = " <table class='table text-center'>
    <thead>
    <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Data</th>
        <th scope='col'>Descrição</th>
        <th scope='col'>Valor</th>
        <th scope='col'>Débito/Crédito</th>
        <th scope='col'>Status</th>
        <th scope='col'></th>
    </tr>
    </thead>
    <tbody>";


# Iterar sobre o array  que foi criado no controller e que contém os dados das mesas.
//var_dump($lista_de_usuarios);

function data($data){
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

foreach ($registros_financeiros as $financas) {
    
    $id_financeiro = $financas["id_financeiro"];
    $data = $financas["data"];
    $descricao = $financas["descricao"];
    $valor = $financas["valor"];
    $deb_cred = $financas["deb_cred"];
    $status = $financas["status"];
    
    # Cria os cars HTML com os dados dos usuários
    $lista.="
        <tr>
      <th scope='row'>$id_financeiro</th>
      <td>$data</td>  
      <td>$descricao</td>  
      <td>R$$valor</td>  
      <td>$deb_cred</td>  
      <td>$status</td>  
      <td><button class='btn btn-danger'>Cancelar</button></td>
        </tr>
    ";



}    

# Faz a leitura dos arquivos de templatyes e armazena nas variáveis
$html = file_get_contents("views/financeiro-template.html");

# Substituir a tag [[lista]] pelo conteúdo de variável $lista. O mesmo acontece com as demais variáveis
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;