<?php
//establece la conexion
if ($_SERVER["REQUEST_METHOD"]=="POST"){

$servername ="localhost";
$username ="root";
$password="";
$dbname="inner_join";

$conn = new mysqli($servername,$username,$password,$dbname);

//verificamos la conecxion 
if($conn->connect_error){
    die ("conecxion fallida". $conn->connect_error);
}

//obtener los datos del formulario
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$puesto=$_POST['puesto'];
$edad=$_POST['edad'];

$sql= "INSERT INTO empleado(
    nombre,
    apellido,
    puesto,
    edad
    )
VALUES (
'$nombre',
'$apellido',
'$puesto',
'$edad'
)";
if ($conn -> query($sql)!==TRUE){
    echo "Error al Registrar ".$conn->error;
    exit;
}
$empleado_id= $conn-> insert_id;

$calle=$_POST['calle'];
$carrera=$_POST['carrera'];
$numero=$_POST['numero'];
$barrio=$_POST['barrio'];
$ciudad=$_POST['ciudad'];

$sql= "INSERT INTO direccion(
    calle,
    carrera,
    numero,
    barrio,
    ciudad
    )
VALUES (
'$calle',
'$carrera',
'$numero',
'$barrio',
'$ciudad'
)";
if ($conn -> query($sql)!==TRUE){
    echo "Error al Registrar ".$conn->error;
    exit;
}
echo"Registro exitoso";
$conn->close();
}
?>