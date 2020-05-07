<?php 

	require_once 'controllers/CategoriaController.php';

	$objeto = new CategoriaController();

	$datos = array(
		'categoria'   => $_POST['categoria'], //htmlentities, limites caracteres y toda la seguridad...
	);
	
	//validaciones: campo vacio, tipo de dato, comparacion con otros campos del formulario...
	if (empty($datos['categoria'])) {
		$respuesta['mensaje'] = "No puede insertar con campos vacíos";
		$respuesta['codigo'] = 400;
		echo json_encode($respuesta);
	} else if (is_numeric($datos['categoria'])) {
		$respuesta['mensaje'] = "No puede ingresar números";
		$respuesta['codigo'] = 400;
		echo json_encode($respuesta);
	} else {
		//aqui debe ir el array completamente depurado, validado
		//sin caracteres raros, campos numericos o emails validados, longitud correcta etc...
		$objeto->insertarCategoria($datos);
	}

?>