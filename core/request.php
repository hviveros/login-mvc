<?php

require_once 'config.php';

$page = $_GET['page'];

if (!empty($page)) {
	#http://login-mvc/index.php?page=pelicula
	#http://login-mvc/index.php?page=pelicula-detalle
	#http://login-mvc/index.php?page=pelicula-insertar
	#http://login-mvc/index.php?page=pelicula-editar
	#http://login-mvc/index.php?page=pelicula-eliminar
	$data = array(
		'login' 			=> array('model' => 'UsuarioModel', 'view' => 'login', 	'controller' => 'UsuarioController'),
		'inicio' 			=> array('model' => 'UsuarioModel',	'view' => 'inicio', 'controller' => 'InicioController'), 
		'error' 			=> array('model' => 'UsuarioModel',	'view' => 'error', 	'controller' => 'InicioController'), 
		'categoria' 		=> array('model' => 'CategoriaModel','view' => 'categoria', 		'controller' => 'CategoriaController'), 
		'categoria-detalle'	=> array('model' => 'CategoriaModel','view' => 'categoriaDetalle', 	'controller' => 'CategoriaController'), 
		'categoria-insertar'=> array('model' => 'CategoriaModel','view' => 'categoriaInsertar', 'controller' => 'CategoriaController'), 
		'categoria-editar' 	=> array('model' => 'CategoriaModel','view' => 'categoriaEditar', 	'controller' => 'CategoriaController'), 
		'categoria-eliminar'=> array('model' => 'CategoriaModel','view' => 'categoriaEliminar', 'controller' => 'CategoriaController'),
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