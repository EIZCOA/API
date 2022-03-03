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
                    "psw" => $row['contrasena'],
                    "estado" => $row['estado'],
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
                "psw" => $row['contrasena'],
                "estado" => $row['estado'],
                "tipouser" => $row['id_tipo_usuario'],
            );
            array_push($usuarios["items"], $item);
            $this->printJSON($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    //Funcion para agregar mis usuarios
    function add($item){
        $usuario = new Usuarios();
        $res = $usuario->addUsuario($item);
        $this->exito('Usuario agregado con exito');  
    }
    //Funcion para modificar mis usuarios
    function upd($item){
        $usuario = new Usuarios();
        $res = $usuario->updUsuario($item);
        $this->exito('Usuario modificado con exito');  
    }

    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }
}

?>