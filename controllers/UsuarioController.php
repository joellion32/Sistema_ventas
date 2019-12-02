<?php
require_once 'models/Producto.php';
require_once 'models/Cliente.php';
require_once 'models/Usuario.php';
require_once 'models/Factura.php';


class UsuarioController{

public function panel(){
Utils::usuario();
$producto = new Producto();
$producto->setId_usuario($_SESSION['identificar']->id);
$productos = $producto->contarproducto();

$cliente = new Cliente();
$cliente->setId_usuario($_SESSION['identificar']->id);
$clientes = $cliente->contarcliente();

$factura = new Factura();
$factura->setId_usuario($_SESSION['identificar']->id);
$facturas = $factura->ganancias();

$contarf = new Factura();
$contarf->setId_usuario($_SESSION['identificar']->id);
$contarfs = $contarf->contarfactura();

// MOSTRAR PRODUCTOS AGREGADOS RECIENTEMENTE
$mostrarp = new Producto();
$mostrarp->setId_usuario($_SESSION['identificar']->id);
$mostrarps = $mostrarp->agregadosreciente();

// CONTAR LOS MAS VENDIDOS
$vendido = new Factura();
$vendido->setId_usuario($_SESSION['identificar']->id);
$vendidos = $vendido->masvendidos();

// REPORTES POR FECHAS
$fecha = new Factura();
$fechas = $fecha->fecha();

require_once 'views/usuario/panel.php';  

}


public function editarusuario(){
Utils::administador();    
$usuario = new Usuario();
$usuario->setId($_GET['id']); 
$usuarios = $usuario->editar();   
require_once 'views/usuario/actualizar.php';
}

public function administrar(){
Utils::administador(); 
$usuario = new Usuario();
$usuarios = $usuario->verusuarios();
require_once 'views/usuario/administrar.php';    
}

// para guardar el usuario
public function guardarusuario(){
Utils::administador(); 
if(isset($_POST)){
$usuario = new Usuario();
$usuario->setNombre($_POST['nombre']);
$usuario->setPassword($_POST['password']);
$usuario->setRol($_POST['rol']);
$usuarios = $usuario->save();
}

if($usuarios){
$_SESSION['mensaje'] = "Usuario creado correctamente";    
header("location:".base_url."Usuario/administrar");  
}
else{
$_SESSION['error'] = "Error al crear usaurio";  
header("location:".base_url."Usuario/administrar");    
}

} // cierre de la funcion save

// para actualizar los campos del usuario
public function actualizarusuario(){
Utils::administador();
$usuario = new Usuario();
$usuario->setId($_GET['id']);
$usuario->setNombre($_POST['nombre']);
$usuario->setRol($_POST['rol']);
$usuarios = $usuario->actualizar();

if($usuarios){
    $_SESSION['mensaje'] = "Usuario actualizado correctamente";
    header("location:" . base_url . "Usuario/administrar");    
    }
    else{
    $_SESSION['error'] = "No se ha podido actualizar el Usuario";    
    header("location:" . base_url . "Usuario/administrar");    
    
    }    

}

// eliminar al usuario
public function eliminarusuario(){
Utils::administador();    
if(isset($_GET['id'])){
$id = $_GET['id'];
$usuario = new Usuario();
$usuario->setId($id);
$usuarios = $usuario->eliminar();    
}    

if($usuarios){
$_SESSION['mensaje'] = "Usuario eliminado correctamente";
header("location:" . base_url . "Usuario/administrar");    
}
else{
$_SESSION['error'] = "No se ha podido eliminar el usuario";    
header("location:" . base_url . "Usuario/administrar");    

}
}


} // cierre de la clase