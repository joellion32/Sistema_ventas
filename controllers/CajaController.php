<?php
require_once 'models/Caja.php';
require_once 'models/Factura.php';
error_reporting(0);

// HTML2PDF
use Spipu\Html2Pdf\Html2Pdf;

class CajaController{


public function guardarcaja(){
$caja = new Caja();
$caja->setTotal_venta($_POST['ganancias']);
$caja->setFacturas($_POST['facturadia']);    
$caja->setVendedor($_POST['vendedor']);  
$caja->setVendedor($_POST['vendedor']);  
$caja->setFecha($_POST['hora']);  
$caja->guardar();

header("location:" . base_url . "Caja/reporte");
}

public function mostrarcierre(){
Utils::administador();    
$caja = new Caja();
$cajas = $caja->mostrar();   

require_once 'views/caja/mostrarcaja.php';
}

public function reporte(){

$producto  = new Factura();
$productos = $producto->reporteproductos();

// imprimir reporte
$imprimir = new Html2Pdf();

ob_start();
require_once 'views/caja/imprimir.php';
$html = ob_get_clean();

$imprimir->WriteHtml($html);
$imprimir->output('factura.pdf');

}

}