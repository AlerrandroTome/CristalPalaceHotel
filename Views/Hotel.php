<?PHP
include_once("../Controllers/LoginController.php"); 
include_once("../Util/UsuarioLogado.php");
$usuarioLogado = new UsuarioLogado();
$login="";
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Herr Von Muellerhoff">
  <link rel="stylesheet" type="text/css" href="../Css/HotelStyle.css">
  <title>C.P | Home</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant Garamond">
  
  <nav class="navbar transparent navbar-expand-lg  navbar">
  <a class="navbar-brand ml-auto mr-auto" href="#" style="color:white; font-family:Herr Von Muellerhoff; font-size:2.95em">  Cristal Palace</a>
</nav>
<div style="width: 100%; height: 100%;">
        <div class="d-flex" style="float: left;">

        </div>
        <div id="cont" class="container text-center p-2 col-5" style="margin-top: 8%; border-radius: 1rem;">
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