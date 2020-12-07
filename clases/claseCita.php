<?php

/*
    Clase Cita
        - Método constructor
        - Getters
        - Setters
*/

class Cita {

    private $id_cita;
    private $creado_el;
    private $timestamp;

    /* Método constructor */
    public function __construct ($id_cita, $creado_el, $timestamp) {
        $this->id_cita = $id_cita;
        $this->creado_el = $creado_el;
        $this->timestamp = $timestamp;
    }

    /* Getters */
    function getId_cita() {
        return $this->id_cita;
    }
    function getCreadoEl() {
        return $this->creado_el;
    }
    function getTimestamp() {
        return $this->timestamp;
    }

    /* Setters */
    function setId_cita($id_cita) {
        $this->id_cita = $id_cita;
    }
    function setCreadoEl($creado_el) {
        $this->creado_el = $creado_el;
    }
    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

}
