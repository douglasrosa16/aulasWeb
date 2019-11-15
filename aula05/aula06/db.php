<?php


Class Db {

    private $hostname;
    private $user;
    private $password;
    private $database;
    private $con;
    private $connected;


    public function __construct($hostname, $user, $password, $database){
        $this->hostname = $hostname;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connected = false;
    }

    //Conectar ao banco
    public function connect(){
        $this->con = new mysqli($this->hostname, $this->user, $this->password, $this->database);

        if (! $this->con->connect_errno){
            $this->connected = true;
            return true;
        }
        return false;
    }

    //Verificar se está conectado
    public function isConnected(){
        echo "ola";
        return $this->connected;
    }

    //Fechar a conexão
    public function closeConnected(){
        $this->con->close();
        $this->connected = false;
    }
    //Verificar se conseguiu executar o SQL
    public function exec($sql){
        $res = null;
        if ($this->connected){
            $res = $this->con->query($sql);
        }
        return $res;
    }

    public function prepare($sql){
        $stmt = null;
        if ($this->connected){
            $stmt = $this->con->prepare($sql);
        }
        return $stmt;
    }

    public function getlastId(){
        $id = null;
        if ($this->connected){
            $id = $this->con->insert_id;
        }
        return $id;
    }

    public function __destruct(){
        if($this->isConnected()){
            $this->closeConnected();
        }
    }

}






?>