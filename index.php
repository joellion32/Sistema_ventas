<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/util.php';
// HTML2PDF
require_once 'plugins/vendor/autoload.php';


if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';
}
// para poner una url fija al inicio
elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
$nombre_controlador = controller_default;
}

else{
	echo "La pagina que buscas no existe";
	exit();
}

if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}
	
	// para poner action fijo al inicio
	elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();
	}


	else{
		echo "La pagina que buscas no existe";
	}
}else{
	echo "La pagina que buscas no existe";
}

