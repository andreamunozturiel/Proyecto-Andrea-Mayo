<?php

session_start();

error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// echo $_SESSION['id'];


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
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <script src="https://kit.fontawesome.com/ac44dac66f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/solid.min.css"-+ />
    <link rel="stylesheet" href="css/brands.min.css" />
    <link rel="stylesheet" href="css/styleProfile.css" />
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

        <div class="col-12 p-0" style="background-color: black;">
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
                            <a class="nav-link" href="servicios.php" id="idA">SERVICIOS </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php" id="idA"> <i class="fa fa-user bigicon"></i> PERFIL </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" id="idA">SALIR </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="vh-100" style="background-color: grey;">
        <div class="container rounded bg-white mt-9 mb-9">
            <div class="col">
                <div class="col-md-3" style="margin-left:400px;">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="220px" src="./images/pandarojo.jpg">
                        <br>
                        <span class="text-black"  style="font-family: Kiona; font-weight:bolder;"><?php echo $_SESSION['username'] ?></span>
                    </div>
                </div>
                <div class="col-md-8" style="margin-left: 170px; margin-top:-50px ">
                    <div class="p-3 py-5">
                        <div class="d-flex-justify-content-between align-items-center mb-3">
                        <hr noshade="noshade"></hr>
                        </div>
                        <h4 class="text-center">PERFIL PERSONAL</h4>
                    </div>
                    
                    <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" placeholder="Nombre" value="<?php echo $_SESSION['nombre'] ?>"></div>
                        <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Nombre" value="<?php echo $_SESSION['username'] ?>"></div>
                        <div class="col-md-6"><label class="labels">Apellido</label><input type="text" class="form-control" value="<?php echo $_SESSION['apellidos'] ?>" placeholder="Primer Apellido"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Numero de Teléfono</label><input type="text" class="form-control" placeholder="introduce el numero de teléfono" value="<?php echo $_SESSION['telefono'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Domicilio</label><input type="text" class="form-control" placeholder="dirección" value="<?php echo $_SESSION['direccion'] ?>"></div>
                    </div>
                    <div class="mt-5 text-center" style="margin-bottom: 20px;"><button class="boton-perfil" type="button"><a class="link_edit" href="actualizarPerfil.php?id=<?php echo $_SESSION['id'];?>" style="color:white;"> Editar Perfil</a></button></div>
                </div>
                <hr>
                <div class="col-md-8" style="margin-left: 170px;">
                <label class="labelReserva">RESERVAS</label>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Numero Reserva</th>
                            <th scope="col">Fecha Reserva</th>
                            <th scope="col">Servicio</th>
                        </tr>
                    </thead>
                    <?php
                    include './config/config.php';

                    $sqlID = $conexion -> query("SELECT id,nombre FROM usuarios WHERE
                                nombre = '$_SESSION[username]' AND id = '$_SESSION[id]'");

                    // $result = $sqlID -> fetch_array;

                    $nombre_servicio;

                    $sql = $conexion -> query("SELECT num_reserva,id_usuario,fecha_reserva,id_servicio FROM reservas WHERE id_usuario = '$_SESSION[id]'");

                    //$sqlSeeer = $conexion -> query("SELECT ID_SERVICIO,NOMBRE_SERVICIO FROM RESERVAS,servicios WHERE reservas.id_servicio = servicios.id");

                    //$sqlServicios = $conexion -> query("SELECT nombre_servicio,precio_servicio FROM servicios WHERE id_servicio = ".$mostrarReservaCliente['id_servicio']."");


                    
                    
                    while($mostrarReservaCliente = $sql -> fetch_array(MYSQLI_ASSOC)){
                        ?>
                        <tbody>
                    <tr>
                        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">
                        <td><?php echo $mostrarReservaCliente['num_reserva'];?></td>
                        <td><?php echo $mostrarReservaCliente['fecha_reserva'];?></td>
                        <td><?php echo $mostrarReservaCliente['id_servicio'];?></td>
                        
                    <?php
                    }
                    ?>
                    
                    </tbody>
                    </table>
            </div>
            </div>
           
        </div>
    </section>

    <footer id="footerProfile" class="text-center text-white fixed-bottom">
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

</body>