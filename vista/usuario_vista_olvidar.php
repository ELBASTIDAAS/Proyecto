
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <!-- Sweet Alert- -->
    <link rel="stylesheet" href="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
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




        select {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h3>Recuperacion de contraseña</h3>
            </div>

            <div class="card-body">
                <div class="card-title"></div>
                <div style="text-align: right;">
                    <a class="btn btn-sm btn-info" href="../index.php">Regresar</a>
                </div>
                <form action="usuario_agregar.php" method="POST">
                    <div class="form-row">
                    <div class="form-group mx-sm-2 col-sm-3">
                            <label for="idUsuario">Número de control</label>
                            <input type="text" name="idUsuario" placeholder='Obligatorio Ingresar!' id="idUsuario" class="form-control" style="<?=($idUsuario=='')?"border-color: red;":''?> " value="<?= (isset($idUsuario) && !$frm_enviado) ? $idUsuario : '' ?>">
                        </div>   
                    <div class="form-group mx-sm-2 col-sm-3">
                            <label for="correo">Email</label>
                            <input type="text" name="carreo" placeholder='Obligatorio Ingresar!' id="correo" class="form-control" style="<?=($email=='')?"border-color: red;":''?> " value="<?= (isset($email) && !$frm_enviado) ? $email : '' ?>">
                        </div>
                    </div>
                    </div>


                    <div class="form-group">
                        <div class="form-check">
                            <input type="hidden" name="estado" checked id="estado" class="form-check-input" <?= (isset($estado) && !$frm_enviado && $estado == true) ? 'checked' : '' ?>>
                            <!--<label for="estado" class="form-check-label">Estado</label>-->
                        </div>
                    </div>

                   



                    <?php if (!empty($errores)) : ?>
                        <div class="alert alert-danger border border-danger">
                            <?= $errores ?>
                        </div>

                    <?php endif; ?>

                    <div class="form-group mx-sm-2">
                        <input type="submit" value="Enviar" name="btn_enviar" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>

</html>