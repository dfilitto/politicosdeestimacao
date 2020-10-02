<?php
    require_once ("dadosdaconexao.php");
    require_once ("autoload.php");
    
    session_start();
    if (isset($_SESSION["email"])==false){
        header("Location: login.php");
    }

    //mais um monte de coisas
    //pegar hora do sistema do navegador do usuário
    $timezone = new DateTimeZone('America/Sao_Paulo');
    date_default_timezone_set('UTC');
    setlocale(LC_ALL, NULL);
    setlocale(LC_ALL, 'pt_BR');
    $data = date('Y-m-d-H:i:s');
?>