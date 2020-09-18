<?php

namespace classes\model;

class ModelUsuario extends ClasseBase{
    private $foto;
    private $email;
    private $senha;

    //Overwrite
    public function __construct($id=0, $nome="", $foto="", $email="", $senha="") {
        $this->set_id($id);
        $this->set_nome($nome);
        $this->set_foto($foto);
        $this->set_email($email);
        $this->set_senha($senha);
    }

    // Methods de acesso 
    // set armazena valor na propriedade
    //get pega o valor da propriedade
    public function set_foto($valor) {
        $this->foto = $valor;
    }

    public function get_foto() {
        return $this->foto;
    }

    public function set_email($valor) {
        $this->email = $valor;
    }
    public function get_email() {
        return $this->email;
    }

    public function set_senha($valor) {
        $this->senha = $valor;
    }

    public function get_senha() {
        return $this->senha;
    }
}
?>