<?php 
    require_once ("session.php");

            $dalCargo = new DalCargo();
            $cargos = $dalCargo->search();

            $dalPoliticos = new DalPolitico();
            $politicos = $dalPoliticos->search();

    if (isset($_POST['btCadastrar'])){
        try{
        //pegar os dados da tela
        $carreira = new ModelCarreira();
        $carreira->id = 0;
        $carreira->politicos_id = $_POST['inputPolitico'];
        $carreira->cargo_id = $_POST['inputCargo'];
        $carreira->ano = $_POST['inputAno'];
        $carreira->cidest = $_POST['inputCidaest'];
        $dalCarreira = new DalCarreira();
        $dalCarreira->insert($carreira);
        echo( '<div class="cxnotifica">Registro de código '.$carreira->id.' inserido com sucesso </div>' );
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=carreirasList.php'>";
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=carreiraList.php'>";
        }
    }   
?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Usuários - VCSjunior Sistemas</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- FontWaesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- Custom login css -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
<?php include('inc_NavOne.php'); ?>
    <!--Inicio conteudo -->
    <div class="d-flex">
        <!--Inicio Menu -->
    <?php include('inc_NavTwo.php'); ?>
        <!--Fim menu -->

        <!--INICIO APRESENTAR CONTEUDO-->
        <div class="content p-3">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-1">
                        <h2 class="display-4 titulo-pagina">Cadastrar Carreira</h2>
                    </div>
                    <a href="carreirasList.php">
                        <div class="p-1">
                            <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-undo-alt"></i> Listar todos
                            </button>
                        </div>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                <form enctype="multipart/form-data" action="#" method="post">
                <label for="inputCargo">Selecione o Cargo</label>
                <select name="inputCargo" id="inputCargo">
                <option value="">Cargos</option>
                <?php foreach($cargos as $u){​​ ?>
                <option value="<?php echo $u->id; ?>"><?php echo $u->nome; ?></option>
                <?php }​​ ?>
                </select><br>
                <label for="inputPolitico">Selecione o Politico</label>
                <select name="inputPolitico" id="inputPolitico">
                <option value="">politico</option>
                <?php foreach($politicos as $u){​​ ?>
                <option value="<?php echo $u->id; ?>"><?php echo $u->nome; ?></option>
            <?php }​​ ?>
            </select><p>
                        <label for="inputAno">Ano</label>
                        <input type="date" class="form-control" id="inputAno" placeholder="Ano" name="inputAno">
                        <label for="inputCidaest">Cidade/Estado</label>
                        <input type="text" class="form-control" id="inputCidaest" placeholder="Cidade/Estado" name="inputCidaest">
                    </div>          
                    <button type="submit" class="btn btn-primary" name="btCadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
        <!--FIM APRESENTAR CONTEUDO-->
    </div>
    <!--Fim conteudo -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>