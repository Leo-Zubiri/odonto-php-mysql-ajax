<?php 
#Salir si alguno de los datos no está presente
include "CRUD.php";


    if (
        !isset($_POST["id"]) ||
        !isset($_POST["nombre"]) ||
        !isset($_POST["ruc"]) ||
        !isset($_POST["direc"]) ||
        !isset($_POST["tel"]) ||
        !isset($_POST["fecha"]) ||
        !isset($_POST["estado"]) ||
        !isset($_POST["server"])
    ) {
        //exit();
    }else {
        $nombre = $_POST["nombre"];
        $ruc = $_POST["ruc"];
        $dir = $_POST["direc"];
        $tel = $_POST["tel"];
        $fecha = $_POST["fecha"];
        $estado = $_POST["estado"];
        $opcDB = $_POST["server"];
        $id = $_POST["id"];
    }
    
    

    $resultado = null;

$action = $_GET["action"];

if($action=='PUT'){
   //Actualizar campos

   $data = array($nombre,$ruc,$dir,$tel,$fecha,$estado);

   $resultado = updateProveedor($id,$opcDB,$data);

    header("Location: ../proveedores.php?server=".$opcDB);


   //header("Location: ../proveedores.php?server=".$opcDB);
}
else if($action== 'DEL'){
    $opcDB = $_GET["server"];
    $id = $_GET["id"];

    $ejecuta = delProveedor($id,$opcDB);

    if($ejecuta){
        echo '<script type="text/javascript">
            alert("Proveedor eliminado");
            window.location.href = "../proveedores.php?server='.$opcDB.'";
        </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Error Eliminando este proveedor");
            window.history.back();
        </script>';
    }
}

else if($action== 'POST'){
    $nombre = $_POST["nombre"];
    $ruc = $_POST["ruc"];
    $dir = $_POST["direc"];
    $tel = $_POST["tel"];
    $fecha = $_POST["fecha"];
    $estado = $_POST["estado"];
    $opcDB = $_POST["server"];

    $data = array($nombre,$ruc,$dir,$tel,$fecha,$estado);

    $ejecuta = crearProveedor($opcDB,$data);

    if($ejecuta){
        echo '<script type="text/javascript">
            alert("Proveedor Agregado");
            window.location.href = "../proveedores.php?server='.$opcDB.'";
        </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Error Agregando este proveedor");
            window.history.back();
        </script>';
    }
}


?>

