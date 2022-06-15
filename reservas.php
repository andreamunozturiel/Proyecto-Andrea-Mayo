<?php

include './config/config.php';
session_start();

error_reporting();

if($_SESSION['rol_usuario'] == 1){
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
}else if($_SESSION['rol_usuario'] == 2){
    header("Location: login.php");
}
  

?>
<DOCTYPE html>
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
        <link rel="stylesheet" href="css/stylesAdmin.css">
        <title>ADMINISTRADOR</title>
    </head>

    <body style="background-color: #D7DBDD;">
        <div class="wrapper">

            <nav id="sidebar">
                <div class="sidebar-header">
                    <h4>Menu <?php echo $_SESSION['username'] ?></h4>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="#submenuInicio" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Rol</a>
                        <ul class="collapse list-unstyled" id="submenuInicio">
                            <li>
                                <p>Eres Administrador</p>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#perfil">Perfil</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Datos</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li class="active">
                                <a href="reservas.php">Reservas</a>
                            </li>
                            <li>
                                <a href="usuarios.php">Registrados</a>
                            </li>
                            <li>
                                <a href="serviciosAdmin.php">Servicios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Histórico</a>
                    </li>
                    <li>
                        <a href="index.php">Web</a>
                    </li>
                    <li>
                        <a href="logout.php">SALIR</a>
                    </li>
                </ul>
            </nav>
            
            <a name="perfil"></a>
            <div class="container bg-white mt-9 mb-9" style="margin-top: 100px; margin-left:500px" >
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex-justify-content-between align-items-center mb-3">

                            </div>
                            <h4 class="text-center">RESERVAS</h4>
                        </div>
                        <table border=1 style="border:2px solid black">
                            <thead>
                                <th colspan="5">Reservas</th>
                            </thead>
                            <thead>
                                <th>Numero Reserva</th>
                                <th>Id Usuario</th>
                                <th>Fecha Reserva</th>
                                <th>Id Servicio</th>
                                <th>Opciones</th>
                            </thead>
                            
                                <?php
                                include './config/config.php';
                                 $sql = $conexion -> query("SELECT num_reserva,id_usuario,fecha_reserva,id_servicio FROM reservas");

                                //  $result  = mysqli_query($conexion, $sql);

                                 while($mostrarReservas = $sql -> fetch_array(MYSQLI_ASSOC)){
                                    ?>
                                    <tr>

                                        <td><?php echo $mostrarReservas['num_reserva'];?></td>
                                        <td><?php echo $mostrarReservas['id_usuario'];?></td>
                                        <td><?php echo $mostrarReservas['fecha_reserva'];?></td>
                                        <td><?php echo $mostrarReservas['id_servicio'];?></td>
                                        <td>
                                        <button class="btn btn-info"><a class="link_edit" href="actualizarReserva.php?num_reserva=<?php echo $mostrarReservas['num_reserva'];?>" >Editar</a></button>
                                        <button class="btn btn-danger"><a class="link-delete" href="borrar.php?num_reserva=<?php echo $mostrarReservas['num_reserva'];?>" >Eliminar</a></button>  
                                    </td>
                                    </tr>
                                    <?php
                                 }
                                 ?>


                                
                               
                                
                            
                        </table>
                        
                        
                        
                </div>
            </div>


            


    </body>

    <!-- Materialize.js -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </html>