<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin_style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dashboard</title>
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
                }
            ?>
        </div>
    </header>
    <div id="contenedor">
        <section>
            <table>
                <thead>
                    <tr>
                        <td>Cedula</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Direccion</td>
                        <td>Email</td>
                        <td>Telefono</td>
                        <td>Fecha Nacimiento</td>
                        <td>Eliminar</td>
                        <td>Modificar</td>
                        <td>Cambiar contraseña</td>
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
                    <?php
                    if(isset($_SESSION['nombre'])){
                        include'../../../config/conexionBD.php';
                        $sql = "SELECT * FROM usuario";
                        $result = $conn->query($sql);
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                echo"<tr>";
                                echo"<td>".$row["usu_cedula"]."</td>";
                                echo"<td>".$row["usu_nombres"]."</td>";
                                echo"<td>".$row["usu_apellidos"]."</td>";
                                echo"<td>".$row["usu_direccion"]."</td>";
                                echo"<td>".$row["usu_telefono"]."</td>";
                                echo"<td>".$row["usu_correo"]."</td>";
                                echo"<td>".$row["usu_fecha_nacimiento"]."</td>";
                                if((string)$row["usu_eliminado"]==='N'){
                                    echo'<td><a href="../../controladores/deleteUser.php?usu_cod='.$row["usu_codigo"].'&delete='.true.'">Eliminar</a></td>';
                                }else{
                                    echo'<td><a href="../../controladores/deleteUser.php?usu_cod='.$row["usu_codigo"].'&delete='.false.'">Activar</a></td>';
                                }
                                echo'<td><a href="#">Modificar</a></td>';
                                echo'<td><a href="#">Cambiar contraseña</a></td>';
                                echo"</tr>";
                            }
                        }else{
                            echo"<tr>";
                            echo'<td colspan="10" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
                            echo"</tr>"; 
                        } 
                        $conn->close();
                    }else{
                        header("Location: ../../../public/vista/login.php");
                    }
                    ?>  
                </tbody>
            </table>
            <?php 
                $cod = isset($_GET["delete"]) ? trim($_GET["delete"]):null; 
                if($cod==true){
                    echo"<p>Usuario eliminado</p>";
                }
            ?>
        </section>
    </div>
</body>
</html>