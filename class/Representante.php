<?php
    require_once "Persona.php";

    class Representante extends Persona{
        //atributos
        private $CODR;
        private $ID_Representante;
        private $ID_Atleta;
        private $Parentesco;
        private $Estatus;

        // Métodos getter y setter
        public function getCODR() { return $this->CODR; }
        public function setCODR($CODR) { $this->CODR = $CODR; }

        public function getID_Representante() { return $this->ID_Representante; }
        public function setID_Representante($ID_Representante) { $this->ID_Representante = $ID_Representante; }

        public function getID_Atleta() { return $this->ID_Atleta; }
        public function setID_Atleta($ID_Atleta) { $this->ID_Atleta = $ID_Atleta; }

        public function getParentesco() { return $this->Parentesco; }
        public function setParentesco($Parentesco) { $this->Parentesco = $Parentesco; }

        public function getEstatus() { return $this->Estatus; }
        public function setEstatus($Estatus) { $this->Estatus = $Estatus; }

        // Constructor
        public function __construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo, $CODR, $ID_Representante, $ID_Atleta, $Parentesco, $Estatus) {
            parent::__construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo);
            $this->setCODR($CODR);
            $this->setID_Representante($ID_Representante);
            $this->setID_Atleta($ID_Atleta);
            $this->setParentesco($Parentesco);
            $this->setEstatus($Estatus);
        }
        //----------------------------------------------------------------
        //----------------------------------------------------------------

        //generar ID 
        public function ID(){
            $codigo=DTO::ultimo_ID_Representante();
            // Verificamos si el código contiene el guión "-"
            if (strpos($codigo, "-") !== false) {
                // Separamos la letra y el número
                $id = explode("-", $codigo);
                // Sumamos 1 al número
                $numero = (int)$id[1] + 1;
                $this->setID_Representante($id[0] . "-" . $numero);
            } 
        }
        //verifica la existencia del representante para un atleta
        public function VerificarExistenciaRepresentante(){
            return DTO::VerificarExistenciaRepresentante($this->getCedula(), $this->getID_Atleta());
        }
        //registrar a un atleta
        public function RegistrarRepresentante(){
           
            $this->ID(); //generar id
            //                                    
            return DTO::RegistrarRepresentante($this->getCODR(), $this->getID_Representante(), $this->getID_Atleta(), $this->getCedula(), $this->getParentesco(), $this->getEstatus());
        }
    }
?>