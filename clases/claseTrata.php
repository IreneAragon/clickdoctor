<?php

/*
    Clase Trata
        - Método constructor
        - Getters
        - Setters
*/
class Trata {

    private $id_paciente;
    private $id_profesional;

    /* Método constructor */
    public function __construct ($id_paciente, $id_profesional) {
        $this->id_paciente = $id_paciente;
        $this->id_profesional = $id_profesional;
    }

    /* Getters */
    function getId_paciente() {
        return $this->id_paciente;
    }
    function getId_profesional() {
        return $this->id_profesional;
    }

    /* Setters */
    function setId_paciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }
    function setId_profesional($id_profesional) {
        $this->id_profesional = $id_profesional;
    }

}
