<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario-Agregar</title>
    <!-- Sweet Alert- -->
    <link rel="stylesheet" href="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css" />
</head>

<body>

</body>
<script src="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>

</html>
<?php
include '../conexion/Conexion.php';
$errores = '';
$frm_enviado = false;
if (isset($_POST['btn_enviar'])) {
    //recoger los valores enviados
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $rContraseña = $_POST['rContraseña'];

    if(!empty($email)){
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }else  {
        $errores .="Debe ingresar un correo electronico ";
    }

    //enviar/guardar si no hay errores
    if (!$errores) {


        $consulta = "SELECT * FROM usuario WHERE numControl='$idUsuario'";
        $conexion = mysqli_connect("localhost", "root", "", "dbalimentatec");
        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_num_rows($resultado);


        if ($filas > 0) {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('El número de control ya esta en uso!');
        window.location.href='../login.html';
        </script>");
        } else {
            $sql = "insert into usuario ('numControl', 'contraseña', 'nombre') values (?, ?, ?);";
            $sentencia = $pdo->prepare("INSERT INTO `dbalimentatec`.`usuario` (`numControl`, `contraseña`, `nombre`,`correo`) VALUES ('$idUsuario', '$contraseña', '$nombre','$email');");
            $sentencia->execute();
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('Usuario creado exitosamente');
        window.location.href='../login.html';
        </script>");
        }
    }
} elseif (isset($_GET['idUsuario']) && !isset($_POST['btn_enviar'])) {
    $idUsuario = $_GET['idUsuario'];
    require_once '../control/UsuarioControl.php';
    $usuarioControl = new UsuarioControl();

    $usuario = $usuarioControl->buscarPorId($idUsuario);

    $idUsuario = $usuario->idUsuario;
    $nombre = $usuario->nombre;
    $email = $usuario->email;
    $contraseña = $usuario->contraseña;
    $estado = $usuario->estado;
    $idPerfil = $usuario->idPerfil;
}

require_once 'usuario_vista_olvidar.php';
?>