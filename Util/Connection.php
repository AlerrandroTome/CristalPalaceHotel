<?php
class Connection{
    public $servername;
    public $username_db;
    public $password_db;
    public $dbname;

    public function Connection(){
        $this->servername = "localhost";
        $this->username_db = "root";
        $this->password_db = "";
        $this->dbname = "cphotel";
    }

    public function Connect(){
        return mysqli_connect($this->servername, $this->username_db, $this->password_db, $this->dbname);
    }
}
