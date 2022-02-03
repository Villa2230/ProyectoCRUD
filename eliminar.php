<?php
    //Se obtiene el ID del postulante a eliminar
    $id=$_GET['id'];
    //Se agrega la conexion para comunicarse con la base de datos
    include("conexion.php");
    //Se almacena la query en una variable
    $sql="DELETE FROM postulante WHERE Post_ID ='".$id."'";
    //Se almacena el resultado en una variable
    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        //Si el resultado es correcto y se elimino al postulante, se muestra un mensaje en pantalla
        echo "<script languaje='JavaScript'>
        alert('Los datos del postulante se eliminaron');
        location.assign('index.php');
        </script>";
    }else{
        //En caso de algún error, se muestra el mensaje en pantalla
        echo "<script languaje='JavaScript'>
        alert('Los datos del postulante NO se eliminaron');
        location.assign('index.php');
        </script>";
    }
?>