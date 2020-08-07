<?php
include_once("../Util/UsuarioLogado.php");
class AdminController{
    public $connect;
    public $usuarioLog;

    public function AdminController(){
        $this->connect = new Connection();
        $this->usuarioLog = new UsuarioLogado();
    }

    public function listarUsuarios(){
        $query = "SELECT * FROM usuario WHERE Id = '$this->usuarioLog->id'";
        $usuarios = mysqli_fetch_row(mysqli_query($this->connect->connect(), $query));
        
    }
}
?>