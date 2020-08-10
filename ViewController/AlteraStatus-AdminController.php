<?php
    include_once("../Controllers/AdminController.php");
    $admCont = new AdminController();
    $id = $_POST["id"];
    $status  = $_POST["status"];
    $admCont->alterarStatusQuarto($id, $status);
    header("location: ../Views/AdminQuartos.php");
?>