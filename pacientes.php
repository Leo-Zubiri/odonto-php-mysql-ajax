<?php include "./_head.php"; ?>
    <link rel="stylesheet" href="css/popup.css">
    <title>OdonTam - Home</title>
</head>
<body class="text-center">
<?php 
$menu = "pacientes";
include "./_nav.php"; 
include_once "DB/CRUD.php";

$Pacientes = getPacientes();
$Paciente = null;


if(isset($_GET["id"])){
    
    $id = $_GET["id"];
    $Paciente = getPacienteByID($id);

    // echo '<script type="text/javascript"> document.getElementById("openPopUp").click(); </script> ';  
    
}else{
    $id=-1;
}

?>

<main class = "container my-3">
<!-- text-center row mt-1 mb-3">     -->
    <caption>  <!-- Titulo de la tabla -->
        <h3>Tabla pacientes</h3>                
        <a href="#popUp" id="openPopUp" type="submit" class="mx-3">
            <img src="img/ico/diente_01.png" width="120" height="120">
            <p>Agrega un nuevo paciente</p>
            <!-- <img src="./img/ico/logout_white.png" width="25" alt="Logout"> -->
        </a>        
    </caption>


    <section class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                <thead>
                    <tr>                                                
                        <th>ID</th>   
                        <th>Nombre</th>                      
                        <th>Apellido</th>

                        <th>Ciudad</th>
                        <th>Telefono</th>                        
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach($Pacientes as $r){ ?>
                    <tr>
                        <td><?php echo $r->NoAsig ?></td>
                        <td><?php echo $r->Nombres ?></td>
                        <td><?php echo $r->Apellidos ?></td>

                        <td><?php echo $r->Ciudad ?></td>
                        <td><?php echo $r->Telefono ?></td>                        
                        <td>
                            <a href="pacientes.php?id=<?php echo $r->NoAsig?>#EditUp">
                                <img  class="me-2" src="./img/ico/modificar.png" width="25" alt="Modificar">
                            </a>

                            <a href="DB/actionPaciente.php?action=DEL&id=<?php echo $r->NoAsig ?>">
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
            <h2>Agregar Paciente</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container" method="POST" action="DB/actionPaciente.php?action=POST">

            <div class="row px-4">
              <label class="col-md-6">Nombre</label>
              <label class="col-md-6">Apellidos</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-6">
                    <input type="text" id="Nombres" name="Nombres0" placeholder="Nombres" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="Apellidos" name="Apellidos0" placeholder="Apellidos" class="form-control" required>
                </div>                
            </div>

  
            <div class="row px-4">
              <label class="col-md-4">Fecha Nacimiento</label>
              <label class="col-md-2">Sexo</label>
              <label class="col-md-3">Telefono</label>
              <label class="col-md-3">Ciudad</label>
            </div>
            <div class="row pb-4 px-4">
              <div class="col-md-4">
                <input type="date" id="FechaNac" name="Fecha0" class="form-control" required>
              </div>
              <div class="col-md-2">
                <!-- <input type="text" id="Sexo" name="Sex0" placeholder="Sexo" class="form-control" required> -->
                <select id="Sex0" name="Sex0" class="form-control">
                  <option > H </option>
                  <option > M </option>
                </select> 
              </div> 
              <div class="col-md-3">
                <input type="tel" id="Telefono" name="Telefono0" placeholder="Telefono" class="form-control" required>
              </div>
              <div class="col-md-3">
                <input type="text" id="Ciudad" name="Ciudad0" placeholder="Ciudad" class="form-control" required>
              </div>
            </div>


            <div class="row px-4">
              <label class="col-md-4">Calle</label>
              <label class="col-md-2">Numero ext.</label>
              <label class="col-md-4">Colonia</label>
              <label class="col-md-2">CP</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-4">
                    <input type="text" id="Calle" name="Calle0" placeholder="Calle" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <input type="number" id="Numero" name="Numero0" placeholder="# Ext." class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="text" id="Colonia" name="Colonia0" placeholder="Colonia" class="form-control" required>
                </div>
                <div class="col-md-2">
                  <input type="number" id="CP" name="CP0" placeholder="CP" class="form-control" required>
              </div>
            </div>
            
            <div class="row p-4">
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
            <h2>Editar Paciente</h2>
            <p>Ingrese los valores necesarios</p>
          </header>
          <form class="container"" method="POST" action="DB/actionPaciente.php?action=PUT&id=<?php echo $id; ?>">
          <?php           

          $_ID = "";
          $_Nombres = "";
          $_Apellidos = "";
          $_Fecha = "";
          $_Sexo = "";
          $_Telefono = "";
          $_Ciudad = "";
          $_Calle = "";
          $_numExt = "";
          $_Colonia = "";
          $_CP = "";

          if($Paciente!=null){
              foreach($Paciente as $r){ 
                  $_ID = $r->NoAsig;
                  $_Nombres = $r->Nombres;
                  $_Apellidos = $r->Apellidos;
                  $_Fecha = $r->FechaNac;
                  $_Sexo = $r->Sexo;
                  $_Telefono = $r->Telefono;
                  $_Ciudad = $r->Ciudad;
                  $_Calle = $r->Calle;
                  $_numExt = $r->Numero;
                  $_Colonia = $r->Colonia;
                  $_CP = $r->CP;
          }}

          ?>                
            <div class="row px-4">
              <label class="col-md-6">Nombre</label>
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
              <label class="col-md-4">Fecha Nacimiento</label>
              <label class="col-md-2">Sexo</label>
              <label class="col-md-3">Telefono</label>
              <label class="col-md-3">Ciudad</label>
            </div>
            <div class="row pb-4 px-4">
              <div class="col-md-4">
                <input type="date" id="FechaNac" name="Fecha1" class="form-control" required value="<?php echo $_Fecha?>">
              </div>
              <div class="col-md-2">
                <!-- <input type="text" id="Sexo" name="Sexo1" placeholder="Sexo" class="form-control" required" -->
                <select name="Sexo1" class="form-control">
                  <option <?php if( $_Sexo == 'H'){ echo "selected";} ?> > H </option>
                  <option <?php if( $_Sexo == 'M'){ echo "selected";} ?> > M </option>
                </select> 
              </div>
              <div class="col-md-3">
                <input type="tel" id="Telefono" name="Telefono1" placeholder="Telefono" class="form-control" required value="<?php echo $_Telefono?>">
              </div>
              <div class="col-md-3">
                <input type="text" id="Ciudad" name="Ciudad1" placeholder="Ciudad" class="form-control" required value="<?php echo $_Ciudad?>">
              </div>
            </div>
          

            <div class="row px-4">
              <label class="col-md-4">Calle</label>
              <label class="col-md-2">Numero ext.</label>
              <label class="col-md-4">Colonia</label>
              <label class="col-md-2">CP</label>
            </div>
            <div class="row pb-4 px-4">
                <div class="col-md-4">
                    <input type="text" id="Calle" name="Calle1" placeholder="Calle" class="form-control" required value="<?php echo $_Calle?>">
                </div>
                <div class="col-md-2">
                    <input type="number" id="Numero" name="Numero1" placeholder="# Ext." class="form-control" required value="<?php echo $_numExt?>">
                </div>
                <div class="col-md-4">
                    <input type="text" id="Colonia" name="Colonia1" placeholder="Colonia" class="form-control" required value="<?php echo $_Colonia?>">
                </div>
                <div class="col-md-2">
                  <input type="number" id="CP" name="CP1" placeholder="CP" class="form-control" required value="<?php echo $_CP?>">
              </div>
            </div>
            
            <div class="row p-4">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Actualizar</button>
            </div>
          </form>
        </div>
        <a href="#!" class="closePopUpOutSide"></a>
      </aside>

  
  
    </main>

<?php include "./_footer.php"; ?>