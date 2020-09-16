<?php
    class ModelAtividade {
        private $id;
        private $politicos_id;
        private $atividade;
        private $descricao;
        private $atpositiva;

        public function __construct($id=0, $politicos_id="", $atividade="", $descricao="", $atpositiva="") {
            $this->set_id($id);
            $this->set_politicos_id($nome);
            $this->set_atividade($sigla);
            $this->set_descricao($site);
            $this->set_atpositiva($numero);
        }

        public function set_id($id){
            $this->id = $id;
        }

        public function get_id(){
            return $this->id;
        }

        public function set_politicos_id($politicos_id){
            $this->politicos_id = $politicos_id;
        }

        public function get_politicos_id(){
            return $this->politicos_id;
        }

        public function set_atividade($atividade){
            $this->atividade = $atividade;
        }

        public function get_atividade(){
            return $this->atividade;
        }

        public function set_descricao($descricao){
            $this->descricao = $descricao;
        }

        public function get_descricao(){
            return $this->descricao;
        }

        public function set_atpositiva($atpositiva){
            $this->atpositiva = $atpositiva;
        }

        public function get_atpositiva(){
            return $this->atpositiva;
        }

    }
?>