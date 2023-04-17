<?php
    include("../conexion.php");
    session_start();
    if ($_SESSION['session']['ingreso'] != 'si') {

        header("location:http://" . $_SERVER['HTTP_HOST'] . "/examen_354/login.php?error=2");
        die();
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
			<h2>INFORMATICA</h2>
			<div class="derecha"><a class="boton-ad boton-ad-editar" href="adicionar.php?mat=<?php $_SESSION['session']['materia'] = "INF"?>">+ CREAR ESTUDIANTE</a></div>
			<p>La siguiente tabla muestra todos los estudiantes Informatica</p>
		</div>
        <div class="contenido-banner">
            <table>
                <thead>
                    <tr>
                        <td>SIGLA</td>
                        <td>NOMBRE</td>
                        <td>NOTA FINAL</td>
                        <td>ACCIONES</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $consulta1="Select xp.ci, xp.nombre, xi.sigla, xi.notafinal
                        From inscripcion xi, persona xp 
                        Where xi.sigla LIKE 'INF'   
                        AND xi.ci = xp.ci";
    
                        $res1 = mysqli_query($con, $consulta1);
                        if(mysqli_num_rows($res1)>0){
                            while($data = mysqli_fetch_array($res1)){
                                ?>
                                    <tr>
                                        <td><?php echo $data['sigla'] ?></td>
                                        <td><?php echo $data['nombre'] ?></td>
                                        <td><?php echo $data['notafinal'] ?></td>
                                        <td>
                                            <a class="boton-ad boton-ad-editar" href="editar.php?ci=<?php echo $data['ci']; $_SESSION['session']['materia'] = "INF"?>">Editar</a>
                                            <a class="boton-ad boton-ad-editar" href="eliminar.php?ci=<?php echo $data['ci']; $_SESSION['session']['materia'] = "INF"?>">Eliminar</a>
                                        </td>
                                    </tr>    
                                    
                            <?php  
                                }

                        }
                        
                    ?>
                </tbody>
            </table>
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