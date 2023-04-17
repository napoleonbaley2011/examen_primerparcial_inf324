<?php
include("conexion.php");
$loco = "sdasdasda";

$usuario=$_POST['usr'];
$contraseña=$_POST['pass'];
//echo $contraseña;
$consulta = "Select xr.rol, xp.ci, xu.usuario, xp.nombre 
             From usuario xu,  persona xp, rol xr 
             Where xu.usuario='$usuario' and xu.password='$contraseña' and xu.ci = xp.ci and xr.ci=xp.ci;";

$res=mysqli_query($con,$consulta);

if(mysqli_num_rows($res)>0){
    session_start();
    $_SESSION['session']=array();
    $_SESSION['session']['ingreso']='si';
    if($reg=mysqli_fetch_array($res)){
        $_SESSION['session']['rol']=$reg['rol'];
        $_SESSION['session']['ci']=$reg['ci'];
        $_SESSION['session']['usuario']=$reg['usuario'];
        $_SESSION['session']['nombre']=$reg['nombre'];
    }

    if($_SESSION['session']['rol'] == "Estudiante"){
        header("location:index2.php");
    }else{
        header("location:index.php");
    }



}else{
    session_destroy();
    header("location:login.php");
}


?>