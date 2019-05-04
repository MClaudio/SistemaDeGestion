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
    <link rel="stylesheet" href="../../../css/admin_style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Administrar Usuarios</title>
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
            <a href='../../../config/sessionEnd.php'>Cerrar Sesion</a>

        </div>
    </header>
    <div id="contenedor">
        <h2>Mensajes Electronicos</h2>
        <section>
            <table>
                <thead>
                    <tr>
                        <td>Fecha</td>
                        <td>Remitente</td>
                        <td>Asunto</td>
                        <td></td>
                    </tr>
                </thead>
                <!--
                    <tfoot>
                        <tr>
                            <td colspan="10">
                                <div class="links">
                                    <a href="#">&laquo;</a>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">&raquo;</a>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    -->
                <tbody>
                    <tr>
                        <td>Prueba</td>
                        <td>Prueba</td>
                        <td>Prueba</td>
                        <td><a href="#">Leer</a></td>

                    </tr>

                </tbody>
            </table>

        </section>
    </div>
    <footer>
        <p>Copyright</p>
        <p>Claudio Maldonado</p>
        <p>&copy; 2019</p>
    </footer>
</body>

</html>