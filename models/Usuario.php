<?php

class Usuario{

public $id;
public $nombre;
public $password;
public $rol;
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
 * Get the value of nombre
 */ 
public function getNombre()
{
return $this->nombre;
}

/**
 * Set the value of nombre
 *
 * @return  self
 */ 
public function setNombre($nombre)
{
$this->nombre = $this->db->real_escape_string($nombre);    

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password = password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}


/**
 * Get the value of rol
 */ 
public function getRol()
{
return $this->rol;
}

/**
 * Set the value of rol
 *
 * @return  self
 */ 
public function setRol($rol)
{
$this->rol = $rol;

return $this;
}

// METODOS 
//REGISTRAR
public function save(){
$result = false;
$sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getPassword()}','{$this->getRol()}')";    
$guardar = $this->db->query($sql);
if($guardar){
$result = true;    
}
return $result;
}
//Cierre de la funcion Save

public function login(){
$result = false;  
$nombre = $this->nombre;
$password = $this->password;  
//comprobar si existe el usuario
$sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
$login = $this->db->query($sql);

//comprobar si el usuario esta en la db
if($login && $login->num_rows == 1){
//meter los datos en un objeto o array    
$usuario = $login->fetch_object();

//verificar password
$verify = password_verify($password, $usuario->password);

if($verify){
$result = $usuario;
}

return $result;

}// cierre de la condicion

} // cierre de la function

public function actualizar(){
$result = false;
$sql = "UPDATE usuarios SET nombre = '{$this->getNombre()}', rol = '{$this->getRol()}' WHERE id = {$this->getId()}";  
$actualizar = $this->db->query($sql);
if($actualizar){
$result = true;    
}
return $result;
}

// ver usuario
public function verusuarios(){
$sql = $this->db->query("SELECT * FROM usuarios");
return $sql;    
}

// editar usuario
public function editar(){
$sql = $this->db->query("SELECT * FROM usuarios WHERE id = {$this->getId()}");
return $sql->fetch_object();    
}

// eliminar usuario
public function eliminar(){
$sql = $this->db->query("DELETE FROM usuarios WHERE id = {$this->getId()}"); 
return $sql;   
}


} // cierre de la clase
