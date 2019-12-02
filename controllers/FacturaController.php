<?php
require_once 'models/Producto.php';
require_once 'models/Factura.php';
require_once 'models/Cliente.php';
require_once 'models/Empresa.php';
// HTML2PDF
use Spipu\Html2Pdf\Html2Pdf;

class FacturaController{

public function ventas(){
Utils::usuario();
error_reporting(0);
$_SERVER['numero'] = rand();

// carrito
if(isset($_SESSION['carrito'])){
$carrito = $_SESSION['carrito']; 
}


// mostrar todos los productos
$producto = new Producto();
$producto->setId_usuario($_SESSION['identificar']->id);
$productos = $producto->verproducto();

require_once 'views/ventas/index.php';    
}

public function addcarrito(){
Utils::usuario();
$producto_id = $_GET['id'];

// aumentar productos del carrito
if(isset($_SESSION['carrito'])){
$counter = 0;    
foreach ($_SESSION['carrito'] as $indice => $elemento) {
if($elemento['id_producto'] == $producto_id){
$_SESSION['carrito'][$indice]['unidades']++; 
$counter++;   
}
}
}

if(!isset($counter) || $counter == 0){
//Conseguir Producto    
$productos = new Producto();
$productos->setId($producto_id); 
$producto = $productos->mostrarproducto();   
//comprobar si el producto es un objeto
if(is_object($producto)){
$_SESSION['carrito'][] = array(
'id_producto' => $producto->id,
'precio' => $producto->precio,
'unidades' => 1,
'producto' => $producto
);
}
}
header("location:" . base_url . "Factura/ventas");    
} // cierre del metodo

//subir las unidades del carrito
public function up(){
 if(isset($_GET['index'])){
$indice = $_GET['index'];
$_SESSION['carrito'][$indice]['unidades']++;
}   
header("location:" . base_url . "Factura/ventas");    
}

//bajar las unidades del carrito
public function down(){
 if(isset($_GET['index'])){
$indice = $_GET['index'];
$_SESSION['carrito'][$indice]['unidades']--;
if($_SESSION['carrito'][$indice]['unidades'] ==0){
unset($_SESSION['carrito']);  
}
}   
header("location:" . base_url . "Factura/ventas");    
}

//bajar las unidades del carrito
public function eliminar(){
unset($_SESSION['carrito']);  
header("location:" . base_url . "Factura/ventas");      
}


// guardar factura
public function guardarfactura(){
Utils::usuario();
if(isset($_POST)){    
$total = $_POST['total'] - $_POST['descuento'];


$factura = new Factura();
$factura->setId_cliente(1);
$factura->setId_usuario($_SESSION['identificar']->id);
$factura->setCliente($_POST['cliente']);
$factura->setNo_factura($_POST['no_factura']);
$factura->setCantidad($_POST['cantidad']);    
$factura->setDescuento($_POST['descuento']);
$factura->setTotal_factura($total);
$sobrante = $_POST['cantidad'] - $total;
$factura->setSobrante($sobrante);

//guardar la factura
$save = $factura->guardarfactura();     
$save_linea = $factura->save_linea();  
// eliminar sesion del carrito
unset($_SESSION['carrito']);  
}

if($save && $save_linea){
$_SESSION['mensaje'] = "La Factura se ha realizado correctamente";
unset($_SESSION['descuento']);
unset($_SESSION['totaldescuento']);
}
else{
$_SESSION['error'] = "Error al generar factura";
unset($_SESSION['descuento']);
unset($_SESSION['totaldescuento']);
}

header("location:" . base_url . "Factura/ventasdia");    
} // cierre del metodo


// DETALLE DE LA FACTURA
public function mostrarventas(){
Utils::usuario();    
$factura = new Factura();
$factura->setId_usuario($_SESSION['identificar']->id);
$facturas = $factura->mostrar();

require_once 'views/ventas/mostrarfactura.php';
}

public function detallefactura(){
Utils::usuario();
if(isset($_GET['id'])){
$id = $_GET['id'];
$facturas = new Factura();
$facturas->setId($id);
$factura = $facturas->detalle();   

$producto = new Factura();
$producto->setId($id);
$productos = $producto->productosdetalle();  
}

require_once 'views/ventas/detalle.php';    
}




// imprimir factura
//opcion para imrpimir
public function imprimirfactura(){
if(isset($_GET['id'])){
$imprimir = new Html2Pdf();
$factura = new Factura();
$factura->setId($_GET['id']);
$facturas = $factura->detalle();

$producto = new Factura();
$producto->setId($_GET['id']);
$productos = $producto->productosdetalle();   

// mostrar datos de la empresa 
$empresa = new Empresa();
$empresas = $empresa->verempresa();

ob_start();
require_once 'views/ventas/imprimir.php';
$html = ob_get_clean();

$imprimir->WriteHtml($html);
$imprimir->output('factura.pdf');
}
}

// ventas del dia
public function ventasdia(){
$factura = new Factura();
$facturas = $factura->ventadia();

$ganancia = new Factura();
$ganancias = $ganancia->gananciasdia();
$_SESSION['ganancias'] = $ganancias;


$contarf = new Factura();
$contarfs = $contarf->contarfacturadia();
$_SESSION['facturastotal'] = $contarfs;

// mostrar la hora de cierre de la caja 
date_default_timezone_set('America/Santo_Domingo');
$hora = date('h:i:s A');
$_SESSION['hora'] = $hora;

require_once 'views/ventas/ventasdia.php';   
}

public function reportes(){
$ventad = new Factura();
$ventadias = $ventad->ventadiagrafico();

//CONTAR DESCUENTOS
$descuento = new Factura();
$descuentos = $descuento->contardescuentos();

// CONTAR LOS MAS VENDIDOS
$vendido = new Factura();
$vendido->setId_usuario($_SESSION['identificar']->id);
$vendidos = $vendido->masvendidos();

require_once 'views/ventas/reportes.php';   
}

// eliminar factura
public function eliminarfactura(){
Utils::administador();   
$factura = new Factura();
$factura->setId($_GET['id']);
$facturas = $factura->eliminar();    

if($facturas){
$_SESSION['mensaje'] = "La Factura se ha eliminado correctamente";
}
else{
$_SESSION['error'] = "Error al eliminar factura";
}
header("location:" . base_url . "Factura/mostrarventas");    
}

// applicar descuento
public function descuento(){
// descuento
$descuento =  $_POST['totaldescuento'];
$_SESSION['descuento'] = $descuento;

if($_SESSION['descuento'] == NULL){
$_SESSION['descuento'] = 0;   
}
else{
$totaldescuento = $_SESSION['total'] - $_POST['totaldescuento'];
$_SESSION['totaldescuento'] = $totaldescuento;
}

header("location:" . base_url . "Factura/ventas");      
}

} // cierre de la clase