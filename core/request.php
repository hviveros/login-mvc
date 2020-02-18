<?php

require_once 'config.php';

$page = $_GET['page'];

if (!empty($page)) {
	#http://login-mvc/index.php?page=pelicula
	#http://login-mvc/index.php?page=pelicula-insertar
	#http://login-mvc/index.php?page=pelicula-editar
	#http://login-mvc/index.php?page=pelicula-eliminar
	$data = array(
		'login' 	=> array('model' => 'UsuarioModel', 'view' => 'login', 'controller' => 'UsuarioController'),
		'inicio' 	=> array('model' => 'UsuarioModel','view' => 'inicio', 'controller' => 'InicioController'), 
		'error' 	=> array('model' => 'UsuarioModel','view' => 'error', 'controller' => 'InicioController'), 
		'pelicula' 	=> array('model' => 'PeliculaModel','view' => 'pelicula', 'controller' => 'PeliculaController'), 
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