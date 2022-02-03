<?php
// Usamos php para realizar la conexion a la base de datos MysQL
$dbnombre="crud"; //Guardamos en una variable el nombre de la Base de Datos a utilizar
$dbusuario="root"; //Guardamos en una variable el usuario por defecto de la Base de Datos (root)
$dbhost="localhost"; //Guardamos en una variable el host donde se encuentra la base de datos (localhost)
$dbcontraseña="admin123"; //Guardamos en una variable la contraseña del usuario (En mi caso admin123, aunque puede estar vacío "")
//Realizamos la conexion con mysqli_connect
$conexion=mysqli_connect($dbhost,$dbusuario,$dbcontraseña,$dbnombre);
?>