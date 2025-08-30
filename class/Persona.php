<?php
    require_once "DTO.php";
    class Persona{
        //atributos
        private $Cedula;
        private $Nombre1;
        private $Nombre2;
        private $Apellido1;
        private $Apellido2;
        private $FechaNac;
        private $Telefono;
        private $Direccion;
        private $Correo;

        // Getters y Setters
        public function getCedula() { return $this->Cedula; }
        public function setCedula($Cedula) { $this->Cedula = $Cedula; }

        public function getNombre1() { return $this->Nombre1; }
        public function setNombre1($Nombre1) { $this->Nombre1 = $Nombre1; }

        public function getNombre2() { return $this->Nombre2; }
        public function setNombre2($Nombre2) { $this->Nombre2 = $Nombre2; }

        public function getApellido1() { return $this->Apellido1; }
        public function setApellido1($Apellido1) { $this->Apellido1 = $Apellido1; }

        public function getApellido2() { return $this->Apellido2; }
        public function setApellido2($Apellido2) { $this->Apellido2 = $Apellido2; }

        public function getFechaNac() { return $this->FechaNac; }
        public function setFechaNac($FechaNac) { $this->FechaNac = $FechaNac; }

        public function getTelefono() { return $this->Telefono; }
        public function setTelefono($Telefono) { $this->Telefono = $Telefono; }

        public function getDireccion() { return $this->Direccion; }
        public function setDireccion($Direccion) { $this->Direccion = $Direccion; }

        public function getCorreo() { return $this->Correo; }
        public function setCorreo($Correo) { $this->Correo = $Correo; }

        // Constructor
        public function __construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo) {
            $this->setCedula($Cedula);
            $this->setNombre1($Nombre1);
            $this->setNombre2($Nombre2);
            $this->setApellido1($Apellido1);
            $this->setApellido2($Apellido2);
            $this->setFechaNac($FechaNac);
            $this->setTelefono($Telefono);
            $this->setDireccion($Direccion);
            $this->setCorreo($Correo);
        }
        // ---------------------------------------------------------------
        //----------------------------------------------------------------

        //verifica la existencia de una persona 
        public function VerificarExistencia(){
            return DTO::VerificarExistenciaPersona($this->getCedula());
        }

        //registra una persona 
        public function RegistrarPersona(){
            return DTO::RegistrarPersona($this->getCedula(), $this->getNombre1(), $this->getNombre2(), $this->getApellido1(), $this->getApellido2(), $this->getFechaNac());
        }
        //registra la informacion de contacto de una persona
        public function RegistrarContactoPersona(){
            return DTO::RegistrarContactoPersona($this->getCedula(), $this->getTelefono(), $this->getCorreo(), $this->getDireccion());
        }
    }


?>