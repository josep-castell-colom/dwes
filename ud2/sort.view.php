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
        <option value="quickSort">QuickSort</option>
        <option value="todos" disabled>Comparar todos los métodos</option>
      </select>
      <input type="submit" name="enviar" value="Enviar">
    </form>
  <?php
  if (isset($_GET['enviar'])) {
   echo render(); 
  }
  ?>
    <a href="../index.php"><button>Volver</button></a>
  </section>
</body>
</html>
