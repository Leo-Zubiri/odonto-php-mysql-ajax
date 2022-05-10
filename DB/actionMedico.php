<?php 
include "CRUD.php";

if (
    !isset($_POST["Nombres0"]) ||
    !isset($_POST["Apellidos0"]) ||
    !isset($_POST["Cedula0"]) ||
    !isset($_POST["Telefono0"]) ||
    !isset($_POST["Espec0"]) 
) {
    //exit();
}else {
    $nombre = $_POST["Nombres0"];
    $ape = $_POST["Apellidos0"];
    $ced = $_POST["Cedula0"];
    $tel = $_POST["Telefono0"];
    $spec = $_POST["Espec0"];

}



$resultado = null;

$action = $_GET["action"];

if($action=='POST'){
    //Actualizar campos
 
    $resultado = CreateMedico($ced,$nombre,$ape,$tel,$spec);
 
    header("Location: ../medicos.php");
 
 
    //header("Location: ../proveedores.php?server=".$opcDB);
 }

 else if($action=='PUT'){
    //Actualizar campos
    $id = $_GET["id"];
    $nombre = $_POST["Nombres1"];
    $ape = $_POST["Apellidos1"];
    $ced = $_POST["Cedula1"];
    $tel = $_POST["Telefono1"];
    $spec = $_POST["Espec1"];
    $resultado = UpdateMedico($id,$ced,$nombre,$ape,$tel,$spec);
 
    header("Location: ../medicos.php");
 
 
    //header("Location: ../proveedores.php?server=".$opcDB);
 }
 else if($action=='DEL'){
    //Actualizar campos
    $id = $_GET["id"];

    $resultado = DeleteMedicoByID($id);
 
    header("Location: ../medicos.php");
 
 
    //header("Location: ../proveedores.php?server=".$opcDB);
 }


?>