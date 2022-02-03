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
        // Si el usuario hace click en el boton "Agregar postulante" 
        if(isset($_POST['enviar'])){
            //Se guardan los datos ingresados por el usuario en variables
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $fechanac = $_POST['fechanac'];
            $dni = $_POST['dni'];
            $edad = $_POST['edad'];
            $estado = $_POST['estado'];
            $area = $_POST['area'];
            //Se incluye el archivo para la conexion con la base de datos
            include("conexion.php");
            //Se escribe el query de inserción de datos a la tabla Postulante
            $sql="INSERT INTO postulante(Post_Nombre,Post_Apellidos,Post_FechaNac,Post_DNI,Post_Edad,Estado_ID,Area_ID) 
                  VALUES ('".$nombres."','".$apellidos."','".$fechanac."','".$dni."','".$edad."','".$estado."','".$area."')";
            //Se guarda el resultado de la query en una variable
            $resultado=mysqli_query($conexion,$sql);
            if($resultado){
                //Si el resultado y la inserción es correcto, se envia mensaje satisfactorio
                    echo " <script language='JavaScript'>
                            alert('Los datos fueron ingresados');
                            location.assign('index.php');
                            </script>";
            }else{
                //Si el resultado e inserción falla, se envía mensaje de error
                echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron ingresados');
                location.assign('index.php');
                </script>";
            }
            //Se cierra la conexión con la base de datos
            mysqli_close($conexion);
        }
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

    <h3 align="center">Agregar a nuevo postulante</h3>
    
    <!-- Se crea formulario para la obtención de datos del postulante -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nombres:</label>
            <input type="text" class="form-control" name="nombres"> 
        </div>
        <div class="col-md-6">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos"> 
        </div>
        <div class="col-md-6">
            <label class="form-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fechanac"> 
        </div>
        <div class="col-md-6">
            <label class="form-label">DNI:</label>
            <input type="text" class="form-control" name="dni"> 
        </div>
        <div class="col-md-6">
            <label class="form-label">Edad:</label>
            <input type="number" class="form-control" name="edad">
        </div>
        <div class="col-md-2">
            <label class="form-label">Estado:</label> 
                <select class="form-select" name="estado">
                    <option value="1">Aceptado</option>
                    <option value="2">En proceso</option>
                    <option value="3">Rechazado</option>
                </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Area a la que postula:</label> 
                <select class="form-select" name="area">
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
                </select>
        </div>
        <div class="col-12" align="center">
            <input type="submit" name="enviar" value="Agregar postulante">
        </div>
    </form>
</body>
</html>