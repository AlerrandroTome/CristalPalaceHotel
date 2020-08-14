<?php
include_once("../Controllers/PedidoController.php");
include_once("../Controllers/QuartoController.php");
include_once("../Util/UsuarioLogado.php");
$login="";
$login= new LoginController();
$login->verificaUsuarioLogado();
$pedido_Id=$_GET["id"];
$data_inicio=$_GET["data_inicio"];
$data_fim=$_GET["data_fim"];
$pedidoController = new PedidoController();
$pedidos = $pedidoController->verUmPedido($pedido_Id);
$cont = new QuartoController();
$quartos = $cont->quartoDisponivel();
$usuarioLogado = new UsuarioLogado();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../Css/StyleEditar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source Serif Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant Garamond">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>C.P | Editar</title>
</head>

<body>
<div class="container-fluid">
    <div class="row mt-lg-3 mt-0 justify-content-center">
      <div class="col-sm-6 col-lg-4 col-10 text-center justify-content-center">
      <a  class="ml-auto mr-auto justify-content-center" style="color:white; font-family:Cormorant Garamond; font-size:3.5em">  Cristal Palace</a>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg  navbar-light">
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  " id="navbarSupportedContent">
    <ul class="navbar-nav  ml-0">
      <li class="nav-item active ml-0 ">
      <a class="nav-link " style="color:white; font-family:Lora; font-size:18px" href="../Views/Hotel.php">Home</a>
      </li>
      <li class="nav-item ml-0 ">
      <a class="nav-link" style="color:white; font-family:Lora; font-size:18px" href="../Views/ListaPedidos.php">Meus Pedidos</a>
      </li>
      </ul>  
      <div class="col-10 text-right">
                <a class="h4 " style="color: white;font-size:21px ">
                    <?php
                    echo "Seja bem-vindo(a), " .$usuarioLogado->nome;
                    ?>
                    <a href="../ViewController/Sair-Usuario.php" class="h5 text-danger"> / Sair</a>
                 </a>
            </div>      
     </div>         
</nav>
  
<div class="container-fluid mx-auto col-lg-6 justify-content-center " style="margin-top:3.4em">
            <div id="cont" class="container-fluid text-center p-lg-2 col-9 justify-content-center">
                <div id="texto" class="container-fluid mb-8 justify-content-center">
          <form class="form" action="../ViewController/EditarPedidoViewController.php" method="GET">
          <label style="font-size:30px">Pedido </label></br>    
          <input type="hidden" id="id" name="id" value="<?php echo $pedido_Id ?>">
              <label>Data Inicial da Reserva</label><br>
              <input type="date" name="data_inicio" id="data_inicio" value="<?php echo $data_inicio ?>"></input><br>
              <label>Data Final da Reserva</label><br>
              <input type="date" name="data_fim" id="data_inicio" value="<?php echo $data_fim ?>"><br>
              <label>Quarto - Valor Diária</label><br>
              <select name="quarto" id="">
              <?php foreach ($pedidos as $pedido) {?>
                <option value="<?php echo $pedido->IdQuarto ?>"><?php echo "" . $pedido->QuartoNumero . " - " . $cont->localizarQuarto($pedido->IdQuarto) . "" ?></option>
                <?php
                while ($quarto = $quartos->fetch_array()) {
                  (int) $quarto_recebido = $quarto["Id_quarto"];
                  (int) $quarto_alterar = $pedido->IdQuarto;
                  if ($quarto_recebido == $quarto_alterar) {
                  } else { ?>
                    <option value="<?php echo $quarto["Id_quarto"] ?>"><?php echo "" . $quarto["Numero"] . " - " . $quarto["ValorDiaria"] . "" ?></option>
                <?php
                  }
                }
                ?>
              </select>
              <br><input class="button btnPedido" style="margin-top:0.8em" type="submit" value="Alterar"></input>
            <?php } ?>
        </div>
      </div>
    </div>
    </form>
</body>

</html>