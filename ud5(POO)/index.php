<?php
declare(strict_types=1);
// include_once "classes/Coche.php";

$misClases = array(
  "Coche" => "/var/www/dwes/ud5/classes/Coche.php",
);

function miCargador($nomclasse){
  include "classes/$nomclasse.php";
}

function miCargador2($nomclasse){
  include __DIR__ . "/classes/$nomclasse.php";
}

function miCargador3($nomclasse){
  global $misClases;
  foreach($misClases as $clase => $ruta){
    if($nomclasse == $clase){
      include $ruta;
    }
  }
}

spl_autoload_register('miCargador');
spl_autoload_register('miCargador2');
spl_autoload_register('miCargador3');

$pavo = new Persona('Juan', 32);

$buga = new Coche("Seat", "Panda", $pavo);

$buga2 = new Coche();

echo $buga;
echo $buga2;

echo $buga->color;
