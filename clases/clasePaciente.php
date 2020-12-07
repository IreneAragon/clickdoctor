<?php

/*
    Clase Paciente
        - Método constructor
        - Getters
        - Setters
*/
class Paciente {

    private $id_paciente;
    private $email;
    private $fNacimiento;
    private $nombre;
    private $apellidos;
    private $dni;
    private $genero;
    private $creadoEl;
    private $estado;
    private $password;

    public function __construct ($id_paciente, $email, $fNacimiento, $nombre, $apellidos, $dni,
                                 $genero, $creadoEl, $estado, $password) {
                                     
         $this->id_paciente = $id_paciente;
         $this->email = $email;
         $this->fNacimiento = $fNacimiento;
         $this->nombre = $nombre;
         $this->apellidos = $apellidos;
         $this->dni = $dni;
         $this->genero = $genero;
         $this->creadoEl = $creadoEl;
         $this->estado = $estado;
         $this->password = $password;
    }

    /* Getters */
    function getId_paciente() {
        return $this->id_paciente;
    }
    function getEmail() {
        return $this->email;
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
    function setId_paciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }
    function setEmail($email) {
        $this->email = $email;
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
