<?php 
    require_once ("session.php");
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $dalPoliticos = new DalPolitico();
        $politicos = $dalPoliticos->getPolitico($id);
    }

    //programar o cadastro final
    if (isset($_POST['btAtualizar']))
    {
        try{
            $dalPoliticos = new DalPolitico(); //criar a dal
            $politicos = $dalPoliticos->getPolitico($_POST['inputId']);

            if(!empty($_FILES[ 'inputFoto' ][ 'name' ])){
                //var_dump($_FILES['inputFoto']); verificar o que acontoce com o upload
                $nomeft = $_FILES[ 'inputFoto' ][ 'name' ];//nome da foto
                $completo = $nomeft . "_" . $data;
                $targetPath = 0;
                $path_parts = pathinfo( $nomeft ); //pega dados da foto
                //Converte para MD5
                $nome_foto_md5 = md5( $completo );
            
                //Agora vai juntar nome em md5 com a extensão
                $nome_final = $nome_foto_md5 . "." . $path_parts[ 'extension' ];
                //Pega o nome do arquivo com ele já modificado
                $targetFile = str_replace( '//', '/', $targetPath ) . $nome_final;
                //pegando o local em que a foto original se encontra
                $temporario = $_FILES[ 'inputFoto' ][ 'tmp_name' ];  
                //indicando para onde vai a foto
                $diretorio = "imagens/uploads/politicos/". $targetFile;
                move_uploaded_file( $temporario, $diretorio );
              }else{
                  //salvar no banco de dados
                  $targetFile = "default.jpg";
              }

            //pegar os dados da tela
            $politicos->id = $_POST['inputId'];
            $politicos->nome = $_POST['inputNome'];
            $politicos->formacao = $_POST['inputFormacao'];
            $politicos->facebook = $_POST['inputFacebook'];
            $politicos->instagram = $_POST['inputInstagram'];
            $politicos->twitter = $_POST['inputTwitter'];
            $politicos->youtube = $_POST['inputYoutube'];
            $politicos->tiktok = $_POST['inputTikTok'];
            $politicos->linkedin = $_POST['inputLinkedin'];
            $politicos->whatsapp = $_POST['inputWhatsapp'];
            $politicos->email = $_POST['inputEmail'];
            $politicos->site = $_POST['inputSite'];
            $politicos->foto = $targetFile;
            //salvar no banco de dados
            $dalPoliticos->update($politicos);
            echo( '<div class="cxnotifica">Registro de código '.$politicos->id.' alterado com sucesso </div>' );
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=politicosList.php'>";
        }
        catch(Exception $erro){
            echo( '<div class="cxnotifica">Error:'.$erro->getMessage().'</div>' );
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=politicosList.php'>";

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
                        <h2 class="display-4 titulo-pagina">Cadastrar Políticos</h2>
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

                    <div class="form-group">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome completo" name="inputNome" value="<?php echo $politicos->nome;?>">
                    </div>

                    <div class="form-group">
                        <label for="inputFoto">Foto</label>
                        <input type="file" class="form-control" id="inputFoto" name="inputFoto" value="<?php echo $politicos->foto;?>">
                    </div>

                    <div class="form-group">
                        <label for="inputNome">Formação</label>
                        <input type="text" class="form-control" id="inputFormacao" placeholder="Formação" name="inputFormacao" value="<?php echo $politicos->formacao;?>">

                        <label for="inputNome">Facebook</label>
                        <input type="text" class="form-control" id="inputFacebook" placeholder="Facebook" name="inputFacebook" value="<?php echo $politicos->facebook;?>">

                        <label for="inputNome">Instagram</label>
                        <input type="text" class="form-control" id="inputInstagram" placeholder="Instagram" name="inputInstagram" value="<?php echo $politicos->instagram;?>">

                        <label for="inputNome">Twitter</label>
                        <input type="text" class="form-control" id="inputTwitter" placeholder="Twitter" name="inputTwitter" value="<?php echo $politicos->twitter;?>">

                        <label for="inputNome">Youtube</label>
                        <input type="text" class="form-control" id="inputYoutube" placeholder="Youtube" name="inputYoutube" value="<?php echo $politicos->youtube;?>">

                        <label for="inputNome">Tik Tok</label>
                        <input type="text" class="form-control" id="inputTikTok" placeholder="Tik Tok" name="inputTikTok" value="<?php echo $politicos->tiktok;?>">

                        <label for="inputNome">Linkdin</label>
                        <input type="text" class="form-control" id="inputLinkedin" placeholder="Linkedin" name="inputLinkedin" value="<?php echo $politicos->linkedin;?>">

                        <label for="inputNome">Whatsapp</label>
                        <input type="text" class="form-control" id="inputWhatsapp" placeholder="Whatsapp" name="inputWhatsapp" value="<?php echo $politicos->whatsapp;?>">

                        <label for="inputNome">E-mail</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="inputEmail" value="<?php echo $politicos->email;?>">

                        <label for="inputNome">Site</label>
                        <input type="text" class="form-control" id="inputSite" placeholder="Site" name="inputSite" value="<?php echo $politicos->site;?>">
                    </div>
                    <input type="hidden" name="inputId" value="<?php echo $politicos->id; ?>" >
                    <button type="submit" class="btn btn-primary" name="btAtualizar">Atualizar</button>
                </form>

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