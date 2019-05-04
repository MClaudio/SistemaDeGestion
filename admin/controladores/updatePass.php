<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Modificar Usuario</title>
</head>

<body>
    <header>
        <h1 class="tittle">Gestion de usuarios</h1>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="../../public/vista/crear_usuario.php">Registro</a></li>
                    <li><a href="../vista/usuario/index.php">Editar Usuario</a></li>
                </ul>
            </nav>
        </div>
        <div class="user">
            <?php
            session_start();
            if (isset($_SESSION['nombre'])) {
                echo "<p>Administrador: <span>" . $_SESSION['nombre'] . "</span></p>";
                echo "<a href='../../public/controladores/sessionEnd.php'>Cerrar Sesion</a>";
            } else {
                echo "<a href='../../public/vista/login.php'>Iniciar Sesion</a>";
                header("Location: ../../public/vista/login.php");
            }
            ?>
        </div>
    </header>
    <section>
        <div class="formulario crear_usuario">
            <?php
            include '../../config/conexionBD.php';
            $epass = isset($_POST["epass"]) ? trim($_POST["epass"]) : null;
            $pass = isset($_POST["pass"]) ? trim($_POST["pass"]) : null;
            $cpass = isset($_POST["cpass"]) ? trim($_POST["cpass"]) : null;
            $cod = $_GET["usu_cod"];

            $sql = "SELECT usu_password FROM usuario WHERE usu_codigo='$cod';";
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
            $date = date(date("Y-m-d H:i:s"));

            if (MD5($epass) === $result["usu_password"]) {
                if ($pass === $cpass) {
                    $sql = "UPDATE usuario SET usu_password = MD5('$pass'), usu_fecha_modificacion='$date' WHERE usu_codigo='$cod'";
                    if ($conn->query($sql) == true) {
                        echo "<h2>Contraseña actualizada con exito</h2>";
                        echo '<i class="far fa-check-circle"></i>';
                        echo '<a href="../vista/usuario/index.php">Regresar</a>';
                    } else {
                        echo "<h2>Error al actualizar la contraseña " . mysqli_error($conn) . "</h2>";
                        echo '<i class="fas fa-exclamation-circle"></i>';
                        echo '<a href="../vista/usuario/modificar_pass.php?usu_cod=' . $cod . '">Regresar</a>';
                    }
                } else {
                    echo "<h2>Las contraseñas no coinciden</h2>";
                    echo '<i class="fas fa-exclamation-circle"></i>';
                    echo '<a href="../vista/usuario/modificar_pass.php?usu_cod=' . $cod . '">Regresar</a>';
                }
            } else {
                echo "<h2>La contraseña no existe en el sistema</h2>";
                echo '<i class="fas fa-exclamation-circle"></i>';
                echo '<a href="../vista/usuario/modificar_pass.php?usu_cod=' . $cod . '">Regresar</a>';
            }
            $conn->close();
            ?>

        </div>
    </section>
</body>

</html>