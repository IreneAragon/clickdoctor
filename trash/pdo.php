<?php

// $dsn = 'mysql:host=localhost;port=8889;dbname=CLICK_DOCTOR';
// $username = 'admincd';
// $password = 'clickdoc21';
// $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'");
//
// try {
//     $pdo = new PDO($dsn, $username, $password, $options);
// } catch (PDOException $e) {
//     echo 'Error: '.$e->getMessage();
//     die();
// }




/*
protected static function ejecutaConsulta($sql) {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
    $dsn = "mysql:host=localhost;dbname=CLICK_DOCTOR";
    $usuario = 'admincd';
    $contrasena = 'clickdoc21';
        try {
            $consulta = new PDO($dsn, $usuario, $contrasena, $opc);
            $resultado = null;
            if (isset($consulta)) {
                $resultado = $consulta->query($sql);
            }
        }catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $resultado;
    }


public static function getNombrePaciente($id) {
    try {
        $consulta = 'SELECT nombre FROM pacientes WHERE id_paciente = "'. $id .'"';
        $resultado = self::ejecutaConsulta ($consulta);
        $nombrePaciente = $resultado->fetch();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    return $nombrePaciente;
}
*/
