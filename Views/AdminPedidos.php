<?php
include_once("../Controllers/LoginController.php");
include_once("../Controllers/AdminController.php");
include_once("../Util/UsuarioLogado.php");
$admin = new AdminController();
session_start();
$pedidos = $admin->listarTodosPedidos();
$usuarioLogado = new UsuarioLogado();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\Css\UtilStyle.css">
    <title>C.P | Pedidos</title>
</head>

<body>
    <div class="container bg-dark" style="min-width: 100%;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Alternar de navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li id="nav-admin" class="nav-item">
                        <a class="nav-link" href="Admin.php">
                            <h4 class="h4">Usuários</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AdminQuartos.php">
                            <h4 class="h4">Quartos</h4>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="AdminPedidos.php">
                            <h4 class="h4">Pedidos</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <h4 class="h4" style="color: white;">
                <img src="../Imagens/Usuario-Icone.svg" width="10%" height="10%">
                    <?php
                    echo $usuarioLogado->nome;
                    ?>
                    <a href="../ViewController/Sair-AdminController.php" class="h5 text-danger">Sair</a>
                </h4>
            </div>
        </nav>
    </div>
    <div class="container text-center align-content-center" style="min-width: 100%;">
        <div class="container card-body col-10">
            <div>
                <img src="../Imagens/LogoCP-Admin.jpg" width="20%" height="15%">
            </div>
            <h1>Pedidos</h1>
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover table-striped table-responsive" style="margin-left: 10%">
                            <thead>
                                <tr role="row" style="width: 100%;">
                                    <th>Cliente</th>
                                    <th>Quarto</th>
                                    <th>Pedido</th>
                                    <th>Confirmação</th>
                                    <th>Inicio da Estadia</th>
                                    <th>Fim da Estadia</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pedidos as $pedido) {
                                ?>
                                    <tr role="row" class="odd" style="width: 100%;">
                                        <td><?php echo $pedido->ClienteNome ?></td>
                                        <td><?php echo $pedido->QuartoNumero ?></td>
                                        <td><?php echo $pedido->Pedido ?></td>
                                        <td><?php echo $pedido->Confirmacao ?></td>
                                        <td><?php echo $pedido->InicioEstadia ?></td>
                                        <td><?php echo $pedido->FimEstadia ?></td>
                                        <td><?php echo $pedido->Valor ?></td>
                                        <td><?php echo $pedido->StatusNome ?></td>
                                        <td><?php echo $pedido->Confirmado == true ? "" : "<a class='btn btn-outline-primary font-weight-bold' href='../ViewController/AP-AdminController.php?id=" . $pedido->Id . "&a=1'>Confirmar</a>"; ?></td>
                                        <td>
                                            <a class="btn btn-outline-danger font-weight-bold" href="../ViewController/AP-AdminController.php?id=<?php echo $pedido->Id ?>&a=2">Excluir</a>
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
        </div>
    </div>
</body>

</html>