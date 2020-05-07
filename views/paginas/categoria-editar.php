<?php

    require_once 'controllers/CategoriaController.php';

    $objeto = new CategoriaController();
    $id = $_POST['idU'];
    $datos = array(
       'categoria'   	=> $_POST['categoriaU'],
    );
    
    $objeto->editarCategoria($id, $datos);

?>
	