<?php

$table = "<table class='table'>
        <thead>
            <tr>
                <th scope='col'>Data</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Débito</th>
                <th scope='col'>Crédito</th>
                <th scope='col'>Status</th>
                <th scope='col'></th>
            </tr>
        </thead>";

foreach($registro_financeiros as $registro){

    $id_financeiro = $registro["id_financeiro"];
    $data = $registro["data"];
    $descricao = $registro["descricao"];
    $valor = $registro["valor"];
    $deb_cred = $registro["deb_cred"];
    $status = $registro["status"];


    $table.= "
        <tbody>
            <tr>
            <th scope='row'>$data</th>
            <td>$descricao</td>
            <td>$valor</td>
            <td>$deb_cred</td>
            <td>$status</td>
                <td> <a href='[[base-url]]/financeiro/aprovar/$id_financeiro' class='btn btn-danger'>Cancelar</a>
                                
            </tr>
        </tbody>
    ";
}

$table.= "</table>";

$html= file_get_contents("views/financeiro.html");

$html = str_replace("[[table]]",$table,$html);
$html = str_replace("[[base-url]]",$baseUrl,$html);

echo $html;

