<?php 
    $cnn = null;   //Connection se guarda en una variable
    $host="";
    $user="root";
    $password="";
    $bd="odonto";
    $data=null;
    $opcDB=1;

    if(isset($_GET["server"])){
        $opcDB = $_GET["server"];
    }

    
    function conectar(){
    
        //MySQL 
        $host="localhost";
        try{
            $GLOBALS['cnn']=new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
            $GLOBALS['cnn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo "Error!: No se pudo conectar a la bd ".$GLOBALS['bd']."<br/>";
            die();
        }
        
    }

    function desconectar() {
        $GLOBALS['cnn']=null;
    }

    function getMedicoByID($id){
        try {
            //Creamos la conexión PDO por medio de una instancia de su clase
            $cnn = &$GLOBALS['cnn'];
            conectar();
        
            //Preparamos la consulta sql
            $respuesta = $cnn->prepare("CALL GetMedicoByID(?)");
           
            //Ejecutamos la consulta
            $respuesta->execute([$id]);
            $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
            desconectar();
            return $results;
        
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function getMedicos(){
        try {
            //Creamos la conexión PDO por medio de una instancia de su clase
            $cnn = &$GLOBALS['cnn'];
            conectar();
        
            //Preparamos la consulta sql
            $respuesta = $cnn->prepare("CALL getMedicos();");
           
            //Ejecutamos la consulta
            $respuesta->execute();
            $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
            desconectar();
            return $results;
        
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function getMedicoEspecs(){

        try {
            //Creamos la conexión PDO por medio de una instancia de su clase
            $cnn = &$GLOBALS['cnn'];
            conectar();
        
            //Preparamos la consulta sql
            $respuesta = $cnn->prepare("SELECT * FROM especialidades");
           
            //Ejecutamos la consulta
            $respuesta->execute();
            $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
            desconectar();
            return $results;
        
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }

    }
    
    function DeleteMedicoByID($id){

        try {
            //Creamos la conexión PDO por medio de una instancia de su clase
            $cnn = &$GLOBALS['cnn'];
            conectar();
        
            //Preparamos la consulta sql
            $respuesta = $cnn->prepare("CALL SP_DeleteMedico(?);");
           
            //Ejecutamos la consulta
            $respuesta->execute([$id]);
            $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
            desconectar();
            return $results;
        
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }

    }



    // function getData($opcDB){
    //     if($opcDB==1 || $opcDB==2){
    //         try {
    //             //Creamos la conexión PDO por medio de una instancia de su clase
    //             $cnn = &$GLOBALS['cnn'];
    //             conectar($opcDB);
            
    //             //Preparamos la consulta sql
    //             if($opcDB==1) $respuesta = $cnn->prepare("CALL getProveedores();");
    //             else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC getProveedores;");
            
    //             //Ejecutamos la consulta
    //             $respuesta->execute();
    //             $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
    //             desconectar();
    //             return $results;
    //             /*
    //             //Creamos un array donde almacenaremos la data obtenida
    //             $data = [];
            
    //             //Recorremos la data obtenida
    //             foreach($respuesta->fetchAll() as $res){
    //                 //Llenamos la data en el array
    //                 $data[]=$res;
    //             }
                
    //             //Hacemos una impresion del array en formato JSON.
    //             //$GLOBALS['data'] = json_encode($data);
    //             return $data;

                

    //             $GLOBALS['data'] = $data;
    //             //$HTTP_RAW_POST_DATA.$http_response_header. 
    //             */
            
    //         } catch (Exception $e) {
    //             echo $e->getMessage();
    //             return null;
    //         }
    //     }
    // }

    // function getProveedorByID($id,$opcDB){
    //     if($opcDB==1 || $opcDB==2){
    //         try {
    //             $cnn = &$GLOBALS['cnn'];
    //             conectar($opcDB);
            
    //             //Preparamos la consulta sql
    //             if($opcDB==1) $respuesta = $cnn->prepare("CALL getProveedorByID(".$id.");");
    //             else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC getProveedorByID ".$id.";");
            
    //             //Ejecutamos la consulta
    //             $respuesta->execute();
    //             $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
                
    //             /*
    //             $sentencia = $base_de_datos->prepare("SELECT id, nombre, edad FROM mascotas WHERE id = ?;");
    //             $sentencia->execute([$id]);
    //             $mascota = $sentencia->fetchObjec       
    //             */
    //             desconectar();
    //             return $results;
                 
    //         } catch (Exception $e) {
    //             echo $e->getMessage();
    //             return null;
    //         }
    //     }
    // }

    // function updateProveedor($id,$opcDB,$d){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL updateProveedor(?,?,?,?,?,?,?);");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC updateProveedor ?,?,?,?,?,?,? ;");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute([$id,$d[0],$d[1],$d[2],$d[3],$d[4],$d[5]]);
    //     desconectar();
    //     return $respuesta;
    // }

    // function delProveedor($id,$opcDB){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL delProveedorByID(?);");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC delProveedorByID ? ;");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute([$id]);
    //     desconectar();
    //     return $respuesta;
    // }

    // function crearProveedor($opcDB,$d){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL crearProveedor(?,?,?,?,?,?);");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC crearProveedor ?,?,?,?,?,? ;");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute([$d[0],$d[1],$d[2],$d[3],$d[4],$d[5]]);
    //     desconectar();
    //     return $respuesta;
    // }

    // function getProductosDisp($opcDB){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("SELECT * FROM `dbo.Producto` WHERE StockProducto>0;");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("SELECT * FROM Producto WHERE StockProducto>0;");      
    //     //Ejecutamos la consulta
    //     $respuesta->execute();
    //     $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
    //     desconectar();
    //     return $results;
    // }

    // function getDataVentasPeriodo($opcDB,$fechaI,$fechaF){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL betweenVentaFechas(?, ?);");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC betweenVentaFechas ?, ?;");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute([$fechaI,$fechaF]);
    //     $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
    //     desconectar();
    //     return $results;
    // }

    // function getDataArtsCliente($opcDB,$nombre){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL getProductosByNomCliente(?);");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC getProductosByNomCliente ? ;");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute([$nombre]);
    //     $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
    //     desconectar();
    //     return $results;
    // }

    // function getNombreProductos($opcDB){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("SELECT * FROM `dbo.producto`;");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("SELECT * FROM producto;");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute();
    //     $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
    //     desconectar();
    //     return $results;
    // }

    // function getEstClientes($opcDB){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL CantProductosClientes();");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC CantProductosClientes; ");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute();
    //     $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 
    //     desconectar();
    //     return $results;
    // }

    // function getEstGeneralArts1($opcDB){
    //     //createTabla($opcDB);
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);

    //     if($opcDB==1) $respuesta2 = $cnn->prepare("SELECT * FROM TempProducto;");
    //     else if ($opcDB==2) $respuest2 = $cnn->prepare("SELECT * FROM TempProducto;");

    //     $results = $respuesta2 -> fetchAll(PDO::FETCH_OBJ); 
    //     desconectar();
    //     return $results2;
    // }

    // function createTabla($opcDB){

    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("CALL CantProductosClientes();");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("EXEC estGeneralArts; ");
            
    //     //Ejecutamos la consulta
    //     $respuesta->execute();
    // }

    // function getEstGeneralArts($opcDB){
    //     $cnn = &$GLOBALS['cnn'];
    //     conectar($opcDB);
            
    //     //Preparamos la consulta sql
    //     if($opcDB==1) $respuesta = $cnn->prepare("SELECT * FROM TempProducto;");
    //     else if ($opcDB==2) $respuesta = $cnn->prepare("SELECT * FROM TempProducto;");      
    //     //Ejecutamos la consulta
    //     $respuesta->execute();
    //     $results = $respuesta -> fetchAll(PDO::FETCH_OBJ); 

    //     //Creamos un array donde almacenaremos la data obtenida
    //     desconectar();
    //     return $results;
    // }
    //getData($opcDB);
    //header('Location:' . getenv('HTTP_REFERER'));
    //header("HTTP/1.1 200 OK");
?>