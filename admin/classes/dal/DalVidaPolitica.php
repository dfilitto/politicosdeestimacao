<?php

   class DalVidaPolitica{

    //propriedades privadas
    private $typeserver; 
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($typeserver="", $servername="", $username="", $password="", $dbname=""){  
        if ($typeserver==""){
            $this->typeserver = TYPESERVER; 
            $this->servername = SERVERNAME; 
            $this->username = USERNAME; 
            $this->password = PASSWORD; 
            $this->dbname = DBNAME;
        }     
    }

    public function insert($vidapolitica){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "insert usuarios values (null, '".$vidapolitica->politicos_id."', '".$vidapolitica->atividade."', '".$vidapolitica->descricao."', '".$vidapolitica->atpositiva."')";
            $conn->exec($sql);
            $usuario->id=$conn->lastInsertId();
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function update($vidapolitica){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "update cargos set nome = '".$vidapolitica->atividade."' where id = ".$cargo->id;
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function delete($id){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "delete from vidapolitica where id = $id";
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function search($valor=""){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //inserir um cargo
            $sql = "select * from vidapolitica where nome like '%$valor%'";
            //Prepares a statement for execution and returns a statement object
            $stmt  = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelUsuario', ['id','nome','email','senha','foto']);
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function getVidaPolitica($id){
        //recuper um cargo
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "select * from vidapolitica where id = $id";
            //Prepares a statement for execution and returns a statement object
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelCargo', ['id','nome']);
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }
}
?>