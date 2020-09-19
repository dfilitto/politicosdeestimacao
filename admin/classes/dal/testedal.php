<?php

    $cargo = new ModelCargo(1,"Professor");
    $dalcargo = new DalCargo();
    //$dalcargo->insert($cargo);
    //echo "<h1>Registro cadastrado com sucesso</h1>";
    //echo "<h2>Código gerado: ".$cargo->id."</h2>";

    //$dalcargo->delete(10);


    
    //$dalcargo->update($cargo);

    $result = $dalcargo->search("sor");
    foreach ($result as $cargo) {
        echo "<div class=caixa> id: " . $cargo->id. " - Nome: " . $cargo->nome." </div>"; 
    }
    
    /*
    $result = $dalcargo->getCargo(5);
    var_dump($result);
    */
    
?>