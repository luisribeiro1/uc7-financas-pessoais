<?php 

$tabela = "";

foreach($registros_financeiros as $registros){
    $id_financeiro = $registros["id_financeiro"];
    $data = $registros["data"];
    $descricao = $registros["descricao"];
    $valor = $registros["valor"];
    $deb_cred = $registros["deb_cred"];
    $status = $registros["status"];


    $tabela.= "
    <br>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>Data</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Débito</th>
                <th scope='col'>Crédito</th>
                <th scope='col'>Status</th>
            </tr>
        </thead>
            
        <tbody>
            <tr>
                <th>$data</th>
                <td>$descricao</td>
                <td>$valor</td>
                <td>$deb_cred</td>
                <td>$status</td>
            </tr>
        </tbody>
    </table>";
}

$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[tabela]]", $tabela, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;