<?php

include_once 'customer.php';

class ApiCustomer{


    function getAll(){
        $cliente = new Customers();
        $clientes = array();
        $clientes["items"] = array();

        $res = $cliente->getCustomers();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id_cliente'],
                    "id_usuario" => $row['id_usuario'],
                    "nombre" => $row['nombre'],
                    "apellido" => $row['apellido'],
                    "f_nac" => $row['f_nac'],
                    "status" => $row['status'],
                    "genero" => $row['genero'],
                );
                array_push($cliente["items"], $item);
            }
        
            echo json_encode($cliente);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getById($id){
        $cliente = new Customers();
        $clientes = array();
        $clientes["items"] = array();

        $res = $cliente->getClientesByID($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                "id" => $row['id_cliente'],
                "id_usuario" => $row['id_usuario'],
                "nombre" => $row['nombre'],
                "apellido" => $row['apellido'],
                "f_nac" => $row['f_nac'],
                "status" => $row['status'],
                "genero" => $row['genero'],
            );
            array_push($clientes["items"], $item);
            $this->printJSON($clientes);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    //Funcion para agregar mis usuarios
    function add($item){
        $cliente = new Customers();
        $res = $cliente->addCliente($item);
        $this->exito('Cliente agregado con exito');  
    }
    //Funcion para modificar mis usuarios
    function upd($item){
        $cliente = new Customers();
        $res = $cliente->updCliente($item);
        $this->exito('Cliente modificado con exito');  
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