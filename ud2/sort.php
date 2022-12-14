<?php
$array_predefinido = [5, 2, -2, 7, 1, 0, 9, 4, 6, 3, 8, -5, -1, 10, -3, -4];

/**
 * Comprueba si los valores recibidos son correctos.
 *
 * El mínimo debe ser menor que el máximo y la cantidad de elementos
 * tiene que ser menor o igual a la diferencia entre el máximo y el mínimo.
 *
 * @param int $min
 *
 * @param int $max
 *
 * @param int $quantity
 *
 */
function comprobarValores($min, $max, $quantity)
{
  if ($min < $max && $quantity <= $max - $min) {
    return true;
  }
  return false;
}

/**
 * Genera un array de números aleatorios.
 *
 * @param int $min Valor mínimo del array generado (por defecto 0).
 *
 * @param int $max Valor máximo del array generado (por defecto 10).
 *
 * @param int $quantity Número total de elementos generados (por defecto 10).
 *
 * @return array Array de números enteros aleatorios.
 *
 */
function generarArray($min = 0, $max = 10, $quantity = 10)
{
  if (!comprobarValores($min, $max, $quantity)) return false;
  $array = [];
  for ($i = 0; $i < $quantity; $i++) {
    $randomNumber = rand($min, $max);
    if (!in_array($randomNumber, $array)) {
      array_push($array, $randomNumber);
    } else {
      $i--;
    }
  }
  return $array;
}

/**
 * Recorre el array comparando cada elemento con los demás, si encuentra uno mayor, los intercambia.
 *
 * @param array Array de números para ser ordenados.
 *
 * @return array Array de números ordenados + num. de iteraciones en índice 1 
 *         + tiempo de ejecución en índice 0.
 */
function intercambio($array)
{
  $start = microtime(true);
  $counter = 0;
  for ($i = 0; $i < count($array); $i++) {
    $counter++;
    for ($j = $i + 1; count($array) - $j > 0; $j++) {
      if ($array[$j] < $array[$i]) {
        $min = $array[$j];
        $array[$j] = $array[$i];
        $array[$i] = $min;
      }
    }
  }
  $end = microtime(true);
  $time = $end - $start;
  array_unshift($array, $time, $counter);
  return $array;
}

/**
 * Selecciona el elemento cuyo valor es el más pequeño de todo el 
 * array y lo introduce en un nuevo array.
 *
 * Se crea un array vacío el cual se irá rellenando con el valor 
 * más pequeño del array recibido, eliminándolo de éste.
 * Cuando el array recibido esté vacío el nuevo array estará 
 * completo y ordenado.
 *
 * @param array Array de números para ser ordenados.
 *
 * @return array Array de números ordenados + num. de iteraciones en índice 1 
 *         + tiempo de ejecución en índice 0.
 */
