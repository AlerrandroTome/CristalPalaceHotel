<?php
  include_once("../Util/Connection.php");
  class PedidoController{
    public $connect;
    public $Valor_total;
    public function __construct()
    {
      $this->connect=new Connection();
    }
    public function valorTotal($valorDiaria,$dataFimEstadia,$dataInicioEstadia){
      $valorDiaria=100;
      $Valor_total = date_diff($dataFimEstadia,$dataInicioEstadia)*$valorDiaria; 
      return $Valor_total;    
    }
    public function formatarData($data){
      $new_data=$data->format('d-m-Y H:i:s');
      return $new_data;
    }
    
    public function cadastrarPedido($dataFimEstadia,$dataInicioEstadia,$dataHoraPedido,$Valor_total,$login,$senha){
     if(date_diff($dataFimEstadia,$dataInicioEstadia) < 0 || $dataInicioEstadia < new DateTime() || $dataFimEstadia < new DateTime()  ){
      header('Location:../Views/Pedido.php');
     }
     else{ $pedido = new Pedido();
     $this->connect->connect();
     $dataHoraPedido = new DateTime();
     $usuario = new LoginController();
     $id_usuario = $usuario->verficaDados($login,$senha);
     $sql = "Insert INTO pedido (Quarto_Id,DataHoraPedido,Cliente_Id,StatusPedido_Id,
     DataInicioEstadia,DataFimEstadia,ValorTotal) VALUES ('1','$dataHoraPedido','$id_usuario','1','$dataInicioEstadia', '$dataFimEstadia','$Valor_total')";
     if (mysqli_query($this->connect->connect(),$sql) === TRUE) {
      echo "success";
    } else {
      echo "Error: " . $this->connect->error;
    }
  }
    }

    public function verPedidosRealizados(){
      $this->connect->connect();
      $sql = "Select * from pedido Where Cliente_Id='1'";
     if ($resultado=mysqli_query($this->connect->connect(),$sql) === TRUE) {
      echo "success";
      return $resultado; 
    } else {
      echo "Error: " . $this->connect->error;
    }


    }
    public function alterarPedido(){

    }
    public function removerPedido(){}
   
  }

?>