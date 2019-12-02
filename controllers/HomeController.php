<?php
require_once 'models/Usuario.php';

class HomeController{

public function index(){

require_once 'views/home/login.php';    
}    


//para inciar la session
public function iniciar(){
if(isset($_POST)){    
$usuario = new Usuario();
$usuario->setNombre($_POST['nombre']);
$usuario->setPassword($_POST['password']);
$identificar = $usuario->login();
}
// para guardar los datos del usuario el una session objeto
if($identificar && is_object($identificar)){
$_SESSION['identificar'] = $identificar;  
header("location:" .base_url."Factura/ventas");   
}

else{
$_SESSION['error'] = "Error al iniciar sesion email o contraseña son incorrectos"; 
header("location:" .base_url."Home/index");      
}

//para verificar si el usuario es administrador
if($identificar->rol == 'administrador'){
$_SESSION['admin'] = true;
header("location:" .base_url."Usuario/panel");   
}


}//cierre de la funcion iniciar


public function logout(){
if(isset($_SESSION['identificar'])){
unset($_SESSION['identificar']);
} 
if(isset($_SESSION['admin'])){
unset($_SESSION['admin']);
} 

header("location:" .base_url);
}

} // cierre de la clase