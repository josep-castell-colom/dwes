<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Ordenación de arrays</h1>
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
      <option value="todos">Comparar todos los métodos</option>
    </select>
    <input type="submit" name="enviar" value="Enviar">
  </form>
<?php
if (isset($_GET['enviar'])) {
 echo render(); 
}
?>
</body>
</html>
