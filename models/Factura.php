<?php

class Factura{

public $id;
public $id_cliente;
public $id_usuario;
public $cliente;
public $no_factura;
public $cantidad;
public $descuento;
public $total_factura;
public $sobrante;
public $db;

public function __construct(){
$this->db = Database::conexion();    
}
        

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of id_cliente
 */ 
public function getId_cliente()
{
return $this->id_cliente;
}

/**
 * Set the value of id_cliente
 *
 * @return  self
 */ 
public function setId_cliente($id_cliente)
{
$this->id_cliente = $id_cliente;

return $this;
}

/**
 * Get the value of id_usuario
 */ 
public function getId_usuario()
{
return $this->id_usuario;
}

/**
 * Set the value of id_usuario
 *
 * @return  self
 */ 
public function setId_usuario($id_usuario)
{
$this->id_usuario = $id_usuario;

return $this;
}

/**
 * Get the value of cliente
 */ 
public function getCliente()
{
return $this->cliente;
}

/**
 * Set the value of cliente
 *
 * @return  self
 */ 
public function setCliente($cliente)
{
$this->cliente = $cliente;

return $this;
}

/**
 * Get the value of no_factura
 */ 
public function getNo_factura()
{
return $this->no_factura;
}

/**
 * Set the value of no_factura
 *
 * @return  self
 */ 
public function setNo_factura($no_factura)
{
$this->no_factura = $no_factura;

return $this;
}


/**
 * Get the value of cantidad
 */ 
public function getCantidad()
{
return $this->cantidad;
}

/**
 * Set the value of cantidad
 *
 * @return  self
 */ 
public function setCantidad($cantidad)
{
$this->cantidad = $cantidad;

return $this;
}

/**
 * Get the value of impuesto
 */ 
public function getDescuento()
{
return $this->descuento;
}

/**
 * Set the value of impuesto
 *
 * @return  self
 */ 
public function setDescuento($descuento)
{
$this->descuento = $descuento;

return $this;
}

/**
 * Get the value of total_factura
 */ 
public function getTotal_factura()
{
return $this->total_factura;
}

/**
 * Set the value of total_factura
 *
 * @return  self
 */ 
public function setTotal_factura($total_factura)
{
$this->total_factura = $total_factura;

return $this;
}


/**
 * Get the value of sobrante
 */ 
public function getSobrante()
{
return $this->sobrante;
}

/**
 * Set the value of sobrante
 *
 * @return  self
 */ 
public function setSobrante($sobrante)
{
$this->sobrante = $sobrante;

return $this;
}

// METODOS 

public function guardarfactura(){
$result = false;
$sql = "INSERT INTO factura VALUES(NULL, {$this->getId_cliente()}, {$this->getId_usuario()}, '{$this->getCliente()}', {$this->getNo_factura()}, {$this->getCantidad()}, {$this->getDescuento()}, {$this->getTotal_factura()}, {$this->getSobrante()}, CURDATE())";
$registrar = $this->db->query($sql);
if($registrar){
$result = true;    
}

return $result;
}

//metodo para guardar la linea de pedido solo ver administrador
public function save_linea(){
$result = false;    
$sql = "SELECT LAST_INSERT_ID() as 'pedido'";
$pedido_id = $this->db->query($sql)->fetch_object()->pedido;  
foreach($_SESSION['carrito'] as $elemento){
$producto = $elemento['producto'];
$insert  = "INSERT INTO detalles_factura VALUES(null,{$pedido_id},{$producto->id},{$elemento['unidades']})";
$save_linea = $this->db->query($insert);
}

if($save_linea){
$result = true;
}
return $result;

}//cierre de la funcion sava linea

// Sumar las ganacias
public function ganancias(){
$sql = $this->db->query("SELECT SUM(cantidad_pagada) FROM factura");
return $sql->fetch_row();    
}

// Sumar las ganacias del dia
public function gananciasdia(){
$sql = $this->db->query("SELECT SUM(cantidad_pagada) FROM factura WHERE fecha = CURDATE()");
return $sql->fetch_row();    
}

// CONTAR FACTURA
public function contarfactura(){
$factura = $this->db->query("SELECT COUNT(*) FROM factura");
return $factura->fetch_row();       
}

// CONTAR DESCUENTOS
public function contardescuentos(){
$factura = $this->db->query("SELECT COUNT(descuento) FROM factura WHERE fecha = CURDATE()");
return $factura->fetch_row();       
}

// CONTAR FACTURA DIA
public function contarfacturadia(){
$factura = $this->db->query("SELECT COUNT(*) FROM factura WHERE fecha = CURDATE()");
return $factura->fetch_row();       
}

// MOSTRAR FACTURAS
public function mostrar(){
$sql = $this->db->query("SELECT factura.*, clientes.nombre_cliente, usuarios.nombre FROM factura INNER JOIN clientes ON factura.id_cliente = clientes.id 
INNER JOIN usuarios ON factura.id_usuario = usuarios.id");    
return $sql;
}

//DETALLE DE LA FACTURA
public function detalle(){
$sql = $this->db->query("SELECT factura.*, clientes.nombre_cliente, usuarios.* FROM factura INNER JOIN clientes ON factura.id_cliente = clientes.id 
INNER JOIN usuarios ON factura.id_usuario = usuarios.id WHERE factura.id = {$this->getId()}");    
return $sql->fetch_object();
}

// OBTENER PRODUCTOS DE LA FACTURA
public function productosdetalle(){
$productos = $this->db->query("SELECT detalles_factura.*, productos.* FROM detalles_factura INNER JOIN productos 
ON detalles_factura.producto_id = productos.id WHERE detalles_factura.factura_id = {$this->getId()}");    
return $productos;
}


// MOSTRAR PRODUCTOS MAS VENDIDOS
public function masvendidos(){
$sql = $this->db->query("SELECT detalles_factura.unidades, productos.nombre_producto FROM detalles_factura INNER JOIN productos 
ON detalles_factura.producto_id = productos.id  WHERE unidades >=6");
return $sql;
}

// MOSTRAR VENTAS POR FECHA
public function fecha(){
$sql = $this->db->query("SELECT Sum(total_factura) AS total, YEAR(fecha) AS año, MONTH(fecha) AS mes FROM factura Group by YEAR(fecha), MONTH(fecha)");
return $sql;
}

// MOSTRAR VENTA DEL DIA
public function ventadia(){
$sql = $this->db->query("SELECT * FROM factura WHERE fecha = CURDATE() ORDER BY id DESC");    
return $sql;
}


// MOSTRAR VENTA DEL DIA
public function ventadiagrafico(){
$sql = $this->db->query("SELECT fecha,total_factura FROM factura WHERE fecha = CURDATE()");    
return $sql;
}

//ELIMINAR LA FACTURA
public function eliminar(){
$sql = $this->db->query("DELETE FROM factura WHERE id = {$this->getId()}"); 
return $sql;   
}

//REPORTE DE VENTAS TOTAL
public function reporteproductos(){
$sql = "SELECT detalles_factura.unidades, factura.*, productos.*, Sum(productos.precio) AS total FROM detalles_factura INNER JOIN productos ON detalles_factura.producto_id = productos.id INNER JOIN factura 
ON detalles_factura.factura_id = factura.id WHERE factura.fecha = CURDATE()";  
$reporte  = $this->db->query($sql);

return $reporte;
}


} // Cierre de la clase