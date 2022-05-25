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
    
    if (empty($_POST['nombre_servicio']) || empty($_POST['precio_servicio']) || empty($_POST['descripcion'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {
        $idServicio = $_POST['id'];
        $nombre_servicio = $_POST['nombre_servicio'];
        $precio_servicio = $_POST['precio_servicio'];
        $descripcion = $_POST['descripcion'];
        
        $sql = $conexion -> query("SELECT id,nombre_servicio,precio_servicio,descripcion FROM servicios");

        $result = $sql -> fetch_array;                                      
        // $result =  mysqli_fetch_array($sql);

        $sql_update = $conexion -> query("UPDATE servicios SET nombre_servicio='$nombre_servicio', precio_servicio='$precio_servicio', descripcion = '$descripcion' WHERE id = '$idServicio'");
       
    }
}

//Mostrar Datos
if (empty($_GET['id'])) {
    header('Location: serviciosAdmin.php');
}

$idser = $_GET['id'];

$sql = $conexion -> query("SELECT id,nombre_servicio,precio_servicio,descripcion from servicios where id=$idser");


$result_sql = $sql -> num_rows;

if ($result_sql == 0) {
    header("Location: serviciosAdmin.php");
} else {
    while ($data = $sql -> fetch_array(MYSQLI_ASSOC)) {
        $idser = $data['id'];
        $nombre_servicio = $data['nombre_servicio'];
        $precio_servicio = $data['precio_servicio'];
        $descripcion = $data['descripcion'];
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
    <link rel="stylesheet" href="css/styleBorrar.css">
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
            <h2 style="text-align: center; font-family:Kiona; font-size:25px; margin-top:20px">Actualizar Servicios</h2>
            <hr>
            <div class="data_delete">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $idser; ?>">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre_servicio" id="nombre_servicio" placeholder="Nombre_Servicio" value="<?php echo $nombre_servicio;?>">
                <br>
                <label for="precio_servicio">Precio Servicio</label>
                <input type="text" name="precio_servicio" id="precio_servicio" value="<?php echo $precio_servicio;?>">
                <br>
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
                <br>
                <hr>
                <input type="submit" value="Actualizar Cambios" class="btn_save">
            </form>
            </div>
        </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>