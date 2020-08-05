<?php
    class LoginModel{
        public $Login;
        public $Senha;
        public $L_Login;
        public $L_Senha;

        public function LoginModel(string $login, string  $senha, string  $Llogin, string  $Lsenha){
            $this->Login = $login;
            $this->Senha = $senha;
            $this->L_Login = $Llogin;
            $this->L_Senha = $Lsenha;
        }
    }
?>