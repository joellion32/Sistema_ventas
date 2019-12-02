<?php

class Database{
  
public function conexion(){
$conexion = new mysqli("localhost" , "root" , "" , "sistema_ventas");
$conexion->query("SET NAMES utf8");
return $conexion;
}    

}