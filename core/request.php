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
		'login' 			=> array('model' => 'UsuarioModel', 'view' => 'login', 'controller' => 'UsuarioController'),
		'inicio' 			=> array('model' => 'UsuarioModel','view' => 'inicio', 'controller' => 'InicioController'), 
		'error' 			=> array('model' => 'UsuarioModel','view' => 'error', 'controller' => 'InicioController'), 
		'pelicula' 			=> array('model' => 'PeliculaModel','view' => 'pelicula', 'controller' => 'PeliculaController'), 
		'pelicula-detalle'	=> array('model' => 'PeliculaModel','view' => 'peliculaDetalle', 'controller' => 'PeliculaController'), 
		'pelicula-insertar' => array('model' => 'PeliculaModel','view' => 'peliculaInsertar', 'controller' => 'PeliculaController'), 
		'pelicula-editar' 	=> array('model' => 'PeliculaModel','view' => 'peliculaEditar', 'controller' => 'PeliculaController'), 
		'pelicula-eliminar' => array('model' => 'PeliculaModel','view' => 'peliculaEliminar', 'controller' => 'PeliculaController'),
		// 'libro' 			=> array('model' => 'LibroModel','view' => 'libro', 'controller' => 'LibroController'), 
		// 'libro-detalle' 	=> array('model' => 'LibroModel','view' => 'libroDetalle', 'controller' => 'LibroController'),
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