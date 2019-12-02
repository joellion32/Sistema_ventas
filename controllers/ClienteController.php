<?php
require_once 'models/Cliente.php';

class ClienteController{

public function vercliente(){
Utils::usuario(); 
$cliente = new Cliente();
$cliente->setId_usuario($_SESSION['identificar']->id);
$clientes = $cliente->mostracliente();
require_once 'views/clientes/vercliente.php';    
}

public function crearcliente(){
Utils::usuario();    
require_once 'views/clientes/registrarcliente.php';
}

public function detallecliente(){
Utils::usuario();
if(isset($_GET['id'])){
$id = $_GET['id'];    
$cliente = new Cliente();
$cliente->setId($id);
$clientes = $cliente->detallecliente();
}    
require_once 'views/clientes/detalle.php';
}

public function editarcliente(){
Utils::usuario();
if(isset($_GET['id'])){
$id = $_GET['id'];    
$cliente = new Cliente();
$cliente->setId($id);
$clientes = $cliente->detallecliente();
}    
require_once 'views/clientes/editar.php'; 
 
}

// actualizar cliente
public function actualizar(){
Utils::usuario();
$cliente = new Cliente();
    $cliente->setId($_GET['id']);
    $cliente->setNombre_cliente($_POST['nombre']);
    $cliente->setCedula($_POST['cedula']);
    $cliente->setTelefono($_POST['telefono']);
    $cliente->setDireccion($_POST['direccion']);
    $cliente->setSector($_POST['sector']);
    $cliente->setProvincia($_POST['provincia']);
    $clientes = $cliente->actualizar();
   
    if($clientes){
    $_SESSION['mensaje'] = "Cliente actualizado correctamente";
    header("location:" . base_url . "Cliente/vercliente");    
    }
    else{
    $_SESSION['error'] = "No se ha podido actualizar el cliente";    
    header("location:" . base_url . "Cliente/vercliente");    
    
    }
  
}


public function eliminarcliente(){
Utils::usuario();    
if(isset($_GET['id'])){
$id = $_GET['id'];
$cliente = new Cliente();
$cliente->setId($id);
$clientes = $cliente->eliminarcliente();    
}    

if($clientes){
$_SESSION['mensaje'] = "Cliente eliminado correctamente";
header("location:" . base_url . "Cliente/vercliente");    
}
else{
$_SESSION['error'] = "No se ha podido eliminar el cliente";    
header("location:" . base_url . "Cliente/vercliente");    

}
}


public function guardar(){
Utils::usuario();
$cliente = new Cliente();
$cliente->setId_usuario($_SESSION['identificar']->id);
$cliente->setNombre_cliente($_POST['nombre']);
$cliente->setCedula($_POST['cedula']);
$cliente->setTelefono($_POST['telefono']);
$cliente->setDireccion($_POST['direccion']);
$cliente->setSector($_POST['sector']);
$cliente->setProvincia($_POST['provincia']);
$clientes = $cliente->registrarcliente();

 if($clientes){
    $_SESSION['mensaje'] = "El cliente ha sido creado correctamente";
    header("location:" . base_url . "Cliente/vercliente");    
    }
    else{
    $_SESSION['error'] = "Error al crear cliente";    
    header("location:" . base_url . "Cliente/crearcliente");    
    
    }
}


}