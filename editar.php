<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Postulante</title>
</head>
<body>

    <?php
        if(isset($_POST['enviar'])){
            $id=$_POST['post_id'];
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $fechanac=$_POST['fechanac'];
            $dni=$_POST['dni'];
            $edad=$_POST['edad'];
            $estado=$_POST['estado'];
            $area=$_POST['area'];

            $sql="UPDATE postulante SET Post_Nombre='".$nombres."', Post_Apellidos='".$apellidos."', Post_FechaNac='".$fechanac."', 
                  Post_DNI='".$dni."', Post_Edad='".$edad."', Estado_ID='".$estado."', Area_ID='".$area."' WHERE Post_ID='".$id."'";
            $resultado=mysqli_query($conexion,$sql);
            if($resultado){
                echo " <script language='JavaScript'>
                        alert('Los datos se actualizaron');
                        location.assign('index.php');
                        </script>";

            }else{
                echo "<script language='JavaScript'>
                      alert('Los datos NO se actualizaron');
                      location.assign('index.php');
                      </script>";
            }
            mysqli_close($conexion);
        }else{
            $id=$_GET['id'];
            $sql="SELECT * FROM postulante WHERE Post_ID = '".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $nombres=$fila["Post_Nombre"];
            $apellidos=$fila["Post_Apellidos"];
            $fechanac=$fila["Post_FechaNac"];
            $dni=$fila["Post_DNI"];
            $edad=$fila["Post_Edad"];
            $estado=$fila["Estado_ID"];
            $area=$fila["Area_ID"];

            mysqli_close($conexion);
    ?>

    <h1>Editar Postulante</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombres:</label>
        <input type="text" name="nombres" value="<?php echo $nombres; ?>"> <br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $apellidos; ?>"> <br>
        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fechanac" value="<?php echo $fechanac; ?>"> <br>
        <label>DNI:</label>
        <input type="text" name="dni" value="<?php echo $dni; ?>"> <br>
        <label>Edad:</label>
        <input type="number" name="edad" value="<?php echo $edad; ?>"> <br>
        <label>Estado:</label> 
        <select name="estado">
            <option <?php if($estado == 1){echo("selected");}?> value="1">Aceptado</option>
            <option <?php if($estado == 2){echo("selected");}?> value="2">En proceso</option>
            <option <?php if($estado == 3){echo("selected");}?> value="3">Rechazado</option>
        </select> <br>
        <label>Area a la que postula:</label> 
        <select name="area"> <br>
            <option <?php if($area == 1){echo("selected");}?> value="1">Asistente de ventas</option>
            <option <?php if($area == 2){echo("selected");}?> value="2">SEO</option>
            <option <?php if($area == 3){echo("selected");}?> value="3">SEM</option>
            <option <?php if($area == 4){echo("selected");}?> value="4">Analytics</option>
            <option <?php if($area == 5){echo("selected");}?> value="5">Diseñador Web/Email</option>
            <option <?php if($area == 6){echo("selected");}?> value="6">Administración y Calidad</option>
            <option <?php if($area == 7){echo("selected");}?> value="7">Secretariado</option>
            <option <?php if($area == 8){echo("selected");}?> value="8">Community Manager</option>
            <option <?php if($area == 8){echo("selected");}?> value="9">Diseño Grafico</option>
            <option <?php if($area == 10){echo("selected");}?> value="10">Audiovisual</option>
            <option <?php if($area == 11){echo("selected");}?> value="11">Content Manager</option>
            <option <?php if($area == 12){echo("selected");}?> value="12">Relaciones Publicas</option>
            <option <?php if($area == 13){echo("selected");}?> value="13">Talento Humano</option>
            <option <?php if($area == 14){echo("selected");}?> value="14">Big Data</option>
            <option <?php if($area == 15){echo("selected");}?> value="15">Software Tester</option>
            <option <?php if($area == 16){echo("selected");}?> value="16">Maquetador Web</option>
            <option <?php if($area == 17){echo("selected");}?> value="17">Front End</option>
            <option <?php if($area == 18){echo("selected");}?> value="18">Desarrollador de Software Backend</option>
            <option <?php if($area == 19){echo("selected");}?> value="19">Administracion de Base de Datos</option>
            <option <?php if($area == 20){echo("selected");}?> value="19">Documentacion Analista</option>
        </select> <br>
        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
        <input type="submit" name="enviar" value="Actualizar postulante">
        <a href="index.php">Regresar</a>

    </form>
    <?php
        }
    ?>
</body>
</html>