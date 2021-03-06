<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
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
    <title>Administrar Usuario</title>
</head>

<body>
    <header>
        <h1 class="tittle">Gestion de usuarios</h1>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Nuevo Mensaje</a></li>
                    <li><a href="#">Mensajes Enviados</a></li>
                    <li><a href="#">Mi Cuenta</a></li>
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
            <!-- <a href='../../../public/vista/login.php'>Iniciar Sesion</a>"-->

        </div>
    </header>
    <div id="contenedor">
        <h2>Mensajes Recibidos</h2>
        <section>
            <div class="buscar">
                <input type="search" placeholder="Buscar">
                <input type="button" value="Buscar">
            </div>
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