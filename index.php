<?php

$num_visitas = "cookie_de_visitas";

if(isset($_COOKIE[$num_visitas])){
    echo '<script type="text/javascript">alert("Ya has visitado anteriormente la pagina")</script>';
}else{
    $tiempoExpirarCookie = time() + 60*60*24*30;
    setcookie($num_visitas, true, $tiempoExpirarCookie);
    echo '<script type="text/javascript">alert("Esta es la primera vez que visitas la página")</script>';
}

?>

<!DOCTYPE html>
<!-- 
    Web fotografía
    Andrea Muñoz Turiel
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/solid.min.css" />
    <link rel="stylesheet" href="css/brands.min.css" />
    <link rel="stylesheet" href="css/styles.css">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Fotografía</title>
</head>

<body>
    <!-- Navbar-->
    <!-- <div class="alert alert-info"> <?php echo $num_visitas ;?></div> -->

<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3" id="navTexto">
        <div class="container"><a href="index.php" class="navbar-brand text-uppercase font-weight-bold">l'occhio del fotografo</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
            aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">
            <i class="fa fa-bars" style="background-color: white"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link text-uppercase font-weight-bold">Inicio <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link  font-weight-bold" data-toggle="dropdown" id="idA">GALERÍA</a>
                        <div class="dropdown-menu" id="desplegableColorFondo">
                            <a class="dropdown-item" href="GaleriaBodas.php" id="idA">BODAS</a>
                            <a class="dropdown-item" href="GaleriaRetratos.php" id="idA">RETRATOS</a>
                            <a class="dropdown-item" href="GaleriaPaisajes.php" id="idA">PAISAJES</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="contacto.php" class="nav-link text-uppercase font-weight-bold">Contacto</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link text-uppercase font-weight-bold">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="content">
    <h1 style="font-family: Kiona;">l'occhio del fotografo</h1>
    <P>En ella podrás encontrar todo tipo de estilo fotográfico</P>
    <div>
        <a href="GaleriaBodas.php">
        <button type="button" class="buttonInicio"><span></span>GALERÍA</button>
    </a>
    <a href="contacto.php">
        <button type="button" class="buttonInicio"><span></span>CONTACTO</button>
    </a>
    </div>
</div>
</div>
    <!-- JS -->
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
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