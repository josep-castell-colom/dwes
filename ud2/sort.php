<?php

$array=[4, 2, 5, 3, 6, 1, 9, 8, 7, 40, 20, 24, 25, 21, 42];

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

$newArray=intercambio($array);

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

$newArray=nuevoArrayAscendente($array);

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

##########################################################################
?>
