<?php
    include_once("../Controllers/AdminController.php");
    $admCont = new AdminController();
    $id = $_GET["id"];
    $action = $_GET["a"];
    if($action == "1"){
        $admCont->tornarAdmin($id);
    } 
    else{
        $admCont->excluirUsuario($id);
    }
    header("location: ../Views/Admin.php");
?>
