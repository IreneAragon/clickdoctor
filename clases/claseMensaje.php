<?php

/*
    Clase Mensaje
        - Método constructor
        - Getters
        - Setters
*/

class Mensaje {

    private $id_mensaje;
    private $rol;
    private $texto;
    private $timestamp;

    public function __construct ($id_mensaje, $rol, $texto, $timestamp) {
        $this->id_mensaje = $id_mensaje;
        $this->rol = $rol;
        $this->texto = $texto;
        $this->timestamp = $timestamp;
    }

    /* Getters */
    function getId_mensaje() {
        return $this->id_mensaje;
    }
    function getRol() {
        return $this->rol;
    }
    function getTexto() {
        return $this->texto;
    }
    function getTimestamp() {
        return $this->timestamp;
    }

    /* Setters */
    function setId_mensaje($id_mensaje) {
        $this->id_mensaje = $id_mensaje;
    }
    function setRol($rol) {
        $this->rol = $rol;
    }
    function setTexto($texto) {
        $this->texto = $texto;
    }
    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

}
