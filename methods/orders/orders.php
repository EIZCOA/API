<?php

define("PROJECT_ROOT_PATH", __DIR__ . "/../");
 
// include main configuration file (DB Connection)
require_once PROJECT_ROOT_PATH."../methods/config/db.php";

class Orders extends DB{
    
    //Obtengo todos las ordenes
    function getOrders(){
        $query = $this->connect()->query('SELECT * FROM pedido');
        return $query;
    }

    //Obtengo 1 orden en especifico

    function getOrdersByID($id){
        $query = $this->connect()->prepare('SELECT * FROM pedido WHERE id_pedido = :id');
        $query->execute(['id' => $id]);
        return $query;

    }

    //Para la funcion de agregar vamos a declarar la $orden como array
    function addOrder($order){
        $query = $this->connect()->prepare(
            'INSERT INTO pedido (
                id_cliente, 
                id_tipo_pago, 
                id_tipo_entrega, 
                fh_entrega,
                destino_lat,
                destino_lon,
                comentarios) 
                VALUES (
                :id_cliente, 
                :id_tipo_pago, 
                :id_tipo_entrega , 
                :fh_entrega , 
                :destino_lat,
                :destino_lon,
                :comentarios
                )
                ');
        $query->execute([
            'id_cliente' =>  $order['id_cliente'],
            'id_tipo_pago' => $order['id_tipo_pago'],
            'id_tipo_entrega' => $order['id_tipo_entrega'],
            'fh_entrega' => $order['fh_entrega'],
            'destino_lat' => $order['destino_lat'],
            'destino_lon' => $order['destino_lon'],
            'comentarios' => $order['comentarios']]);
        return $query;
    }

    function updOrder($order){
        $query = $this->connect()->prepare(
            'UPDATE pedido SET 
            id_cliente = :id_cliente,
            id_tipo_pago = :id_tipo_pago , 
            id_tipo_entrega = :id_tipo_entrega, 
            fh_entrega = :fh_entrega,
            destino_lat = :destino_lat, 
            destino_lon = :destino_lon,
            comentarios = :comentarios
            WHERE 
            id_pedido = :id_pedido');

        $query->execute([
            'id_cliente' => $order['id_cliente'],
            'id_tipo_pago' => $order['id_tipo_pago'],
            'id_tipo_entrega' => $order['id_tipo_entrega'],
            'fh_entrega' => $order['fh_entrega'],
            'destino_lat' => $order['destino_lat'],
            'destino_lon' => $order['destino_lon'],
            'comentarios' => $order['comentarios']
        ]);
        return $query;
    }

  
}

?>
