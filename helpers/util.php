<?php
class Utils{

public static function deletesession($name){
if(isset($_SESSION[$name])){
$_SESSION[$name] = null;
}

return $name;
}

public static function usuario(){
if(!isset($_SESSION['identificar'])){
header("location:".base_url);    
}
}


public static function administador(){
if(!isset($_SESSION['admin'])){
header("location:".base_url);    
}

}

// ver el estatus del carrito
public static function statuscarrito(){
$status = array(
'count' => 0,
'stats' => 0,    
);
if(isset($_SESSION['carrito'])){
$status['count'] = count($_SESSION['carrito']);
foreach($_SESSION['carrito'] as $producto){
error_reporting(0);  
$status['total'] += $producto['precio'] * $producto['unidades'];
}
$_SESSION['total'] = $status['total'];
}


return $status;
}

}//cierre de la clase