<?php
class Usuario{
    public $Id;
    public $CPF;
    public $Nome;
    public $Login;
    public $Senha;
    public $Adm;

    public function Usuario(){
        $this->Id = 0;
        $this->CPF = "";
        $this->Nome = "";
        $this->Login = "";
        $this->Senha = "";
        $this->Adm = ""; 
    }
}
?>