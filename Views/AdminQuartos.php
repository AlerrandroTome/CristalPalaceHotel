<?php
include_once("../Controllers/LoginController.php");
include_once("../Controllers/AdminController.php");
include_once("../Util/UsuarioLogado.php");
$admin = new AdminController();
session_start();
$quartos = $admin->listarQuartos();
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
    <title>C.P | Quartos</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="AdminQuartos.php">
                            <h4 class="h4">Quartos</h4>
                        </a>
                    </li>
                    <li class="nav-item">
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
            <h1>Quartos</h1>
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover table-striped table-responsive" style="padding-left: 20%;">
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
                                        <form method="POST" action="../ViewController/AlteraStatus-AdminController.php">
                                            <td>

                                                <input type="hidden" name="id" value="<?php echo $quarto->Id ?>">
                                                <select name="status" class="select form-control">
                                                    <?php
                                                    $status = $admin->listaStatusQuarto($quarto->Status_Id);
                                                    while ($st = $status->fetch_array()) {
                                                    ?>
                                                        <option value="<?php echo $st["Id"] ?>"><?php echo $st["Nome"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-outline-primary font-weight-bold" value="Alterar Status">
                                            </td>
                                        </form>
                                        <td>
                                            <a class="btn btn-outline-danger font-weight-bold" href="../ViewController/AQ-AdminController.php?id=<?php echo $quarto->Id ?>">Excluir</a>
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