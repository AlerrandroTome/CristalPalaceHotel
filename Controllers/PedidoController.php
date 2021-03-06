<?php
session_start();
include_once("../Util/Connection.php");
include_once("../Models/ListaPedidoModel.php");
include_once("../Controllers/QuartoController.php");
class PedidoController
{
  public $connect;
  public $Valor_total;
  public $DataHoraPedido;
  public $intervalo_dias;
  public function __construct()
  {
    $this->connect = new Connection();
    $this->connect->connect();
  }
  public function valorTotal($valorDiaria, $dataFimEstadia, $dataInicioEstadia)
  {
    $intervalo_dias = 0;
    $inicio = new DateTime($dataInicioEstadia);
    $fim = new DateTime($dataFimEstadia);
    $fim = $fim->modify('+1');
    $intervalo = new DateInterval('P1D');
    $periodo = new DatePeriod($inicio, $intervalo, $fim);
    foreach ($periodo as $date) {
      $intervalo_dias++;
    }
    $Valor_total = $intervalo_dias * ($valorDiaria);
    return $Valor_total;
  }
  public function formatarData($data)
  {
    $mudar = explode("-", $data);
    $new_data = "$mudar[2]/$mudar[1]/$mudar[0]";
    return $new_data;
  }

  public function cadastrarPedido($id_usuario, $quarto_Id, $dataFimEstadia, $dataHoraConfirmacao, $dataInicioEstadia, $DataHoraPedido, $Valor_total)
  {
    if ($dataInicioEstadia > $dataFimEstadia || $dataInicioEstadia < $DataHoraPedido || $dataFimEstadia < $DataHoraPedido) {
    } else {
      $id_usuario = $_SESSION["usuarioLogado"];
      $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
     FROM statuspedido WHERE Nome = 'Solicitado'"));
      $sql = "INSERT INTO pedido (Quarto_Id, DataHoraPedido, Cliente_Id, StatusPedido_Id,
     DataInicioEstadia, DataFimEstadia, ValorTotal, DataHoraConfirmacao) VALUES ('$quarto_Id','$DataHoraPedido','$id_usuario','$status->Id','$dataInicioEstadia', '$dataFimEstadia', '$Valor_total', NULL)";
      if (mysqli_query($this->connect->connect(), $sql) === TRUE) {
        header("location: ../Views/Pedido.php");
        echo "success";
      } else {
        echo "Error: " . $this->connect->error;
      }
    }
  }

  public function verUmPedido($Id)
  {
    $pedido = new ArrayObject();
    $sql = "SELECT * FROM ((pedido INNER JOIN quarto ON quarto.Id = pedido.Quarto_Id) 
      INNER JOIN statuspedido ON statuspedido.Id = pedido.StatusPedido_Id)
      WHERE pedido.Id='$Id' ORDER By pedido.DataHoraPedido DESC";
    $query = mysqli_query($this->connect->connect(), $sql);
    $pedido_banco = $query->fetch_array();
    $listapedidoModel = new ListaPedidoModel(
      $pedido_banco["Quarto_Id"],
      $pedido_banco["Id"],
      $pedido_banco["Nome"],
      $pedido_banco["Numero"],
      $pedido_banco["DataInicioEstadia"],
      $pedido_banco["DataFimEstadia"],
      $pedido_banco["DataHoraPedido"],
      $pedido_banco["ValorTotal"],
      $pedido_banco["DataHoraConfirmacao"]
    );
    $pedido->append($listapedidoModel);
    return $pedido;
  }

  public function verPedidosRealizados($id_usuario)
  {
    $pedidos_realizados = new ArrayObject();
    $sql = "SELECT * FROM pedido WHERE Cliente_Id='$id_usuario' ORDER By pedido.DataHoraPedido DESC";
    $pedidos_banco = mysqli_query($this->connect->connect(), $sql);
    while ($pedido_realizado = $pedidos_banco->fetch_array()) {
      $quarto = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
            FROM quarto WHERE Id =" . $pedido_realizado["Quarto_Id"]));

      $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
            FROM statuspedido WHERE Id =" . $pedido_realizado["StatusPedido_Id"]));

      $listapedidoModel = new ListaPedidoModel(
        $quarto->Id,
        $pedido_realizado["Id"],
        $status->Nome,
        $quarto->Numero,
        $pedido_realizado["DataInicioEstadia"],
        $pedido_realizado["DataFimEstadia"],
        $pedido_realizado["DataHoraPedido"],
        $pedido_realizado["ValorTotal"],
        $pedido_realizado["DataHoraConfirmacao"]
      );

      $pedidos_realizados->append($listapedidoModel);
    }
    return $pedidos_realizados;
  }

  public function alterarPedido($pedidoId, $dataInicioEstadia, $dataFimEstadia, $quarto_Id)
  {
    $diaria = new QuartoController();
    $diaria = $diaria->localizarQuarto($quarto_Id);
    $Valor_total = $this->valorTotal($diaria, $dataFimEstadia, $dataInicioEstadia);
    $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
      FROM statuspedido WHERE Nome = 'Solicitado'"));
    echo $status->Id;
    echo $dataInicioEstadia;
    echo $dataFimEstadia;
    echo $Valor_total;
    echo $quarto_Id;
    $sql = "UPDATE pedido SET StatusPedido_Id = '$status->Id', DataInicioEstadia='$dataInicioEstadia',
      DataFimEstadia='$dataFimEstadia', ValorTotal='$Valor_total', Quarto_Id ='$quarto_Id', Alteracao = 1
      WHERE Id='$pedidoId'";
    if (mysqli_query($this->connect->connect(), $sql) === TRUE) {
      header("location: ../Views/ListaPedidos.php");
      echo "success";
    } else {
      echo "Error: " . $this->connect->error;
    }
  }

  public function removerPedido($pedidoId, $dataInicioEstadia)
  {
    $data_atual = new DateTime();
    if ($dataInicioEstadia < $data_atual) {
      $sql = "DELETE FROM pedido WHERE pedido.Id='$pedidoId'";
      mysqli_query($this->connect->connect(), $sql);
    }
  }
}
