<?php 

class Empresa{

public $id;
public $nombre_empresa;
public $email;
public $rnc;
public $telefono;
public $localidad;

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
 * Get the value of nombre_empresa
 */ 
public function getNombre_empresa()
{
return $this->nombre_empresa;
}

/**
 * Set the value of nombre_empresa
 *
 * @return  self
 */ 
public function setNombre_empresa($nombre_empresa)
{
$this->nombre_empresa = $nombre_empresa;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of rnc
 */ 
public function getRnc()
{
return $this->rnc;
}

/**
 * Set the value of rnc
 *
 * @return  self
 */ 
public function setRnc($rnc)
{
$this->rnc = $rnc;

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
 * Get the value of localidad
 */ 
public function getLocalidad()
{
return $this->localidad;
}

/**
 * Set the value of localidad
 *
 * @return  self
 */ 
public function setLocalidad($localidad)
{
$this->localidad = $localidad;

return $this;
}

// METODOS

public function verempresa(){
$sql = $this->db->query("SELECT * FROM empresa LIMIT 1");
return $sql->fetch_object();        
}


public function actualizar(){
$result = false;
$sql = "UPDATE empresa SET nombre_empresa = '{$this->getNombre_empresa()}', email = '{$this->getEmail()}', rnc = '{$this->getRnc()}', telefono = '{$this->getTelefono()}', localidad = '{$this->getLocalidad()}' WHERE id = {$this->getId()}";  
$actualizar = $this->db->query($sql);
if($actualizar){
$result = true;    
}
return $result;
}

} // cierre de la clase