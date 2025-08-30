<?php
    require_once "Persona.php";

    class Credencial extends Persona{
        
        //atributos
        private $CODI;
        private $Usuario;
        private $Clave;
        private $Inicio_Sesion;

        // Métodos getter y setter
        public function getCODI() { return $this->CODI; }
        public function setCODI($CODI) { $this->CODI = $CODI; }

        public function getUsuario() { return $this->Usuario; }
        public function setUsuario($Usuario) { $this->Usuario = $Usuario; }

        public function getClave() { return $this->Clave; }
        public function setClave($Clave) { $this->Clave = $Clave; }

        public function getInicio_Sesion() { return $this->Inicio_Sesion; }
        public function setInicio_Sesion($Inicio_Sesion) { $this->Inicio_Sesion = $Inicio_Sesion; }

        // Constructor
        public function __construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo,$CODI, $Usuario, $Clave, $Inicio_Sesion) {
            parent::__construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo);
            $this->setCODI($CODI);
            $this->setUsuario($Usuario);
            $this->setClave($Clave);
            $this->setInicio_Sesion($Inicio_Sesion);
        }
    }
?>