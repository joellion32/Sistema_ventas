<?php

require_once 'models/Empresa.php';

class EmpresaController{


public function actualizar(){
$empresa = new Empresa();
$empresas = $empresa->verempresa();

// crear variable servidor
$_SESSION['nombre_negocio'] = $empresas->nombre_empresa;
require_once 'views/empresa/actualizar.php';    
}


public function guardarempresa(){
Utils::administador();
$empresa = new Empresa();
$empresa->setId($_GET['id']);
$empresa->setNombre_empresa($_POST['nombre_negocio']);
$empresa->setEmail($_POST['email']);
$empresa->setRnc($_POST['rnc']);
$empresa->setTelefono($_POST['telefono']);
$empresa->setLocalidad($_POST['direccion']);
$empresas = $empresa->actualizar();

if($empresas){
    $_SESSION['mensaje'] = "Datos actualizados correctamente";
    header("location:" . base_url . "Empresa/actualizar");    
    }
    else{
    $_SESSION['error'] = "No se han podido actualizar los datos";    
    header("location:" . base_url . "Empresa/actualizar");    
    
    }      
}

}