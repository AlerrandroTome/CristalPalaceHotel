<?php
include_once("Connection.php");
class UsuarioLogado{
    public $nome;
    public $id;
    public $login;
    public $admin;

    public function UsuarioLogado(){
        session_start();
        $connect = new Connection();
        $id = (int)$_SESSION["usuarioLogado"];
        $usuario = mysqli_fetch_object(mysqli_query($connect->connect(), "SELECT * FROM usuario WHERE Id = '$id'"));

        $this->nome = $usuario->Nome;
        $this->id = $usuario->Id;
        $this->login = $usuario->Login;
        $this->admin = $usuario->Admin;
    }
}