function nuevoArrayAscendente($array)
{
  $counter = 0;
  $nuevoArray = [];
  $start = microtime(true);
  while (!empty($array)) {
    $counter++;
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
  $end = microtime(true);
  $time = $end - $start;
  array_unshift($nuevoArray, $time, $counter);
  return $nuevoArray;
}

/**
 * Selecciona el elemento cuyo valor es el más pequeño y lo 
 * intercambia por el primero, continua por el segundo y así 
 * sucesivamente.
 *
 * @param array Array de números para ser ordenados.
 *
 * @return array Array de números ordenados + num. de iteraciones en índice 1 
 *         + tiempo de ejecución en índice 0.
 */
function seleccionDirecta($array)
{
  $counter = 0;
  $min_key = 0;
  $index = 0;
  $start = microtime(true);
  while ($index < count($array)) {
    $counter++;
    $min_value = $array[$index];
    for ($i = $index; $i < count($array); $i++) {
      if ($array[$i] <= $min_value) {
        $min_value = $array[$i];
        $min_key = $i;
      }
    }
    $aux = $array[$index];
    $array[$index] = $min_value;
    $array[$min_key] = $aux;
    // array_splice($array, $index, 0, $min_value);
    // array_splice($array, $min_key + 1, 1);
    $index++;
  }
  $end = microtime(true);
  $time = $end - $start;
  array_unshift($array, $time, $counter);
  return $array;
}

/**
 * Comprueba dos valores consecutivos y si el primero es mayor que 
 * el segundo los intercambia.
 *
 * @param array $array Array de números a ser ordenados.
 *
 * @return array Array de números ordenados + num. de iteraciones en índice 1 
 *         + tiempo de ejecución en índice 0.
 */
function burbuja($array)
{
  $counter = 0;
  $start = microtime(true);
  if (count($array) > 1) {
    $fin = false;
    while (!$fin) {
      $counter++;
      $fin = true;
      for ($i = 0; $i < count($array) - 1; $i++) {
        if ($array[$i] > $array[$i + 1]) {
          $aux = $array[$i + 1];
          $array[$i + 1] = $array[$i];
          $array[$i] = $aux;
          // array_splice($array, $i + 1, 1, $array[$i]);
          // array_splice($array, $i, 1, $min);
          $fin = false;
        }
      }
    }
  }
  $end = microtime(true);
  $time = $end - $start;
  array_unshift($array, $time, $counter);
  return $array;
}

/**
 * Divide el array mediante un pivote y crea una lista de números 
 * menores y otra de números mayores. Aplica el mismo proceso a 
 * cada uno de estos arrays hasta que todos los números están ordenados.
 *
 * @param array $array Array de números a ser ordenados.
 *
 * @return array Array de números ordenados + número de iteraciones en el índice 0.
 */
function quickSort($array)
{
  static $counter = 0;
  if (count($array) <= 1) {
    return $array;
  }
  $pivote = $array[0];
  $arrayMenor = [];
  $arrayMayor = [];
  $counter++;
  for ($i = 1; $i < count($array); $i++) {
    if ($array[$i] < $pivote) {
      $arrayMenor[] = $array[$i];
    } else {
      $arrayMayor[] = $array[$i];
    }
  }
  $nuevoArray = array_merge(quickSort($arrayMenor), array($pivote), quickSort($arrayMayor));
  array_unshift($nuevoArray, $counter);
  return $nuevoArray;
}

/**
 * Calcula el tiempo de ejecución de la función quickSort.
 *
 * @param array $array Array de números que será pasado a la función quickSort.
 *
 * @return array Array ordenado por quickSort + tiempo de ejecución en el índice 0.
 */
function quickSortWrap($array)
{
  $start = microtime(true);
  $nuevoArray = quickSort($array);
  $end = microtime(true);
  $time = $end - $start;
  array_unshift($nuevoArray, $time);
  return $nuevoArray;
}

function todos($array)
{
  $functions = [
    "intercambio",
    "nuevoArrayAscendente",
    "seleccionDirecta",
    "burbuja",
    "quickSortWrap"
  ];
  $output = "<table>";

  $output .= "<th>Algoritmo</th><th>Tiempo de ejecución</th><th>Iteraciones</th>";

  foreach ($functions as $function) {
    $resultado = $function($array);
    $output .= "<tr><td>$function</td><td>$resultado[0]</td><td>$resultado[1]</td></tr>";
  }
  return $output . "</table>";
}

##########################################################################

function render_get()
{
  $metodo_generacion = $_GET['generador'];
  $metodo_generacion_nombre = "";
  $array = [];
  $metodo_ordenacion = $_GET['metodo'];
  $metodo_ordenacion_nombre = "";
  $output = '';

  switch ($metodo_generacion) {
    case 'pregenerado':
      $metodo_generacion_nombre = 'Array pre-definido en el código';
      $array = $GLOBALS['array_predefinido'];
      break;
    case 'aleatorio':
      $metodo_generacion_nombre = 'Array generado de forma aleatoria con parámetros definidos por el usuario';
      $min = $_GET['min'] ?: "0";
      $max = $_GET['max'] ?: "10";
      $quantity = $_GET['cantidad'] ?: "10";
      $array = generarArray($min, $max, $quantity);
      break;
    case 'introduccion':
      $metodo_generacion_nombre = 'Array definido por el usuario';
      $number_array = json_decode($_GET['numeros'], true);
      $array = $number_array['numbers'];
      break;
    default:
      break;
  }

  switch ($metodo_ordenacion) {
    case 'intercambio':
      $metodo_ordenacion_nombre = 'Intercambio';
      break;
    case 'nuevoArrayAscendente':
      $metodo_ordenacion_nombre = 'Nuevo array ascendente';
      break;
    case 'seleccionDirecta':
      $metodo_ordenacion_nombre = 'Selección directa';
      break;
    case 'burbuja':
      $metodo_ordenacion_nombre = 'Burbuja';
      break;
    case 'quickSort':
      $metodo_ordenacion_nombre = 'Quick sort';
      break;
    default:
      break;
  }

  if (!$array) {
    echo "<p class='error'>No ha sido posible generar el array; valores introducidos erróneos.</p>";
    return false;
  }

  if ($metodo_ordenacion === 'todos') {
    $output .= '<div class="flex"><div class="flex center column"><h3>Array generado:</h3><p>';

    foreach ($array as $key => $value) {
      $output .= "$value  ";
    }

    $output .= '</p><p>Comparación de los tiempos de ejecución y número de iteraciones de los diferentes algoritmos de ordenación:</p>';

    return $output . todos($array);
  }

  $arrayOrdenado = $metodo_ordenacion($array);
  $tiempoEjecucion = array_splice($arrayOrdenado, 0, 1)[0];
  $contadorIteraciones = array_splice($arrayOrdenado, 0, 1)[0];

  $output .= "<p>Método de generación del array: <strong>$metodo_generacion_nombre</strong></p>";

  if ($metodo_generacion == 'aleatorio') {
    $output = "<p>Conjunto de $quantity números entre el $min y el $max</p>";
  }

  $output .= "<p>Método de ordenación: <strong>$metodo_ordenacion_nombre</strong></p>";

  $output .= "<p>Tiempo de ejecución: <strong>$tiempoEjecucion</strong></p><p>Iteraciones: <strong>$contadorIteraciones</strong></p>";

  $output .= '<div><div class="flex"><div class="flex center column"><h3>Array generado:</h3><table>';

  foreach ($array as $key => $value) {
    $output .= "<tr><td>Posición " . $key + 1 . " = $value</td></tr>";
  }

  $output .= '</table>';

  $output .= "</div><br/><div class='flex center column'><h3>Array ordenado:</h3>";

  $output .= '<table>';

  foreach ($arrayOrdenado as $key => $value) {
    $output .= "<tr><td>Posición " . $key + 1 . " = $value</td></tr>";
  }

  return $output . '</table></div></div></div>';
}

function render_post($target_file)
{
  $metodo_generacion_nombre = "Fichero de texto externo";
  $array = [];
  $metodo_ordenacion = $_POST['metodo'];
  $metodo_ordenacion_nombre = "";
  $output = '';

  $json_file = file_get_contents($target_file);
  $number_array = json_decode($json_file, true);
  $array = $number_array['numbers'];

  switch ($metodo_ordenacion) {
    case 'intercambio':
      $metodo_ordenacion_nombre = 'Intercambio';
      break;
    case 'nuevoArrayAscendente':
      $metodo_ordenacion_nombre = 'Nuevo array ascendente';
      break;
    case 'seleccionDirecta':
      $metodo_ordenacion_nombre = 'Selección directa';
      break;
    case 'burbuja':
      $metodo_ordenacion_nombre = 'Burbuja';
      break;
    case 'quickSort':
      $metodo_ordenacion_nombre = 'Quick sort';
      break;
    default:
      break;
  }

  if (!$array) {
    echo "<p class='error'>No ha sido posible generar el array; valores introducidos erróneos.</p>";
    return false;
  }

  if ($metodo_ordenacion === 'todos') {
    $output .= '<div class="flex"><div class="flex center column"><h3>Array generado:</h3><p>';

    foreach ($array as $key => $value) {
      $output .= "$value  ";
    }

    $output .= '</p><p>Comparación de los tiempos de ejecución y número de iteraciones de los diferentes algoritmos de ordenación:</p>';

    return $output . todos($array);
  }

  $arrayOrdenado = $metodo_ordenacion($array);
  $tiempoEjecucion = array_splice($arrayOrdenado, 0, 1)[0];
  $contadorIteraciones = array_splice($arrayOrdenado, 0, 1)[0];

  $output .= "<p>Método de generación del array: <strong>$metodo_generacion_nombre</strong></p>";

  $output .= "<p>Método de ordenación: <strong>$metodo_ordenacion_nombre</strong></p>";

  $output .= "<p>Tiempo de ejecución: <strong>$tiempoEjecucion</strong></p><p>Iteraciones: <strong>$contadorIteraciones</strong></p>";

  $output .= '<div><div class="flex"><div class="flex center column"><h3>Array generado:</h3><table>';

  foreach ($array as $key => $value) {
    $output .= "<tr><td>Posición " . $key + 1 . " = $value</td></tr>";
  }

  $output .= '</table>';

  $output .= "</div><br/><div class='flex center column'><h3>Array ordenado:</h3>";

  $output .= '<table>';

  foreach ($arrayOrdenado as $key => $value) {
    $output .= "<tr><td>Posición " . $key + 1 . " = $value</td></tr>";
  }

  return $output . '</table></div></div></div>';
}

function uploadTxt()
{
  $target_dir = '/var/www/uploads/';
  $target_file = $target_dir . basename($_FILES['fichero']['name']);
  $upload_ok = 1;
  $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

  if (file_exists($target_file)) {
    echo "<p>El archivo ya existe en el servidor.</p>";
    return render_post($target_file);
  }

  if ($file_type != 'txt') {
    echo "<p>Formato de archivo no admitido; sólo .txt.</p>";
    $upload_ok = 0;
  }

  if ($upload_ok == 0) {
    echo "<p>Carga de fichero fallida.</p>";
  } else {
    if (move_uploaded_file($_FILES['fichero']['tmp_name'], $target_file)) {
      echo '<p>Carga correcta.</p>';
      return render_post($target_file);
    } else {
      return '<p>Lo sentimos, ha habido un error en la carga del archivo.</p>';
    }
  }
}

##########################################################################

require './sort.view.php';
