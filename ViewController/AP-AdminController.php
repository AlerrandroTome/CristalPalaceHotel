<?php
    include_once("../Controllers/AdminController.php");
    $admCont = new AdminController();
    $id = $_GET["id"];
    $action  = $_GET["a"];

    if($action == "1")
    {
        $admCont->confirmarPedido($id);
    } 
    else 
    {
        $admCont->excluirPedido($id);
    }
    header("location: ../Views/AdminPedidos.php");
?>
