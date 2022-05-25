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
    
    if (empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['email']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['rol'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {
        $idUsuario = $_POST['idUsuario'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $contrasenha = md5($_POST['contrasenha']);
        $telefono = $_POST['telefono'];
        $rol_usuario = $_POST['rol'];
        
        
        $sql = $conexion -> query("SELECT * FROM usuarios WHERE (nombre = '$nombre' AND id != $idUsuario)
                                                OR (email = '$email' AND id != $idUsuario)");                                                
        $result =  $sql -> fetch_array;

        if ($result > 0) {
            echo "<script>alert('El email ya fue registrado')</script>";

        } else {

            if(empty($_POST['contrasenha'])){

                $sql_update = $conexion -> query("UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', email = '$email' , direccion = '$direccion' , telefono = '$telefono' , rol_usuario = '$rol_usuario' WHERE id = '$idUsuario' ");
            }else{
                $sql_update = $conexion -> query("UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', email = '$email' , direccion = '$direccion' , telefono = '$telefono' , contrasenha='$contrasenha', rol_usuario = '$rol_usuario' WHERE id = '$idUsuario' ");
            }
            if($sql_update){
                echo "<script>alert('Usuario actualizado correctamente')</script>";
            }else{
                echo "<script>alert('Error al actualizar el usuario')</script>";
            }
            
            
        }
        
    }
}

//Mostrar Datos
if (empty($_GET['id'])) {
    header('Location: usuarios.php');
}

$iduser = $_GET['id'];

$sql = $conexion -> query("SELECT u.id, u.nombre, u.apellidos, u.direccion, u.email, u.telefono, (u.ROL_USUARIO) 
as idrol, (r.NOMBRE_ROL) as roles from usuarios u INNER JOIN roles r on u.rol_usuario = r.ID where u.id=$iduser");


$result_sql = $sql -> num_rows;

if ($result_sql == 0) {
    header("Location: usuarios.php");
} else {
    while ($data = $sql -> fetch_array(MYSQLI_ASSOC)) {
        $iduser = $data['id'];
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $email = $data['email'];
        $direccion = $data['direccion'];
        $telefono = $data['telefono'];
        $idrol = $data['idrol'];
        $rolusuario = $data['roles'];
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
            <h2 style="text-align: center; font-family:Kiona; font-size:25px; margin-top:20px">Actualizar Usuario</h2>
            <hr>
            <div class="data_delete">
            <form action="" method="post">
                <input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                <br>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
                <br>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">
                <br>
                <label for="direccion">Direccion</label>
                <input type="direccion" name="direccion" id="direccion" placeholder="Direccion" value="<?php echo $direccion; ?>">
                <br>
                <label for="telefono">Teléfono</label>
                <input type="telefono" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $telefono; ?>">
                <br>
                <label for="contrasenha">Contrasenha</label>
                <input type="password" name="contrasenha" id="contrasenha" placeholder="">
                <br>
                <label for="rolusuario">Rol Usuario</label>
                <input type="text" name="rol" id="rol" placeholder="rol" value="<?php echo $idrol; ?>">
                <p id="verRoles">
                    1.Administrador
                    <br>
                    2.Registrado
                </p>
                <input type="submit" value="Actualizar Cambios" class="btn_save">
            </form>
            </div>
            

        </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>