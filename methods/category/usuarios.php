<?php

define("PROJECT_ROOT_PATH", __DIR__ . "/../");
 
// include main configuration file (DB Connection)
require_once PROJECT_ROOT_PATH."../methods/config/db.php";

class Usuarios extends DB{
    
    function getUsuarios(){
        $query = $this->connect()->query('SELECT * FROM usuarios');
        return $query;
    }

    function deleteUsuarios(){
        $query = $this->connect()->query('DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = 1');
        return $query;
    }

}

?>
