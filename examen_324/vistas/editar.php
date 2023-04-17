<?php
include("../conexion.php");
session_start();
if ($_SESSION['session']['ingreso'] != 'si') {

    header("location:http://" . $_SERVER['HTTP_HOST'] . "/examen_354/login.php?error=2");
    die();
}
$var = $_SESSION['session']['materia'];




if(isset ($_POST['Actualizar'])){
    $ci_persona = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    

    $final = ($nota1 + $nota2 + $nota3)/3;

    $consulta2="UPDATE persona SET nombre = '$nombre' , telefono ='$telefono' WHERE ci = '$ci_persona'";
    $res = mysqli_query($con, $consulta2);
    $consulta1="UPDATE inscripcion SET nota1='$nota1', nota2='$nota2', nota3='$nota3',notafinal='$final' WHERE ci='$ci_persona' and sigla ='$var'";
    $res1 = mysqli_query($con, $consulta1);
    if($res1){
        header("location:informatica.php");
    }  
}

if(empty($_GET['ci'])){
    header('location: '.$var.'.php');
}

$ci_persona = $_GET['ci'];

$consulta="Select xp.ci,xp.nombre, xp.telefono, xi.nota1, xi.nota2, xi.nota3 
           From persona xp, inscripcion xi
           Where xp.ci = '$ci_persona'
           and xi.ci = '$ci_persona'
           and xi.sigla = '$var'";
           
$sql=mysqli_query($con, $consulta);
if(mysqli_num_rows($sql)==0){
    header('location: ../index.php');
}else{
    while($data = mysqli_fetch_array($sql)){
        $ci_persona = $data['ci'];
        $nombre = $data['nombre'];
        $telefono = $data['telefono'];
        $nota1 = $data['nota1'];
        $nota2 = $data['nota2'];
        $nota3 = $data['nota3'];
    }
}







?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Portfolio</title>
    <link rel="stylesheet" href="../assets/css/estilo2.css">
</head>

<body>
    <!-- MENU ENCABEZADO -->
    <div class="contenedor-header">
        <header>
            <div class="logo">
                <a href="#">FACULDAD DE CIENCIAS PURAS Y NATURALES</a>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="../index.php">INICIO</a></li>
                    <li><a href="matematicas.php">MATEMATICAS</a></li>
                    <li><a href="informatica.php">INFORMATICA</a></li>
                    <li><a href="quimica.php">QUIMICA</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>
                </ul>
            </nav>
            <div class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </header>
    </div>

    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
        <div class="contenido-palabra">
            <h2>EDITAR</h2>
        </div>
        <div class="contenido-banner">
            <div class="container">
                <form action="editar.php" method="POST">
                    <div class="form first">
                        <div class="details personal">
                            <span class="title">Detalles del estudiante</span>

                            <div class="fields">
                                <div class="input-field">
                                    <input name="ci" id="ci" type="hidden" placeholder="Ingrese Nombre" value="<?php echo $ci_persona ?>">
                                </div>
                                <div class="input-field">
                                    <label>Nombre de la persona</label>
                                    <input name="nombre" id="nombre" type="text" placeholder="Ingrese Nombre" value="<?php echo $nombre ?>">
                                </div>

                                <div class="input-field">
                                    <label>Telefono</label>
                                    <input id="telefono" name="telefono" type="text" placeholder="Ingrese Nombre" value="<?php echo $telefono ?>">
                                </div> 
                                <div class="input-field">
                                    <label>Nota 1</label>
                                    <input id="nota1" name="nota1" type="text" placeholder="Ingrese Nombre" value="<?php echo $nota1 ?>">
                                </div>
                                <div class="input-field">
                                    <label>Nota 2</label>
                                    <input id="nota2" name="nota2" type="text" placeholder="Ingrese Nombre" value="<?php echo $nota2 ?>">
                                </div>
                                <div class="input-field">
                                    <label>Nota 3</label>
                                    <input id="nota3" name="nota3" type="text" placeholder="Ingrese Nombre" value="<?php echo $nota2 ?>">
                                </div>
                                <div>
                                    <input class="boton boton-editar" style="width: 50%;" type="submit" value="Actualizar" name="Actualizar">
                                </div>
                                

                            </div>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </section>

    <footer>
        <a href="#inicio" class="arriba">
            <i class="fa-solid fa-angles-up"></i>
        </a>
        <div class="redes">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-skype"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-solid fa-rss"></i></a>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>