<?php
include_once("../Util/Connection.php");
class QuartoController
{
  public $connect;
  public function __construct()
  {
    $this->connect = new Connection();
  }
  public function localizarQuarto($Id)
  {
    $connect = $this->connect->connect();
    $Diaria = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
    FROM quarto WHERE Id = '$Id'"));
    $diaria=$Diaria->ValorDiaria;
    return $diaria;
  }
  public function quartoDisponivel()
  {
    $connect = $this->connect->connect();
    $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
    FROM statusquarto WHERE Nome = 'Livre'"));
    $query = "SELECT * from quarto where StatusQuarto_Id = '$status->Id'";
    $pedidos = mysqli_query($this->connect->connect(), $query);
    return $pedidos;
  }
}
