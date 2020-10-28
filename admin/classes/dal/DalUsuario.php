<?php

   class DalUsuario{

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

    public function insert($usuario){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            $obj = $this->getUsuarioPorEmail($usuario->email);
            if($obj == false){
                $sql = "insert usuarios values (null, '".$usuario->nome."', '".$usuario->foto."', '".$usuario->email.
                "', '".$usuario->senha."')";
                $conn->exec($sql);
                $usuario->id=$conn->lastInsertId();
            }
            else{
               throw new Exception('Já existe um usuário "'.$obj->nome.'" cadastrado com esse e-mail');
            }
            
            //
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function update($usuario){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $obj = $this->getUsuarioPorEmail($usuario->email);
            if($obj == false || $obj->id = $usuario->id){
                $sql = "update usuarios set nome = '".$usuario->nome.
                "', foto = '".$usuario->foto.
                "', email = '".$usuario->email.
                "', senha='".$usuario->senha."' where id = ".$usuario->id;
                $conn->exec($sql);
            }
            else{
               throw new Exception('Já existe um usuário "'.$obj->nome.'" cadastrado com esse e-mail');
            }
           
           
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
            $sql = "delete from usuarios where id = $id";
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
            $sql = "select * from usuarios where nome like '%$valor%'";
            //Prepares a statement for execution and returns a statement object
            $stmt  = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelUsuario', ['id','nome','email','senha','foto']);
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function getUsuario($id){
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
            $sql = "select * from usuarios where id = $id";
            //Prepares a statement for execution and returns a statement object
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelUsuario', ['id','nome','email','foto','senha']);
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function getUsuarioPorEmail($email){
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
            $sql = "select * from usuarios where email = '$email'";
            //Prepares a statement for execution and returns a statement object
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelUsuario', ['id','nome','email','foto','senha']);
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }
}
?>