<?php 
$lista = "";

foreach($lista_de_financas as $financeiro){

    $id = $financeiro["id_financeiro"];
    $data = $financeiro["data"];
    $descricao = $financeiro["descricao"];
    $valor = $financeiro["valor"];
    $deb_cred = $financeiro["deb_cred"];
    $status = $financeiro["status"];
    $valor1 = "";
    $valor2 = "";
    $text_color = "";
    $formatacao = "";

    $valorFormaValor = number_format($valor, 2,',', '.');
    $dataFormadata = DateTime::createFromFormat("Y-m-d", $data)->format("d/m/Y");

    if($deb_cred == "Débito"){
        $valor1 = $valorFormaValor;
        $valor2 = "00,00";
    }else{
        $valor2 = $valorFormaValor;
        $valor1 = "00,00";
    }
      
   if($status == "Cancelado"){
        $text_color = 'text-danger';
        $formatacao = 'd-none';
    }elseif($status == "Finalizado"){
        $text_color = 'text-success';
    }else{
        $text_color = 'text-warning';
    }
    
    $lista.="
    <tr>
      <th scope='row'>$id</th>
      <td>$dataFormadata</td>
      <td>$descricao</td>
      <td>R$$valor1</td>
      <td>R$$valor2</td>
      <td class='$text_color'><strong>$status</strong></td>
      <td>
            <div class='d-inline-flex fs-dash $formatacao'>
                

                <a class='btn btn-danger small' href='[[base-url]]/financeiro/cancelar/$id' onclick=\"return confirm('Confirma o cancelamento do registro $id?')\"><i class='bi bi-x-square'></i> Cancelar</a>
            </div>
        </td>
    </tr>
    ";
}
$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;