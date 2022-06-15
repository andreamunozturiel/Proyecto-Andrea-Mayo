<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <script src="https://kit.fontawesome.com/ac44dac66f.js" crossorigin="anonymous"></script>
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

    <div class="text-center" id="reservaBoton" style="margin: 10px">
    <label style="font-family: Kiona;font-weight: bolder;">Estos son nuestros servicios.<br>Reserva ahora</label> <br>
    <button class="botonReservar" type="submit" style="justify-content: center;"> <a href="reservaCliente.php" style="text-decoration:none; color:white"> RESERVAR</a></button>
    </div>

    <section id="services" class="col-12">
        <div class="row">
            <div class="col-12 col-lg-6 mb-2">
                <img src="images/Servicios/exterior.jpg" class="img-exterior" />
            </div>
            
            <id id="principalText" class="col-12 col-lg-6" class="sesion_fotos">
                <h4 id="textPhoto">Sesión Fotográfica en exteriores</h4>
                <p id="p1" class="mb-0"></p>
                <br>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">PROS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Muchas localizaciones</li>
                    <li>Luz Natural</li>
                    <li>Muchos escenarios</li>
                    <li>Mas facil para principiantes</li>
                </ul>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">CONTRAS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Condiciones metereológicas</li>
                    <li>Dificultad de cambio de ropa</li>
                </ul>
                
            </id>
        </div>

        </div>
    </section>

    <section id="services" class="col-12">
        <div class="row">
            <div class="col-12 col-lg-6 mb-2">
                <img src="images/Servicios/luces y sombras.jpg" class="img-interior" />
            </div>
            <id id="principalText" class="col-12 col-lg-6" class="sesion_fotos">
                <h4 id="textPhoto">Sesión Fotográfica en interiores</h4>
                <p id="p1" class="mb-0"></p>
                <br>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">PROS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Buena luz</li>
                    <li>Facilidad para cambio de ropa</li>
                    <li>Mayor privacidad</li>
                </ul>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">CONTRAS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Se ve más en modelos profesionales</li>
                    <li>El fondo suele ser unicolor</li>
                </ul>
                
            </id>
        </div>
        </div>
    </section>

    <section id="services" class="col-12">
        <div class="row">
            <div class="col-12 col-lg-6 mb-2">
                <img src="images/Servicios/estudio.jpg" class="img-estudio" />
            </div>
            <id id="principalText" class="col-12 col-lg-6" class="sesion_fotos">
                <h4 id="textPhoto">Sesión Fotográfica en estudio</h4>
                <p id="p1" class="mb-0"></p>
                <br>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">PROS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Se puede controlar la luz</li>
                    <li>El modelo resalta al 100%</li>
                    <li>Mayor privacidad</li>
                    <li>No afecta el clima</li>
                </ul>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">CONTRAS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Se ve más en modelos profesionales</li>
                    <li>El fondo suele ser unicolor</li>
                </ul>
                
            </id>
        </div>

        </div>
    </section>

    <section id="services" class="col-12">
        <div class="row">
            <div class="col-12 col-lg-6 mb-2">
                <img src="images/Servicios/photoshop.PNG" class="img-edicion" />
            </div>
            <id id="principalText" class="col-12 col-lg-6" class="sesion_fotos">
                <h4 id="textPhoto">CLASES DE EDICIÓN</h4>
                <p id="p1" class="mb-0"></p>
                <br>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">PROS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Gran variedad para modificar una foto</li>
                    <li>Muchas herramientas</li>
                </ul>
                <div class="col-12 col-lg-6">
                    <div style="font-weight: bolder;">CONTRAS: </div>
                </div>
                <ul class="listaServicios">
                    <li>Pueden ser algo complejos de aprender</li>
                </ul>
            </id>
        </div>

        </div>
    </section>

</body>
<footer id="footerServicios" class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4"></div>

  <!-- Copyright -->
  <div class="text-center p-3" style="color: black; font-weight: bolder;">
    © 2022 Copyright:
    <a class="textFooter" href="index.html">https://locchiodelfotografo</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>