<?php
class ModelUsuario extends ClasseBase{
    private $foto;
    private $email;
    private $senha;

    //Overwrite
    public function __construct($id=0, $nome="", $foto="", $email="", $senha="") {
        $this->id = $id;
        $this->nome = $nome;
        $this->foto = $foto;
        $this->email = $email;
        $this->senha = $senha;
    } 

    public function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}
?>