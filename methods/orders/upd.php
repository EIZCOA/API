<?php

include_once 'apiOrders.php';
$api = new ApiOrder();

$nombre = '';
$error = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //echo ("Este es un POST");

        //Aqui inicializo variables de mi POST

        isset($_POST['id_pedido']);
        isset($_POST['id_cliente']);
        isset($_POST['id_tipo_pago']);
        isset($_POST['id_tipo_entrega']);
        isset($_POST['fh_entrega']);
        isset($_POST['destino_lat']);
        isset($_POST['destino_lon']);
        isset($_POST['comentarios']);

        //Mapeo los datos que viajan en mi POST para mandarlos a el metodo de agregar clientes
        $item = array(
            
            'id_pedido' => $_POST['id_pedido'],
            'id_cliente' => $_POST['id_cliente'],
            'id_tipo_pago' => $_POST['id_tipo_pago'],
            'id_tipo_entrega' => $_POST['id_tipo_entrega'],
            'fh_entrega' => $_POST['fh_entrega'],
            'destino_lat' => $_POST['destino_lat'],
            'destino_lon' => $_POST['destino_lon'],
            'comentarios' => $_POST['comentarios']
            
        );
        //Llamo el metdo add de mi clase APICustomer
        $api->upd($item);

    }else

    {
        $api->error("Error al consumir el API");
        //echo ("Error al consumir el API");
    }
    
?>
