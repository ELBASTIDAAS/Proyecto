<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario-Modificar</title>
    <!-- Sweet Alert- -->
    <link rel="stylesheet" href="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css" />
</head>

<body>

</body>
<script src="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>

</html>
<?php
$errores = '';
$frm_enviado = false;
if (isset($_POST['btn_enviar'])) {
    //recoger los valores enviados
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $rContraseña = $_POST['rContraseña'];
    $estado = (isset($_POST['estado'])) ? true : false;
    $idPerfil = (isset($_POST['idPerfil'])) ? $idPerfil = $_POST['idPerfil'] : '';


    if (!empty($nombre)) {
        $regexpNom = '/^[a-zA-Z Á]{4,20}$/';
        if (!filter_var($nombre, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $regexpNom]])) {
            $errores  .= " El nombre por lo menos debe tener más de 3 caracteres !! <br/>";
        }
    } else {
        $errores .= 'Debe ingresar un nombre de usuario <br/>';
    }
    if (!empty($rContraseña)) {
        $rContraseña = trim($rContraseña);
        $rContraseña = filter_var($rContraseña, FILTER_SANITIZE_STRING);
    } else {
        $errores  .= 'Debe confirmar la contraseña<br/>';
    }
    if (!empty($contraseña)) {
        $regexpCont = '/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{5,10})$/';
        if (!filter_var($contraseña, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $regexpCont]])) {
            $errores  .= "El equivalente de una contraseña, solo letras y dígitos entre 6 y 10 caracteres !! <br/>";
        }
    } else {
        $errores  .= 'Debe ingresar una contraseña<br/>';
    }

    if ($idPerfil == '') {
        $errores .= 'Elegir por lo menos un perfil.<br/>';
    }
    if (!empty($rContraseña)) {
        if ($contraseña != $rContraseña) {
            $errores .= 'Las contraseñas no coinciden!.<br/>';
        }
    }

    //enviar/guardar si no hay errores
    if (!$errores) {
        require_once '../modelo/Usuario.php';
        require_once '../control/UsuarioControl.php';
        $usuario = new Usuario($idUsuario, $nombre, $contraseña, $estado, $idPerfil);

        $usuarioControl = new UsuarioControl();


        $usuarioControl->modificar($usuario);


        // echo'<script type="text/javascript">
        //    alert("Usuario creado exitosamente!");
        //   window.location.href="../index.php";
        //   </script>';

    }
} elseif (isset($_GET['idUsuario']) && !isset($_POST['btn_enviar'])) {
    $idUsuario = $_GET['idUsuario'];
    require_once '../control/UsuarioControl.php';
    $usuarioControl = new UsuarioControl();

    $usuario = $usuarioControl->buscarPorId($idUsuario);

    $idUsuario = $usuario->idUsuario;
    $nombre = $usuario->nombre;
    $contraseña = $usuario->contraseña;
    $rContraseña = $usuario->contraseña;
    $estado = $usuario->estado;
    $idPerfil = $usuario->idPerfil;
}

require_once 'usuario_vista_modificar.php';
?>