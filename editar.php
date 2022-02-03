<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD ConsigueVentas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <?php
        if(isset($_POST['enviar'])){
            //Si se envian los cambios del postulante
            //Se guardan los datos nuevos en variables
            $id=$_POST['post_id'];
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $fechanac=$_POST['fechanac'];
            $dni=$_POST['dni'];
            $edad=$_POST['edad'];
            $estado=$_POST['estado'];
            $area=$_POST['area'];
            //Se realiza el query para la modificación de datos del postulante según su ID
            $sql="UPDATE postulante SET Post_Nombre='".$nombres."', Post_Apellidos='".$apellidos."', Post_FechaNac='".$fechanac."', 
                  Post_DNI='".$dni."', Post_Edad='".$edad."', Estado_ID='".$estado."', Area_ID='".$area."' WHERE Post_ID='".$id."'";
            //Se almacena el resultado de la query en una variable
            $resultado=mysqli_query($conexion,$sql);
            if($resultado){
                //Si el resultado es correcto, se muestra mensaje exitoso
                echo " <script language='JavaScript'>
                        alert('Los datos se actualizaron');
                        location.assign('index.php');
                        </script>";
            }else{
                //Si el resultado no es correcto, se muestra mensaje de error
                echo "<script language='JavaScript'>
                      alert('Los datos NO se actualizaron');
                      location.assign('index.php');
                      </script>";
            }
            //Se cierra la conexion a la base de datos
            mysqli_close($conexion);
        }else{
            //El usuario no ha presionado el boton para configurar y guardar nuevos cambios
            //Se obtiene el id pasado como variable
            $id=$_GET['id'];
            //Se obtiene los datos del postulante segun su ID
            $sql="SELECT * FROM postulante WHERE Post_ID = '".$id."'";
            //Se almacena el resultado de la query en una variable
            $resultado=mysqli_query($conexion,$sql);
            //Se ordenan los datos del postulante en un arreglo
            $fila=mysqli_fetch_assoc($resultado);
            //Se almacenan los datos en variables
            $nombres=$fila["Post_Nombre"];
            $apellidos=$fila["Post_Apellidos"];
            $fechanac=$fila["Post_FechaNac"];
            $dni=$fila["Post_DNI"];
            $edad=$fila["Post_Edad"];
            $estado=$fila["Estado_ID"];
            $area=$fila["Area_ID"];
            //Se cierra la conexion a la base de datos
            mysqli_close($conexion);
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">CRUD Consigue Ventas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Regresar al inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h3 align="center">Editar Postulante</h3>
    <!-- Se crea el formulario para mostrar los datos y cambiarlos a gusto del usuario -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nombres:</label>
            <input type="text" class="form-control" name="nombres" value="<?php echo $nombres; ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos; ?>">
            </div>
        <div class="col-md-6">
            <label class="form-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fechanac" value="<?php echo $fechanac; ?>">  
        </div>
        <div class="col-md-6">
            <label class="form-label">DNI:</label>
            <input type="text" class="form-control" name="dni" value="<?php echo $dni; ?>">  
        </div>
        <div class="col-md-6">
            <label class="form-label">Edad:</label>
            <input type="number" class="form-control" name="edad" value="<?php echo $edad; ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label">Estado:</label> 
                <select class="form-select" name="estado">
                    <option <?php if($estado == 1){echo("selected");}?> value="1">Aceptado</option>
                    <option <?php if($estado == 2){echo("selected");}?> value="2">En proceso</option>
                    <option <?php if($estado == 3){echo("selected");}?> value="3">Rechazado</option>
                </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Area a la que postula:</label> 
                <select class="form-select" name="area">
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
                </select>
        </div>
        
        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
        
        <div class="col-12" align="center">
            <input type="submit" name="enviar" value="Actualizar postulante">
        </div>

    </form>
    <?php
        }
    ?>
</body>
</html>