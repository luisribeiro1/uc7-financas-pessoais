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

    if($deb_cred == "Débido"){
        $valor1 = $valor;
        $valor2 = "---------";
    }else{
        $valor2 = $valor;
        $valor1 = "---------";
    }

    $text_color = "";
    if($status == "Cancelado"){
        $text_color = 'text-danger';
    }elseif($status == "Finalizado"){
        $text_color = 'text-success';
    }else{
        $text_color = 'text-warning';
    }

    $lista.="
    <tr>
      <th scope='row'>$id</th>
      <td>$data</td>
      <td>$descricao</td>
      <td>$valor1</td>
      <td>$valor2</td>
      <td class='$text_color'><strong>$status</strong></td>
      <td>
            <div class='d-inline-flex fs-dash'>
                <a class='btn btn-primary small mx-2'><i class='bi bi-pencil-square' href='[[base-url]]/financeiro/editar/$id'></i> Editar</a>

                <a class='btn btn-danger small mx-2' href='[[base-url]]/financeiro/cancelar/$id' onclick=\"return confirm('Confirma o cancelamento da avaliação: $id?')\"><i class='bi bi-x-square'></i> Cancelar</a>
            </div>
        </td>
    </tr>
    ";
}
$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;