<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      <a href="../index.php"><button>Volver</button></a>
    </section>
  </main>
</body>
</html>
