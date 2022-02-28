<?php

include_once 'usuarios.php';

class ApiUsuarios{


    function getAll(){
        $usuario = new Usuarios();
        $usuarios = array();
        $usuarios["items"] = array();

        $res = $usuario->getUsuarios();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id_usuario'],
                    "alias_user" => $row['alias'],
                    "nombre_user" => $row['nombre'],
                    "fechacrea" => $row['f_creacion'],
                    "psw" => $row['password'],
                    "estado" => $row['status'],
                    "tipouser" => $row['id_tipo_usuario'],
                );
                array_push($usuarios["items"], $item);
            }
        
            echo json_encode($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $usuario = new Usuarios();
        $usuarios = array();
        $usuarios["items"] = array();

        $res = $usuario->getUsuarioByID($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "id" => $row['id_usuario'],
                "alias_user" => $row['alias'],
                "nombre_user" => $row['nombre'],
                "fechacrea" => $row['f_creacion'],
                "psw" => $row['password'],
                "estado" => $row['status'],
                "tipouser" => $row['id_tipo_usuario'],
            );
            array_push($usuarios["items"], $item);
            $this->printJSON($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }


    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }
}

?>