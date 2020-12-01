<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario-Consultar</title>
    <!-- Sweet Alert- -->
   <link rel="stylesheet" href="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css"/>
</head>

<body>

</body>
<script src="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>
</html>
<?php
$idUsuario = $_GET['idUsuario'];

require_once '../control/UsuarioControl.php';
$usuarioControl = new UsuarioControl();
$usuario=$usuarioControl->buscarPorId($idUsuario);

require_once 'usuario_vista_consultar.php';
?>