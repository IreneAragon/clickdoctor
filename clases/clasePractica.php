<?php

/*
    Clase Partica
        - Método constructor
        - Getters
        - Setters
*/

class Practica {

    private $id_especialidad;
    private $id_profesional;

    /* Método constructor */
    public function __construct ($id_especialidad, $id_profesional) {
        $this->id_especialidad = $id_especialidad;
        $this->id_profesional = $id_profesional;
    }

    /* Getters */
    function getId_especialidad() {
        return $this->id_especialidad;
    }
    function getId_profesional() {
        return $this->id_profesional;
    }

    /* Setters */
    function setId_especialidad($id_especialidad) {
        $this->id_especialidad = $id_especialidad;
    }
    function setId_profesional($id_profesional) {
        $this->id_profesional = $id_profesional;
    }






}
