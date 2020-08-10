<?php
include_once("../Controllers/LoginController.php");
include_once("../Entities/Usuario.php");
include_once("../Models/LoginModel.php");

$loginController = new LoginController();
if ($_SERVER["REQUEST_METHOD"] != "POST"){
    $usuario = new Usuario();
    $login_Label = "";
    $senha_Label = "";
    $login = new LoginModel("", "", "", "");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $result = $loginController->verficaDados($_POST["login"], $_POST["senha"]);
    
    if ($result == "error_user") {
        $login = new LoginModel($_POST["login"], $_POST["senha"], "Usuário não encontrado.", "");
    } 
    elseif ($result == "error_senha") 
    {
        $login = new LoginModel($_POST["login"], $_POST["senha"], "", "Senha Incorreta.");
    } 
    else 
    {
        $loginController->entrar($result);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>CP | Login</title>
</head>

<body>
    <div class="container row bg-white col-12" style="width: 100vw; height: 100vh;">
        <div id="banner_login" class="col-6" style="background: url('../Imagens/login-faixa.jpg') no-repeat left center;
        background-size: 110% 100%">
        </div>
        <div id="form-class" class="col-6">
            <div class="container">
                <div class="container text-center">
                    <img src="../Imagens/Logo-CP.jpg" alt="" width="40%" height="40%">
                </div>
                <div class="container">
                    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="pb-3 pt-lg-0">
                            <h3 class="font-weight-bolder text-dark">Bem Vindo!</h3>
                            <span class="text-muted font-weight-bold">Novo Aqui?
                                <a href="CadastroUsuario.php" class="text-primary font-weight-bolder">Crie uma Conta</a></span>
                            </div>

                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Login</label>
                            <input class="form-control rounded-lg" type="text" name="login" autocomplete="off"
                            value="<?php echo $login->Login ?>">
                            <div class="text-danger"><?php echo $login->L_Login ?></div>
                        </div>
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Senha</label>
                            <input class="form-control rounded-lg" type="password" name="senha" autocomplete="off"
                            value="<?php echo $login->Senha ?>">
                            <div class="text-danger"><?php echo $login->L_Senha ?></div>
                        </div>
                        <div class="pb-lg-0 pb-5">
                            <input type="Submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 my-3 mr-3 w-100" value="Login">
                        </div>
                        <input type="hidden">
                        <div></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

