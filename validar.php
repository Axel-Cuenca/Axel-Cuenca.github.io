<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","proyecto_guia");

$consulta="SELECT*FROM usuario where usuario='$usuario' and Pass='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['idrol']==1){ //Director
    header("location:../administracion/alumnos.php");

}else
if($filas['idrol']==2){ //Profesor
header("location:../WEB/admin/bannerlist.php");
}

else
if($filas['idrol']==3){ //Alumnos
header("location:../pagina_alumnos/pagprincipalalumno.html");
}


else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
