<?php

include './config/config.php';

error_reporting(0);

session_start();

if($_SESSION['rol_usuario'] == 1){
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
}
  


if (!empty($_POST)) {
    if (empty($_POST['id_usuario']) || empty($_POST['fecha_reserva']) || empty($_POST['id_servicio'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {
        $num_reserva = $_POST['num_reserva'];
        $id_usuario = $_POST['id_usuario'];
        $fecha_reserva = $_POST['fecha_reserva'];
        $id_servicio = $_POST['id_servicio'];
        
        $sql = $conexion -> query("SELECT num_reserva,id_usuario,fecha_reserva,id_servicio FROM reservas");

                                                
        $result =  $sql -> fetch_array;

        $sql_update = $conexion -> query("UPDATE reservas SET id_usuario='$id_usuario',
        fecha_reserva='$fecha_reserva', id_servicio ='$id_servicio' WHERE num_reserva = '$num_reserva'");
       
    }
}

//Mostrar Datos
if (empty($_GET['num_reserva'])) {
    header('Location: reservas.php');
}

$num_reserva = $_GET['num_reserva'];

$sql = $conexion -> query("SELECT num_reserva,id_usuario,fecha_reserva,id_servicio from reservas where num_reserva=$num_reserva");


$result_sql = $sql -> num_rows;

if ($result_sql == 0) {
    header("Location: reservas.php");
} else {
    while ($data = $sql -> fetch_array(MYSQLI_ASSOC)) {
        $num_reserva = $data['num_reserva'];
        $id_usuario = $data['id_usuario'];
        $fecha_reserva = $data['fecha_reserva'];
        $id_servicio = $data['id_servicio'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/solid.min.css" />
    <link rel="stylesheet" href="css/brands.min.css" />
    <link rel="stylesheet" href="css/stylesUsuarios.css">
    <title>ADMINISTRADOR</title>
</head>

<body style="background-color: #D7DBDD;">
    <div class="wrapper">

        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Menu <?php echo $_SESSION['username'] ?></h4>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#submenuInicio" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Rol</a>
                    <ul class="collapse list-unstyled" id="submenuInicio">
                        <li>
                            <p>Eres Administrador de L'occhio del fotografo</p>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin.php">Perfil</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Datos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
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
                    <a href="logout.php">Salir</a>
                </li>
            </ul>
        </nav>

        <div class="container bg-white mt-9 mb-9" style="margin-top: 100px; margin-left:500px">
            <h2 style="text-align: center; font-family:Kiona; font-size:25px; margin-top:20px">Actualizar Reserva</h2>
            <hr>
            <div class="data_delete">
            <form action="" method="post">
                <input type="hidden" name="num_reserva" value="<?php echo $num_reserva; ?>">
                
                <label for="id_usuario">Id de Usuario</label>
                <input type="text" name="id_usuario" id="id_usuario" placeholder="Id de usuario" value="<?php echo $id_usuario; ?>">
                <br>
                <label for="fecha_reserva">Fecha de la Reserva</label>
                <input type="text" name="fecha_reserva" id="fecha_reserva" value="<?php echo $fecha_reserva; ?>">
                <br>
                <label for="id_servicio">Id de Servicio</label>
                <input type="id_servicio" name="id_servicio" id="id_servicio" placeholder="Id de Servicio" value="<?php echo $id_servicio; ?>">
                <br>
                <input type="submit" value="Actualizar Cambios" class="btn_save">
            </form>
            </div>
        </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>