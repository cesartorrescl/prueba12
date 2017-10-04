<?php

/**
 * Representa el la estructura de las Alumnoss
 * almacenadas en la base de datos
 */
require 'Database.php';

class Alumnos
{
    function __construct()
    {
    }

    /**
     * Retorna en la fila especificada de la tabla 'Alumnos'
     *
     * @param $idAlumno Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM Alumnos";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de un Alumno con un identificador
     * determinado
     *
     * @param $idAlumno Identificador del alumno
     * @return mixed
     */
    public static function insert(
                $patente,
                $punto_gps,
                $usuario,
                $vidrio,
                $papel,
                $lata,
                $carton,
                $ruta
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO recoleccion ( " .
            "patente," .
            "punto_gps," .
            "usuario," .
            "vidrio," .
            "papel," .
            "lata," .
            "carton," .
            "ruta)" .
            " VALUES( ?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $patente,
                $punto_gps,
                $usuario,
                $vidrio,
                $papel,
                $lata,
                $carton,
                $ruta
            )
        );

    }


}

?>
