<?php
class Connection{
    public $servername = "localhost";
    public $username_db = "root";
    public $password_db = "";
    public $dbname = "cphotel";

    public function Connect(){
        return mysqli_connect($this->servername, $this->username_db, $this->password_db, $this->dbname);
    }
}
