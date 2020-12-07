<?php

/*
    Clase Informe
        - Método constructor
        - Getters
        - Setters
*/

class Informe {

    private $id_informe;
    private $resumen;
    private $diagnóstico;
    private $creado_el;

    public function __construct ($id_informe, $resumen, $diagnóstico, $creado_el) {
        $this->id_informe = $id_informe;
        $this->resumen = $resumen;
        $this->diagnóstico = $diagnóstico;
        $this->creado_el = $creado_el;
    }

    /* Getters */
    function getId_informe() {
        return $this->id_informe;
    }
    function getResumen() {
        return $this->resumen;
    }
    function getDiagnóstico() {
        return $this->diagnóstico;
    }
    function getCreado_el() {
        return $this->creado_el;
    }

    /* Setters */
    function setId_informe($id_mensaje) {
        $this->id_informe = $id_informe;
    }
    function setResumen($resumen) {
        $this->resumen = $resumen;
    }
    function setDiagnóstico($diagnóstico) {
        $this->diagnóstico = $diagnóstico;
    }
    function setCreado_el($creado_el) {
        $this->creado_el = $creado_el;
    }

}
