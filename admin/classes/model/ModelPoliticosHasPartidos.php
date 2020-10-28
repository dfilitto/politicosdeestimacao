<?php
    class ModelPoliticosHasPartidos{

        private $id;
        private $politicos_id;
        private $partidos_id;
        private $dtin;
        private $dtout;
        private $filiado;
        //propriedades utilizadas com as views vçao ser criadas automagicamente
        //private $politos_nome, $particos_nome e $partdos_siglas 

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