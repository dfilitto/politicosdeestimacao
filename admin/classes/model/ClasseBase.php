<?php



class ClasseBase {

    // Properties caracteristicas
    private $id;
    private $nome;

    public function __construct($id=0, $nome="") {
        $this->id = $id;
        $this->nome = $nome;
    }
   
    public function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
    
    
    
}
?>