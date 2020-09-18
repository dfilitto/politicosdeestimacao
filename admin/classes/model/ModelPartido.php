<?php
    class ModelPartido extends ClasseBase{
       
        private $sigla;
        private $site;
        private $numero;
        private $descricao;

        public function __construct($id=0, $nome="", $sigla="", $site="", $numero="", $descricao="") {
            $this->set_id($id);
            $this->set_nome($nome);
            $this->set_sigla($sigla);
            $this->set_site($site);
            $this->set_numero($numero);
            $this->set_numero($descricao);
        }

        function set_sigla($sigla){
            $this->sigla = $sigla;
        }

        function get_sigla(){
            return $this->sigla;
        }

        function set_site($site){
            $this->site = $site;
        }

        function get_site(){
            return $this->site;
        }

        function set_numero($numero){
            $this->numero = $numero;
        }

        function get_numero(){
            return $this->numero;
        }

        function set_descricao($descricao){
            $this->descricao = $descricao;
        }

        function get_descricao(){
            return $this->descricao;
        }

    }
?>