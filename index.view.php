<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de ejercicios de Josep Maria Castell Colom</title>
  <link rel="stylesheet" href="style.css">
  <script src="/main.js" defer></script>
</head>
<body>
  <header>
    <h1 id="main-title">Página de ejercicios de <em>Josep Maria Castell Colom</em></h1>
    <h2 id="main-subtitle">Desarrollo web entorno servidor - DAW2</h2>
    <span class="theme-switcher">
    <span id="theme-light" class="theme-active">Claro</span> | 
    <span id="theme-dark">Oscuro</span></span>
  </header>
  <main>
    <section class="exercice-section">
      <h2 class="exercice-section-title">Práctica guiada C02PG01<pre>[30/09/22]</pre></h2>
      <p>
        Crea una página web (con PHP) que muestre el estado de una variable obtenido al aplicar las funciones <code>isset($var)</code>, <code>empty($var)</code>, <code>(bool)$var</code>, <code>is_null($var)</code> a los valores mostrados en la tabla (una fila para cada valor).
      </p>
      <p>
        A esta tabla tienes que añadirle dos columnas: una para <code>is_null()</code> y otra columna, posicionada a la izquierda que indique el número de fila.
      </p>
      <p>
        El intérprete PHP estará configurado en modo desarrollo, tal que muestre al cliente todos los errores, 'warning', 'notice', etc.
      </p>
      <button onclick="show('tabla-estados-variable')">Mostrar</button>
      <div id="tabla-estados-variable" class="hidden scroll-auto">
        <?php
          print_table();
        ?>
      </div>
    </section>
    <section class="exercice-section">
      <h2 class="exercice-section-title">Tablas de multiplicar<pre>[03/10/22]</pre></h2>
      <p>Ejemplo de codificación en PHP: generación de tabla de multiplicar del 0 al 10.</p>
      <button onclick="show('tabla-tablas-multiplicar')">Mostrar</button>
      <h3 id="show-multiplication" class="hidden">Pasa el ratón sobre la tabla</h3>
      <div id="tabla-tablas-multiplicar" class="hidden scroll-auto">
        <?php
          tablas_multiplicar(10,10);
        ?>
      </div>
    </section>
    <section class="exercice-section">
      <h2 class="exercice-section-title">Formulario<pre>[04/10/22]</pre></h2>
      <p>Formulario sencillo GET.</p>
      <form action="form.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="edad">Edad: </label>
        <input type="text" name="edad" id="edad">
        <button type="submit">Enviar</button>
      </form>
      <?php
        echo 'Tu nombre es ' . $_GET['nombre'] . '.<br/>Tu edad es ' . $_GET['edad'] . '.';
      ?>
    </section>
    <section class="exercice-section">
        <h2 class="exercice-section-title">Agenda contactos sin sesiones<pre>[07/10/22]</pre></h2>
        <p>Formulario sencillo GET.</p>
        <form action="" method="get">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre">
          <label for="telefono">Teléfono: </label>
          <input type="number" name="telefono" id="telefono">
          <button type="submit" name="submit" value="true">Enviar</button>
        <?php
        if (isset($_GET["submit"])) {
          $agenda;
          if (isset($_GET["agenda"])) {
            $contactos_str = $_GET["agenda"];
            $nombre = "";
            $telefono = "";
            $index = 0;
            for ($i = 0; $i < strlen($contactos_str); $i++) {
              switch ($contactos_str[$i]) {
                case "=": $index++;
                  break;
                case "&":
                  if (!empty($nombre) && !empty($telefono)) {
                    $agenda[$nombre] = $telefono;
                  }
                  $nombre = "";
                  $telefono = "";
                  $index = 0;
                  break;
                default:
                  if ($index === 0) {
                    $nombre .= $contactos_str[$i];
                  } elseif ($index === 1) {
                    $telefono .= $contactos_str[$i];
                  }
              }
            }
          }
          if (!empty($_GET['nombre']) && !empty($_GET['telefono'])) {
            $agenda[$_GET['nombre']] = $_GET['telefono']; 
          }
          if (!empty($_GET['nombre']) && empty($_GET['telefono'])) {
            unset($agenda[$_GET['nombre']]); 
          }

          if (!empty($agenda)) {
            $value = "";
            foreach ($agenda as $nombre => $telefono) {
              $value .= "$nombre=$telefono&";
            }

            foreach ($agenda as $nombre => $telefono) {
              echo "<p>Nombre: $nombre</p><p>Teléfono: $telefono";
            }
          }
          echo "<input type='hidden' name='agenda' value='$value'>";
        }
      ?>
      </form>
    </section>
  </main>
  <footer>
    <span><a href="https://www.cifpfbmoll.eu/">CIFP Francesc de Borja Moll</a> - 2022/2023</span>
  </footer>
</body>
</html>
