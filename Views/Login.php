<?php
    /*include_once("../Util/Connection.php");*/
    include_once("../Controllers/LoginController.php");
    $connect = new Connection();
    $usuario = new Usuario();
    $loginController = new LoginController();
    $login = new LoginModel();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Css/Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>CP | Login</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <input type="text" name="login" value="<?php echo $login->Login ?>">
            <input type="password" name="senha" value="<?php echo $login->Senha ?>">
        </form>
    </div>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $result = $loginController->verficaDados($_POST["login"], $_POST["senha"]);
        if($result == "error_user"){
            $login->L_Login = "Usuário não encontrado.";
        } 
        elseif ($result == "error_senha")
        {
            $login->Login = $_POST["login"];
            $login->L_Senha = "Senha incorreta.";
        } else {
            $loginController->entrar($result);
        }
    }
?>