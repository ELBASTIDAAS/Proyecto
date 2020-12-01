<?php
require_once '../control/UsuarioControl.php';
$usuarioControl = new UsuarioControl();
$usuarios = $usuarioControl->buscarTodos();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
    <script src="../js/jquery.dataTables.min.js"></script>

    <!-- Sweet Alert- -->
    <link rel="stylesheet" href="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <style>
        body {

            background: url(../images/spare.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: contain;
            background-size: cover;
            width: cover;
        }

        .card {
            border: 2px solid grey;

        }

        .card-header {
            background-color: #D6DBDF;
        }

        .card-body {
            background-color: #F2F4F4;


        }
    </style>


    </body>

</head>


<body>
    <div class="container py-5">

        <div class="card">
            <div class="card-header">
                <h3>Listado tipo de Usuarios</h3>
            </div>
            <div class="card-body">

                <div class="card-title">
                    <div style="text-align: right;">
                        <a class="btn btn-sm btn-info" href="../vistaPagina.html">Regresar</a>
                    </div>
                    <a class="" href="usuario_agregar.php"><img src="../recursos/img/add1.png" width="24" height="24" title="Crear" alt="crear" /></a>

                </div>
                <table class="table table-striped table-sm" id="myTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Contraseña</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $cli) : ?>
                            <tr>
                                <td><?= $cli->idUsuario ?> </td>
                                <td><?= $cli->nombre ?> </td>
                                <td><?= $cli->contraseña ?> </td>
                                <td><?= $cli->descripcion ?> </td>
                                <td><?= ($cli->estado) ? 'Activo' : 'Inactivo' ?> </td>

                                <td class="text-center">
                                    <a onclick="Swal.fire({title: '¿Estás seguro que deseas eliminar?',text:'El cambio no será reversible!',icon: 'warning',showCancelButton: true,confirmButtonText: `Si, Eliminar`,cancelButtonText:`Cancelar`,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',}).then((result) => {
                                    if (result.value) {
                                        window.location.href = 'usuario_eliminar.php?idUsuario=<?= $cli->idUsuario ?>';
                                } else if (!result.value) {
                                    Swal.fire('Se ha cancelado la eliminacion!', '', 'info')
                                }})" class=""><img src="../recursos/img/del2.png" width="16" height="16" title="Eliminar" alt="eliminar" /></a>
                                    <a class="" href="usuario_modificar.php?idUsuario=<?= $cli->idUsuario ?>"><img src="../recursos/img/edit2.png" width="16" height="16" title="Modificar" alt="modificar" /> </a>
                                    <a class="" href="usuario_consultar.php?idUsuario=<?= $cli->idUsuario ?>"><img src="../recursos/img/view2.png" width="16" height="16" title="Ver mas ..." alt="Ver mas ..." /> </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
<script src="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>

</html>