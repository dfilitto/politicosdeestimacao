<?php 
    require_once ("session.php");
    //pegar hora do sistema do navegador do usuário
    $timezone = new DateTimeZone('America/Sao_Paulo');
    date_default_timezone_set('UTC');
    setlocale(LC_ALL, NULL);
    setlocale(LC_ALL, 'pt_BR');
    $data = date('Y-m-d-H:i:s');
    //echo $data;
    //programar o cadastro
    if (isset($_POST['btCadastrar']))
    {
        try{
          if(!empty($_FILES[ 'inputFoto' ][ 'name' ])){
            $nomeft = $_FILES[ 'inputFoto' ][ 'name' ];
            $completo = $nomeft . "_" . $data;
            $targetPath = 0;
            $path_parts = pathinfo( $nomeft );
        
            //Converte para MD5
            $nome_foto_md5 = md5( $completo );
        
            //Agora vai juntar nome em md5 com a extensão
            $nome_final = $nome_foto_md5 . "." . $path_parts[ 'extension' ];
        
            //Pega o nome do arquivo com ele já modificado
            $targetFile = str_replace( '//', '/', $targetPath ) . $nome_final;
            $temporario = $_FILES[ 'inputFoto' ][ 'tmp_name' ];
            $diretorio = "imagens/upload/". $targetFile;
            move_uploaded_file( $temporario, $diretorio );
          }else{
              $targetFile = "default.png";
          }

            //pegar os dados da tela
            $usuario = new ModelUsuario();
            $usuario->id = 0;
            $usuario->nome = $_POST['inputNome'];
            $usuario->email = $_POST['inputEmail'];
            $usuario->senha = $_POST['inputPassword'];
            $usuario->foto = $targetFile;  

            //salvar no banco de dados
            $dalUsuario = new DalUsuario();
            $dalUsuario->insert($usuario);
            //validar e-mail
            echo( '<div class="cxnotifica">Registro de código '.$usuario->id.' inserido com sucesso </div>' );
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=usuariosList.php'>";
            //falta falar o resultado da operação
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
                        <h2 class="display-4 titulo-pagina">Cadastrar Usuário</h2>
                    </div>
                    <a href="usuariosList.php">
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
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="inputEmail">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="inputPassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome completo" name="inputNome">
                    </div>
                    <div class="form-group">
                        <label for="inputFoto">Foto</label>
                        <input type="file" class="form-control" id="inputFoto" name="inputFoto" >
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