<?php 
    require_once ("session.php");
    $dalUsuario = new DalUsuario();
    $usuarios = $dalUsuario->search();
    if (isset($_GET['id'])&&$_GET['op']=="excluir"){
        $id = $_GET['id'];
        $dalUsuario->delete($id);
        echo( '<div class="cxnotifica">Registro de código '.$id.' sendo excluido </div>' );
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=usuariosList.php'>";
    }
    if (isset($_GET['id'])&&$_GET['op']=="detalhes"){
        $id = $_GET['id'];
        $usuario = $dalUsuario->getUsuario($id);
        echo( '<div class="cxnotifica">'.
        "<h2> Dados do usuário</h2>".
        "<h3>Id: ".$usuario->id."</h3>".
        "<h3>Nome: ".$usuario->nome."</h3>".
        "<h3>E-mail: ".$usuario->email."</h3>".
        '<img src="imagens/upload/'.$usuario->foto.'" alt="Foto do usuário" width="200px" />'.
        '<div><a href="usuariosList.php">Fechar</a></div>
        </div>' );
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
                        <h2 class="display-4 titulo-pagina">Listando Usuário</h2>
                    </div>
                    <a href="usuariosAdd.php">
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
                                <th>Nome Completo</th>
                                <th class="d-none d-md-table-cell">E-mail</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($usuarios as $u){ ?>
                            <tr>
                                <th class="d-none d-md-table-cell"><?php echo $u->id; ?></th>
                                <td><?php echo $u->nome; ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $u->email; ?></td>
                                <td class="text-center">

 <a href="usuariosList.php?id=<?php echo $u->id; ?>&op=detalhes" type="button" class="btn btn-sm btn-outline-danger"><i class="fas fa-eye"></i></a>
 <a href="usuariosUp.php?id=<?php echo $u->id; ?>" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-edit"></i></a>
 <a href="usuariosList.php?id=<?php echo $u->id; ?>&op=excluir" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>



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