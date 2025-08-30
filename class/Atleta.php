<?php
    require_once "Persona.php";

    class Atleta extends Persona{
        //atributos
        private $CODA;
        private $ID_Atleta;
        private $Categoria;
        private $Grado_instruccion;
        private $Solvencia;
        private $Colegio;
        private $Estatus;

        // Métodos getter y setter
        public function getCODA() { return $this->CODA; }
        public function setCODA($CODA) { $this->CODA = $CODA; }

        public function getID_Atleta() { return $this->ID_Atleta; }
        public function setID_Atleta($ID_Atleta) { $this->ID_Atleta = $ID_Atleta; }

        public function getCategoria() { return $this->Categoria; }
        public function setCategoria($Categoria) { $this->Categoria = $Categoria; }

        public function getGrado_instruccion() { return $this->Grado_instruccion; }
        public function setGrado_instruccion($Grado_instruccion) { $this->Grado_instruccion = $Grado_instruccion; }

        public function getSolvencia() { return $this->Solvencia; }
        public function setSolvencia($Solvencia) { $this->Solvencia = $Solvencia; }

        public function getColegio() { return $this->Colegio; }
        public function setColegio($Colegio) { $this->Colegio = $Colegio; }

        public function getEstatus() { return $this->Estatus; }
        public function setEstatus($Estatus) { $this->Estatus = $Estatus; }
        
        // Constructor
        public function __construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo, $CODA, $ID_Atleta, $Categoria, $Grado_instruccion, $Solvencia, $Colegio, $Estatus) {
            parent::__construct($Cedula, $Nombre1, $Nombre2, $Apellido1, $Apellido2, $FechaNac, $Telefono, $Direccion, $Correo);
            $this->setCODA($CODA);
            $this->setID_Atleta($ID_Atleta);
            $this->setCategoria($Categoria);
            $this->setGrado_instruccion($Grado_instruccion);
            $this->setSolvencia($Solvencia);
            $this->setColegio($Colegio);
            $this->setEstatus($Estatus);
        }

        // ---------------------------------------------------------------
        //----------------------------------------------------------------

        //to string
        public function to_String(){
            echo "Cedula: ".$this->getCedula()."<br>".
                 "Nombre1: ".$this->getNombre1()."<br>".
                 "Nombre2: ".$this->getNombre2()."<br>".
                 "Apellido1: ".$this->getApellido1()."<br>".
                 "Apellido2: ".$this->getApellido2()."<br>".
                 "FechaNac: ".$this->getFechaNac()."<br>".
                 "Telefono: ".$this->getTelefono()."<br>".
                 "Direccion: ".$this->getDireccion()."<br>".
                 "Correo: ".$this->getCorreo()."<br>".
                 "CODA: ".$this->getCODA()."<br>".
                 "ID_Atleta: ".$this->getID_Atleta()."<br>".
                 "Categoria: ".$this->getCategoria()."<br>".
                 "Grado_instruccion: ".$this->getGrado_instruccion()."<br>".
                 "Solvencia: ".$this->getSolvencia()."<br>".
                 "Colegio: ".$this->getColegio()."<br>".
                 "Estatus: ".$this->getEstatus()."<br>";
        }

        //verifica la existencia del atleta
        public function VerificarExistenciaAtleta(){
            return DTO::VerificarExistenciaAtleta($this->getCedula());
        }
        // verificica el estatus del atleta
        public function VerificarEstatus(){
            $estatus= DTO::VerificarExistenciaAtleta($this->getCedula());

            if ($estatus == "Activo") return true;
            else return false;
        }
        //generar ID 
        public function ID(){
            $codigo=DTO::ultimo_ID_Atleta();
            // Verificamos si el código contiene el guión "-"
            if (strpos($codigo, "-") !== false) {
                // Separamos la letra y el número
                $id = explode("-", $codigo);
                // Sumamos 1 al número
                $numero = (int)$id[1] + 1;
                $this->setID_Atleta($id[0] . "-" . $numero);
            } 
        }

        //registrar a un atleta
        public function RegistrarAtleta(){
            return DTO::RegistrarAtlta($this->getCODA(), $this->getID_Atleta(), $this->getCedula(), $this->getCategoria(), $this->getGrado_instruccion(), $this->getSolvencia(), $this->getColegio(), $this->getEstatus());
        }

        //devuelve un arreglo con los atletas activos
        public static function listarAtletasActivos(){
            return DTO::AtletasActivos();
        }

        //devuelve un arreglo con los datos e un atelta segun su ID_Atleta
        public static function DatosAtleta($ID_Atleta){
            return DTO::DatosAtletaCompleto($ID_Atleta);
        }

        //actualizar datos de un atleta
        
        public function ActualizarDatosAtleta(){
            return DTO::ActualizarDatosAtleta(
                $this->getID_Atleta(),
                $this->getCedula(),
                $this->getNombre1(), 
                $this->getNombre2(), 
                $this->getApellido1(), 
                $this->getApellido2(), 
                $this->getFechaNac(), 
                $this->getCategoria(), 
                $this->getGrado_instruccion(), 
                $this->getSolvencia(),
                $this->getColegio(),
                $this->getEstatus()
            );
        }

        //Cambiar estatus
        public function CambiarEstatus($Estatus){
            return DTO::CambiarEstatusAtleta($this->getCedula(), $Estatus);
        }
    }
?>