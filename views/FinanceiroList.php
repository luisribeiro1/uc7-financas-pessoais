<?php
$lista="";

foreach($registros_financeiros as $rf){
    $id = $rf["id_financeiro"];
    $data = $rf["data"];
    $descricao = $rf["descricao"];
    $valor = $rf["valor"];
    $deb_cred = $rf["deb_cred"];
    $status = $rf["status"];

    
    $lista.="
        <div class='col-md-12 mb-4'>
        <table class='table'>
            <thead>
                <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Débito</th>
                <th>Crédito</th>
                <th>Valor</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$data</td>
                    <td>$descricao</td>
                    <td>$deb_cred</td>
                    <td></td>
                    <td>$valor</td>
                    <td>$status</td>
                </tr>
            </tbody>
        </table>
    </div>";
}

$html = file_get_contents("views/Financeiro-template.html");

$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;