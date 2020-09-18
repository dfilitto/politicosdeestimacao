<?php
    class ModelAtividade {
        private $id;
        private $politicosId;
        private $atividade;
        private $descricao;
        private $atPositiva;

        public function __construct($id=0, $politicosId="", $atividade="", $descricao="", $atPositiva="") {
            $this->id = $id;
            $this->politicosId = $politicosId;
            $this->atividade = $atividade;
            $this->descricao = $descricao;
            $this->atPositiva = $atPositiva;
        }

        public function __set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function __get($atrib){
            return $this->$atrib;
        }
        

    }
?>