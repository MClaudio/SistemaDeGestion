<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <title>Modificar Usuario</title>
</head>

<body>
    <header>
        <h1 class="tittle">Gestion de usuarios</h1>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="usuarios.php">Usuarios</a></li>
                </ul>
            </nav>
        </div>
        <div class="user">
            <div class="userImg">
                <div class="imagen">
                    <img src="../../../img/fotos/foto.png" alt="">
                </div>
                <p><span><?php echo ($_SESSION['nombre']) ?></span></p>
            </div>
            <a href='../../../../config/sessionEnd.php'>Cerrar Sesion</a>

        </div>
    </header>
    <section>
        <div class="formulario">
            <h2>Editar Datos</h2>
            <?php
            $data = $_GET["user"];
            $datos = stripslashes($data);
            $datos = urldecode($datos);
            $datos = unserialize($datos);
            ?>
            <form action="../../controladores/admin/updateUser.php?usu_codigo=<?php echo ($datos["usu_codigo"]) ?>"
                method="post">
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" id="cedula" value="<?php echo ($datos["usu_cedula"]); ?>" required>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo ($datos["usu_nombres"]); ?>" required>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo ($datos["usu_apellidos"]); ?>"
                    required>
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo ($datos["usu_direccion"]); ?>"
                    required>
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="<?php echo ($datos["usu_telefono"]); ?>"
                    required>
                <label for="fechaNac">Fecha de nacimiento</label>
                <input type="date" name="fechaNac" id="fechaNac" value="<?php echo ($datos["usu_fecha_nacimiento"]); ?>"
                    required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo ($datos["usu_correo"]); ?>" required>

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </section>
</body>

</html>