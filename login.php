<?php

include './config/config.php';

session_start();

error_reporting(0);


if (isset($_SESSION['username'])) {
    header("Location: profile.php");
}



if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$contrasenha = md5($_POST['contrasenha']);
  
  $result = $conexion -> query("select id,nombre,apellidos,email,direccion,telefono, contrasenha, rol_usuario from usuarios where email='$email' and contrasenha='$contrasenha'");
  

	if ($result->num_rows > 0) {
    $row = $result -> fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellidos'] = $row['apellidos'];
		$_SESSION['username'] = $row['email'];
    $_SESSION['direccion'] = $row['direccion'];
    $_SESSION['telefono'] = $row['telefono'];
    $_SESSION['rol_usuario'] = $row['rol_usuario'];
    // echo historico();
 
    if($_SESSION['rol_usuario'] == 1){
      header('Location: admin.php');
    }else if($_SESSION['rol_usuario'] == 2){
      header('Location: profile.php');
    }
	} else {
    ?>
    <div class="alert alert-danger" role="alert">
    UY! Email o contraseña incorrectos!
  </div>
    <?php

	}


}
$hora = date("Y-m-d");
    setcookie("Fecha_inicio_sesion", $hora);
    echo $_COOKIE["Fecha_inicio_sesion"];
?>



<!DOCTYPE html>
<!-- 
    Web fotografía
    Andrea Muñoz Turiel
-->
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <link rel="stylesheet" href="css/solid.min.css" />
  <link rel="stylesheet" href="css/brands.min.css" />
  <link rel="stylesheet" href="css/stylesLogin.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Página Fotografía</title>
</head>

<body>
  <header class="row">

    <div class="col-12 d-none d-lg-flex flex-column p-2">
      <div class="row">
        <div class="col text-center">
          <a href="#">
            <a href="index.php"><img src="images/logo1.png" width="500" style="padding: 20px;" /></a>
          </a>
        </div>
      </div>
    </div>

    <div class="col-12 p-0" style="background-color: #000000;">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Title -->
        <a class="navbar-brand d-lg-none" href="#">
          <!-- TODO: Muy largo para móviles  -->
          <h1 class="font-arizonia" id="NombreMovil">l'occhio del fotografo</h1>
        </a>
        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" id="botonMovil"></span>
        </button>
        <!-- Collapsed Content -->
        <div class="collapse navbar-collapse" id="navbar-content">
          <ul class="navbar-nav mr-auto ml-auto" id="textoNav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php" id="idA">
                INICIO
                <span class="sr-only">(actual)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toogle" data-toggle="dropdown" id="idA">GALERÍA</a>
              <div class="dropdown-menu" id="prueba">
                <a class="dropdown-item" href="GaleriaBodas.php" id="idA">BODAS</a>
                <a class="dropdown-item" href="GaleriaRetratos.php" id="idA">RETRATOS</a>
                <a class="dropdown-item" href="GaleriaPaisajes.php" id="idA">PAISAJES</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php" id="idA"> CONTACTO </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" id="idA"> LOGIN </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <section class="vh-100" style="background-color: #DBEEEE;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 5px;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="images/Paisajes/_MG_99048.jpg" login form" class="img-fluid" style="border-radius: 5px;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia Sesión</h5>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="">Email</label>
                      <input type="email" id="" class="form-control form-control-lg" name="email"  value="<?php echo $email; ?>" required />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="">Contraseña</label>
                      <input type="password" id="" class="form-control form-control-lg" name="contrasenha" value="<?php $_POST['contrasenha']; ?>" required />
                    </div>

                    <div class="pt-1 mb-4">
                      <input class="btn btn-dark btn-lg btn-block" id="botonLogin" type="submit" name="submit" value="Inicio Sesion"></input>
                    </div>
                    <a class="small text-muted" href="#!">He olvidado mi contraseña</a>
                    <p class="mb-5 pb-lg-2" id="linkRegistro"><a href="register.php">¿No tienes cuenta? Registrate aquí</a></a></p>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




</body>
<footer id="footerLogin" class="text-center text-white fixed-bottom">
  <!-- Grid container -->
  <div class="container p-4"></div>
  <!-- Copyright -->
  <div class="text-center p-3">
    © 2022 Copyright:
    <a class="text-white" href="index.html">https://locchiodelfotografo.com</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>