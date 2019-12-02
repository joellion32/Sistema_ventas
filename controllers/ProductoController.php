<?php
require_once 'models/Producto.php';

class ProductoController{

public function verproducto(){
Utils::usuario();
$producto = new Producto();
$producto->setId_usuario($_SESSION['identificar']->id);
$productos = $producto->verproducto();
require_once 'views/productos/verproducto.php';
}

public function mostrarproducto(){
Utils::usuario();    
if(isset($_GET['id'])){
$id = $_GET['id'];
$producto = new Producto();
$producto->setId($id);
$productos = $producto->mostrarproducto();  
require_once 'views/productos/mostrarproductos.php';  
}    
}

public function crearproducto(){
Utils::usuario();    
require_once 'views/productos/registrar.php';   
}

public function guardar(){
Utils::usuario();
$producto = new Producto();
if(isset($_POST)){
$producto->setId_usuario($_SESSION['identificar']->id);
$producto->setNombre_producto($_POST['nombre']);
$producto->setCodigo_producto($_POST['codigo']);
$producto->setCosto($_POST['costo']);
$producto->setPrecio($_POST['precio']);
$producto->setDescuento($_POST['descuento']);
$producto->setPrecio_por_mayor($_POST['precio_mayor']);
$producto->setUnidad($_POST['unidad']);
$producto->setCantidad($_POST['cantidad']);
$producto->setDescripcion($_POST['descripcio']);

//guardar imagen
$file = $_FILES['imagen'];
$filename = $file['name'];
$tipo = $file['type'];
if($tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/jpeg' || $tipo == 'image/gif'){
if(!is_dir('uploads/images')){
mkdir('uploads/images' , 0777, true);   
}
$producto->setImagen($filename);   
move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename); 
}
}

$productos = $producto->save();

if($productos){
$_SESSION['mensaje'] = "Producto creado correctamente";
header("location:" . base_url . "Producto/crearproducto");    
}
else{
$_SESSION['error'] = "No se ha podido crear el producto";    
header("location:" . base_url . "Producto/crearproducto");    

}


} // cierre del metodo

// function para editar producto
public function editarproducto(){
Utils::usuario();    
if(isset($_GET['id'])){
$id = $_GET['id'];
$producto = new Producto();
$producto->setId($id);
$productos = $producto->mostrarproducto();    
}    
require_once 'views/productos/editarproducto.php';   
}



// funcion para actualizar producto
public function actualizarproducto(){
Utils::usuario();
    $producto = new Producto();
    $producto->setId($_GET['id']);
    $producto->setNombre_producto($_POST['nombre']);
    $producto->setCodigo_producto($_POST['codigo']);
    $producto->setCosto($_POST['costo']);
    $producto->setPrecio($_POST['precio']);
    $producto->setDescuento($_POST['descuento']);
    $producto->setPrecio_por_mayor($_POST['precio_mayor']);
    $producto->setUnidad($_POST['unidad']);
    $producto->setCantidad($_POST['cantidad']);
    $producto->setDescripcion($_POST['descripcio']);

    //guardar imagen
    $file = $_FILES['imagen'];
    $filename = $file['name'];
    $tipo = $file['type'];
    if($tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/jpeg' || $tipo == 'image/gif'){
    if(!is_dir('uploads/images')){
    mkdir('uploads/images' , 0777, true);   
    }
    $producto->setImagen($filename);   
    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename); 
    }

    $productos = $producto->actualizar();
   
    if($productos){
    $_SESSION['mensaje'] = "Producto actualizado correctamente";
    header("location:" . base_url . "Producto/verproducto");    
    }
    else{
    $_SESSION['error'] = "No se ha podido actualizar el producto";    
    header("location:" . base_url . "Producto/verproducto");    
    
    }    
} // cierre de actualizar



public function eliminarproducto(){
if(isset($_GET['id'])){
$id = $_GET['id'];
$producto = new Producto();
$producto->setId($id);
$productos = $producto->eliminar();    
}    

if($productos){
$_SESSION['mensaje'] = "Producto eliminado correctamente";
header("location:" . base_url . "Producto/verproducto");    
}
else{
$_SESSION['error'] = "No se ha eliminar el producto";    
header("location:" . base_url . "Producto/verproducto");    

}
}

} // cierre de la clase