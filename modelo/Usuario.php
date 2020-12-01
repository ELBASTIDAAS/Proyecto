<?php

class Usuario{
    private $idUsuario;
    private $nombre;
    private $contraseña;    
    private $estado;
    private $idPerfil;

    private $perfil;
    

    public function __construct($idUsuario,$nombre,$contraseña,$estado,$idPerfil){
        $this->idUsuario=$idUsuario;
        $this->nombre=$nombre;
        $this->contraseña=$contraseña;
        $this->estado=$estado;
        $this->idPerfil=$idPerfil;
    }


    public function getIdUsuario (){
        return $this->idUsuario;
    }
    public function getContraseña (){
        return $this->contraseña;
    }
    public function getNombre (){
        return $this->nombre;
    }
    public function getEstado (){
        return $this->estado;
    }
    public function getIdPerfil (){
        return $this->idPerfil;
    }

    function getPerfil() {
        return $this->perfil;
      }


    public function setIdUsuario ($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setContraseña ($contraseña){
        $this->contraseña = $contraseña;
    }
    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
    public function setEstado ($estado){
         $this->estado = $estado;
    }
    public function setIdPerfil ($idPerfil){
        $this->idPerfil = $idPerfil;
   }

   function setPerfil($perfil) {
    $this->perfil = $perfil;
  }


    public function __toString() {
        return 'Usuario: ' . $this->nombre . ', ' . $this->estado;
    }
    
}