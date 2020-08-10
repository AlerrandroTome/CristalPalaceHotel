<?php
include_once("../Controllers/LoginController.php");
$loginController = new LoginController();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	$error_Label = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST["senha"] == $_POST["csenha"]) 
	{
		$result = $loginController->cadastrarUsuario($_POST["nome"], $_POST["cpf"], $_POST["login"], $_POST["senha"], 0);

		if ($result == "usu_cad") {
			$error_Label = "Usuário já cadastrado.";
		}
	} 
	else 
	{
		$error_Label = "As senhas devem ser iguais.";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../Css/UtilStyle.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<title>CP | Cadastro</title>
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

				<div class="login-form login-signup">
					<?php
					if ($error_Label != "") {
						echo '<div id="error_label" class="container p-3 mb-3">
						<h4 class="h4">', $error_Label, '</h4>
					</div>';
					}
					?>
					<form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

						<div class="pb-3">
							<h3 class="font-weight-bolder text-dark">Cadastro</h3>
							<p class="text-muted font-weight-bold">Precisamos de algumas informações para realizar o cadastro</p>
						</div>

						<div class="form-group">
							<input class="form-control" type="text" placeholder="Nome" name="nome" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" placeholder="CPF" name="cpf" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="Email" placeholder="Email" name="login" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" placeholder="Senha" name="senha" autocomplete="off" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" placeholder="Confirme a senha" name="csenha" autocomplete="off" required>
						</div>
						<div class="container pb-3">
							<input type="submit" class="btn btn-primary font-weight-bolder col-4" value="Salvar">
							<a href="Login.php" class="btn btn-outline-danger font-weight-bolder col-4 ml-3">Cancelar</a>
						</div>

						<div></div>
					</form>

				</div>

			</div>

		</div>

	</div>

</body>

</html>