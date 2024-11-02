<?php
$lista="";

foreach ($registros_financeiros as $registros){
    $id_financeiro = $registros["id_financeiro"];
    $data = $registros["data"];
    $descricao = $registros["descricao"];
    $valor = $registros["valor"];
    $deb_cred = $registros["deb_cred"];
    $status = $registros["status"];

   
    $lista.= "

  <table class='table'>
  <thead>
    <tr>
      <th scope='col'>Data</th>
      <th scope='col'>Descrição</th>
      <th scope='col'>Débito</th>
      <th scope='col'>Crédito</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>$data</th>
      <td>$descricao</td>
      <td>X</td>
      <td>20.000,99</td>
    </tr>
  </tbody>
</table>
 
              
        ";
        


}

$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[lista]]",$lista, $html);
$html = str_replace("[[base-url]]",$baseUrl, $html);

echo $html;
