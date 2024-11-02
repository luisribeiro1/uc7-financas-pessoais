<?php

    $lista = "";

    foreach($registro_financeiros as $itens) {
            $id = $itens["id_financeiro"];
            $data = $itens["data"];
            $descricao = $itens["descricao"];
            $valor = $itens["valor"];
            $depCred = $itens["dep_cred"];
            $status = $itens["status"];

            $valor = str_replace(".",",",$valor);

            if($depCred == "debito"){
                $valor1 = $valor;
                $valor2 = "-------";
            }else{
                $valor2 = $valor;
                $valor1 = "-------";
            }

            if($status == "cancelado"){
                $formCancelado = "table-danger";
                $icon = "<i class='bi bi-x-square-fill text-danger'></i>";
                $buttom = "";
                $buttom2 = "";
            }else{
                $formCancelado = "table-success";
                $icon = "<i class='bi bi-check-square-fill text-success'></i>";
                $buttom = "<a href='[[base-url]]/financas/editar/$id' class='btn btn-secondary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>";
                $buttom2 = "<a href='[[base-url]]/financas/cancelar/$id' class='btn btn-danger btn-sm me-1'><i class='bi bi-x-square'></i> Cancelar</a>";
            }

            $lista.="
                    <tr>
                    <th scope='row'>$id</th>
                    <td class='text-start'>$data</td>
                    <td class='text-start'>$descricao</td>
                    <td class='text-end'>$valor1</td>
                    <td class='text-end'>$valor2</td>
                    <td class='text-center'>$buttom$buttom2</big></td>
                    <td class='text-center $formCancelado'><big>$icon</big></td>
                    </tr>
            ";
    }


    $html = file_get_contents("views/financeiro-template.html");

    $html = str_replace("[[lista]]",$lista,$html);
    $html = str_replace("[[base_url]]",$baseUrl,$html);

    echo $html;