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


    function deleteUsuarios(){
        $query = $this->connect()->query('DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = 1');
        return $query;
    }

}

?>
