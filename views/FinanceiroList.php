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
  '
  <table class='table'>
  <thead>
    <tr>
      <th scope='col'>Data</th>
      <th scope='col'>Descrição</th>
      <th scope='col'>Débito</th>
      <th scope='col'>Crédito</th>
      <th scope='col'>Status</th>
      <th scope='col'>Ações</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>$data</th>
      <td>$descricao</td>
      <td>X</td>
      <td>20.000,99</td>
      <td>$status</td>

      <td> <a class='text-primary text-decoration-none' href='[[base-url]]/financeiro/cancelar/$id_financeiro'><i class='bi bi-pencil-square'></i> Cancelar</a> <a</td>

    </tr>
  </tbody>
</table>
 
              
        ";
        


}

$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[lista]]",$lista, $html);
$html = str_replace("[[base-url]]",$baseUrl, $html);

echo $html;
