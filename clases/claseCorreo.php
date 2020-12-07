<?php

/*
    Clase Correo
        - Método constructor
        - Getters
        - Setters
*/

class Correo {

    private $id_correo;
    private $asunto;
    private $creado_el;

    /* Método constructor */
    public function __construct ($id_correo, $asunto, $creado_el) {
        $this->id_correo = $id_correo;
        $this->asunto = $asunto;
        $this->creado_el = $creado_el;
    }

    /* Getters */
    function getId_correo() {
        return $this->id_correo;
    }
    function getAsunto() {
        return $this->asunto;
    }
    function getCreadoEl() {
        return $this->creado_el;
    }

    /* Setters */
    function setId_cita($id_correo) {
        $this->id_correo = $id_correo;
    }
    function setTimestamp($asunto) {
        $this->asunto = $asunto;
    }
    function setCreadoEl($creado_el) {
        $this->creado_el = $creado_el;
    }

}
