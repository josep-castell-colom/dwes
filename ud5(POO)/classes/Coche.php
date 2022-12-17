<?php
class Coche {
  private string $marca;
  private string $modelo;
  private Persona $propietario;
  
  private function constructFull(string $marca, string $modelo, Persona $propietario) {
    $this->setMarca($marca);
    $this->setModelo($modelo);
    $this->setPropietario($propietario);
  }
  
  private function constructEmpty() {
    $this->setMarca('');
    $this->setModelo('');
    $this->setPropietario(new Persona());
  }

  function __construct() {
    $params = func_get_args();
    try {
      switch (sizeof($params)) {
        case 0:
          $this->constructEmpty();
          break;

        case 3:
          $this->constructFull($params[0], $params[1], $params[2]);
          break;
        
        default:
          throw new Exception('Llamada a método '. get_class($this) . '::Param, con número inadecuado de parámetros');
          break;
      }
    } catch (Exception $e) {
      echo $e;
    }
  }

  public function getMarca() {
    return $this->marca;
  }

  public function setMarca(string $marca) {
    $this->marca = $marca;
  }

  public function getModelo() {
    return $this->modelo;
  }

  public function setModelo(string $modelo) {
    $this->modelo = $modelo;
  }

  public function getPropietario() {
    return $this->propietario;
  }

  public function setPropietario(Persona $propietario) {
    $this->propietario = $propietario;
  }

  function __toString() {
    return "Marca: $this->marca.\nModelo: $this->modelo.\nPropietario: $this->propietario";
  }

  function __get($name) {
    echo "La propiedad $name no existe para $this->marca $this->modelo.\n";
  }
}
