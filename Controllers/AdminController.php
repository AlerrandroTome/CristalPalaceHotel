<?php
include_once("../Util/UsuarioLogado.php");
include_once("../Models/QuartoModel.php");
include_once("../Models/PedidoModel.php");
class AdminController{
    public $connect;

    public function AdminController(){
        $this->connect = new Connection();
    }

    public function listarUsuarios(){
        $usuarioLog = new UsuarioLogado(); 
        $id_usuLog = $usuarioLog->id;
        $query = "SELECT * FROM usuario WHERE Id != '$id_usuLog'";
        return mysqli_query($this->connect->connect(), $query);
    }

    public function listarQuartos(){
        $quartos = new ArrayObject();
        $query = "SELECT * FROM quarto";
        $quartos_banco = mysqli_query($this->connect->connect(), $query);

        while($quarto = $quartos_banco->fetch_array())
        {
            $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * FROM 
            statusquarto WHERE Id=".$quarto["StatusQuarto_Id"]));
            $quartoModel = new QuartoModel($quarto["Id"], $quarto["Numero"], 
            $quarto["ValorDiaria"], $status->Id, $status->Nome);

            $quartos->append($quartoModel);
        }
        return $quartos;
    }

    public function listarPedidosPendentes(){
        $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * FROM 
        statuspedido = Solicitado"));

        $query = "SELECT * FROM pedido WHERE StatusPedido_Id = '$status->Id'";
        $pedidos = mysqli_query($this->connect->connect(), $query);
        return $pedidos;
    }

    public function listarTodosPedidos(){
        $pedidos = new ArrayObject();
        $query = "SELECT * FROM pedido";
        $pedidos_banco = mysqli_query($this->connect->connect(), $query);

        while ( $pedido = $pedidos_banco->fetch_array()){
            
            $quarto = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
            FROM quarto WHERE Id =".$pedido["Quarto_Id"]));

            $cliente = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
            FROM usuario WHERE Id =".$pedido["Cliente_Id"]));

            $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
            FROM statuspedido WHERE Id =".$pedido["StatusPedido_Id"]));

            $confirmado = $status->Nome == "Confirmado"? true : false;

            $pedidoModel = new PedidoModel($pedido["Id"], $status->Id, $quarto->Numero, 
            $status->Nome, $cliente->Nome, $pedido["DataInicioEstadia"], $pedido["DataFimEstadia"], 
            $pedido["DataHoraPedido"], $pedido["ValorTotal"], $confirmado, $pedido["DataHoraConfirmacao"]);

            $pedidos->append($pedidoModel);
        }
        return $pedidos;
    }

    public function tornarAdmin($id){
        $query = "SELECT * FROM usuario WHERE Id = '$id'";
        $usuario = mysqli_fetch_object(mysqli_query($this->connect->connect(), $query));
        $usuario->Admin = true;
        $query = "UPDATE usuario SET Nome ='$usuario->Nome', CPF = '$usuario->CPF', 
        Login = '$usuario->Login', Senha = '$usuario->Senha', Admin ='$usuario->Admin' 
        WHERE Id = '$usuario->Id'";
        mysqli_query($this->connect->connect(), $query);
    }

    public function excluirUsuario($id){
        $query = "DELETE FROM usuario WHERE Id='$id'";
        mysqli_query($this->connect->connect(), $query);
    }

    public function excluirQuarto($id){
        $query = "DELETE FROM quarto WHERE Id='$id'";
        mysqli_query($this->connect->connect(), $query);
    }

    public function listaStatusQuarto($id){
        return mysqli_query($this->connect->connect(), "SELECT * FROM statusquarto WHERE Id != '$id'");
    }

    public function alterarStatusQuarto($id_quarto, $id_status){
        return mysqli_query($this->connect->connect(), "UPDATE quarto SET StatusQuarto_Id = 
        '$id_status' WHERE Id = '$id_quarto'");
    } 

    public function excluirPedido($id){
        $query = "DELETE FROM pedido WHERE Id='$id'";
        mysqli_query($this->connect->connect(), $query);
    }

    public function confirmarPedido($id){
        date_default_timezone_set('America/Sao_Paulo');
        $dataConfirmacao = (string)date('d/m/Y H:i:s');
        $status = mysqli_fetch_object(mysqli_query($this->connect->connect(), "SELECT * 
        FROM statuspedido WHERE Nome = 'Confirmado'"));

        mysqli_query($this->connect->connect(), "UPDATE pedido SET 
        DataHoraConfirmacao = '$dataConfirmacao', StatusPedido_Id = '$status->Id' WHERE Id = '$id'");
    }
}
?>