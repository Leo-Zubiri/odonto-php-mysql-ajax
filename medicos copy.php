<?php include "./_head.php"; ?>
    <link rel="stylesheet" href="css/popup.css">
    <title>OdonTam - Home</title>
</head>
<body class="text-center">
<?php 
$menu = "medicos";
include "./_nav.php";
include "./bdd.php"; 


if(isset($_GET["id"])){
    
    $id = $_GET["id"];

    echo '<script type="text/javascript"> document.getElementById("openPopUp").click(); </script> ';  
    
}else{
    $id=-1;
}


?>

<main class = "container my-3">
<!-- text-center row mt-1 mb-3">     -->
    <caption>  <!-- Titulo de la tabla -->
        <h3>Tabla medicos</h3>                
        <a href="#popUp" id="openPopUp" type="submit" class="mx-3">
            <p>Agrega un nuevo medico</p>            
        </a>        
    </caption>

    <section class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                <thead>
                    <tr>                                                
                        <th>ID</th>   
                        <th>Cedula</th>                      
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Especialidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php           
                        $query = "SELECT * FROM medico";
                        //$query = "CALL SP_Prueba_Trat";
                        $result = mysqli_query($conn, $query);
                        if(!$result) {
                            echo "Fallido!";
                            die('Cosulta Fallida!'. mysqli_error($connection));                            
                        }                                                
                        while ($row = mysqli_fetch_assoc($result)){  
                    ?>  
                    <tr>
                        <td><?php echo $row["ID"]; ?></td>
                        <td><?php echo $row["Cedula"]; ?></td>
                        <td><?php echo $row["Nombres"]; ?></td>
                        <td><?php echo $row["Apellidos"]; ?></td>
                        <td><?php echo $row["Telefono"]; ?></td>
                        <td><?php echo $row["Especialidad"]; ?></td>
                        <td>
                            <a href="medicos.php?id=<?php echo $row["ID"];?>#popUp">
                                <img  class="me-2" src="./img/ico/modificar.png" width="25" alt="Modificar">
                            </a>
                            <a>
                                <img class="ms-2" src="./img/ico/eliminar2.png" width="25" alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        mysqli_free_result($result);                        
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <aside id="popUp" class="popup">
        <div class="popUpContainer">
          <header class="container ml-auto">
            <a href="#!" class="closePopUp">X</a>
            <h2>Agregar Medico</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container"">
            <?php           

                $_ID = "";
                $_Nombres = "";
                $_Apellidos = "";
                $_Cedula = "";
                $_Telefono = "";

                $query = "SELECT * FROM medico";
                //$query = "CALL SP_Prueba_Trat";
                $result = mysqli_query($conn, $query);
                if(!$result) {
                    echo "Fallido!";
                    die('Cosulta Fallida!'. mysqli_error($connection));                            
                }                                                
                while ($row = mysqli_fetch_assoc($result)){  
                    $_ID =  $row["ID"];
                    $_Nombres =  $row["Nombres"];
                    $_Apellidos =  $row["Apellidos"];
                    $_Cedula =  $row["Cedula"];
                    $_Telefono =  $row["Telefono"];

                }
                mysqli_free_result($result);  
            ?>  
            <div class="row p-4">
                <div class="col-md-6">
                    <input type="text" id="Nombres" placeholder="Nombres" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="Apellidos" placeholder="Apellidos" class="form-control" required>
                </div>
            </div>

            <div class="row p-4">
                <div class="col-md-4">
                    <input type="text" id="Cedula" placeholder="Cedula" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="tel" id="Telefono" placeholder="Telefono" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="text" id="Especialidad" placeholder="Especialidad" class="form-control" required>
                </div>
            </div>
            
            <div class="row p-4 my-2 my-lg-0">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Agregar</button>
            </div>
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
    </aside>

</main>

<?php 
include "./_footer.php"; 
?>