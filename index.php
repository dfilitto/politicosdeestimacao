<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politicosestimacao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM politicos ORDER BY nome ASC";
$result = $conn->query($sql);

if(isset($_GET['forma'])){
   
    echo( '<div class="cxnotifica">' );
    echo('<div><a href=index.php> Fechar [x] </a> </div>');
    echo( 'Mais detalhes' );
    echo('<p>'. $_GET['forma'].'</p>' );
    echo('<p>'. $_GET['email'].'</p>' );
    echo('<p>'. $_GET['face'].'</p>' );
    echo( ' </div>' );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politicos de Estimação</title>
    <link rel="stylesheet" href="css/folha.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
    <script>
        function mostra(x) {
            name = x;
            return alert("Mais informações...>>>> " + name);
        }
    </script>
</head>

<body>
    <header>
        <div class="logo"><i class="fas fa-person-booth"></i></div>
        <div class="txtlogo">Políticos de Presidente Prudente</div>
        <div class="formlogo">
            <form action="#" method="get" id="formbusca">
                <input type="text" name="buscar" id="buscar" placeholder="Buscar"> 
                <input type="submit" name="buscaok" id="buscaok">
            </form>
        </div>
    </header>
    <nav></nav>
    <main>
        <article>
            <section id="pol">

                <?php while ($row = $result->fetch_assoc()) {
                    $getformacao = $row['formacao']; 
                    $getemail = $row['email'];
                    $getfacebook = $row['facebook'];
                    ?>
                   
                    <div class="cxpol">
                        <div class="ftpol"><a href="index.php?forma=<?php echo $getformacao; ?>&email=<?php echo $getemail; ?>&face=<?php echo $getfacebook; ?>"><img src="images/<?php echo $row["foto"] ?>" alt=""></a></div>
                        <div class="txtpol"><?php echo $row["nome"] ?></div>
                    </div>

                <?php } ?>

            </section>
        </article>
    </main>
    <footer></footer>
</body>

</html>