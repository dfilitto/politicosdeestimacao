<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Niloweb, Docente de T.I. Gênio supremo...!!!">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Painel - VCSjunior Sistemas</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- FontWaesome -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- Custom login css -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <!-- inclusão do primeiro menu, header- topo -->
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
                        <h2 class="display-4 titulo-pagina">Dashboard</h2>

                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <div class="row my-3">

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card bg-green text-white">
                            <div class="card-body">
                                <h2>Usuários</h2>
                                <i class="fas fa-users fa-3x"></i>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h2 class="display-4 text-center">955</h2>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card bg-purple text-white">
                            <div class="card-body">
                                <div class="row  align-items-center">
                                    <h2>Clientes</h2>
                                    <i class="fas fa-users fa-3x"></i>
                                </div>

                                <div class="dropdown-divider"></div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h2 class="display-4 text-center">700</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card bg-lime text-white">
                            <div class="card-body">
                                <div class="row  align-items-center">
                                    <div class="col-6">
                                        <h2>Artigos</h2>
                                    </div>
                                    <div class="col-6">
                                        <i class="far fa-newspaper fa-3x"></i>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h2 class="display-4 text-center">25000</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card bg-orange text-white">
                            <div class="card-body">
                                <div class="row  align-items-center">
                                    <div class="col-6">
                                        <h2>E-mails</h2>
                                    </div>
                                    <div class="col-6">
                                        <i class="far fa-envelope fa-3x"></i>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h2 class="display-4 text-center">955</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>


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