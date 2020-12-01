<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar</title>
    <link rel="stylesheet" href="plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css" />
</head>

<body>

</body>
<script src="plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>

</html>
<?php

$numControl = $_POST['numControl'];
$contraseña = $_POST['contraseña'];


//conectar a la bd
$conexion = mysqli_connect("localhost", "root", "", "dbalimentatec");

$consulta = "SELECT * FROM usuario WHERE numControl='$numControl' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);




if ($filas > 0) {
    header("location:Principal/index.html");

} else {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Número de control o usuario incorrectos');
    window.location.href='login.html';
    </script>");
}



mysqli_free_result($resultado);
mysqli_close($conexion);
?>