<?php 
    require_once ("session.php");
    $id = 0;
    if (isset($_POST['btCadastrar'])){
        try{
        //pegar os dados da tela
        //inserir
        
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
        }
    } 

    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $dalPolitico = new DalPolitico();
        $politico = $dalPolitico->getpolitico($id);
        
    }

    if ($id == 0)
    {
        header("Location: politicosList.php"); 
    }
    

    $dalPartido = new DalPartido();
    $partidos = $dalPartido->search();

    
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
                        <h2 class="display-4 titulo-pagina">Gerenciar a vida partidaria do político</h2>
                        <?php
                            echo ('<img src="imagens/uploads/politicos/'.$politico->foto.'" alt="Foto do usuário" width="200px" margin="10px"/>');
                            echo ("<h3>Id: ".$politico->id."</h3>");  
                            echo ("<h3>Nome: ".$politico->nome."</h3>");
                            echo ("<h3>Formação: ".$politico->formacao."</h3>");
                            echo ("<h3>Site: ".$politico->site."</h3>");   
                        ?>
                    </div>
                    <a href="politicosList.php">
                        <div class="p-1">
                            <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-undo-alt"></i> Listar todos
                            </button>
                        </div>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                
                <form enctype="multipart/form-data" action="#" method="post">
                    <label for="inputPartido">Selecione o Partido</label>
                    <select name="inputPartido" id="inputPartido">
                        <option value="">Partidos</option>
                        <?php foreach($partidos as $u){​​?>
                            <option value="<?php echo $u->id; ?>"><?php echo $u->nome; ?></option>
                        <?php }​​ ?>
                    </select>
                    <label for="inputFiliado">Filiado</label>
                    <input type="checkbox" id="inputFiliado" name="inputFilitto">
                    <br>
                    <label for="inputAnoIni">Ano inicial da filiação</label>
                    <input type="number" class="form-control" id="inputAnoIni" name="inputAnoIni">
                    <label for="inputAnoFim">Ano final da filiação</label>
                    <input type="number" class="form-control" id="inputAnoFim" name="inputAnoFim">
                    <br>        
                    <input type="hidden" id="inputId" name="inputId" value="<?php echo $politico->id;?>">      
                    <button type="submit" class="btn btn-primary" name="btCadastrar">Cadastrar</button>
                    <br>
                    </div>
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