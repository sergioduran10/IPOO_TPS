<?php 

class Pasajero{

    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;


    //Metodo constructor
    public function __construct($nombre, $apellido, $numDocumento, $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDocumento;
        $this->telefono = $telefono;

    }

    //setters y getters

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


    public function getNumDocumento(){
        return $this->numDocumento;
    }
    public function setNumDocumento($numDocumento){
        $this->numDocumento = $numDocumento;
    }


    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }


    //Metodo constructor

    public function __toString(){
        return "El pasajero se registró con los siguientes datos: \nNombre: " . $this->getNombre() . 
        "\n Apellido: " . $this->getApellido() . "\n Número de Documento: " . $this->getNumDocumento() . 
        "\n Telefono: " . $this->getTelefono();
    }





}

?>