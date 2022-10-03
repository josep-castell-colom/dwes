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
    $output = <<<TEXT
      <table id='var-table'>
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
      $output .= "<tr>" . 
        add_tags("td", $i + 1);
      $output .= add_tags("td", add_tags("code", "\$var = $str_lista[$i]")) .
        add_tags("td", $isset_value) .
        add_tags("td", $empty_value) .
        add_tags("td", $bool_value) .
        add_tags("td", $isnull_value);
      $output .= "</tr>";
      $i++;
    }
    unset($lista[1]);
    $isset_value = isset($lista[1]) ? "true" : "false";
    $empty_value = empty($lista[1]) ? "true" : "false";
    $bool_value = $lista[1] ? "true" : "false";
    $isnull_value = is_null($lista[1]) ? "true" : "false";
    
    $output .= <<<TEXT
    <tr>
    <td>9</td>
    <td><code>unset(\$var)</code></td>
    <td>$isset_value</td>
    <td>$empty_value</td>
    <td>$bool_value</td>
    <td>$isnull_value</td>
    TEXT;
    
    $output .= "</table>";
    echo $output;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function tablas_multiplicar($multiplicando, $multiplicador){
  $output = "<table id='multiply-table'><thead><th>*</th>";
  for($x = 0; $x <= $multiplicando; $x++){
    $output .= "<th id='x$x'>$x</th>";
  }
  $output .= "<th>x</th>";

  $output .= "</thead><tbody>";

  for($y = 0; $y <= $multiplicando; $y++){
    $output .= "<tr id='row-y$y'><th id='y$y'>$y</th>";
    for($x = 0; $x <= $multiplicador; $x++){
      $output .= "<td id='x$x-y$y' data-x='$x' data-y='$y'>" . $x * $y . "</td>";
    }
    $output .= "</tr>";
  }
  
  $output .= "<tr><th>y</th></tr></tbody></table>";
  echo $output;
}

require './index.view.php';