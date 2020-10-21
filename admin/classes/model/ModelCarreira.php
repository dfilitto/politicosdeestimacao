<?php
    class ModelCarreira extends ClasseBase{
        private $cargo_id;
        private $ano;
        private $cidest;

        public function __construct($id=0, $politico_id="", $cargo_id="", $ano="", $cidest="") {
            $this->id = $id;
            $this->politicos_id = $politico_id;
            $this->cargo_id = $cargo_id;
            $this->ano = $ano;
            $this->cidest = $cidest;
        }
        public function __set($atrib, $value){
            $this->$atrib = $value;
        }
    
        public function __get($atrib){
            return $this->$atrib;
        }
    }
?>