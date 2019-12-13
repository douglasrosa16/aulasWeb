<?php

class Db {
    
    private $host;
    private $user;
    private $passwd;
    private $db;
    private $mysqli;
    private $connected;

    public function __construct($host, $user, $passwd, $db) {
        $this->host   = $host;
        $this->user   = $user;
        $this->passwd = $passwd;
        $this->db     = $db;
        $this->connected = false;
    }
    public function __destruct() {
        if ($this->connected) 
            $this->mysqli->close();
    }
    
    public function connect() {
        $this->mysqli = new mysqli($this->host, 
                                   $this->user,
                                   $this->passwd,
                                   $this->db);
        if ($this->mysqli->connect_errno) {
            return false;
        }
        $this->connected = true;
        return true;
    }

    public function execute($sql) {
        $res = false;
        if ($this->connected) {
            $res = $this->mysqli->query($sql);
        }        
        return $res;            
    }

    public function query($sql) {
        $res = NULL;
        if ($this->connected) {
            $res = $this->mysqli->query($sql);
        }        
        return $res;            
    }
    
    public function prepare($sql) {
        return $this->mysqli->prepare($sql);
    }
    
    public function isConnected() {
        return $this->connected;
    }

    public function getLastID() {
        return $this->mysqli->insert_id;
    }

};

?>
