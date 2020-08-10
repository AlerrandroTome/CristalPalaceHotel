<?php
include_once("../Controllers/PedidoController.php");
/*$login="";
  $login= new LoginController();
  $login->verificaUsuarioLogado();*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>C.P | Editar</title>
</head>

<body>
<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
<input type="hidden" name="id" value="">
<label>Data Inicial da Reserva</label><br>
<input type="date" name="data_inicio" id="data_inicio"><br>
<label>Data Final da Reserva</label><br>
<input type="date" name="data_final" id="data_final"><br>

</form>
</body>
</html>