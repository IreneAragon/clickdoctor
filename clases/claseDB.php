<?php

class DB {

    const DB_DNS  = "mysql:host=localhost;dbname=CLICK_DOCTOR";
    const DB_USER = "admincd";
    const DB_PASS = "clickdoc2021";
    const DB_OPT  =  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
    const ORDEN_1 = "08:00";
    const ORDEN_2 = "09:00";
    const ORDEN_3 = "10:00";
    const ORDEN_4 = "11:00";
    const ORDEN_5 = "12:00";
    const ORDEN_6 = "13:00";


    /**
     * Conexión a la base de datos
     * @param  [type] $sql
     * @return [type]
     */
    protected static function ejecutaConsulta($sql) {
        // $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
        // $dsn = "mysql:host=localhost;dbname=CLICK_DOCTOR";
        // $usuario = 'admincd';
        // $contrasenalocal = 'clickdoc2021';
        // 000webhost
        // $contrasenahost = i[A~{kx[|dac+]o0
        // DB name id16728780_click_doctor
        // DB user id16728780_admincd
        // DB host localhost
        try {
            $consulta = new PDO(self::DB_DNS, self::DB_USER, self::DB_PASS, self::DB_OPT);
            $resultado = null;
                if (isset($consulta)) {
                    $resultado = $consulta->query($sql);

                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
        }
        return $resultado;
    }

    public static function insertar($sql) {
        try {
            $consulta = new PDO(self::DB_DNS, self::DB_USER, self::DB_PASS, self::DB_OPT);
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
            $resultado = self::ejecutaConsulta($consulta);


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
            $resultado = self::ejecutaConsulta($consulta);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* COMPROBAR EXISTENCIA DEL PACIENTE */
    public static function existePaciente($email) {
        try {
            $consulta = 'SELECT nombre FROM pacientes WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta($consulta);

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
            $resultado = self::ejecutaConsulta($consulta);

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
            $resultado = self::ejecutaConsulta($consulta);

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
            $resultado = self::ejecutaConsulta($consulta);
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
            $resultado = self::ejecutaConsulta($consulta);

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
            $resultado = self::ejecutaConsulta($consulta);
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
            $resultado = self::ejecutaConsulta($consulta);
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
            $resultado = self::ejecutaConsulta($consulta);
            $tablaEspecialidades = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $tablaEspecialidades;

    }

    /* OBTENER LOS PROFESIONALES QUE PRACTICAN UNA ESPECIALIDAD */
    public static function obtenerEspecialista($id) {
        try {
            $consulta = 'SELECT practica.id_prof, profesionales.nombre, profesionales.apellidos FROM practica
                         INNER JOIN profesionales ON profesionales.id_profesional = practica.id_prof
                         WHERE id_esp = "'. $id .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $especialistas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $especialistas;
    }

    /* OBTENER DISPONIBILIDAD DE UN PROFESIONAL */
    public static function obtenerDisponibilidad($id_profesional, $fecha) {
        $aDisponibilidad = array("1" => self::ORDEN_1, "2" => self::ORDEN_2, "3" => self::ORDEN_3, "4" => self::ORDEN_4, "5" => self::ORDEN_5, "6" => self::ORDEN_6);

        try {
            $consulta = 'SELECT * FROM citas WHERE fecha = "'. $fecha .'" AND id_prof_FK = "'. $id_profesional .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $citasFechaProfesional = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($citasFechaProfesional as $cita) {
                unset($aDisponibilidad[$cita['orden']]);
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $aDisponibilidad;
    }

    /* OBTENER LA TABLA CITAS 'proximas' o 'pasadas' para los pacientes*/
    public static function listarCitasPaciente($idPaciente, $filtro = 'proximas') {
        try {

            $where = ($filtro === 'proximas') ? '" AND citas.fecha >= CURDATE() ORDER BY citas.fecha ASC' : '" AND citas.fecha < CURDATE() ORDER BY citas.fecha DESC';

            $consulta = 'SELECT citas.*, profesionales.nombre, profesionales.apellidos, profesionales.genero, especialidades.nombre as nombre_esp FROM citas
                         INNER JOIN profesionales ON profesionales.id_profesional = citas.id_prof_FK
                         INNER JOIN especialidades ON especialidades.id_especialidad = citas.id_especialidad
                         WHERE id_pac_FK = "'. $idPaciente .$where;
            $resultado = self::ejecutaConsulta($consulta);
            $listadoCitasPaciente = $resultado->fetchAll(PDO::FETCH_ASSOC);

            foreach ($listadoCitasPaciente as $k => $cita) {
                switch ($cita['orden']) {
                    case '1':
                        $hora = self::ORDEN_1;
                        break;
                    case '2':
                        $hora = self::ORDEN_2;
                        break;
                    case '3':
                        $hora = self::ORDEN_3;
                        break;
                    case '4':
                        $hora = self::ORDEN_4;
                        break;
                    case '5':
                        $hora = self::ORDEN_5;
                        break;
                    case '6':
                        $hora = self::ORDEN_6;
                        break;
                    default:
                        $hora = "";
                        break;
                }
                $listadoCitasPaciente[$k]['hora'] = $hora;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $listadoCitasPaciente;
    }

    /* OBTENER LA TABLA CITAS 'proximas' o 'pasadas' para los profesionales*/
    public static function listarCitasProfesional($idProfesional, $filtro = 'proximas') {
        try {

            $where = ($filtro === 'proximas') ? '" AND citas.fecha >= CURDATE() ORDER BY citas.fecha ASC' : '" AND citas.fecha < CURDATE() ORDER BY citas.fecha DESC';

            $consulta = 'SELECT citas.*, pacientes.nombre, pacientes.apellidos, pacientes.genero, especialidades.nombre as nombre_esp FROM citas
                         INNER JOIN pacientes ON pacientes.id_paciente = citas.id_pac_FK
                         INNER JOIN especialidades ON especialidades.id_especialidad = citas.id_especialidad
                         WHERE id_prof_FK = "'. $idProfesional .$where;
            $resultado = self::ejecutaConsulta($consulta);
            $listadoCitasProfesional = $resultado->fetchAll(PDO::FETCH_ASSOC);

            foreach ($listadoCitasProfesional as $k => $cita) {
                switch ($cita['orden']) {
                    case '1':
                        $hora = self::ORDEN_1;
                        break;
                    case '2':
                        $hora = self::ORDEN_2;
                        break;
                    case '3':
                        $hora = self::ORDEN_3;
                        break;
                    case '4':
                        $hora = self::ORDEN_4;
                        break;
                    case '5':
                        $hora = self::ORDEN_5;
                        break;
                    case '6':
                        $hora = self::ORDEN_6;
                        break;
                    default:
                        $hora = "";
                        break;
                }
                $listadoCitasProfesional[$k]['hora'] = $hora;
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $listadoCitasProfesional;
    }

    /* Obtener ID del usuario a través de email */
    public static function getIdUsuario($email) {
        try {
            $consulta = 'SELECT id_paciente as id_usuario FROM pacientes WHERE email = "'. $email .'"
                         UNION
                         SELECT id_profesional FROM profesionales WHERE email = "'. $email .'"
                         UNION
                         SELECT id_administrador FROM administrador WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta($consulta);

            $idUsuario = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $idUsuario['id_usuario'];
    }



    /* Obtener ID del usuario a través del dni */
    public static function obteneridPacientePorDni($dniPac) {
        try {
            $consulta = 'SELECT id_paciente FROM pacientes WHERE dni = "'. $dniPac .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $idPaciente = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $idPaciente['id_paciente'];
    }

    /* Obtiene la existencia del paciente a través del dni */
    public static function comprobarDniPacienteExiste($dniPac) {
        try {
            $consulta = 'SELECT id_paciente FROM pacientes WHERE dni = "'. $dniPac .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return ($count === 1) ? true : false;
    }


    /* Obtener el género del profesional */
    public static function getGeneroUsuario($email) {
        try {
            $consulta = 'SELECT genero FROM pacientes WHERE email = "'. $email .'"
                         UNION
                         SELECT genero FROM profesionales WHERE email = "'. $email .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $generoUsuario = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return $generoUsuario['genero'];
    }

    /* Eliminar una cita */
    public static function borrarCita($id_cita) {
        try {
            $consulta = 'DELETE FROM citas WHERE id_cita = "'. $id_cita .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha borrado la cita devuelve true
        return ($count === 1) ? true : false;
    }


    /* Edita la cita del paciente */
    public static function editarCitaPaciente($id_cita, $fechaDB, $hora_cita) {
        try {
            $consulta = 'UPDATE citas SET fecha = "'.$fechaDB.'", orden ='.$hora_cita .' WHERE id_cita ='.$id_cita;
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado la cita devuelve true
        return ($count === 1) ? true : false;

    }

    /* Modifica los datos del usuario PACIENTE desde el perfil, incluída la contraseña */
    public static function modificarDatosUsuario($name, $lastname, $email, $fNac, $hashPass, $idUsuario) {
        try {
            $consulta = 'UPDATE pacientes SET nombre = "'.$name.'", apellidos = "'.$lastname.'", email ="'.$email.'", f_nacimiento ="'.$fNac.'", password ="'.$hashPass.'" WHERE id_paciente ="'.$idUsuario.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado el perfil correctamente devuelve true
        return ($count === 1) ? true : false;

    }

    /* Modifica los datos del usuario PACIENTE desde el perfil, SIN la contraseña */
    public static function modificarDatosUsuarioNoPass($name, $lastname, $email, $fNac, $idUsuario) {
        try {
            $consulta = 'UPDATE pacientes SET nombre = "'.$name.'", apellidos = "'.$lastname.'", email ="'.$email.'", f_nacimiento ="'.$fNac.'" WHERE id_paciente ="'.$idUsuario.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado el perfil correctamente devuelve true
        return ($count === 1) ? true : false;
    }

    /* Modifica las especialidades del PROFESIONAL */
    public static function modificarEspecialidadesProfesional($idEspecialidades, $idUsuario) {
        try {
            $especialidadesProfesional = self::idEspecialidadPracticaProf($idUsuario);
            $aEspecialidades = [];
            foreach ($especialidadesProfesional as $key => $especialidad) {
                $aEspecialidades[] = $especialidad["id_esp"];
            }

            $idEspecialidadEliminadas = array_diff($aEspecialidades, $idEspecialidades);
            $idEspecialidadAnadidos = array_diff($idEspecialidades, $aEspecialidades);

            if(!empty($idEspecialidadEliminadas)) {
                foreach ($idEspecialidadEliminadas as $key => $idEspecialidadEliminado) {
                    $consulta = 'DELETE FROM practica WHERE id_esp = "'. $idEspecialidadEliminado .'" AND id_prof = '.$idUsuario ;
                    $resultado = self::ejecutaConsulta($consulta);
                }
            }

            if(!empty($idEspecialidadAnadidos)) {
                foreach ($idEspecialidadAnadidos as $key => $idEspecialidadAnadido) {
                    $consultaInsert = 'INSERT INTO practica (id_esp, id_prof) VALUES ("'. $idEspecialidadAnadido .'", "'. $idUsuario .'")';
                    $resultado = self::ejecutaConsulta($consultaInsert);
                }
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }


    public static function modificarDatosProfesional($name, $lastname, $email, $fNac, $nColegiado, $hashPass, $idEspecialidad, $idUsuario) {
        try {
            $consulta = 'UPDATE profesionales SET nombre = "'.$name.'", apellidos = "'.$lastname.'", email ="'.$email.'", f_nacimiento ="'.$fNac.'", n_colegiado ="'.$nColegiado.'"';
            if(!empty($hashPass)) {
                $consulta .= ', password ="'.$hashPass.'"';
            }
            $consulta .= ' WHERE id_profesional ="'.$idUsuario.'"';

            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado el perfil correctamente devuelve true
        return ($count === 1) ? true : false;
    }

    public static function datosPaciente($idPaciente) {
        try {
            $consulta = 'SELECT * FROM pacientes WHERE id_paciente = "'.$idPaciente.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $datosPaciente = $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $datosPaciente;
    }

    public static function datosProfesional($idProfesional) {
        try {
            $consulta = 'SELECT * FROM profesionales WHERE id_profesional = "'.$idProfesional.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $datosProfesional = $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $datosProfesional;
    }

    public static function idEspecialidadPracticaProf($idProfesional) {
        try {
            $consulta = 'SELECT id_esp FROM practica WHERE id_prof = "'.$idProfesional.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $idEsp = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $idEsp;
    }

    public static function nombreEspecialidad($id) {
        try {
            $consulta = 'SELECT nombre FROM especialidades WHERE id_especialidad = "'.$id.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $nombreEspecialidad = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $nombreEspecialidad;
    }

    /* Obtiene todas las especialidades que practica un profesional a través del id profesional */
    public static function nombreEspecialidadesPracticaProf($idProf) {
        try {
            $consulta = 'SELECT especialidades.nombre, especialidades.id_especialidad FROM especialidades
                         INNER JOIN practica ON practica.id_esp = especialidades.id_especialidad
                         WHERE practica.id_prof = "'.$idProf.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $nombreEspecialidades = $resultado->fetchAll();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $nombreEspecialidades;
    }

    public static function guardarSrc($srcImg, $email) {
        try {
            $consulta = 'UPDATE pacientes SET srcImg = "'.$srcImg.'" WHERE email = "'.$email.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return ($count === 1) ? true : false;

    }

    public static function guardarSrcProf($srcImg, $email) {
        try {
            $consulta = 'UPDATE profesionales SET srcImg = "'.$srcImg.'" WHERE email = "'.$email.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        return ($count === 1) ? true : false;

    }

    public static function obtenerSrc($email) {
        try {
            $consulta = 'SELECT srcImg FROM pacientes WHERE email = "'.$email.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $srcImg = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $srcImg;
    }

    public static function obtenerSrcProf($email) {
        try {
            $consulta = 'SELECT srcImg FROM profesionales WHERE email = "'.$email.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $srcImg = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $srcImg;
    }

    public static function insertarInforme($nombreInforme, $especialidad, $idProf, $idPac){
            try {
                $consulta = 'INSERT INTO informes (nombre, especialidad, id_profesional_FK, id_paciente_FK)
                             VALUES ("'. $nombreInforme .'", "'. $especialidad .'", "'. $idProf .'", "'. $idPac .'")';
                $resultado = self::ejecutaConsulta($consulta);

            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }

    public static function crearConversacion($asunto, $texto, $idProf, $idPac, $rol) {
        try {
            $consulta = 'INSERT INTO correos (asunto, texto, emisor, id_prof_FK, id_pac_FK)
                         VALUES ("'. $asunto .'", "'. $texto .'", "'. $rol .'", "'. $idProf .'", "'. $idPac .'")';
            $resultado = self::ejecutaConsulta($consulta);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    // obtiene los datos de la tabla correos y de la tabla profesionales para poder mostrar el nombre de éstos en la tabla.
    public static function listarConversacionesPaciente($idPaciente) {
        try {
            $consulta = 'SELECT correos.*, profesionales.nombre, profesionales.apellidos, profesionales.genero FROM correos
                         INNER JOIN profesionales ON profesionales.id_profesional = correos.id_prof_FK WHERE id_pac_FK = "'.$idPaciente.'" ORDER BY id_correo DESC';
            $resultado = self::ejecutaConsulta($consulta);
            $listadoConversaciones = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $listadoConversaciones;
    }

    // obtiene los datos de la tabla correos y de la tabla pacientes
    public static function listarConversacionesProfesional($idProf) {
        try {
            $consulta = 'SELECT correos.*, pacientes.nombre, pacientes.apellidos FROM correos
                         INNER JOIN pacientes ON pacientes.id_paciente = correos.id_pac_FK WHERE id_prof_FK = "'.$idProf.'" ORDER BY id_correo DESC';
            $resultado = self::ejecutaConsulta($consulta);
            $listadoConversaciones = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $listadoConversaciones;
    }

    public static function eliminarConversacion($idConver) {
        try {
            $consulta = 'DELETE FROM correos WHERE id_correo = "'. $idConver .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha borrado la conversación devuelve true
        return ($count === 1) ? true : false;
    }

    public static function listarMensajesChat($id_chat) {

         try {
             $consulta = 'SELECT correos.id_correo, correos.id_prof_FK, correos.id_pac_FK,  mensajes.* FROM correos
                          INNER JOIN mensajes ON mensajes.id_correo_FK = correos.id_correo WHERE id_correo = "'.$id_chat.'" ORDER BY mensajes.timestamp ASC';
             $resultado = self::ejecutaConsulta($consulta);
             $mensajes = $resultado->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException $e) {
             die("Error: " . $e->getMessage());
         }
         return $mensajes;

    }

    public static function obtenerDatosCorreo($id_chat) {

         try {
             $consulta = 'SELECT correos.asunto, correos.emisor, correos.creado_el, correos.texto as primer_texto FROM correos WHERE id_correo = "'.$id_chat.'"';
             $resultado = self::ejecutaConsulta($consulta);
             $correo = $resultado->fetch(PDO::FETCH_ASSOC);
         } catch (PDOException $e) {
             die("Error: " . $e->getMessage());
         }
         return $correo;

    }

    public static function obtenerDatosProfesionalChat($id_chat){
        try {
            $consulta = 'SELECT profesionales.id_profesional, profesionales.nombre, profesionales.apellidos, profesionales.srcImg FROM correos
                         INNER JOIN profesionales ON profesionales.id_profesional = correos.id_prof_FK WHERE id_correo = "'.$id_chat.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $datosProfesional = $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $datosProfesional;
    }

    public static function obtenerDatosPacienteChat($id_chat){
        try {
            $consulta = 'SELECT pacientes.id_paciente, pacientes.nombre, pacientes.apellidos, pacientes.srcImg FROM correos
                         INNER JOIN pacientes ON pacientes.id_paciente = correos.id_pac_FK WHERE id_correo = "'.$id_chat.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $datosPaciente = $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $datosPaciente;
    }

    public static function insertarMensaje($id_chat, $nuevoMensaje, $rol){
        try {
            $consulta = 'INSERT INTO mensajes (texto, rol, id_correo_FK) VALUES ("'. $nuevoMensaje .'", "'. $rol .'", "'. $id_chat .'")';
            $resultado = self::ejecutaConsulta($consulta);

            if ($resultado) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public static function listarInformesProfesional($idProfesional) {
         try {
             $consulta = 'SELECT * FROM informes WHERE id_profesional_FK = "'.$idProfesional.'"';
             $resultado = self::ejecutaConsulta($consulta);
             $informes = $resultado->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException $e) {
             die("Error: " . $e->getMessage());
         }
         return $informes;
    }

    public static function listarInformesPaciente($idPaciente) {
         try {
             $consulta = 'SELECT * FROM informes WHERE id_paciente_FK = "'.$idPaciente.'"';
             $resultado = self::ejecutaConsulta($consulta);
             $informes = $resultado->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException $e) {
             die("Error: " . $e->getMessage());
         }
         return $informes;
    }

    public static function pacientes() {
        try {
            $consulta = 'SELECT * FROM pacientes';
            $resultado = self::ejecutaConsulta($consulta);
            $datosPaciente = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $datosPaciente;

    }


    public static function borrarEspecialidad($idEsp) {
        try {
            $consulta = 'DELETE FROM especialidades WHERE id_especialidad = "'. $idEsp .'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha borrado la especialidad devuelve true
        return ($count === 1) ? true : false;
    }

    /* Edita una especialidad */
    public static function editarEspecialidad($idEsp, $especialidad) {
        try {
            $consulta = 'UPDATE especialidades SET nombre = "'.$especialidad.'" WHERE id_especialidad ='.$idEsp;
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado la especialidad devuelve true
        return ($count === 1) ? true : false;

    }

    public static function agregarEspecialidad($nuevaEspecialidad, $idAdmin){
        try {
            $consulta = 'INSERT INTO especialidades (nombre, id_administrador_FK)
                         VALUES ("'. $nuevaEspecialidad .'", "'. $idAdmin .'")';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return ($count === 1) ? true : false;
    }


    public static function listarUsuarios($rol) {
        try {
            if ($rol === 'paciente') {
                $consulta = 'SELECT nombre, apellidos, id_paciente as id_usuario FROM pacientes';
            } else {
                $consulta = 'SELECT nombre, apellidos, id_profesional as id_usuario FROM profesionales';
            }
            $resultado = self::ejecutaConsulta($consulta);
            $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $usuarios;
    }

    public static function borrarUsuario($id_usuario, $rol) {
        try {
            if ($rol === 'paciente') {
                $consultaCorreos = 'DELETE FROM correos WHERE id_pac_FK = "'. $id_usuario .'"';
                $resultadoCorreos = self::ejecutaConsulta($consultaCorreos);

                $consultaInforme = 'DELETE FROM informes WHERE id_paciente_FK = "'. $id_usuario .'"';
                $resultadoInforme = self::ejecutaConsulta($consultaInforme);

                $consultaCitas = 'DELETE FROM citas WHERE id_pac_FK = "'. $id_usuario .'"';
                $resultadoCitas = self::ejecutaConsulta($consultaCitas);

                $consulta = 'DELETE FROM pacientes WHERE id_paciente = "'. $id_usuario .'"';
            } else {
                $consultaCorreos = 'DELETE FROM correos WHERE id_prof_FK = "'. $id_usuario .'"';
                $resultadoCorreos = self::ejecutaConsulta($consultaCorreos);

                $consultaInforme = 'DELETE FROM informes WHERE id_profesional_FK = "'. $id_usuario .'"';
                $resultadoInforme = self::ejecutaConsulta($consultaInforme);

                $consultaCitas = 'DELETE FROM citas WHERE id_prof_FK = "'. $id_usuario .'"';
                $resultadoCitas = self::ejecutaConsulta($consultaCitas);

                $consultaEspecialidades = 'DELETE FROM practica WHERE id_prof = "'. $id_usuario .'"';
                $resultadoEsp = self::ejecutaConsulta($consultaEspecialidades);

                $consulta = 'DELETE FROM profesionales WHERE id_profesional = "'. $id_usuario .'"';
            }

            $resultado = self::ejecutaConsulta($consulta);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $resultado;
    }

    public static function insertarNuevoUsuarioPaciente($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass){
        try {
            $consulta = 'INSERT INTO pacientes (nombre, apellidos, email, f_nacimiento, dni, rol, genero, password)
                        VALUES ("'. $nombre .'", "'. $apellidos .'", "'. $email .'", "'. $fNacimiento .'", "'. $dni .'", "'. $rol .'", "'. $genero .'", "'. $hashPass .'")';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return ($count === 1) ? true : false;
    }

    /* inserta un nuevo profesional y devuelve el id de éste, para ser utilizado en la inserción de las especialidades  */
    public static function insertarNuevoUsuarioProfesional($nombre, $apellidos, $email, $fNacimiento, $dni, $rol, $genero, $hashPass, $ejerce, $nColegiado){
        try {

            $sql = 'INSERT INTO profesionales (nombre, apellidos, email, f_nacimiento, dni, rol, genero, password, ejerce_en, n_colegiado)
                        VALUES ("'. $nombre .'", "'. $apellidos .'", "'. $email .'", "'. $fNacimiento .'", "'. $dni .'", "'. $rol .'", "'. $genero .'", "'. $hashPass .'", "'. $ejerce .'", "'. $nColegiado .'")';

            $consulta = new PDO(self::DB_DNS, self::DB_USER, self::DB_PASS, self::DB_OPT);
            $resultado = $consulta->query($sql);
            $lastInsertId = $consulta->lastInsertId();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return ($resultado) ? $lastInsertId : null;
    }

    public static function insertarEspecialidadNuevoProf($idEspecialidades, $idNuevoProf){
        try {
            foreach ($idEspecialidades as $key => $idEspecialidad) {
                $consulta = 'INSERT INTO practica (id_esp, id_prof) VALUES ("'. $idEspecialidad .'", "'. $idNuevoProf .'")';
                $resultado = self::ejecutaConsulta($consulta);
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public static function ultimoIdProfresional() {
        try {
            $consulta = 'SELECT MAX(id_profesional) max_id FROM profesionales';
            $resultado = self::ejecutaConsulta($consulta);
            $ultimoId = $resultado->fetch();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $ultimoId;
    }

    public static function listarUsuariosNoActivados() {
        try {
            $consulta = 'SELECT nombre, apellidos, dni, rol, id_profesional as id_usuario FROM profesionales  WHERE estado = 0
                        UNION
                        SELECT nombre, apellidos, dni, rol, id_paciente as is_usuario FROM pacientes WHERE estado = 0';
            $resultado = self::ejecutaConsulta($consulta);
            $listadoUsuariosNoActivos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $listadoUsuariosNoActivos;
    }

    public static function activarUsuario($id, $rol) {
        try {
            if ($rol === 'profesional') {
                $consulta = 'UPDATE profesionales SET estado = 1 WHERE id_profesional = "'. $id .'"';
            } else {
                $consulta = 'UPDATE pacientes SET estado = 1 WHERE id_paciente = "'. $id .'"';
            }
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado el estado devuelve true
        return ($count === 1) ? true : false;
    }

    public static function adminModificaPaciente($idUsuario, $nombre, $apellidos, $email, $fNacimiento) {
        try {
            $consulta = 'UPDATE pacientes SET nombre = "'.$nombre.'", apellidos = "'.$apellidos.'", email ="'.$email.'", f_nacimiento ="'.$fNacimiento.'" WHERE id_paciente ="'.$idUsuario.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado el perfil correctamente devuelve true
        return ($count === 1) ? true : false;
    }

    public static function adminModificaProfesional($idUsuario, $nombre, $apellidos, $email, $fNacimiento, $n_colegiado) {
        try {
            $consulta = 'UPDATE profesionales SET nombre = "'.$nombre.'", apellidos = "'.$apellidos.'", email ="'.$email.'", f_nacimiento ="'.$fNacimiento.'", n_colegiado ="'.$n_colegiado.'" WHERE id_profesional ="'.$idUsuario.'"';
            $resultado = self::ejecutaConsulta($consulta);
            $count = $resultado->rowCount();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // si se ha editado el perfil correctamente devuelve true
        return ($count === 1) ? true : false;
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

        /* FORMATO NÚMERO DNI:
        - Longitud: 9 caracteres
        - Debe contrener:
            - exactamente 8 dígitos y una letra
        - Ejemplos válidos:
            - 24659871M
            - 74876524m
    */
    public static function dniValido($dni) {
        if (preg_match('/^[0-9]{8,8}[A-Za-z]$/', $dni)) {
            return true;
        } else {
            return false;
        }
    }


} // ENDS Class DB
