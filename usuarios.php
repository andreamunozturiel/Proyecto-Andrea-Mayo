<?php

include './config/config.php';

session_start();

error_reporting(0);

if ($_SESSION['rol_usuario'] == 1) {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
} else if ($_SESSION['rol_usuario'] == 2) {
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
                    <a href="#submenuInicio" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Rol</a>
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
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Datos</a>
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


        <div class="container bg-white mt-9 mb-9" style="margin-top: 100px; margin-left:500px; height: max-content;">

            <h4 class="text-center"
                style="margin-top: 100px; font-style:italic; font-weight: bolder; text-decoration:underline;">USUARIOS
                REGISTRADOS</h4>
            <!-- <div id="filtro">
            <fieldset>
                <legend>Filtrar por</legend>
                <form action="" method="post">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" />
                    <label for="orden">Ordenar por: </label>
                    <select name="orden" id="orden">
                        <option value="nombre">Nombre</option>
                        <option value="apellidos">Apellidos</option>
                        <option value="email">Email</option>
                        <option value="direccion">Direccion</option>
                        <option value="telefono">Teléfono</option>
                        <option value="rol_usuario">Rol Usuario</option>
                    </select>
                    <input type="radio" name="senso" id="" value="ASC" checked="checked">ASC
                    <input type="radio" name="senso" id="" value="DESC">DESC
                    <button type="submit" name="filtrar">Filtrar</button>
                </form>
            </fieldset>
            </div> -->


            <table border=1 style="border:2px solid black; margin-top:20px; margin-bottom: 50px">
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

if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}

$usuarios = $conexion->query("SELECT id,nombre,apellidos,email,direccion,telefono, rol_usuario FROM usuarios");

$num_usuarios = $usuarios->num_rows;

$registros = '5';

$pagina = $_REQUEST["nume"];

if (is_numeric($pagina))
    $inicio = (($pagina - 1)*$registros);
else
    $inicio = 0;
    $busqueda = $conexion->query("SELECT id,nombre,apellidos,email,direccion,telefono, rol_usuario FROM usuarios LIMIT $inicio,$registros;");
    $paginas = ceil($num_usuarios / $registros);


    ?>
                <h4 class="card-tittle text-center">Resultados(<?php echo $num_usuarios; ?>)</h4>
                <div class="container_card">
                    <?php while ($resultado = mysqli_fetch_assoc($busqueda)) {
                        if(!empty($num)){ $num = $num++;}else{ $num = '0';}
                        $num++;
                    ?>
                
                <tr>
                <!-- <th scope="row"><?php echo $num; ?></th> -->
                    <td><?php echo $resultado['id']; ?></td>
                    <td><?php echo $resultado['nombre']; ?></td>
                    <td><?php echo $resultado['apellidos']; ?></td>
                    <td><?php echo $resultado['email']; ?></td>
                    <td><?php echo $resultado['direccion']; ?></td>
                    <td><?php echo $resultado['telefono']; ?></td>
                    <td><?php echo $resultado['rol_usuario']; ?></td>
                    <td>
                        <button class="btn btn-info"><a class="link_edit"
                                href="actualizarUsuario.php?id=<?php echo $resultado['id']; ?>">Editar</a></button>
                        <button class="btn btn-danger"><a class="link-delete"
                                href="borrar.php?id=<?php echo $resultado['id']; ?>">Eliminar</a></button>
                    </td>
                </tr>
                <?php } ?>
            </table>
            </div>
        </div>
        <div class="container-fluid col-12" style="margin-top:20px">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none; margin-left:250px;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='usuarios.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='usuarios.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_usuarios / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='usuarios.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='usuarios.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
    </div>
    </div>
</body>

<!-- Materialize.js -->
<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>