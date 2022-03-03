<?php

define("PROJECT_ROOT_PATH", __DIR__ . "/../");
 
// include main configuration file (DB Connection)
require_once PROJECT_ROOT_PATH."../methods/config/db.php";

class Customers extends DB{
    
    //Obtengo todos los clientes
    function getCustomers(){
        $query = $this->connect()->query('SELECT * FROM clientes');
        return $query;
    }

    //Obtengo 1 cliente en especifico

    function getClientesByID($id){
        $query = $this->connect()->prepare('SELECT * FROM clientes WHERE id_cliente = :id');
        $query->execute(['id' => $id]);
        return $query;

    }

    //Para la funcion de agregar vamos a declarar el $cliente como array
    function addCliente($cliente){
        $query = $this->connect()->prepare(
            'INSERT INTO clientes (
                id_usuario, 
                nombre, 
                apellido, 
                f_nac, 
                estado, 
                genero) VALUES (
                :id_usuario , 
                :nombre, 
                :apellido, 
                :f_nac , 
                :estado , 
                :genero)
                ');
        $query->execute([
            'id_usuario' =>  $cliente['id_usuario'],
            'nombre' => $cliente['nombre'],
            'apellido' => $cliente['apellido'],
            'estado' => $cliente['estado'],
            'f_nac' => $cliente['f_nac'],
            'genero' => $cliente['genero'],]);
        return $query;
    }

    function updCliente($cliente){
        $query = $this->connect()->prepare(
            'UPDATE clientes SET 
            id_usuario = :id_usuario,
            nombre = :nombre , 
            apellido = :apellido, 
            f_nac = :f_nac,
            estado = :estado, 
            genero = :genero 
            WHERE 
            id_cliente = :id_cliente');

        $query->execute([
            'id_usuario' => $cliente['id_usuario'],
            'nombre' => $cliente['nombre'],
            'apellido' => $cliente['apellido'],
            'f_nac' => $cliente['f_nac'],
            'estado' => $cliente['estado'],
            'genero' => $cliente['genero'],
            'id_cliente' => $cliente['id_cliente']
        ]);
        return $query;
    }

  
}

?>
