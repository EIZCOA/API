<?php

include_once 'apiCustomer.php';
$api = new ApiCustomer();

$nombre = '';
$error = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //echo ("Este es un POST");

        //Aqui inicializo variables de mi POST

        isset($_POST['id_usuario']);
        isset($_POST['nombre']);
        isset($_POST['apellido']);
        isset($_POST['f_nac']);
        isset($_POST['estado']);
        isset($_POST['genero']);
        isset($_POST['id_cliente']);

        //Mapeo los datos que viajan en mi POST para mandarlos a el metodo de agregar clientes
        $item = array(
            
            'id_usuario' => $_POST['id_usuario'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'f_nac' => $_POST['f_nac'],
            'estado' => $_POST['estado'],
            'genero' => $_POST['genero'],
            'id_cliente' => $_POST['id_cliente']
            
        );
        //Llamo el metdo add de mi clase APICustomer
        $api->upd($item);

    }else

    {
        $api->error("Error al consumir el API");
        //echo ("Error al consumir el API");
    }
    
?>
