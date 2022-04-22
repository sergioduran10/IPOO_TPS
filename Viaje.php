<?php

class Viaje{
    private $codViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros = [];
    private $objResponsable;
    
     //Método constructor
 
    public function __construct($codViaje, $destino, $cantMaxPasajeros, $pasajeros, $objResponsable){

        $this->codViaje = $codViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->pasajeros = $pasajeros;
        $this->objResponsable = $objResponsable;
    }

    // Métodos de acceso

    public function getCodViaje(){
        return $this->codViaje;
    }
    public function setCodViaje($nuevoCodViaje){
        $this->codViaje = $nuevoCodViaje;
    }


    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($nuevoDestino){
        $this->destino = $nuevoDestino;
    }


    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($nuevoCantMaxPasajeros){
        $this->cantMaxPasajeros = $nuevoCantMaxPasajeros;
    }


    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setPasajeros($nuevoPasajeros){
        $this->pasajeros = $nuevoPasajeros;
    }


    public function getObjResponsable(){
        return $this->objResponsable;
    }
    public function setObjResponsable($nuevoObjResponsable){
        $this->objResponsable = $nuevoObjResponsable;
    }



    // Métodos varios

    /**
     * Cargar datos de viaje
     * @param string $codigoViaje
     * @param string $destino
     * @param int $cantidadMaximaPasajeros
     */
    public function cargarDatos($codigoViaje, $destino, $cantidadMaximaPasajeros){
        $this->setCodViaje($codigoViaje);
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantidadMaximaPasajeros);
    }

    /**
     * Agrega uno o más pasajeros nuevos
     * @param array $pasajeroNuevo
     */
    public function agregarPasajeros($pasajeroNuevo){
        $arrayPasajeros = $this->getPasajeros();
        $indMaximo = count($pasajeroNuevo) - 1;
        for($i = 0; $i <= $indMaximo; $i++){
            array_push($arrayPasajeros, $pasajeroNuevo[$i]);
        }        
        $this->setPasajeros($arrayPasajeros);
    }


    /**
     * Modifica los datos de un pasajero. Se puede usar "*" para dejar algún dato igual
     * @param int $indicePasajero
     * @param string $nombre 
     * @param string $apellido
     * @param int $numDoc
     */
    public function modificarPasajero($indicePasajero, $nombre, $apellido, $numDoc){
        $arrayPasajeros = $this->getPasajeros();

        if($nombre != "*"){
            $arrayPasajeros[$indicePasajero]["nombre"] = $nombre;
        }
        if($apellido != "*"){
            $arrayPasajeros[$indicePasajero]["apellido"] = $apellido;
        }
        if($numDoc != "*"){
            $arrayPasajeros[$indicePasajero]["numeroDoc"] = $numDoc;
        }

        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Elimina un pasajero
     * @param int $indicePasajero
     */
    public function eliminarPasajero($indicePasajero){
        $arrayPasajeros = $this->getPasajeros();
        array_splice($arrayPasajeros, $indicePasajero, 1);
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Muestra un pasajero
     */
    public function mostrarPasajero($indicePasajero){
        $arrayPasajeros = $this->getPasajeros();
        //echo $arrayPasajeros->__toString();
        "\nPasajero número " . $indicePasajero .
        "\nNombre: " . $arrayPasajeros[$indicePasajero]["nombre"] .
        "\nApellido: " . $arrayPasajeros[$indicePasajero]["apellido"] .
        "\nNúmero de documento: " . $arrayPasajeros[$indicePasajero]["numeroDoc"];
    }

  


    // Metodo para modificar los datos del responsable
    /**
     * Modifica los datos de un responsable. Se puede usar "*" para dejar algún dato igual
     * @return boolean
     */
    public function modificarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido){

        $objResponsable = $this->getObjResponsable();
        $bandera = true;

        if ($nroEmpleado != "*") {
            $objResponsable->setNumDeEmpleado($nroEmpleado);
        }
        if ($nroLicencia != "*") {
            $objResponsable->setNumLicencia($nroLicencia);
        }
        if ($nombre != "*") {
            $objResponsable->setNombre($nombre);
        }
        if ($apellido != "*") {
            $objResponsable->setApellido($apellido);
        }
        return $bandera;
    }

    // Método __toString

    public function __toString()
    {
        $objPasajero = $this->getPasajeros();
        return
        "\nCódigo de viaje: " . $this->getCodViaje().
        "\nDestino del viaje: " . $this->getDestino().
        "\nCantidad máxima de pasajeros: " . $this->getCantMaxPasajeros().
        "\nPasajeros.. " . $objPasajero . 
        "\nResponsable.. " . $this->getObjResponsable();
    }
}

?>