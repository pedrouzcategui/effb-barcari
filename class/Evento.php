<?php

    class Evento {
        //atributos
        private $CODE;
        private $ID_Evento;
        private $categoria;
        private $Tipo;
        private $Fecha;
        private $ID_Horario;
        private $Disciplina;
        private $Descripcion;
        private $Estatus;

        // Métodos getter y setter
        public function getCODE() { return $this->CODE; }
        public function setCODE($CODE) { $this->CODE = $CODE; }

        public function getID_Evento() { return $this->ID_Evento; }
        public function setID_Evento($ID_Evento) { $this->ID_Evento = $ID_Evento; }

        public function getCategoria() { return $this->categoria; }
        public function setCategoria($categoria) { $this->categoria = $categoria; }

        public function getTipo() { return $this->Tipo; }
        public function setTipo($Tipo) { $this->Tipo = $Tipo; }

        public function getFecha() { return $this->Fecha; }
        public function setFecha($Fecha) { $this->Fecha = $Fecha; }

        public function getID_Horario() { return $this->ID_Horario; }
        public function setID_Horario($ID_Horario) { $this->ID_Horario = $ID_Horario; }

        public function getDisciplina() { return $this->Disciplina; }
        public function setDisciplina($Disciplina) { $this->Disciplina = $Disciplina; }

        public function getDescripcion() { return $this->Descripcion; }
        public function setDescripcion($Descripcion) { $this->Descripcion = $Descripcion; }

        public function getEstatus() { return $this->Estatus; }
        public function setEstatus($Estatus) { $this->Estatus = $Estatus; }

        // Constructor completo
        public function __construct($CODE, $ID_Evento, $categoria, $Tipo, $Fecha, $ID_Horario, $Disciplina, $Descripcion, $Estatus) {
            $this->setCODE($CODE);
            $this->setID_Evento($ID_Evento);
            $this->setCategoria($categoria);
            $this->setTipo($Tipo);
            $this->setFecha($Fecha);
            $this->setID_Horario($ID_Horario);
            $this->setDisciplina($Disciplina);
            $this->setDescripcion($Descripcion);
            $this->setEstatus($Estatus);
        }
    }
?>