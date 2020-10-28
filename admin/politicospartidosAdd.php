<?php 
    require_once ("session.php");

    //cancelar o alterar e inserir e voltar para o padrão
    //efetua a chamada da pagina novamente
    if (isset($_POST['btCancelar'])){
        $id = $_POST['inputPolitico'];
        header('Location: politicospartidosAdd.php?id='.$id);
    }


    //cadastra e recarrega a página
    if (isset($_POST['btCadastrar'])){
        try{
        
            $polpar = new ModelPoliticosHasPartidos();
            $polpar->id = 0;
            $polpar->politicos_id = $_POST['inputPolitico'];
            $polpar->partidos_id = $_POST['inputPartido'];
            $polpar->dtin = $_POST['inputAnoIni'];
            $polpar->dtout = $_POST['inputAnoFim'];  
            if(isset($_POST['inputFiliado']))
            {
                $polpar->filiado = 1;
            }else{
                $polpar->filiado = 0;
            }
            $dalPolpar = new DalPoliticosHasPartidos();
            $dalPolpar->insert($polpar);
            header('Location: politicospartidosAdd.php?id='.$polpar->politicos_id);
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
        }
        
    }
    //altera e recarrega a página
    if (isset($_POST['btAlterar'])){
        try{
        
            $polpar = new ModelPoliticosHasPartidos();
            $polpar->id = $_POST['inputId'];;
            $polpar->politicos_id = $_POST['inputPolitico'];
            $polpar->partidos_id = $_POST['inputPartido'];
            $polpar->dtin = $_POST['inputAnoIni'];
            $polpar->dtout = $_POST['inputAnoFim'];  
            if(isset($_POST['inputFiliado']))
            {
                $polpar->filiado = 1;
            }else{
                $polpar->filiado = 0;
            }
            $dalPolpar = new DalPoliticosHasPartidos();
            $dalPolpar->update($polpar);
            header('Location: politicospartidosAdd.php?id='.$polpar->politicos_id);
            //validar e-mail
            //echo( '<div class="cxnotifica">Registro de código '.$polpar->id.' inserido com sucesso </div>' );
            //echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=politicosList.php'>";

        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
        }
        
    }

    $dalPolpar = new DalPoliticosHasPartidos();
    
    //alterar por get 
    //pegar os dados para colocar no form
    if (isset($_GET['id'])&&isset($_GET['op'])&&$_GET['op']=="alterar"){
        $idpp = $_GET['idpp'];
        $polpar = $dalPolpar->getPoliticosHasPartidos($idpp);
    }
    //excluir por get
    if (isset($_GET['id'])&&isset($_GET['op'])&&$_GET['op']=="excluir"){
        
        $idpp = $_GET['idpp'];
        $dalPolpar->delete($idpp);
        header('Location: politicospartidosAdd.php?id='.$_GET['id']);
        //header('Location: politicospartidosAdd.php?id='.$_GET['id']);
    }

    //pegar os dados que são utilizados para iniciar a página
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $dalPolitico = new DalPolitico();
        $politico = $dalPolitico->getpolitico($id);
        
    }

    // validar caso não tenha um politico
    if ($id == 0)
    {
        header("Location: politicosList.php"); 
    }
    
    //utilizado no combobox - listar os partidos existentes
    $dalPartido = new DalPartido();
    $partidos = $dalPartido->search();
    //listar todos os partidos
    $polspars = $dalPolpar->listView();
  
    
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
                        <h2 class="display-4 titulo-pagina">Gerenciar a vida Partidária do Politico</h2>
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
                <?php
                    if(!isset($polpar)){
                ?>
                <form enctype="multipart/form-data" action="#" method="post">
                    <label for="inputPartido">Selecione o Partido</label>
                    <select name="inputPartido" id="inputPartido">
                        <option value="">Partidos</option>
                        <?php foreach($partidos as $u){​​ ?>
                            <option value="<?php echo $u->id; ?>"><?php echo $u->sigla; ?></option>
                        <?php }​​ ?>
                    </select>
                    <label for="inputFiliado">Filiado</label>
                    <input type="checkbox" id="inputFiliado" name="inputFiliado">
                    <br>
                    <label for="inputAnoIni">Ano inicial da filiação</label>
                    <input type="date" class="form-control" id="inputAnoIni" placeholder="Ano inicial" name="inputAnoIni">
                    <label for="inputAnoFim">Ano final da filiação</label>
                    <input type="date" class="form-control" id="inputAnoFim" placeholder="Ano final" name="inputAnoFim">
                    <br>        
                    <input type="hidden" id="inputPolitico" name="inputPolitico" value="<?php echo $politico->id;?>">      
                    <button type="submit" class="btn btn-primary" name="btCadastrar">Cadastrar</button>
                    <button type="submit" class="btn btn-primary" name="btCancelar">Cancelar</button>
                    <br>
                    </div>
                </form>
                <?php
                    }else{
                        ?>
                    <form enctype="multipart/form-data" action="#" method="post">
                    <input type="hidden" id="inputPartido" name="inputPartido" value="<?php echo $polpar->partidos_id;?>">
                    <?php //echo "Partido: ".$polpar->partidos_nome; ?>
                    <label for="inputFiliado">Filiado</label>
                    <input type="checkbox" id="inputFiliado" name="inputFiliado"
                    <?php 
                
                        if ($polpar->filiado){
                            
                            echo "checked";
                        }
                    ?>
                     >
                     
                    <br>
                    <label for="inputAnoIni">Ano inicial da filiação</label>
                    <input type="date" class="form-control" id="inputAnoIni" placeholder="Ano inicial" name="inputAnoIni" value="<?php echo $polpar->dtin;?>">
                    <label for="inputAnoFim">Ano final da filiação</label>
                    <input type="date" class="form-control" id="inputAnoFim" placeholder="Ano final" name="inputAnoFim" value="<?php echo $polpar->dtout;?>">
                    <br>        
                    <input type="hidden" id="inputPolitico" name="inputPolitico" value="<?php echo $polpar->politicos_id;?>"> 
                    <input type="hidden" id="inputId" name="inputId" value="<?php echo $polpar->id;?>">      
                    <button type="submit" class="btn btn-primary" name="btAlterar">Alterar</button>
                    <button type="submit" class="btn btn-primary" name="btCancelar">Cancelar</button>
                    <br>
                    </div>
                </form>
                        <?php
                    }
                ?>
                <div class="tb">
                        <?php
                        echo('<div class="img">');
                        echo('<img src="imagens/uploads/politicos/'.$politico->foto.'" alt="Foto do usuário" width="200px" margin="10px"/>');
                        echo('</div>');
                        echo('<div class="tb">');
                        echo("<h3>ID</h3>");
                        echo("<h3>Nome</h3>");
                        echo("<h3>Formação</h3>");
                        echo("<h3>Site</h3>");
                        echo("<h2>".$politico->id."</h2>");
                        echo("<h2>".$politico->nome."</h2>");
                        echo("<h2>".$politico->formacao."</h2>");
                        echo("<h2>".$politico->site."</h2>");;
                        echo('</div>');
                        ?>
             </div>
             <div class="dropdown-divider"></div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="d-none d-md-table-cell">ID</th>
                                <th class="d-none d-md-table-cell">Partidos</th>
                                <th>Data Inicial</th>
                                <th class="d-none d-md-table-cell">Data Final</th>
                                <th class="d-none d-md-table-cell">Status</th>
                                <th class="text-center">Ações</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($polspars as $u){ 
                                //para não exibir 0 ou 1
                                if ($u->filiado == 0){
                                    $fili = "Não filiado";
                                }else{
                                    $fili = "Filiado";
                                }
                                
                                ?>
                            <tr>
                                <th class="d-none d-md-table-cell"><?php echo $u->id; ?></th>
                                <th class="d-none d-md-table-cell"><?php echo $u->partidos_nome; ?></th>
                                <td class="d-none d-md-table-cell"><?php echo date('d/m/Y', strtotime($u->dtin));?></td>
                                <td class="d-none d-md-table-cell"><?php 
                                if ($u->dtout == '0000-00-00') echo '----';
                                else echo date('d/m/Y', strtotime($u->dtout)); 
                                ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $fili; ?></td>
                                <td class="text-center">

<a href="politicospartidosAdd.php?id=<?php echo $u->politicos_id; ?>&idpp=<?php echo $u->id; ?>&op=alterar" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-edit"></i></a>
<a href="politicospartidosAdd.php?id=<?php echo $u->politicos_id; ?>&idpp=<?php echo $u->id; ?>&op=excluir" type="button" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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