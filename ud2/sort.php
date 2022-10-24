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

# INTERCAMBIO 

/**
 * Recorre el array comparando cada elemento con los demás, si encuentra uno mayor, los intercambia.
 *
 * @param array Array de números para ser ordenados.
 *
 * @return array Array ordenado.
 *
 */

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

# SELECCIÓN DIRECTA CON NUEVO ARRAY 

/**
 * Selecciona el elemento cuyo valor es el más pequeño de todo el array y lo introduce en un nuevo array.
 *
 * Se crea un array vacío el cual se irá rellenando con el valor más pequeño del array recibido, eliminándolo de éste.
 * Cuando el array recibido esté vacío el nuevo array estará completo y ordenado.
 *
 * @param array Array de números para ser ordenados.
 *
 * @return array Array ordenado.
 *
 */

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

# SELECCIÓN DIRECTA

/**
 * Selecciona el elemento cuyo valor es el más pequeño y lo intercambia por el primero, continua por el segundo y así sucesivamente.
 *
 * @param array Array de números para ser ordenados.
 *
 * @return array Array ordenado.
 *
 */

function seleccionDirecta($array){
  $min_key = 0;
  $index = 0;
  while ($index < count($array)) {
    $min_value = $array[$index];
    for ($i = $index; $i < count($array); $i++) {
      if ($array[$i] <= $min_value) {
        $min_value = $array[$i];
        $min_key = $i;
      } 
    }
    array_splice($array, $index, 0, $min_value);
    array_splice($array, $min_key + 1, 1);
    $index++;
  }
  return $array;
}

# MÉTODO BURBUJA

function burbuja($array) {
  if (count($array) > 1) {
    $fin = false;
    $contador = 0;
    while (!$fin) {
      $fin = true;
      for ($i = 0; $i < count($array) - 1; $i++) {
        if ($array[$i] > $array[$i + 1]) {
          $min = $array[$i + 1];
          array_splice($array, $i + 1, 1, $array[$i]);
          array_splice($array, $i, 1, $min);
          $fin = false;
        }
      }
      $contador++;
    }
  }
  return $array;
}

# QUICK SORT

function quickSort($array){
  $pivote = $array[0];
  $arrayMenor = [];
  $arrayMayor = [];
  echo "array generado: <br>";
  foreach ($array as $key => $value) {
    echo "$key -> $value<br>";
  }
  echo "pivote = $pivote<br>";
  foreach ($array as $valor) {
    if ($valor < $pivote) {
      array_push($arrayMenor, $valor);
    } else {
      array_push($arrayMayor, $valor);
    }
  }
  echo "arrayMenor:<br>";
  foreach ($arrayMenor as $key => $valor) {
    echo "$key -> $valor<br>";
  }
  echo "arrayMayor:<br>";
  foreach ($arrayMayor as $key => $valor) {
    echo "$key -> $valor<br>";
  }
  echo 'quickSort arrayMenor ##########';
  quickSort($arrayMenor);
  echo 'quickSort arrayMayor ##########';
  quickSort($arrayMayor);
}

##########################################################################
# TODO
function todos(){
  $functions = ["intercambio", "nuevoArrayAscendente", "seleccionDirecta"];
}

##########################################################################

function render(){
  $min = $_GET['min'] ?: "0";
  $max = $_GET['max'] ?: "10";
  $quantity = $_GET['cantidad'] ?: "10";
  $metodo = $_GET['metodo'];
  $output;

  $array = generarArray($min, $max, $quantity);

  if (!$array) {
    echo "<p class='error'>No ha sido posible generar el array</p>";
    return false;
  }

  $arrayOrdenado = $metodo($array);

  $output = "<h2 class='center'>Conjunto de $quantity números entre el $min y el $max.</h2>";
  $output .= "<div class='flex'><div class=''><h3>Array generado:</h3><table>";

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

