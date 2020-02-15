<?php
require_once 'ModeloBase.php';

class Usuario extends ModeloBase {
	public $nombre;
	public $nick;
	public $password;

	public function __construct() {
		parent::__construct();
	}

	function getNombre() {
		return $this->nombre;
	}

	function getPassword() {
		return $this->password;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setPassword($password) {
		$this->password = $password;
	}

	public function accesoUsuario($nick, $password) {
		$db = new ModeloBase();
		$query = "SELECT * FROM usuario WHERE nick = '".$nick. "' AND password = '".$password . "'";
		return $respuesta = $db->consultarRegistro($query);
	}

}
