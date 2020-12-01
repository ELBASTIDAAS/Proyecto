<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Sweet Alert- -->
   <link rel="stylesheet" href="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.min.css"/>
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
    .card{
        border: 2px solid grey;
    }
    
    .card-header{
        background-color:#D6DBDF;
    }

    .card-body{
        background-color:#F2F4F4;
        
       
    }

</style>


</head>

<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3>Usuario</h3>
            </div>

            <div class="card-body">
                <div class="card-title">
                    <a class="btn btn-secondary" href="javascript:history.back()">Regresar</a>
                </div>
                
                <ul class="list-group">
                    <li class="list-group-item">Código: <?= $usuario->idUsuario ?> </li>
                    <li class="list-group-item">Nombre: <?= $usuario->nombre ?></li>
                    <li class="list-group-item">Perfil: <?= $usuario->idPerfil ?></li>
                    <li class="list-group-item">Estado: <?= $usuario->estado ?></li>
                </ul>

            </div>
        </div>
    </div>
</body>
<script src="../plugins/SweetAlert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>
</html>
