<?php

function comprobarValores($min, $max, $quantity) {
  if ($min < $max && $quantity <= $max - $min) {
    return true;
  }
  return false;
}

function generarArray($min = 0, $max = 10, $quantity = 10){
  if (!comprobarValores($min, $max, $quantity)) return false;
  $array = [];
  for ($i = 0; $i < $quantity; $i++) {
    $randomNumber = rand($min, $max);
    if (!in_array($randomNumber, $array)){
      array_push($array, $randomNumber);
    } else {
      $i--;
    }
  }
  return $array;
}

##########################################################################

function intercambio($array) {
  for ($i = 0; $i < count($array); $i++) {
    for ($j = $i + 1; count($array) - $j > 0; $j++) {
      if ($array[$j] < $array[$i]) {
        $min = $array[$j];
        $array[$j] = $array[$i];
        $array[$i] = $min;
      }
    }
  } 
  return $array;
}

/*

echo "<h1>Ordenacion por intercambio</h1>";
echo "<p>Recorre el array comparando cada elemento con los demás, si encuentra uno menor, los intercambia.</p>";

echo "<h2>Array original</h2>";
foreach ($array as $key => $value) {
  echo "$key => <b>$value</b><br/>";
}

echo "<h2>Nuevo array</h2>";
foreach ($newArray as $key => $value) {
  echo "$key => <b>$value</b><br/>";
}

*/

##########################################################################

function nuevoArrayAscendente($array) {
  $nuevoArray = [];
  while (!empty($array)) {
    $min_value = $array[0];
    $min_key = 0;
    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i] < $min_value) {
        $min_value = $array[$i];
        $min_key = $i;
      }
    }
    array_push($nuevoArray, $min_value);
    array_splice($array, $min_key, 1);
  }
  return $nuevoArray;
}

# $newArray=nuevoArrayAscendente($array);

/*

echo "<h1>Ordenacion por nuevo array (ascendente)</h1>";
echo "<p>Recorre el array buscando el elemento menor; con el que va rellenando un nuevo array y elimina este elemento del primer array.";

echo "<h2>Array original</h2>";
foreach ($array as $key => $value) {
  echo "$key => <b>$value</b><br/>";
}

echo "<h2>Nuevo array</h2>";
foreach ($newArray as $key => $value) {
  echo "$key => <b>$value</b><br/>";
}

*/

##########################################################################
# TODO
function todos(){
  $functions = ["intercambio", "nuevoArrayAscendente"];
}

##########################################################################

function render(){
  $min = $_GET['min'] ?: "0";
  $max = $_GET['max'] ?: "10";
  $quantity = $_GET['cantidad'] ?: "10";
  $metodo = $_GET['metodo'];

  $array = generarArray($min, $max, $quantity);

  if (!$array) {
    echo "<p class='error'>No ha sido posible generar el array</p>";
    return false;
  }
  $arrayOrdenado = $metodo($array);

  $output = "<h2 class='center'>Conjunto de $quantity números entre el $min y el $max.</h2>";
  $output .= "<div class='flex'><div class='flex center column'><h3>Array generado:</h3><table>";

  foreach ($array as $key => $value) {
    $output .= "<tr><td>Posición " . $key + 1 . "=> $value</td></tr>";
  }

  $output .= "</table></div><br/><div class='flex center column'><h3>Array ordenado mediante $metodo:</h3><table>";
  
  foreach ($arrayOrdenado as $key => $value) {
    $output .= "<tr><td>Posición " . $key + 1 . "=> $value</td></tr>";
  }
  
  return $output . "</table></div></div>";
}

##########################################################################

require "./sort.view.php";

