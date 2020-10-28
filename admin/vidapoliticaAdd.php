<?php 
    require_once ("session.php");

    //programar o cadastro
    if (isset($_POST['btCadastrar']))
    {
        //pegar os dados da tela
        $vidapolitica = new ModelVidaPolitica();
        $vidapolitica->id = 0;
        $vidapolitica->atividade = $_POST['inputVidaPolitica'];
        $vidapolitica->email = $_POST['inputDescrição'];
        $vidapolitica->senha = $_POST['inputAtpositiva'];
        $vidapolitica->foto = "Temporário";
        //salvar no banco de dados
        $dalvidapolitica = new DalVidaPolitica();
        $dalvidapolitica->insert($vidapolitica);
        
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
    <title>Vida Politica - VCSjunior Sistemas</title>
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
                        <h2 class="display-4 titulo-pagina">Cadastrar Vida Politica</h2>
                    </div>
                    <a href="vidapoliticaList.php">
                        <div class="p-1">
                            <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-undo-alt"></i> Listar todos
                            </button>
                        </div>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                <form enctype="multipart/form-data" action="#" method="post">
                    <div class="form-row">
                    </div>
                    <div class="form-group">
                        <label for="inputVidaPolitica">Vida Politica</label>
                        <input type="text" class="form-control" id="inputVidaPolitica" placeholder="Vida Politica" name="inputVidaPolitica">
                    </div>
                    <div class="form-group">
                        <label for="inputDescrição">Descrição</label>
                        <input type="text" class="form-control" id="inputDescrição" placeholder="Descrição" name="inputDescrição">
                    </div>
                    <div class="form-group">
                        <label for="inputAtpositiva">Atos Positivos</label>
                        <input type="text" class="form-control" id="inputAtpositiva" placeholder="Atos Positivos" name="inputAtpositiva">
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