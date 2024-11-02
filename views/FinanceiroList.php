<?php

$lista = "";

foreach ($registros_financeiros as $registros) {
  $id_financeiro = $registros['id_financeiro'];
  $data = $registros['data'];
  $descricao = $registros['descricao'];
  $valor = $registros['valor'];
  $deb_cred = $registros['deb_cred'];
  $status = $registros['status'];

  $lista .= "
    <td class='text-center'>$id_financeiro</td>
    <td class='text-center'>$data</td>
    <td class='text-center'>$descricao</td>
    <td class='text-center'>R$ $valor</td>
    <td class='text-center'>$deb_cred</td>
    <td class='text-center'>$status</td>
  ";
}

$html = file_get_contents("views/financeiro-template.html");
$html = str_replace("[[registros]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;