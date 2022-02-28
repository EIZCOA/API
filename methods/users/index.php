<?php
    include_once 'apiusuarios.php';

    $api = new ApiUsuarios();


    
//Validamos el tipo de peticion, si la variable id esta definidida buscamos un uusarios
//en especifico, caso contrario devolvemos todo
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $api->getById($id);
}else{
    $api->getAll();
}

    
    
?>