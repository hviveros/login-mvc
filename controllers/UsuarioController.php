<?php

require_once 'models/UsuarioModel.php';

class UsuarioController {

	public function login() {
		session_start();
	    session_destroy();
	    require_once('./views/includes/cabecera.php');
	    require_once('./views/paginas/login.php');
	    require_once('./views/includes/pie.php');
	}

	public function accesoUsuario($datos) {
		session_start();
		$usuario = new Usuario();
		$respuesta = $usuario->accesoUsuario($datos['nick'], $datos['password']);
		if ($respuesta != false) {
			foreach ($respuesta as $r) {
				$_SESSION['id_usuario'] = $r['id'];
				$_SESSION['id_rol'] = $r['id_rol'];
			}
			if ($_SESSION['id_rol'] == 1) {
				header('Location: index.php?page=dashboard');
        die();
			} else {
				header('Location: index.php?page=blog');
        die();
			}
		}
	}

	public function cerrarSesion() {
		session_start();
		session_destroy();
		header('Location: index.php?page=login');
	}

}