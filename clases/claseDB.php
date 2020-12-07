<?php

require_once 'claseAdministrador.php';
require_once 'claseCita.php';
require_once 'claseCorreo.php';
require_once 'claseEspecialidad.php';
require_once 'claseInforme.php';
require_once 'claseMensaje.php';
require_once 'clasePaciente.php';
require_once 'claseProfesional.php';

/* TODO: rellenar con todas las funciones que contiene la clase
    Clase DB
        - Conexión a la base de datos y ejecución de la consulta
        - Insertar paciente
        - Insertar profesional
        -
        -
        -
*/

class DB {

    /**
     * Conexión a la base de datos
     * @param  [type] $sql
     * @return [type]
     */
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
        $dsn = "mysql:host=localhost;dbname=CLICK_DOCTOR";
        $usuario = 'admincd';
        $contrasena = 'clickdoc2021';
        try {
            $consulta = new PDO($dsn, $usuario, $contrasena, $opc);
            $resultado = null;
                if (isset($consulta)) {
                    $resultado = $consulta->query($sql);
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
        }
        return $resultado;
    }

     /* INSERTAR USUARIO TIPO PACIENTE */
    public static function insertarPaciente($nombre, $apellidos, $email, $password, $dni,
                                         $f_nacimiento, $genero) {
        try {
            $consulta = 'INSERT INTO pacientes (nombre, apellidos, email, password, dni,
                                         f_nacimiento, genero)
                         VALUES ("'. $nombre .'", "'. $apellidos .'", "'. $email .'", "'. $password .'",
                                 "'. $dni .'", "'. $f_nacimiento .'", "'. $genero .'")';
            $resultado = self::ejecutaConsulta ($consulta);


        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* INSERTAR USUARIO TIPO PROFESIONAL */
    public static function insertarProfesional($nombre, $apellidos, $email, $contrasena, $dni, $fNacimiento,
                                            $genero, $nColegiado, $ejerce) {
        try {
            $consulta = 'INSERT INTO profesionales (nombre, apellidos, email, password, dni, f_nacimiento,
                                             genero, n_colegiado, ejerce_en)
                      VALUES ("'. $nombre .'", "'. $apellidos .'", "'. $email .'", "'. $contrasena .'",
                              "'. $dni .'", "'. $fNacimiento .'", "'. $genero .'", "'. $nColegiado .'", "'. $ejerce .'")';
            $resultado = self::ejecutaConsulta ($consulta);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* COMPROBAR EXISTENCIA DEL PACIENTE */
    public static function existePaciente($email) {
        try {
            $consulta = 'SELECT nombre FROM pacientes WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

    }

    /* COMPROBAR EXISTENCIA DEL PROFESIONAL */
    public static function existeProfesional($email) {
        try {
            $consulta = 'SELECT nombre FROM profesionales WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* COMPROBAR EXISTENCIA DEL ADMIN */
    public static function existeAdmin($email) {
        try {
            $consulta = 'SELECT nombre FROM administrador WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* COMPROBAR EL ROL DEL USUARIO */
    public static function tipoUsuario($email) {
        try {
            $consulta = 'SELECT rol FROM administrador WHERE email = "'. $email .'"
                         UNION
                         SELECT rol FROM pacientes WHERE email = "'. $email .'"
                         UNION
                         SELECT rol FROM profesionales WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);
            $tipoUsuario = $resultado->fetch();

            if ($resultado->rowCount() > 0) {
                return $tipoUsuario['rol'];
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* COMPROBAR QUE EXISTE UN USUARIO */
    public static function existeUsuario($email) {
        try {
            $consulta = 'SELECT email FROM administrador WHERE email = "'. $email .'"
                         UNION
                         SELECT email FROM pacientes WHERE email = "'. $email .'"
                         UNION
                         SELECT email FROM profesionales WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* OBTENER CONTRASEÑA DEL USUARIO */
    public static function obtenerContrasena($email) {
        try {
            $consulta = 'SELECT password FROM administrador WHERE email = "'. $email .'"
                         UNION
                         SELECT password FROM pacientes WHERE email = "'. $email .'"
                         UNION
                         SELECT password FROM profesionales WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);
            $contrasenaUsuario = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $contrasenaUsuario['password'];
    }

    /* OBTENER ESTADO DEL USUARIO */
    public static function estadoDelUsuario($email) {
        try {
            $consulta = 'SELECT estado FROM pacientes WHERE email = "'. $email .'"
                        UNION
                        SELECT estado FROM profesionales WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta ($consulta);
            $estadoUsuario = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $estadoUsuario['estado'];
    }


    /* OBTENER LA TABLA ESPECIALIDADES */
    public static function especialidades() {
        try {
            $consulta = 'SELECT * FROM especialidades';
            $resultado = self::ejecutaConsulta ($consulta);
            $tablaEspecialidades = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $tablaEspecialidades;
        
    }





     /* FORMATO DE EMAIL */
     public static function emailValido($email){
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             return true;
         } else {
             return false;
         }
     }

    /* FORMATO DE CONTRASEÑA:
        - Longitud: entre 6 y 16 caracteres
        - Debe contrener:
            - Al menos un número
            - Al menos dos letras:
                - Una mayúscula
                - Una minúscula
        - Puede contener caracteres especiales
        - Ejemplos válidos:
            - aBc123
            - aBc123.
    */
    public static function contrasenaValida($contrasena) {
        if (preg_match('/(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).{6,16}/', $contrasena)) {
            return true;
        } else {
            return false;
        }
    }

    /* FORMATO NÚMERO DE COLEGIADO:
        - Longitud: 9 caracteres
        - Debe contrener:
            - exactamente 9 dígitos
        - Ejemplos válidos:
            - 123456789
            - 154893487
    */
    public static function nColegiadoValido($nColegiado) {
        if (preg_match('/^(\d{9})$/', $nColegiado)) {
            return true;
        } else {
            return false;
        }
    }






























    // CONSULTA DE PRUEBA, TÓ OK. TODO: borrar
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

     // CONSULTA DE PRUEBA, TÓ OK. TODO: borrar
     public static function insertarAdmin($email, $nombre, $apellidos, $contrasena){
             try {
                 $consulta = 'INSERT INTO administrador (email, nombre, apellidos, contrasena)
                              VALUES ("'. $email .'", "'. $nombre .'", "'. $apellidos .'", "'. $contrasena .'")';
                 $resultado = self::ejecutaConsulta ($consulta);
                 // var_dump($resultado);
                 // var_dump($consulta);
             } catch (PDOException $e) {
                 die("Error: " . $e->getMessage());
             }
         }


         /*
         variable concatenada correctamente para insetar en la BD
             1 variable:
                 "'. $var .'"
             varias:
                 "'. $var .'", "'. $var .'", "'. $var .'"
          */



















} // ENDS Class DB
