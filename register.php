<?php

include './config/config.php';
include 'correo.php';

error_reporting(0);

session_start();

if(isset($_SESSION['username'])){
  header("Location: login.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $contrasenha  = md5($_POST['contrasenha']);
  $contrasenha2 = md5($_POST['contrasenha2']);
  $rol_usuario = 2;
  


  if ($contrasenha == $contrasenha2) {
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    
    if ($result = $conexion -> query("INSERT INTO usuarios (NOMBRE, APELLIDOS, EMAIL, DIRECCION, TELEFONO, CONTRASENHA, ROL_USUARIO )
    VALUES ('$username' ,'$apellidos', '$email' , '$direccion', '$telefono' , '$contrasenha', '$rol_usuario')")){
      echo "<script>alert('Proceso de Registro Completado Correctamente!!!!')</script>";
        header('Location: profile.php');
      
        $_SESSION['name'] = $username;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['apellidos'] = $apellidos;
        $_SESSION['direccion'] = $direccion;
        $_POST['contrasenha'] = "";
        $_POST['contrasenha2'] = "";
        $correo = $email;
        //$_SESSION['rol_usuario'] = $rol_usuario;
        enviar_correo_registro($correo);
    } else {
      echo "<script>alert('El email y/o numero de telefono ya fue registrado')</script>";
    }
  } else {
    echo "<script>alert('Las contraseñas no coinciden')</script>";
  }
}
?>


<!DOCTYPE html>
<!-- 
    Web fotografía
    Andrea Muñoz Turiel
-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <link rel="stylesheet" href="css/solid.min.css" />
  <link rel="stylesheet" href="css/brands.min.css" />
  <link rel="stylesheet" href="css/stylesRegistro.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Página Fotografía</title>
</head>

<body>
  <header class="row">
    <!-- Previus -->
    <div class="col-12 d-none d-lg-flex flex-column p-2">
      <div class="row">
        <div class="col text-center">
          <a href="#">
            <a href="index.php"><img src="images/logo1.png" width="500" style="padding: 20px;" /></a>
          </a>
        </div>
      </div>
    </div>

    <div class="col-12 p-0" style="background-color: black;">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Title -->
        <a class="navbar-brand d-lg-none" href="#">
          <!-- TODO: Muy largo para móviles ?? -->
          <h1 class="font-arizonia" id="NombreMovil">l'occhio del fotografo</h1>
        </a>
        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" id="iconMovil"></span>
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
              <div class="dropdown-menu" id="colorDesplegable">
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


  <section class="vh-100" style="background-color: #e6cfc6">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 5px;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="images/Paisajes/basura.png" login form" class="img-fluid" style="border-radius: 5px;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="" method="POST">
                    <h3 class="fw-normal mb-3 pv-6" style="text-align: center; font-weight: bolder;">
                      Registro</h3>
                    <div class="form-outline mb-4">
                      <label class="form-label">Nombre</label>
                      <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $username; ?>" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label">Apellidos</label>
                      <input type="text" class="form-control form-control-lg" name="apellidos" value="<?php echo $apellidos; ?>" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control form-control-lg" name="email" value="<?php echo $email; ?>" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label">Teléfono</label>
                      <input type="tel" class="form-control form-control-lg" name="telefono" value="<?php echo $telefono; ?>" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label">Dirección</label>
                      <input type="text" class="form-control form-control-lg" name="direccion" value="<?php echo $direccion; ?>" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label">Contraseña</label>
                      <input type="password" class="form-control form-control-lg" name="contrasenha" value="<?php echo $_POST['contrasenha']; ?>" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label">Repite la contraseña</label>
                      <input type="password" class="form-control form-control-lg" name="contrasenha2" value="<?php echo $_POST['contrasenha2']; ?>" required />
                    </div>
                    <div class="pt-1 mb-4">
                      <input class="btn btn-info btn-lg btn-block" type="submit" name="submit" id="botonRegistro" value="Registrarse"></input>
                    </div>
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
<footer id="footerRegistro" class="text-center text-white fixed-bottom">
  <!-- Grid container -->
  <div class="container p-4"></div>

  <!-- Copyright -->
  <div class="text-center p-3">
    © 2022 Copyright:
    <a class="text-white" href="index.html">https://locchiodelfotografo</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>