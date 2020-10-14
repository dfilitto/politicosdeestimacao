<?php

   class DalPartido{

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

    public function insert($partidos){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "insert partidos values (null, '".$partidos->nome."', '".$partidos->sigla."', '".$partidos->site."', '".$partidos->numero."', '".$partidos->descricao."')";
            echo($sql);
            var_dump($partidos);
            $conn->exec($sql);
            $partidos->id=$conn->lastInsertId();

        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function update($partidos){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "update partidos set nome = '".$partidos->nome.
            "', sigla = '".$partidos->sigla.
            "', site = '".$partidos->site.
            "', numero='".$partidos->numero."', descricao='".$partidos->descricao."' where id = ".$partidos->id;
            //echo($sql);
            //var_dump($partidos);
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
            $sql = "delete from partidos where id = $id";
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
            $sql = "select * from partidos where nome like '%$valor%'";
            //Prepares a statement for execution and returns a statement object
            $stmt  = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelPartido', ['id','nome','sigla','site','numero','descricao']);
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function getPartidos($id){
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
            $sql = "select * from partidos where id = $id";
            //Prepares a statement for execution and returns a statement object
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelPartido', ['id','nome','sigla','site','numero','descricao']);
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }
}
?>