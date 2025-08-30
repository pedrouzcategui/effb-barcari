<?php
    class Horario{
         //atributos
        private $CODH;
        private $ID_Evento;
        private $Hora_inicio;
        private $Hora_cierre;
        private $Dias;
        private $Estatus;

        // Métodos getter y setter
        public function getCODH() { return $this->CODH; }
        public function setCODH($CODH) { $this->CODH = $CODH; }

        public function getID_Evento() { return $this->ID_Evento; }
        public function setID_Evento($ID_Evento) { $this->ID_Evento = $ID_Evento; }

        public function getHora_inicio() { return $this->Hora_inicio; }
        public function setHora_inicio($Hora_inicio) { $this->Hora_inicio = $Hora_inicio; }

        public function getHora_cierre() { return $this->Hora_cierre; }
        public function setHora_cierre($Hora_cierre) { $this->Hora_cierre = $Hora_cierre; }

        public function getDias() { return $this->Dias; }
        public function setDias($Dias) { $this->Dias = $Dias; }

        public function getEstatus() { return $this->Estatus; }
        public function setEstatus($Estatus) { $this->Estatus = $Estatus; }

        // Constructor
        public function __construct($CODH, $ID_Evento, $Hora_inicio, $Hora_cierre, $Dias, $Estatus) {
            $this->setCODH($CODH);
            $this->setID_Evento($ID_Evento);
            $this->setHora_inicio($Hora_inicio);
            $this->setHora_cierre($Hora_cierre);
            $this->setDias($Dias);
            $this->setEstatus($Estatus);
        }
    }
?>