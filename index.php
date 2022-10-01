<?php
//error handler function
function customError($errno, $errstr) {
  echo "<pre class='error'><b>Error:</b> [$errno] $errstr</pre>";
}

//set error handler
set_error_handler("customError");

function add_tags($tag, $content){
  return "<$tag>$content</$tag>";
}

function print_table(){
  try {
    $lista = [null, 0, true, false, "0", "", "foo", array()];
    $str_lista = ["null", "0", "true", "false", "\"0\"", "\"\"", "\"foo\"", "array()"];
    $i = 0;
    echo <<<TEXT
      <table>
        <tr>
          <th>Num. de fila</th>
          <th>Contenido de <code>\$var</code></th>
          <th><code>isset(\$var)</code></th>
          <th><code>empty(\$var)</code></th>
          <th><code>(bool)\$var</code></th>
          <th><code>is_null(\$var)</code></th>
        </tr>
    TEXT;
  
    foreach ($lista as $value) {
      $isset_value = isset($value) ? "true" : "false";
      $empty_value = empty($value) ? "true" : "false";
      $bool_value = $value ? "true" : "false";
      $isnull_value = is_null($value) ? "true" : "false";
      echo "<tr>" . 
        add_tags("td", $i + 1);
      echo add_tags("td", add_tags("code", "\$var = $str_lista[$i]")) .
        add_tags("td", $isset_value) .
        add_tags("td", $empty_value) .
        add_tags("td", $bool_value) .
        add_tags("td", $isnull_value);
      echo "</tr>";
      $i++;
    }
    unset($lista[1]);
    $isset_value = isset($lista[1]) ? "true" : "false";
    $empty_value = empty($lista[1]) ? "true" : "false";
    $bool_value = $lista[1] ? "true" : "false";
    $isnull_value = is_null($lista[1]) ? "true" : "false";
    
    echo <<<TEXT
    <tr>
    <td>9</td>
    <td><code>unset(\$var)</code></td>
    <td>$isset_value</td>
    <td>$empty_value</td>
    <td>$bool_value</td>
    <td>$isnull_value</td>
    TEXT;
    
    echo "</table>";
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

require './index.view.php';