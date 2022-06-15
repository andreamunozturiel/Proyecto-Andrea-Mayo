<?php
include './config/config.php';

include 'correo.php';

session_start();

error_reporting(0);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // $nombre= $_POST['nombre'];
    $email = $_POST['email'];
    // $telefono = $_POST['telefono'];
    // $curriculum = $_POST['curriculum'];
    
    $buscarEmail = $conexion -> query("SELECT * FROM usuarios WHERE email ='$email'");

    $contar = mysqli_num_rows($buscarEmail);

    if($contar >= 1){
        echo "<script>alert('El correo ya existe')</script>";


    }else{
        echo "<script>alert('El correo no existe')</script>";
        header('Location: registroCandidatos.php');
    }

   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ac44dac66f.js" crossorigin="anonymous"></script>
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/solid.min.css" />
    <link rel="stylesheet" href="css/brands.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/stylesContacto.css">
    <title>Contacto</title>
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

        <div class="col-12 p-0" id="navColor">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light" id="navMovil">
                <!-- Title -->
                <a class="navbar-brand d-lg-none" href="#">
                    <h1 class="font-arizonia" style="text-align: center;" id="nombreMovil">L'occhio del fotografo</h1>
                </a>
                <!-- Toggler Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
                    aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation" id="botonMovil">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsed Content -->
                <div class="collapse navbar-collapse" id="navbar-content">
                    <ul class="navbar-nav mr-auto ml-auto"">
                        <li class=" nav-item active">
                        <a class="nav-link" href="index.php" id="idA">
                            INICIO
                            <span class="sr-only">(actual)</span>
                        </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toogle" data-toggle="dropdown" id="idA">GALERÍA</a>
                            <div class="dropdown-menu" id="desplegableColorFondo">
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
                    <li class="nav-item" style="list-style: none;">
                        <a class="text-white"  style="font-family: Kiona; font-weight:bolder"><i class="fa fa-user bigicon"></i> <?php echo $_SESSION['username'] ?></a>
                    </li>
                </div>
            </nav>
        </div>
    </header>
    <section class="vh-100" id="principal">
        <div class="container">
            <div class="abs-center">
                <form method="POST" class="formulario-horizontal">
                    <legend class="text-center header">Contacta con nosotros</legend>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input type="text" id="fname" name="name" placeholder="Nombre" class="form-control" value="<?php echo $nombre;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i id="correo"
                                class="fa-solid fa-envelope"></i></span>
                        <div class="col-md-8">
                            <input id="email" name="email" type="text" placeholder="Correo electrónico"
                                class="form-control" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i
                                class="fa fa-phone-square bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="phone" name="phone" type="text" placeholder="Teléfono" class="form-control" value="<?php echo $telefono; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">
                        <i class="fa fa-paper-plane" style="font-size:25px;color:rgb(158, 9, 9)"></i>
                        <label style="color:white;">Adjunta tu currículum</label>
                        </span>
                        <br>
                        <div class="col-md-12">
                            <input type="file" name="" id="" style="color:white;" value="<?php echo $curriculum; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary btn-lg" id="botonEnviar"></input>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
</body>
<!-- Footer -->
<footer id="footerContacto" class="text-center text-white fixed-bottom">
    <!-- Grid container -->
    <div class="container p-4"></div>

    <!-- Copyright -->
    <div class="text-center p-3">
        © 2022 Copyright:
        <a class="text-white" href="index.html">https://locchiodelfotografo.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Materialize.js -->
<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>