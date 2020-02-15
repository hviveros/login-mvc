<?php

require_once 'config.php';

$page = $_GET['page'];

if (!empty($page)) {
	#http://login-mvc/index.php?page=pelicula
	$data = array(
		'login' => array('model' => 'UsuarioModel', 'view' => 'login', 'controller' => 'UsuarioController'),
		'inicio' => array('model' => 'UsuarioModel','view' => 'inicio', 'controller' => 'InicioController'), 
		'pelicula' => array('model' => 'UsuarioModel','view' => 'pelicula', 'controller' => 'PeliculaController'), 
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