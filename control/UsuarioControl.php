<?php
require_once '../modelo/Usuario.php';

class UsuarioControl
{
    public function __construct()
    {
        require_once '../conexion/Conect.php';
        try {
            $this->cnx = Conect::conectar();
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //listar-todos
    public function buscarTodos()
    {
        try {
            $sql = 'select u.idUsuario, u.nombre, u.contraseña,p.descripcion, u.estado from usuario u inner join perfil p on u.idPerfil = p.idPerfil';
            $prep = $this->cnx->prepare($sql);
            $prep->execute();
            $usuarios = $prep->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
        return $usuarios;
    }

    public function agregar($usuario)
    {
        try {
            $idUsuario = $usuario->getIdUsuario();

            $consulta = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
            $conexion = mysqli_connect("localhost", "root", "", "dbspare");
            $resultado = mysqli_query($conexion, $consulta);
            $filas = mysqli_num_rows($resultado);


            if ($filas > 0) {
                echo "<script type='text/javascript'>
                swal.fire('La clave primaria ya está en uso.')
                .then((value) => {
                 window.location.href='../Login.html';
                });
                </script>";
            } else {
                $sql = 'insert into usuario (idUsuario,nombre,contraseña,estado,idPerfil) values (?, ?, ?, ?, ?)';
                $prep = $this->cnx->prepare($sql);
                $prep->execute([
                    $usuario->getIdUsuario(),
                    $usuario->getNombre(),
                    $usuario->getContraseña(),
                    $usuario->getEstado(),
                    $usuario->getIdPerfil()
                ]);
                echo "<script type='text/javascript'>
                swal.fire('Usuario creado exitosamente!.', '', 'success')
                .then((value) => {
                 window.location.href='../Login.html';
                });
                </script>";
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //buscar/consultar por 
    public function buscarPorId($Usuario)
    {
        try {
            $sql = 'select * from usuario where idUsuario = ?';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([$Usuario]);
            $usuario = $prep->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
        return $usuario;
    }

    public function buscarPorNombre($Usuario)
    {
        try {
            $sql = 'select * from usuario where nombre = ?';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([$Usuario]);
            $usuario = $prep->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
        return $usuario;
    }

    //eliminar
    public function eliminar($Usuario)
    {
        try {
            $sql = 'update usuario set estado = 0 where idUsuario = ?';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([$Usuario]);
        } catch (PDOException $ex) {
            die("<script type='text/javascript'>
            swal.fire('No se puede eliminar debido a que existen datos dependientes', '', 'error')
            .then((value) => {
             window.location.href='../vista/usuarios_listar.php';
            });
        </script>");
        }
    }


    public function modificar($usuario)
    {
        try {
            $sql = 'update usuario set nombre = ?, contraseña = ?, idPerfil = ?, estado = ? where idUsuario = ?';
            $prep = $this->cnx->prepare($sql);
            $prep->execute([
                $usuario->getNombre(),
                $usuario->getContraseña(),
                $usuario->getIdPerfil(),
                $usuario->getEstado(),
                $usuario->getIdUsuario()
            ]);
            echo "<script type='text/javascript'>
            swal.fire('Usuario modificado satisfactoriamente!.', '', 'success')
            .then((value) => {
             window.location.href='usuarios_listar.php';
            });
            </script>";
            return true;
        } catch (PDOException $ex) {
            //die($ex->getMessage());
            return false;
        }
    }
}
