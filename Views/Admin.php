<?php
include_once("../Controllers/LoginController.php");
include_once("../Controllers/AdminController.php");
include_once("../Util/UsuarioLogado.php");
$admin = new AdminController();
session_start();
$usuarios = $admin->listarUsuarios();
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
    <title>C.P | Admin</title>
</head>

<body>
    <div class="container row bg-dark w-100" style="min-width: 100vw;">
        shadgfhsad
    </div>
    <div class="container align-content-center row w-100" style="min-width: 100vw; min-height: 100vh;">
        <div class="bg-dark p-3" style="min-height: 100vh;">
            <div>
                <nav class="navbar border-bottom col-11">
                    <a href="#"><span id="nav-admin" class="navbar-brand mb-0 h1">Usuários</span></a>
                </nav>
                <nav class="navbar border-bottom col-11">
                    <a href="AdminQuartos.php"><span id="nav-admin" class="navbar-brand mb-0 h1">Quartos</span></a>
                </nav>
                <nav class="navbar border-bottom col-11">
                    <a href="#"><span id="nav-admin" class="navbar-brand mb-0 h1">Pedidos(Pendentes)</span></a>
                </nav>
                <nav class="navbar border-bottom col-11">
                    <a href="#"><span id="nav-admin" class="navbar-brand mb-0 h1">Pedidos(Todos)</span></a>
                </nav>
            </div>
        </div>

        <div class=" p-3">
            <div class="card-body">
                <h1>Usuários</h1>
                <div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-striped table-responsive" style="width: 100%;">
                                <thead>
                                    <tr role="row" style="width: 100%;">
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Login</th>
                                        <th>Admin</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($usuario = $usuarios->fetch_array()) {
                                    ?>
                                        <tr role="row" class="odd" style="width: 100%;">
                                            <td><?php echo $usuario["Nome"] ?></td>
                                            <td><?php echo $usuario["CPF"] ?></td>
                                            <td><?php echo $usuario["Login"] ?></td>
                                            <td><?php echo $usuario["Admin"] == true ? "Sim" : "Não"; ?></td>
                                            <td>
                                            <?php echo $usuario["Admin"] == true ? "" : "<a class='btn btn-outline-primary font-weight-bold' href='../ViewController/Admin-AdminController.php?id=".$usuario["Id"]."&a=1'>Tornar Admin</a>"; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-danger font-weight-bold" href="../ViewController/Admin-AdminController.php?id=<?php echo $usuario["Id"] ?>&a=2">Excluir</a>
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