<?php
    include_once ("DalCargo.php");
    include_once ("../model/ModelCargo.php");

    //pego os dados da tela e colocado no obj
    $cargo = new ModelCargo(0,"Presidente teste");
    $dalcargo = new DalCargo();
    $dalcargo->insert($cargo);


?>