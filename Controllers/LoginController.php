<?php
include_once("../Util/Connection.php");
class LoginController{
    public $connect;

    public function LoginController(){
        $this->connect = new Connection();
    }

    public function formataCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }
    
    public function cadastrarUsuario($nome, $cpf, $login, $senha, $admin){
        $cpf = $this->formataCpf($cpf);
        $query = "SELECT * FROM usuario WHERE nome='$nome' OR CPF='$cpf' OR Login='$login'";
        $cont_results = mysqli_num_rows(mysqli_query($this->connect->connect(), $query));
        if($cont_results == 0){
            mysqli_query($this->connect->connect(),"INSERT INTO usuario (Nome, CPF, Login, 
            Senha, Admin) VALUES ('$nome', '$cpf', '$login', '$senha', '$admin')");
            header("location: Login.php");
        }
        return "usu_cad";
    }

    public function verficaDados($login, $senha)
    {
        $usuario = new Usuario();
        $query = "Select * from usuario where Login = '$login'";
        $usuario = mysqli_fetch_object(mysqli_query($this->connect->connect(),$query));
        if($usuario != null){
            if($usuario->Senha == $senha)
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

    public function entrar($Id_Usuario)
    {
        $usuario = new Usuario();
        $query = "Select * from usuario where Id = '$Id_Usuario'";
        $usuario = mysqli_fetch_object(mysqli_query($this->connect->connect(),$query));
        session_start();
        $_SESSION["usuarioLogado"] = $usuario->Id;
        $_SESSION["usuarioAdmin"] = $usuario->Admin;
        
        session_cache_expire(180);

        if($usuario->Admin){
            header("location: Admin.php");
        } else {
            header("location: Hotel.php");
        }
    }
    public function sair(){
        session_unset();
        session_destroy();
        header("location: ../Views/Home.php");
    }
    public function verificaUsuarioLogado()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            header("location: Home.php");
        }
    }
}
?>