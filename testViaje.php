<?php

include 'Viaje.php';
include 'Pasajero.php';
include 'Responsable.php';

/**
 * Precarga datos de viaje
 * @return array
 */
//function precargaPasajeros(){
 //   $arrayPsj[0] = ["nombre" => "Juan", "apellido" => "Gómez", "numeroDoc" => 31142341];
 //   $arrayPsj[1] = ["nombre" => "Enrique", "apellido" => "Hernandez", "numeroDoc" => 24512552];
 //   $arrayPsj[2] = ["nombre" => "Gus", "apellido" => "Fernandez", "numeroDoc" => 42482967];
 //   $arrayPsj[3] = ["nombre" => "Patricio", "apellido" => "Estrada", "numeroDoc" => 35243434];
//    $arrayPsj[4] = ["nombre" => "Roberto", "apellido" => "Peña", "numeroDoc" => 31231241];
 //   return $arrayPsj;
//}



/**
 * Pide un número y se asegura de que se encuentre en un rango. Retorna un número válido
 * @param int $numMenor
 * @param int $numMayor
 * @return int
 */
function rango($numMenor, $numMayor){
    $contador = 0;
    do{
        if($contador != 0){
            echo "Ingrese un número entre " . $numMenor . " y " . $numMayor . ": ";
        }
        $respuesta = trim(fgets(STDIN));
        $contador++;
    }while(!is_numeric($respuesta) || ($respuesta > $numMayor || $respuesta < $numMenor));
    return $respuesta;
}

/**
 * Genera el menú
 * @return int
 */
function menu(){
    echo
        "\n
        -----------------------------------
        1) Agregar pasajeros
        2) Modificar pasajero
        3) Eliminar pasajero
        4) Ver datos de viaje
        5) Ver información de un pasajero
        6) Modificar responsable del viaje
        7) Salir
        -----------------------------------
        Respuesta: ";
    $respuesta = rango(1, 7);
    return $respuesta;
}


// PROGRAMA principal

// Se declaran las variables que serán los atributos del objeto
$arrayPasajeros = [];
$codigoDeViaje = "";
$destino = "";
$cantidadMaxPasajeros = "";

/*
// Se pregunta si se quiere precargar datos
echo "¿Desea usar datos precargados? (si/no): ";
$respuestaPrecarga = trim(fgets(STDIN));

if($respuestaPrecarga == "si"){
    $codigoDeViaje = "00001-00001";
    $destino = "Neuquén";
    $cantidadMaxPasajeros = 10;
    $arrayPasajeros = precargaPasajeros();
} else{
    echo "Ingrese el código de viaje: ";
    $codigoDeViaje = trim(fgets(STDIN));
    echo "Ingrese el destino: ";
    $destino = trim(fgets(STDIN));
    echo "Ingrese la cantidad máxima de pasajeros: ";
    $cantidadMaxPasajeros = trim(fgets(STDIN));
    $arrayPasajeros = [];
}
*/
    echo "---- Ingrese los datos del viaje ----\n";
    echo "Ingrese el código de viaje: ";
    $codigoDeViaje = trim(fgets(STDIN));
    echo "Ingrese el destino: ";
    $destino = trim(fgets(STDIN));
    echo "Ingrese la cantidad máxima de pasajeros: ";
    $cantidadMaxPasajeros = trim(fgets(STDIN));
    $arrayPasajeros = [];


    //Obj Responsable
    echo "---- Ingrese Los datos del responsable del viaje ----\n";
	echo "Ingrese el numero del empleado: ";
	$numeroEmpleado = trim(fgets(STDIN));
	echo "Ingrese el numero de licencia: ";
	$numeroLicencia = trim(fgets(STDIN));
	echo "Ingrese el nombre del responsable: ";
	$nombreResponsable = trim(fgets(STDIN));
	echo "Ingrese el apellido del responsable: ";
	$apellidoResponsable = trim(fgets(STDIN));


$objResponsable = new Responsable($numeroEmpleado, $numeroLicencia, $nombreResponsable, $apellidoResponsable);
$objViaje = new Viaje($codigoDeViaje, $destino, $cantidadMaxPasajeros, $arrayPasajeros, $objResponsable);

do{
    $respuestaMenu = menu();
    switch ($respuestaMenu) {
        case 1:
            echo "\n--------- Cargar pasajero ---------\n";
            echo "¿Cuántos pasajeros desea ingresar?: ";
            $limitePasajeros = $objViaje->getCantMaxPasajeros() - count($objViaje->getPasajeros());
            $cantEntradaPasajeros = rango(0, $limitePasajeros);
            for($i = 0; $i < $cantEntradaPasajeros; $i++){
                echo "Ingrese el nombre del pasajero: ";
                $arregloPasajeros[$i]["nombre"] = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: ";
                $arregloPasajeros[$i]["apellido"] = trim(fgets(STDIN));
                echo "Ingrese el número de documento del pasajero: ";
                $arregloPasajeros[$i]["numeroDoc"] = trim(fgets(STDIN));
            }
            if($i == 0){
                echo "No ingresó ningún pasajero.";
            } else{
                $objViaje->agregarPasajeros($arregloPasajeros);
                echo "Se ingresó " . $i . " pasajero/s con éxito.";
            }
            break;
        case 2;
            echo "----- Modificar pasajero -----\n";
            echo "Ingrese el número del pasajero a modificar: ";
            $indPasajero = rango(0, count($objViaje->getPasajeros()) - 1);
            echo "Ingrese el nombre del pasajero: ";
            $nombrePsj = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellidoPsj = trim(fgets(STDIN));
            echo "Ingrese el número de documento del pasajero: ";
            $numDocPsj = trim(fgets(STDIN));
            $objViaje->modificarPasajero($indPasajero, $nombrePsj, $apellidoPsj, $numDocPsj);
            break;
        case 3;
            echo "----- Eliminar pasajero -----\n";
            echo "Ingrese el número del pasajero que desea eliminar: ";
            $psjAEliminar = rango(0, count($objViaje->getPasajeros()) - 1);
            $objViaje->eliminarPasajero($psjAEliminar);
            echo "Pasajero eliminado exitosamente.";
            break;
        case 4;
            echo "----- Ver información del viaje -----";
            echo $objViaje;
            break;
        case 5;
            echo "----- Mostrar pasajero -----\n";
            echo "Ingrese el número del pasajero que desea ver: ";
            $numeroPsj = rango(0, count($objViaje->getPasajeros()) - 1);
            $objViaje->mostrarPasajero($numeroPsj);
            break;
        case 6;
            echo "---- Modificar responsable ----\n";
            echo "Ingrese el nuevo numero del empleado: ";
            $nuevoNroEmpleado = trim(fgets(STDIN));
            echo "Ingrese el nuevo numero de licencia: ";
            $nuevoNroLicencia = trim(fgets(STDIN));
            echo "Ingre el nombre del nuevo responsable: ";
            $nuevoNombre = trim(fgets(STDIN));
            echo "ingrese el apellido del nuevo responsable: ";
            $nuevoApellido = trim(fgets(STDIN));
            $modificacion = $objViaje->modificarResponsable($nuevoNroEmpleado, $nuevoNroLicencia, $nuevoNombre, $nuevoApellido);
				//Se muestra un msj según el resultado de las modificaciones:
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se pudieron modificar.");
				echo $resultado;
            break;
    }
}while($respuestaMenu != 7);

?>