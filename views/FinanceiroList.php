<?php

$lista = "";
foreach ($registros_financeiros as $financeiro) {
      $id_financeiro = $financeiro["id_financeiro"];
      $data = $financeiro["data"];
      $descricao = $financeiro["descricao"];
      $valor = $financeiro["valor"];
      $deb_cred = $financeiro["deb_cred"];
      $status = $financeiro["status"];
     


$lista .= "
<table class=''>
<div>
    <tr>
      <th>$id_financeiro</th>
      <th>$data</th>
      <th>$descricao</th>
      <th>$valor</th>
      <th>$deb_cred</th>
      <th>$status</th>
    </tr>
    </div>
  </table>
";

}


$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);


echo $html;