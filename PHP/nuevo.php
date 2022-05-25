<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>
<body>
    <div>
        <form action="insertar.php" method="POST">
            <table>
                <tr>
                    <td>Ingresar Datos: </td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="nom" id=""></td>
                </tr>
                <tr>
                    <td>APELLIDOS</td>
                    <td><input type="text" name="ape" id=""></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input type="email" name="mail" id=""></td>
                </tr>
                <tr>
                    <td>DIRECCION</td>
                    <td><input type="text" name="dire" id=""></td>
                </tr>
                <tr>
                    <td>TELEFONO</td>
                    <td><input type="number" name="num" id=""></td>
                </tr>
                <tr>
                    <td>ROL USUARIO</td>
                    <td><input type="text" name="rol" id=""></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>