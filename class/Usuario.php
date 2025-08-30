<?php

class Usuario {
    //atributos
    private $usuario;
    private $clave;


    //getter's
    public function getUsuario() { return $this->usuario; }
    public function getClave() { return $this->clave; }    
    

    //setter's
    private function setUsuario($value) { $this->usuario = $value;}
    private function setClave($value) { $this->clave = $value;}

    //constructor
    public function __construct($usuario, $clave) {
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    //metodos
    public function to_String(){
        echo "Usuario: ".$this->getUsuario()."<br>".
             "Clave: ".$this->getClave()."<br>";
    }

    //metodo para iniciar sesion
    public function iniciarSesion(){
        return DTO::loginDTO($this->getUsuario(), $this->getClave());
    }

}


?>