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
    <title>Modificar Contrasña</title>
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
        <div class="formulario login">
            <h2>Cambiar contraseña</h2>
            <form action="../../controladores/admin/updatePass.php" method="post">
                <input type="hidden" name="cod" value="<?php echo ($_GET["usu_cod"]); ?>">
                <input type="password" name="epass" id="epass" required placeholder="Contraseña existente">
                <input type="password" name="pass" id="pass" required placeholder="Nueva contraseña">
                <input type="password" name="cpass" id="cpass" required placeholder="Reapetir contraseña">
                <input type="submit" value="Cambiar">
            </form>
        </div>
    </section>
</body>

</html>