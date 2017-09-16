<?php
/**
 * Insertar un nuevo alumno en la base de datos
 */


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar Alumno
    
        

    if (($body['nombre']=="Cesar" && $body['pass']=="clave")||($body['nombre']=="admin" && $body['pass']=="admin")) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Acceso concedido","Id"=>2));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>
