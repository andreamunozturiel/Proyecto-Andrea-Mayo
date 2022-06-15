<!DOCTYPE html>
<!-- 
    Web fotografía
    Andrea Muñoz Turiel
-->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Materialize.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/solid.min.css" />
    <link rel="stylesheet" href="css/brands.min.css" />
    <link rel="stylesheet" href="css/styleG.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paisajes</title>
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
                    <!-- TODO: Muy largo para móviles ?? -->
                    <h1 class="font-arizonia" style="text-align: center;" id="nombreMovil">l'occhio del fotografo</h1>
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
                </div>
            </nav>
        </div>
    </header>


    <section class="vh-100" id="principal">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="carousel center-align">
                        <div class="carousel-item">
                            <img src="images/Paisajes/mobiliario urbano.JPG" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="images/Paisajes/_MG_9904434.jpg" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="images/Paisajes/práctica 5.JPG" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="images/Paisajes/puestaDeSol.jpg" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="images/Paisajes/linea de fuerza.jpg" alt="">
                        </div>

                        <div class="carousel-item">
                            <img src="images/Paisajes/edificio con importancia a los alrededores.jpg" alt="">
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </section>





    </div>

    <footer id="footerBodas" class="text-center text-white fixed-bottom">
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
</body>

</html>