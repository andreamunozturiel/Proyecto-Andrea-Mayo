<?php

session_start();

include './config/config.php';


if(!empty($_POST)){
    $id_servicio = $_POST['id'];
    $query_eliminar = $conexion -> query("DELETE FROM servicios WHERE id=$id_servicio");

    if($query_eliminar){
        header("Location: serviciosAdmin.php");
    }else{
        echo "Error al eliminar el servicio";
    }
}

if(empty($_REQUEST['id'])){
    header("Location: serviciosAdmin.php");
}else{
    $id_servicio = $_REQUEST['id'];

    $query = $conexion -> query("SELECT NOMBRE_SERVICIO ,DESCRIPCION FROM servicios");

    $result = $query -> num_rows;

    if($result > 0){
        while($data = $query -> fetch_array(MYSQLI_ASSOC)){
            $nombre = $data['NOMBRE_SERVICIO'];
            $descripcion = $data['DESCRIPCION'];
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

        <<nav id="sidebar">
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
            <h2>¿Estás seguro de eliminar el siguiente servicio?</h2>
            <p>Servicio: <span><?php echo $nombre; ?></span></p>
            <p>Descripción: <span><?php echo $descripcion; ?></span></p>

            <form  method="post" action="">
                <input type="hidden" name="id" value="<?php echo $id_servicio;?>">
                <a href="serviciosAdmin.php" class="btn btn-danger">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn btn-success">
            </form>
        </div>
        </div>
</div>
</body>
</html>