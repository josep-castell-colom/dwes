<?php
function tablas_multiplicar($multiplicando, $multiplicador){
  $output = "<table id='multiply-table'><thead><th style='background-color: var(--table-secondary-color)'>*</th>";
  for($x = 0; $x <= $multiplicando; $x++){
    $output .= "<th id='x$x'>$x</th>";
  }

  $output .= "</thead><tbody>";

  for($y = 0; $y <= $multiplicando; $y++){
    $output .= "<tr id='row-y$y'><th id='y$y'>$y</th>";
    for($x = 0; $x <= $multiplicador; $x++){
      $output .= "<td id='x$x-y$y' data-x='$x' data-y='$y'>" . $x * $y . "</td>";
    }
    $output .= "</tr>";
  }
  
  $output .= "</tbody></table>";
  echo $output;
}

require './tabla-multiplicar.view.php';
?>
