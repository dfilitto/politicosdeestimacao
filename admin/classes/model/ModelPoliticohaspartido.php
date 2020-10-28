<?php
    class ModelPoliticohasPartido{

        private $id;
        private $politicos_id;
        private $partidos_id;
        private $dtin;
        private $dtout;
        private $filiado;

        public function __construct($id=0, $politicos_id="", $partidos_id="", $dtin="", $dtout="", $filiado="") {
            $this->id = $id;
            $this->politicos_id = $politicos_id;
            $this->partidos_id = $partidos_id;
            $this->dtin = $dtin;
            $this->dtout = $dtout;
            $this->filiado = $filiado;
        }
        public function __set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function __get($atrib){
            return $this->$atrib;
        }
    }
?>