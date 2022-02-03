<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD ConsigueVentas</title>
    <!-- Ingresamos una funcion para confirmar la eliminación del postulante -->
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Deseas eliminar al postulante?');
        }
    </script>
    <!-- Agregamos algunos estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
        //Agregamos el archivo conexion para comunicarnos con la base de datos
        include("conexion.php");
        //Query de consulta para conseguir datos de los postulantes
        $sql="SELECT Post_ID, Post_Nombre, Post_Apellidos, Post_FechaNac, Post_DNI, Post_Edad,Estado_Nombre, Area_Nombre
              FROM postulante
              JOIN estado
              ON postulante.Estado_ID = estado.Estado_ID
              JOIN area
              ON postulante.Area_ID = area.Area_ID";
        //Almacenamos los datos obtenido en una variable resultados
        $resultado=mysqli_query($conexion,$sql);
    ?>
    <!-- Barra de Navegacion para la página -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">CRUD Consigue Ventas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="agregar.php">Nuevo Postulante</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Creamos una tabla para mostrar la información de la Base de Datos -->
    <table class="table table-sm caption-top">
        <caption>Lista de Practicantes 2022</caption>
        <thead align="center" class="table-light"> 
            <tr>
                <th>Nro. Postulante</th>
                <th>Nombre del Postulante</th>
                <th>Apellidos del Postulante</th>
                <th>Fecha de Nacimiento</th>
                <th>DNI del Postulante</th>
                <th>Edad del Postulante</th>
                <th>Estado del Postulante</th>
                <th>Área de Práctica</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Por cada registro almacenado, se mostrara los resultados 
                while($filas = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td align="center"> <?php echo $filas['Post_ID'] ?></td>
                <td> <?php echo $filas['Post_Nombre'] ?></td>
                <td> <?php echo $filas['Post_Apellidos'] ?></td>
                <td align="center"> <?php echo $filas['Post_FechaNac'] ?></td>
                <td align="center"> <?php echo $filas['Post_DNI'] ?></td>
                <td align="center"> <?php echo $filas['Post_Edad'] ?></td>
                <td align="center"> <?php echo $filas['Estado_Nombre'] ?></td>
                <td> <?php echo $filas['Area_Nombre'] ?></td>
                <td><a href="editar.php?id=<?php echo $filas['Post_ID']; ?>" class="btn btn-primary"> Editar </a></td>
                <td><a href="eliminar.php?id=<?php echo $filas['Post_ID']; ?>" onclick='return confirmar()' class="btn btn-danger"> Eliminar </a></td> 
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        //Luego de mostrar los datos, cerramos la conexión a la base de datos
        mysqli_close($conexion);
    ?>
</body>
</html>