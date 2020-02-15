<?php

//no hace falta conectar con algun Modelo,

class InicioController {

	#estableciendo las vistas
	public function inicio() {
		session_start();
		//if ( /*comparar variables de sesiones*/) {
	        require_once('./views/includes/cabecera.php');
	        require_once('./views/includes/navbar.php');
	        require_once('./views/paginas/inicio.php');
	        require_once('./views/includes/pie.php');
		//} else{
			//header('Location: index.php?page=login');
            //die();
		//}
	}

}