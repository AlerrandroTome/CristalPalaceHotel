<?php
    //include_once("../Controllers/PedidoController.php");
    //$connect = new Connection();
    //$usuario = new Usuario();
    //$pedidoController = new PedidoController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Css/StylePedido.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>CP | Reserva</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <div  class="container text-center p-7 col-4" style="margin-top: 15%;">
  <div class="container mx-auto" style="width: 200px;">
        <form action="../Views/Quarto.php" method="get">
            <label for="inicio">Início da estadia</label><br>
            <input type="date" name="data_inicio" id="data_inicio"></br>
            <label for="inicio">Fim da estadia</label><br>
            <input type="date" name="data_fim" id="data_fim"><br>
            <input type="submit" id="btnReservar" value="Reservar">
        </form>
  </div>
  </div>
</body>
</html>
