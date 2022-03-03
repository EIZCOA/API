<?php

include_once 'apiusuarios.php';
$api = new ApiUsuarios();

$nombre = '';
$error = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //echo ("Este es un POST");

        //Aqui inicializo variables de mi POST

        isset($_POST['alias']);
        isset($_POST['nombre']);
        isset($_POST['f_creacion']);
        isset($_POST['contrasena']);
        isset($_POST['estado']);
        isset($_POST['id_tipo_usuario']);
        isset($_POST['id_usuario']);

        //Mapeo los datos que viajan en mi POST para mandarlos a el metodo de agregar usuarios    
        $item = array(
            
            'alias' => $_POST['alias'],
            'nombre' => $_POST['nombre'],
            'f_creacion' => $_POST['f_creacion'],
            'contrasena' => $_POST['contrasena'],
            'estado' => $_POST['estado'],
            'id_tipo_usuario' => $_POST['id_tipo_usuario'],
            'id_usuario' => $_POST['id_usuario']
            
        );
        //Llamo el metdo add de mi clase APIUsuarios
        $api->upd($item);

    }else

    {
        $api->error("Error al consumir el API");
        //echo ("Error al consumir el API");
    }
    
?>
