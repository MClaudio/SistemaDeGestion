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
                <li><a href="../../../public/vista/crear_usuario.php">Rgistro</a></li>
                    <li><a href="index.php">Editar Usuario</a></li>
                </ul>
            </nav>
        </div>
        <div class="user">
            <?php
                session_start();
                if(isset($_SESSION['nombre'])){
                    echo"<p>Administrador: <span>".$_SESSION['nombre']."</span></p>";
                    echo"<a href='../../../public/controladores/sessionEnd.php'>Cerrar Sesion</a>";
                }else{
                    echo"<a href='../../../public/vista/login.php'>Iniciar Sesion</a>";
                    header("Location: ../../../public/vista/login.php");
                }
            ?>
        </div>
    </header>
    <section>
        <div class="formulario login">
            <h2>Cambiar contraseña</h2>
            
            <form action="../../controladores/updatePass.php?usu_cod=<?php $cod=$_GET["usu_cod"]; echo($cod); ?>" method="post">
                <input type="password" name="epass" id="epass" required placeholder="Contraseña existente">
                <input type="password" name="pass" id="pass" required placeholder="Nueva contraseña">
                <input type="password" name="cpass" id="cpass" required placeholder="Reapetir contraseña">
                <input type="submit" value="Cambiar">
            </form>
        </div>
    </section>
</body>

</html>