<?php

/*
    Clase Profesional
        - Método constructor
        - Getters
        - Setters
*/
class Profesional {

    private $id_profesional;
    private $email;
    private $nColegiado;
    private $fNacimiento;
    private $nombre;
    private $apellidos;
    private $dni;
    private $genero;
    private $ejerceEn;
    private $creadoEl;
    private $estado;
    private $password;

    public function __construct ($id_profesional, $email, $nColegiado, $fNacimiento, $nombre,
                                 $apellidos, $dni, $genero, $ejerceEn, $creadoEl, $estado, $password) {
                                     
         $this->id_profesional = $id_profesional;
         $this->email = $email;
         $this->nColegiado = $nColegiado;
         $this->fNacimiento = $fNacimiento;
         $this->nombre = $nombre;
         $this->apellidos = $apellidos;
         $this->dni = $dni;
         $this->genero = $genero;
         $this->ejerceEn = $ejerceEn;
         $this->creadoEl = $creadoEl;
         $this->estado = $estado;
         $this->password = $password;
    }

    /* Getters */
    function getId_profesional() {
        return $this->id_profesional;
    }
    function getEmail() {
        return $this->email;
    }
    function getNcolegiado() {
        return $this->nColegiado;
    }
    function getFnacimiento() {
        return $this->fNacimiento;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getApellidos() {
        return $this->apellidos;
    }
    function getDni() {
        return $this->dni;
    }
    function getGenero() {
        return $this->genero;
    }
    function getEjerceEn() {
        return $this->ejerceEn;
    }
    function getCreadoEl() {
        return $this->creadoEl;
    }
    function getEstado() {
        return $this->estado;
    }
    function getPassword() {
        return $this->password;
    }

    /* Setters */
    function setId_profesional($id_profesional) {
        $this->id_profesional = $id_profesional;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setNcolegiado($nColegiado) {
        $this->nColegiado = $nColegiado;
    }
    function setFnacimiento($fNacimiento) {
        $this->fNacimiento = $fNacimiento;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    function setDni($dni) {
        $this->dni = $dni;
    }
    function setGenero($genero) {
        $this->genero = $genero;
    }
    function setEjerceEn($ejerceEn) {
        $this->ejerceEn = $ejerceEn;
    }
    function setCreadoEl($creadoEl) {
        $this->creadoEl = $creadoEl;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setPassword($password) {
        $this->password = $password;
    }

}
