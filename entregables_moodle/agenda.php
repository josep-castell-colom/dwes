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
      <p>
        Para <b>guardar</b> un contacto introduce un nombre y un teléfono y pulsa Enviar.<br/>
        Para <b>actualizar</b> un contacto introduce un nombre existente con un número de teléfono distinto.<br/>
        Para <b>eliminar</b> un contacto introduce un nombre existente sin número de teléfono.
      </p>
      <form action="" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="telefono">Teléfono: </label>
        <input type="number" name="telefono" id="telefono">
        <button type="submit" name="submit" value="true">Enviar</button>
        <?php

/**
 * @author Josep Maria Castell Colom
 *
 * Formulario básico para guardar contactos telefónicos sin usar sesiones ni cookies.
 *
 */

          /**
           * Si si se encuentra algún valor para la clave 'submit' significa que se ha enviado el formulario.
           */
          if (isset($_GET["submit"])) {
            $agenda;
            /**
             * Si se encuentra la clave 'agenda' se recupera la información anterior.
             */
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
            /**
             * Comprobación de los valores del formulario.
             */
            if (empty($_GET['nombre'])) {   // Si no se ha introducido el nombre manda un mensaje.
              echo '<p>Introduce el nombre</p>';
            }
            if (!empty($_GET['nombre']) && !empty($_GET['telefono'])) {   // Si los dos campos son correctos se establece un nuevo clave/valor en $_GET.
              $agenda[$_GET['nombre']] = $_GET['telefono']; 
            }
            if (!empty($_GET['nombre']) && empty($_GET['telefono'])) {    // Si se introduce un nombre pero no un teléfono se borra el contacto con el mismo nombre.
              if (isset($agenda[$_GET['nombre']])) {
                unset($agenda[$_GET['nombre']]);
              } else {
                echo '<p>Usuario no encontrado para eliminar.</p>';
              }
            }
            /**
             * Se crea una variable 'value' que será el valor del campo oculto y se rellena con toda la información de la agenda.
             * El formato es nombre=telefono&
             */
            if (!empty($agenda)) {
              $value = "";
              foreach ($agenda as $nombre => $telefono) {
                $value .= "$nombre=$telefono&";
              }
              /**
               * Se imprime la información de la agenda.
               */
              foreach ($agenda as $nombre => $telefono) {
                echo "<p>Nombre: $nombre</p><p>Teléfono: $telefono";
              }
            }
            /**
             * Se añade el campo oculto del formulario con el valor previamente generado.
             */
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
