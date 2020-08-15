<?PHP
include_once("../Controllers/LoginController.php"); 
include_once("../Util/UsuarioLogado.php");
  $login="";
  $login= new LoginController();
  $login->verificaUsuarioLogado();
  session_start();
  $usuarioLogado = new UsuarioLogado();
  $id_usuario=$_SESSION["usuarioLogado"]; 
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant Garamond">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Herr Von Muellerhoff">
  <link rel="stylesheet" type="text/css" href="../Css/HotelStyle.css">
  <title>C.P | Home</title>
</head>

<body> 
  <div class="container-fluid">
    <div class="row mt-3 justify-content-center">
      <div class="col-sm-6 col-lg-3 col-9 justify-content-center">
      <a  class="ml-auto mr-auto" style="color:white; font-family:Cormorant Garamond; font-size:3.5em">  Cristal Palace</a>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg  navbar-light">
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  " id="navbarSupportedContent">
    <ul class="navbar-nav  ml-0 ml-lg-3">
      <li class="nav-item active ml-0 ">
      <a class="nav-link " style="color:white; font-family:Lora; font-size:18px" href="#">Home <span class="sr-only">(current)</span></a>
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
<div style="width: 100%; height: 100%;">
        <div class="d-flex" style="float: left;">

        </div>
        <div id="cont" class="container text-center p-2 col-lg-5 col-12 " style="margin-top: 6%; border-radius: 1rem;">
            <div class="container mb-2 pb-2">
                    Piscina<br>
                    Vista para o mar<br>
                    WI-FI<br>
                    Hospitalidade     
            </div>

            <div class="container pb-2" >
                <a id="btnLogin" href="Pedido.php" class="font-weight-bold">Reservar</a>
            </div>

        </div>
    </div>


</body>

</html>