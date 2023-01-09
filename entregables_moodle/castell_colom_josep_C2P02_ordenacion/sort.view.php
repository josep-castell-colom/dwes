<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Algoritmos de ordenación - Josep Maria Castell Colom</title>
  <link rel="stylesheet" href="style.css">
  <style>
    #sort-form {
      display: flex;
      flex-direction: column;
      margin: 1rem auto 2rem;
      padding: 2rem;
      border: 1px solid gray;
    }

    #sort-form span {
      display: flex;
    }

    #sort-form input[type="submit"] {
      width: 10rem;
      margin: 2rem auto 0;
    }

    td {
      background-color: white;
    }

    fieldset {
      max-width: 700px;
      margin-left: 3rem;
    }

    fieldset button {
      margin: 0;
    }

    #parametros {
      display: flex;
      flex-direction: column;
    }

    #titulo2 {
      margin-top: 2rem;
    }

    #ejemplo-json {
      display: none;
      margin-left: 3rem;
    }
  </style>
  <script src="../main.js" defer></script>
</head>

<body>
  <header>
    <h1 id="main-title">Página de ejercicios de <em>Josep Maria Castell Colom</em></h1>
    <h2 id="main-subtitle">Desarrollo web entorno servidor - DAW2</h2>
  </header>
  <section class="exercice-section">
    <h2 class="exercice-section-title">Ordenación de arrays
      <pre>v1.0 [13/10/22]</pre>
      <pre>v2.0 [18/12/22]</pre>
    </h2>
    <form action="" method="get" id="sort-form">
      <label for="generador"><strong>Método de generación del array:</strong></label>
      <span>
        <input type="radio" name="generador" id="pregenerado" value="pregenerado" checked="checked">
        <label for="pregenerado">Pre-generado: <small>[5, 2, -2, 7, 1, 0, 9, 4, 6, 3, 8, -5, -1, 10, -3, -4]</small></label>
      </span>
      <span>
        <input type="radio" name="generador" id="aleatorio" value="aleatorio">
        <label for="aleatorio">Aleatorio (introducir parámetros)</label>
      </span>
      <fieldset id="parametros">
        <legend>Parámetros para generar el array:</legend>
        <label for="min">Valor mínimo:</label>
        <input type="number" name="min" placeholder="0">
        <label for="max">Valor máximo:</label>
        <input type="number" name="max" placeholder="10">
        <label for="cantidad">Cantidad de elementos:</label>
        <input type="number" name="cantidad" placeholder="10">
      </fieldset>
      <span>
        <input type="radio" name="generador" id="introduccion" value="introduccion">
        <label for="introduccion">Introducir números</label>
      </span>
      <fieldset>
        <legend>Introduce números:</legend>
        <label for="number">Añade número:</label>
        <input type="number" id="number">
        <input type="hidden" name="numeros" id="hidden-array">
        <button type="button" onclick="addNumber()">Añade</button>
        <div id="hidden-array-display"></div>
      </fieldset>
      <span>
        <input type="radio" name="generador" id="fichero" value="fichero">
        <label for="fichero">Fichero de texto externo (formato JSON)</label>
      </span>
      <div id="ejemplo-json">
        <small>Ejemplo:</small>
        <pre>
    {
      "numbers": ["5", "2", "1", "4", "3"]
    }
        </pre>
      </div>
      <fieldset>
        <legend>Añade un fichero:</legend>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000">
        <input type="file" name="fichero" id="fichero">
      </fieldset>
      <label for="metodo" id="titulo2"><strong>Método de ordenación:</strong></label>
      <select name="metodo" id="metodo">
        <option value="intercambio">Intercambio</option>
        <option value="nuevoArrayAscendente">Nuevo array ascendente</option>
        <option value="seleccionDirecta">Selección directa</option>
        <option value="burbuja">Burbuja</option>
        <option value="quickSortWrap">QuickSort</option>
        <option value="todos">Comparar todos los métodos</option>
      </select>
      <input type="submit" name="enviar" value="Enviar" id="submit">
    </form>
    <div id="php-output">
      <?php
      if (isset($_GET['enviar']) && !isset($_POST['enviar'])) {
        echo render_get();
      }
      if (isset($_POST['enviar'])) {
        echo uploadTxt();
      }
      ?>
    </div>
  </section>
  <script>
    const form = document.getElementById('sort-form');
    const radioButtons = document.querySelectorAll('input[name="generador"]');
    const submit = document.getElementById('submit');
    const phpOutput = document.getElementById('php-output');
    const newNumber = document.getElementById('number');
    const hiddenArray = document.getElementById('hidden-array');
    const hiddenArrayDisplay = document.getElementById('hidden-array-display');
    const ejemplo = document.getElementById('ejemplo-json');
    let firstNumber = true;
    let numberArray = {
      numbers: []
    };

    function checkForPost() {
      let checkedButton = null;
      radioButtons.forEach((button) => {
        if (button.checked) {
          checkedButton = button;
        }
      });
      if (checkedButton.value == 'fichero') {
        ejemplo.style.display = 'block';
        form.method = 'POST';
        form.enctype = 'multipart/form-data';
      } else {
        ejemplo.style.display = 'none';
        form.method = 'GET';
        form.removeAttribute('enctype');
      }
    }

    function addNumber() {
      numberArray.numbers.push(parseInt(newNumber.value));
      hiddenArray.value = JSON.stringify(numberArray);
      if (firstNumber) {
        hiddenArrayDisplay.innerText += `${ newNumber.value }`;
        firstNumber = false;
      } else {
        hiddenArrayDisplay.innerText += ` - ${ newNumber.value }`;
      }
    }

    radioButtons.forEach((button) => {
      button.addEventListener('change', () => {
        checkForPost();
      });
    });

    submit.addEventListener('click', () => { phpOutput.innerHTML = ""; });

    checkForPost();
  </script>
</body>

</html>
