<?php
  include_once("../Controllers/PedidoController.php");
  include_once("../Controllers/LoginController.php");
  // $login="";
  //$login= new LoginController();
  //$login->verificaUsuarioLogado();
  //$loginController = new LoginController();
  $pedidoController = new PedidoController();
  $pedido= $pedidoController->verPedidosRealizados();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CP | Pedidos</title>
</head>
<body>
  
</body>
</html>