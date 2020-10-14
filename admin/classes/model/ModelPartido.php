<?php
    class ModelPartido extends ClasseBase{
       
        private $sigla;
        private $site;
        private $numero;
        private $descricao;

        public function __construct($id=0, $nome="", $sigla="", $site="", $numero="", $descricao="") {
            $this->id = $id;
            $this->nome = $nome;
            $this->sigla = $sigla;
            $this->site = $site;
            $this->numero = $numero;
            $this->descricao = $descricao;
        }
        public function __set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function __get($atrib){
            return $this->$atrib;
        }
    }
?>