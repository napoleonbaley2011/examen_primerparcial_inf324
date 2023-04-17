<?php
session_start();

include("../conexion.php");


$ci_persona =  $_REQUEST['ci'];
$var = $_SESSION['session']['materia'];
$consulta = "DELETE FROM inscripcion WHERE ci='$ci_persona' and sigla = '$var'";
$res= mysqli_query($con, $consulta);
if($res){
    header("location:../index.php");
}else{
    echo "ERROR AL ELIMINAR";
}
?>