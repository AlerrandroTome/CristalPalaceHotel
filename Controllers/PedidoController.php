<?php
   session_start();
  include_once("../Util/Connection.php");
  include_once("../Models/ListaPedidoModel.php");
  class PedidoController{
    public $connect;
    public $Valor_total;
    public $DataHoraPedido;
    public $intervalo_dias;
    public function __construct()
    {
      $this->connect=new Connection();
      //$this->DataHoraPedido = new DateTime();
      $this->connect->connect();
    }
    public function valorTotal($valorDiaria,$dataFimEstadia,$dataInicioEstadia){
      $intervalo_dias=0;
      $inicio = new DateTime($dataInicioEstadia);
      $fim = new DateTime($dataFimEstadia);
      $fim=$fim->modify('+1');
      $intervalo = new DateInterval('P1D');
      $periodo = new DatePeriod($inicio, $intervalo ,$fim);
      foreach($periodo as $date){
        $intervalo_dias++;
        }
      $Valor_total = $intervalo_dias*($valorDiaria); 
      return $Valor_total;    
    }
    public function formatarData($data){
      $mudar= explode("-",$data);
      $new_data= "$mudar[2]/$mudar[1]/$mudar[0]";
      return $new_data;
    }
    
    public function cadastrarPedido($quarto_Id,$dataFimEstadia,$dataHoraConfirmacao,$dataInicioEstadia,$DataHoraPedido,$Valor_total){
     if( $dataInicioEstadia>$dataFimEstadia || $dataInicioEstadia<$DataHoraPedido || $dataFimEstadia < $DataHoraPedido){
     }
     else{ 
     $id_usuario = $_SESSION["usuarioLogado"] ;
     $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
     FROM statuspedido WHERE Nome = 'Solicitado'"));
     $sql = "INSERT INTO pedido (Quarto_Id,DataHoraPedido,Cliente_Id,StatusPedido_Id,
     DataInicioEstadia,DataFimEstadia,ValorTotal,DataHoraConfirmacao) VALUES ('$quarto_Id','$DataHoraPedido','$id_usuario','$status->Id','$dataInicioEstadia', '$dataFimEstadia','$Valor_total', NULL)";
     if (mysqli_query($this->connect->connect(),$sql) === TRUE) {
       header("location: ../Views/Hotel.php");
      echo "success";
    } else {
      echo "Error: " . $this->connect->error;
    }
  }
    }

    public function verPedidosRealizados(){
      $pedidos_realizados = new ArrayObject();
      $sql="SELECT * FROM ((pedido INNER JOIN quarto ON quarto.Id = pedido.Quarto_Id) 
      INNER JOIN statuspedido ON statuspedido.Id = pedido.StatusPedido_Id) 
      WHERE Cliente_Id='1' ORDER By pedido.DataHoraPedido DESC";
      $pedidos_banco = mysqli_query($this->connect->connect(), $sql);
      while ($pedido_realizado = $pedidos_banco->fetch_array()) {

        $listapedidoModel = new ListaPedidoModel($pedido_realizado["Id"], $pedido_realizado["Nome"],$pedido_realizado["Numero"], 
         $pedido_realizado["DataInicioEstadia"], $pedido_realizado["DataFimEstadia"], 
        $pedido_realizado["DataHoraPedido"], $pedido_realizado["ValorTotal"], $pedido_realizado["DataHoraConfirmacao"]);

        $pedidos_realizados->append($listapedidoModel);
        }
        return $pedidos_realizados;

    }
      
    public function alterarPedido($pedidoId){
      $sql="UPDATE pedido SET '' = '' WHERE Id='$pedidoId";
      $resultado = mysqli_query($this->connect->connect(), $sql);
    }
    public function removerPedido($pedidoId){
      $sql="DELETE pedido FROM WHERE pedido.Id='$pedidoId'";
    }
   
  }

?>