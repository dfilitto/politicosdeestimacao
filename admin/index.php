<?php 
require_once ("session.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politicodeestimacao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT COUNT(id) as quant FROM usuarios";
    $result = $conn->query($sql);   
    $row = mysqli_fetch_assoc($result);
    $totalUsuarios = $row['quant'];
    
    $sql2 = "SELECT COUNT(id) as quant FROM politicos";
    $result2 = $conn->query($sql2);   
    $row2 = mysqli_fetch_assoc($result2);
    $totalPoliticos = $row2['quant'];
    
    $sql3 = "SELECT COUNT(id) as quant FROM cargos";
    $result3 = $conn->query($sql3);   
    $row3 = mysqli_fetch_assoc($result3);
    $totalCargos = $row3['quant'];
    
    $sql4 = "SELECT COUNT(id) as quant FROM partidos";
    $result4 = $conn->query($sql4);   
    $row4 = mysqli_fetch_assoc($result4);
    $totalPartidos = $row4['quant'];

    
?>

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
   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script language=JavaScript>
  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Titulo", "Números", { role: "style" } ],
        ["Usuarios", <?php echo $totalUsuarios ?>, "green"],
        ["Cargos", <?php echo $totalCargos ?>, "purple"],
        ["Partidos", <?php echo $totalPartidos ?>, "gold"],
        ["Politicos", <?php echo $totalPoliticos ?>, "orange"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Quantidade na base dados",
        width: 920,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }




var cont = 0;
var cont2 = 0;
var cont3 = 0;
var cont4 = 0;

function contador1(x) {
 valor = x;
document.getElementById('tempo1').innerHTML=cont;

	if (cont != valor){
        cont = cont+1;
		setTimeout('contador1(valor)', 135);
    }
    
}

function contador2(x2) {
    valor2 = x2;
document.getElementById('tempo2').innerHTML=cont2;

	if (cont2 != valor2){
        cont2 = cont2+1;
		setTimeout('contador2(valor2)', 170);
    }
   
}
function contador3(x3) {
    valor3 = x3;
document.getElementById('tempo3').innerHTML=cont3;

	if (cont3 != valor3){
        cont3 = cont3+1;
		setTimeout('contador3(valor3)', 170);
    }
   
}
function contador4(x4) {
    valor4 = x4;
document.getElementById('tempo4').innerHTML=cont4;

	if (cont4 != valor4){
        cont4 = cont4+1;
		setTimeout('contador4(valor4)', 270);
    }
   
}
</SCRIPT>
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
                                <h2 class="display-4 text-center"><div id="tempo1"><script>contador1(<?php echo $totalUsuarios; ?>);</script></div></h2>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card bg-purple text-white">
                            <div class="card-body">
                                <div class="row  align-items-center">
                                    <h2>Cargos</h2>
                                    <i class="fas fa-users fa-3x"></i>
                                </div>

                                <div class="dropdown-divider"></div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    <h2 class="display-4 text-center"><div id="tempo2"><script>contador2(<?php echo $totalCargos; ?>);</script></div></h2>
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
                                        <h2>Politicos</h2>
                                    </div>
                                    <div class="col-6">
                                        <i class="far fa-newspaper fa-3x"></i>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        
                                        <h2 class="display-4 text-center"><div id="tempo3"><script>contador3(<?php echo $totalPoliticos; ?>);</script></div></h2>
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
                                        <h2>Partidos</h2>
                                    </div>
                                    <div class="col-6">
                                        <i class="far fa-envelope fa-3x"></i>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="row align-items-center">
                                    <div class="col-12">
     <h2 class="display-4 text-center"><div id="tempo4"><script>contador4(<?php echo $totalPartidos; ?>);</script></div></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>



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