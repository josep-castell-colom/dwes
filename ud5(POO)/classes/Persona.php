<?php
class Persona {
  private string $nombre;
  private int $edad;

  private function constructFull(string $nombre, int $edad) {
    $this->nombre = $nombre;
    $this->edad = $edad;
  }
  
  private function constructEmpty() {
    $this->nombre = "";
    $this->edad = 0;
  }

  public function __construct() {
    $params = func_get_args();
    try {
      switch (sizeof($params)) {
        case 0:
          $this->constructEmpty();
          break;

        case 2:
          $this->constructFull($params[0], $params[1]);
          break;
        
        default:
          throw new Exception('Llamada a método '. get_class($this) . '::Param, con número inadecuado de parámetros');
          break;
      }
    } catch (Exception $e) {
      echo $e;
    }
  }

  public function __toString() {
    return "Nombre: $this->nombre.\nEdad: $this->edad.\n";
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getEdad() {
    return $this->edad;
  }
  
}
