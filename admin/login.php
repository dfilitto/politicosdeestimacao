<?php 
    require_once ("dadosdaconexao.php");
    require_once ("autoload.php");

    session_start();
    // remove all session variables
    //session_unset();
    // destroy the session
    session_destroy();


    if(isset($_POST["btEntrar"])){
        $email = $_POST["inputEmail"];
        $senha = $_POST["inputSenha"];
        $msg = "";
        $dalUsuario = new DalUsuario();
        $usuario = $dalUsuario->getUsuarioPorEmail($email);
        if($usuario==false){
            //não encontrou o usuario
            $msg = "Erro ao logar: e-mail não encontrado";
        }else{//encontrou o usuario
            //nilo vai fazer alguma coisa
            if ($usuario->senha==$senha){
                //processo de logar
                session_start();
                $_SESSION["id"] = $usuario->id;
                $_SESSION["email"] = $usuario->senha;
                $_SESSION["foto"] = $usuario->foto;
                $_SESSION["nome"] = $usuario->nome;
                header("Location: index.php");
            } else{
                $msg = "Erro ao logar: senha incorreta";
            }
        }
        echo( '<div class="cxnotifica">'.$msg.'</div>' );
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=login.php'>";
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
    <title>Login - Políticos de estimação</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">
    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
     <!-- FontWaesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Custom login css -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <form class="form-signin" method="post" >
        <div class="text-center mb-4">
            <img class="mb-4" src="imagens/sistema/geral/login.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Área Restrita</h1>
            <p>Para ter acesso ao painel, identifique-se!</p>
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" name="inputSenha" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btEntrar" >Entrar</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
    </form>
</body>

</html>