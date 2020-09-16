<?php
    class ModelPoliticoshasPartido{
        private $id;
        private $politicos_id;
        private $partidos_id;
        private $dtin;
        private $dtout;
        private $filiado;

        public function __construct($id=0, $politicos_id="", $partidos_id="", $dtin="", $dtout="", $filiado="") {
            $this->set_id($id);
            $this->set_politicos_id($politicos_id);
            $this->set_partidos_id($partidos_id);
            $this->set_dtin($dtin);
            $this->set_dtout($dtout);
            $this->set_filiado($filiado);
        }

        public function set_id($id){
            $this->id = $id;
        }

        public function get_id(){
            return $this->id;
        }

        function set_politicos_id($politicos_id){
            $this->politicos_id = $politicos_id;
        }

        public function get_politicos_id(){
            return $this->politicos_id;
        }

        public function set_partidos_id($partidos_id){
            $this->partidos_id = $partidos_id;
        }

        public function get_partidos_id(){
            return $this->partidos_id;
        }

        public function set_dtin($dtin){
            $this->dtin = $dtin;
        }

        public function get_dtin(){
            return $this->dtin;
        }

        public function set_dtout($dtout){
            $this->dtout = $dtout;
        }

        public function get_dtout(){
            return $this->dtout;
        }

        public function set_filiado($filiado){
            $this->filiado = $filiado;
        }

        public function get_filiado(){
            return $this->filiado;
        }

    }
?>