<?php
include_once("../Util/Connection.php");
class QuartoController
{
  public $connect;
  public function __construct()
  {
    $this->connect = new Connection();
  }
  /*public function quartosDisponiveis(){
        $this->connect->connect();
        $sql="Select * FROM quarto WHERE StatusQuarto_Id='1'";
        $resultado = mysqli_query($this->connect->connect(), $sql);
        while ($quarto_disponivel = mysqli_fetch_assoc($resultado)) {
        return "Número do quarto: " .$quarto_disponivel["Numero"]."<br>".
        "Valor da diária: ".$quarto_disponivel["ValorDiaria"]."<br>";
    }*/

  /*public function quartoDisponivel($dataInicioEstadia,$dataFimEstadia){
      $cont=0;
      $inicio = new DateTime($dataInicioEstadia);
      $fim = new DateTime($dataFimEstadia);
      $fim=$fim->modify('+1');
      $intervalo = new DateInterval('P1D');
      $periodo = new DatePeriod($inicio, $intervalo ,$fim);
      $sql = "SELECT * FROM pedido WHERE DataHoraConfirmacao != null";
      $resultado = mysqli_query($this->connect->connect(), $sql);
      while ($quarto_disponivel = mysqli_fetch_assoc($resultado)) {
          $inicio_registrado = new DateTime(strtotime($quarto_disponivel["DataInicioEstadia"]));
          $fim_registrado = new DateTime(strtotime($quarto_disponivel["DataFimEstadia"]));
          $fim_registrado=$fim_registrado->modify('+1');
          $intervalo_registrado = new DateInterval('P1D');
          $periodo_registrado = new DatePeriod($inicio_registrado, $intervalo_registrado ,$fim_registrado);
          foreach($periodo as $date){
            foreach($periodo_registrado as $date){
          if($periodo==$periodo_registrado){
            $cont++;
          }
          if($cont==0){
            return "<option value='".$quarto_disponivel['Quarto_Id']."'>".$quarto_disponivel['Numero']."</option>";
          
          }
        }
      }
      }*/
  public function localizarQuarto($Id)
  {
    $connect = $this->connect->connect();
    $resultado = mysqli_fetch_assoc(mysqli_query($this->connect->connect(), "SELECT ValorDiaria 
    FROM quarto WHERE Id = '$Id'"));
    $Diaria = $resultado["ValorDiaria"];
    return $Diaria;
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
