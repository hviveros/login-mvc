<?php
	
    require_once 'controllers/CategoriaController.php';
    $objeto = new CategoriaController();

	$id = $_POST['idD'];
	$objeto->eliminarCategoria($id);

?>	