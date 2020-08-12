<?php
include_once("../Controllers/PedidoController.php");
include_once("../Controllers/LoginController.php");
include_once("../Util/UsuarioLogado.php");
$login = "";
$login = new LoginController();
$login->verificaUsuarioLogado();
$loginController = new LoginController();
$pedidoController = new PedidoController();
$id_usuario = $_SESSION["usuarioLogado"];
$pedido = $pedidoController->verPedidosRealizados($id_usuario);
$usuarioLogado = new UsuarioLogado();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP | Pedidos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\Css\ListaStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cormorant Garamond">
</head>

<body>
    <div class="container-fluid">
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
    </nav>
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="col-sm-4 col-lg-3 mr-auto ml-auto">
                <h1>Meus pedidos</h1>
            </div>
        </div>
    </div>
    <div>
        <div class="row mt-8">
            <div class="col-sm-12 ml-auto mr-auto col-lg-7">
                <table class="table table-hover table-striped table-responsive ml-auto mr-auto" style="margin-left: 10%">
                    <thead>
                        <tr role="row" style="width: 100%;">
                            <th>Quarto</th>
                            <th>Inicio da Estadia</th>
                            <th>Fim da Estadia</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Excluir</th>
                            <th>Alterar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pedido as $pedidos) {
                        ?>
                            <tr role="row" class="odd" style="width: 100%;">
                                <td><?php echo $pedidos->QuartoNumero ?></td>
                                <td><?php echo $pedidoController->formatarData($pedidos->InicioEstadia) ?></td>
                                <td><?php echo $pedidoController->formatarData($pedidos->FimEstadia) ?></td>
                                <td><?php echo $pedidos->Valor?></td>
                                <td><?php echo $pedidos->StatusPedido  ?></td>
                                <td>
                                    <?php
                                    $data_atual = new DateTime();
                                    if ($pedidos->InicioEstadia < $data_atual) :
                                    ?>
                                        <a class="btn btn-outline-danger font-weight-bold" href="../ViewController/ExcluirPedidoViewController.php?id=<?php echo $pedidos->Id ?>&data_inicio=<?php echo $pedidos->InicioEstadia ?>">Excluir</a>
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary font-weight-bold" href="../Views/EditaPedido.php?id=<?php echo $pedidos->Id ?>&data_inicio=<?php echo $pedidos->InicioEstadia ?>&data_fim=<?php echo $pedidos->FimEstadia ?>">Alterar</a>
                                <?php endif; ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>