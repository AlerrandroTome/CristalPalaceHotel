<?php
include_once("../Controllers/PedidoController.php");
include_once("../Controllers/LoginController.php");
include_once("../Controllers/QuartoController.php");
include_once("../Util/UsuarioLogado.php");
$cont = new QuartoController();
$quartos = $cont->quartoDisponivel();
 $login="";
$login= new LoginController();
$login->verificaUsuarioLogado();
$loginController = new LoginController();
$usuarioLogado = new UsuarioLogado(); 
$id_usuario=$_SESSION["usuarioLogado"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    date_default_timezone_set('America/Sao_Paulo');
    $pedidoController = new PedidoController();
    date_default_timezone_set('America/Sao_Paulo');
    $DataHoraPedido = (string)date('d/m/Y H:i:s');
    $ValorDiaria = $cont->localizarQuarto($_POST["Quarto"]);
    $ValorTotal = $pedidoController->valorTotal($ValorDiaria,$_POST["data_fim"],$_POST["data_inicio"]);
    $pedidoController->cadastrarPedido($_POST["Quarto"],$_POST["data_fim"],NULL,$_POST["data_inicio"],$DataHoraPedido,$ValorTotal);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/StylePedido.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source Serif Pro">
    <title>CP | Reserva</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <div class="container text-center p-7 col-6" style="margin-top: 7%;">
    <!--<div class="container-fluid">
        <div class="row mt-2 justify-content-center">
            <div class="col-sm-4 col-lg-4">
                <a class="ml-auto mr-auto col-lg-4 justify-content-center" style="color:black; font-family:Cormorant Garamond; font-size:3.5em"> Cristal Palace</a>
            </div>
        </div>
    </div>
    <nav class="navbar transparent navbar-expand-lg  navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="#navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" style="color:white; font-family:Lora; font-size:18px" href="../Views/Hotel.php">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="color:white; font-family:Lora; font-size:18px" href="#">Meus Pedidos<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="col-4">
                <a style="color: white;font-size:21px ">
                    <?php
                    echo "Seja bem-vindo(a), " . $usuarioLogado->nome;
                    ?>
                    <a href="../ViewController/Sair-Usuario.php" class="h5 text-danger"> / Sair</a>
                </a>
            </div>
        </div>
    </nav>-->
    <div class="container mx-auto" style="width: 500px;">
            <div id="cont" class="container text-center p-5 col-9" style="margin-top: 10%;">
                <div id="texto" class="container mb-4 ">
                    <label for="titulo" style="font-weight:bold;">Período da estadia</label><br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <label for="inicio">Início da estadia</label>
                        <input type="date" name="data_inicio" id="data_inicio">
                        <label for="inicio">Fim da estadia</label><br>
                        <input type="date" name="data_fim" id="data_fim"><br>
                        <label for="quarto">Quarto - Valor Diária</label><br>
                        <select name="Quarto" id="">
                            <?php
                            while ($quarto = $quartos->fetch_array()) {
                            ?>
                                <option value="<?php echo $quarto["Id_quarto"] ?>"><?php echo "" . $quarto["Numero"] . " - " . $quarto["ValorDiaria"] . "" ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input class="button btnPedido" type="submit" value="Próximo">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>