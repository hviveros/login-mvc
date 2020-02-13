<?php

require_once 'config.php';

$page = $_GET['page'];

if (!empty($page)) {
	#http://crud-mvc/index.php?page=pelicula
	$data = array(
		'login' => array('model' => 'ClienteModel', 'view' => 'login', 'controller' => 'ClienteController'),
		'inicio' => array('model' => 'ClienteModel', 'view' => 'inicio', 'controller' => 'ClienteController'),
		'insertar' => array('model' => 'ClienteModel', 'view' => 'insertar', 'controller' => 'ClienteController'), #Crear un cliente
		'editar' => array('model' => 'ClienteModel', 'view' => 'editar', 'controller' => 'ClienteController'), #Editar un cliente
		'eliminar' => array('model' => 'ClienteModel', 'view' => 'eliminar', 'controller' => 'ClienteController'), 
	);

	foreach($data as $key => $components) {
		if ($page == $key) {
			$model = $components['model'];
			$view = $components['view'];
			$controller = $components['controller'];
			break;
		}
	}

	if (isset($model)) {
		require_once 'controllers/'.$controller.'.php';
		$objeto = new $controller();
		$objeto->$view();
	}
} else {
	header('Location: index.php?page=login');
}