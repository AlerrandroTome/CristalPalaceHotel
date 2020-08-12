<?php
    include_once("../Controllers/PedidoController.php");
    $pedidoController = new PedidoController();
    $id = $_GET["id"];
    $data_inicio = $_GET["data_inicio"];

    $pedidoController->removerPedido($id,$data_inicio);
    
    header("location: ../Views/ListaPedidos.php");
?>
