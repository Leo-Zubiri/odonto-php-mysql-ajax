<?php 
include "CRUD.php";

if (
    !isset($_POST["Nombres0"])      ||
    !isset($_POST["Apellidos0"])    ||
    !isset($_POST["Calle0"])        ||
    !isset($_POST["Numero0"])       ||
    !isset($_POST["Colonia0"])      ||
    !isset($_POST["Ciudad0"])       ||
    !isset($_POST["CP0"])           ||
    !isset($_POST["Fecha0"])        ||
    !isset($_POST["Sex0"])          ||
    !isset($_POST["Telefono0"]) 

) {
    //exit();
}else {
    $nombre =   $_POST["Nombres0"];  
    $ape =      $_POST["Apellidos0"];
    $calle =    $_POST["Calle0"];
    $numero =   $_POST["Numero0"];
    $colonia =  $_POST["Colonia0"];    
    $ciudad =   $_POST["Ciudad0"];    
    $cp =       $_POST["CP0"];        
    $fecha =    $_POST["Fecha0"];    
    $sex =      $_POST["Sex0"];       
    $tel =      $_POST["Telefono0"];
}



$resultado = null;

$action = $_GET["action"];

if($action=='POST'){
    //Actualizar campos
 
    $resultado = CreatePaciente($nombre,$ape,$calle,$numero,$colonia,$ciudad,$cp,$fecha,$sex,$tel); 
    
    header("Location: ../pacientes.php");
 
 
    //header("Location: ../proveedores.php?server=".$opcDB);
 }

 else if($action=='PUT'){
    //Actualizar campos
    $id = $_GET["id"];
    $nombre =   $_POST["Nombres1"];  
    $ape =      $_POST["Apellidos1"];
    $calle =    $_POST["Calle1"];  
    $numero =   $_POST["Numero1"];    
    $colonia =  $_POST["Colonia1"];    
    $ciudad =   $_POST["Ciudad1"];    
    $cp =       $_POST["CP1"];        
    $fecha =    $_POST["Fecha1"];    
    $sex =      $_POST["Sex1"];       
    $tel =      $_POST["Telefono1"];

    $resultado = UpdatePaciente($id,$nombre,$ape,$calle,$numero,$colonia,$ciudad,$cp,$fecha,$sex,$tel); 
 
    header("Location: ../pacientes.php");
 
 
    //header("Location: ../proveedores.php?server=".$opcDB);
 }
 else if($action=='DEL'){
    //Actualizar campos
    $id = $_GET["id"];

    $resultado = DeletePacienteByID($id);
 
    header("Location: ../pacientes.php");
 
 
    //header("Location: ../proveedores.php?server=".$opcDB);
 }

?>