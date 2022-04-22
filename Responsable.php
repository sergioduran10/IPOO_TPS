<?php

class Responsable{

    private $numDeEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //Metodo constructor...
    public function __construct($numDeEmpleado, $numLicencia, $nombre, $apellido,){
        $this->numDeEmpleado = $numDeEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        
    }

    //Setters y Getters...
    public function getNumDeEmpleado(){
        return $this->numDeEmpleado;
    }
    public function setNumDeEmpleado($numDeEmpleado){
        $this->numbeDeEmpleado = $numDeEmpleado;
    }


    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }


    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }


    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }


    //Metodo toString...
    public function __toString(){
        return "Datos del responsable: " .
        "\n Número de empleado: " . $this->getNumDeEmpleado() . 
        "\n Número de licencia: " . $this->getNumLicencia() . 
        "\n Nombre: " . $this->getNombre() .
        "\n Apellido: " . $this->getApellido();
    }

}
?>