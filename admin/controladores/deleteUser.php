<?php
    include'../../config/conexionBD.php';
    $cod = isset($_GET["usu_cod"]) ? trim($_GET["usu_cod"]):null;             
     
    if($cod!=null){
        $sql= "UPDATE usuario SET usu_eliminado='S' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        header("Location: ../vista/usuario/index.php?delete=true");
    }else{
        header("Location: ../vista/usuario/index.php?delete=false");
    }
    $conn->close();
?>