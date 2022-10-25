<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examen DWES Preparación entorno - Josep Maria Castell Colom</title>
  <link rel="stylesheet" href="../style.css">
  <script src="../main.js" defer></script>
  <script src="tabla-multiplicar.js" defer></script>
</head>
<body>
  <header>
    <h1 id="main-title">Examen DWES Preparación Entorno de <em>Josep Maria Castell Colom</em></h1>
    <h2 id="main-subtitle">Desarrollo web entorno servidor - DAW2</h2>
  </header>
  <main>
    <section class="exercice-section center">
      <h2 class="exercice-section-title">Tablas de multiplicar<pre>[25/10/22]</pre></h2>
      <p>Ejemplo de codificación en PHP: generación de tabla de multiplicar del 0 al 10.</p>
      <h3 id="show-multiplication" class="hidden">Pasa el ratón sobre la tabla</h3>
      <div id="tabla-tablas-multiplicar" class="hidden scroll-auto">
        <?php
          tablas_multiplicar(10,10);
        ?>
      </div>
    </section>
  </main>
</body>
</html>
