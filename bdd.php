<?php
$conn = null;
try{
    $conn = mysqli_connect(
        '127.0.0.1', 'root', '', 'Odonto'
    );    
}catch(Exception $e){
    $conn = null;
    die("Conexion Fallida!");
}
?>