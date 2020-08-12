<?php
    include_once("../Controllers/PedidoController.php");
    $pedidoController = new PedidoController();
    $id = $_GET["id"];
    $data_inicio = $_GET["data_inicio"];
    $data_fim = $_GET["data_fim"];
    $quarto = $_GET["quarto"];

    $pedidoController->alterarPedido($id,$data_inicio,$data_fim,$quarto);
    
    //header("location: ../Views/ListaPedidos.php");
?>
