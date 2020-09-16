<?php
   include_once ("dadosconexao.php");
   include_once ("../model/ClasseBase.php");
   include_once ("../model/ModelCargo.php");

   class DalCargo{
    
    private $conn; //minha conexão

    public function __construct(){  
        try {
           
            $typeserver = TYPESERVER;
            $servername = SERVERNAME;
            $username = USERNAME;
            $password = PASSWORD;
            $dbname = DBNAME;

            $this->conn = new PDO("$typeserver:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully <br>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage()."<br>";
        }
    }

    public function insert($cargo){
        //inserir um cargo
        $sql = "insert cargos values (null, '".$cargo->get_nome()."')";
        $this->conn->exec($sql);
        //$this->conn->close();
    }

    public function update(){
        //atualizar um cargo
    }

    public function delete(){
        //deletar um cargo
    }

    public function search(){
        //procurar vários cargos
    }

    public function get_cargo($id){
        //recuper um cargo
    }

    
    


   }
?>