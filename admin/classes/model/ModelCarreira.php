<?php
    class ModelCarreira{
        private $id;
        private $cargo_id;
        private $politicos_id;
        private $ano;
        private $cidadeestado;

        public function __construct($id=0, $cargo_id="", $politicos_id="", $ano="", $cidadeestado="") {
            $this->set_id($id);
            $this->set_politicos_id($politicos_id);
            $this->set_cargo_id($cargo_id);
            $this->set_ano($ano);
            $this->set_cidadeestado($cidadeestado);
        }

        public function set_id($id){
            $this->id = $id;
        }

        public function get_id(){
            return $this->id;
        }

        public function set_cargo_id($cargo_id){
            $this->cargo_id = $cargo_id;
        }

        public function get_cargo_id(){
            return $this->cargo_id;
        }

        public function set_politicos_id($politicos_id){
            $this->politicos_id = $politicos_id;
        }

        public function get_politicos_id(){
            return $this->politicos_id;
        }

        public function set_ano($ano){
            $this->ano = $ano;
        }

        public function get_ano(){
            return $this->ano;
        }

        public function set_cidadeestado($cidadeestado){
            $this->cidadeestado = $cidadeestado;
        }

        public function get_cidadeestado(){
            return $this->cidadeestado;
        }

    }
?>