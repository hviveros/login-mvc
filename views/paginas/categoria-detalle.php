<?php

	require_once 'controllers/CategoriaController.php';
    $objeto = new CategoriaController();

    $id = $_POST['id'];
    $categoria = $objeto->obtenerCategoria($id);

    foreach ($categoria as $r) {
	    $datos = array(
	    	'id' 	=> $r['id_categoria'],
	    	'categoria'=> $r['categoria']
	    );
    }

	echo json_encode($datos);
?>