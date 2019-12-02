<?php

class Caja{

public $id;
public $total_venta;
public $facturas;
public $vendedor;
public $fecha;
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
 * Get the value of total_venta
 */ 
public function getTotal_venta()
{
return $this->total_venta;
}

/**
 * Set the value of total_venta
 *
 * @return  self
 */ 
public function setTotal_venta($total_venta)
{
$this->total_venta = $total_venta;

return $this;
}

/**
 * Get the value of facturas
 */ 
public function getFacturas()
{
return $this->facturas;
}

/**
 * Set the value of facturas
 *
 * @return  self
 */ 
public function setFacturas($facturas)
{
$this->facturas = $facturas;

return $this;
}

/**
 * Get the value of vendedor
 */ 
public function getVendedor()
{
return $this->vendedor;
}

/**
 * Set the value of vendedor
 *
 * @return  self
 */ 
public function setVendedor($vendedor)
{
$this->vendedor = $vendedor;

return $this;
}

/**
 * Get the value of fecha
 */ 
public function getFecha()
{
return $this->fecha;
}

/**
 * Set the value of fecha
 *
 * @return  self
 */ 
public function setFecha($fecha)
{
$this->fecha = $fecha;

return $this;
}

// METODOS


//GUARDAR CAJA
public function guardar(){
$result = false;
$sql = "INSERT INTO caja VALUES(NULL, {$this->getTotal_venta()}, {$this->getFacturas()}, '{$this->getVendedor()}', '{$this->getFecha()}')"; 
$guardar = $this->db->query($sql);
if($guardar){
$result = true;  
}
return $result;       
}

//MOSTRAR CAJA
public function mostrar(){
$sql = $this->db->query("SELECT * FROM caja ORDER BY id DESC");
return $sql;    
}



}