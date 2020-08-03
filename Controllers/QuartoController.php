<?php
include_once("../Util/Connection.php");
  class QuartoController{
    public $connect;
    public function __construct()
    {
      $this->connect=new Connection();
    }
    public function quartosDisponiveis(){
        $this->connect->connect();
        $sql="Select * FROM quarto WHERE StatusQuarto_Id='1'";
        if ($resultado=mysqli_query($this->connect->connect(),$sql) === TRUE) {
            echo "success";
            return $resultado;
          } else {
            echo "Error: " . $this->connect->error;
          }
    }
}
?>