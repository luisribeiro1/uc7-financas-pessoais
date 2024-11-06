<?php

$lista = "";
$status_class = "";

foreach ($registros_financeiros as $registros) {
  $id_financeiro = $registros['id_financeiro'];
  $data = $registros['data'];
  $descricao = $registros['descricao'];
  $valor = $registros['valor'];
  $deb_cred = $registros['deb_cred'];
  $status = $registros['status'];

  if ($status == 'ok') {
    $status_class = 'status--ok';
  } else {
    $status_class = 'status--pendente';
  }

  $lista .= "
    <tr>
      <td class='text-center'># $id_financeiro</td>
      <td class='text-center'>$data</td>
      <td class='text-center'>$descricao</td>
      <td class='text-left'>R$ $valor</td>
      <td class='text-center'>$deb_cred</td>
      <div class='tag'>
        <td class='text-center'><span class='$status_class'>$status</span></td>
      </div>
      <td class='text-center'><a class='btn btn-danger' href='[[base-url]]/financeiro/cancelar/$id_financeiro'>Cancelar</a></td>
    </tr>
  ";
}

$lista .= "

  <div class='offcanvas offcanvas-end bg' tabindex='-1' id='offcanvasRight' aria-labelledby='offcanvasRightLabel'>
  <div class='offcanvas-header'>
    
    <button type='button' class='btn-close' data-bs-dismiss='offcanvas' aria-label='Close' class='text-white'></button>
  </div>
  <div class='offcanvas-body'>

    <form class='' action='<?= $baseUrl ?>/financeiro/atualizar' method='post'>

      <label class='mb-1' for='data'>Data:</label>
      <input class='form-control' type='date' name='data' id='data' value='<?= $data ?>' require>
      </br>

      <label class='mb-1' for='valor'>Valor:</label>
      <input class='form-control' type='number' name='valor' id='valor' min='0' step='0.01'
      value='<?= $valor ?>' require placeholder='R$ 0.000,00'>
      <br>

      <label class='mb-1' for='tipo'>Débio:</label>
      <select name='tipo' id='tipo' class='form-select'>
        <option></option>
        <option>Débito</option>
        <option>Crédito</option>
      </select>
      <br>

      <label class='mb-1'> Descrição:</label>
      <textarea class='form-control' name='descricao' id='descricao' placeholder='Descrição do item' require> <?=$descricao ?> </textarea>
      <br>

      <label for='status'>Status:</label>
      <input class='form-check-input' value='1' type='checkbox' name='status' id='status' require
      <?=$status ?>
      <br>

      <button id='toats' class='btns mt-3' type='submit'>Incluir registro</button>

      

    </form>

  </div>
</div>
";

$html = file_get_contents("views/financeiro-template.html");

$html = str_replace("[[registros]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;