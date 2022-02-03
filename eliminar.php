<?php
    $id=$_GET['id'];
    include("conexion.php");

    $sql="DELETE FROM postulante WHERE Post_ID ='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos del postulante se eliminaron');
        location.assign('index.php');
        </script>";
    }else{
        echo "<script languaje='JavaScript'>
        alert('Los datos del postulante NO se eliminaron');
        location.assign('index.php');
        </script>";
    }

?>