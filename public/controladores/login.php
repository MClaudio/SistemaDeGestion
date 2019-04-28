<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <header>
        <h1 class="tittle">Gestion de usuarios</h1>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="../vista/login.html">Iniciar Sesion</a></li>
                    <li><a href="../vista/crear_usuario.html">Rgistro</a></li>
                    <li><a href="#">Editar Usuario</a></li>
                </ul>
            </nav>
        </div>
        <div class="user">
            <p>Administrador: <span>user</span></p>
            <a href="#">Cerrar Sesion</a>
        </div>
    </header>
    <section>
        <div class="formulario crear_usuario">
            <?php
                session_start();

                include'../../config/conexionBD.php';

                $email = isset($_POST["email"]) ? trim($_POST["email"]):null;
                $pass = isset($_POST["pass"]) ? trim($_POST["pass"]):null;
                $sql= "SELECT * FROM usuario WHERE usu_correo ='$email' AND usu_password = MD5('$pass')"; 
                
                $result = $conn->query($sql);

                if($result->num_rows>0){
                    echo"<h2>Logeo exitoso espere...</h2>";
                    echo'<i class="far fa-check-circle"></i>';
                    $_SESSION['isLogged']=true;
                    header("Location: ../../admin/vista/usuario/index.php");
                }else{
                    echo"<h2>Datos de inicio incorrectos....</h2>";
                    echo'<i class="fas fa-exclamation-circle"></i>';
                    header("Location: ../vista/login.html?error");
                }
                $conn->close();
            ?>
        </div>
    </section>
</body>

</html>