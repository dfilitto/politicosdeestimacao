<?php 
    require_once ("session.php");
    $dalPartido = new DalPartido();
    $partidos = $dalPartido->search();
    if (isset($_GET['id'])&&$_GET['op']=="excluir"){
        $id = $_GET['id'];
        $dalPartido->delete($id);
        echo( '<div class="cxnotifica">Registro de código '.$id.' sendo excluido </div>' );
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=partidosList.php'>";
    }

    if (isset($_GET['id'])&&$_GET['op']=="detalhes"){
        $id = $_GET['id'];
        $partido = $dalPartido->getPartidos($id);
        echo( '<div class="cxnotifica">'.
        '<div><a href="partidosList.php">Fechar [x] </a></div>'.
        "<h2> Dados de Partidos</h2>".
        "<h3>Id: ".$partido->id."</h3>".
        "<h3>Nome: ".$partido->nome."</h3>".
        "<h3>Sigla: ".$partido->sigla."</h3>".
        "<h3>Site: ".$partido->site."</h3>".
        "<h3>Numero: ".$partido->numero."</h3>".
        "<h3>Descrição: ".$partido->descricao."</h3>".
        "</div>" );
        //echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=partidosList.php'>";
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
    <title>Partidos</title>
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
                        <h2 class="display-4 titulo-pagina">Listando Partidos</h2>
                    </div>
                    <a href="partidosAdd.php">
                        <div class="p-1">
                            <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-plus-circle"></i> Cadastar Novo
                            </button>
                        </div>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="d-none d-md-table-cell">ID</th>
                                <th>Nome</th>
                                <th class="d-none d-md-table-cell">Sigla</th>
                                <th class="d-none d-md-table-cell">Site</th>
                                <th class="d-none d-md-table-cell">Numero</th>
                                <th class="d-none d-md-table-cell">Descrição</th>
                                <th class="text-center">Ações</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($partidos as $u){ ?>
                            <tr>
                                <th class="d-none d-md-table-cell"><?php echo $u->id; ?></th>
                                <td><?php echo $u->nome; ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $u->sigla; ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $u->site; ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $u->numero; ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $u->descricao; ?></td>
                                <td class="text-center">

<a href="partidosList.php?id=<?php echo $u->id; ?>&op=detalhes" type="button" class="btn btn-sm btn-outline-danger"><i class="fas fa-eye"></i></a>
<a href="partidosUp.php?id=<?php echo $u->id; ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-edit"></i></a>
<a href="partidosList.php?id=<?php echo $u->id; ?>&op=excluir" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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