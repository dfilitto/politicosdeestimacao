<?php 
    require_once ("session.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $dalPartido = new DalPartido();
        $partidos = $dalPartido->getPartidos($id);
    }
    if (isset($_POST['btAtualizar']))
    {
        try{
            $dalPartido = new DalPartido(); //criar a dal
            $partidos = $dalPartido->getPartidos($_POST['inputId']);
            
 
            $partidos->nome = $_POST['inputNome'];
            $partidos->sigla = $_POST['inputSigla'];
            $partidos->site = $_POST['inputSite'];
            $partidos->numero = $_POST['inputNumero'];
            $partidos->descricao = $_POST['inputDescricao'];

            $dalPartido->update($partidos);
            echo( '<div class="cxnotifica">Registro de código '.$partidos->id.' alterado com sucesso </div>' );
            //echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=partidosList.php'>";
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=partidosList.php'>";

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
                        <h2 class="display-4 titulo-pagina">Alterar Partido</h2>
                    </div>
                    <a href="partidosList.php">
                        <div class="p-1">
                            <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-undo-alt"></i> Listar todos
                            </button>
                        </div>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                 <form enctype="multipart/form-data" action="#" method="post">

                 <div class="form-group">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" value="<?php echo $partidos->nome; ?>" name="inputNome">

                        <label for="inputNome">Sigla</label>
                        <input type="text" class="form-control" id="inputSigla" placeholder="Sigla" value="<?php echo $partidos->sigla; ?>" name="inputSigla">

                        <label for="inputNome">Site</label>
                        <input type="text" class="form-control" id="inputSite" placeholder="Site" value="<?php echo $partidos->site; ?>" name="inputSite">

                        <label for="inputNome">Numero</label>
                        <input type="text" class="form-control" id="inputNumero" placeholder="Numero" value="<?php echo $partidos->numero; ?>" name="inputNumero">

                        <label for="inputNome">Descrição</label>
                        <input type="text" class="form-control" id="inputDescricao" placeholder="Descrição" value="<?php echo $partidos->descricao; ?>" name="inputDescricao">
                    </div>
                    <input type="hidden" name="inputId" value="<?php echo $partidos->id; ?>" >  
                    <button type="submit" class="btn btn-primary" name="btAtualizar">Atualizar</button>
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