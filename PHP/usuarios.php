<?php

include './config/config.php';

session_start();

if($_SESSION['rol_usuario'] == 1){
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
}else if($_SESSION['rol_usuario'] == 2){
    header("Location: login.php");
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


        <div class="container bg-white mt-9 mb-9" style="margin-top: 100px; margin-left:500px; height: 600px">
            
            <h4 class="text-center" style="margin-top: 100px; font-style:italic; font-weight: bolder; text-decoration:underline;">USUARIOS REGISTRADOS</h4>
                
                <table border=1 style="border:2px solid black; margin-top:20px">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Rol Usuario</th>
                        <th><a href="nuevo.php">Nuevo</a></th>
                    </tr>
                    
                        <?php
                        include './config/config.php';

                        $sql = $conexion -> query("SELECT id,nombre,apellidos,email,direccion,telefono, rol_usuario FROM usuarios");
                        
                        
                        while($mostrarUsuarios = $sql -> fetch_array(MYSQLI_ASSOC)){
                        ?>
                        <tr>
                            
                            <td><?php echo $mostrarUsuarios['id'];?></td>
                            <td><?php echo $mostrarUsuarios['nombre'];?></td>
                            <td><?php echo $mostrarUsuarios['apellidos'];?></td>
                            <td><?php echo $mostrarUsuarios['email'];?></td>
                            <td><?php echo $mostrarUsuarios['direccion'];?></td>
                            <td><?php echo $mostrarUsuarios['telefono'];?></td>
                            <td><?php echo $mostrarUsuarios['rol_usuario'];?></td>
                            <td>
                            <button class="btn btn-info"><a class="link_edit" href="actualizarUsuario.php?id=<?php echo $mostrarUsuarios['id'];?>">Editar</a></button>
                            <button class="btn btn-danger"><a class="link-delete" href="borrar.php?id=<?php echo $mostrarUsuarios['id'];?>" >Eliminar</a></button>  
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
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