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

            if($depCred == "Débito"){
                $valor1 = $valor;
                $valor2 = "00,00";
            }else{
                $valor2 = $valor;
                $valor1 = "00,00";
            }

            if($status == "Cancelado"){
                $formCancelado = "table-danger";
                $formlinha = "table-danger";
                $icon = "<i class='bi bi-x-square-fill text-danger'></i>";
                $buttom = "";
                $buttom2 = "";
            }else{
                $formCancelado = "table-success";
                $formlinha = "";
                $icon = "<i class='bi bi-check-square-fill text-success'></i>";
                $buttom = "<a href='[[base-url]]/financas/editar/$id' class='btn btn-secondary btn-sm me-1'><i class='bi bi-pencil-square'></i> Editar</a>";
                $buttom2 = "<a href='[[base-url]]/financas/cancelar/$id' onclick=\"return confirm('Cancelar o registro de $data?')\" class='btn btn-danger btn-sm'><small><i class='bi bi-x-square'></i> Cancelar</small></a>";
            }

            $data = explode("-",$data);
            $data = str_replace("-","/",$data);
            $data = implode("/",$data);

            $ano = $data[0].$data[1].$data[2].$data[3];
            $mes = $data[4].$data[5].$data[6].$data[7];
            $dia = $data[8].$data[9];

            $data = $dia.$mes.$ano;
          

            $lista.="
                    <tr class='$formlinha'>
                    <th scope='row' class='text-center align-middle'>$id</th>
                    <td class='text-start align-middle w-auto border'>$data</td>
                    <td class='text-start align-middle w-50 border'>$descricao</td>
                    <td class='text-end align-middle text-danger table-danger w-25'>R$: $valor1</td>
                    <td class='text-end align-middle text-success $formCancelado w-25'>R$: $valor2</td>
                    <td class='text-center align-middle fs-4 border $formCancelado w-auto'>$icon</td>
                    <td class='text-center align-middle border w-100'>$buttom2</td>
                    </tr>
            ";
    }


    $html = file_get_contents("views/financeiro-template.html");

    $html = str_replace("[[lista]]",$lista,$html);
    $html = str_replace("[[base-url]]",$baseUrl,$html);

    echo $html;