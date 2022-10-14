<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
  <script src="../main.js" defer></script>
  <script src="tabla-multiplicar.js" defer></script>
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
      <h2 class="exercice-section-title">Tablas de multiplicar<pre>[03/10/22]</pre></h2>
      <p>Ejemplo de codificación en PHP: generación de tabla de multiplicar del 0 al 10.</p>
      <button onclick="show('tabla-tablas-multiplicar')">Mostrar</button>
      <h3 id="show-multiplication" class="hidden">Pasa el ratón sobre la tabla</h3>
      <div id="tabla-tablas-multiplicar" class="hidden scroll-auto">
        <?php
          tablas_multiplicar(10,10);
        ?>
      </div>
      <button><a href="../index.php">Volver</a></button>
    </section>
  </main>
</body>
</html>
