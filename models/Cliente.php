<?php

class Cliente{

public $id;
public $id_usuario; 
public $nombre_cliente;
public $cedula; 
public $telefono; 
public $direccion; 
public $sector; 
public $provincia; 
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
 * Get the value of nombre_cliente
 */ 
public function getNombre_cliente()
{
return $this->nombre_cliente;
}

/**
 * Set the value of nombre_cliente
 *
 * @return  self
 */ 
public function setNombre_cliente($nombre_cliente)
{
$this->nombre_cliente = $nombre_cliente;

return $this;
}

/**
 * Get the value of cedula
 */ 
public function getCedula()
{
return $this->cedula;
}

/**
 * Set the value of cedula
 *
 * @return  self
 */ 
public function setCedula($cedula)
{
$this->cedula = $cedula;

return $this;
}

/**
 * Get the value of telefono
 */ 
public function getTelefono()
{
return $this->telefono;
}

/**
 * Set the value of telefono
 *
 * @return  self
 */ 
public function setTelefono($telefono)
{
$this->telefono = $telefono;

return $this;
}

/**
 * Get the value of direccion
 */ 
public function getDireccion()
{
return $this->direccion;
}

/**
 * Set the value of direccion
 *
 * @return  self
 */ 
public function setDireccion($direccion)
{
$this->direccion = $direccion;

return $this;
}

/**
 * Get the value of sector
 */ 
public function getSector()
{
return $this->sector;
}

/**
 * Set the value of sector
 *
 * @return  self
 */ 
public function setSector($sector)
{
$this->sector = $sector;

return $this;
}

/**
 * Get the value of provincia
 */ 
public function getProvincia()
{
return $this->provincia;
}

/**
 * Set the value of provincia
 *
 * @return  self
 */ 
public function setProvincia($provincia)
{
$this->provincia = $provincia;

return $this;
}


// METODOS 
// CONTAR CLIENTE
public function contarcliente(){
$cliente = $this->db->query("SELECT COUNT(*) FROM clientes");
return $cliente->fetch_row();       
}
    
// buscar cliente
public function buscarcliente(){
$sql = $this->db->query("SELECT * FROM clientes WHERE nombre_cliente LIKE '{$this->getNombre_cliente()}%' LIMIT 1");
return $sql->fetch_object();  
} // cierre buscar cliente

// mostrar cliente
public function mostracliente(){
$sql = $this->db->query("SELECT * FROM clientes");
return $sql;    
}

// registrar cliente
public function registrarcliente(){
$result = false;
$sql = "INSERT INTO clientes VALUES(NULL, {$this->getId_usuario()}, '{$this->getNombre_cliente()}', '{$this->getCedula()}', '{$this->getTelefono()}', '{$this->getDireccion()}', '{$this->getSector()}', '{$this->getProvincia()}', CURDATE())"; 
$registrar = $this->db->query($sql);
if($registrar){
$result = true;  
}
return $result;       
}

// actualizar cliente
public function actualizar(){
$result = false;
$sql = "UPDATE clientes SET nombre_cliente = '{$this->getNombre_cliente()}', cedula = '{$this->getCedula()}', telefono = '{$this->getTelefono()}', direccion = '{$this->getDireccion()}', sector = '{$this->getSector()}', provincia = '{$this->getProvincia()}'";    
$actualizar = $this->db->query($sql);
if($actualizar){
$result = true;    
}
return $result;
}

// mostrar cliente
public function detallecliente(){
$sql = $this->db->query("SELECT usuarios.nombre, clientes.* FROM clientes INNER JOIN usuarios ON clientes.id_usuario = usuarios.id WHERE clientes.id = {$this->getId()}");
return $sql->fetch_object();
}


// eliminar cliente
public function eliminarcliente(){
$sql = $this->db->query("DELETE FROM clientes WHERE id = {$this->getId()}"); 
return $sql;   
}

}