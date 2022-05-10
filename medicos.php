<?php include "./_head.php"; ?>
    <link rel="stylesheet" href="css/popup.css">
    <title>OdonTam - Home</title>
</head>
<body class="text-center">

<?php 
$menu = "medicos";
include "./_nav.php";
include_once "DB/CRUD.php";


$Medicos = getMedicos();
$Medico = null;
$Especialidades = getMedicoEspecs();

if(isset($_GET["id"])){
    
    $id = $_GET["id"];
    $Medico = getMedicoByID($id);

    // echo '<script type="text/javascript"> document.getElementById("openPopUp").click(); </script> ';  
    
}else{
    $id=-1;
}


?>

<main class = "container my-3">
<!-- text-center row mt-1 mb-3">     -->
    <caption>  <!-- Titulo de la tabla -->
        <h3>Tabla medicos</h3>   
                     
        <a href="medicos.php#popUp" id="openPopUp" type="submit" class="mx-3">
            <img src="img/ico/dentista.png" width="150" height="150">
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
                
                    <?php foreach($Medicos as $r){ ?>
                    <tr>
                        <td><?php echo $r->ID ?></td>
                        <td><?php echo $r->Cedula ?></td>
                        <td><?php echo $r->Nombres ?></td>
                        <td><?php echo $r->Apellidos ?></td>
                        <td><?php echo $r->Telefono ?></td>
                        <td><?php echo $r->Descripcion ?></td>
                        <td>
                            <a href="medicos.php?id=<?php echo $r->ID ?>#EditUp">
                                <img  class="me-2" src="./img/ico/modificar.png" width="25" alt="Modificar">
                            </a>

                            <a href="DB/actionMedico.php?action=DEL&id=<?php echo $r->ID ?>">
                                <img class="ms-2" src="./img/ico/eliminar2.png" width="25" alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
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
          <form class="container" method="POST" action="DB/actionMedico.php?action=POST">

            <div class="row px-4">
                <label class="col-md-6">Nombres</label>
                <label class="col-md-6">Apellidos</label>                
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-6">
                    <input type="text" id="Nombres0" name="Nombres0" placeholder="Nombres" class="form-control" required value="">
                </div>
                <div class="col-md-6">
                    <input type="text" id="Apellidos0" name="Apellidos0" placeholder="Apellidos" class="form-control" required value="">
                </div>
            </div>


            <div class="row px-4">
                <label class="col-md-4">Cedula</label>
                <label class="col-md-4">Telefono</label>                
                <label class="col-md-4">Especialidad</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-4">
                    <input type="text" id="Cedula0" name="Cedula0" placeholder="Cedula" class="form-control" required value="">
                </div>
                <div class="col-md-4">
                    <input type="tel" id="Telefono0" name="Telefono0" placeholder="Telefono" class="form-control" required value="">
                </div>
                <div class="col-md-4">
                    <select id="Especialidad0" name="Espec0" class="form-control" required>
                        <?php foreach($Especialidades as $r) {?>
                            <option> <?php echo $r->Descripcion ?></option>
                        <?php }?>
                    </select>
                    <!-- <input type="text" id="Especialidad" placeholder="Especialidad" class="form-control" required> -->
                </div>
            </div>
            
            <div class="row p-4 my-2 my-lg-0">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Agregar</button>
            </div>
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
    </aside>

    <aside id="EditUp" class="popup">
        <div class="popUpContainer">
          <header class="container ml-auto">
            <a href="#!" class="closePopUp">X</a>
            <h2>Actualizar Medico</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container"" method="POST" action="DB/actionMedico.php?action=PUT&id=<?php echo $id; ?>">
            <?php           

                $_ID = "";
                $_Nombres = "";
                $_Apellidos = "";
                $_Cedula = "";
                $_Telefono = "";
                $_Especialidad = "";
                
                if($Medico!=null){
                    foreach($Medico as $r){ 
                        $_ID = $r->ID;
                        $_Nombres = $r->Nombres;
                        $_Apellidos = $r->Apellidos;
                        $_Cedula = $r->Cedula;
                        $_Telefono = $r->Telefono;
                        $_Especialidad = $r->Descripcion;
                }}

            ?>  


            <div class="row px-4">
                <label class="col-md-6">Nombres</label>
                <label class="col-md-6">Apellidos</label>                
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-6">
                    <input type="text" id="Nombres" name="Nombres1" placeholder="Nombres" class="form-control" required value="<?php echo $_Nombres?>">
                </div>
                <div class="col-md-6">
                    <input type="text" id="Apellidos" name="Apellidos1" placeholder="Apellidos" class="form-control" required value="<?php echo $_Apellidos?>">
                </div>
            </div>

            <div class="row px-4">
                <label class="col-md-4">Cedula</label>
                <label class="col-md-4">Telefono</label>                
                <label class="col-md-4">Especialidad</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-4">
                    <input type="text" id="Cedula" name="Cedula1" placeholder="Cedula" class="form-control" required value="<?php echo $_Cedula?>">
                </div>
                <div class="col-md-4">
                    <input type="tel" id="Telefono" name="Telefono1" placeholder="Telefono" class="form-control" required value="<?php echo $_Telefono?>">
                </div>
                <div class="col-md-4">
                    <select id="Especialidad" name="Espec1" class="form-control" required>
                        <?php foreach($Especialidades as $r) {?>
                            <option <?php if( $_Especialidad == $r->Descripcion){ echo "selected";} ?> > <?php echo $r->Descripcion ?></option>
                        <?php }?>
                    </select>
                    <!-- <input type="text" id="Especialidad" placeholder="Especialidad" class="form-control" required> -->
                </div>
            </div>
            
            <div class="row p-4 my-2 my-lg-0">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Actualizar</button>
            </div>
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
    </aside>


</main>

<?php 
include "./_footer.php"; 
?>