<?php

/*
    Clase Administrador
        - Método constructor
        - Getters
        - Setters
*/
class Administrador {

    private $id_admin;
    private $email;
    private $nombre;
    private $apellidos;
    private $password;

    /* Método constructor */
    public function __construct ($id_admin, $email, $nombre, $apellidos, $password) {
        $this->id_admin = $id_admin;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->password = $password;
    }

    /* Getters */
    function getId_admin() {
        return $this->id_admin;
    }
    function getEmail() {
        return $this->email;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getApellidos() {
        return $this->apellidos;
    }
    function getPassword() {
        return $this->password;
    }

    /* Setters */
    function setId_admin($id_admin) {
        $this->id_admin = $id_admin;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    function setPassword($password) {
        $this->password = $password;
    }

}
