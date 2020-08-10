<?php
include_once("../Controllers/PedidoController.php");
include_once("../Controllers/LoginController.php");
include_once("../Controllers/QuartoController.php");
include_once("../Util/UsuarioLogado.php");
$usuarioLogado = new UsuarioLogado();
$cont = new QuartoController();
$quartos = $cont->quartoDisponivel();

if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant Garamond">
    <title>CP | Reserva</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <div class="container text-center p-7 col-6" style="margin-top: 7%;">
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
                                <option value="<?php echo $quarto["Id"] ?>"><?php echo "" . $quarto["Numero"] . " - " . $quarto["ValorDiaria"] . "" ?></option>
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