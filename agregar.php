<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Postulante</title>
</head>
<body>

    <?php
        if(isset($_POST['enviar'])){
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $fechanac = $_POST['fechanac'];
            $dni = $_POST['dni'];
            $edad = $_POST['edad'];
            $estado = $_POST['estado'];
            $area = $_POST['area'];

            include("conexion.php");
            $sql="INSERT INTO postulante(Post_Nombre,Post_Apellidos,Post_FechaNac,Post_DNI,Post_Edad,Estado_ID,Area_ID) 
                  VALUES ('".$nombres."','".$apellidos."','".$fechanac."','".$dni."','".$edad."','".$estado."','".$area."')";
            $resultado=mysqli_query($conexion,$sql);
            
            if($resultado){
                    echo " <script language='JavaScript'>
                            alert('Los datos fueron ingresados');
                            location.assign('index.php');
                            </script>";
            }else{
                echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron ingresados');
                location.assign('index.php');
                </script>";
            }

            mysqli_close($conexion);
        }
    ?>

    <h1>Agregar a nuevo postulante</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombres:</label>
        <input type="text" name="nombres"> <br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos"> <br>
        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fechanac"> <br>
        <label>DNI:</label>
        <input type="text" name="dni"> <br>
        <label>Edad:</label>
        <input type="number" name="edad"> <br>
        <label>Estado:</label> 
        <select name="estado">
            <option value="1">Aceptado</option>
            <option value="2">En proceso</option>
            <option value="3">Rechazado</option>
        </select> <br>
        <label>Area a la que postula:</label> 
        <select name="area"> <br>
            <option value="1">Asistente de ventas</option>
            <option value="2">SEO</option>
            <option value="3">SEM</option>
            <option value="4">Analytics</option>
            <option value="5">Diseñador Web/Email</option>
            <option value="6">Administración y Calidad</option>
            <option value="7">Secretariado</option>
            <option value="8">Community Manager</option>
            <option value="9">Diseño Grafico</option>
            <option value="10">Audiovisual</option>
            <option value="11">Content Manager</option>
            <option value="12">Relaciones Publicas</option>
            <option value="13">Talento Humano</option>
            <option value="14">Big Data</option>
            <option value="15">Software Tester</option>
            <option value="16">Maquetador Web</option>
            <option value="17">Front End</option>
            <option value="18">Desarrollador de Software Backend</option>
            <option value="19">Administracion de Base de Datos</option>
            <option value="20">Documentacion Analista</option>
        </select> <br>
        <input type="submit" name="enviar" value="Agregar postulante">
        <a href="index.php">Regresar al inicio</a>
    </form>
</body>
</html>