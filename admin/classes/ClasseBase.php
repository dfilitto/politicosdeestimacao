<?php
class ClasseBase {

    // Properties caracteristicas
    private $id;
    private $nome;

    function __construct($id=0, $nome="") {
        $this->set_id($id);
        $this->set_nome($nome);
    }

    // Methods de acesso 
    // set armazena valor na propriedade
    //get pega o valor da propriedade
    function set_id($id) {
        $this->id = $id;
    }
    function get_id() {
        return $this->id;
    }

    function set_nome($nome) {
        $this->nome = $nome;
    }
    function get_nome() {
        return $this->nome;
    }
}
?>