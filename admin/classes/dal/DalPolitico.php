<?php

   class DalPolitico{

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

    public function insert($politico){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
        
           // $obj = $this->getPartidoPorSigla($partidos->sigla);
           
            $sql = "insert politicos (id, nome, foto, formacao, facebook, instagram, twitter, youtube, tiktok, linkedin, whatsapp, email, site) values (null, '".$politico->nome."','".$politico->foto."','".$politico->formacao.
            "', '".$politico->facebook."','".$politico->instagram."','".$politico->twitter."','".$politico->youtube.
            "','".$politico->tiktok."','".$politico->linkedin."','".$politico->whatsapp."','".$politico->email."','".$politico->site."')";
            $conn->exec($sql);
            $politico->id=$conn->lastInsertId();
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function update($politico){
        try {
            //tipod do servidor, local e banco de dados
            $server = $this->typeserver.":host=".$this->servername.";dbname=".$this->dbname;
            //cria a conexão com o servidor por meio do usuário informado  
            $conn = new PDO($server, $this->username, $this->password);
            //define como irá tratar o erro
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully <br>"; //conectou
            //inserir um cargo
            $sql = "update politicos set nome = '".$politico->nome."',foto = '".$politico->foto.
            "',formacao = '".$politico->formacao.
            "',facebook = '".$politico->facebook.
            "',instagram = '".$politico->instagram.
            "',twitter = '".$politico->twitter.
            "',youtube = '".$politico->youtube.
            "',tiktok = '".$politico->tiktok.
            "',linkedin = '".$politico->linkedin.
            "',whatsapp = '".$politico->whatsapp.
            "',email = '".$politico->email."'".
            " where id = ".$politico->id;
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
            $sql = "delete from politicos where id = $id";
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
            $sql = "select * from politicos where nome like '%$valor%'";
            //Prepares a statement for execution and returns a statement object
            $stmt  = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelPolitico', ['id','nome','foto','formacao','facebook','instagram','twitter','youtube','tiktok','linkedin','whatsapp','email','site']);
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }

    public function getPolitico($id){
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
            $sql = "select * from politicos where id = $id";
            //Prepares a statement for execution and returns a statement object
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelPolitico', ['id','nome','foto','formacao','facebook','instagram','twitter','youtube','tiktok','linkedin','whatsapp','email','site']);
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $e) {
            echo "<h1>Error: " . $e->getMessage()."</h1>";
        }
    }
}
?>