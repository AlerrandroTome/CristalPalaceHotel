<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../Css/HotelStyle.css">
  <title>C.P | Home</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <div id="top" class="jumbotron" style="margin-bottom:0; height: 150px;">
    <h1>Cristal Palace Hotel</h1>
    <p>A sua melhor escolha em hotéis</p>
  </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand">Cristal Palace Hotel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Minhas informações</a>
        </li>
        <?php if (isset($_Session["reserva"])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Reservas feitas</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Sair</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="d-flex" style="float: left;">

  </div>
  <div id="missao" class="container col-sm-6 justify-content-center p-4 " style="margin-top:2%; height:70vh; width:500vw;margin-left:end">
    <div class="container">
      <h2>Nossa missão</h2><br>

      <img src="../Imagens/Imagem-Missao.png" class="img-fluid" alt="Responsive image" style="position: center;">

      <br><br>
      <p style="font-size:large;">Nossa missão é te proporcionar suas férias dos seus sonhos.<br> Venha passar as suas
        próximas férias conosco!
      </p>
      <br>
    </div>
  </div>

  </div>



</body>

</html>