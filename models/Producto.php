<?php

class Producto{

public $id;
public $id_usuario;
public $nombre_producto;
public $codigo_producto;
public $costo;
public $precio;
public $descuento;
public $descripcion;
public $precio_por_mayor;
public $unidad;
public $cantidad;
public $imagen;
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
 * Get the value of nombre_producto
 */ 
public function getNombre_producto()
{
return $this->nombre_producto;
}

/**
 * Set the value of nombre_producto
 *
 * @return  self
 */ 
public function setNombre_producto($nombre_producto)
{
$this->nombre_producto = $nombre_producto;

return $this;
}

/**
 * Get the value of codigo_producto
 */ 
public function getCodigo_producto()
{
return $this->codigo_producto;
}

/**
 * Set the value of codigo_producto
 *
 * @return  self
 */ 
public function setCodigo_producto($codigo_producto)
{
$this->codigo_producto = $codigo_producto;

return $this;
}

/**
 * Get the value of costo
 */ 
public function getCosto()
{
return $this->costo;
}

/**
 * Set the value of costo
 *
 * @return  self
 */ 
public function setCosto($costo)
{
$this->costo = $costo;

return $this;
}

/**
 * Get the value of precio
 */ 
public function getPrecio()
{
return $this->precio;
}

/**
 * Set the value of precio
 *
 * @return  self
 */ 
public function setPrecio($precio)
{
$this->precio = $precio;

return $this;
}

/**
 * Get the value of descripcion
 */ 
public function getDescripcion()
{
return $this->descripcion;
}

/**
 * Set the value of descripcion
 *
 * @return  self
 */ 
public function setDescripcion($descripcion)
{
$this->descripcion = $descripcion;

return $this;
}

/**
 * Get the value of precio_por_mayor
 */ 
public function getPrecio_por_mayor()
{
return $this->precio_por_mayor;
}

/**
 * Set the value of precio_por_mayor
 *
 * @return  self
 */ 
public function setPrecio_por_mayor($precio_por_mayor)
{
$this->precio_por_mayor = $precio_por_mayor;

return $this;
}

/**
 * Get the value of unidad
 */ 
public function getUnidad()
{
return $this->unidad;
}

/**
 * Set the value of unidad
 *
 * @return  self
 */ 
public function setUnidad($unidad)
{
$this->unidad = $unidad;

return $this;
}

/**
 * Get the value of unidad2
 */ 
public function getCantidad()
{
return $this->cantidad;
}

/**
 * Set the value of unidad2
 *
 * @return  self
 */ 
public function setCantidad($cantidad)
{
$this->cantidad = $cantidad;

return $this;
}

/**
 * Get the value of imagen
 */ 
public function getImagen()
{
return $this->imagen;
}

/**
 * Set the value of imagen
 *
 * @return  self
 */ 
public function setImagen($imagen)
{
$this->imagen = $this->db->real_escape_string($imagen);    

return $this;
}


/**
 * Get the value of descuento
 */ 
public function getDescuento()
{
return $this->descuento;
}

/**
 * Set the value of descuento
 *
 * @return  self
 */ 
public function setDescuento($descuento)
{
$this->descuento = $descuento;

return $this;
}

// METODOS
// CONTAR PRODUCTO
public function contarproducto(){
$producto = $this->db->query("SELECT COUNT(*) FROM productos");
return $producto->fetch_row();       
}


//Guardar Producto
public function save(){
$result = false;
$sql = "INSERT INTO productos VALUES(NULL, '{$this->getNombre_producto()}', {$this->getCodigo_producto()}, {$this->getCosto()}, {$this->getPrecio()}, {$this->getDescuento()}, {$this->getPrecio_por_mayor()}, '{$this->getUnidad()}', {$this->getCantidad()}, '{$this->getDescripcion()}', '{$this->getImagen()}')"; 
$registrar = $this->db->query($sql);
if($registrar){
$result = true;  
}
return $result;   
}

// ver productos
public function verproducto(){
$sql = $this->db->query("SELECT * FROM productos");
return $sql;
}

// mostrar producto
public function mostrarproducto(){
$sql = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
return $sql->fetch_object();
}

// actualizar producto
public function actualizar(){
$result = false;
$sql = "UPDATE productos SET nombre_producto = '{$this->getNombre_producto()}', codigo_producto = {$this->getCodigo_producto()}, costo = {$this->getCosto()}, precio = {$this->getPrecio()}, descuento = {$this->getDescuento()}, precio_por_mayor = {$this->getPrecio_por_mayor()}, unidad = '{$this->getUnidad()}', cantidad = {$this->getCantidad()}, descripcion = '{$this->getDescripcion()}', imagen = '{$this->getImagen()}' WHERE id = {$this->getId()}";    
$actualizar = $this->db->query($sql);
if($actualizar){
$result = true;    
}
return $result;
}

public function agregadosreciente(){
$sql = $this->db->query("SELECT * FROM productos ORDER BY id DESC LIMIT 10");
return $sql;
}

// eliminar producto
public function eliminar(){
$sql = $this->db->query("DELETE FROM productos WHERE id = {$this->getId()}"); 
return $sql;   
}



}// cierre de la clase