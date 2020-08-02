<?php
include_once("../Util/Connection.php");
class LoginController{
    public $connect = new Connection();

    public function verficaDados($login, $senha){
        $usuario = new Usuario();
        $this->connect->connect();
        $query = "Select * from usuario where login = '$login'";
        $usuario = mysqli_fetch_object(mysqli_query($this->connect->connect(),$query));
        if($usuario != null){
            if($usuario->Senha)
            {
                return $usuario->Id;
            } 
            else
            {
                return "error_senha";
            }
        } 
        else 
        {
            return "error_user";
        }
    }

    public function entrar($Id_Usuario){

    }
}
?>