<?php
    include_once("../Controllers/AdminController.php");
    $admCont = new AdminController();
    $id = $_GET["id"];

    $admCont->excluirQuarto($id);
    
    header("location: ../Views/AdminQuartos.php");
?>
