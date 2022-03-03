<?php

include_once 'orders.php';

class ApiOrder{


    function getAll(){
        $order = new Orders();
        $orders = array();
        $orders["items"] = array();

        $res = $order->getOrders();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id_pedido" => $row['id_pedido'],
                    "id_cliente" => $row['id_cliente'],
                    "id_tipo_pago" => $row['id_tipo_pago'],
                    "id_tipo_entrega" => $row['id_tipo_entrega'],
                    "fh_entrega" => $row['fh_entrega'],
                    "destino_lat" => $row['destino_lat'],
                    "destino_lon" => $row['destino_lon'],
                    "comentarios" => $row['comentarios'],
                );
                array_push($orders["items"], $item);
            }
        
            echo json_encode($orders);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $order = new Orders();
        $orders = array();
        $orders["items"] = array();

        $res = $order->getOrdersByID($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "id_pedido" => $row['id_pedido'],
                    "id_cliente" => $row['id_cliente'],
                    "id_tipo_pago" => $row['id_tipo_pago'],
                    "id_tipo_entrega" => $row['id_tipo_entrega'],
                    "fh_entrega" => $row['fh_entrega'],
                    "destino_lat" => $row['destino_lat'],
                    "destino_lon" => $row['destino_lon'],
                    "comentarios" => $row['comentarios'],
            );
            array_push($orders["items"], $item);
            $this->printJSON($orders);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    //Funcion para agregar mis ordenes
    function add($item){
        $order = new Orders();
        $res = $order->addOrder($item);
        $this->exito('Orden agregada con exito');  
    }
    //Funcion para modificar mis ordenes
    function upd($item){
        $order = new Orders();
        $res = $order->updOrder($item);
        $this->exito('Orden modificada con exito');  
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