<?php
    include ("Cargo.php");
    $cargo = new Cargo();
    //$cargo->set_id(10);
    //$cargo->set_nome("Danilo Filitto");

    var_dump($cargo instanceof Cargo);

    //var_dump($cargo);
    echo "<h1> Id: ".$cargo->get_id()."</h1>";
    echo "<h1> Nome: ".$cargo->get_nome()."</h1>";
?>