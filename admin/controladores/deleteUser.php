<?php
    include'../../config/conexionBD.php';
    $cod= isset($_GET["usu_cod"]) ? trim($_GET["usu_cod"]):null;             
    //$cod=$row["usu_codigo"];
    $delete = isset($_GET["delete"]) ? trim($_GET["delete"]):null;
    $delete;
    if($cod!=null and $delete==true){
        $sql= "UPDATE usuario SET usu_eliminado='S' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        $delete;
        header("Location: ../vista/usuario/index.php");
    }elseif($cod!=null and $delete==false){
        $sql= "UPDATE usuario SET usu_eliminado='N' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        $delete;
        header("Location: ../vista/usuario/index.php");
    }else{
        header("Location: ../vista/usuario/index.php");
    }
    $conn->close();
?>
