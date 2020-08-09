<?php
include_once("../Controllers/LoginController.php");
include_once("../Controllers/AdminController.php");
include_once("../Util/UsuarioLogado.php");
$admin = new AdminController();
session_start();
$quartos = $admin->listarQuartos();
$usuarioLogado = new UsuarioLogado();
echo $usuarioLogado->nome;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\Css\UtilStyle.css">
    <title>C.P | Quartos</title>
</head>

<body>
    <div class="container row bg-dark w-100" style="min-width: 100vw;">
        shadgfhsad
    </div>
    <div class="container align-content-center row w-100" style="min-width: 100vw; min-height: 100vh;">
        <div class="bg-dark p-3" style="min-height: 100vh;">
            <div>
                <nav class="navbar border-bottom col-11">
                    <a href="Admin.php"><span id="nav-admin" class="navbar-brand mb-0 h1">Usuários</span></a>
                </nav>
                <nav class="navbar border-bottom col-11">
                    <a href="#"><span id="nav-admin" class="navbar-brand mb-0 h1">Quartos</span></a>
                </nav>
                <nav class="navbar border-bottom col-11">
                    <a href="#"><span id="nav-admin" class="navbar-brand mb-0 h1">Pedidos(Pendentes)</span></a>
                </nav>
                <nav class="navbar border-bottom col-11">
                    <a href="AdminPedidos.php"><span id="nav-admin" class="navbar-brand mb-0 h1">Pedidos(Todos)</span></a>
                </nav>
            </div>
        </div>

        <div class="p-3 pl-5 ml-5">
            <div class="card-body">
                <h1>Quartos</h1>
                <div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-striped table-responsive" style="width: 100%;">
                                <thead>
                                    <tr role="row" style="width: 100%;">
                                        <th>Numero</th>
                                        <th>Valor da Diária</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($quartos as $quarto) {
                                    ?>
                                        <tr role="row" class="odd" style="width: 100%;">
                                            <td><?php echo $quarto->Numero ?></td>
                                            <td><?php echo $quarto->valorDiaria ?></td>
                                            <td><?php echo $quarto->Status_Nome ?></td>
                                            <td>
                                                <a class="btn btn-outline-danger font-weight-bold" href="../ViewController/Admin-AdminController.php?id=<?php echo $quarto->Id ?>&a=2">Excluir</a>
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
                <!--end: Datatable-->
            </div>
        </div>
    </div>
</body>

</html>