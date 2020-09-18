<?php
    //include_once ("DalCargo.php");
    //include_once ("../model/ModelCargo.php");

  
    //pego os dados da tela e colocado no obj
    $cargo = new ModelCargo(6,"Presidente não teste");
    $dalcargo = new DalCargo();
    //$dalcargo->insert($cargo);
    //echo "<h1>Registro cadastrado com sucesso</h1>";
    //echo "<h2>Código gerado: ".$cargo->id."</h2>";
    //$dalcargo->delete(10);
    $dalcargo->update($cargo);
    $result = $dalcargo->search("");
    foreach ($result as $cargo) {
        var_dump($cargo);
        echo "<div class=caixa> id: " . $cargo->id. " - Nome: " . $cargo->nome." </div>"; 
    }
    
    /*
    $result = $dalcargo->getCargo(5);
    var_dump($result);
    */
    
?>