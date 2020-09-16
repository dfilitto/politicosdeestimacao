<?php
class ClasseBase {

    // Properties caracteristicas
    private $id;
    private $nome;

    public function __construct($id=0, $nome="") {
        $this->set_id($id);
        $this->set_nome($nome);
    }

    // Methods de acesso 
    // set armazena valor na propriedade
    //get pega o valor da propriedade
    public function set_id($valor) {
        $this->id = $valor;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_nome($valor) {
        $this->nome = $valor;
    }
    
    public function get_nome() {
        return $this->nome;
    }
}
?>