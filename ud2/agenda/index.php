<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DWES_formulario agenda - Josep Maria Castell Colom</title>
</head>
<body>
  <header>
    <h1 id="main-title">DWES_formulario agenda - <em>Josep Maria Castell Colom</em></h1>
    <h2 id="main-subtitle">Desarrollo web entorno servidor - DAW2</h2>
  </header>
  <main>
    <section class="exercice-section">
      <h2 class="exercice-section-title">Agenda contactos sin sesiones<pre>[07/10/22]</pre></h2>
      <p>Creacion de una agenda de contactos sin usar sesiones ni cookies.</p>
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
            if (isset($value)){
              echo "<input type='hidden' name='agenda' value='$value'>";
            }
          }
        ?>
      </form>
      <div class="output">
      </div>
    </section>
  </main>
</body>
</html>
