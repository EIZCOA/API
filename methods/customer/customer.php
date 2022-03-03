<?php

define("PROJECT_ROOT_PATH", __DIR__ . "/../");
 
// include main configuration file (DB Connection)
require_once PROJECT_ROOT_PATH."../methods/config/db.php";

class Usuarios extends DB{
    
    //Obtengo todos los usuarios
    function getUsuarios(){
        $query = $this->connect()->query('SELECT * FROM usuarios');
        return $query;
    }

    //Obtengo 1 usuario en especifico

    function getUsuarioByID($id){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE id_usuario = :id');
        $query->execute(['id' => $id]);
        return $query;

    }

    //Para la funcion de agregar vamos a declarar el $usuario como array
    function addUsuario($usuario){
        $query = $this->connect()->prepare('INSERT INTO usuarios (alias, nombre, f_creacion, contrasena, estado, id_tipo_usuario) VALUES (:alias , :nombre, :f_creacion, :contrasena , :estado , :id_tipo_usuario);');
        $query->execute(['alias' => $usuario['alias'],'nombre' => $usuario['nombre'],'f_creacion' => $usuario['f_creacion'],'contrasena' => $usuario['contrasena'],'estado' => $usuario['estado'],'id_tipo_usuario' => $usuario['id_tipo_usuario']]);
        return $query;
    }

    function updUsuario($usuario){
        $query = $this->connect()->prepare('UPDATE usuarios SET alias = :alias , nombre = :nombre , f_creacion = :f_creacion, contrasena = :contrasena, estado = :estado , id_tipo_usuario = :id_tipo_usuario WHERE id_usuario = :id_usuario');
        $query->execute(['alias' => $usuario['alias'],'nombre' => $usuario['nombre'],'f_creacion' => $usuario['f_creacion'],'contrasena' => $usuario['contrasena'],'estado' => $usuario['estado'],'id_tipo_usuario' => $usuario['id_tipo_usuario'], 'id_usuario' => $usuario['id_usuario']]);
        return $query;
    }

    //Funcion de ejemplo
    function nuevaPelicula($pelicula){
        $query = $this->connect()->prepare('INSERT INTO pelicula (nombre, imagen) VALUES (:nombre, :imagen)');
        $query->execute(['nombre' => $pelicula['nombre'], 'imagen' => $pelicula['imagen']]);
        return $query;
    }

}

?>
