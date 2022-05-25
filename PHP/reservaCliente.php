<?php

include './config/config.php';

require 'correo.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
// echo $_SESSION('id');


if(isset($_POST['submit'])){
    $fecha = $_POST['fecha'];
    $servicio = $_POST['servicio'];
    $id_usuario = $_SESSION['id'];

    $sql = $conexion -> query("INSERT INTO reservas (ID_USUARIO, FECHA_RESERVA, ID_SERVICIO)
            VALUES ('$id_usuario' , '$fecha','$servicio')");
    
    if($sql){
        $correo = $_SESSION['username'];
        echo '<div class="alert alert-success">Reserva realizada con exito. Se enviara un correo de confirmación a ' .$correo.' </div>';
        enviar_correo_reserva($correo);
        header("Location: profile.php");
       
      
       
    }else{
       echo  '<div class="alert alert-danger">Lo siento, algo ha fallado en su reserva</div>';
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <script src="https://kit.fontawesome.com/ac44dac66f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/pickadate.js-3.6.2/lib/picker.js"></script>
    <script type="text/javascript" src="./js/pickadate.js-3.6.2/lib/picker.date.js"></script>
    <script  type="text/javascript" src="./js/pickadate.js-3.6.2/lib/picker.time.js"></script>
    <script  type="text/javascript" src="./js/moment.js"></script>
    <link rel="stylesheet" type="text/css" href="./js/pickadate.js-3.6.2/lib/themes/classic.css">
    <link rel="stylesheet" type="text/css" href="./js/pickadate.js-3.6.2/lib/themes/classic.date.css">
    <link rel="stylesheet" type="text/css" href="./js/pickadate.js-3.6.2/lib/themes/classic.time.css">
    <link rel="stylesheet" href="css/solid.min.css" -+ />
    <link rel="stylesheet" href="css/brands.min.css" />
    <link rel="stylesheet" href="css/styleServicios.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
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

        <div class="col-12 p-0" style="background-color: rgb(186, 221, 245);">
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
                        
                        <li class="nav-item">
                            <a class="nav-link" href="servicios.php" id="idA">SERVICIOS </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php" id="idA">PERFIL </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" id="idA">SALIR </a>
                        </li>
                    </ul>
                    <li class="nav-item" style="list-style: none;">
                        <a class="text-black"  style="font-family: Kiona; font-weight:bolder"><i class="fa fa-user bigicon"></i> <?php echo $_SESSION['username'] ?></a>
                    </li>
                </div>
            </nav>
        </div>
    </header>

    <section class="class-12" style="background-image: url(./images/Paisajes/desenfocada.jpg); margin-top: -20px">
        <div class="row justify-content-center" style="text-align:center; font-size: 20px; font-style: Kiona; font-weight: bolder; margin-top: 20px; color: white">
            ZONA DE RESERVAS
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row justify-content-center" style="margin-top: 20px">
            <label for="" style="color: white">1 - Selecciona el día y la hora</label>
        </div>
        <div class="row justify-content-center">
        <div class="row justify-content-center">
            <input type="datetime-local" name="fecha" id="fecha" value="<?php echo $fecha;?>">
        </div>
            
        </div>
        <div class="row justify-content-center">
        <label for="" style="color:white"> 2 - Selecciona el tipo de servicio</label>
        </div>
        <div class="row justify-content-center">
            <select name="servicio" id="" style="border-radius:6px; box-shadow:2px 2px" >
                <option value="1">Sesión en interiores</option>
                <option value="2">Sesión en exteriores</option>
                <option value="3">Sesion en estudio</option>
                <option value="4">Curso de edición</option>
            </select> 
            <!-- <textarea name="servicio" id="" cols="30" rows="10" ></textarea> -->
            
            
        </div>
        <div class="row justify-content-center" style="margin-top: 10px">
            <input type="submit" value="Reservar" name="submit">
        </div>
        </form>
    </section>
    </body>
<footer id="footerServicios" class="text-center text-white block-bottom">
  <!-- Copyright -->
  <div class="text-center p-3" style="color: black; font-weight: bolder;">
    © 2022 Copyright:
    <a class="textFooter" href="index.html">https://locchiodelfotografo</a>
  </div>
  <!-- Copyright -->
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>