<?php
include_once("Connection.php");
include_once("../Controllers/LoginController.php");

class UsuarioLogado{
    public $nome;
    public $id;
    public $login;
    public $admin;

    public function UsuarioLogado(){
        $connect = new Connection();
        $u = new LoginController();
        $u->verificaUsuarioLogado();

        $id = (int)$_SESSION["usuarioLogado"];
        $usuario = mysqli_fetch_array(mysqli_query($connect->connect(), "SELECT * FROM usuario WHERE Id = '$id'"));

        $this->nome = $usuario["Nome"];
        $this->id = $usuario["Id"];
        $this->login = $usuario["Login"];
        $this->admin = $usuario["Admin"];
        
    }
}
