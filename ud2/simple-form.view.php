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
      <h2 class="exercice-section-title">Formulario<pre>[04/10/22]</pre></h2>
      <p>Formulario sencillo GET.</p>
      <form action="" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="edad">Edad: </label>
        <input type="text" name="edad" id="edad">
        <input type="submit" name="submit" value"true">
      </form>
      <?php
      if (isset($_GET['submit'])){
        if (!empty($_GET['nombre']) && !empty($_GET['edad'])){
          echo '<p>Tu nombre es ' . $_GET['nombre'] . '.</p><p>Tu edad es ' . $_GET['edad'] . '.</p>';
        }
      }
      ?>      
      <a href="../index.php"><button>Volver</button></a>
    </section>
  </main>
</body>
</html>
