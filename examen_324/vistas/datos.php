<?php
include("../conexion.php");
session_start();

$var = $_SESSION['session']['materia'];

$ci_persona = $_POST['ci'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha'];
$dep = $_POST['departamento'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];

$final = ($nota1 + $nota2 + $nota3)/3;

$consulta2="INSERT INTO persona (ci, nombre, fecha_nacimiento, telefono, departamento)values('$ci_persona','$nombre','$fecha_nacimiento','$telefono','$dep')";
$consulta3="INSERT INTO inscripcion(sigla, nota1, nota2, nota3, notafinal, ci)values('$var','$nota1','$nota2','$nota3','$final','$ci_persona')";
$res = mysqli_query($con,$consulta2);
$res1 = mysqli_query($con,$consulta3);
if($res1){
    header("Location:../index.php");
} 


?>