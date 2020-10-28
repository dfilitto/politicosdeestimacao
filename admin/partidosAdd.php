<?php 
    require_once ("session.php");

    //programar o cadastro
    if (isset($_POST['btCadastrar']))
    {
        try{
            //pegar os dados da tela
            $partido = new ModelPartido();
            $partido->id = 0;
            $partido->nome = $_POST['inputNome'];
            $partido->sigla = $_POST['inputSigla'];
            $partido->site = $_POST['inputSite'];
            $partido->numero = $_POST['inputNumero'];
            $partido->descricao = $_POST['inputDescricao'];
            //salvar no banco de dados
            $dalPartido = new DalPartido();
            $dalPartido->insert($partido);
            echo( '<div class="cxnotifica">Registro de código '.$partido->id.' inserido com sucesso </div>' );
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=partidosList.php'>";
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=usuariosList.php'>";

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
    <title>Partidos - VCSjunior Sistemas</title>
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
                        <h2 class="display-4 titulo-pagina">Cadastrar Partidos</h2>
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
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="inputNome">

                        <label for="inputNome">Sigla</label>
                        <input type="text" class="form-control" id="inputSigla" placeholder="Sigla" name="inputSigla">

                        <label for="inputNome">Site</label>
                        <input type="text" class="form-control" id="inputSite" placeholder="Site" name="inputSite">

                        <label for="inputNome">Numero</label>
                        <input type="text" class="form-control" id="inputNumero" placeholder="Numero" name="inputNumero">

                        <label for="inputNome">Descrição</label>
                        <input type="text" class="form-control" id="inputDescricao" placeholder="Descrição" name="inputDescricao">
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