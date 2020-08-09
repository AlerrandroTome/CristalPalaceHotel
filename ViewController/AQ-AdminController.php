<?php
    include_once("../Controllers/AdminController.php");
    $admCont = new AdminController();
    $id = $_GET["id"];
    $action  = $_GET["a"];

    if($action == "1")
    {
        $id_status = $_GET["st"];
        $admCont->alterarStatusQuarto($id, $id_status);
    } 
    else 
    {
        $admCont->excluirQuarto($id);
    }
    header("location: ../Views/AdminQuartos.php");
?>
