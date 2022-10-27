<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Algoritmos de ordenación - Josep Maria Castell Colom</title>
  <link rel="stylesheet" href="../style.css">
  <script src="../main.js" defer></script>
</head>
<body>
  <header>
    <h1 id="main-title">Página de ejercicios de <em>Josep Maria Castell Colom</em></h1>
    <h2 id="main-subtitle">Desarrollo web entorno servidor - DAW2</h2>
    <span class="theme-switcher">
    <span id="theme-light" class="theme-active">Claro</span> | 
    <span id="theme-dark">Oscuro</span></span>
  </header>
  <section class="exercice-section">
    <h2 class="exercice-section-title">Ordenación de arrays<pre>[13/10/22]</pre></h2>
    <form action="" method="get">
      <label for="min">Valor mínimo:</label>
      <input type="number" name="min" placeholder="0">
      <label for="max">Valor máximo:</label>
      <input type="number" name="max" placeholder="10">
      <label for="cantidad">Cantidad de elementos:</label>
      <input type="number" name="cantidad" placeholder="10">
      <label for="metodo">Método de ordenación:</label>
      <select name="metodo" id="metodo">
        <option value="intercambio">Intercambio</option>
        <option value="nuevoArrayAscendente">Nuevo array ascendente</option>
        <option value="seleccionDirecta">Selección directa</option>
        <option value="burbuja">Burbuja</option>
        <option value="quickSortWrap">QuickSort</option>
        <option value="todos">Comparar todos los métodos</option>
      </select>
      <input type="submit" name="enviar" value="Enviar">
    </form>
  <?php
  
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
  function comprobarValores($min, $max, $quantity) {
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

  /**
   * Recorre el array comparando cada elemento con los demás, si encuentra uno mayor, los intercambia.
   *
   * @param array Array de números para ser ordenados.
   *
   * @return array Array de números ordenados + num. de iteraciones en índice 1 
   *         + tiempo de ejecución en índice 0.
   */
  function intercambio($array) {
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
  function nuevoArrayAscendente($array) {
    $start = microtime(true);
    $counter = 0;
    $nuevoArray = [];
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
  function seleccionDirecta($array){
    $start = microtime(true);
    $counter = 0;
    $min_key = 0;
    $index = 0;
    while ($index < count($array)) {
      $counter++;
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
  function burbuja($array) {
    $start = microtime(true);
    $counter = 0;
    if (count($array) > 1) {
      $fin = false;
      while (!$fin) {
        $counter++;
        $fin = true;
        for ($i = 0; $i < count($array) - 1; $i++) {
          if ($array[$i] > $array[$i + 1]) {
            $min = $array[$i + 1];
            array_splice($array, $i + 1, 1, $array[$i]);
            array_splice($array, $i, 1, $min);
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
  function quickSort($array){
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
  function quickSortWrap($array) {
    $start = microtime(true);
    $nuevoArray = quickSort($array);
    $end = microtime(true);
    $time = $end - $start;
    array_unshift($nuevoArray, $time);
    return $nuevoArray;
  }

  /**
   * Realiza la ordenación con todos los algoritmos y muestra el tiempo de ejcución y el número de iteraciones.
   *
   * @param array $array Recibe el array a ser ordenado por todos los métodos.
   *
   * @return string Devuelve una cadena de texto con una tabla HTML con el nombre, tiempo de ejecución y número de iteraciones de cada método.
   */
  function todos($array){
    $functions = [
      "intercambio", 
      "nuevoArrayAscendente", 
      "seleccionDirecta",
      "burbuja",
      "quickSortWrap"
    ];
    $output = "<table>";

    $output .= "<th>Algoritmo</th><th>Tiempo de ejecución</th><th>Iteraciones</th>";

    foreach($functions as $function){
      $resultado = $function($array);
      $output .= "<tr><td>$function</td><td>$resultado[0]</td><td>$resultado[1]</td></tr>";
    }
    return $output . "</table>";
  }

  /**
   * Función llamada al enviar el formulario. Recibe los parámetros necesarios para generar el array y aplicarle el método requerido.
   *
   * Función compleja que recibe por parámetro los datos del 
   * formulario HTML necesarios para llamar a generarArray() y 
   * aplicar al array resultante el método seleccionado.
   * También se encarga de generar la cadena de texto con código 
   * HTML para dibujar la tabla con sus valores en el 'front-end'.
   *
   * @return string $output Cadena de texto con código HTML que contiene una tabla con los datos requeridos.
   */
  function render(){
    $min = $_GET['min'] ?: "0";
    $max = $_GET['max'] ?: "10";
    $quantity = $_GET['cantidad'] ?: "10";
    $metodo = $_GET['metodo'];
    $output;

    $array = generarArray($min, $max, $quantity);

    if (!$array) {
      echo "<p class='error'>No ha sido posible generar el array; valores introducidos erróneos.</p>";
      return false;
    }

    $output = "<div><h2 class='center'>Conjunto de $quantity números entre el $min y el $max</h2>";

    if ($metodo === "todos") {
      $output .= "Comparación de los tiempos de ejecución y número de iteraciones de los diferentes algoritmos de ordenación.";
      return $output . todos($array);
    }

    $arrayOrdenado = $metodo($array);
    $tiempoEjecucion = array_splice($arrayOrdenado, 0, 1)[0];
    $contadorIteraciones = array_splice($arrayOrdenado, 0, 1)[0];

    $output .= "<div class='flex'><div class=''><h3>Array generado:</h3><table>";

    foreach ($array as $key => $value) {
      $output .= "<tr><td>Posición " . $key + 1 . " => $value</td></tr>";
    }

    $output .= "</table>";
    
    $output .= "</div><br/><div class='flex center column'><h3>Array ordenado mediante $metodo:</h3>";

    $output .= "<p>Tiempo de ejecución: $tiempoEjecucion<br>Iteraciones: $contadorIteraciones</p>";
    
    $output .= "<table>";
    
    foreach ($arrayOrdenado as $key => $value) {
      $output .= "<tr><td>Posición " . $key + 1 . " => $value</td></tr>";
    }
    
    return $output . "</table></div></div></div>";
  }
  if (isset($_GET['enviar'])) {
   echo render(); 
  }
  ?>
  </section>
</body>
</html>
