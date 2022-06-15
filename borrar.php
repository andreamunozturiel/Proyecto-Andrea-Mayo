<?php

session_start();

include './config/config.php';


if(!empty($_POST)){
    $id_usuario = $_POST['id'];
    $query_eliminar = $conexion -> query("DELETE FROM usuarios WHERE id=$id_usuario");

    if($query_eliminar){
        header("Location: usuarios.php");
    }else{
        echo "Error al eliminar el usuario";
    }
}

if(empty($_REQUEST['id'])){
    header("Location: usuarios.php");
}else{
    $id_usuario = $_REQUEST['id'];

    $query = $conexion -> query("SELECT u.nombre,r.nombre_rol FROM usuarios u INNER JOIN roles r on u.rol_usuario = r.id WHERE u.id = $id_usuario");

    $result = $query -> num_rows;

    if($result > 0){
        while($data = $query -> fetch_array(MYSQLI_ASSOC)){
            $nombre = $data['nombre'];
            $rol = $data['nombre_rol'];
        }
    }else{
        header("Location: usuarios.php");
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

        <div class="data_delete">
            <h2>¿Estás seguro de eliminar el siguiente usuario?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            <p>Rol Usuario: <span><?php echo $rol; ?></span></p>

            <form  method="post" action="">
                <input type="hidden" name="id" value="<?php echo $id_usuario;?>">
                <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn btn-success">
            </form>
        </div>
        </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>