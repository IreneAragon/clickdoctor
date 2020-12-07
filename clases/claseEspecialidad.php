<?php

/*
    Clase Especialidad
        - Método constructor
        - Getters
        - Setters
*/

class Especialidad {

    private $id_especialidad;
    private $nombre;

    /* Método constructor */
    public function __construct ($id_especialidad, $nombre) {
        $this->id_especialidad = $id_especialidad;
        $this->nombre = $nombre;
    }

    /* Getters */
    function getId_especialidad() {
        return $this->id_especialidad;
    }
    function getNombre() {
        return $this->nombre;
    }

    /* Setters */
    function setId_especialidad($id_especialidad) {
        $this->id_especialidad = $id_especialidad;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
