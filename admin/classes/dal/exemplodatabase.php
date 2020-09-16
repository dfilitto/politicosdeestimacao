<?php
/*
//MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politicodeestimacao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

// Executar qualquer comando no banco de dados
//$sql = "insert int usuarios values (null, 'Danilo Filitto','','danilo.filitto@gmail.com','123456')";
//if ($conn->query($sql) === TRUE) {
//  echo "Command successfully";
//} else {
//  echo "Command error: " . $conn->error;
//}

//trazer dados do banco
$sql = "SELECT * FROM cargos order by nome";
$result = $conn->query($sql);
if ($result->num_rows > 0) {       
      // saida de dados e quanto houver      
      while($row = $result->fetch_assoc()) {        
        echo "<div class=caixa> id: " . $row["id"]. " - Nome: " . $row["nome"]." </div>";      
      }    
    } else {      
      echo "nenhuma registro encontrado";    
}

$conn->close();
*/


//PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "politicodeestimacao";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully <br>";
  // use exec() because no results are returned
  //$sql = "insert int0 usuarios values (null, 'Admin','','contato@dfilitto.com','123456')";
  //$conn->exec($sql);
  $sql = "SELECT * FROM cargos order by nome";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  
  var_dump($result);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage()."<br>";
}


?>